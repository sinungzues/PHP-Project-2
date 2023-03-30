<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pejabat') ? 'active' : '' }}" href="/pejabat">
                    <i class="fas fa-user"></i>
                    Pejabat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kantor') ? 'active' : '' }}" href="/kantor">
                    <i class="fas fa-building"></i>
                    Kantor
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('cetak') ? 'active' : '' }}" href="/cetak" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    Cetak
                </a>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="/cetak">Cetak Semua</a></li>
                  <li><a class="dropdown-item" href="/cetak/kode_cetak">Cetak By Kode Cetak</a></li>
                  <li><a class="dropdown-item" href="/cetak/nama_kantor">Cetak By Kantor</a></li>
                </ul>
              </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}" href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
