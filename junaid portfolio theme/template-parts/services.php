<?php
$services = new WP_Query(array(
    'post_type'      => 'junaid_service',
    'posts_per_page' => 9,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
?>

<section id="services">
  <div class="section-inner">
    <div class="section-eyebrow reveal">What I offer</div>
    <h2 class="section-title display reveal">A to Z WordPress<br>services</h2>
    <p class="section-sub reveal">From a broken button to a full custom theme — if it's WordPress, I handle it.</p>

    <div class="services-grid">
      <?php if ($services->have_posts()) : ?>
        <?php while ($services->have_posts()) : $services->the_post(); 
            $icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'theme';
            $tags = get_the_terms(get_the_ID(), 'service_tag');
        ?>
        <div class="service-card reveal">
          <div class="service-icon">
            <?php echo junaid_get_service_icon($icon); ?>
          </div>
          <div class="service-title"><?php the_title(); ?></div>
          <div class="service-desc"><?php the_content(); ?></div>
          <?php if ($tags && !is_wp_error($tags)): ?>
          <div class="service-tags">
            <?php foreach ($tags as $tag): ?>
              <span class="tag"><?php echo esc_html($tag->name); ?></span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>