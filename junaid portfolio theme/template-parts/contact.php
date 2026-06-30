<?php
$upwork_url    = get_theme_mod('upwork_url', 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea');
$location      = get_theme_mod('contact_location', 'Pakistan · Remote worldwide');
$response_time = get_theme_mod('contact_response_time', 'Usually within a few hours');
?>

<section id="contact">
  <div class="section-inner">
    <div class="contact-grid">
      <div>
        <div class="section-eyebrow reveal" style="color:#7dd3fc;">Get in touch</div>
        <h2 class="section-title display reveal">Have a project<br>in mind?</h2>
        <p class="section-sub reveal">Describe your WordPress issue or project below and I'll get back to you within a few hours.</p>
        <div class="contact-info">
          <div class="contact-item reveal">
            <div class="contact-item-icon">
              <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <h4>Location</h4>
              <p><?php echo esc_html($location); ?></p>
            </div>
          </div>
          <div class="contact-item reveal">
            <div class="contact-item-icon">
              <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.76a16 16 0 0 0 6.29 6.29l1.12-.93a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <h4>Upwork</h4>
              <p><a href="<?php echo esc_url($upwork_url); ?>" target="_blank" rel="noopener noreferrer">Message on Upwork →</a></p>
            </div>
          </div>
          <div class="contact-item reveal">
            <div class="contact-item-icon">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <h4>Response time</h4>
              <p><?php echo esc_html($response_time); ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="contact-form-card reveal">
        <form id="contactForm" onsubmit="submitContactForm(event)">
          <div class="form-row">
            <div class="form-group" style="flex:1; min-width:0;">
              <label>First name</label>
              <input type="text" placeholder="John" id="fname" required style="width:100%;" />
            </div>
            <div class="form-group" style="flex:1; min-width:0;">
              <label>Last name</label>
              <input type="text" placeholder="Smith" id="lname" style="width:100%;" />
            </div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="john@example.com" id="email" required />
          </div>
          <div class="form-group">
            <label>Service needed</label>
            <label for="service" class="screen-reader-text">Service needed</label>
            <select id="service">
              <option value="">Select a service...</option>
              <option>Figma to WordPress</option>
              <option>Elementor Build / Fix</option>
              <option>WordPress Bug Fixing</option>
              <option>Custom Plugin Development</option>
              <option>Custom Theme Development</option>
              <option>WooCommerce Setup / Fix</option>
              <option>Speed Optimization</option>
              <option>Security / Malware Removal</option>
              <option>Site Migration</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tell me about your project</label>
            <textarea placeholder="Describe your WordPress issue or project in as much detail as you can..." id="message" required></textarea>
          </div>
          <button type="submit" class="form-submit">Send message →</button>
        </form>
      </div>
    </div>
  </div>
</section>