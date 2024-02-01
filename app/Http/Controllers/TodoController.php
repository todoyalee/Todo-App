<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TodoRequest;

use App\Models\Todo ;

class TodoController extends Controller
{
    public function index(){

        $todos=Todo::all();
        //chenge this later
        return view('todos.index',[
            'todos'=>$todos
        ]);
    }


    public function create(){
        return view('todos.create');
    }


    public function store(TodoRequest $request){

        //Todo::create($request->all());

        //$request->validated();

       Todo::create([   
            'title'=> $request->title,
        'description'=> $request->description,
           'is_completed'=>0,
           

        ]);


        $request->session()->flash('alert-success' ,'Todo Created Successfully');

        return redirect(url('/todos/index'));


        
    }
}
