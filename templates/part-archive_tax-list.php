<h3>Archive</h3>

<?php
if(isset($_GET["post_type"])){
    $archive_pt = $_GET["post_type"];
}
$terms = get_terms('archive_tax');
if (!empty($terms) && !is_wp_error($terms)) {
    echo '<ul>';
    foreach ($terms as $term) {
        echo '<li><a href="/archived-work/' . $term->slug . '/?post_type='.$archive_pt.'">' . $term->name . '</li>';
    }
    echo '</ul>';
}
?>