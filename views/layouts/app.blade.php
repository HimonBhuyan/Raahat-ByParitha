<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>@yield('title', 'Raahat ByParitha — Luxury Bespoke Menswear | Chennai • Bangalore')</title>
  <meta name="description" content="@yield('meta_description', 'A Luxury Bespoke Menswear Fashion House in Chennai and Bangalore. Handcrafting royal wedding sherwanis, embellished tuxedos, and contemporary Indo-Western cuts.')">
  <meta name="keywords" content="Raahat ByParitha, bespoke menswear Chennai, luxury groom wear Bangalore, royal sherwani, embroidered tuxedo, South Indian wedding kurta, Pari Agarwal">
  
  <!-- OpenGraph / Social Sharing -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Raahat ByParitha — Luxury Bespoke Menswear">
  <meta property="og:description" content="A Luxury Bespoke Menswear Fashion House by Creative Director Pari Agarwal. Chennai & Bangalore.">
  <meta property="og:image" content="{{ $baseUrl }}/assets/images/hero-sherwani.jpg">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ $baseUrl }}/assets/css/style.css">
  
  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="{{ $baseUrl }}/assets/images/logo.svg">
  
  @yield('extra_head')
</head>
<body class="luxury-body page-{{ $currentPage }}">

  <!-- Header -->
  @include('partials.header')

  <!-- Main View Content -->
  <main class="luxury-main" id="mainContent">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')

  <!-- Modals & Overlays -->
  @include('partials.modals')

  <!-- Global Application Config for JS -->
  <script>
    window.RaahatConfig = {
      baseUrl: "{{ $baseUrl }}",
      whatsappNumber: "{{ $brand['whatsapp'] }}",
      products: {!! json_encode($products) !!}
    };
  </script>

  <!-- Main JavaScript File -->
  <script src="{{ $baseUrl }}/assets/js/main.js"></script>
  @yield('extra_scripts')

</body>
</html>
