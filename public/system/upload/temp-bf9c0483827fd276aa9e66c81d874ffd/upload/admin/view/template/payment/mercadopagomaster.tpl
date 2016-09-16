<?php echo $header; ?>
<?php echo $column_left; 
/*Desenvolvido por 
Denis Cunha

Swat PC
https://www.swatpc.com.br

*/ 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-mercadopagomaster" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">    
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-mercadopagomaster" class="form-horizontal">
      
      
      <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-client-id"> <?php echo $entry_acc_id; ?></label>
            <div class="col-sm-10">
          <input type="text" name="mercadopagomaster_acc_id" value="<?php echo $mercadopagomaster_acc_id; ?>" class="form-control" />
            <?php if ($error_acc_id) { ?>
           <div class="text-danger"><?php echo $error_acc_id; ?></div>
            <?php } ?>
        </div>
        </div>
        
         <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-client-id"> <?php echo $entry_token; ?></label>
            <div class="col-sm-10">
          <input type="text" name="mercadopagomaster_token" value="<?php echo $mercadopagomaster_token; ?>" class="form-control" />
            <?php if ($error_token) { ?>
           <div class="text-danger"><?php echo $error_token; ?></div>
            <?php } ?>
        </div>
        </div>
    
    
      <div class="form-group">
      <label class="col-sm-2 control-label" for="input-order-status-id"> <?php echo $entry_order_status; ?></label>
            <div class="col-sm-10">
       <select name="mercadopagomaster_order_status_id"  class="form-control">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $mercadopagomaster_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
        </div>
        </div>
          
           <div class="form-group">
      <label class="col-sm-2 control-label" for="input-country"> <?php echo $entry_country; ?></label>
            <div class="col-sm-10">
          <select name="mercadopagomaster_country" id="country" class="form-control">
               <?php foreach ($countries as $country) { ?>
              <?php if ($country['href'] == $mercadopagomaster_country) { ?>
              <option value="<?php echo $country['href']; ?>" selected="selected" id="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $country['href']; ?>" id="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
            
            </div>
            </div>

<div class="form-group">
            <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
            <div class="col-sm-10">
              <select name="mercadopagomaster_geo_zone_id" id="input-geo-zone" class="form-control">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $mercadopagomaster_geo_zone_id) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>          
         
         
         <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
            <select name="mercadopagomaster_status" id="input-status" class="form-control">
               <?php if ($mercadopagomaster_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>          
         
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status-ipn"><?php echo $entry_ipn_status; ?></label>
            <div class="col-sm-10">
             <select name="mercadopagomaster_ipn_status" id="input-status-ipn" class="form-control">
              <?php if ($mercadopagomaster_ipn_status) { ?>
                      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                      <option value="0"><?php echo $text_disabled; ?></option>
                      <?php } else { ?>
                      <option value="1"><?php echo $text_enabled; ?></option>
                      <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                      <?php } ?>
              </select>
            </div>
          </div>          
        
                  <div class="form-group">
      <label class="col-sm-2 control-label" for="input-client-id"> <?php echo $entry_sonda_key; ?></label>
            <div class="col-sm-10">
          <input type="text" name="mercadopagomaster_sonda_key" value="<?php echo $mercadopagomaster_sonda_key; ?>" class="form-control" />
          
        </div>
        </div>
                  <div class="form-group">
      <label class="col-sm-2 control-label" for="input-completed"> <?php echo $entry_order_status_completed; ?></label>
            <div class="col-sm-10">
      <select name="mercadopagomaster_order_status_id_completed"  class="form-control">
              <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopagomaster_order_status_id_completed) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
            </select>
            
            </div>
            </div>
                  
                <div class="form-group">
      <label class="col-sm-2 control-label" for="input-pendent"> <?php echo $entry_order_status_pending; ?></label>
            <div class="col-sm-10">
      <select name="mercadopagomaster_order_status_id_pending"  class="form-control">
               <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopagomaster_order_status_id_pending) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
            </select>
            
            </div>
            </div>
             
             
              <div class="form-group">
      <label class="col-sm-2 control-label" for="input-canceled"><?php echo $entry_order_status_canceled; ?></label>
            <div class="col-sm-10">
      <select name="mercadopagomaster_order_status_id_canceled" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopagomaster_order_status_id_canceled) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
            </select>
            
            </div>
            </div>
             
 <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="mercadopagomaster_sort_order" value="<?php echo $mercadopagomaster_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>	  
          
    </form>
   </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--
$(document).ready(function(){
	$('#country').change(function() {
	if ($('#country option:selected').attr('id') == '1' || $('#country option:selected').attr('id') == '2')
		{ 
			$('#ipn').show();
			$('#ipn input').attr('disabled', 'disabled');$('#ipn select').attr('disabled', 'disabled');
		}
		else { 
			$('#ipn').hide(); 
		}
	});
	$('#country').change();
});
--></script>
