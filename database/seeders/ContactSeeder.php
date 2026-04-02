<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder {
    public function run(): void{
        DB::table('contacts')->insert([
            [
                'name' => 'Amit Singha',
                'email' => 'amit@gmail.com',
                'subject' => 'Website Inquiry',
                'message' => 'I want to build a Laravel website. Please contact me.',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rahim Uddin',
                'email' => 'rahim@gmail.com',
                'subject' => 'Project Discussion',
                'message' => 'Can we discuss a new project idea?',
                'status' => 'read',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Karim Hasan',
                'email' => 'karim@gmail.com',
                'subject' => 'Bug Issue',
                'message' => 'I found a bug in your website.',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sadia Akter',
                'email' => 'sadia@gmail.com',
                'subject' => 'Design Help',
                'message' => 'Need help with UI design.',
                'status' => 'read',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tanvir Ahmed',
                'email' => 'tanvir@gmail.com',
                'subject' => 'Job Offer',
                'message' => 'We want to hire you as a Laravel developer.',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nusrat Jahan',
                'email' => 'nusrat@gmail.com',
                'subject' => 'Collaboration',
                'message' => 'Let’s collaborate on a project.',
                'status' => 'read',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Fahim Rahman',
                'email' => 'fahim@gmail.com',
                'subject' => 'Support Needed',
                'message' => 'I need support for your service.',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mim Islam',
                'email' => 'mim@gmail.com',
                'subject' => 'Feedback',
                'message' => 'Your website looks amazing!',
                'status' => 'read',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rafi Hossain',
                'email' => 'rafi@gmail.com',
                'subject' => 'API Integration',
                'message' => 'Need help integrating payment API.',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jannat Ara',
                'email' => 'jannat@gmail.com',
                'subject' => 'General Question',
                'message' => 'I have some questions about your services.',
                'status' => 'read',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
