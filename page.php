<?php get_header(); ?>
<section>
<div class="featured-image">
    <?php the_post_thumbnail('large');?>
</div>
</section>
<main class="container">
<?php
    if (have_posts()){
        while (have_posts()) {
            the_post();
            ?>
            <div class="single-page">
                <div class="text-container">
                    <h1 class="page-h1"><?php the_title();?></a></h1>
                    <p class="body-content"><?php the_content();?></p>
                </div>
            </div>
            <?php
        }
    }
?>
</main>
<?php get_footer(); ?>
