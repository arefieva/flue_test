<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "news" ); ?>'><?php echo Html::anchor('admin/news','News');?></li>
	<li class='<?php echo Arr::get($subnav, "add" ); ?>'><?php echo Html::anchor('admin/add','Add');?></li>
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('admin/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('admin/delete','Delete');?></li>

</ul>
<p>Delete</p>