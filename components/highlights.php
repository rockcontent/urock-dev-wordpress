<div class="highlights">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            $highlights_query = rock_highlights_query();

            if ($highlights_query->have_posts()) {

                $i = 0;
                while ($highlights_query->have_posts()) {
                    $highlights_query->the_post();

                    $link = get_post_meta(get_the_ID(), 'link', true);

                    ?>
                    <div class="carousel-item <?php echo $i == 0 ? "active" : null ?>">
                        <?php the_post_thumbnail('highlights', array('class' => 'd-block w-100')); ?>

                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php the_title(); ?></h5>
                            <?php the_content(); ?>

                            <?php if ( ! empty($link)) { ?>
                                <a href="<?php echo $link ?>" class="btn btn-primary">Saiba mais</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    $i++;
                }

                /* Restore original Post Data */
                wp_reset_postdata();
            } else {
                // no posts found
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
