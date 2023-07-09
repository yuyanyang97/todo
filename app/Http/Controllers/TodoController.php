<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $value = Session::get('key');

        if(!$value){
            $randomNumber = mt_rand(1000, 9999);
            Session::put('key', $randomNumber);
        }
        
        $model = $this->_todoRepository->makeModel()->where('session_key', $value)->get();
        
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
        $value = session('key');

        $task = new Task();
        $task->name = $request->name;
        $task->status = 0;
        $task->created_at = $now;
        $task->session_key = $value;
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
        $model= $this->_todoRepository->delete($id);
        return redirect()->route('index');
    }

    public function update_status(Request $request, $id){
        $model= $this->_todoRepository->find($id);

        $model->status = !$model->status;
        $model->save();

        return redirect()->route('index');
    }
}
