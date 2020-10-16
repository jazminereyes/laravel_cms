<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = Report::where('user_id', auth()->id())->get();
        return view('home', compact('reports'));
    }

    public function adminHome()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('adminHome', compact('users'));
    }
}
