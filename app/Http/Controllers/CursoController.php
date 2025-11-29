<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         Gate::authorize('viewAny', Curso::class);
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->duracao = $request->duracao;
        $curso->save();

        return redirect()->route('curso.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::find($id);

        if(isset($curso)) {
            return view('curso.edit', compact('curso'));
        }
        return redirect()->route('curso.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::find($id);

        if(isset($curso)) {
            $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
            $curso->duracao = $request->duracao;
            $curso->save();
        }

        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        if(isset($curso)){
            $curso->delete();
        }

        return redirect()->route('curso.index');
    }

    /**
     * Report - PDF
     */
    public function report()
    {
        $cursos = Curso::all();
        $pdf = Pdf::loadView('curso.report', compact('cursos'));

        return $pdf->stream('Relatorio_Cursos.pdf');
        // return $pdf->download('Relatorio_Cursos.pdf');
    }
}
