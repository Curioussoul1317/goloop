<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\comment;
use App\Models\like;
use App\Models\product;
use App\Models\event_category;
use App\Models\team;
use App\Models\team_members;
use App\Models\payment;
use Illuminate\Support\Facades\Auth;
use App\Models\participants;

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

        if (Auth::user()->account_type == "admin") {
            $Users = User::Where('account_type', 'user')->count();
            $payment = payment::all();
            $sales = $payment->sum('amount');
            $items = $payment->count();
            $events = event_category::all()->count();
            return view('admindashboard')->with('Users', $Users)->with('sales', $sales)->with('items', $items)->with('events', $events);
        } else {
            $userevents = participants::where('user_id', Auth::user()->id)->get();
            // $posts = post::with('comment')->orderBy('created_at','desc')->paginate(1);
            $posts = post::orderBy('created_at', 'desc')->get();
            $products = product::all();
            $teams = team_members::where('member_id', Auth::user()->id)->where('status', 0)->get();
            return view('home')->with('posts', $posts)->with('userevents', $userevents)->with('products', $products)->with('teams', $teams);
        }
    }
}
