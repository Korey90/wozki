<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }
    public function show($name){
        $categories = Category::where('name', '=', $name)->with('products','products.productDescription', 'products.productPhotos')->get();
      //  dd($categories);
        return view('admin.category.show', ['categories' => $categories]);
    }

    public function update(Request $request){

        $record = Category::where('id', '=', $request->id)->update([
            'name' => $request->name,
        ]);
        
        return back()->with('status', 'wszystko spoko zaktualizowane');

    }

    public function create(Request $request){

        Category::create([
            'name' => $request->name,
        ]);


        return back()->with('status', 'Kategoria ['.$request->name.'] zostala poprawnie utwozona.');
    }

    public function delete(Request $request){

        $item = Category::find($request->id);
        $name = $item->name;
        $item->delete();


        return back()->with('status', 'Kategoria ['.$name.'] została pomyslnie usunieta');
    }






    public function frontShow($name){

        $category = Category::where('name', $name)->with('products', 'products.productPhotos')->first();

        return view('front.category.show', compact('category'));
    }





}
