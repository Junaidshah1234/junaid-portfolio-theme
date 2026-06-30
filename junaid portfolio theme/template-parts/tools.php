<?php
$tools = new WP_Query(array(
    'post_type'      => 'junaid_tool',
    'posts_per_page' => 12,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
?>

<section id="tools">
  <div class="section-inner">
    <div class="section-eyebrow reveal">Tech stack</div>
    <h2 class="section-title display reveal">Tools I use daily</h2>
    <div class="tools-grid reveal">
      
      <?php if ($tools->have_posts()) : ?>
        <?php while ($tools->have_posts()) : $tools->the_post(); ?>
        <div class="tool-pill">
          <?php echo junaid_get_tool_icon(get_the_title()); ?>
          <?php the_title(); ?>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
      
    </div>
  </div>
</section>