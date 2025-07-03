<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Mesquita | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <!-- DataTables + Buttons CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

  <!-- jQuery (se não estiver incluído ainda) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables + Plugins -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Export files (Excel, CSV, PDF) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>

<style>
  .card-laranja {
    border-top: 4px solidrgb(156, 69, 28);
  }
  .card-laranja .card-header {
    background-color: #2757a4;
    color: #fff;
  }


</style>

<body class="hold-transition sidebar-mini layout-fixed" >
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/logo.png" alt="AdminLTELogo" height="150" width="150">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color:#fff; background-color:#0056b3;"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contato</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar"  type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="border-right: 1px solid #0056b3;">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="img/logo.png" alt="" class="brand-image " style="opacity: .8; width: 100px">
        <span class="brand-text font-weight-light">.</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/logo.png" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="color:#fff"> {{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
            <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar bg-white text-dark" 
                    type="search" placeholder="Buscar" aria-label="Buscar"
                    style="border: 1px solid #ccc;">
              <div class="input-group-append">
              <button class="btn btn-sidebar bg-white text-primary" style="border: 1px solid #ccc;">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

  <!-- Include Menu -->
        @include('layouts.menu')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
      

          {{-- ↓↓↓ AQUI COMEÇA O BLOCO DE GUARDA VOLUME ↓↓↓ --}}
          <!-- <div class="card   card-laranja mb-4"> -->
            <div class="card-header">
              <!-- <h3 class="card-title">Guarda Volume - Consulta</h3> -->
            </div>
            <div class="card-body">
              @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
              {{-- Formulário de busca estilo PDV --}}
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <form method="POST" action="{{ route('guarda_volume.buscar') }}">
                    @csrf
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-white">
                        <i class="fas fa-qrcode text-primary"></i>
                      </span>
                      <input type="hidden" id="idUserCaixa" value="{{ Auth::user()->id }}">

                      <input type="text"
                        id="codigo_qrcode"
                        name="codigo_qrcode"
                        class="form-control form-control-lg border-primary"
                        placeholder="Escaneie ou digite o QR Code"
                        required autofocus
                        style="font-size: 1.5rem;">

                      <!-- <div class="input-group-append">
                        <button class="btn btn-primary btn-lg px-4" type="submit" style="font-size: 1.3rem;">
                          <i class="fas fa-search"></i> Buscar registro
                        </button>
                      </div> -->
                    </div>
                  </form>
                </div>
              </div>

              <div class="text-end my-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalQrCode">
                  <i class="bi bi-plus-circle"></i> Gerar Novo QR Code
                </button>
              </div>

              {{-- Tabela de QR Codes --}}
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover text-center align-middle">
                  <thead class="table-light" style="color: #fff; background-color: #2757a4">
                    <tr>
                      <th>QR Code</th>
                      <th>Cliente</th>
                      <th>Valor</th>
                      <th>Produto</th>
                      <th>Status</th>
                      <th>Gerado por</th>
                      <th>Data de Uso</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($qrcodes as $qr)
                    <tr>
                      <td>
                        <div style="margin: 10px 0;">
                          {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($qr->code) !!}
                        </div>

                        {{-- Conteúdo oculto para impressão --}}
                        <div id="qrcode-{{ $qr->id }}" style="display: none;">
                          <div style="text-align: center; font-family: Arial, sans-serif;">
                            <h2 style="margin: 0;">Mesquita Soluções Empresariais</h2>
                            <p style="margin: 0;">CNPJ: 17.105.516/0001-01</p>
                            <div style="margin: 20px 0;">
                              {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($qr->code) !!}
                            </div>
                            <p><strong>Código:</strong> {{ $qr->id }}</p>
                          </div>
                        </div>
                      </td>

                      <td>{{ $qr->cliente->nome ?? 'Geral' }}</td>

                      <td>
                        @if (empty($qr->caixaItem->valorapagar))
                        <span class="badge bg-danger">Pendente</span>
                        @else
                        R$ {{ number_format($qr->caixaItem->valorapagar, 2, ',', '.') }}
                        @endif
                      </td>

                      <td>{{ $qr->produto->descricao ?? '---' }}</td>

                      <td>
                        @if ($qr->used_at)
                        <span class="badge bg-danger">Usado</span>
                        @else
                        <span class="badge bg-success">Disponível</span>
                        @endif
                      </td>

                      <td>{{ $qr->user->name ?? '---' }}</td>

                      <td>{{ $qr->used_at ? \Carbon\Carbon::parse($qr->used_at)->format('d/m/Y H:i') : '---' }}</td>

                      <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalCliente{{ $qr->id }}">
                          <i class="bi bi-eye"></i> Ver Cliente
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="imprimirQRCode('qrcode-{{ $qr->id }}')">
                          <i class="bi bi-printer"></i> Imprimir QRcode
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

  <!-- Modal para finalizar venda -->
    @if(session('guardaVolume'))
