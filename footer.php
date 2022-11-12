<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="footer-logo" href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
                <p><?php bloginfo('description'); ?></p>
            </div>
            <div class="col-md-3">
                <?php
                if (has_nav_menu('footer-middle')) { ?>
                    <nav class="footer-menu">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-middle',
                        ));
                    ?>
                    </nav>
                <?php } else {
                    echo "<p>Please select a main menu through the dashboard.</p>";
                }?>
            </div>
            <div class="col-md-3">
                <?php
                if (has_nav_menu('footer-right')) { ?>
                    <nav class="footer-menu">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-right',
                        ));
                    ?>
                    </nav>
                <?php } else {
                    echo "<p>Please select a main menu through the dashboard.</p>";
                }?>
            </div>
            
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>