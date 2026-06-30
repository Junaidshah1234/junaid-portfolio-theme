<?php
$big_stat   = get_theme_mod('why_big_stat', '100%');
$stat_label = get_theme_mod('why_stat_label', 'Job Success Score on Upwork');
$stat_sub   = 'Across ' . get_theme_mod('stat_jobs', '38+') . ' completed projects worldwide';
?>

<section id="why">
  <div class="section-inner">
    <div class="why-grid">
      <div>
        <div class="section-eyebrow reveal">Why choose me</div>
        <h2 class="section-title display reveal">Results, not<br>excuses</h2>
        <p class="section-sub reveal">I've fixed problems that 3 other developers couldn't solve. Here's why clients keep coming back.</p>
        <div class="why-points">
          <div class="why-point reveal">
            <div class="why-icon">
              <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <div>
              <h3>Fast turnaround</h3>
              <p>Most bug fixes are resolved within 24 hours. Urgent issues handled immediately with priority support.</p>
            </div>
          </div>
          <div class="why-point reveal">
            <div class="why-icon">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <h3>Clean code, no hacks</h3>
              <p>I fix root causes, not symptoms. No !important spam, no copy-pasted StackOverflow snippets that break tomorrow.</p>
            </div>
          </div>
          <div class="why-point reveal">
            <div class="why-icon">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div>
              <h3>Clear communication</h3>
              <p>You'll always know what I'm doing and why. Daily updates, plain English explanations — no technical jargon.</p>
            </div>
          </div>
          <div class="why-point reveal">
            <div class="why-icon">
              <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h3>Satisfaction guaranteed</h3>
              <p>I don't close a project until you're happy. 100% job success rate on Upwork speaks for itself.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="why-card reveal">
        <div class="why-big-stat"><?php echo esc_html($big_stat); ?></div>
        <div class="why-stat-label"><?php echo esc_html($stat_label); ?></div>
        <div class="why-stat-sub"><?php echo esc_html($stat_sub); ?></div>
        <div class="why-mini-grid">
          <div class="why-mini">
            <div class="why-mini-num"><?php echo esc_html(get_theme_mod('why_mini_1_num', '38+')); ?></div>
            <div class="why-mini-lbl"><?php echo esc_html(get_theme_mod('why_mini_1_label', 'Completed projects')); ?></div>
          </div>
          <div class="why-mini">
            <div class="why-mini-num"><?php echo esc_html(get_theme_mod('why_mini_2_num', '5.0★')); ?></div>
            <div class="why-mini-lbl"><?php echo esc_html(get_theme_mod('why_mini_2_label', 'Average rating')); ?></div>
          </div>
          <div class="why-mini">
            <div class="why-mini-num"><?php echo esc_html(get_theme_mod('why_mini_3_num', '24h')); ?></div>
            <div class="why-mini-lbl"><?php echo esc_html(get_theme_mod('why_mini_3_label', 'Avg response time')); ?></div>
          </div>
          <div class="why-mini">
            <div class="why-mini-num"><?php echo esc_html(get_theme_mod('why_mini_4_num', '4+')); ?></div>
            <div class="why-mini-lbl"><?php echo esc_html(get_theme_mod('why_mini_4_label', 'Years experience')); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>