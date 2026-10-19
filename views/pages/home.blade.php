@extends('layouts.app')

@section('title', 'Raahat ByParitha — Luxury Bespoke Menswear | Chennai • Bangalore')
@section('meta_description', 'Handcrafted royal wedding sherwanis, bespoke embellished tuxedos, and South Indian pure silk ensembles. Private ateliers in Chennai & Bangalore by Pari Agarwal.')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section">
  <div class="hero-bg-wrapper">
    <img src="{{ $baseUrl }}/assets/images/hero-sherwani.jpg" alt="Raahat ByParitha Royal Bridal Sherwani" class="hero-bg-img">
    <div class="hero-overlay"></div>
  </div>

  <div class="container hero-content">
    <div class="hero-badge animate-fade-in">
      <span class="badge-dot"></span>
      <span>HAUTE COUTURE • CHENNAI & BANGALORE</span>
      <span class="badge-dot"></span>
    </div>

    <h1 class="hero-title animate-title">
      Where Heritage Splendour<br>
      <span class="gold-gradient-text hero-title-accent">Meets Savile Row Precision</span>
    </h1>

    <p class="hero-description animate-fade-in-delayed">
      Handcrafting bespoke wedding sherwanis, embellished black-tie tuxedos, and South Indian pure silk ensembles for the discerning groom. Private ateliers in Chennai and Bangalore.
    </p>

    <div class="hero-actions animate-fade-in-delayed">
      <a href="{{ $baseUrl }}/index.php?page=collections" class="btn btn-gold btn-lg">
        <span class="btn-text">Explore Haute Couture</span>
        <span class="btn-icon">→</span>
      </a>
      <button class="btn btn-outline-gold btn-lg open-booking-modal" data-occasion="Bridal Groom Wardrobe">
        <span class="btn-text">Book Private Consultation</span>
      </button>
    </div>
  </div>

  <!-- Centered Scroll Prompt (Web Full Screen Mode) -->
  <a href="#atelier-stats" class="hero-scroll-prompt animate-fade-in-delayed" aria-label="Explore The Maison">
    <span class="scroll-prompt-text">Explore The Maison</span>
    <div class="scroll-prompt-line">
      <div class="scroll-prompt-dot"></div>
    </div>
  </a>
</section>

<!-- ATELIER HERITAGE ACCREDITATIONS BAR -->
<section class="atelier-stats-bar" id="atelier-stats">
  <div class="container">
    <div class="stats-bar-grid">
      <div class="stat-bar-item">
        <span class="stat-bar-num">180+</span>
        <span class="stat-bar-label">Hours Hand Karigari</span>
      </div>
      <div class="stat-bar-divider"></div>
      <div class="stat-bar-item">
        <span class="stat-bar-num">40+</span>
        <span class="stat-bar-label">Anatomical Measures</span>
      </div>
      <div class="stat-bar-divider"></div>
      <div class="stat-bar-item">
        <span class="stat-bar-num">Chennai • Bangalore</span>
        <span class="stat-bar-label">Private Haute Ateliers</span>
      </div>
      <div class="stat-bar-divider"></div>
      <div class="stat-bar-item">
        <span class="stat-bar-num">100%</span>
        <span class="stat-bar-label">Pure Mulberry Silk</span>
      </div>
    </div>
  </div>
</section>

