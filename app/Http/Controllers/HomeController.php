<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'index',
        ]);
    }

    public function index()
    {
        $videos=Video::orderBy('id','desc');
        if(request()->has('search') && request()->get('search') != ''){
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home' , compact('videos'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function video($id ) //for example he talk about language
    {
        $video=video::with('skills' , 'tags' , 'cat' , 'user' , 'comments.user')->findOrFail($id);
        return view('front-end.video.index',with(['video'=>$video]));
    }

    public function welcome(){
        $videos=Video::orderBy('id','desc')->paginate(6);
        $videos_count=Video::count();
        $tags_count=Tag::count();
        $comments_count=Comment::count();
        return view('welcome',compact('videos','videos_count','tags_count','comments_count'));
       }

}
