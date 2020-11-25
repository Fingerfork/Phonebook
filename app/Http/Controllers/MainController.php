<?php

namespace App\Http\Controllers;

use App\Phonebook;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
//        $users= Phonebook::all(); Берем все записи из БД
//        $users = Phonebook::orderBy('name')->get(); Берем записи и сортируем по имени
        $users = Phonebook::orderBy('name')->paginate(10); //Выводим только 10 записай и вводим пагинацию
        return view('home',compact('users'));
    }
    public function search(Request $request)
    {

        $search=$request->q;//Обращение id формы К name
        $users = Phonebook::where('name','LIKE',"%{$search}%")->orderBy('name')->paginate(10);//Поиск по имени ,Условие поиска,Поиск в строке
        return view('home',compact('users'));
    }
}
