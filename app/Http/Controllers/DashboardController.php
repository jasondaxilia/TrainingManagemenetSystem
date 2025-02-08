<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ShowDashboard()
    {
        $user = Auth::user();
        $user_count = User::count();
        $company_count = Company::count();
        $banner_count = Banner::count();
        $banners = Banner::all();
        return view('Dashboard', compact('user', 'banners', 'user_count', 'company_count', 'banner_count'));
    }
}
