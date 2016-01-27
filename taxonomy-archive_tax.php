<article id="content" class="col-xs-12">
    <div class="row">
        <div class="page-header colored-background image-background overlay" style="background-image:url('<?php
            $id = get_post_thumbnail_id(2407);
            echo wp_get_attachment_image_src($id, 'full')[0];
            ?>')">
            <?php get_template_part('templates/page', 'colored-header'); ?>
            <?php //get_template_part('templates/content-header', 'text'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <?php
                // TODO JW - this query should pull the news items published in the last 7 days
                // WP_Query arguments
               
                $args = array (
                'post_type'              => $_GET["post_type"],
                'pagination'             => false,
                'posts_per_page'         => '12',

                );
                // The Query
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part('templates/content-archive_tax');
                }
                } else {
                get_template_part('templates/content', 'no-posts');
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-xs-12 col-sm-3">

                <aside class="sidebar" role="complementary">
                    <section class="widget search-2 widget_search">
                        <?php
                           get_template_part('templates/searchform');
                        ?>
                    </section>
                    <section class="widget archives widget_archive">
                        <?php
                            get_template_part('templates/part-archive_tax-list');
                        ?>
                    </section>
                    </aside><!-- /.sidebar -->

                </div>
            </div>
        </div>