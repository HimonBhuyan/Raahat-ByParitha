@extends('layouts.app')

@section('title', $selectedProduct['title'] . ' — Raahat ByParitha Bespoke')
@section('meta_description', $selectedProduct['description'])

@section('content')

<!-- BREADCRUMB NAV -->
<div class="breadcrumb-bar">
  <div class="container">
    <ul class="breadcrumbs">
      <li><a href="{{ $baseUrl }}/index.php?page=home">The House</a></li>
      <li><a href="{{ $baseUrl }}/index.php?page=collections">Haute Couture</a></li>
      <li class="active">{{ $selectedProduct['title'] }}</li>
    </ul>
  </div>
</div>

<!-- PRODUCT DETAIL MAIN -->
<section class="section product-detail-section">
  <div class="container">
    <div class="product-detail-grid">
      <!-- Left Column: High-Res Visual Display -->
      <div class="product-gallery-col">
        <div class="product-main-view">
          <img src="{{ $baseUrl }}/{{ $selectedProduct['image'] }}" alt="{{ $selectedProduct['title'] }}" class="product-hero-image" id="mainZoomImage">
          <span class="product-detail-badge">{{ $selectedProduct['badge'] }}</span>
        </div>
      </div>

      <!-- Right Column: Atelier Specifications & Actions -->
      <div class="product-specs-col">
        <span class="product-category-tag">{{ $selectedProduct['category_name'] }}</span>
        <h1 class="product-main-title">{{ $selectedProduct['title'] }}</h1>
        <p class="product-main-subtitle">{{ $selectedProduct['subtitle'] }}</p>

        <div class="product-price-ribbon">
          <span class="price-title">Bespoke Commission:</span>
          <span class="price-amount">{{ $selectedProduct['price_display'] }}</span>
          <span class="price-notice">*Tailored to individual measurements & fabric choice</span>
        </div>

        <!-- Specifications Breakdown Table -->
        <div class="specs-table-card">
          <div class="spec-row">
            <span class="spec-name">Craftsmanship Time:</span>
            <span class="spec-value">⏳ {{ $selectedProduct['craft_time'] }} of manual Karigari</span>
          </div>
          <div class="spec-row">
            <span class="spec-name">Pure Fabric:</span>
            <span class="spec-value">🧵 {{ $selectedProduct['fabric'] }}</span>
          </div>
          <div class="spec-row">
            <span class="spec-name">Embroidery Art:</span>
            <span class="spec-value">✨ {{ $selectedProduct['embroidery'] }}</span>
          </div>
          <div class="spec-row">
            <span class="spec-name">Interior Lining:</span>
            <span class="spec-value">🪡 {{ $selectedProduct['lining'] }}</span>
          </div>
          <div class="spec-row">
            <span class="spec-name">Occasions:</span>
            <span class="spec-value">🏛️ {{ $selectedProduct['occasion'] }}</span>
          </div>
        </div>

        <!-- Description -->
        <div class="product-narrative">
          <h3>Atelier Craft Notes</h3>
          <p>{{ $selectedProduct['description'] }}</p>
        </div>

        <!-- Styling Advisory -->
        <div class="styling-advisory-box">
          <div class="advisory-title">Creative Director's Styling Advisory:</div>
          <p class="advisory-body">{{ $selectedProduct['styling_note'] }}</p>
        </div>

        <!-- Actions -->
        <div class="product-cta-group">
          <button class="btn btn-gold btn-lg btn-block open-booking-modal" data-product="{{ $selectedProduct['title'] }}" data-occasion="{{ $selectedProduct['category_name'] }}">
            <span class="btn-text">Schedule Atelier Fitting For This Piece</span>
            <span class="btn-icon">→</span>
          </button>
          
          <a href="https://wa.me/{{ $brand['whatsapp'] }}?text=Hello%20Raahat%20ByParitha,%20I%20am%20inquiring%20about%20{{ rawurlencode($selectedProduct['title']) }}." 
             target="_blank" 
             rel="noopener" 
             class="btn btn-outline-gold btn-lg btn-block">
            <span>Inquire on WhatsApp (+91 90424 09942)</span>
          </a>
        </div>

        <div class="product-trust-bullets">
          <div class="trust-item">
            <span class="icon">📐</span>
            <span>40+ Precision Measurements Taken On-Site</span>
          </div>
          <div class="trust-item">
            <span class="icon">✈️</span>
            <span>Worldwide Courier & Destination Dressing</span>
          </div>
          <div class="trust-item">
            <span class="icon">🏛️</span>
            <span>Private Salons in Chennai & Bangalore</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RELATED CREATIONS -->
<section class="section related-section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">COMPLEMENTARY SILHOUETTES</span>
      <h2 class="section-title">More From The Repertoire</h2>
    </div>

    <div class="products-grid">
      @foreach($products as $p)
        @if($p['id'] !== $selectedProduct['id'])
        <div class="product-card">
          <div class="product-media">
            <img src="{{ $baseUrl }}/{{ $p['image'] }}" alt="{{ $p['title'] }}" loading="lazy">
            <span class="product-badge">{{ $p['badge'] }}</span>
            <div class="product-hover-overlay">
              <a href="{{ $baseUrl }}/index.php?page=product&id={{ $p['id'] }}" class="btn btn-gold btn-sm">
                View Piece
              </a>
            </div>
          </div>
          <div class="product-info">
            <span class="product-cat">{{ $p['category_name'] }}</span>
            <h3 class="product-title">
              <a href="{{ $baseUrl }}/index.php?page=product&id={{ $p['id'] }}">{{ $p['title'] }}</a>
            </h3>
            <span class="product-price">{{ $p['price_display'] }}</span>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

@endsection