<!-- HAUTE COUTURE LOOKBOOK HIGHLIGHTS -->
<section class="section couture-preview-section" id="collectionsSection">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">THE REPERTOIRE</span>
      <h2 class="section-title">Iconic Haute Couture Creations</h2>
      <p class="section-subtitle">
        Each garment is an individual commission, meticulously tailored from raw silk, Italian velvet, and embellished with centuries-old Indian Karigari.
      </p>

      <!-- Category Filter Pills -->
      <div class="category-filter-pills" id="homeFilterPills">
        <button class="filter-pill active" data-filter="all">All Silhouettes</button>
        <button class="filter-pill" data-filter="weddings">Royal Weddings & Muhurtham</button>
        <button class="filter-pill" data-filter="tuxedos">Bespoke Tuxedos</button>
        <button class="filter-pill" data-filter="bandhgala">Velvet Bandhgalas</button>
        <button class="filter-pill" data-filter="indowestern">Indo-Western Cuts</button>
      </div>
    </div>

    <!-- Products Grid -->
    <div class="products-grid" id="homeProductsGrid">
      @foreach($products as $product)
      <div class="product-card" data-category="{{ $product['category'] }}">
        <div class="product-media">
          <img src="{{ $baseUrl }}/{{ $product['image'] }}" alt="{{ $product['title'] }}" loading="lazy" class="product-img">
          <span class="product-badge">{{ $product['badge'] }}</span>
          
          <div class="product-hover-overlay">
            <button class="btn btn-gold btn-sm btn-quickview" data-product-id="{{ $product['id'] }}">
              Inspect Details
            </button>
            <a href="https://wa.me/{{ $brand['whatsapp'] }}?text=Hello%20Raahat%20ByParitha,%20I%20am%20interested%20in%20consulting%20for%20{{ rawurlencode($product['title']) }}." 
               target="_blank" 
               rel="noopener" 
               class="btn btn-outline-gold btn-sm">
              WhatsApp Inquiry
            </a>
          </div>
        </div>

        <div class="product-info">
          <div class="product-meta">
            <span class="craft-time">⏳ {{ $product['craft_time'] }}</span>
            <span class="product-cat">{{ $product['category_name'] }}</span>
          </div>
          <h3 class="product-title">
            <a href="{{ $baseUrl }}/index.php?page=product&id={{ $product['id'] }}">{{ $product['title'] }}</a>
          </h3>
          <p class="product-sub">{{ $product['subtitle'] }}</p>
          <div class="product-bottom">
            <span class="product-price">{{ $product['price_display'] }}</span>
            <button class="link-btn open-booking-modal" data-product="{{ $product['title'] }}" data-occasion="{{ $product['category_name'] }}">
              Schedule Fitting →
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center" style="margin-top: 50px;">
      <a href="{{ $baseUrl }}/index.php?page=collections" class="btn btn-outline-gold btn-lg">
        <span>View Full Lookbook Repertoire</span>
        <span class="btn-icon">→</span>
      </a>
    </div>
  </div>
</section>

