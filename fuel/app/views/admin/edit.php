<ul class="nav nav-pills">
    <li class='<?php echo Arr::get($subnav, "news"); ?>'><?php echo Html::anchor('admin/news', 'News'); ?></li>
    <li class='<?php echo Arr::get($subnav, "add"); ?>'><?php echo Html::anchor('admin/add', 'Add'); ?></li>
    <li class='<?php echo Arr::get($subnav, "edit"); ?>'><?php echo Html::anchor('admin/edit', 'Edit'); ?></li>
    <li class='<?php echo Arr::get($subnav, "delete"); ?>'><?php echo Html::anchor('admin/delete', 'Delete'); ?></li>

</ul>
<p>Edit</p>

<?php
if (isset($errors)) {
    echo '<ul style="color:red"> Errors ';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>
<?php echo Form::open(['action' => 'admin/edit' . $new->new_id, 'method' => 'post']); ?>

<div class = "form-group">
    <?php
    echo Form::label('New title:', 'title');
    echo Form::input('title', isset($new) ? $new->title : '', array('class' => 'form-control'));
    ?>
</div>

<div class = "form-group">
    <?php
    echo Form::label('New short_description:', 'short_description');
    echo Form::input('short_description', isset($new) ? $new->short_description : '', array('class' => 'form-control'));
    ?>
</div>

<div class = "form-group">
    <?php
    echo Form::label('New full_content:', 'full_content');
    echo Form::input('full_content', isset($new) ? $new->full_content : '', array('class' => 'form-control'));
    ?>
</div>

<div class = "form-group">
    <?php
    echo Form::label('New author:', 'author');
    echo Form::input('author', isset($new) ? $new->author : '', array('class' => 'form-control'));
    ?>
</div>

<div>
    <?php echo Form::submit('update'); ?>
</div>
<?php echo Form::close(); ?>