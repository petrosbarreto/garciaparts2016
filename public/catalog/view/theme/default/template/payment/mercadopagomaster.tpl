<?php if (isset($error)) { ?>
	<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<form action="<?php echo str_replace('&', '&amp;', $action); ?>" name="MP-Checkout" method="post" id="checkout">
  <input type="hidden" name="acc_id" value="<?php echo $acc_id; ?>" />
  <input type="hidden" name="enc" value="<?php echo $enc; ?>" />
  <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
  <input type="hidden" name="price" value="<?php echo $price; ?>" />
  <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" />
  <input type="hidden" name="name" value="<?php echo $name; ?>" />
  <input type="hidden" name="seller_op_id" value="<?php echo $seller_op_id; ?>" />
  <input type="hidden" name="extra_part" value="<?php echo $extra_part; ?>" />
  <input type="hidden" name="url_succesfull" value="<?php echo $url_succesfull; ?>" />
  <input type="hidden" name="url_process" value="<?php echo $url_process; ?>" />
  <input type="hidden" name="url_cancel" value="<?php echo $url_cancel; ?>" />
   <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>


<div class="buttons">
  <div class="pull-right">
    <a onclick="$('#checkout').submit();" id="mercadopago_button"  name="MP-Checkout" class="btn btn-primary"><?php echo $button_confirm; ?></a>
        
  </div>
</div>
</form>
<script type="text/javascript"><!--
if ($('#checkout input[name="currency"]').val() == '') {
	$('a#mercadopago_button').hide();
}
//--></script>

 