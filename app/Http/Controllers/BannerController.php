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
        $request->validate([
            'banner_name' => 'required|string|max:255|unique:banners',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);
        $bannerImagePath = null;
        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('banner_images', 'public');
        }
        Banner::create([
            'banner_name' => $request->banner_name,
            'banner_image' => $bannerImagePath,
        ]);
        $banners = Banner::all();
        return view('Banner.Banner', compact('banners'))->with('success', 'input image success');
    }

    public function EditBannerPage($id)
    {
        $banner = Banner::findOrFail($id);
        return view('Banner.EditBanner', compact('banner'));
    }

    public function UpdateBanner(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validate_data = $request->validate([
            'banner_name' => 'required|string|max:255|unique:banners,banner_name,' . $id,
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $banner->banner_name = $validate_data['banner_name'];

        if ($request->hasFile('banner_image')) {
            // Delete the old image if it exists
            if ($banner->image && file_exists(public_path('storage/' . $banner->banner_image))) {
                unlink(public_path('storage/' . $banner->banner_image));
            }

            // Store the new image
            $imagePath = $request->file('banner_image')->store('banners', 'public');

            // Update the banner image path
            $banner->banner_image = $imagePath;
        }

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
