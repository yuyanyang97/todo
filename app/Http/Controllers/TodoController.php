<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TodoRepository;
use Carbon\Carbon;
use App\Task;
use DataTables;

class TodoController extends Controller
{
    private $_todoRepository;
    public function __construct(TodoRepository $todoRepository){
        $this->_todoRepository = $todoRepository;
    }
    public function index(){
        $model = $this->_todoRepository->all();

        return view("index")->with('data', $model);
    }

    public function check($id){
        $model = $this->_todoRepository->find($id);

        return view("detail")->with('record', $model);
    }

    public function create(){
        return view("add");
    }

    public function store(Request $request){

        $now = Carbon::now()->timezone('Asia/Kuala_Lumpur');

        $task = new Task();
        $task->name = $request->name;
        $task->status = 0;
        $task->created_at = $now;
        $task->save();

        return redirect()->route('index');
    }

    public function update(Request $request, $id){
        $model= $this->_todoRepository->find($id);

        $model->name = $request->name;
        $model->save();

        return redirect()->route('index');
    }

    public function delete($id){

    }

    public function update_status(Request $request, $id){

    }
}
