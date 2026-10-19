@extends('layouts.app')

@section('title', 'The Bespoke Craft & Tailoring — Raahat ByParitha | Chennai • Bangalore')
@section('meta_description', 'Discover the art of bespoke tailoring at Raahat ByParitha: 40+ precision measurements, hand-cut paper patterns, pure handloom silks, and imperial zardozi embroidery.')

@section('content')

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero-bg">
    <img src="{{ $baseUrl }}/assets/images/atelier-craft.jpg" alt="The Bespoke Craft at Raahat ByParitha" class="page-hero-img">
    <div class="page-hero-overlay"></div>
  </div>
  <div class="container page-hero-content text-center">
    <span class="section-tag">THE ART OF BESPOKE</span>
    <h1 class="page-title">Handcrafted To Perfection</h1>
    <p class="page-subtitle">
      Where centuries-old Indian Karigari harmonizes with the razor-sharp architectural precision of Savile Row tailoring.
    </p>
  </div>
</section>

<!-- THE BESPOKE PHILOSOPHY -->
<section class="section bespoke-story-section">
  <div class="container">
    <div class="bespoke-intro-grid">
      <div class="intro-text-col">
        <span class="section-tag">OUR ARCHITECTURE</span>
        <h2 class="section-title">Beyond Ready-to-Wear: An Individual Pattern</h2>
        <p class="lead-text">
          At Raahat ByParitha, bespoke is not an altered stock size. It is the architectural creation of a garment engineered exclusively around your unique posture, stride, and presence.
        </p>
        <p class="body-text">
          Led by Creative Director Pari Agarwal, our master cutters measure 40 distinct anatomical points. We account for slope of shoulders, head carriage, chest prominence, and drape preference.
        </p>
        <p class="body-text">
          Once drafted onto heavy brown paper, your individual pattern is permanently catalogued in our Chennai and Bangalore archives. Any future garment ordered inherits this flawless bespoke fit.
        </p>

        <div class="stat-pills-row">
          <div class="stat-pill">
            <span class="val">40+</span>
            <span class="lbl">Measurements</span>
          </div>
          <div class="stat-pill">
            <span class="val">180+</span>
            <span class="lbl">Zardozi Hours</span>
          </div>
          <div class="stat-pill">
            <span class="val">2</span>
            <span class="lbl">Master Fittings</span>
          </div>
        </div>
      </div>

      <div class="intro-media-col">
        <div class="stacked-images">
          <img src="{{ $baseUrl }}/assets/images/fabric-swatches.jpg" alt="Heritage Silk & Wool Swatches" class="img-primary">
          <img src="{{ $baseUrl }}/assets/images/atelier-craft.jpg" alt="Master Karigar Hand Embroidery" class="img-secondary">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 40+ PRECISION MEASUREMENTS BREAKDOWN -->
<section class="section measurements-section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">ANATOMICAL PRECISION</span>
      <h2 class="section-title">The 40-Point Measurement Architecture</h2>
      <p class="section-subtitle">
        How our master tailors map your physique to ensure effortless ease and an commanding royal silhouette.
      </p>
    </div>

    <div class="measurements-grid">
      <div class="measure-card">
        <div class="measure-icon">📐</div>
        <h3>Postural Balance & Pitch</h3>
        <p>We analyze neck inclination, spine curvature, and shoulder slope to prevent back collar gap and front neck roll.</p>
        <span class="measure-tag">Shoulder & Neckline</span>
      </div>

      <div class="measure-card">
        <div class="measure-icon">✂️</div>
        <h3>Scye Depth & Armhole Rotation</h3>
        <p>A sculpted, high armhole enables full movement while keeping the torso sleek and free of excess fabric bunching.</p>
        <span class="measure-tag">Ease of Movement</span>
      </div>

      <div class="measure-card">
        <div class="measure-icon">🧵</div>
        <h3>Chest Drop & Waist Suppression</h3>
        <p>Hand-drawn waist contouring gives our sherwanis and tuxedos their signature flattering imperial V-taper.</p>
        <span class="measure-tag">Sculpted Silhouette</span>
      </div>

      <div class="measure-card">
        <div class="measure-icon">🪡</div>
        <h3>Hem Sweep & Walking Stride</h3>
        <p>For longline sherwanis and South Indian dhotis, hem drop and walking balance ensure graceful cinematic flow.</p>
        <span class="measure-tag">Ceremonial Stride</span>
      </div>
    </div>
  </div>
</section>

<!-- THE TEXTILE ARCHIVE -->
<section class="section textile-archive-section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-tag">RARE MATERIALS</span>
      <h2 class="section-title">The Textile Archive</h2>
      <p class="section-subtitle">
        We source exclusively from heirloom handloom weavers across India and prestigious heritage mills in Biella, Italy.
      </p>
    </div>

    <div class="textile-grid">
      <div class="textile-card">
        <div class="textile-badge">SOUTH INDIA</div>
        <h3>Pure Mulberry Kanchipuram Raw Silk</h3>
        <p>Spun by master hereditary weavers, featuring unadulterated pure silk yarns with natural slub textures and extraordinary ceremonial sheen.</p>
      </div>

      <div class="textile-card">
        <div class="textile-badge">ITALY</div>
        <h3>Imported Silk Velvet & Super 150s Wool</h3>
        <p>Woven in Biella, Italy with plush silk backing that responds dramatically to evening ballroom chandeliers and photography.</p>
      </div>

      <div class="textile-card">
        <div class="textile-badge">ROYAL KARIGARI</div>
        <h3>24K Gold Wire & Metallic Zardozi</h3>
        <p>Fine electroplated gold wire, French bullion thread, cut glass bugle beads, and natural seed pearls stitched by hand onto pure fabrics.</p>
      </div>
    </div>

    <div class="text-center" style="margin-top: 40px;">
      <button class="btn btn-gold btn-lg open-booking-modal" data-occasion="Textile Archive Consultation">
        Touch The Archive At Our Salons →
      </button>
    </div>
  </div>
</section>

@endsection
