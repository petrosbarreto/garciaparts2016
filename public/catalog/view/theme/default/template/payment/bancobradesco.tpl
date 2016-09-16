<div class="buttons">
  <div class="pull-right">
    <input type="button need_move" onclick="gera_boleto_bancobradesco()" value="Confirmar e Gerar Boleto" id="button-confirm" class="btn btn-primary" />
  </div>
</div>


<script type="text/javascript">
<!--
function gera_boleto_bancobradesco(){
window.open('<?php echo $url_boleto;?>');
$.ajax({ 
	type: 'get',
	url: 'index.php?route=payment/bancobradesco/confirm',
	cache: false,
	beforeSend: function() {
		$('#button-confirm').button('loading');
	},
	complete: function() {
		$('#button-confirm').button('reset');
	},		
	success: function() {
		location = '<?php echo $continue; ?>';
	}		
});
}
//-->
</script>
