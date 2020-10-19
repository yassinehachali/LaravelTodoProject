<?php

namespace App\Http\Controllers;

use App\Models\Todo as Todo;
use Illuminate\Http\Request;


class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()



    {

        return view("todos.index")->with('todos',Todo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        
        $data=request()->all();
        $todo= new Todo();
        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->completed=false;
        $todo->save();
        session()->flash('success','Todo Created Successfuly');

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
       
        return view('todos.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo)
    {
 
        $data=request()->all();
      
        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->completed=false;
        $todo->save();

        session()->flash('success','Todo Updated Successfuly');
        return redirect('/todos');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        
        $todo->delete();
        session()->flash('success','To do Deleted Successfuly');
        return redirect('/todos');
    }
}
