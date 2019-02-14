@extends('layouts.helloapp')

@section('title', 'Person.Delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <table>
        {{-- actionの記載に注意 --}}
        <form action="/person/del" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr><th>name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
            <tr><th>mail: </th><td><input type="text" name="mail" value="{{$form->mail}}"></td></tr>
            <tr><th>age: </th><td><input type="text" name="age" value="{{$form->age}}"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
