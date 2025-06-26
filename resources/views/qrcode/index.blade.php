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
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<<<<<<< HEAD
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
=======
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
>>>>>>> 3a1a21d451cf1e9e746b78a1d91158460b2410f5
  @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
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
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="img/logo.png" alt="" class="brand-image " style="opacity: .8; width: 100px">
        <span class="brand-text font-weight-light">Mesquita</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>

          </div>3
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-danger"></span>New -->
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Relatórios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Vendas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mensal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Diario</p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Cadastros
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('filiais') }}" class="nav-link {{ request()->is('filiais*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Filiais</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('produtos.index') }}"
                    class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('formapagamento.index') }}" class="nav-link">
                    <i class="fas fa-money-bill nav-icon"></i>
                    <p>Formas de Pagamento</p>
                  </a>
                </li>

              </ul>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('qrcode.index')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Total QR Codes -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $totalQRCodes }}</h3>
                  <p>Total de QR Codes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-qr-scanner"></i> <!-- Ícone relacionado a QR Codes -->
                </div>

              </div>
            </div>
            <!-- Usados -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $qrcodesUsados }}</h3>
                  <p>QR Codes Usados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-checkmark-circled"></i>
                </div>

              </div>
            </div>
            <!-- Disponíveis -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $qrcodesDisponiveis }}</h3>
                  <p>QR Codes Disponíveis</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-box-outline"></i>
                </div>

              </div>
            </div>
            <!-- Espaço para mais algum dado se quiser -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $totalQRCodes - $qrcodesUsados - $qrcodesDisponiveis }}</h3>
                  <p>Outros Status</p>
                </div>
                <div class="icon">
                  <i class="ion ion-alert-circled"></i>
                </div>

              </div>
            </div>
          </div>
        </div>


        {{-- ↓↓↓ AQUI COMEÇA O BLOCO DE GUARDA VOLUME ↓↓↓ --}}
        <div class="card card-secondary mb-4">
          <div class="card-header">
            <h3 class="card-title">Guarda Volume - Consulta</h3>
          </div>
          <div class="card-body">
            @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

            {{-- Formulário de busca --}}
            <form method="POST" action="{{ route('guarda_volume.buscar') }}" class="mb-4">
              @csrf
              <div class="input-group">
                <input type="text" id="codigo_qrcode" name="codigo_qrcode" class="form-control"
                  placeholder="Escaneie ou digite o QR Code" required autofocus>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </div>
              </div>
            </form>

            @isset($guardaVolume)
        {{-- Exibe dados do QRCode encontrado --}}
        <h5>Informações do Cliente e Pertence</h5>
        <table class="table table-sm table-bordered">
          <tr>
          <th>Cliente</th>
          <td>{{ $guardaVolume->cliente->nome ?? '---' }}</td>
          </tr>
          <tr>
          <th>Descrição</th>
          <td>{{ $guardaVolume->cliente->descricao ?? '---' }}</td>
          </tr>
          <tr>
          <th>Entrada</th>
          <td>{{ $guardaVolume->created_at->format('d/m/Y H:i') ?? '---' }}</td>
          </tr>
          <tr>
          <th>Tempo (h)</th>
          <td>{{ $tempoGuardado }}hr</td>
          </tr>
          <tr>
          <th>Valor a Pagar</th>
          <td>R$ {{ number_format($valorAPagar, 2, ',', '.') }}</td>
          </tr>
        </table>

        {{-- Botão para abrir modal de finalizar compra --}}
        <div class="text-end">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFinalizar">
          Finalizar venda
          </button>
        </div>
<<<<<<< HEAD
      @endisset
=======

          <div class="modal-body">
          <div class="mb-2"><strong>Cliente:</strong> {{ $guardaVolume->cliente->nome ?? '---' }}</div>
          <div class="mb-2"><strong>Pertence:</strong> {{ $guardaVolume->descricao ?? '---' }}</div>
          <div class="mb-2"><strong>Tempo:</strong>  <td>{{ $tempoGuardado ?? '---' }}</td> h</div>
          <div class="mb-3"><strong>Valor base:</strong> R$ {{ number_format($valorAPagar ?? 0, 2, ',', '.') }}</div>

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
              <option value="dinheiro">Dinheiro</option>
              <option value="pix">Pix</option>
              <option value="debito">Débito</option>
              <option value="credito">Crédito</option>
            </select>
