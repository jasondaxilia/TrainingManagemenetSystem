<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
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

        $users = User::all();
        $birthday = [];

        $date = Carbon::now();

        foreach ($users as $x) {
            $birthdayThisYear = Carbon::parse($x->date_of_birth)
                ->year($date->year);

            if ($birthdayThisYear->lessThan($date)) {
                $birthdayThisYear->addYear();
            }

            $daysToBirthday = $date->diffInDays($birthdayThisYear, false);
            $birthdays[] = [
                'user' => $x,
                'days_left' => $daysToBirthday
            ];
        }

        usort($birthdays, function ($a, $b) {
            return $a['days_left'] <=> $b['days_left'];
        });

        $closestBirthdays = array_slice($birthdays, 0, 3);

        return view('Dashboard', compact('closestBirthdays', 'user', 'banners', 'user_count', 'company_count', 'banner_count'));
    }
}
