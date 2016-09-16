<div class="box category">
	<div class="box-heading"><h3><?php echo $heading_title; ?></h3></div>
	<div class="box-content">
		<div class="box-category">
		<div class="list-group">
			<?php foreach ($categories as $category) { ?>
			<?php if ($category['category_id'] == $category_id) { ?>
			<a href="<?php echo $category['href']; ?>" class="list-group-item active category-<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></a>
			<?php if ($category['children']) { ?>
			<?php foreach ($category['children'] as $child) { ?>
			<?php if ($child['category_id'] == $child_id) { ?>
			<a href="<?php echo $child['href']; ?>" class="list-group-item active category-<?php echo $category['category_id']; ?>"">&nbsp;&nbsp;&nbsp;- <?php echo $child['name']; ?></a>
			<?php } else { ?>
			<a href="<?php echo $child['href']; ?>" class="list-group-item category-<?php echo $category['category_id']; ?>"">&nbsp;&nbsp;&nbsp;- <?php echo $child['name']; ?></a>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			<?php } else { ?>
			<a href="<?php echo $category['href']; ?>" class="list-group-item category-<?php echo $category['category_id']; ?>""><?php echo $category['name']; ?></a>
			<?php } ?>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
