@extends('layouts.helloapp')

@section('title', 'Board.Index')

@section('menubar')
    @parent
    ボードページ
@endsection

@section('content')
    <table>
        <tr><th>Message</th><th>Name</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->message}}</td>
                <td>{{$item->person->name}}</td>
            </tr>
        @endforeach
    </table>
    <form action="/board/add" method="get">
        <input type="submit" value="続けて登録する">
    </form>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
