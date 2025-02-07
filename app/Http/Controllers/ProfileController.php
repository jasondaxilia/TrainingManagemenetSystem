<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ShowProfile()
    {
        $user = Auth::user();
        $company = $user->company;
        return view('Profile.Profile', compact('user', 'company'));
    }

    public function EditProfilePicture()
    {
        $user = Auth::user();
        return view('Profile.EditProfilePicture', compact('user'));
    }
}
