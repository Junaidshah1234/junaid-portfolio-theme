<?php
$steps = new WP_Query(array(
    'post_type'      => 'junaid_process',
    'posts_per_page' => 4,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
?>

<section id="process">
  <div class="section-inner">
    <div class="section-eyebrow reveal">How I work</div>
    <h2 class="section-title display reveal">Simple. Clear. Fast.</h2>
    <p class="section-sub reveal">No guesswork. No delays. Just results.</p>
    <div class="process-steps reveal">
      
      <?php if ($steps->have_posts()) : ?>
        <?php $step_num = 1; ?>
        <?php while ($steps->have_posts()) : $steps->the_post(); ?>
        <div class="process-step">
          <div class="step-num">Step <?php echo str_pad($step_num, 2, '0', STR_PAD_LEFT); ?></div>
          <div class="step-title"><?php the_title(); ?></div>
          <div class="step-desc"><?php the_content(); ?></div>
        </div>
        <?php $step_num++; endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
      
    </div>
  </div>
</section>