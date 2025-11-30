<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Dieta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Paciente::class);
        $pacientes = Paciente::all();
        // dd($alunos);
        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Paciente::class);
        $dietas = Dieta::all();
        return view('paciente.create', compact('dietas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Paciente::class);
        $dieta = Dieta::find($request->dieta);

        if(isset($dieta)) {
            $paciente = new Paciente();
            $paciente->nome = mb_strtoupper($request->nome, 'UTF-8');
            $paciente->email = $request->email;
            $paciente->telefone = $request->telefone;
            $paciente->altura = $request->altura;
            $paciente->idade = $request->idade;
            $paciente->peso_atual = $request->peso_atual;
            $paciente->dieta()->associate($dieta);
            $paciente->save();

            if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $paciente->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $paciente->foto = 'fotos/'.$name;
                $paciente->save();
            }
        }

        return redirect()->route('paciente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', Paciente::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::find($id);
        Gate::authorize('update', $paciente);

        if(isset($paciente)) {
            $dietas = Dieta::all();
            return view('paciente.edit', compact(['paciente', 'dietas']));
        }

        return redirect()->route('paciente.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paciente = Paciente::find($id);
        Gate::authorize('update', $paciente);
        $dieta = Dieta::find($request->dieta);

        if(isset($dieta) && isset($paciente)) {
            $paciente->nome = mb_strtoupper($request->nome, 'UTF-8');
            $paciente->email = $request->email;
            $paciente->telefone = $request->telefone;
            $paciente->altura = $request->altura;
            $paciente->idade = $request->idade;
            $paciente->peso_atual = $request->peso_atual;
            $paciente->dieta()->associate($dieta);

            if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $paciente->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $paciente->foto = 'fotos/'.$name;
            }
            $paciente->save();
        }

        return redirect()->route('paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paciente = Paciente::find($id);
        Gate::authorize('delete', $paciente);

        if(isset($paciente)) {
            $paciente->delete();
        }

        return redirect()->route('paciente.index');
    }

    public function report() {
        $pacientes = Paciente::with(['dieta'])->get();
        // Gera um PDF a partir de uma view Blade
        $pdf = Pdf::loadView('paciente.report', ['pacientes' => $pacientes]);
        // Exibe o PDF no navegador
        return $pdf->stream('document.pdf');
        // Ou Faz o download do PDF
        // return $pdf->download('document.pdf');
}
}