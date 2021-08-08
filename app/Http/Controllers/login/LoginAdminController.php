<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\AdminUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Logincontroller
{
  public function login(){

      return view($this->loginPath . 'login');

  }

    public function loginDashbord(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->loginPath . 'login');
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);
            $email = $request->email;
            $password = $request->password;

            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {

                return redirect()->intended(route('home'));
//
            } else {

                return redirect()->back()->with('error', 'Email & Password Not match');
            }
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('login'));


    }
}
