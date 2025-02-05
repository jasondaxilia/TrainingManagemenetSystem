<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function Register(Request $request)
    {

        // dd($request);

        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'date_of_birth' => 'required|string',
            'role' => 'required|string|in:user,admin',
            'phone_number' => 'nullable|string|max:20',
            'company' => 'required|exists:companies,id',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
        $companies = Company::all();

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone_number' => $request->phone_number,
            'company_id' => $request->company,
            'profile_picture' => $profilePicturePath, // Store profile picture path
        ]);

        // dd($request->all());

        return view('UserRegister', compact('companies'))->with('success', 'Registration successful!');
    }

    public function RegisterPage()
    {
        $companies = Company::all();
        return view('UserRegister', compact('companies'));
    }


    public function Login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Check if the username exists in the database
        $user = User::where('username', $request->username)->first();

        // If the username doesn't exist, return an error message
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username tidak terdaftar'
            ])->withInput();
        }

        // If the username exists, attempt to login by checking the password
        if (Auth::attempt($credentials)) {
            return redirect()->route('ShowDashboard');
        }

        // If the password is incorrect, return an error message
        return back()->withErrors([
            'password' => 'Password salah'
        ])->withInput();
    }

    public function LoginPage()
    {
        return view('/Login');
    }

}
