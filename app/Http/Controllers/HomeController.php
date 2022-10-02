<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\V1\ArticleController;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Bridge\AccessToken;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Article $article){
        return view('index');
    }
    public function detail(Request $req,$id){
        $req->session()->put('id',$id);
        return view('detail');
    }
    public function profile(Request $req){
        
        if(!$req->session()->has('accessToken')) {
            return redirect()->route('login')->with('login','Login Failed');
        }
        $req->session()->put('id',(integer) $req->user()->id);
        return view('profile');
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function test(Article $article){
        return $article;
    }
    public function form(){
        return back();
    }
}
