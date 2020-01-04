<?php

namespace App\Http\Controllers;
// use App\Extends\Common;
use Illuminate\Http\Request;
use App\Extension\Common;

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
        $available_hotels = (new Common)->AllAvailableHotels();
        return view('home',[
          'hotels' => $available_hotels,
        ]);
    }
}
