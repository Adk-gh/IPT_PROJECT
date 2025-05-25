<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showSignin()
    {
        return view('Signin'); // resources/views/signin.blade.php
    }

    public function handleSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        // Store user in session
        Session::put('user', [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ]);

        return redirect('/profile'); // Make sure this route exists
    }



     public function showSignup()
    {
        return view('Signup');
    }

    public function handleSignup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::table('users')->insert([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('signin')->with('success', 'Account created successfully! Please sign in.');
    }
    // In app/Http/Controllers/AuthController.php (or your chosen controller)

public function socialFeed()
{

    return view('SocialFeed');
}

public function showArtist()
{

    return view('Artist');
}
public function showArticles()
{

    return view('Articles');
}
public function showAboutUs()
{

    return view('AboutUs');
}

public function showContact()
{

    return view('Contact');
}
public function showProfile()
{
    $user = Session::get('user');

    if (!$user) {
        return redirect()->route('signin')->withErrors(['You must be signed in to view your profile.']);
    }

    return view('Profile', ['user' => $user]);
}

public function handleSignout()
{
    Session::forget('user');
    return redirect()->route('home')->with('success', 'You have been signed out successfully.');
}

/*public function showAdmin()
{
    $user = Session::get('user');

    if (!$user || $user['email'] !== 'admin@example.com') {
        return redirect()->route('home')->withErrors(['You do not have permission to access this page.']);
    }

    return view('admin', ['user' => $user]);
}*/
}
