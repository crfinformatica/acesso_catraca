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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
      <a href="#" class="brand-link">
        <img src="img/logo.png" alt="" class="brand-image " style="opacity: .8; width: 100px">
        <span class="brand-text font-weight-light">.</span>
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

          </div>
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
        <!-- Include Menu -->
        @include('layouts.menu')
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

<div class="row">
    <!-- Gráfico de Barras -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">QR Codes por Produto</div>
            <div class="card-body">
                <canvas id="qrcodesPorProdutoChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Gráfico de Linhas -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Produtos mais usados</div>
            <div class="card-body">
                <canvas id="produtosMaisUsadosChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Gráfico 1: Barras (QR Codes por Produto)
    const ctx1 = document.getElementById('qrcodesPorProdutoChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: {!! json_encode($qrcodesPorProduto->keys()) !!},
            datasets: [{
                label: 'Quantidade de QR Codes',
                data: {!! json_encode($qrcodesPorProduto->values()) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico 2: Linhas (Produtos mais usados)
    const ctx2 = document.getElementById('produtosMaisUsadosChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: {!! json_encode($produtosMaisUsados->keys()) !!},
            datasets: [{
                label: 'Usos de Produtos',
                data: {!! json_encode($produtosMaisUsados->values()) !!},
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>








  <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Mesquita</a>.</strong>
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