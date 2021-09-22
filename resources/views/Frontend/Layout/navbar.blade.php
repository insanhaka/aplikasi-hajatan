{{-- Navbar start --}}
<nav class="autohide navbar navbar-expand-lg navbar-light" style="background-color: #f8f9fe; box-shadow: 0px 5px 8px -3px rgba(0,0,0,0.15);
-webkit-box-shadow: 0px 5px 8px -3px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 5px 8px -3px rgba(0,0,0,0.15);">
    <div class="container">
      @hasrole('User')
      <a class="navbar-brand" href="/home">
        {{-- <img src="{{asset('/assets/img/brand/Logo-autolife.png')}}" class="navbar-brand-img" alt="..." width="110"> --}}
        <h3>Hai, {{ Auth::user()->name }}</h3>
      </a>
      @else
      <a class="navbar-brand" href="/">
        {{-- <img src="{{asset('/assets/img/brand/Logo-autolife.png')}}" class="navbar-brand-img" alt="..." width="110"> --}}
        Hajatan
      </a>
      @endhasrole
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/masuk">Masuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/daftar">Daftar</a>
          </li>
          {{-- {!! FrontMenuLib::Menu() !!} --}}
        </ul>
      </div>
    </div>
  </nav>
{{-- Navbar end --}}
