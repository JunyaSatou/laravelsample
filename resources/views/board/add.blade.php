@extends('layouts.helloapp')

@section('title', 'Board.Add')

@section('menubar')
    @parent
    投稿ページ
@endsection

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table>
        {{-- actionの記載に注意 --}}
        <form action="/board/add" method="post">
            {{ csrf_field() }}
            <tr><th>Person id: </th><td><input type="number" name="person_id"></td></tr>
            <tr><th>Title: </th><td><input type="text" name="title"></td></tr>
            <tr><th>Message: </th><td><input type="text" name="message"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
