<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mesquita | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">

  <style>
    body {
      background: url('img/fundo.jpg') no-repeat center center fixed;
      background-size: cover;
      backdrop-filter: blur(2px);
    
    }

    .card {
      background-color: rgba(255, 255, 255, 0.2); /* semitransparente */
      border: none;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .login-card-body {
      background: transparent;
      color: #000;
    }

    .login-logo a {
      color: white;
      font-size: 32px;
      font-weight: bold;
    }

    .form-control {
      background-color: rgba(255,255,255,0.7);
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body text-center">
      <div class="login-logo mb-3">
        <a href="#" style="color:#363535">Mesquita Consultoria</a><br>
        <!-- <img src="{{ asset('img/logo.png') }}" alt="Logo Mesquita" style="width: 100px; margin-top: 10px;"> -->
      </div>

      <p class="login-box-msg">Iniciar sessão</p>

      <form action="{{ route('login_validar') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Senha" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