<!-- Modal: Finalizar Pagamento -->
<div class="modal fade" id="modalFinalizar" tabindex="-1" aria-labelledby="modalFinalizarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('guarda.finalizar') }}">
      @csrf
      <input type="hidden" name="qrcode_id" value="{{ session('guardaVolume')->id }}">
      <input type="hidden" name="valor_base" value="{{ session('valorAPagar') }}">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFinalizarLabel">Finalizar Pagamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>

        <div class="modal-body">
          <div class="mb-2"><strong>Cliente:</strong> {{ session('guardaVolume')->cliente->nome ?? '---' }}</div>
          <div class="mb-2"><strong>Pertence:</strong> {{ session('guardaVolume')->descricao ?? '---' }}</div>
          <div class="mb-2"><strong>Tempo:</strong> {{ session('tempoGuardado') ?? '---' }} h</div>
          <div class="mb-3"><strong>Valor base:</strong> R$ {{ number_format(session('valorAPagar') ?? 0, 2, ',', '.') }}</div>

          <div class="mb-3">
            <label for="desconto" class="form-label">Desconto (R$)</label>
            <input type="number" step="0.01" name="desconto" id="desconto" class="form-control" value="0">
          </div>

          <div class="mb-3">
            <label for="acrescimo" class="form-label">Acréscimo (R$)</label>
            <input type="number" step="0.01" name="acrescimo" id="acrescimo" class="form-control" value="0">
          </div>

          <div class="mb-3">
          <label for="formadepagamento" class="form-label">Forma de Pagamento</label>
          <select name="formadepagamento" id="formadepagamento" class="form-control" required>
            <option value="" disabled selected>Escolha a forma</option>
            @foreach($formasPagamentos as $forma)
              <option value="{{ $forma->descricao }}">{{ $forma->descricao }}</option>
            @endforeach
          </select>
        </div>
      </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Finalizar Pagamento</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif

@if(session('abrir_modal'))
<script>
  window.onload = function () {
    var modal = new bootstrap.Modal(document.getElementById('modalFinalizar'));
    modal.show();
  };