<!-- INTERACTIVE BESPOKE CUSTOMIZER (SIGNATURE FEATURE) -->
<section class="section customizer-section" id="customizerSection">
  <div class="container">
    <div class="customizer-wrapper">
      <div class="customizer-header">
        <span class="section-tag">ATELIER CONFIGURATOR</span>
        <h2 class="section-title">Design Your Bespoke Silhouette</h2>
        <p class="section-subtitle">
          Select your wedding occasion, silhouette cut, fabric preference, and embroidery intensity to receive an immediate bespoke atelier estimate and direct WhatsApp consultation.
        </p>
      </div>

      <div class="customizer-container">
        <!-- Interactive Steps Panel -->
        <div class="customizer-controls">
          <!-- Step 1: Occasion -->
          <div class="config-step" data-step="1">
            <span class="step-num">STEP 01</span>
            <h3 class="step-title">Select Your Occasion</h3>
            <div class="options-grid">
              <button class="config-opt-btn active" data-group="occasion" data-val="Royal Muhurtham & Wedding" data-price-mod="1.15">
                <span class="opt-title">Royal Muhurtham</span>
                <span class="opt-desc">Traditional Temple & Grand Ceremony</span>
              </button>
              <button class="config-opt-btn" data-group="occasion" data-val="Sangeet & Cocktail Night" data-price-mod="1.1">
                <span class="opt-title">Sangeet & Cocktail</span>
                <span class="opt-desc">Dynamic High-Shine Glamour</span>
              </button>
              <button class="config-opt-btn" data-group="occasion" data-val="Grand Palace Reception" data-price-mod="1.2">
                <span class="opt-title">Grand Reception</span>
                <span class="opt-desc">Regal Evening Black-Tie & Velvet</span>
              </button>
              <button class="config-opt-btn" data-group="occasion" data-val="Intimate Engagement / Puja" data-price-mod="1.0">
                <span class="opt-title">Engagement / Puja</span>
                <span class="opt-desc">Refined Silk Classic Elegance</span>
              </button>
            </div>
          </div>

          <!-- Step 2: Silhouette -->
          <div class="config-step" data-step="2">
            <span class="step-num">STEP 02</span>
            <h3 class="step-title">Choose Architectural Silhouette</h3>
            <div class="options-grid">
              <button class="config-opt-btn active" data-group="silhouette" data-val="Imperial Raw Silk Sherwani" data-base="95000" data-craft="180">
                <span class="opt-title">Imperial Sherwani</span>
                <span class="opt-desc">Floor-skimming structured achkan with royal drape</span>
              </button>
              <button class="config-opt-btn" data-group="silhouette" data-val="Bespoke Embellished Tuxedo" data-base="68000" data-craft="120">
                <span class="opt-title">Embellished Tuxedo</span>
                <span class="opt-desc">Peak satin lapel with crystal & micro-sequin cascade</span>
              </button>
              <button class="config-opt-btn" data-group="silhouette" data-val="South Indian Pure Silk Kurta & Veshti" data-base="48000" data-craft="95">
                <span class="opt-title">Muhurtham Silk Set</span>
                <span class="opt-desc">Pure Kanchipuram silk jubba with 24K gold zari stole</span>
              </button>
              <button class="config-opt-btn" data-group="silhouette" data-val="Modern Asymmetric Indo-Western" data-base="58000" data-craft="100">
                <span class="opt-title">Indo-Western Achkan</span>
                <span class="opt-desc">Asymmetrical crossover placket with French knots</span>
              </button>
              <button class="config-opt-btn" data-group="silhouette" data-val="Regal Jewel Velvet Bandhgala" data-base="82000" data-craft="140">
                <span class="opt-title">Jewel Velvet Bandhgala</span>
                <span class="opt-desc">Deep plush velvet with heritage bullion neckwork</span>
              </button>
            </div>
          </div>

          <!-- Step 3: Pure Fabric Selection -->
          <div class="config-step" data-step="3">
            <span class="step-num">STEP 03</span>
            <h3 class="step-title">Select Fabric & Loom</h3>
            <div class="options-grid">
              <button class="config-opt-btn active" data-group="fabric" data-val="Handloom Pure Mulberry Raw Silk" data-fab-mod="0">
                <span class="opt-title">Pure Mulberry Raw Silk</span>
                <span class="opt-desc">Lustrous natural texture & royal structural hold</span>
              </button>
              <button class="config-opt-btn" data-group="fabric" data-val="Plush Italian Silk Velvet" data-fab-mod="8000">
                <span class="opt-title">Plush Italian Silk Velvet</span>
                <span class="opt-desc">Deep luminous sheen in jewel tones</span>
              </button>
              <button class="config-opt-btn" data-group="fabric" data-val="Super 150s Italian Merino Wool" data-fab-mod="6000">
                <span class="opt-title">Super 150s Merino Wool</span>
                <span class="opt-desc">Ultra-breathable Savile Row evening drape</span>
              </button>
              <button class="config-opt-btn" data-group="fabric" data-val="Hand-Spun Matka & Tussar Silk" data-fab-mod="4000">
                <span class="opt-title">Hand-Spun Matka Silk</span>
                <span class="opt-desc">Rich organic slub with contemporary matte finish</span>
              </button>
            </div>
          </div>

          <!-- Step 4: Karigari / Hand-Embroidery -->
          <div class="config-step" data-step="4">
            <span class="step-num">STEP 04</span>
            <h3 class="step-title">Embroidery & Embellishment Intensity</h3>
            <div class="options-grid">
              <button class="config-opt-btn" data-group="embroidery" data-val="Minimalist Hand-Finished Detailing" data-emb-mod="0" data-craft-extra="0">
                <span class="opt-title">Subtle Tone-on-Tone</span>
                <span class="opt-desc">Refined Milanese buttonholes & micro-cuff detailing</span>
              </button>
              <button class="config-opt-btn" data-group="embroidery" data-val="Classic Zari Placket & Collar" data-emb-mod="12000" data-craft-extra="30">
                <span class="opt-title">Classic Zari Placket</span>
                <span class="opt-desc">Botanical hand-embroidered neckline, placket & cuffs</span>
              </button>
              <button class="config-opt-btn active" data-group="embroidery" data-val="Full Imperial Zardozi, Crystals & Pearls" data-emb-mod="28000" data-craft-extra="65">
                <span class="opt-title">Imperial Full Zardozi</span>
                <span class="opt-desc">Heirloom bullion gold wire, bugle beads & seed pearls</span>
              </button>
            </div>
          </div>
        </div>

        <!-- Live Atelier Estimate & Summary Card -->
        <div class="customizer-summary-card">
          <div class="summary-inner">
            <div class="summary-badge">CUSTOM ATELIER ESTIMATE</div>
            
            <div class="summary-media-preview">
              <img src="{{ $baseUrl }}/assets/images/hero-sherwani.jpg" id="customizerPreviewImg" alt="Bespoke Preview">
            </div>

            <div class="summary-specs">
              <div class="spec-line">
                <span class="lbl">Occasion:</span>
                <strong id="summaryOccasion">Royal Muhurtham & Wedding</strong>
              </div>
              <div class="spec-line">
                <span class="lbl">Silhouette:</span>
                <strong id="summarySilhouette">Imperial Raw Silk Sherwani</strong>
              </div>
              <div class="spec-line">
                <span class="lbl">Fabric:</span>
                <strong id="summaryFabric">Handloom Pure Mulberry Raw Silk</strong>
              </div>
              <div class="spec-line">
                <span class="lbl">Karigari:</span>
                <strong id="summaryEmbroidery">Full Imperial Zardozi, Crystals & Pearls</strong>
              </div>
              <div class="spec-line">
                <span class="lbl">Craft Timeline:</span>
                <strong id="summaryCraft">180 Hours of Karigari</strong>
              </div>
            </div>

            <div class="summary-price-box">
              <span class="est-label">Estimated Bespoke Commission:</span>
              <div class="est-price" id="summaryPrice">₹1,23,000 – ₹1,45,000</div>
              <span class="est-sub">Includes 40+ precision measurements, muslin basting fitting, and 1-on-1 styling with Creative Director Pari Agarwal.</span>
            </div>

            <div class="summary-cta-group">
              <button class="btn btn-gold btn-block" id="bookConfiguredPieceBtn">
                <span>Book Atelier Consultation For This Cut</span>
                <span class="btn-icon">→</span>
              </button>
              <a href="#" target="_blank" rel="noopener" class="btn btn-outline-gold btn-block" id="waConfiguredBtn">
                <span>Direct WhatsApp Consultation</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- THE BESPOKE JOURNEY & CRAFTSMANSHIP -->
