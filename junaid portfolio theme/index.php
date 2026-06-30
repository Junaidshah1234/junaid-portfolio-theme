<?php
get_header();
?>

<main style="min-height:60vh; display:flex; align-items:center; justify-content:center; padding:4rem 2rem; background:#f7f6f2;">
    <div style="text-align:center;">
        <h1 class="display" style="font-size:clamp(28px,4vw,42px);"><?php bloginfo('name'); ?></h1>
        <p style="margin-top:1rem; color:#4a4a4a; font-size:17px;"><?php bloginfo('description'); ?></p>
    </div>
</main>

<?php get_footer(); ?>