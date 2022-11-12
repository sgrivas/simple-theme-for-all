<?php get_header(); ?>
<section class="container">
    <h1 class="page-h1">
    <?php
        if (is_category()) {
            single_cat_title();
        } elseif (is_tag()){
            single_tag_title();
        } elseif (is_day()){
            echo "Daily Archives: ".get_the_date();
        } elseif(is_month()){
            echo "Monthly Archives: ".get_the_date('F Y');
        } elseif(is_year()){
            echo "Yearly Archives: ".get_the_date('Y');
        } else{
            echo "Archives";
        }
    ?>
    </h1>
    <div class="row">
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
    </div>
    <div>
        <?php proPhotographyPagination(); ?>
    </div>
</section>
<?php get_footer(); ?>
