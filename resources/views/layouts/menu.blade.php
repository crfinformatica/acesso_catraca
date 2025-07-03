<<<<<<< HEAD
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
            <!-- <span class="right badge badge-danger"></span>New -->
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('qrcode.index') }}" class="nav-link">
          <i class="fas fa-money-bill nav-icon"></i>
          <p>PDV</p>
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
            <a href="{{ route('forma-pagamento.index') }}" class="nav-link">
              <i class="fas fa-money-bill nav-icon"></i>
              <p>Formas de Pagamento</p>
            </a>
          </li>



          <!-- Link Sair fixo no rodapé da sidebar -->

      </li>
      <ul class="nav nav-pills nav-sidebar flex-column mt-auto mb-3">
        <li class="nav-item">
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
=======
 <style>
.touch-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 80px;
  text-align: center;
  padding: 10px;
  margin: 2px;
  border-radius: 10px;
  background-color:rgb(255, 255, 255);
  color:rgb(27, 27, 27) !important;
  font-size: 14px;
  transition: transform 0.2s ease-in-out;
  border: 2px solidrgb(105, 106, 107);
}

.touch-button:hover {
  background-color:rgb(175, 86, 3);
}

.touch-button i {
  font-size: 22px;
  margin-bottom: 5px;
}

.touch-button p {
  margin: 0;
  font-weight: bold;
  font-size: 13px;
}
</style>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Botões principais -->
    <li class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link touch-button">
        <i class="fas fa-th"></i>
        <p>Dashboard</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('qrcode.index') }}" class="nav-link touch-button">
        <i class="fas fa-money-bill"></i>
        <p>PDV</p>
      </a>
    </li>

    <!-- Menu com submenu (Relatórios) -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link touch-button">
        <i class="fas fa-chart-bar"></i>
        <p>
          Relatórios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="./index.html" class="nav-link">
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
            <p>Diário</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Menu com submenu (Cadastros) -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link touch-button">
        <i class="fas fa-database"></i>
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
          <a href="{{ route('produtos.index') }}" class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Produtos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('formapagamento.index') }}" class="nav-link">
            <i class="fas fa-credit-card nav-icon"></i>
            <p>Formas de Pagamento</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Botão Sair -->
    <!-- <li class="nav-item mt-4">
      <a href="{{ route('logout') }}"
         class="nav-link touch-button bg-danger text-white"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <p>Sair</p>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li> -->

  </ul>
</nav>
  <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
>>>>>>> 6caab61a00c93b090febe5b289f1ba1717952a58
