@extends('layouts.app')

@section('title', 'Salons & VIP Concierge — Raahat ByParitha | Chennai • Bangalore')
@section('meta_description', 'Schedule a private consultation at our Chennai or Bangalore menswear ateliers. Direct contact with Creative Director Pari Agarwal’s concierge.')

@section('content')

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero-bg">
    <img src="{{ $baseUrl }}/assets/images/boutique-store.jpg" alt="Raahat ByParitha Salons" class="page-hero-img">
    <div class="page-hero-overlay"></div>
  </div>
  <div class="container page-hero-content text-center">
    <span class="section-tag">PRIVATE CONSULTATIONS</span>
    <h1 class="page-title">Salons & VIP Concierge</h1>
    <p class="page-subtitle">
      Reserve your private fitting with Creative Director Pari Agarwal at our Chennai or Bangalore ateliers, or arrange an international video consultation.
    </p>
  </div>
</section>

<!-- CONTACT & BOOKING SECTION -->
<section class="section contact-section">
  <div class="container">
    <div class="contact-grid">
      <!-- Left Column: Atelier Directory -->
      <div class="contact-info-col">
        <span class="section-tag">LOCATIONS</span>
        <h2 class="section-title">Our Private Salons</h2>

        <div class="contact-cards-stack">
          @foreach($ateliers as $atelier)
          <div class="salon-contact-card">
            <span class="card-badge">{{ $atelier['badge'] }}</span>
            <h3>{{ $atelier['name'] }}</h3>
            <p class="address">{{ $atelier['address'] }}<br>{{ $atelier['city_state'] }}</p>
            <p class="hours">⏰ {{ $atelier['hours'] }}</p>
            
            <div class="card-buttons">
              <a href="tel:{{ str_replace(' ', '', $atelier['phone']) }}" class="btn btn-outline-gold btn-sm">
                📞 Call Salon
              </a>
              <a href="{{ $atelier['maps_url'] }}" target="_blank" rel="noopener" class="btn btn-sm btn-ghost">
                Google Maps ↗
              </a>
            </div>
          </div>
          @endforeach

          <div class="concierge-direct-card">
            <div class="direct-icon">💬</div>
            <div class="direct-text">
              <h4>Direct WhatsApp Concierge</h4>
              <p>For immediate response regarding bridal timelines or pricing queries:</p>
              <a href="https://wa.me/{{ $brand['whatsapp'] }}?text=Hello%20Raahat%20ByParitha,%20I%20would%20like%20to%20inquire%20about%20a%20bespoke%20appointment." target="_blank" rel="noopener" class="direct-link">
                Chat on WhatsApp (+91 90424 09942) →
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Interactive Consultation Scheduler Form -->
      <div class="contact-form-col">
        <div class="form-container-card">
          <span class="section-tag">APPOINTMENT DESK</span>
          <h2 class="form-title">Reserve A Fitting</h2>
          <p class="form-subtitle">
            Please share your wedding date and preferred silhouette. Our bridal concierge team will contact you promptly.
          </p>

          <form id="pageContactForm" class="appointment-form" action="{{ $baseUrl }}/index.php?action=book_appointment" method="POST">
            <div class="form-row">
              <div class="form-group">
                <label for="pName">Full Name *</label>
                <input type="text" id="pName" name="name" class="form-control" placeholder="Aditya Verma" required>
              </div>
              <div class="form-group">
                <label for="pPhone">WhatsApp Number *</label>
                <input type="tel" id="pPhone" name="phone" class="form-control" placeholder="+91 98765 43210" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="pCity">Salon Location *</label>
                <select id="pCity" name="city" class="form-control" required>
                  <option value="Chennai — Nungambakkam Atelier">Chennai — Nungambakkam (Amethyst)</option>
                  <option value="Bangalore — Indiranagar Studio">Bangalore — Indiranagar Studio</option>
                  <option value="Virtual Video Consultation (NRI / Destination)">Virtual HD Video Consultation</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pOccasion">Occasion / Garment *</label>
                <select id="pOccasion" name="occasion" class="form-control" required>
                  <option value="Wedding Groom Muhurtham & Sherwani">Wedding Groom Muhurtham & Sherwani</option>
                  <option value="Bespoke Embellished Tuxedo">Bespoke Embellished Tuxedo</option>
                  <option value="South Indian Pure Silk Zari Attire">South Indian Pure Silk Zari Attire</option>
                  <option value="Contemporary Indo-Western Silhouette">Contemporary Indo-Western Silhouette</option>
                  <option value="Complete Wedding Groom Trousseau">Complete Wedding Groom Trousseau</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="pDate">Preferred Consultation Date</label>
                <input type="date" id="pDate" name="date" class="form-control" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+3 days')) }}">
              </div>
              <div class="form-group">
                <label for="pNotes">Wedding Date / Style Desired</label>
                <input type="text" id="pNotes" name="notes" class="form-control" placeholder="Wedding in Nov, interested in ivory zardozi">
              </div>
            </div>

            <div class="form-status" id="pageFormStatus" style="display: none;"></div>

            <button type="submit" class="btn btn-gold btn-block" id="pageSubmitBtn">
              <span>Schedule Atelier Fitting</span>
              <span class="btn-icon">→</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS ACCORDION -->
<section class="section faq-section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">FREQUENTLY ASKED</span>
      <h2 class="section-title">Bespoke Consultation Inquiries</h2>
      <p class="section-subtitle">
        Everything you need to know about our commissioning process, timelines, and fittings.
      </p>
    </div>

    <div class="faq-accordion-wrapper">
      @foreach($faqs as $index => $faq)
      <div class="faq-item {{ $index === 0 ? 'active' : '' }}">
        <button class="faq-question-btn" type="button">
          <span class="q-title">{{ $faq['q'] }}</span>
          <span class="faq-toggle-icon">+</span>
        </button>
        <div class="faq-answer-panel" style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
          <p>{{ $faq['a'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
