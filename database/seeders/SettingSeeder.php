<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            "site_name"     => "My Blog",
            "site_tagline"  => "Share Your Thoughts",
            "logo_path"     => "logo.png",
            "favicon_path"  => "favicon.png",
            "facebook_url"  => "facebook.com/example",
            "twitter_url"   => "twitter.com/example",
            "instagram_url" => "instagram.com/example",
            "linkedin_url"  => "linkedin.com/example",
            "youtube_url"   => "youtube.com/example",
        ]);
    }
}
