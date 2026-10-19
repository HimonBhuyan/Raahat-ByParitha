@extends('layouts.app')

@section('title', 'Haute Couture Lookbook — Raahat ByParitha | Bespoke Menswear')
@section('meta_description', 'Explore Raahat ByParitha’s couture collections: Handcrafted wedding sherwanis, bespoke sequin tuxedos, pure silk muhurtham sets, and royal velvet bandhgalas.')

@section('content')

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero-bg">
    <img src="{{ $baseUrl }}/assets/images/hero-sherwani.jpg" alt="Raahat ByParitha Haute Couture" class="page-hero-img">
    <div class="page-hero-overlay"></div>
  </div>
  <div class="container page-hero-content text-center">
    <span class="section-tag">THE HAUTE COUTURE LOOKBOOK</span>
    <h1 class="page-title">The Couture Repertoire</h1>
    <p class="page-subtitle">
      Heirloom wedding sherwanis, black-tie embellished tuxedos, and South Indian pure silk ensembles hand-tailored in our Chennai and Bangalore ateliers.
    </p>
  </div>
</section>

<!-- LOOKBOOK MAIN SECTION -->
<section class="section lookbook-section">
  <div class="container">
    <!-- Filter Nav -->
    <div class="lookbook-filter-bar">
      <div class="filter-group">
        <button class="filter-tab-btn active" data-filter="all">All Silhouettes ({{ count($products) }})</button>
        <button class="filter-tab-btn" data-filter="weddings">Royal Weddings & Muhurtham</button>
        <button class="filter-tab-btn" data-filter="tuxedos">Bespoke Tuxedos</button>
        <button class="filter-tab-btn" data-filter="bandhgala">Heritage Bandhgalas</button>
        <button class="filter-tab-btn" data-filter="indowestern">Indo-Western Cuts</button>
      </div>

      <div class="filter-sort">
        <span class="sort-label">Curated for:</span>
        <span class="sort-val">Wedding Grooms & VIP Galas</span>
      </div>
    </div>

    <!-- Lookbook Grid -->
    <div class="products-grid lookbook-grid" id="lookbookGrid">
      @foreach($products as $product)
      <div class="product-card" data-category="{{ $product['category'] }}">
        <div class="product-media">
          <img src="{{ $baseUrl }}/{{ $product['image'] }}" alt="{{ $product['title'] }}" loading="lazy" class="product-img">
          <span class="product-badge">{{ $product['badge'] }}</span>
          
          <div class="product-hover-overlay">
            <button class="btn btn-gold btn-sm btn-quickview" data-product-id="{{ $product['id'] }}">
              Quick View
            </button>
            <a href="{{ $baseUrl }}/index.php?page=product&id={{ $product['id'] }}" class="btn btn-outline-gold btn-sm">
              Full Atelier Specs
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

          <div class="product-specs-chips">
            <span class="spec-chip">🧵 {{ explode(' ', $product['fabric'])[0] }} Silk/Wool</span>
            <span class="spec-chip">✨ {{ explode(' ', $product['embroidery'])[0] }} Karigari</span>
          </div>

          <div class="product-bottom">
            <div class="price-wrap">
              <span class="price-lbl">Starting From</span>
              <span class="product-price">{{ $product['price_display'] }}</span>
            </div>
            
            <button class="btn btn-gold btn-sm open-booking-modal" data-product="{{ $product['title'] }}" data-occasion="{{ $product['category_name'] }}">
              Book Fitting
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Atelier Note Card -->
    <div class="couture-advisory-card">
      <div class="advisory-icon">⚜️</div>
      <div class="advisory-text">
        <h3>Individual Custom Commissions</h3>
        <p>
          Every garment displayed in our lookbook can be modified to your color palette, silhouette preferences, and heirloom embroidery crests. Our Creative Director Pari Agarwal personally oversees fabric swatching and design sketches for your wedding wardrobe.
        </p>
      </div>
      <div class="advisory-action">
        <button class="btn btn-gold open-booking-modal" data-occasion="Custom Couture Commission">
          Request Bespoke Sketch
        </button>
      </div>
    </div>
  </div>
</section>

@endsection
