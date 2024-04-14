<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <span class="date"><?php the_date(); ?></span>
            <?php
            // Output the post tags
            the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
            ?>
            <?php
            // Output the post categories
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<span class="tag"><i class="fa fa-tag"></i> ' . $category->name . '</span>';
                }
            }
            ?>
            <span class="comment"><a href="#comments"><i class='fa fa-comment'></i> <?php comments_number(); ?></a></span>
        </div>
    </header>

    <?php
    the_content();
    ?>

    <?php
    comments_template();
    ?>
</div>