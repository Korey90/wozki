<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\UserDetails;
use App\Models\Admin\UserAddress;
use App\Models\Admin\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{

    public function dashboard(){
        $auth = Auth::user()->id;
        $user = User::where('id', '=', $auth)->with('address','userDetails', 'company')->first();

        $userOrders = $user->orders->take(5);
        
        $carts = $user->carts()->get();

      //Cache::flush();

      //Artisan::call('storage:link');
        
        return view('front.dashboard', ['user' => $user, 'carts' => $carts, 'orders' => $userOrders]);
    }

    public function profileDetails(){
        $auth = Auth::user()->id;
        $user = User::where('id', '=', $auth)->with('userDetails')->first();
        
        //dd($user);
        return view('front.settings.profileDetails', ['user' => $user]);
    }
   
    public function accountSettings(){
        $user = User::where('id', '=', Auth::user()->id)->with('userDetails', 'address')->first();
        //dd($user);
        return view('front.settings.accountSettings', ['user' => $user]);
    }

    public function addNewAddress(Request $request){

        try{
                UserAddress::create([
                    'user_id'   => Auth::user()->id,
                    'country' => $request->country,
                    'stline' => $request->stline,
                    'ndline' => $request->ndline,
                    'town'   => $request->town,
                    'post_code'   => $request->post_code,
                    'phone'     => $request->phone,
                    'recivier' => $request->recivier,
                    'email'  => $request->email,
                ]);

        }catch(\Exception $e){
            $errors = new MessageBag;
            $errors->add('status', $e->getMessage());

            return back()->withErrors($errors);
        }

        return back()->with('status', 'Adres zostal zapisany poprawnie!');

    }

    public function updateAddress(Request $request){
//        dd($request);
        try{
  
                UserAddress::where('id', $request->id)->update([
                    'country' => $request->country,
                    'recivier' => $request->recivier,
                    'stline' => $request->stline,
                    'ndline' => $request->ndline,
                    'town'   => $request->town,
                    'post_code'   => $request->post_code,
                ]);
                
  

        }catch(\Exception $e){
            $errors = new MessageBag;
            $errors->add('status', $e->getMessage());

            return redirect()->back()->withErrors($errors);
        }

        return back()->with('status', 'Adres został zaktualizowany');
    }

    public function deleteAddress(Request $request){
        $address = UserAddress::find($request->id);
        $address->delete();
        return redirect()->route('user.deliveryAddress')->with('status', 'Adres zostal Usuniety poprawnie!');
    }

    public function companySettings(){

        $auth = Auth::user()->id;
        $company = User::where('id', '=', $auth)->with('userDetails', 'company')->first();

        return view('front.settings.companySettings', ['company' => $company]);
    }

    public function companyUpdate(Request $request){
        //ustalamy zmienne
        $value = $request->input('value');
        $field = $request->input('field');
        $id = $request->input('id');
        
        $user = User::findOrFail($id);

        $userDetailsFields = ['fname', 'mname', 'lname'];

        if(in_array($field, $userDetailsFields)){
            $update = $user->userDetails->update([
                $field => $value,
            ]);
        }else{
            $update = $user->company->update([
                $field => $value,
            ]);
        }

        if(!$update){
            return response()->json([1]);
        }else{
            return response()->json([2]);
        }
        
    }

    public function deliveryAddress(){

        $user = User::find(Auth::user()->id);
        $addresses = $user->address;

        return view('front.settings.deliveryAddress', ['addresses' => $addresses]);
    }


    public function changeUserName(Request $request){ 

        
        if($request->name !== Auth::user()->name){
            $update = User::where('id', '=', Auth::user()->id)->update(
                ['name' => $request->name],
            );

        }
        

        return back()->with('status', 'Profile has been updated');
    }


    public function changeEmail(Request $request){

        User::where('email', '=', Auth::user()->email)->update([
            'email' => $request->email,
        ]);

        return back()->with('status', 'Email has been changed succesfly!');
    }

    public function changePhone(Request $request){

        UserDetails::where('user_id', '=', Auth::user()->id)->update([
            'phone' => $request->phone,
        ]);

        return back()->with('status', 'Phone number has been changed succesfly!');
    }


    public function changeUserDetails(Request $request){

        try{
            UserDetails::where('user_id', Auth::user()->id)->update([
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'sex'   => $request->sex,
            ]);
        }catch(\Exception $e){
            $errors = new MessageBag;
            $errors->add('status', $e->getMessage());

            return redirect()->back()->withErrors($errors);
        }

        return back()->with('status', 'User Details has been updated succesfly!');
    }

    public function changeUserAddress(Request $request){

        try{
            if(UserAddress::where('user_id', Auth::user()->id)->count() == 0){
                UserAddress::create([
                    'user_id'   => Auth::user()->id,
                    'country' => $request->country,
                    'stline' => $request->stline,
                    'ndline' => $request->ndline,
                    'town'   => $request->town,
                    'post_code'   => $request->post_code,
                ]);
                
            }else{
                UserAddress::where('user_id', Auth::user()->id)->update([
                    'country' => $request->country,
                    'stline' => $request->stline,
                    'ndline' => $request->ndline,
                    'town'   => $request->town,
                    'post_code'   => $request->post_code,
                ]);
                
            }

        }catch(\Exception $e){
            $errors = new MessageBag;
            $errors->add('status', $e->getMessage());

            return redirect()->back()->withErrors($errors);
        }

        return back()->with('status', 'Address has ben updated!');
    }

}
