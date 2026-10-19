/**
 * Raahat ByParitha — Luxury Bespoke Menswear Interactive Engine
 * Handles Bespoke Customizer, Quick View, Modals, Filtering, and WhatsApp Concierge
 */

document.addEventListener('DOMContentLoaded', () => {
  const config = window.RaahatConfig || { baseUrl: '', whatsappNumber: '919042409942', products: [] };

  // ==========================================
  // 1. MOBILE DRAWER NAVIGATION
  // ==========================================
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const drawerCloseBtn = document.getElementById('drawerCloseBtn');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const drawerBackdrop = document.getElementById('drawerBackdrop');

  function openDrawer() {
    mobileDrawer?.classList.add('open');
    drawerBackdrop?.classList.add('active');
    document.body.classList.add('drawer-open');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    mobileDrawer?.classList.remove('open');
    drawerBackdrop?.classList.remove('active');
    document.body.classList.remove('drawer-open');
    document.body.style.overflow = '';
  }

  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', openDrawer);
  }

  if (drawerCloseBtn) {
    drawerCloseBtn.addEventListener('click', closeDrawer);
  }

  if (drawerBackdrop) {
    drawerBackdrop.addEventListener('click', closeDrawer);
  }

  // ==========================================
  // 2. STICKY HEADER SCROLL EFFECT
  // ==========================================
  const header = document.getElementById('mainHeader');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  });

  // ==========================================
  // 3. CATEGORY FILTERING (HOME & LOOKBOOK)
  // ==========================================
  const filterButtons = document.querySelectorAll('.filter-pill, .filter-tab-btn');
  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const parent = btn.parentElement;
      parent.querySelectorAll('.filter-pill, .filter-tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterVal = btn.getAttribute('data-filter');
      const cards = document.querySelectorAll('.product-card');

      cards.forEach(card => {
        const cat = card.getAttribute('data-category');
        if (filterVal === 'all' || cat === filterVal) {
          card.style.display = 'flex';
          card.style.animation = 'fadeInUp 0.4s ease forwards';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // ==========================================
  // 4. INTERACTIVE BESPOKE CUSTOMIZER
  // ==========================================
  const customizerSection = document.getElementById('customizerSection');
  if (customizerSection) {
    const configState = {
      occasion: 'Royal Muhurtham & Wedding',
      occasionMod: 1.15,
      silhouette: 'Imperial Raw Silk Sherwani',
      basePrice: 95000,
      craftHours: 180,
      fabric: 'Handloom Pure Mulberry Raw Silk',
      fabricMod: 0,
      embroidery: 'Full Imperial Zardozi, Crystals & Pearls',
      embroideryMod: 28000,
      craftExtra: 65,
      previewImg: `${config.baseUrl}/assets/images/hero-sherwani.jpg`
    };

    const silhouetteImageMap = {
      'Imperial Raw Silk Sherwani': `${config.baseUrl}/assets/images/hero-sherwani.jpg`,
      'Bespoke Embellished Tuxedo': `${config.baseUrl}/assets/images/tuxedo-black-sequin.jpg`,
      'South Indian Pure Silk Kurta & Veshti': `${config.baseUrl}/assets/images/south-silk-wedding.jpg`,
      'Modern Asymmetric Indo-Western': `${config.baseUrl}/assets/images/indowestern-lilac.jpg`,
      'Regal Jewel Velvet Bandhgala': `${config.baseUrl}/assets/images/lookbook-teal-velvet.jpg`
    };

    const optButtons = customizerSection.querySelectorAll('.config-opt-btn');
    optButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const group = btn.getAttribute('data-group');
        const parentStep = btn.closest('.config-step');
        parentStep.querySelectorAll('.config-opt-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const val = btn.getAttribute('data-val');

        if (group === 'occasion') {
          configState.occasion = val;
          configState.occasionMod = parseFloat(btn.getAttribute('data-price-mod') || 1.0);
        } else if (group === 'silhouette') {
          configState.silhouette = val;
          configState.basePrice = parseInt(btn.getAttribute('data-base') || 60000, 10);
          configState.craftHours = parseInt(btn.getAttribute('data-craft') || 100, 10);
          if (silhouetteImageMap[val]) {
            configState.previewImg = silhouetteImageMap[val];
          }
        } else if (group === 'fabric') {
          configState.fabric = val;
          configState.fabricMod = parseInt(btn.getAttribute('data-fab-mod') || 0, 10);
        } else if (group === 'embroidery') {
          configState.embroidery = val;
          configState.embroideryMod = parseInt(btn.getAttribute('data-emb-mod') || 0, 10);
          configState.craftExtra = parseInt(btn.getAttribute('data-craft-extra') || 0, 10);
        }

        updateCustomizerUI();
      });
    });

    function updateCustomizerUI() {
      // Calculate Price Range
      const subtotal = (configState.basePrice + configState.fabricMod + configState.embroideryMod) * configState.occasionMod;
      const roundedLow = Math.round(subtotal / 1000) * 1000;
      const roundedHigh = Math.round((subtotal * 1.18) / 1000) * 1000;
      const totalCraft = configState.craftHours + configState.craftExtra;

      // Update DOM
      document.getElementById('summaryOccasion').textContent = configState.occasion;
      document.getElementById('summarySilhouette').textContent = configState.silhouette;
      document.getElementById('summaryFabric').textContent = configState.fabric;
      document.getElementById('summaryEmbroidery').textContent = configState.embroidery;
      document.getElementById('summaryCraft').textContent = `${totalCraft} Hours of Karigari`;
      document.getElementById('summaryPrice').textContent = `₹${roundedLow.toLocaleString('en-IN')} – ₹${roundedHigh.toLocaleString('en-IN')}`;

      const previewImg = document.getElementById('customizerPreviewImg');
      if (previewImg && previewImg.src !== configState.previewImg) {
        previewImg.style.opacity = 0;
        setTimeout(() => {
          previewImg.src = configState.previewImg;
          previewImg.style.opacity = 1;
        }, 200);
      }

      // Update WhatsApp URL
      const waText = `✨ *Raahat ByParitha — Bespoke Configurator Request* ✨\n\n` +
        `• *Occasion:* ${configState.occasion}\n` +
        `• *Silhouette:* ${configState.silhouette}\n` +
        `• *Fabric:* ${configState.fabric}\n` +
        `• *Embroidery:* ${configState.embroidery}\n` +
        `• *Estimated Timeline:* ${totalCraft} Craft Hours\n` +
        `• *Estimated Range:* ₹${roundedLow.toLocaleString('en-IN')} – ₹${roundedHigh.toLocaleString('en-IN')}\n\n` +
        `I would like to schedule a private fitting with Creative Director Pari Agarwal.`;

      const waBtn = document.getElementById('waConfiguredBtn');
      if (waBtn) {
        waBtn.href = `https://wa.me/${config.whatsappNumber}?text=${encodeURIComponent(waText)}`;
      }

      // Update Book Button Click Action
      const bookBtn = document.getElementById('bookConfiguredPieceBtn');
      if (bookBtn) {
        bookBtn.onclick = () => {
          openBookingModal({
            occasion: configState.occasion,
            product: `${configState.silhouette} (${configState.fabric}, ${configState.embroidery})`,
            notes: `Configured via Atelier Builder: ~₹${roundedLow.toLocaleString('en-IN')}`
          });
        };
      }
    }

    // Initial run
    updateCustomizerUI();
  }

  // ==========================================
  // 5. QUICK VIEW MODAL
  // ==========================================
  const quickViewModal = document.getElementById('quickViewModal');
  const closeQuickViewBtn = document.getElementById('closeQuickViewModal');
  const qvButtons = document.querySelectorAll('.btn-quickview');

  qvButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const productId = btn.getAttribute('data-product-id');
      const product = config.products.find(p => p.id === productId);
      if (!product) return;

      document.getElementById('qvImage').src = `${config.baseUrl}/${product.image}`;
      document.getElementById('qvBadge').textContent = product.badge;
      document.getElementById('qvCategory').textContent = product.category_name;
      document.getElementById('qvTitle').textContent = product.title;
      document.getElementById('qvSubtitle').textContent = product.subtitle;
      document.getElementById('qvPrice').textContent = product.price_display;
      document.getElementById('qvCraft').textContent = product.craft_time;
      document.getElementById('qvFabric').textContent = product.fabric;
      document.getElementById('qvEmbroidery').textContent = product.embroidery;
      document.getElementById('qvOccasion').textContent = product.occasion;
      document.getElementById('qvDescription').textContent = product.description;
      document.getElementById('qvStyling').textContent = product.styling_note;

      const qvInquireBtn = document.getElementById('qvInquireBtn');
      qvInquireBtn.setAttribute('data-product', product.title);
      qvInquireBtn.setAttribute('data-occasion', product.category_name);

      const qvWaBtn = document.getElementById('qvWaBtn');
      const waText = `Hello Raahat ByParitha, I would like to inquire about ${product.title} (${product.price_display}).`;
      qvWaBtn.href = `https://wa.me/${config.whatsappNumber}?text=${encodeURIComponent(waText)}`;

      quickViewModal.classList.add('active');
      document.body.classList.add('modal-open');
      document.body.style.overflow = 'hidden';
    });
  });

  if (closeQuickViewBtn && quickViewModal) {
    closeQuickViewBtn.addEventListener('click', () => {
      quickViewModal.classList.remove('active');
      document.body.classList.remove('modal-open');
      document.body.style.overflow = '';
    });
  }

  // ==========================================
  // 6. VIP ATELIER BOOKING MODAL
  // ==========================================
  const bookingModal = document.getElementById('bookingModal');
  const closeBookingBtn = document.getElementById('closeBookingModal');
  const openBookingButtons = document.querySelectorAll('.open-booking-modal');

  function openBookingModal(data = {}) {
    if (!bookingModal) return;

    if (data.occasion) {
      const occSelect = document.getElementById('clientOccasion');
      if (occSelect) {
        // Look for matching option or select first
        let matched = false;
        for (let i = 0; i < occSelect.options.length; i++) {
          if (occSelect.options[i].text.toLowerCase().includes(data.occasion.toLowerCase())) {
            occSelect.selectedIndex = i;
            matched = true;
            break;
          }
        }
      }
    }

    if (data.city) {
      const citySelect = document.getElementById('clientCity');
      if (citySelect) {
        for (let i = 0; i < citySelect.options.length; i++) {
          if (citySelect.options[i].text.toLowerCase().includes(data.city.toLowerCase())) {
            citySelect.selectedIndex = i;
            break;
          }
        }
      }
    }

    if (data.product) {
      const prodInput = document.getElementById('bookingProductInput');
      if (prodInput) prodInput.value = data.product;
      const notesInput = document.getElementById('clientNotes');
      if (notesInput && !notesInput.value) {
        notesInput.value = `Interested in ${data.product}`;
      }
    }

    if (data.notes) {
      const notesInput = document.getElementById('clientNotes');
      if (notesInput) notesInput.value = data.notes;
    }

    // Close Quick View if open
    if (quickViewModal) quickViewModal.classList.remove('active');

    // Close Mobile Drawer if open
    closeDrawer();

    bookingModal.classList.add('active');
    document.body.classList.add('modal-open');
    document.body.style.overflow = 'hidden';
  }

  openBookingButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const occasion = btn.getAttribute('data-occasion');
      const product = btn.getAttribute('data-product');
      const city = btn.getAttribute('data-city');
      openBookingModal({ occasion, product, city });
    });
  });

  if (closeBookingBtn && bookingModal) {
    closeBookingBtn.addEventListener('click', () => {
      bookingModal.classList.remove('active');
      document.body.classList.remove('modal-open');
      document.body.style.overflow = '';
    });
  }

  // Close modals on escape key or backdrop click
  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (bookingModal) bookingModal.classList.remove('active');
      if (quickViewModal) quickViewModal.classList.remove('active');
      document.body.classList.remove('modal-open');
      document.body.style.overflow = '';
    }
  });

  [bookingModal, quickViewModal].forEach(modal => {
    if (modal) {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('active');
          document.body.classList.remove('modal-open');
          document.body.style.overflow = '';
        }
      });
    }
  });

  // ==========================================
  // 7. FORM SUBMISSION (MODAL & CONTACT PAGE)
  // ==========================================
  const appointmentForm = document.getElementById('appointmentForm');
  if (appointmentForm) {
    appointmentForm.addEventListener('submit', (e) => {
      e.preventDefault();
      handleFormSubmit(appointmentForm, document.getElementById('bookingStatus'), document.getElementById('bookingSubmitBtn'));
    });
  }

  const pageContactForm = document.getElementById('pageContactForm');
  if (pageContactForm) {
    pageContactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      handleFormSubmit(pageContactForm, document.getElementById('pageFormStatus'), document.getElementById('pageSubmitBtn'));
    });
  }

  function handleFormSubmit(form, statusEl, submitBtn) {
    const formData = new FormData(form);
    const origBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span>Transmitting Request...</span>';

    fetch(`${config.baseUrl}/index.php?action=book_appointment`, {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = origBtnText;

      if (statusEl) {
        statusEl.style.display = 'block';
        if (data.success) {
          statusEl.className = 'form-status success';
          statusEl.innerHTML = `<strong>✨ Consultation Request Prepared!</strong><br>${data.message}<br><a href="${data.whatsapp_url}" target="_blank" class="btn btn-gold btn-sm" style="margin-top:10px; display:inline-block;">Open WhatsApp Chat Now 💬</a>`;
          form.reset();

          // Auto redirect to WhatsApp after 1.5s
          setTimeout(() => {
            window.open(data.whatsapp_url, '_blank');
          }, 1200);
        } else {
          statusEl.className = 'form-status error';
          statusEl.textContent = data.message || 'An error occurred. Please call or WhatsApp us directly.';
        }
      }
    })
    .catch(err => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = origBtnText;
      if (statusEl) {
        statusEl.style.display = 'block';
        statusEl.className = 'form-status error';
        statusEl.textContent = 'Network error. Please call +91 90424 09942 or WhatsApp directly.';
      }
    });
  }

  // ==========================================
  // 8. FAQ ACCORDION
  // ==========================================
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.faq-question-btn');
    const answerPanel = item.querySelector('.faq-answer-panel');

    if (questionBtn && answerPanel) {
      questionBtn.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        // Close other FAQs
        faqItems.forEach(other => {
          other.classList.remove('active');
          const otherPanel = other.querySelector('.faq-answer-panel');
          if (otherPanel) otherPanel.style.display = 'none';
        });

        if (!isActive) {
          item.classList.add('active');
          answerPanel.style.display = 'block';
        }
      });
    }
  });

});
