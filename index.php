<?php get_header(); ?>

<main>
 <div class="main-wrapper">
  <h1 class="header">新着のお知らせ</h1>
  <div class="post-list">
<?php
 if(have_posts()):
  while(have_posts()) : the_post();
?>
<div class="post-item">
  <?php   
   if(has_post_thumbnail()){
     the_post_thumbnail('thumbnail');
   } else {
     ?>
     <img src="https://via.placeholder.com/72?text=N" class="attachment-thumbnail">
     <?
   }
   ?>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p class="post-date">
  <span class="post-date"><?php the_time('Y年n月j日'); ?> @ <?php the_time('g:i a'); ?></span>
  <span class="post-category"><?php the_category(','); ?></span>
  </p>
  <?php the_excerpt();?>
</div>
<?php
  endwhile;
  else:
?>
  <div class="post">
    <h2>記事はありません</h2>
    <p>お探しの記事はありませんでした</p>
  </div>

<?php
  endif;
?>
</div>
<?php the_posts_pagination(); ?>
<?php
$args = array(
  'post_type' => 'member',
  'posts_per_page' => 3,
); ?>
<div class="member-list">
  <article>
    <?php $member_query = new WP_Query( $args ); ?>
    <?php while ( $member_query->have_posts() ) : $member_query->the_post(); ?>
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
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </article>
</div>
<div class="text-center"><a href="<?php echo get_post_type_archive_link('member'); ?>">もっと見る</a></div>
  </div>
</main>

<?php get_footer(); ?>
