<ul class="nav nav-pills">
    <li class='<?php echo Arr::get($subnav, "news"); ?>'><?php echo Html::anchor('admin/news', 'News'); ?></li>
    <li class='<?php echo Arr::get($subnav, "add"); ?>'><?php echo Html::anchor('admin/add', 'Add'); ?></li>
    <li class='<?php echo Arr::get($subnav, "edit"); ?>'><?php echo Html::anchor('admin/edit', 'Edit'); ?></li>
    <li class='<?php echo Arr::get($subnav, "delete"); ?>'><?php echo Html::anchor('admin/delete', 'Delete'); ?></li>
</ul>
<p>News</p>

<ul>
    <?php foreach ($news as $new) { ?>
        <li><?= $new['title']; ?>
            <a href="/fuel/public/admin/edit/<?= $new->new_id; ?>">Edit Details</a>
            <a href="/fuel/public/admin/delete/<?= $new->new_id; ?>">Delete</a>
        </li>
    <?php } ?>
</ul>