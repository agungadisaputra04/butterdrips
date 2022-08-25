<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">ButterDrips</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">BD</a>
      </div>

      <!-- Sidebar -->

     
          
         
      <div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">ButterDrips</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BT</a>
          </div>
         
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="@if (Request::segment(1) == 'dashboard') active @endif">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
          <li class="menu-header">FITUR MENU</li>

            <li class="nav-item dropdown {{ Request::is('tipe') ? 'active' : '' }}{{ Request::is('cari') ? 'active' : '' }}{{ Request::is('ketambah') ? 'active' : '' }} {{ Request::is('index') ? 'active' : '' }}{{ Request::is('caripesanan') ? 'active' : '' }}">
            <a href="" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Pesanan Sablon</span></a>
              <ul class="dropdown-menu" >
               
                @if (Auth::user()->role == 1)
                

                <li class="{{ Request::is('tipe') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('tipe') }}">Daftar Tipe Sablon</a>
                </li>
    
                <li class="{{ Request::is('cari') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('cari') }}">Cari Pesanan </a></li>
    
    
                  <li class="{{ Request::is('ketambah') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketambah') }}">Tambah Pesanan </a></li>
    
                @endif
                    

                <li class="{{ Request::is('index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index') }}">Daftar Pesanan</a></li>

                    
                    <li class="{{ Request::is('caripesanan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('caripesanan') }}">Cetak Laporan Pesanan</a></li>
            </ul>
          </li>
          

          @if (Auth::user()->role == 1)
          <li class="nav-item dropdown {{ Request::is('karyawan') ? 'active' : '' }}{{ Request::is('jabatan') ? 'active' : '' }}{{ Request::is('karyawancetak') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Master Data Gaji </span></a>
            <ul class="dropdown-menu">

               

              <li class="{{ Request::is('karyawan') ? 'active' :'' }}">
              <a  href="karyawan">  Data Karyawan</a></li>
              <li class="{{ Request::is('jabatan') ? 'active' : '' }}">
              <a  href="jabatan">  Data Jabatan</a></li>
              <li class="{{ Request::is('karyawancetak') ? 'active' : '' }}">
              <a  href="karyawancetak">  Cetak Data Karyawan</a></li>
           
              
            </ul>
          </li>
          @endif
          
          <li class="nav-item dropdown {{ Request::is('gaji') ? 'active' : '' }}{{ Request::is('absensi') ? 'active' : '' }}{{ Request::is('slip') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Transaksi Gaji </span></a>
            <ul class="dropdown-menu">

              <li class="{{ Request::is('gaji') ? 'active' : '' }}">
            <a  href="gaji">Data Gaji</a></li>
            @if (Auth::user()->role == 1)
            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
              <a  href="absensi"> Input Dan Data Kehadiran </a></li>
              @endif
            @if (Auth::user()->role == 2)
            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
              <a  href="absensi"> Data Kehadiran </a></li>
              @endif
              <li class="{{ Request::is('slip') ? 'active' : '' }}">
              <a  href="slip"> Slip Gaji Karyawan </a></li>
              
              
            
            </ul>
          </li>
          <li class="nav-item dropdown {{ Request::is('tahungaji') ? 'active' : '' }}{{ Request::is('tahunkehadirab') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Laporan Tahunan </span></a>
            <ul class="dropdown-menu">

              
              
              <li class="{{ Request::is('tahungaji') ? 'active' : '' }}">
                <a  href="tahungaji"> Laporan Gaji </a></li>
                <li class="{{ Request::is('tahunkehadirab') ? 'active' : '' }}">
                <a  href="tahunkehadiran"> Laporan Kehadiran </a></li>
            </ul>
          </li>
          @if (Auth::user()->role == 1)
          <li class="menu-header">Utilities</li>
        <li class="@if (Request::segment(1) == 'user') active @endif">
          <a href="user" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
        </li>
        @endif
   
            </div>
          </aside>
        </div>