<section class="section craft-section">
  <div class="craft-bg-layer">
    <img src="{{ $baseUrl }}/assets/images/atelier-craft.jpg" alt="Raahat ByParitha Atelier Hand Embroidery" class="craft-bg-img">
    <div class="craft-overlay"></div>
  </div>

  <div class="container craft-content">
    <div class="section-header text-center">
      <span class="section-tag">SAVILE ROW MEETS INDIAN HERITAGE</span>
      <h2 class="section-title">The Four Pillars of the Raahat Fit</h2>
      <p class="section-subtitle">
        True bespoke is not altered ready-to-wear; it is the genesis of an individual pattern drafted solely for your physique.
      </p>
    </div>

    <div class="process-steps-grid">
      <div class="process-step-card">
        <div class="step-number-badge">01</div>
        <h3 class="step-name">The Private Vision Dialogue</h3>
        <p class="step-text">
          A personal 1-on-1 consultation with Creative Director Pari Agarwal at our Chennai or Bangalore salons. We analyze your wedding venues, lighting conditions, and aesthetic desires.
        </p>
        <span class="step-feature">• 60-Minute Atelier Appointment</span>
      </div>

      <div class="process-step-card">
        <div class="step-number-badge">02</div>
        <h3 class="step-name">40+ Precision Measurements</h3>
        <p class="step-text">
          Our master cutter maps your exact posture, shoulder pitch, chest drop, and armscye curvature to craft an individual brown paper pattern exclusively preserved in our archives.
        </p>
        <span class="step-feature">• Anatomical Posture Correction</span>
      </div>

      <div class="process-step-card">
        <div class="step-number-badge">03</div>
        <h3 class="step-name">Hand Zardozi & Muslin Basting</h3>
        <p class="step-text">
          Generations-old master Karigars hand-stitch gold bullion wire, sequins, and resham threads onto pure silks. A raw muslin toile fitting is conducted to refine balance and silhouette.
        </p>
        <span class="step-feature">• 100+ Hours Hand Karigari</span>
      </div>

      <div class="process-step-card">
        <div class="step-number-badge">04</div>
        <h3 class="step-name">Master Fitting & Royal Finish</h3>
        <p class="step-text">
          The finished creation is completed with hand-stitched Milanese lapels, custom monogram silk lining, and final master dressing with coordinating footwear and stoles.
        </p>
        <span class="step-feature">• Unrivaled Royal Silhouette</span>
      </div>
    </div>
  </div>
</section>

