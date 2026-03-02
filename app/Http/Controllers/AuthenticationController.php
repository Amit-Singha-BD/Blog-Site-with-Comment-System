<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationValidate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function showLoginform(){
        return view("auth.login");
    }

    public function login(Request $request){
        $Login_Validate = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:8|max:20",
        ], [
            "email.required" => "Please enter your email address.",
            "email.email" => "Please enter a valid email address.",
            "password.required" => "Please enter your password.",
            "password.min" => "Password must be at least 8 characters.",
            "password.max" => "Password must not exceed 20 characters.",
        ]);

        if ($Login_Validate->fails()) {
            return redirect()->back()
                            ->withErrors($Login_Validate)
                            ->withInput();
        }

        if (Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            return redirect()->intended("admin.dashboard")
                                 ->with("success", "Login successful.");
        }
        else{
            return redirect()->back()
                             ->with("error", "Invalid email or password.");
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("blog.home")
                         ->with("success", "You have been logged out successfully.");
    }

    public function showRegistrationForm(){
        return view("auth.registration");
    }

    public function registrationStore(RegistrationValidate $request){
        $validated = $request->validated();

        $imageName = null;
        if($request->hasFile("image")){
            $image     = $request->file("image");
            $imageName = time().".".$image->getClientOriginalExtension();
            $image     -> move('storage', $imageName);
        }

        $users = new User();
        $users->name     = $validated['name'];
        $users->email    = $validated['email'];
        $users->phone    = $validated['phone'];
        $users->gender   = $validated['gender'];
        $users->image    = $imageName;
        $users->password = Hash::make($validated['password']);

        if($users->save()){
            return redirect()->route('auth.login.form')
                             ->with('success','Registration successfuly.');
        }
        else{
            return redirect()->back()
                             ->with('error', 'Something went wrong. Please try again.');
        }
    }
}
