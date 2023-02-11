<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
        protected function guard(){
         return Auth::guard('guard-admin');
        }

        public function home(){
            return view('admin.home');
        }
}
