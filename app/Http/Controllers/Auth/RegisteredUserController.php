<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],


            'companyName'   =>  ['required', 'string'],//
            'fullName'      =>  ['required', 'string'],
            'email'         =>  ['required', 'email', 'unique:users'],//
            'nip'           =>  ['required'],//
            'address1'      =>  ['required', 'string'],//
            'address2'      =>  ['nullable'],//
            'postCode'      =>  ['required'],//
            'city'          =>  ['required', 'string'],//
            'country'       =>  ['required', 'string'],//
            'terms1'        =>  ['required'],
            'terms2'        =>  ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $company_address = str_replace("|", "\n", $request->country.'|'.$request->address1.'|'.$request->address2.'|'.$request->postCode.'|'.$request->city);
        $user->company()->create([
            'user_id' => $user->id,
            'company_name' => $request->companyName,
            'company_nip' => $request->nip,
            'company_address' => $company_address
        ]);

        $fullName = explode(' ', $request->fullName);

        if(count($fullName) == 3){
            $user->userDetails()->create([
                'fname' => $fullName[0],
                'mname' =>  $fullName[1],
                'lname' => $fullName[2]
            ]);
        }
        else{
            $user->userDetails()->create([
                'fname' => $fullName[0],
                'lname' => $fullName[1]
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
