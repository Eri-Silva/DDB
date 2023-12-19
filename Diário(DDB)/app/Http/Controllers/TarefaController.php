<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    //
    public function index()
    {
        $anotacoes = Tarefa::all();
        return view('tarefas.index', compact('anotacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'tarefa' => 'required|string',
        ]);

        Tarefa::create([
            'titulo' => $request->titulo,
            'tarefa' => $request->tarefa,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Anotação criada com sucesso.');
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
