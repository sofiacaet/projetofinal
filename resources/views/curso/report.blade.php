<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Cursos - Sistema Aula </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin: 1cm 0.5cm;
            color: #000;
        }
        .texto-marca-dagua {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 7em;
            color: #888;
            opacity: 0.3;
            pointer-events: none;
            white-space: nowrap;
        }
        .texto-restrito-cima,
        .texto-restrito-baixo {
            border: 1px solid #999;
            color: #999;
            font-weight: bolder;
            text-align: center;
            padding: 1px 8px;
            position: fixed;
            left: 130px;
        }
        .texto-restrito-cima { top: 0px; font-size: 18px; }
        .texto-restrito-baixo { bottom: 0px; font-size: 20px; }
        .header { text-align: center; margin-bottom: 0.5rem; font-weight: bold; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th { text-transform: uppercase; background-color: #eee; }
    </style>
</head>
<body>

    <div class="texto-marca-dagua"> IFPR - PARANAGUÁ </div>
    <div class="texto-restrito-cima"> DOCUMENTO GERADO PELO SISTEMA CURSO </div>

    <hr>

    <table style="width: 100%;">
        <tr>
            <td style="width: 75px;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo_ifpr.png'))) }}" width="78" height="78">
            </td>
            <td style="text-align: center;">
                <div style="font-size: 18px;">GOVERNO FEDERAL DO BRASIL</div>
                <div style="font-size: 18px;">MINISTÉRIO DA EDUCAÇÃO</div>
                <div style="font-size: 18px; font-weight: bold;">INSTITUTO FEDERAL</div>
                <div style="font-size: 18px; font-weight: bold;">PARANAGUÁ</div>
            </td>
            <td style="width: 75px;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logo_ifpr.png'))) }}" width="90" height="90">
            </td>
        </tr>
    </table>

    <hr>

    <h3 style="text-align:center; margin-top:10px;">Relatório de Cursos</h3>

    <table>
        <thead>
            <tr>
                <th>Nome do Curso</th>
                <th>Duracao</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->duracao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="texto-restrito-baixo"> DOCUMENTO GERADO PELO SISTEMA CURSO </div>

</body>
</html>