<!-- CREATIVE DIRECTOR SPOTLIGHT -->
<section class="section founder-section">
  <div class="container">
    <div class="founder-grid">
      <div class="founder-image-wrapper">
        <img src="{{ $baseUrl }}/assets/images/designer-pari.jpg" alt="Pari Agarwal Creative Director Raahat ByParitha" class="founder-img">
        <div class="founder-experience-badge">
          <span class="exp-num">BESPOKE</span>
          <span class="exp-label">Luxury Menswear Fashion House</span>
        </div>
      </div>

      <div class="founder-narrative">
        <span class="section-tag">THE VISIONARY</span>
        <h2 class="section-title">Pari Agarwal</h2>
        <span class="founder-role">Founder & Creative Director</span>

        <p class="founder-bio-lead">
          “A bespoke garment is not merely tailored cloth. It is an intimate reflection of a gentleman’s presence, heritage, and the monumental milestones he celebrates.”
        </p>

        <p class="founder-bio-text">
          Under Pari Agarwal’s creative helm, <strong>Raahat ByParitha</strong> has emerged as Chennai and Bangalore’s definitive couture sanctuary for wedding grooms, high-profile dignitaries, and style connoisseurs.
        </p>
        <p class="founder-bio-text">
          By uniting the architectural discipline of bespoke tailoring with the opulent handlooms of Kanchipuram and the imperial bullion embroidery of royal courts, each piece crafted at Raahat carries an undeniable aura of aristocratic poise.
        </p>

        <div class="founder-signature-row">
          <div class="sig-quote">
            <span class="quote-mark">“</span>
            <span>We craft for the groom who demands that his attire commands the room in silence.</span>
          </div>
          <div class="founder-cta">
            <button class="btn btn-gold open-booking-modal" data-occasion="Personal Consultation with Pari Agarwal">
              Consult with Pari Agarwal
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DUAL FLAGSHIP ATELIERS (CHENNAI & BANGALORE) -->
<section class="section salons-section" id="salonsSection">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">FLAGSHIP DESTINATIONS</span>
      <h2 class="section-title">Visit Our Private Salons</h2>
      <p class="section-subtitle">
        Experience tactile luxury. Touch our archives of handloom silks, plush Italian velvets, and explore custom embroidery swatches in an opulent royal blue sanctuary.
      </p>
    </div>

    <div class="salons-grid">
      @foreach($ateliers as $atelier)
      <div class="salon-card">
        <div class="salon-header">
          <span class="salon-badge">{{ $atelier['badge'] }}</span>
          <h3 class="salon-city">{{ $atelier['city'] }}</h3>
        </div>

        <div class="salon-body">
          <h4 class="salon-name">{{ $atelier['name'] }}</h4>
          <p class="salon-address">{{ $atelier['address'] }}</p>
          <p class="salon-state">{{ $atelier['city_state'] }}</p>
          
          <div class="salon-hours-box">
            <span class="lbl">Consultation Hours:</span>
            <span class="val">{{ $atelier['hours'] }}</span>
          </div>

          <div class="salon-amenities">
            @foreach($atelier['features'] as $f)
            <span class="amenity-tag">✓ {{ $f }}</span>
            @endforeach
          </div>
        </div>

        <div class="salon-footer">
          <button class="btn btn-gold btn-block open-booking-modal" data-city="{{ $atelier['city'] }} Atelier">
            Schedule {{ $atelier['city'] }} Appointment
          </button>
          <a href="{{ $atelier['maps_url'] }}" target="_blank" rel="noopener" class="salon-map-link">
            Open in Google Maps →
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- VIP BOOKING APPOINTMENT BANNER -->
<section class="section appointment-cta-section">
  <div class="container">
    <div class="cta-card">
      <div class="cta-inner">
        <span class="section-tag">EXCLUSIVE INVITATION</span>
        <h2 class="cta-title">Begin Your Bespoke Wedding Journey</h2>
        <p class="cta-subtitle">
          Appointments are limited to ensure complete privacy and individualized attention for each wedding groom and patron. Reserve your fitting session today.
        </p>

        <div class="cta-btn-row">
          <button class="btn btn-gold btn-lg open-booking-modal" data-occasion="Bridal Groom Wardrobe">
            <span class="btn-text">Reserve Private Atelier Fitting</span>
            <span class="btn-icon">→</span>
          </button>
          <a href="https://wa.me/{{ $brand['whatsapp'] }}?text=Hello%20Raahat%20ByParitha,%20I%20would%20like%20to%20reserve%20a%20VIP%20fitting%20appointment." 
             target="_blank" 
             rel="noopener" 
             class="btn btn-outline-gold btn-lg">
            <span>WhatsApp Concierge (+91 90424 09942)</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
