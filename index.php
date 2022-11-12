<?php get_header(); ?>
<main class="container">
<div>
    <h1 class="page-h1"><?php single_post_title(); ?></h1>
</div>
<section class="row">
<?php
    if (have_posts()){
        while (have_posts()) {
            the_post();
            ?>
            <div class="individual-post col-md-4">
                <a href="<?php the_permalink();?>">
                    <div class="featured-image">
                        <?php the_post_thumbnail('large');?>
                    </div>
                    <div class="text-container">
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <p class="excerpt"><?php echo get_the_excerpt();?></p>
                        <a class="btn btn-dark" href="<?php the_permalink();?>">Read More</a>
                    </div>
                </a>
            </div>
            <?php
        } 
    }
?>
</section>
<section>
    <?php proPhotographyPagination(); ?>
</section>
</main>
<?php get_footer(); ?>
