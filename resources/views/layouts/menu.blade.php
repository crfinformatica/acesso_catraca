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