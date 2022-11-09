<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Employee :: add page</title>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <?php echo Asset::css('bootstrap.css'); ?>
</head>

<body>
<div class = "container">
    <ul class="nav nav-pills">
        <li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('admin/news','News');?></li>
        <li class='<?php echo Arr::get($subnav, "add" ); ?>'><?php echo Html::anchor('admin/add','Add');?></li>
        <li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('admin/edit','Edit');?></li>
        <li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('admin/delete','Delete');?></li>

    </ul>
    <p>Add</p>

    <?php
    echo Form::open(['action' => 'admin/add', 'method' => 'post']);
    ?>

    <div class = "form-group">
        <?php
        echo Form::label('New title:', 'title');
        echo Form::input('title', '', array('class' => 'form-control'));
        ?>
    </div>

    <div class = "form-group">
        <?php
        echo Form::label('New short_description:', 'short_description');
        echo Form::input('short_description', '', array('class' => 'form-control'));
        ?>
    </div>

    <div class = "form-group">
        <?php
        echo Form::label('New full_content:', 'full_content');
        echo Form::input('full_content', '', array('class' => 'form-control'));
        ?>
    </div>

    <div class = "form-group">
        <?php
        echo Form::label('New author:', 'author');
        echo Form::input('author', '', array('class' => 'form-control'));
        ?>
    </div>

    <?php echo Form::button('frmbutton', 'Submit', array(
        'class' => 'btn btn-default'));
    ?>

    <?php
    echo Form::close();
    ?>
</div>
</body>

</html>

