<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::count();
        $authors = \App\Author::count();
        $compositions = \App\Composition::count();
        $videos = \App\Video::count();
        $periods = \App\Period::count();
        $events = \App\Event::count();
        return view('admin.dashboard', compact('users', 'authors', 'compositions', 'videos', 'periods', 'events'));
    }
}
