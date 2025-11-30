<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>{{ $titulo }}</title>

     <style>
            .nav-pills .nav-link.active {
                color: #FFF !important;
                background-color: #07be9fff !important;
            }
            .nav-pills .nav-link {
                color: #07be9fff !important;
            }

            .btn-tiffany {
            background-color: #07be9fff !important;
            color: #FFF !important;
            border: none !important;
            }
            .btn-tiffany:hover {
                background-color: #239864 !important; /* um pouco mais escuro no hover */
                color: #FFF !important;
            }

    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color: #07be9fff;">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('assets/img/logo.png') }}" style="border-radius: 25%;" width="56" height="56">
                <span class="ms-2 fs-4 fw-bold">Sistema Nutricional</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#itens">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-menu-button-wide" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z"/>
                    <path d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="itens">
                <ul class="navbar-nav ms-auto">

                    @can('viewAny', App\Models\Paciente::class)
                        <li class="nav-item me-2">
                            <a href="{{ route('paciente.index') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF"><path d="M640-402q-50.67 0-84.67-34t-34-84.67q0-50.66 34-84.66t84.67-34q50.67 0 84.67 34t34 84.66q0 50.67-34 84.67T640-402ZM400-160v-69.33q0-19.58 9.33-37.29 9.34-17.71 25.34-26.05 45-30.33 97.5-45.16 52.5-14.84 107.83-14.84t107.5 15.84q52.17 15.83 97.83 44.16 15.34 10.34 25 27Q880-249 880-229.33V-160H400Zm65.33-74v7.33h349.34V-234Q777-258 730-272t-90-14q-43 0-90.33 14-47.34 14-84.34 38ZM640-468.67q23 0 37.5-14.5t14.5-37.5q0-23-14.5-37.5t-37.5-14.5q-23 0-37.5 14.5t-14.5 37.5q0 23 14.5 37.5t37.5 14.5Zm0-52Zm0 294Zm-520-180v-66.66h310.67v66.66H120Zm0-326.66V-800h475.33v66.67H120ZM460.67-570H120v-66.67h373.33q-12 14.34-19.98 30.95-7.99 16.61-12.68 35.72Z"/></svg>
                                <span class="ps-1 text-white">Pacientes</span>
                            </a>
                        </li>
                    @endcan

                    @can('viewAny', App\Models\Dieta::class)
                        <li class="nav-item me-2">
                            <a href="{{ route('dieta.index') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF"><path d="M480-120q-117 0-198.5-81.5T200-400q0-98 59.5-173.83 59.5-75.84 154.17-98.5-24-5-46.34-14.5-22.33-9.5-40-27.17-29.66-30.33-39.16-70.83-9.5-40.5-7.84-82.84 15.67-5 30.83-4.5 15.17.5 26.17 8.17 65 6.33 109.84 55 44.83 48.67 45.16 116 13.67-39 36.84-72.83 23.16-33.84 52.16-62.84 9.67-9.66 23.34-9.66 13.66 0 23.33 9.66 9.67 9.67 9.67 23.34 0 13.66-9.67 23.33-24 24-43 52.17-19 28.16-31 59.5Q646-645 703-570.17q57 74.84 57 170.17 0 117-81.5 198.5T480-120Zm0-66.67q89 0 151.17-62.16Q693.33-311 693.33-400q0-89-62.16-151.17Q569-613.33 480-613.33q-89 0-151.17 62.16Q266.67-489 266.67-400q0 89 62.16 151.17Q391-186.67 480-186.67ZM480-400Z"/></svg>
                                <span class="ps-1 text-white">Dietas</span>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#FFF" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>

                            @auth
                                <span class="ps-1 text-white">{{ Auth::user() ? explode(" ", Auth::user()->name)[0] : 'Anônimo' }}</span>
                            @endauth
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#07be9fff" class="bi bi-key-fill" viewBox="0 0 16 16">
                                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                    </svg>
                                    <span class="ps-1 text-secondary ">Alterar Senha</span>
                                </a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li>
                                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#07be9fff" class="bi bi-door-open" viewBox="0 0 16 16">
                                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                                        </svg>
                                        <span class="ps-1 text-secondary ">Sair</span>
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="row">
            <div class="col">
                @if($cabecalho != '')
                    <h3 class="text-secondary"><b>{{ $cabecalho }}</b></h3>
                @endif
            </div>
            <div class="col d-flex justify-content-end">
                @if($rota != '')
                    

                    @can("create", $class)
                        <a href= "{{ route($rota) }}" class="btn btn-tiffany ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                        </a>
                    @endcan
                @endif
                @if($relatorio != '')
                        <a href= "{{ route($relatorio) }}" class="btn btn-tiffany ms-2" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                            <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                            <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <hr>
        @yield('conteudo')
    </div>
    <nav class="navbar fixed-bottom navbar-dark" style="background-color: #07be9fff;">
        <div class="container-fluid">
            <span class="text-white">&copy; Todos os direitos reservados.</span>
        </div>
    </nav>
</body>

<div class="modal fade" tabindex="-1" id="removeModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Operação de Remoção</h5>
          <button type="button" class="btn-close" data-bs-dismiss="removeModal" onclick="closeRemoveModal()" aria-label="Close"></button>
        </div>
        <input type="hidden" id="id_remove">
        <div class="modal-body text-secondary">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block align-content-center" onclick="closeRemoveModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Não
            </button>
          <button type="button" class="btn btn-danger" onclick="remove()">
                Sim &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
          </button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">

    function showRemoveModal(id, nome) {
        $('#id_remove').val(id);
        $('#removeModal').modal().find('.modal-body').html("");
        $('#removeModal').modal().find('.modal-body').append("<b>'"+nome+"'</b> ?");
        $("#removeModal").modal('show');
    }

    function closeRemoveModal() {
        $("#removeModal").modal('hide');
    }

    function remove() {

        let id = $('#id_remove').val();
        let form = "form_" + $('#id_remove').val();
        document.getElementById(form).submit();
        $("#removeModal").modal('hide')
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
@yield('script')
</html>