>>>>>>> 3a1a21d451cf1e9e746b78a1d91158460b2410f5
          </div>
        </div>
        {{-- ↑↑↑ FIM BLOCO DE GUARDA VOLUME ↑↑↑ --}}

        <!-- Modal: Finalizar Compra -->
        <div class="modal fade" id="modalFinalizar" tabindex="-1" aria-labelledby="modalFinalizarLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="{{ route('guarda.finalizar') }}">
              @csrf
              <input type="hidden" name="qrcode_id" value="{{ $guardaVolume->id ?? '' }}">
              <input type="hidden" name="valor_base" value="{{ $valorAPagar ?? 0 }}">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalFinalizarLabel">Finalizar Pagamento</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">X</button>
                </div>

                <div class="modal-body">
                  <div class="mb-2"><strong>Cliente:</strong> {{ $guardaVolume->cliente->nome ?? '---' }}</div>
                  <div class="mb-2"><strong>Pertence:</strong> {{ $guardaVolume->descricao ?? '---' }}</div>
                  <div class="mb-2"><strong>Tempo:</strong>
                    <td>{{ $tempoGuardado ?? '---' }}</td> h
                  </div>
                  <div class="mb-3"><strong>Valor base:</strong> R$ {{ number_format($valorAPagar ?? 0, 2, ',', '.') }}
                  </div>

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
                    <select name="formadepagamento" id="formadepagamento" class="form-select" required>
                      <option value="" disabled selected>Escolha a forma</option>
                      <option value="dinheiro">Dinheiro</option>
                      <option value="pix">Pix</option>
                      <option value="debito">Débito</option>
                      <option value="credito">Crédito</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirmar Pagamento</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Fim Modal -->
        <div class="text-end my-3">
          <button type="button" class="btn btn-primary" id="btn-abrir-qrcode" data-user-id="{{ auth()->user()->id }}">
            <i class="bi bi-plus-circle"></i> Gerar Novo QR Code
          </button>
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
<<<<<<< HEAD
=======
      </div>
    </form>
  </div>
</div>
</div>
<!-- Fim Modal Gerar -->
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>QRcode</th>
              <th>Cliente</th>
              <th>valor pago</th>
              <th>Produto</th>
              <th>Status</th>
              <th>Gerador por:</th>
              <th>Data de Uso</th>
              <th>Ação</th>
            </tr>
          </thead>
        <tbody>
  @foreach ($qrcodes as $qr)
    <tr>
  <td class="text-center">
  <div id="qrcode-{{ $qr->id }}">
    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($qr->code) !!}
  </div>
</td>

  <td> {{ $qr->cliente->nome ?? '---' }}</td>
  <td>
    @if(empty($qr->caixaItem->valorapagar))
    <span class="badge badge-danger">Pendente</span>
    @else
    R$ {{ number_format($qr->caixaItem->valorapagar, 2, ',', '.') }}
    @endif
  </td>
  <td>{{ $qr->produto->descricao ?? '---' }}</td>
        <td>
          @if ($qr->used_at)
          <span class="badge badge-danger">Usado</span>
          @else
          <span class="badge badge-success">Disponível</span>
          @endif
        </td>
        <td>{{ $qr->user->name ?? '---' }}</td>
      <td>{{ $qr->used_at ? \Carbon\Carbon::parse($qr->used_at)->format('d/m/Y H:i') : '---' }}</td>
      <td>
  <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalCliente{{ $qr->id }}">
    <i class="bi bi-eye"></i> Ver Cliente
  </button>
  <button
    class="btn btn-primary btn-sm"
    onclick="imprimirQRCode('qrcode-{{ $qr->id }}')">
    <i class="bi bi-printer"></i> Imprimir QRcode
  </button>
