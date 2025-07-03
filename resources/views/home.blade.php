@extends('layouts.app')

@section('title', 'PDV')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">PDV</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('qrcode.index') }}">Home</a></li>
          <li class="breadcrumb-item active">PDV</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="card card-laranja mb-4">
  <div class="card-header">
    <h3 class="card-title">Guarda Volume - Consulta</h3>
  </div>
  <div class="card-body">
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <form method="POST" action="{{ route('guarda_volume.buscar') }}">
          @csrf
          <div class="input-group input-group-lg">
            <span class="input-group-text bg-white">
              <i class="fas fa-qrcode text-primary"></i>
            </span>
            <input type="text" name="codigo" class="form-control" placeholder="Escaneie o QRCode ou digite manualmente...">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
