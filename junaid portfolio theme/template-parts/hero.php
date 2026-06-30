<?php
$badge        = get_theme_mod('hero_badge', 'Available for new projects');
$title_line1  = get_theme_mod('hero_title_line1', 'WordPress Expert.');
$title_line2  = get_theme_mod('hero_title_line2', 'Zero Compromise.');
$description  = get_theme_mod('hero_description', 'I turn broken WordPress sites into fast, pixel-perfect products — from Figma design to live site, Elementor builds, custom plugins, WooCommerce, and everything in between. Top Rated on Upwork.');
$upwork_url   = get_theme_mod('upwork_url', 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea');
$profile_name = get_theme_mod('profile_name', 'Junaid S.');
$profile_title = get_theme_mod('profile_title', 'WordPress Specialist · Pakistan');
$stat_jobs    = get_theme_mod('stat_jobs', '38+');
$stat_success = get_theme_mod('stat_success', '100%');
$stat_rated   = get_theme_mod('stat_rated', 'Top');
$profile_img  = get_theme_mod('profile_image', get_template_directory_uri() . '/images/My Image.jpeg');
$review_count = wp_count_posts('junaid_testimonial')->publish;
?>

<section style="padding:0; background: var(--surface);">
  <div class="hero">
    <div>
      <div class="hero-badge"><?php echo esc_html($badge); ?></div>
      <h1 class="display"><?php echo esc_html($title_line1); ?><br><em><?php echo esc_html($title_line2); ?></em></h1>
      <p class="hero-sub"><?php echo esc_html($description); ?></p>
      <div class="hero-btns">
        <a href="#contact" class="btn-primary">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          Let's talk
        </a>
        <a href="#services" class="btn-outline">
          View services
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
      <div class="hero-trust">
        <div class="trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          Top Rated Upwork
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          100% Job Success
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          5.0 ★ Rating
        </div>
      </div>
    </div>

    <div class="profile-card reveal">
      <div class="avatar-ring">
        <img src="<?php echo esc_url($profile_img); ?>" alt="<?php echo esc_attr($profile_name); ?>" />
      </div>
      <div class="profile-name"><?php echo esc_html($profile_name); ?></div>
      <div class="profile-title"><?php echo esc_html($profile_title); ?></div>
      <div class="stars">
        <?php echo junaid_get_stars(); ?>
        <span>5.0 (<?php echo esc_html($review_count); ?> reviews)</span>
      </div>
      <div class="stat-grid">
        <div class="stat-box">
          <div class="stat-num"><?php echo esc_html($stat_jobs); ?></div>
          <div class="stat-lbl">Jobs done</div>
        </div>
        <div class="stat-box">
          <div class="stat-num"><?php echo esc_html($stat_success); ?></div>
          <div class="stat-lbl">Success</div>
        </div>
        <div class="stat-box">
          <div class="stat-num"><?php echo esc_html($stat_rated); ?></div>
          <div class="stat-lbl">Rated</div>
        </div>
      </div>
      <a href="<?php echo esc_url($upwork_url); ?>" target="_blank" rel="noopener noreferrer" class="upwork-badge">
        <svg viewBox="0 0 32 32" fill="currentColor"><path d="M24.75 17.542c-1.469 0-2.849-.62-4.099-1.635l.305-1.437.013-.077c.269-1.596 1.107-4.278 3.781-4.278 1.99 0 3.609 1.619 3.609 3.609 0 1.996-1.619 3.818-3.609 3.818zm0-10.583c-3.285 0-5.838 2.147-6.881 5.637-.997-1.498-1.758-3.299-2.206-4.82H12.23v5.826c0 1.879-1.529 3.408-3.408 3.408s-3.408-1.529-3.408-3.408V7.776H1.98v5.826c0 3.765 3.063 6.841 6.841 6.841s6.841-3.076 6.841-6.841v-.976c.441 .924.986 1.862 1.641 2.72l-2.307 10.809h3.479l1.481-6.974c1.309.809 2.783 1.317 4.393 1.317 3.765 0 6.841-3.076 6.841-6.841.001-3.765-3.075-6.915-6.84-6.915z"/></svg>
        View Upwork Profile
      </a>
    </div>
  </div>
</section>