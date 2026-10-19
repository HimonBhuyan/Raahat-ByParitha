<header class="luxury-header" id="mainHeader">
  <div class="header-ticker">
    <div class="container ticker-inner">
      <span class="ticker-city"><span class="ticker-prefix">✨ PRIVATE ATELIERS IN </span><span class="ticker-city-names">CHENNAI & BANGALORE</span></span>
      <span class="ticker-divider ticker-desktop-only">•</span>
      <span class="ticker-quote ticker-desktop-only">BESPOKE BRIDAL GROOM CONSULTATIONS BY CREATIVE DIRECTOR PARI AGARWAL</span>
      <span class="ticker-divider">•</span>
      <span><a href="tel:{{ str_replace(' ', '', $brand['phone']) }}" class="ticker-link">VIP: {{ $brand['phone'] }}</a></span>
    </div>
  </div>

  <div class="header-main">
    <div class="container header-container">
      <!-- Mobile Menu Toggle Button -->
      <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>

      <!-- Brand Logo / Monogram -->
      <a href="{{ $baseUrl }}/index.php?page=home" class="brand-logo" aria-label="Raahat ByParitha Home">
        <img src="{{ $baseUrl }}/assets/images/logo-horizontal.webp" alt="Raahat ByParitha — Luxury Bespoke Menswear" class="brand-logo-img">
      </a>

      <!-- Desktop Navigation Menu -->
      <nav class="desktop-nav" aria-label="Primary Navigation">
        <ul class="nav-links">
          <li class="nav-item">
            <a href="{{ $baseUrl }}/index.php?page=home" class="nav-link {{ $currentPage === 'home' ? 'active' : '' }}">
              The House
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ $baseUrl }}/index.php?page=collections" class="nav-link {{ $currentPage === 'collections' || $currentPage === 'product' ? 'active' : '' }}">
              Haute Couture
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ $baseUrl }}/index.php?page=bespoke" class="nav-link {{ $currentPage === 'bespoke' ? 'active' : '' }}">
              The Bespoke Craft
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ $baseUrl }}/index.php?page=atelier" class="nav-link {{ $currentPage === 'atelier' ? 'active' : '' }}">
              Atelier & Story
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ $baseUrl }}/index.php?page=contact" class="nav-link {{ $currentPage === 'contact' ? 'active' : '' }}">
              Salons & Contact
            </a>
          </li>
        </ul>
      </nav>

      <!-- Header Action Buttons -->
      <div class="header-actions">
        <a href="https://wa.me/{{ $brand['whatsapp'] }}?text=Hello%20Raahat%20ByParitha,%20I%20would%20like%20to%20inquire%20about%20a%20bespoke%20menswear%20consultation." 
           target="_blank" 
           rel="noopener noreferrer" 
           class="action-btn icon-btn" 
           title="Chat on WhatsApp">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
          </svg>
        </a>
        <button class="btn btn-gold btn-sm header-cta-btn open-booking-modal" data-occasion="VIP Atelier Consultation">
          <span class="btn-text">Book Consultation</span>
          <span class="btn-icon">→</span>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Drawer Menu (Direct Child of Body Context to avoid header backdrop-filter containing block trap) -->
<div class="mobile-drawer" id="mobileDrawer">
  <div class="drawer-header">
    <img src="{{ $baseUrl }}/assets/images/logo-horizontal.webp" alt="Raahat ByParitha" class="drawer-logo">
    <button class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close menu">&times;</button>
  </div>
  <ul class="drawer-links">
    <li><a href="{{ $baseUrl }}/index.php?page=home" class="{{ $currentPage === 'home' ? 'active' : '' }}">The House</a></li>
    <li><a href="{{ $baseUrl }}/index.php?page=collections" class="{{ $currentPage === 'collections' ? 'active' : '' }}">Haute Couture Lookbook</a></li>
    <li><a href="{{ $baseUrl }}/index.php?page=bespoke" class="{{ $currentPage === 'bespoke' ? 'active' : '' }}">The Bespoke Craft</a></li>
    <li><a href="{{ $baseUrl }}/index.php?page=atelier" class="{{ $currentPage === 'atelier' ? 'active' : '' }}">Creative Director & Atelier</a></li>
    <li><a href="{{ $baseUrl }}/index.php?page=contact" class="{{ $currentPage === 'contact' ? 'active' : '' }}">Salons & Appointments</a></li>
  </ul>
  <div class="drawer-footer">
    <p class="drawer-sub">Ateliers in Chennai & Bangalore</p>
    <a href="tel:{{ str_replace(' ', '', $brand['phone']) }}" class="drawer-phone">{{ $brand['phone'] }}</a>
    <button class="btn btn-gold btn-block open-booking-modal" style="margin-top: 15px;">Book Private Appointment</button>
  </div>
</div>

<!-- Mobile Drawer Backdrop Overlay -->
<div class="drawer-backdrop" id="drawerBackdrop"></div>

