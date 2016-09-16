<footer>
  <div class="container">

  <div style="margin-bottom: 30px;" class="fb-like" data-href="https://www.facebook.com/garciaparts" data-width="650px" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

	<div class="row">
		<div class="col-sm-3">
			<?php if ($informations) { ?>
			<div class="footer_box">
				<h5><?php echo $text_information; ?></h5>
				<ul class="list-unstyled">
				<?php foreach ($informations as $information) { ?>
				<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
				<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
		<div class="col-sm-3">
			<div class="footer_box">
				<h5><?php echo $text_service; ?></h5>
				<ul class="list-unstyled">
				<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
				<li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
				<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="footer_box">
				<h5><?php echo $text_extra; ?></h5>
				<ul class="list-unstyled">
				<li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
				<li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
				<li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
				<li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="footer_box">
				<h5><?php echo $text_account; ?></h5>
				<ul class="list-unstyled">
				<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
				<li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
				<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
				<li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
				</ul>
			</div>
		</div>
	</div>

  </div>
	<div class="copyright">
    	<div class="container" style="width: 55%; padding-left: 50px; float: left; color: #666; margin-top: -10px;">
					<div>Garcia Parts e Acessórios Automotivos LTDA - ME © 2016</div>
          <div>CNPJ: 04.994.578/0001-61 - Rua Oratório, 381 - Santo André - SP</div>
				</div>

				<div style="width: 40%; float: left; text-align: right;">

          <a href="http://mercadolivre.com.br" target="_blank">
						<img src="/image/mercadopago2.png" alt="Mercado Pago" height="26" style="border: 0px; margin-right: 20px; height: 26px;">
					</a>

					<a href="http://pagseguro.uol.com.br" target="_blank">
						<img src="/image/pagseguro.png" alt="PagSeguro" height="26" style="border: 0px; margin-right: 20px; height: 26px;">
					</a>

					<a href="http://www.correios.com.br/" target="_blank">
						<img src="/image/correios.png" alt="Correios"  height="26" style="border: 0px; height: 26px;">
					</a>

					</div>
	</div>

</footer>



<script src="catalog/view/theme/theme504/js/livesearch.js" type="text/javascript"></script>





</div>

<script src="https://lojavirtual.digital/lojavirtualfooter.js" type="text/javascript"></script>

</body></html>
