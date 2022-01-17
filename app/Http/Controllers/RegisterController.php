<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function post(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:20|unique:App\Models\User,username',
            'address' => 'required',
            'email' => 'required|email:dns',
            'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'same:confirm-password'],
            'confirm-password' => 'required'
        ]);
        
        // $validatedData['password'] = bcrypt($validatedData['password']); -> ada dua cara : bcrypt ama sha1
        
        // if ($validatedData['password'] === $validatedData['confirm-password'] ) {
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        $request->session()->flash('success', 'Registration successfull');
        
        User::create($validatedData);

        return redirect('/');
        // }

        // $request->session()->flash('warning', 'Password must be the same with confirmed password');

    }

}
