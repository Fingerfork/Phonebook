@extends('layout'){{-- Расширяемся от общего шаблона--}}

@section('content'){{-- Выводим с места именованого блока--}}
@if(count($users))
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>{{--Присваивание свойств из переменной--}}
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->appends(['q'=>request()->q])->links()}} {{--Пагинация--}}
@else
    <h1>Do not Find </h1>
@endif
@endsection 