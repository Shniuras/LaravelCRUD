<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Post::paginate(3);
        return view('home',[
            'postai' => $showData
        ]);
    }

    public function admin(){
        $showData = Post::paginate(3);
//        $showData = DB::table('posts')->get();
        return view('posts.all',['postai' => $showData]);
    }
}
