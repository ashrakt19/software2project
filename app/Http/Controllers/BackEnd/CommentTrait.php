<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\comments\Store;
use App\Models\Comment;
trait CommentTrait{
    public function commentStore(Store $request){
        $requestArray = $request->all() + ["user_id" => auth()->user()->id]; 
        Comment::create($requestArray);
      //  return redirect()->route('videos.edit' , ['id' => $requestArray['video_id'] , '#comments']);
       return back();
    }
    public function commentDelete($id){
        $user  = Comment::findOrFail($id);
        $user->delete();
       // return redirect()->route('videos.edit' , ['id' => $user->video_id , '#comments']);
        return back();
    }
    public function commentUpdate($id,Store $request){
        $user  = Comment::findOrFail($id);
        $user->update($request->all());
       // return redirect()->route('videos.edit' , ['id' => $user->video_id , '#comments']);
        return back();
    }
}