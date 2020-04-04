<?php 
 namespace App\Http\Controllers\BackEnd;
 use Illuminate\Support\Str;
 use App\Http\Controllers\Controller;
 use Illuminate\Database\Eloquent\Model; 
use Illuminate\Http\Request;
  class BackEndController extends Controller 
{     protected $model;
  public function __construct(Model $model)   
   {        $this->model=$model;        
 } public function index()     
{         $users= $this->model; 

        $users=$this->filter($users);      
   $with=$this->with();      
   if(!empty($with)){
  $users=$users->with($with);  
       }         $users=$users->paginate(10);    
    /* $modulname=$this->pluralmodulname(); 
        $pagetitle ="Control" .$modulname;  
       $pageDesc='Here you can add/edit/delete users';
*/         return view('back-end.'.$this->getClassName().'.index')->with('users',$users);  
   }        
 public function create()   
 {      
  $append=$this->append();     
    return view('back-end.'.$this->getClassName().'.create')->with($append);     
}  

        
protected function getClassName()   
  {         return  str::plural($this->pluralmodulname());   
  }     public function destroy($id)    
 {        $this->model->findOrFail($id)->delete();   
      return redirect(route($this->getClassName().'.index'));  
   }     protected function with(){       
  return [];  
   }     protected function filter($users)     {        
 return $users;  
   }     protected function append(){      
   return []; 
    }     protected function pluralmodulname()     { 
  return strtolower(class_basename($this->model));     }   }