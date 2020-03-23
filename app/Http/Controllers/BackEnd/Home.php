<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;


class Home extends BackEndController
{
        
  
    public function index(){
        return view('back-end.home');
    }
}
