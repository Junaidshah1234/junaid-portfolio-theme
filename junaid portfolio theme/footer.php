<!-- FOOTER -->
<footer>
    <p>
        <?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' Junaid S. · WordPress Expert · Pakistan')); ?>
        ·
        <a href="<?php echo esc_url(get_theme_mod('upwork_url', 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea')); ?>" 
           target="_blank" 
           rel="noopener noreferrer">
            Upwork Profile
        </a>
    </p>
</footer>

<!-- TOAST NOTIFICATION -->
<div id="toast">✓ Message sent! I'll be in touch shortly.</div>

<?php wp_footer(); ?>
</body>
</html>