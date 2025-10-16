(function () {
  'use strict';

  function initFadeImages() {
    const images = document.querySelectorAll('.fade:not(.loaded)');

    if (images.length === 0) {
      return;
    }

    const loadedImages = [];
    const pendingImages = [];

    images.forEach(img => {
      if (img.complete && img.naturalWidth > 0) {
        loadedImages.push(img);
      } else {
        pendingImages.push(img);
      }
    });

    loadedImages.forEach(img => img.classList.add('loaded'));

    if (pendingImages.length > 0) {
      if ('IntersectionObserver' in window) {
        setupIntersectionObserver(pendingImages);
      } else {
        pendingImages.forEach(img => img.classList.add('loaded'));
      }
    }
  }

  function setupIntersectionObserver(images) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;

          const delay = Math.random() * 100;

          setTimeout(() => {
            if (img.isConnected && !img.classList.contains('loaded')) {
              img.classList.add('loaded');
            }
          }, delay);

          observer.unobserve(img);
        }
      });
    }, {
      threshold: 0.01,
      rootMargin: '50px'
    });

    images.forEach(img => observer.observe(img));
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFadeImages);
  } else {
    initFadeImages();
  }

})();