<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    // Index Home Page
    public function index(){
        $services = Services::all();
        $blogs = Blog::latest()->take(4)->get();
        $contact = Contact::latest()->first();
        $images = Storage::disk('public')->files('images/gallery');
        return view('home.index', ['images' => $images], compact('services', 'blogs', 'contact'));
    }

    // About Page
    public function about(){
        return view('home.about');
    }
    // Services Page
    public function services(){
        $services = Services::paginate(12);
        return view('home.services', compact('services'));
    }

    // Service Detail
    public function serviceDetail($slug) {
        $service = Services::whereSlug($slug)->firstOrFail();
        $services = Services::all();
        return view('home.service-detail', compact('service', 'services'));
    }

    // Blog
    public function blog(){
        $blogs = Blog::paginate(12);
        return view('home.blog', compact('blogs'));
    }
    // Blog Detail
    public function blogDetail($slug) {
        $blog = Blog::whereSlug($slug)->firstOrFail();
        $blogs = Blog::latest()->take(10)->get();
        return view('home.blog-detail', compact('blog', 'blogs'));
    }

    // Gallery Page

    public function gallery(){
        $images = Storage::disk('public')->files('images/gallery');
        return view('home.gallery', ['images' => $images]);
    }

    // Contact Page
    public function contact() {
        $contact = Contact::latest()->first();
        $socials = Social::all();
        return view('home.contact', compact('contact', 'socials'));
    }
    public function login () {
        return view('home.login');
    }

    public function authenticate (Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    // Register
    public function register ()
    {
        $name = 'Admin';
        $email = 'admin@rmcvinc.com';
        $password = 'Kmdvn3z7m7*';

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public function logout(): RedirectResponse {
        Auth::logout();
        return redirect('/');
    }





}
