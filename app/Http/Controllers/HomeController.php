<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Users;
use App\Http\Requests\BackEnd\comments\Store;
use App\Http\Requests\FrontEnd\Comment\Store as CommentStore;
use App\Http\Requests\FrontEnd\Messages\Store as MessagesStore;
use App\Http\Requests\FrontEnd\Users\Store as UsersStore;
use App\Mail\ContactUs;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User as ModelsUser;
use App\Models\Video;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
    public function category($id )//انه مثلا بيتكلم عن اللارافيل
    {
        $cat=Category::findOrFail($id);
        $videos=Video::where('cat_id',$id)->orderBy('id','desc')->paginate(30);
        return view('front-end.category.index',with(['videos'=>$videos,'cat'=>$cat]));
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
    public function tag($id )//حبه حاجات جوا اللارافيل
    {
        $tag =Tag::findOrFail($id);
        $videos=Video::whereHas('tags',function($query) use($id){
            $query->where('tag_id',$id);
        })->/*بتاخد اسم الريليشن بين الاسكيلز والفيديو*/orderBy('id','desc')->paginate(30);
        return view('front-end.tag.index',with(['videos'=>$videos,'tag'=>$tag]));
    }

public function skill($id )
    {
        $skill=Skill::findOrFail($id);
        $videos=Video::whereHas('skills',function($query) use($id){
            $query->where('skill_id',$id);
        })->/*بتاخد اسم الريليشن بين الاسكيلز والفيديو*/orderBy('id','desc')->paginate(30);
        return view('front-end.skill.index',with(['videos'=>$videos,'skill'=>$skill]));
    }
    public function commentUpdate($id  ,CommentStore $request )
        {
            $comment = Comment::findOrFail($id);
            if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin'){
                $comment->update(['comment' => $request->comment]);

           }

           return redirect()->route('frontend.video' , ['id' => $comment->video_id , '#commnets']);
        }
public function commentStore($id , CommentStore $request)
        {
            $video = Video::findOrFail($id);
            Comment::create([
                'user_id' => auth()->user()->id,
                'video_id' => $video->id,
                'comment' => $request->comment
            ]);
            return redirect()->route('frontend.video' , ['id' => $video->id , '#commnets']);

        }

        public function commentsDelete($id)
        {
            $user  = Comment::findOrFail($id);
        $user->delete();
       // return redirect()->route('videos.edit' , ['id' => $user->video_id , '#comments']);
        return back();
    
        }

    public function welcome(){
        $videos=Video::orderBy('id','desc')->paginate(6);
        $videos_count=Video::count();
        $tags_count=Tag::count();
        $comments_count=Comment::count();
        return view('welcome',compact('videos','videos_count','tags_count','comments_count'));
       }
       public function page($id,$slug = null){
        $page=Page::findOrFail($id);
        return view('front-end.page.index',compact('page',$page));
     }


}
