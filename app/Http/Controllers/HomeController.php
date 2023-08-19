<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all()->count();
        // $month = Carbon::now()->format('m');
        // $totalPendapatan = Payment::whereMonth('created_at', $month)->sum('price');

        return view('home', [
            'category' => $category,
        ]);
    }
}
