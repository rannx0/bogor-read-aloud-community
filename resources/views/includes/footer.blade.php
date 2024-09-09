<!-- ========== FOOTER ========== -->
<footer class="border-top">
  <div class="container">
    <div class="row justify-content-lg-between content-space-t-2 content-space-b-lg-2">
      <div class="col-lg-3 mb-5">
        <div class="d-flex align-items-start flex-column h-100">
          <!-- Logo -->
          <a class="w-100 mb-2 mb-lg-auto" href="{{ route('welcome') }}" aria-label="Front">
            <img class="brand" src="{{ Storage::url('public/configuration/' . ($config->logo)) }}" alt="Logo">
          </a>
          <!-- End Logo -->

          <p class="text-muted small mb-0 mt-3">{{ $config->deskripsi_footer}}</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3 ms-lg-auto mb-5 mb-lg-0">
        <h5>Pages</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1">
          <li><a class="link-sm text-secondary" href="#">About Us</a></li>
          <li><a class="link-sm text-secondary" href="#">Article</a></li>
          <li><a class="link-sm text-secondary" href="#">Events</a></li>
          <li><a class="link-sm text-secondary" href="#">Gallery</a></li>
          <li><a class="link-sm text-secondary" href="#">Contacts</a></li>
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->

      <div class="col-6 col-md-4 col-lg-3 mb-5 mb-lg-0">
        <h5>About Us</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1">
          <li><a class="link-sm text-secondary" href="#">Contacts</a></li>
          <li><a class="link-sm text-secondary" href="#">Gallery</a></li>
          <li><a class="link-sm text-secondary" href="#">Teams</a></li>
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->

      <div class="col-md-4 col-lg-2 mb-5 mb-lg-0">
        <h5 class="mb-3">Resources</h5>

        <!-- List -->
        <ul class="list-unstyled list-py-1">
          <li><a class="link-sm link-secondary" href="#"><i class="bi-geo-alt-fill me-1"></i>{{
              $config->alamat_teks}}</a></li>
          <li><a class="link-sm link-secondary" href="tel:1-062-109-9222"><i
                class="bi-telephone-inbound-fill me-1"></i>{{ $config->no_hp}}</a></li>
        </ul>
        <!-- End List -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <hr class="my-0">

    <div class="row align-items-sm-center content-space-1">
      <div class="col-sm mb-4 mb-sm-0">
        <p class="small mb-0">{{ $config->footer_name}}</p>
      </div>
      <!-- End Col -->

      <div class="col-sm-auto">
        <!-- Socials -->
        <ul class="list-inline mb-0">
          @if($config->show_facebook)
          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $config->link_facebook }}" target="_blank">
              <i class="bi-facebook"></i>
            </a>
          </li>
          @endif

          @if($config->show_youtube)
          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $config->link_youtube }}" target="_blank">
              <i class="bi-youtube"></i>
            </a>
          </li>
          @endif

          @if($config->show_instagram)
          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $config->link_instagram }}" target="_blank">
              <i class="bi-instagram"></i>
            </a>
          </li>
          @endif

          @if($config->show_twitter)
          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $config->link_twitter }}" target="_blank">
              <i class="bi-twitter"></i>
            </a>
          </li>
          @endif

          @if($config->show_whatsapp)
          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $config->link_whatsapp }}"
              target="_blank">
              <i class="bi-whatsapp"></i>
            </a>
          </li>
          @endif
        </ul>

        <!-- End Socials -->
      </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->