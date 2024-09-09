<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide"
  data-hs-header-options='{
    "fixMoment": 500,
    "fixEffect": "slide"
  }'>

  <div class="container">
      <!-- Default Logo -->
      <a class="navbar-brand" href="#" aria-label="Front">
        <img class="navbar-brand-logo h-25" src="{{ Storage::url('public/configuration/' . ($config->logo)) }}" alt="Logo">
        <span class="navbar-brand-name text-dark">{{ $config->name_instansi ?? 'Default Title' }}</span>
      </a>
      <!-- End Default Logo -->

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>
        <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
      </button>
      <!-- End Toggler -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul id="navbarNavDropdownNav" class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#homeSection">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#aboutSection">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#eventSection">Event</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#gallerySection">Gallery</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#teamSection">Team</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#blogSection">Article</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#contactSection">Contact Us</a>
          </li>
        </ul>
      </div>
      <!-- End Collapse -->
    </nav>
  </div>
</header>

<!-- ========== END HEADER ========== -->