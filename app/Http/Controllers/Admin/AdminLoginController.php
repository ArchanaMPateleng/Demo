<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function gaurd(){

        return Auth::gaurd('guard-admin');

    }
    
    public function adminlogin(){

        return view('admin.adminlogin');

    }

    public function authentication(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
           ]);

              $remember=($request->input('remember')) ? true : false;
      $login_atempt=Auth::guard('admin')->attempt([

        'email'=>$request->input('email'),
        'password'=>$request->input('password')


          ],$remember);

         if ($login_atempt) {
            
            $request->session()->regenerate();

            return redirect('admin/home');

           }else{


             return redirect('admin/adminlogin')
            ->with('error','Your email or password are invalid.');
         }
    }
}
