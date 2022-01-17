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
            'email' => 'required|email:dns|unique:App\Models\User,email',
            'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'same:confirm-password'],
            'confirm-password' => 'required'
        ]);
        
        // $validatedData['password'] = bcrypt($validatedData['password']); -> ada dua cara : bcrypt ama sha1
        
        $validatedData['password'] = Hash::make($validatedData['password']);
            
        echo "<script>";
        echo "alert('Register Success')";
        echo "</script>";
        
        User::create($validatedData);

        return redirect('/')->with('alert', 'Register Success');
    
    }

}