</script>
@endif
<!-- Fim Modal finalizar venda com js-->


              <!-- Modal: Abrir Caixa -->
              <div class="modal fade" id="modalAbrirCaixa" tabindex="-1" aria-labelledby="modalAbrirCaixaLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form id="formAbrirCaixa">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Abrir Caixa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="valor_inicial">Valor Inicial</label>
                          <input type="number" step="0.01" class="form-control" name="valor_inicial" id="valor_inicial" required>
                        </div>

                        <input type="hidden" id="idUserCaixa" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="idFilialCaixa" value="{{ auth()->user()->idfilial ?? 1 }}">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Abrir Caixa</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="modalQrCode" tabindex="-1" aria-labelledby="modalQrCodeLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form method="POST" action="{{ route('qrcode.gerar') }}">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Gerar QR Code para Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">X</button>
                      </div>
                      <div class="modal-body">

                        <!-- Produto -->
                        <div class="mb-3">
                          <label for="produto_id" class="form-label">Produto</label>
                          <select name="produto_id" id="produto_id" class="form-control" required>
                            <option value="" disabled selected>Escolha um produto</option>
                            @foreach ($produtos as $produto)
                            <option value="{{ $produto->idproduto }}" data-valor="{{ $produto->valor }}"
                              data-descricao="{{ $produto->descricao }}">
                              {{ $produto->descricao }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                        <!-- Valor -->
                        <div class="mb-3">
                          <label for="valor_produto" class="form-label">Valor do Produto</label>
                          <input type="text" id="valor_produto" class="form-control" readonly>
                        </div>

                        <!-- Campos do cliente e descrição -->
                        <div id="dados-cliente" style="display: none;">
                          <hr>
                          <h6>Dados do Cliente</h6>
                          <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição do Pertence</label>
                            <input type="text" name="descricao" id="descricao" class="form-control">
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Gerar QR Code</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal caixa aberto -->
            <div class="modal fade" id="modalQrCode" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate(auth()->user()->id) !!}
                  </div>
                </div>
              </div>
            </div>


            <!-- Modal visualizar cliente -->
            @foreach ($qrcodes as $qr)
            <div class="modal fade" id="modalCliente{{ $qr->id }}" tabindex="-1" aria-labelledby="modalClienteLabel{{ $qr->id }}"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalClienteLabel{{ $qr->id }}">Informações do Cliente</h5>
                  </div>
                  <div class="modal-body">
                    <p><strong>Nome:</strong> {{ $qr->cliente->nome ?? '---' }}</p>
                    <p><strong>CPF:</strong> {{ $qr->cliente->cpf ?? '---' }}</p>
                    <p><strong>E-mail:</strong> {{ $qr->cliente->email ?? '---' }}</p>
                    <p><strong>Telefone:</strong> {{ $qr->cliente->telefone ?? '---' }}</p>
                    <p><strong>Pertences:</strong> {{ $qr->descricao ?? '---' }}</p>
                    <td>
                      <span><strong>Qrcode:</strong></span>
                      @if ($qr->used_at)
                      <span class="badge badge-danger">Usado</span>
                      @else
                      <span class="badge badge-success">Disponível</span>
                      @endif
                    </td>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="#">Mesquita</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
  </div>

  <script>
    // Se você tiver vários botões e quiser passar o ID do produto para o select do modal
    document.querySelectorAll('.botao-produto').forEach(botao => {
      botao.addEventListener('click', function() {
        const produtoId = this.dataset.produtoId;
        document.querySelector('#produto_id').value = produtoId;
      });
    });
  </script>
  <!-- ./wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectProduto = document.getElementById('produto_id');
      const inputValor = document.getElementById('valor_produto');

      selectProduto.addEventListener('change', function() {
        const valor = this.options[this.selectedIndex].getAttribute('data-valor');
        if (valor) {
          inputValor.value = 'R$ ' + parseFloat(valor).toFixed(2).replace('.', ',');
        } else {
          inputValor.value = '';
        }
      });
    });
  </script>
  <!-- Dados do cliente -->

  <script>
    document.getElementById('produto_id').addEventListener('change', function() {
      let selectedOption = this.options[this.selectedIndex];
      let valor = selectedOption.getAttribute('data-valor');
      let descricao = selectedOption.getAttribute('data-descricao');

      // Atualiza campo de valor
      document.getElementById('valor_produto').value = parseFloat(valor).toFixed(2).replace('.', ',');

      // Mostra os campos de cliente se o produto for "Guarda Volume"
      if (descricao && descricao.toLowerCase().includes("guarda volume")) {
        document.getElementById('dados-cliente').style.display = 'block';
        // Torna campos obrigatórios
        document.getElementById('nome').required = true;
        document.getElementById('cpf').required = true;
        document.getElementById('email').required = true;
        document.getElementById('telefone').required = true;
        document.getElementById('descricao').required = true;
      } else {
        document.getElementById('dados-cliente').style.display = 'none';
        document.getElementById('nome').required = false;
        document.getElementById('cpf').required = false;
        document.getElementById('email').required = false;
        document.getElementById('telefone').required = false;
        document.getElementById('descricao').required = false;

      }
    });
  </script>

  <!-- DataTables Config -->
  <script>
    $(function() {
      $("#example1").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        language: {
          "sEmptyTable": "Nenhum dado disponível na tabela",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sSearch": "Buscar:",
          "sZeroRecords": "Nenhum registro encontrado",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sLast": "Último",
            "sNext": "Próximo",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": ativar para ordenar a coluna de forma crescente",
            "sSortDescending": ": ativar para ordenar a coluna de forma decrescente"
          },
          "buttons": {
            "copy": "Copiar",
            "csv": "CSV",
            "excel": "Excel",
            "pdf": "PDF",
            "print": "Imprimir",
            "colvis": "Colunas"
          }
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('#example2').DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        language: {
          "sEmptyTable": "Nenhum dado disponível na tabela",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sSearch": "Buscar:",
          "sZeroRecords": "Nenhum registro encontrado",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sLast": "Último",
            "sNext": "Próximo",
            "sPrevious": "Anterior"
          }
        }
      });
    });
  </script>


  </script>
  <script>
    function imprimirQRCode(elementId) {
      const qrContent = document.getElementById(elementId).innerHTML;
      const printWindow = window.open('', '', 'width=300,height=300');
      printWindow.document.write(`
        <html>
            <head>
                <title>Imprimir QR Code</title>
                <style>
                    body { text-align: center; padding: 30px; font-family: Arial, sans-serif; }
                </style>
            </head>
            <body>
                ${qrContent}
                <script>
                    window.onload = function () {
                        window.print();
                        window.onafterprint = function () {
                            window.close();
                        };
                    };
                <\/script>
            </body>
        </html>
    `);
      printWindow.document.close();
    }

    // Verifica se tem caixa aberto
    document.addEventListener('DOMContentLoaded', function() {
      const iduser = document.getElementById('idUserCaixa').value;

      fetch('/verifica-caixa-aberto', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            iduser
          })
        })
        .then(res => res.json())
        .then(data => {
          if (!data.caixa_aberto) {
            alert('Você não tem um caixa aberto.');
          
            // Exibe o modal para preenchimento do valor inicial
            const modal = new bootstrap.Modal(document.getElementById('modalAbrirCaixa'));
            modal.show();
          }
        })
        .catch(err => {
          console.error('Erro ao verificar caixa:', err);
          alert('Erro ao verificar caixa. Veja o console.');
        });
    });

document.getElementById('formAbrirCaixa').addEventListener('submit', function (e) {
  e.preventDefault(); // Impede envio tradicional

  const iduser = document.getElementById('idUserCaixa').value;
  const idfilial = document.getElementById('idFilialCaixa').value;
  const valor_inicial = document.getElementById('valor_inicial').value;

  fetch('/abrir-caixa', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ iduser, idfilial, valor_inicial })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert('Caixa aberto com sucesso! ID: ' + data.id);
      // Fecha o modal
      const modal = bootstrap.Modal.getInstance(document.getElementById('modalAbrirCaixa'));
      modal.hide();
    } else {
      alert('Erro ao abrir caixa: ' + (data.message || 'Desconhecido'));
    }
  })
  .catch(err => {
    console.error('Erro ao abrir caixa:', err);
    alert('Erro ao abrir caixa. Veja o console.');
  });
});

    
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vendor/adminlte/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vendor/adminlte/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="vendor/adminlte/dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/modal_qrcode.js?v=1.01') }}"></script>

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</body>

</html>