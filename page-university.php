<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <h1 class="text-center">大学受験対策授業</h1>
    <p>大学受験を目指すためのオリジナルカリキュラム授業にネットから参加できる。</p>
    <img src="<?php echo get_template_directory_uri(); ?>/images/university-kv.jpg" class="image-responsive">
    <h2 class="text-center">実力派予備校講師×大学受験対策授業</h2>
    <p>学習参考書の出版社として約30年の歴史を持つKADOKAWA中経出版の蓄積したノウハウが詰め込まれた教材と、実力派講師陣による授業で、大学受験に必要な実力を養うことができます。</p>
    <?php
      if(have_posts()):
        while(have_posts()) : the_post();
         the_content();
        endwhile;
      endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>