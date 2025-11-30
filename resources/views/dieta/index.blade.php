@extends('templates/main',
[
    'titulo'=>"Sistema Nutricional",
    'cabecalho' => 'Lista de Dietas',
    'rota' => 'dieta.create',
    'relatorio' => 'report.dieta',
    'class' => App\Models\Dieta::class,
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

/* PARTICULAS NUTRICIONAIS */
.nutri {
    position: absolute;
    font-size: 26px;
    opacity: 0.85;
    animation: floatNutri 14s linear infinite;
    pointer-events: none;
    filter: drop-shadow(0 3px 6px rgba(0,0,0,0.25));
}

/* animação geral */
@keyframes floatNutri {
    0% { transform: translateY(110vh) rotate(0deg) scale(0.9); opacity: .25; }
    40% { opacity: 1; }
    100% { transform: translateY(-20vh) rotate(360deg) scale(1.2); opacity: 0; }
}

/* CARD GLASS */
.table-wrapper {
    margin-top: 18px;
    background: rgba(255,255,255,0.16);
    backdrop-filter: blur(14px);
    padding: 22px;
    border-radius: 16px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.22);
}

/* TABELA */
table.modern-table {
    width: 100%;
    border-radius: 12px;
    overflow: hidden;
    border-collapse: separate;
}

table.modern-table thead tr {
    background: linear-gradient(90deg, var(--green), var(--green-light));
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 1px;
}

table.modern-table tbody tr {
    background: rgba(255,255,255,0.18);
    transition: .28s ease;
}

table.modern-table tbody tr:hover {
    transform: translateY(-4px) scale(1.01);
    background: rgba(255,255,255,0.34);
    box-shadow: 0 10px 30px rgba(0,0,0,0.18), 0 0 12px rgba(65,217,123,0.18) inset;
}

td, th {
    padding: 14px 18px !important;
}

/* BOTÕES */
.btn-edit {
    border: 2px solid var(--green-light);
    color: var(--green-light);
    background: transparent;
    border-radius: 28px;
    padding: 6px 14px;
    font-weight: 700;
    transition: .2s;
}

.btn-edit:hover { background: var(--green); color: #fff; }

.btn-delete {
    border: 2px solid var(--danger);
    color: var(--danger);
    background: transparent;
    border-radius: 28px;
    padding: 6px 14px;
    font-weight: 700;
    transition: .2s;
}

.btn-delete:hover { background: var(--danger); color: #fff; }

</style>

{{-- ITENS NUTRICIONAIS FLUTUANDO --}}
@php
$icons = ['🥑','🍎','🍋','🥕','🍃','🍉','🥦','🍇','🍓'];
$quantidade = 22;
@endphp

@for ($i = 0; $i < $quantidade; $i++)
    @php
        $emoji = $icons[array_rand($icons)];
        $left = rand(2, 95);
        $delay = -($i * 0.8);
        $size = rand(22, 34);
    @endphp

    <div class="nutri" style="
        left: {{ $left }}%;
        font-size: {{ $size }}px;
        animation-delay: {{ $delay }}s;
    ">
        {{ $emoji }}
    </div>
@endfor


{{-- CARD PRINCIPAL --}}
<div class="table-wrapper">

    <table class="modern-table table align-middle">
        <thead>
            <tr>
                <th>NOME</th>
                <th class="d-none d-md-table-cell">OBJETIVO</th>
                <th>AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($dietas as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td class="d-none d-md-table-cell">{{ $item->objetivo }}</td>

                    <td class="text-nowrap">
                        <a href="{{ route('dieta.edit', $item->id) }}"
                           class="btn btn-sm btn-edit me-2">✏️ Editar</a>

                        <a nohref onclick="showRemoveModal('{{ $item->id }}', '{{ $item->nome }}')"
                           class="btn btn-sm btn-delete">🗑️ Excluir</a>
                    </td>

                    <form action="{{ route('dieta.destroy', $item->id) }}" method="POST" id="form_{{ $item->id }}">
                        @csrf
                        @method('delete')
                    </form>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
