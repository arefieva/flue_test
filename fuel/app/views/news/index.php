<h1>News</h1>

<?php if ($news) {
 foreach ($news as $new) { ?>
    <div class="new">
        <h2><?= $new['title']; ?></h2>
        <p><?= $new['short_description']; ?></p>
        <p><?= $new['full_content']; ?></p>
        <p>created at <?= $new['created_at']; ?> by <?= $new['author']; ?></p>
    </div>
<?php }
} else {
    echo '<p>Not found</p>';
} ?>


