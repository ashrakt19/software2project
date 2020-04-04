<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Videos extends BackEndController
{
 
public function __construct(Video $model)
    {
    parent::__construct($model);
    }   
protected function with(){
    return ['cat','user'];
}


protected function append()
{
    $array=[
        'categories'=>Category::get(),
            'skills'=>Skill::get(),
             'selectedSkills'=>[],
             'tags'=>Tag::get(),
             'selectedTags'=>[],
            
          ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']=$this->model->find(request()->route()->parameter('video'))->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']=$this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
           
        }
        
        return $array;
}




public function store(Store $request){
    $fileName = $this->uploadImage($request);
    $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->all();
    $row = $this->model->create($requestArray);
    $this->synctaskskills($row , $requestArray);
    return redirect(route('videos.index'));
}

protected function uploadImage($request){
    $file = $request->file('image');
        $fileName = time().str::random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        return $fileName;
}
protected function synctaskskills($user,$requestArray){
    if(isset($requestArray['skills'])&& !empty($requestArray['skills']))//اختار شويه سكيلز
    {
        $user->skills()->sync($requestArray['skills']);//بشوف ايه الي المفروض يتمسح وتمسحه

    }
    if(isset($requestArray['tags'])&& !empty($requestArray['tags']))//اختار شويه سكيلز
    {
        $user->tags()->sync($requestArray['tags']);//بشوف ايه الي المفروض يتمسح وتمسحه

    }
}
}
