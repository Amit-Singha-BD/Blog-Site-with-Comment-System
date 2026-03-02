<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function settings(){
        $settings = Setting::first();
        $title = "Settings";
        return view("dashboard/admins-dashboard/settings", compact("settings", "title"));
    }

    public function editSettings(){
        $settings = Setting::first();
        $title = "Settings Edit";
        return view("dashboard/admins-dashboard/settings-edit", compact("settings", "title"));
    }

    public function nameUpdate(Request $request, $id){
        $setting = Setting::find($id);
        if(!$setting){
            return redirect()->back()
                             ->with('error', 'Site name was not found.');
        }

        $validate = $request->validate([
            "site_name" => "required|string|min:5|max:20",
        ],[
            "site_name.required" => "Enter site name.",
            "site_name.string"   => "Site name must be a valid string.",
            "site_name.min"      => "Site name must be at least 5 characters.",
            "site_name.max"      => "Site name cannot be more than 20 characters.",
        ]);

        $setting->site_name = $request->site_name;

        if($setting->update()){
            return redirect()->back()
                             ->with('success', 'Site name updated successfuly.');
        }
        else{
            return redirect()->back()
                             ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function taglineUpdate(Request $request, $id){
        $setting = Setting::find($id);
        if(!$setting){
            return redirect()->back()
                             ->with('error', 'Site tagline was not found.');
        }

        $validate = $request->validate([
            "site_tagline" => "required|string|max:250",
        ],[
            "site_tagline.required" => "Enter tagline name.",
            "site_tagline.string"   => "Tagline name must be a valid string.",
            "site_tagline.max"      => "Tagline name cannot be more than 250 characters.",
        ]);

        $setting->site_tagline = $request->site_tagline;
        
        if($setting->update()){
            return redirect()->back()
                             ->with('success', 'Site tagline updated successfuly.');
        }
        else{
            return redirect()->back()
                             ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function socialUpdate(Request $request, $id){
        $setting = Setting::find($id);
        if(!$setting){
            return redirect()->back()
                             ->with('error', 'Social Links was not found.');
        }

        $validate = $request->validate([
            "facebook" => "required|string|max:100",
            "twitter" => "required|string|max:100",
            "instagram" => "required|string|max:100",
            "linkedin" => "required|string|max:100",
            "youtube" => "required|string|max:100",
        ],[
            "facebook.required" => "Enter facebook link.",
            "facebook.string"   => "Facebook link must be a valid string.",
            "facebook.max"      => "Facebook link cannot be more than 250 characters.",

            "twitter.required" => "Enter twitter link.",
            "twitter.string"   => "Twitter link must be a valid string.",
            "twitter.max"      => "Twitter link cannot be more than 250 characters.",

            "instagram.required" => "Enter instagram link.",
            "instagram.string"   => "Instagram link must be a valid string.",
            "instagram.max"      => "Instagram link cannot be more than 250 characters.",

            "linkedin.required" => "Enter linkedin link.",
            "linkedin.string"   => "Linkedin link must be a valid string.",
            "linkedin.max"      => "Linkedin link cannot be more than 250 characters.",

            "youtube.required" => "Enter youtube link.",
            "youtube.string"   => "Youtube link must be a valid string.",
            "youtube.max"      => "Youtube link cannot be more than 250 characters.",
        ]);

        $setting->facebook_url = $request->facebook;
        $setting->twitter_url = $request->twitter;
        $setting->instagram_url = $request->instagram;
        $setting->linkedin_url = $request->linkedin;
        $setting->youtube_url = $request->youtube;
        
        if($setting->update()){
            return redirect()->back()
                             ->with('success', 'Social Links updated successfuly.');
        }
        else{
            return redirect()->back()
                             ->with('error', 'Something went wrong. Please try again.');
        }
    }
}
