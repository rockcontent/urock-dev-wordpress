<?php get_header(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <?php if (have_posts()) { ?>
                <?php while (have_posts()) { ?>
                    <?php the_post(); ?>

                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php the_title(); ?></h2>

                        <?php $categories = get_the_category(); ?>

                        <p>
                            <?php if ( ! empty($categories)) {
                                foreach ($categories as $cat) {
                                    echo '<a href="' . get_category_link($cat->term_id) . '" class="blog-post-meta">' . $cat->name . '</a>';
                                }
                            } ?>
                        </p>

                        <?php the_content(); ?>

                        <?php comments_template('', true); ?>

                    </div>
                <?php } ?>
            <?php } else { ?>
                <h2>Ops, nenhum post encontrado</h2>
            <?php } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
