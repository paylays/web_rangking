<div class="app-sidebar">
     <!-- Sidebar Logo -->
     <div class="logo-box text-center py-3">
          <a href="{{ route('dashboard') }}" class="text-decoration-none">
               <h5 class="text-white fw-bold m-0">SPK - Kelompok 1</h5>
          </a>
     </div>

     <div class="scrollbar" data-simplebar>

          <ul class="navbar-nav" id="navbar-nav">

               <li class="menu-title">Menu</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"
">
                         <span class="nav-icon">
                              <iconify-icon icon="mingcute:home-3-line"></iconify-icon>
                         </span>
                         <span class="nav-text"> Dashboard </span>
                    </a>
               </li>

               <li class="menu-title">Data Master</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('kriteria') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="fluent:apps-list-detail-24-regular"></iconify-icon>
                         </span>
                         <span class="nav-text"> Kriteria </span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('sub-kriteria') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mdi:subdirectory-arrow-right"></iconify-icon>
                         </span>
                         <span class="nav-text"> Sub Kriteria </span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mdi:account-school-outline"></iconify-icon>
                         </span>
                         <span class="nav-text"> Alternatif </span>
                    </a>
               </li>

               <li class="menu-title">Penilaian</li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('penilaian') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mdi:clipboard-edit-outline"></iconify-icon>
                         </span>
                         <span class="nav-text"> Input Penilaian </span>
                         @if ($jumlahHasilSeleksi > 0)
                              <span class="badge bg-primary badge-pill text-end">{{ $jumlahHasilSeleksi }}</span>
                         @endif
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link" href="{{ route('ranking') }}">
                         <span class="nav-icon">
                              <iconify-icon icon="mdi:trophy-outline"></iconify-icon>
                         </span>
                         <span class="nav-text"> Hasil Seleksi </span>
                    </a>
               </li>
          </ul>
     </div>
</div>


<div class="animated-stars">
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
     <div class="shooting-star"></div>
</div>