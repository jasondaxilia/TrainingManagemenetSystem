<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ShowDashboard()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return view('Dashboard.Admin', compact('user'));
        } elseif ($user->role == 'user') {
            return view('Dashboard.User', compact('user'));
        }
    }
}
