<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ShowProfile()
    {
        $user = Auth::user();
        $company = $user->company;
        return view('Profile.Profile', compact('user', 'company'));
    }

    public function EditProfile()
    {
        $user = Auth::user();
        $company = $user->company;
        return view('Profile.EditProfile', compact('user', 'company'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        // $user = Auth::user();
        $user = User::findOrFail($id);

        // dd($request->all());

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // $user->save();

        if ($user->save()) {
            // Successfully saved
            return view('user-register');
        } else {
            // Handle the failure case
            dd($request->all());
        }
        $company = $user->company;
        return view('ShowProfile', compact('user', 'company'))->with('success', 'Profile updated successfully!');
    }
}