</td>
    </tr>
  @endforeach
</tbody>
        </table>
>>>>>>> 86b9a5473c593bbc3b07c9214664d241d03817ca
    </div>
    <!-- Fim Modal Gerar -->
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>QRcode</th>
          <th>Cliente</th>
          <th>valor</th>
          <th>Produto</th>
          <th>Status</th>
          <th>Gerador por:</th>
          <th>Data de Uso</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($qrcodes as $qr)
        <tr>
          <td class="text-center">
          <div id="qrcode-{{ $qr->id }}">
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($qr->code) !!}
          </div>
          </td>

          <td> {{ $qr->cliente->nome ?? '---' }}</td>
          <td>
          @if(empty($qr->caixaItem->valorapagar))
        <span class="badge badge-danger">Pendente</span>
        @else
        R$ {{ number_format($qr->caixaItem->valorapagar, 2, ',', '.') }}
        @endif
          </td>
          <td>{{ $qr->produto->descricao ?? '---' }}</td>
          <td>
          @if ($qr->used_at)
        <span class="badge badge-danger">Usado</span>
        @else
        <span class="badge badge-success">Disponível</span>
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
  <!-- Modal visualizar cliente -->
  @foreach ($qrcodes as $qr)
    <div class="modal fade" id="modalCliente{{ $qr->id }}" tabindex="-1" aria-labelledby="modalClienteLabel{{ $qr->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
<<<<<<< HEAD
      <div class="modal-header">
        <h5 class="modal-title" id="modalClienteLabel{{ $qr->id }}">Informações do Cliente</h5>
      </div>
      <div class="modal-body">
        <p><strong>Nome:</strong> {{ $qr->cliente->nome ?? '---' }}</p>
        <p><strong>CPF:</strong> {{ $qr->cliente->cpf ?? '---' }}</p>
        <p><strong>E-mail:</strong> {{ $qr->cliente->email ?? '---' }}</p>
        <p><strong>Telefone:</strong> {{ $qr->cliente->telefone ?? '---' }}</p>
        <p><strong>Pertences:</strong> {{ $qr->descricao ?? '---' }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
=======
        <div class="modal-header">
          <h5 class="modal-title" id="modalClienteLabel{{ $qr->id }}">Informações do Cliente</h5>
        </div>
        <div class="modal-body">
          <p><strong>Nome:</strong> {{ $qr->cliente->nome ?? '---' }}</p>
          <p><strong>CPF:</strong> {{ $qr->cliente->cpf ?? '---' }}</p>
          <p><strong>E-mail:</strong> {{ $qr->cliente->email ?? '---' }}</p>
          <p><strong>Telefone:</strong> {{ $qr->cliente->telefone ?? '---' }}</p>
          <p><strong>Pertences:</strong> {{ $qr->descricao ?? '---' }}</p>

        <strong>QRcode:</strong>
        <td>
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
>>>>>>> 3a1a21d451cf1e9e746b78a1d91158460b2410f5
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
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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
      botao.addEventListener('click', function () {
        const produtoId = this.dataset.produtoId;
        document.querySelector('#produto_id').value = produtoId;
      });
    });
  </script>
  <!-- ./wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const selectProduto = document.getElementById('produto_id');
      const inputValor = document.getElementById('valor_produto');

      selectProduto.addEventListener('change', function () {
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
    document.getElementById('produto_id').addEventListener('change', function () {
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
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
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
  </script>
  <script>
document.getElementById('btn-abrir-qrcode').addEventListener('click', function () {
  const userId = this.dataset.userId;

  fetch('/verifica-caixa-aberto', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: JSON.stringify({ iduser: userId }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.caixa_aberto) {
      const modal = new bootstrap.Modal(document.getElementById('modalQrCode'));
      modal.show();
    } else {
      alert('Nenhum caixa aberto para este usuário.');
    }
  })
  .catch(() => alert('Erro ao verificar o caixa.'));
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

</body>

</html>