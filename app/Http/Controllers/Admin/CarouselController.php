<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Filesystem\Filesystem;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Rule;
//use Illuminate\Validation\Rules\File;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    public function index(){
        $carousel = DB::table('web_carousel')->get();
        $products = Product::all();


       return view('admin.carousel.index', ['carousel' => $carousel, 'products' => $products]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5120|dimensions:max_width=800,max_height=800',
            'description' => 'required|string',
            'product_ean' => 'required',
        ]);

        $dir = 'carousel/'.str_replace(" ", "-", $request->title).'/';
        $newFileName = 'carousel-'.STR::random(5).'.'.$request->image->extension();

        $request->file('image')->storeAs($dir, $newFileName, 'public');            
   
        DB::table('web_carousel')->insert([
            'title' => $request->title,
            'product_ean' => $request->product_ean,
            'description' => $request->description,
            'image' => $dir.$newFileName,
        ]);

        
        return back()->with('status', 'ok  has ben Created successfully.');

    }


    public function edit($id){
        $carousel = DB::table('web_carousel')->where('id', '=', $id)->get();
        $products = Product::pluck('title', 'ean_number');

       return view('admin.carousel.edit', ['carousel' => $carousel, 'products' => $products]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:5120|dimensions:max_width=800,max_height=800',
            'description' => 'required|string',
            'product_ean' => 'required',
        ]);

        $carousel = DB::table('web_carousel')->where('id', '=', $id)->get();
        
        $oldFile = $carousel->pluck('image');
        //$oldTitle = $carousel->pluck('title');
        $path = public_path('storage/'.$oldFile->implode(''));
        $oldDir = substr($path, 0,-19);

        if($request->file('image') !== null){
            
                if(File::exists($path)){
                    // Deleting File & directory 
                    File::deleteDirectory($oldDir);
                    //File::delete($path); //its deleting just a file
                }else{
                    return redirect()->route('carousel')->withErrors(['Error:  File Could not be find']);
                }


            $newDir = 'carousel/'.str_replace(" ", "-", $request->title).'/';
            $newFileName = 'carousel-'.STR::random(5).'.'.$request->image->extension();

            $request->file('image')->storeAs($newDir, $newFileName, 'public'); //storing the file
            $db_option = $newDir.$newFileName;
        }else{
            $db_option = $oldFile->implode('');
        }




        $carousel = DB::table('web_carousel')->where('id', '=', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'product_ean' => $request->product_ean,
            'image' => $db_option
        ]);

return redirect()->route('carousel')->with('status', 'Slide: '.$request->title.' has ben Updated');

    }






    public function delete(Request $request){

        $carousel = DB::table('web_carousel')->where('id', '=', $request->delete)->get();
        
        $file = $carousel->pluck('image');
        $path = public_path('storage/'.$file->implode(''));
        $p2 = substr($path, 0,-19);
        
            if(File::exists($path)){
            // Deleting File & directory 
            File::deleteDirectory($p2);
            //File::delete($path); //its deleting just a file
            
            // Deleting DB record
            DB::table('web_carousel')->where('id', '=', $request->delete)->delete();
            }else{
                return redirect()->route('carousel')->withErrors(['Error:  File Could not be find']);
            }

            return redirect()->route('carousel')->with('status', 'Slide '.$carousel->pluck('title').' has been deleted.');

    }



}
