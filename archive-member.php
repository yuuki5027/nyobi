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
            <?php if(get_field('avatar')): ?>
                  <img class="member-avatar" src="<?php the_field('avatar'); ?>">
              <?php else : ?>
                  <img class="member-avatar" src="https://via.placeholder.com/72?text=N" class="attachment-thumbnail">
              <?php endif; ?>
              <h2 class="member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <ul class="member-subject">
                <?php $terms = get_the_terms($post->ID,'subject'); ?>
                <?php
                  foreach ( $terms as $term ){
                    echo '<li>' . $term->name . '</li>';
                  }
                ?>
              </ul>
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