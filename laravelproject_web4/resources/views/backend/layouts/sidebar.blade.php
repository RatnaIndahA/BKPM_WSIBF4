 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
 
 <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
         <a class="nav-link " href="index.html">
             <i class="bi bi-grid"></i>
             <span>Dashboard</span>
         </a>
     </li><!-- End Dashboard Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="users-profile.html">
                     <i class="bi bi-person"></i>
                     <span>Profile</span>
    </a>

  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Riwayat Hidup</span><i
    class="bi bi-chevron-down ms-auto"></i>
</a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a class=""href="{{ url('pendidikan') }}">Pendidikan</a>
      </li>
      <li>
        <a class=""href="{{ url('pengalaman_kerja') }}">Pengalaman</a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
</ul>

</aside><!-- End Sidebar-->