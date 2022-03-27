<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
   public function register()
   {
        return view('auth.register');
   }

   public function storeUser(Request $request)
   {
         $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            // 'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
   }
}
