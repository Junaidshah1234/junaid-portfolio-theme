<?php
$testimonials = new WP_Query(array(
    'post_type'      => 'junaid_testimonial',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
));
?>

<section id="reviews">
  <div class="section-inner">
    <div class="section-eyebrow reveal">Client reviews</div>
    <h2 class="section-title display reveal">What clients say</h2>
    <p class="section-sub reveal">Real reviews from real Upwork clients.</p>
    <div class="reviews-grid">
      
      <?php if ($testimonials->have_posts()) : ?>
        <?php while ($testimonials->have_posts()) : $testimonials->the_post();
            $name      = get_post_meta(get_the_ID(), '_client_name', true);
            $initials  = get_post_meta(get_the_ID(), '_client_initials', true);
            if (empty($initials) && !empty($name)) {
                $words = explode(' ', trim($name));
                $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
            }
            $job       = get_post_meta(get_the_ID(), '_client_job', true);
            $rating    = get_post_meta(get_the_ID(), '_rating', true) ?: 5;
        ?>
        <div class="review-card reveal">
          <div class="review-stars">
            <?php echo junaid_get_stars($rating); ?>
          </div>
          <p class="review-text">"<?php echo esc_html(get_the_content()); ?>"</p>
          <div class="reviewer-row">
            <div class="reviewer-avatar"><?php echo esc_html(strtoupper($initials)); ?></div>
            <div>
              <div class="reviewer-name"><?php echo esc_html($name); ?></div>
              <?php if (!empty($job)): ?>
              <div class="reviewer-job"><?php echo esc_html($job); ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else: ?>
        <div class="review-card reveal" style="grid-column: 1/-1; text-align:center; padding:3rem;">
          <p style="color:var(--ink-muted);">No testimonials yet. Add them from the WordPress dashboard.</p>
        </div>
      <?php endif; ?>
      
    </div>
  </div>
</section>