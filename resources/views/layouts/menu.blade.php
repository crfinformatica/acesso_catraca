<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- PDV -->
        <li class="nav-item">
          <a href="{{ route('qrcode.index') }}" class="nav-link {{ request()->routeIs('qrcode.index') ? 'active' : '' }}">
            <i class="fas fa-money-bill nav-icon"></i>
            <p>PDV</p>
          </a>
        </li>

        <!-- Relatórios -->
        @auth
        <li class="nav-item has-treeview {{ request()->routeIs('relatorio.*') || request()->routeIs('fluxocaixa.relatorio') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->routeIs('relatorio.*') || request()->routeIs('fluxocaixa.relatorio') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Relatórios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('relatorio.vendas') }}" class="nav-link {{ request()->routeIs('relatorio.vendas') ? 'active' : '' }}">
                <i class="fas fa-chart-line nav-icon"></i>
                <p>Relatório de Vendas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fluxocaixa.relatorio') }}" class="nav-link {{ request()->routeIs('fluxocaixa.relatorio') ? 'active' : '' }}">
                <i class="fas fa-cash-register nav-icon"></i>
                <p>Fluxo de Caixa</p>
              </a>
            </li>
          </ul>
        </li>
        @endauth

        <!-- Cadastros -->
        <li class="nav-item has-treeview {{ request()->is('filiais*') || request()->is('produtos*') || request()->is('formapagamento*') || request()->is('fluxocaixa/create') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('filiais*') || request()->is('produtos*') || request()->is('formapagamento*') || request()->is('fluxocaixa/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Cadastros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('filiais.index') }}" class="nav-link {{ request()->is('filiais*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Filiais</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('produtos.index') }}" class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Produtos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('formapagamento.index') }}" class="nav-link {{ request()->is('formapagamento*') ? 'active' : '' }}">
                <i class="fas fa-credit-card nav-icon"></i>
                <p>Formas de Pagamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fluxocaixa.create') }}" class="nav-link {{ request()->is('fluxocaixa/create') ? 'active' : '' }}">
                <i class="fas fa-plus nav-icon"></i>
                <p>Abrir Caixa</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Sair -->
        <li class="nav-item mt-auto mb-3">
          <a href="{{ route('logout') }}"
             class="nav-link text-white bg-danger"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Sair</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
