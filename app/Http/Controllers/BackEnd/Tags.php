<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends BackEndController
{
    
       
public function __construct(Tag $model)
{
parent::__construct($model);
}
public function store(Store $request){
    $requestArray = $request->all();
    $this->model->create($requestArray);

    return redirect(route('tags.index'));
}
public function update($id , Store $request){
    $user=Tag::findOrFail($id);
    $requestArray = $request->all();
    $user->update($requestArray);
        return redirect(route('tags.index'));
}
}

}
