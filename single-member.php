<?php get_header(); ?>

<main>
  <div class="main-wrapper">
    <h1 class="text-center">講師紹介</h1>
    <div class="member-list">
      <article>
        <?php
          if(have_posts()):
            while(have_posts()) : the_post();
            ?>
            <section>
              <div class="lay-clear">
              <?php if(get_field('avatar')): ?>
                  <img class="member-avatar" src="<?php the_field('avatar'); ?>">
              <?php else : ?>
                  <img class="member-avatar" src="https://via.placeholder.com/72?text=N" class="attachment-thumbnail">
              <?php endif; ?>
                <h2 class="member-name"><?php the_title(); ?></h2>
                <ul class="member-subject">
                  <?php $terms = get_the_terms($post->ID,'subject'); ?>
                  <?php
                    foreach ( $terms as $term ){
                      echo '<li>' . $term->name . '</li>';
                    }
                  ?>
                </ul>
                <?php if(get_field('twitter')): ?>
                  <a href="https://twitter.com/<?php the_field('twitter'); ?>">@<?php the_field('twitter'); ?></a>
                <?php endif; ?>
              </div>
              <?php
              $content_string = get_the_content();
              $content_string = str_replace('<p','<p class="sentence" ',$content_string);
              echo $content_string;
              ?>
            </section>
        <?php
            endwhile;
          endif;
        ?>
      </article>
    </div>
  </div>
</main>

<?php get_footer(); ?>
