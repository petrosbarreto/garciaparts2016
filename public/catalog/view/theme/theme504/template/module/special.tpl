<script>
jQuery(document).ready(function(){
	$('.specials-scroll').bxSlider({
		minSlides: 1,
		maxSlides: 4,
		slideWidth: 270,
		slideMargin: 30,
		pager:false,
		moveSlides: 1
	});
	$(".quickview-special").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'elastic',
			
		});
});
</script>
<div class="box specials">
	<div class="box-heading"><h3><?php echo $heading_title; ?></h3></div>
	<div class="box-content">
		<div class="product-layout">
			<ul class="specials-scroll">
			<?php $t=0; foreach ($products as $product) { $t++ ?>
			<li>
				<div class="product-thumb transition">
					<a class="quickview quickview-special" rel="group" href="#quickview_specials_<?php echo $t?>">
					<?php echo $text_quick; ?>
				</a>
				<div class="quick_info">
					<div id="quickview_specials_<?php echo $t?>">
						<div>
							<div class="left col-sm-4">
									<div class="quickview_image image"><a href="<?php echo $product['href']; ?>"><img alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" src="<?php echo $product['thumb']; ?>" /></a></div>
								</div>
								<div class="right col-sm-8">
									<h2><?php echo $product['name']; ?></h2>
									<div class="inf">
										<?php if ($product['author']) {?>
											<p class="quickview_manufacture manufacture manufacture"><?php echo $text_manufacturer; ?> <a href="<?php echo $product['manufacturers'];?>"><?php echo $product['author']; ?></a></p>
										<?php }?>
										<?php if ($product['model']) {?>
											<p class="product_model model"> <?php echo $text_model; ?> <?php echo $product['model']; ?></p>
										<?php }?>

										<?php if ($product['price']) { ?>
										<div class="price">
										<?php if (!$product['special']) { ?>
										<?php echo $product['price']; ?>
										<?php } else { ?>
										<span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
										<?php } ?>
										<?php if ($product['tax']) { ?>
										<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
										<?php } ?>
										</div>
										<?php } ?>
									</div>
									<div class="cart-button">
										<button class="btn btn-add" type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-shopping-cart"></i></button>
										<button class="btn btn-icon" type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
										<button class="btn btn-icon" type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-exchange"></i></button>
									</div>
									<div class="clear"></div>
									<div class="rating">
										<?php for ($i = 1; $i <= 5; $i++) { ?>
										<?php if ($product['rating'] < $i) { ?>
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
										<?php } else { ?>
										<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
										<?php } ?>
										<?php } ?>
									</div>
										
								</div>
								<div class="col-sm-12">
									<div class="quickview_description description">
										<?php echo $product['description1'];?>
									</div>
								</div>
						</div>
					</div>
				</div>
					<?php if ($product['special']) { ?>
						<div class="sale"><?php echo $text_sale; ?></div>
					<?php } ?>
					<div class="image">
						<a href="<?php echo $product['href']; ?>">
							<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" />
						</a>
					</div>
					<div class="caption">
						<div class="name">
							<a href="<?php echo $product['href']; ?>">
								<?php echo $product['name']; ?>
							</a>
						</div>
						<div class="description">
							<?php echo $product['description']; ?>
						</div>
						<?php if ($product['rating']) { ?>
						<div class="rating">
							<?php for ($i = 1; $i <= 5; $i++) { ?>
							<?php if ($product['rating'] < $i) { ?>
							<span class="fa fa-stack">
								<i class="fa fa-star-o fa-stack-2x"></i>
							</span>
							<?php } else { ?>
							<span class="fa fa-stack">
								<i class="fa fa-star fa-stack-2x"></i>
								<i class="fa fa-star-o fa-stack-2x"></i>
							</span>
							<?php } ?>
							<?php } ?>
						</div>
						<?php } ?>
						<?php if ($product['price']) { ?>
						<div class="price">
							<?php if (!$product['special']) { ?>
							<?php echo $product['price']; ?>
							<?php } else { ?>
							<span class="price-new">
								<?php echo $product['special']; ?>
							</span>
							<span class="price-old">
								<?php echo $product['price']; ?>
							</span>
							<?php } ?>
							<?php if ($product['tax']) { ?>
							<span class="price-tax">
								<?php echo $text_tax; ?> <?php echo $product['tax']; ?>
							</span>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
					<div class="cart-button">
						<button class="btn btn-add" type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');">
							
							<span class="hidden-xs hidden-sm hidden-md">
								<?php echo $button_cart; ?>
							</span>
						<i class="fa fa-shopping-cart  hidden-lg"></i> 
						</button>
					</div>
						<div class="clear"></div>
				</div>
			</li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>