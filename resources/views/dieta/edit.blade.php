@extends('templates/main',
[
    'titulo'=>"Sistema Nutricional",
    'cabecalho' => 'Alterar Dieta',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

<style>
:root{
    --green: #41d97b;
    --green-strong: #2fbe66;
    --green-light: #7fffc0;
    --danger: #ff5c5c;
}

/* FUNDO */
body {
    background: linear-gradient(135deg, #b2ffd6 0%, #4ccf8a 50%, #239864 100%);
    min-height: 100vh;
    padding: 22px;
    overflow: hidden;
    color: #fff;
}

/* PARTÍCULAS NUTRICIONAIS FLUTUANDO */
.nutri {
    position: absolute;
    font-size: 26px;
    opacity: 0.85;
    animation: floatNutri 14s linear infinite;
    pointer-events: none;
    filter: drop-shadow(0 3px 6px rgba(0,0,0,0.25));
}

@keyframes floatNutri {
    0% { transform: translateY(110vh) rotate(0deg) scale(0.9); opacity: .2; }
    40% { opacity: 1; }
    100% { transform: translateY(-20vh) rotate(360deg) scale(1.3); opacity: 0; }
}

/* CARD FORM */
.form-card {
    background: rgba(255,255,255,0.16);
    backdrop-filter: blur(14px);
    padding: 28px;
    border-radius: 18px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.22);
    margin-top: 18px;
}

/* INPUTS */


.form-floating > .form-control {
    background: rgba(255, 255, 255, 0.90) !important; /* QUASE BRANCO */
    border: 2px solid transparent;
    color: #333;
    border-radius: 12px !important;
    transition: .25s;
    font-weight: 600;
}

.form-floating .form-control::placeholder {
    color: #666 !important;
}

.form-floating > .form-control:focus {
    border-color: var(--green-light);
    background: rgba(255, 255, 255, 1) !important; /* 100% branco ao focar */
    box-shadow: 0 0 12px rgba(65, 217, 123, 0.35);
    color: #222;
}

/* LABEL */
.form-floating label {
    color: #0a6c43 !important;
    font-weight: 700;
    text-shadow: 0 0 2px rgba(255,255,255,0.4);
}

/* BOTÕES */
.btn-custom-back {
    border: 2px solid #e7eee9;
    color: #fff;
    border-radius: 28px;
    padding: 8px 20px;
    transition: .2s;
    background: rgba(255,255,255,0.10);
}

.btn-custom-back:hover {
    background: rgba(255,255,255,0.30);
}

.btn-custom-confirm {
    border: 2px solid var(--green-light);
    background: var(--green);
    border-radius: 28px;
    padding: 8px 22px;
    color: #fff;
    font-weight: 700;
    transition: .2s;
    box-shadow: 0 0 10px rgba(65,217,123,0.28);
}

.btn-custom-confirm:hover {
    background: var(--green-strong);
    box-shadow: 0 0 18px rgba(65,217,123,0.45);
}
</style>


{{-- PARTICULAS IGUAIS À LISTA --}}
@php
$icons = ['🥑','🍎','🍋','🥕','🍃','🍉','🥦','🍇','🍓'];
$quantidade = 18;
@endphp

@for ($i = 0; $i < $quantidade; $i++)
    @php
        $emoji = $icons[array_rand($icons)];
        $left = rand(2, 95);
        $delay = -($i * 0.7);
        $size = rand(20, 34);
    @endphp

    <div class="nutri" style="
        left: {{ $left }}%;
        font-size: {{ $size }}px;
        animation-delay: {{ $delay }}s;
    ">
        {{ $emoji }}
    </div>
@endfor



<div class="form-card">

<form action="{{route('dieta.update', $dieta->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col">
            <div class="form-floating mb-4">
                <input
                    type="text"
                    class="form-control"
                    name="nome"
                    placeholder="Nome da Dieta"
                    value="{{ $dieta->nome }}"
                />
                <label for="nome">Nome da Dieta</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-4">
                <input
                    type="text"
                    class="form-control"
                    name="objetivo"
                    placeholder="Objetivo"
                    value="{{ $dieta->objetivo }}"
                />
                <label for="objetivo">Objetivo</label>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col d-flex gap-3">

            <a href="{{route('dieta.index')}}" class="btn btn-custom-back">
                ⬅️ Voltar
            </a>

            <button type="submit" class="btn btn-custom-confirm ms-auto">
                ✔️ Confirmar
            </button>

        </div>
    </div>

</form>

</div>

@endsection
