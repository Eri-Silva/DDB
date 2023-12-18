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
        $request->validate([
            'titulo' => 'required|string',
            'conteudo' => 'required|string',
        ]);

        $diario = Diario::findOrFail($id);
        $diario->update([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('diario.index')->with('success', 'Página do diário atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $diario = Diario::findOrFail($id);
        $diario->delete();

        return redirect()->route('diario.index')->with('success', 'Página do diário deletada com sucesso.');
    }
}
