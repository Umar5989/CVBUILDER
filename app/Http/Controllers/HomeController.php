<?php

namespace App\Http\Controllers;
use App\Models\Cvdetail;
use Illuminate\Http\Request;
use Auth;
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
        $user = Cvdetail::where('created_by', '=', Auth::user()->id)->first();
        // dd($user);
        if ($user === null) {
            return view('home');
        } else {
            return redirect('pdf');
        }

        
    }
}
