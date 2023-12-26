<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diario; // Certifique-se de ajustar o namespace conforme a localização real do seu modelo

class DiarioController extends Controller
{
    public function index()
    {
        $diarios = Diario::all();
        return view('diario.index', compact('diarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'conteudo' => 'required|string',
        ]);

        Diario::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('diario.index')->with('success', 'Página do diário criada com sucesso.');
    }

    public function update(Request $request, $id)
{
        $post = Diario::find($id);
    $post->update($request->all());
    return redirect()->route('diario.index')
      ->with('success', 'Página editada.');

    // Lidar com o caso em que a tarefa não foi encontrada (por exemplo, redirecionar ou mostrar uma mensagem de erro)
}


    public function destroy($id)
    {
        $post = Diario::find($id);
        $post->delete();
        return redirect()->route('diario.index')
          ->with('success', 'Página excluída com sucesso');
    }
}
