<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        $appetizers = MenuItem::where('category', 'Appetizers')->get();
        $mainCourses = MenuItem::where('category', 'Main Courses')->get();
        $desserts = MenuItem::where('category', 'Desserts')->get();
        $drinks = MenuItem::where('category', 'Drinks')->get();

        return view('menu', compact('appetizers', 'mainCourses', 'desserts', 'drinks'));
    }

    public function book()
    {
        return view('book');
    }

    public function contact()
    {
        return view('contact');
    }
}
