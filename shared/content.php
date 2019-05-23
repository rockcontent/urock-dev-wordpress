<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

    <?php $categories = get_the_category(); ?>

    <p>
        <?php if ( ! empty($categories)) {
            foreach ($categories as $cat) {
                echo '<a href="' . get_category_link($cat->term_id) . '" class="blog-post-meta">' . $cat->name . '</a>';
            }
        } ?>
    </p>

    <?php the_excerpt(); ?>
</div>
