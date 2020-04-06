<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Skills extends BackEndController
{
       
public function __construct(Skill $model)
{
parent::__construct($model);
}
public function store(Store $request){
    $requestArray = $request->all();
    $this->model->create($requestArray);

    return redirect(route('skills.index'));
}

public function update($id , Store $request){
    $user=Skill::findOrFail($id);
    $requestArray = $request->all();

    $user->update($requestArray);
        return redirect(route('skills.index'));
}


}
