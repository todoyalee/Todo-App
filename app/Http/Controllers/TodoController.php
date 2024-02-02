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


    public function show($id){

        $todo=Todo::find($id);


        if(! $todo){

            request()->session()->flash('error' ,'unable to locate the todo');
            return redirect(url('/todos/index'))->withErrors([
                'error'=>'unable to locate the todo',
            ]);
        }
        
        return view('todos.show',['todo' =>$todo]);
    }


    public function edit($id){
        $todo=Todo::find($id);
        if(! $todo){

            request()->session()->flash('error' ,'unable to locate the todo');
            return redirect(url('/todos/index'))->withErrors([
                'error'=>'unable to locate the todo',
            ]);
        }
        
        return view('todos.edit',['todo' =>$todo]);
    }

    public function update(TodoRequest $request){

        return $request->all();

    }
}
