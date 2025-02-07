<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function ShowBanner()
    {
        $banners = Banner::all();
        return view('Banner.Banner', compact('banners'));
    }

    public function AddBannerPage()
    {
        return view('Banner.AddBanner');
    }

    public function AddBanner(Request $request)
    {
        // dd($request->file('banner_image'));

        $request->validate([
            'banner_name' => 'required|string|max:255|unique:banners',
            'banner_link' => 'required|string|max:255|unique:banners',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);


        // dd($request->banner_image);

        $bannerImagePath = null;
        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('banner_images', 'public');
        }

        Banner::create([
            'banner_name' => $request->banner_name,
            'banner_link' => $request->banner_link,
            'banner_image' => $bannerImagePath,
        ]);

        return view('Banner.Banner')->with('success', 'input image success');
    }

    public function EditBannerPage()
    {
        return view('Banner.EditBanner');
    }

    public function UpdateBanner(Request $request, $id)
    {
        $request->validate([
            'banner_name' => 'required|string|max:255|unique:banners,banner_name,' . $id,
            'banner_address' => 'required|string|max:255',
        ]);

        $banner = Banner::findOrFail($id);

        $banner->banner_name = $request->banner_name;
        $banner->banner_address = $request->banner_link;

        $banner->save();

        return redirect('/Banner')->with('success', 'Banner Update Succesfull');
    }

    public function DeleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect('/Banner')->with('success', 'Banner deleted');

    }
}
