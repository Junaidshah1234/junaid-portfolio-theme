/* ─────────────────────────────────────
   Junaid.dev Portfolio Scripts
   ───────────────────────────────────── */

/**
 * Scroll Reveal Animation
 */
const revealElements = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

revealElements.forEach(el => observer.observe(el));

/**
 * Mobile Menu Toggle
 */
function toggleMenu() {
  document.getElementById('mobileMenu').classList.toggle('open');
}

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
  const menu = document.getElementById('mobileMenu');
  if (menu && menu.classList.contains('open') && 
      !menu.contains(e.target) && 
      !e.target.closest('.hamburger')) {
    menu.classList.remove('open');
  }
});

/**
 * Contact Form Submit (AJAX)
 */
function submitContactForm(e) {
  e.preventDefault();
  
  const firstName = document.getElementById('fname').value.trim();
  const lastName = document.getElementById('lname').value.trim();
  const email = document.getElementById('email').value.trim();
  const service = document.getElementById('service').value;
  const message = document.getElementById('message').value.trim();
  
  if (!firstName || !email || !message) {
    alert('Please fill in your name, email, and message.');
    return;
  }
  
  const fullName = lastName ? firstName + ' ' + lastName : firstName;
  
  const formData = new FormData();
  formData.append('action', 'junaid_contact_form');
  formData.append('nonce', junaid_ajax.nonce);
  formData.append('name', fullName);
  formData.append('email', email);
  formData.append('service', service);
  formData.append('message', message);
  
  fetch(junaid_ajax.ajax_url, {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      showToast();
      document.getElementById('fname').value = '';
      document.getElementById('lname').value = '';
      document.getElementById('email').value = '';
      document.getElementById('service').value = '';
      document.getElementById('message').value = '';
    } else {
      alert('Failed to send message. Please try again.');
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('An error occurred. Please try again later.');
  });
}

/**
 * Show Toast Notification
 */
function showToast() {
  const toast = document.getElementById('toast');
  if (toast) {
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3500);
  }
}

/**
 * Smooth Active Nav Highlight
 */
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-links a');

let scrollTimeout;
window.addEventListener('scroll', () => {
    if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
    }
    scrollTimeout = window.requestAnimationFrame(() => {
        let currentSection = '';
        
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - 80) {
                currentSection = section.id;
            }
        });
        
        navLinks.forEach(link => {
            link.style.color = link.getAttribute('href') === '#' + currentSection 
                ? 'var(--accent)' 
                : '';
        });
    });
}, { passive: true });