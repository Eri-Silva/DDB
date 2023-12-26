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

    public function update(Request $request, $id)
{
        $post = Tarefa::find($id);
    $post->update($request->all());
    return redirect()->route('tarefas.index')
      ->with('success', 'Anotação editada.');

    // Lidar com o caso em que a tarefa não foi encontrada (por exemplo, redirecionar ou mostrar uma mensagem de erro)
}


    public function destroy($id)
    {
        $post = Tarefa::find($id);
        $post->delete();
        return redirect()->route('tarefas.index')
          ->with('success', 'Anotação excluída com sucesso');
    }
}
