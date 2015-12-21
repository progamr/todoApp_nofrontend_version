<?php
/**
 * Created by PhpStorm.
 * User: shiftdeveloper
 * Date: 16/12/15
 * Time: 11:01 ص
 */

namespace App\Http\Controllers;

use App\Http\Requests\addTodoRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class todosController extends Controller
{
    /**
     * get all todos
     * @return Collection
     */
    public function index(){
        $todos = Todo::all();
        return view('todos.index')->with(compact('todos'));

    }

    public function show($id){
        try {
            $todo = Todo::findOrFail($id);
            return view('todos.show', compact('todo'));
        }
        catch(ModelNotFoundException $e){
            return   redirect('/')->with('notFoundMessage', 'the todo was not found');
        }

    }

    public function create(){
        return view('todos.create');
    }

    public function store(){
        $validation = Validator::make(Input::all(), [
            'title' =>'required',
            'body'    =>'required',
        ]);
        if($validation->fails()){
        return Redirect::back()->withInput()->withErrors($validation);
        }
        else {
            $todo = Todo::create(['title' => Input::get('title'), 'body' => Input::get('body')]);
            return   redirect('/')->with(['createMessage' =>'todo added susseccfully']);
        }
    }

    public function edit($id){
        try{
            $todo = Todo::findOrFail($id);
            return view('todos.edit', compact('todo'));
        }
        catch(ModelNotFoundException $e){
            return redirect('/')->with('notFoundMessage', 'the todo is not found');
        }
    }

    public function update($id){
        try {
            $todo = Todo::findOrFail($id);

            $validation = Validator::make(Input::all(), [
                'title' =>'required',
                'body'    =>'required',
            ]);
            if($validation->fails()){
                return Redirect::back()->withInput()->withErrors($validation);
            }
            else {
                    $todo->title = Input::get('title');
                    $todo->body = Input::get('body');
                    $todo->save();
                    //return   Response::json(['message' =>'todo updated susseccfully']);
                    return redirect('/')->with('updatedMessage', 'the todo was updated successfully');
                }
        }
        catch(ModelNotFoundException $e){
            //return   Response::json(['flag' => -1]);
            return redirect('/')->with('notFoundMessage', 'the todo is not found');

        }
    }

    public function delete($id){
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
            return   redirect('/')->with('deleteMessage', 'todo deleted successfully');
        }
        catch(ModelNotFoundException $e){
            return   Response::json(['flag' => -1]);

        }
    }
}