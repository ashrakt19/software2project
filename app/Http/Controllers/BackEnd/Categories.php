<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\categories\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Categories extends BackEndController
{
   
public function __construct(Category $model)
{
parent::__construct($model);
}
public function store(Store $request){
    $requestArray = $request->all();
    $this->model->create($requestArray);

    return redirect(route('categories.index'));
}

public function update($id , Store $request){
    $user=Category::findOrFail($id);
    $requestArray = $request->all();

    $user->update($requestArray);
        return redirect(route('categories.index'));
}
}
