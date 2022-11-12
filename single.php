<?php get_header(); ?>
<main>
<?php
    if (have_posts()){
        while (have_posts()) {
            the_post();
            ?>
            <div class="container">
                <div class="row post-intro">
                    <div class="col-md-8">
                        <h1><?php the_title();?></a></h1>
                    </div>
                    <div class="col-md-12">
                        <?php
                            post_data();
                        ?>
                    </div>
                </div>
            </div>
            <div class="featured-image">
                <?php the_post_thumbnail('large');?>
            </div>
            <div class="container post-content">
                <p><?php the_content();?></p>
                <hr>
            </div>
            <?php
        }
    }
?>
<br>
</main>
<aside class="container">
    <h2>Featured News</h2>
    <div class="row">
        <?php
            $args = array(
                'post_type' => 'post',
                'post-status' => 'publish',
                'order' => 'DESC',
                'orderby' => 'desc',
                'category_name' => 'featured',
                'posts_per_page' => 3
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(); ?>
                    <div class="individual-post col-md-4">
                        <a href="<?php the_permalink();?>">
                            <div class="featured-image">
                                <?php the_post_thumbnail('large');?>
                            </div>
                            <div>
                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <p class="excerpt"><?php echo get_the_excerpt();?></p>
                                <a class="btn btn-light" href="<?php the_permalink();?>">Read More</a>
                            </div>
                        </a> 
                    </div>
                <?php }
            }
        ?>
    </div>  
</aside>
<?php get_footer(); ?>
