<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidato;

class VotacaoController extends Controller
{
    public function index()
    {
        $categoria_candidato = "Presidente";
        return view('index', compact('categoria_candidato'));
    }

    public function governador()
    {
        $categoria_candidato = "Governador";
        return view('governador', compact('categoria_candidato'));
    }

    public function prefeito()
    {
        $categoria_candidato = "Prefeito";
        return view('prefeito', compact('categoria_candidato'));
    }

    public function fim()
    {
        $presidentes = Candidato::where('categoria', 'Presidente')->orderBy('votos', 'desc')->get();
        $governadores = Candidato::where('categoria', 'Governador')->orderBy('votos', 'desc')->get();
        $prefeitos = Candidato::where('categoria', 'Prefeito')->orderBy('votos', 'desc')->get();
        //dd(count($prefeitos));
        return view('fim', compact('presidentes', 'governadores', 'prefeitos'));
    }

    public function consultar_candidato(Request $request, $num_candidato)
    {
        try {
            $categoria = $request->input('categoria');
            $candidato = Candidato::where('numero', $num_candidato)->where('categoria', $categoria)->first();
            //dd($candidato);

            if (!empty($candidato)) {
                return response()->json($candidato);
            }else{
                throw new \Exception('Erro');
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function confirmar_voto(Request $request)
    {
        $num_candidato = $request->input('num1').$request->input('num2');

        $candidato = Candidato::where('numero', $num_candidato)->first();

        if (empty($candidato)) {
            return redirect()->back()->with('danger', 'Candidato não encontrado.');
        }
        $num_votos = $candidato->votos;
        $categoria = $candidato->categoria;

        $candidato->votos = $num_votos + 1;
        $candidato->save();

        if($categoria == "Presidente"){
            return redirect()->route('governador')->with('success', 'Voto realizado.');
        }else if($categoria == "Governador"){
            return redirect()->route('prefeito')->with('success', 'Voto realizado.');
        }else if($categoria == "Prefeito"){
            return redirect()->route('fim')->with('success', 'Voto realizado.');
        }

    }
}
