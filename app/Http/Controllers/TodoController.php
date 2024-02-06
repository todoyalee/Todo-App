<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo ;

class TodoController extends Controller
{
    public function index(){
      try {
        $todos=Todo::all();
        //change this later
        return view('todos.index',[
            'todos'=>$todos
        ]);
       }catch(Exception $e){
    Log::critical($e->getMessage());
       }
    }


    public function create()  {
        try{
            return view('todos.create');
        }
        catch(Exception $e){
            Log::critical($e->getMessage());
         }
        }


    public function store(TodoRequest $request){
        //Todo::create($request->all());
        //$request->validated();
        try{
       Todo::create([   
            'title'=> $request->title,
        'description'=> $request->description,
           'is_completed'=>0,
        ]); 
        $request->session()->flash('alert-success' ,'Todo Created Successfully');
        return redirect(url('/todos/index'));
        }catch(Exception $e){
        Log::critical($e->getMessage());
     }  
    }


    public function show($id){
        try{
        $todo=Todo::findorFail($id);
        return view('todos.show',['todo' =>$todo]);
    }
    catch(Exception $e){
        Log::critical($e->getMessage());
 }
    }


    public function edit($id){
        try{
        $todo=Todo::findorFail($id);
        return view('todos.edit',['todo' =>$todo]);
       }catch(Exception $e){
            Log::critical($e->getMessage());
     }
    }

    public function update(TodoRequest $request){
        try{
        $todo = Todo::findorFail($request->todo_id);
        $todo->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'is_completed' =>$request->is_completed,
        ]);
        $request->session()->flash('alert-info' ,'Todo updated Successfully');
        return redirect(url('/todos/index'));
         }catch(Exception $e){
            Log::critical($e->getMessage());
     }


    }

    public function destroy(Request $request){
        try{
        $todo = Todo::findorFail($request->todo_id);
        $todo->delete();
        $request->session()->flash('alert-success','To do Deleted Successfully');
        return redirect(url('/todos/index'));
        }catch(Exception $e){
            Log::critical($e->getMessage());
     }
    }

    /*

     if(! $todo){
            request()->session()->flash('error' ,'unable to locate the todo');
            return redirect(url('/todos/index'))->withErrors([
                'error'=>'unable to locate the todo',
            ]);
            }
            */
}
