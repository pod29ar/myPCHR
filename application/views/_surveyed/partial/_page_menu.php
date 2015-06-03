<div class="row deep-menu">
	<?php
	$menuCount = count($page_menu);
	$menuColumns = 12 / $menuCount;
	foreach ($page_menu as $pm):
		$class = '';
		if (strtolower($pm['name']) == strtolower($page_menu_active))
			$class = 'active';
	?>
		<div class="small-<?php echo $menuColumns;?> columns dm-item <?php echo $class;?>">
			<a href="<?php echo base_url($pm['url']);?>" class="dm-anchor" data-type="<?php echo $pm['name'];?>"><?php echo $pm['name'];?></a>
		</div>
	<?php endforeach;?>
</div>