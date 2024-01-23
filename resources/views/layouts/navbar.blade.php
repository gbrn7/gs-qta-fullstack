<nav class="navbar navbar-expand-md bg-light">
  <div class="container-fluid">
    <div class="d-flex justify-content-between d-md-none d-block">
      <a class="navbar-brand fs-5" href="#">Metode Topsis</a>
      <button class="btn px-1 py-0 open-btn">
        <i class="fas fa-stream"></i>
      </button>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <div class="dropdown">
        <a class="nav-link d-flex gap-2 pt-3 pt-md-0 align-items-center justify-content-end dropdown-toggle" href="#"
          role="button" aria-current="page" data-bs-toggle="dropdown" aria-expanded="false">
          <p class="my-0">{{auth()->user()->nama}}</p>
          <img src={{asset('Assets/Img/default.png')}} class="img-fluid img-avatar ">
        </a>
        <ul class="dropdown-menu dropdown-menu-end px-2">
          <li class="rounded-2 dropdown-list my-profile"><a class="dropdown-item rounded-2" href="#"><i
                class="ri-user-3-line me-2"></i>Profil Saya</a>
          </li>
          <li class="rounded-2 dropdown-list"> <a href="{{route('admin.logout')}}" class="dropdown-item rounded-2"><i
                class="ri-logout-circle-line me-2"></i>Sign
              Out</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>