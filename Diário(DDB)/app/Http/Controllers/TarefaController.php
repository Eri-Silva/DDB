<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    //
    public function index()
    {
        return view('tarefas.index');
    }

    public function store()
    {
        return view('diario.index');
    }

    public function update()
    {
        return view('diario.index');
    }

    public function delete()
    {
        return view('diario.index');
    }
}
