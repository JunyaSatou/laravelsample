<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $sort = $request->sort;
//        $items = Person::orderBy($sort, 'asc')->paginate(5);
        $items = DB::table('people')->paginate(5);
        $param = [
            'items' => $items,
            'sort' => $sort,
            'user' => $user,
        ];

        return view('hello.index', $param);
    }

    public function post(Request $request){
        $items = DB::table('people')->get();
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
        DB::table('people')
            ->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request){
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request){
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }

    public function del(Request $request){
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request){
        DB::table('people')
            ->where('id', $request->id)
            ->delete();
        return redirect('/hello');
    }

    public function show(Request $request){
        $page = $request->page;

        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }

    public function rest(Request $request){
        return view('hello.rest');
    }

    public function ses_get(Request $request){
        return view('hello.session', [
            'session_data' => $request->session()->get('msg')]);
    }

    public function ses_put(Request $request){
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }

    public function getAuth(Request $request){
        $param = [
            'message' => 'ログインしてください。'
        ];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request){
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました。 ' . Auth::user()->name . ')';
        }
        else{
            $msg = 'ログインに失敗しました。';
        }

        return view('hello.auth', ['message' => $msg]);
    }

    public function logout(Request $request){

    }
}
