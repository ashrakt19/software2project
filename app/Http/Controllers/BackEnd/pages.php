<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;
use Illuminate\Http\Request;

class pages extends BackEndController
{
    public function __construct(Page $model)
{
parent::__construct($model);
}
public function store(Store $request){
    $requestArray = $request->all();
    $this->model->create($requestArray);

    return redirect(route('pages.index'));
}
public function update($id , Store $request){
    $user=Page::findOrFail($id);
    $requestArray = $request->all();

    $user->update($requestArray);
        return redirect(route('pages.index'));
}

}
