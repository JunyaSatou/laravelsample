<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    /**
     * Boardsテーブルにデータが存在する人と存在しない人をそれぞれ抽出する。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
//        $items = Person::all();
        // boardsテーブルにデータを持っている人を抽出
        $hasItems = Person::has('boards')->get();
        // boardsテーブルにデータを持っていない人を抽出
        $noItems = Person::doesntHave('boards')->get();

        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('person.index', $param);
    }

    /**
     * person\find.blade.phpを表示する
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function find(Request $request){
        return view('person.find', ['input' => '']);
    }

    /**
     * 画面で入力した年齢の条件に一致するレコードを抽出する。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $min = $request->input * 1;
        $max = $min + 10;

        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    /**
     * person\add.blade.phpを表示する。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request){
        return view('person.add');
    }

    /**
     * 画面で入力された情報から新規レコードを作詞する。
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request){
        // Personクラスのrulesはpublicな静的変数なため、外部から使用可能
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    /**
     * person\edit.blade.phpを表示する。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request){
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }

    /**
     * 画面で入力された情報でPeopleテーブルを更新する。
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    /**
     * person\del.blade.phpを表示する。
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Request $request){
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    /**
     * 画面で入力されたIDをPeopleテーブルから削除する。
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove(Request $request){
        Person::find($request->id)->delete();
        return redirect('/person');
    }
}
