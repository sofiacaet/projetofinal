<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Dieta::class);
        $dietas = Dieta::all();
        return view('dieta.index', compact('dietas'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dieta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dieta = new Dieta();
        $dieta->nome = mb_strtoupper($request->nome, 'UTF-8');
        $dieta->objetivo = $request->objetivo;
        $dieta->save();

        return redirect()->route('dieta.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dieta = Dieta::find($id);

        if(isset($dieta)) {
            return view('dieta.edit', compact('dieta'));
        }
        return redirect()->route('dieta.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dieta = Dieta::find($id);

        if(isset($dieta)) {
            $dieta->nome = mb_strtoupper($request->nome, 'UTF-8');
            $dieta->objetivo = $request->objetivo;
            $dieta->save();
        }

        return redirect()->route('dieta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dieta = Dieta::find($id);
        if(isset($dieta)){
            $dieta->delete();
        }

        return redirect()->route('dieta.index');
    }

    /**
     * Report - PDF
     */
    public function report()
    {
        $dietas = Dieta::all();
        $pdf = Pdf::loadView('dieta.report', compact('dietas'));

        return $pdf->stream('Relatorio_Dietas.pdf');
        // return $pdf->download('Relatorio_Cursos.pdf');
    }
}
