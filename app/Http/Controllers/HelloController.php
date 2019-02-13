<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request){
        // リクエストにidが設定されているときはidで検索する
        if (isset($request->id)){
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
        }
        else{
            $items = DB::select('select * from people');
        }
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request){
        // リクエストにidが設定されているときはidで検索する
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
        } else {
            $items = DB::select('select * from people');
        }
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => null,
        ];
        DB::insert('insert into people (name, mail, age, created_at, updated_at)
                            values (:name, :mail, :age, :created_at, :updated_at)', $param);
        echo 'テスト';
        return redirect('/hello');
    }
}
