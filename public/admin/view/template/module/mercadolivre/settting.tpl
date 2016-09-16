<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-carousel" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
       <!-- content starts -->  
           <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
               <ul class="nav nav-tabs">
                 <li class="active"><a href="#tab-setting" data-toggle="tab"><?php echo $tab_setting; ?></a></li>
                 <li><a href="#tab-listing" data-toggle="tab"><?php echo $tab_listing; ?></a></li>
                 <li><a href="#tab-order" data-toggle="tab"><?php echo $tab_order; ?></a></li>
                 <li><a href="#tab-feedback" data-toggle="tab"><?php echo $tab_feedback; ?></a></li>
                 <li><a href="#tab-shipping" data-toggle="tab"><?php echo $tab_shipping; ?></a></li>
                 <li><a href="#tab-template" data-toggle="tab"><?php echo $tab_template; ?></a></li>
              </ul>
             <div class="tab-content">
                 <div class="tab-pane active" id="tab-setting">
                       <div class="form-group required">
                         <label class="col-sm-2 control-label" for="input-app-id"><?php echo $text_app_id; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="mercadolivre_app_id" value="<?php echo $mercadolivre_app_id; ?>" placeholder="<?php echo $text_app_id; ?>" id="input-app-id" class="form-control" />
                          <?php if ($error_app_id) { ?>
                           <div class="text-danger"><?php echo $error_app_id; ?></div>
                          <?php } ?>
                        </div>
                       </div>
                       <div class="form-group required">
                         <label class="col-sm-2 control-label" for="input-secret"><?php echo $text_app_secret; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="mercadolivre_app_secret" value="<?php echo $mercadolivre_app_secret; ?>" placeholder="<?php echo $text_app_secret; ?>" id="input-secret" class="form-control" />
                          <?php if ($error_app_secret) { ?>
                           <div class="text-danger"><?php echo $error_app_secret; ?></div>
                          <?php } ?>
                        </div>
                       </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label" for="debug-status"><?php echo $debug_status; ?></label>
                            <div class="col-sm-10">
                              <select name="mercadolivre_debug" id="debug-status" class="form-control">
                                <?php if ($mercadolivre_debug) { ?>
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
                           <label class="col-sm-2 control-label" for="module-status"><?php echo $text_status; ?></label>
                            <div class="col-sm-10">
                              <select name="mercadolivre_status" id="module-status" class="form-control">
                                <?php if ($mercadolivre_status) { ?>
                                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                  <option value="0"><?php echo $text_disabled; ?></option>
                                  <?php } else { ?>
                                  <option value="1"><?php echo $text_enabled; ?></option>
                                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                              </select>
                             </div>
                        </div> 
                        <div class="form-group required">
                         <label class="col-sm-2 control-label" for="input-order-id"><?php echo $lang_purchase_no; ?></label>
                        <div class="col-sm-10">
                          <input type="text" name="mercadolivre_order_no" value="<?php echo $mercadolivre_order_no; ?>" id="input-order-id" class="form-control" />
                        </div>
                       </div>
                        
                 </div>
                 <div class="tab-pane" id="tab-listing">
                       <p><?php echo $listing_default;?><p/>
                  <div class="form-group">
               <label class="col-sm-2 control-label"><?php echo $text_auto_category ?></label>
               <div class="col-sm-10">
                 <input class="form-control" type="checkbox" <?php if($mercadolivre_detect_cat) echo 'checked';?> name="mercadolivre_detect_cat" value="1" />
                </div>
              </div>      
						 <div class="form-group">
							 <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $ml_text_category_hint; ?>"><?php echo $entry_mercadolivre_category; ?></span>
                <br /> <b style="font-weight:normal;font-size:12px;">(<?php echo $text_default_category_hint; ?>)</b>
               </label>
							  <div class="col-sm-10">
							   <input type="hidden" name="mercadolivre_category_tree" value="<?php echo $mercadolivre_category_tree?>" id="mercadolivre_category_tree" />
							   <input type="hidden" name="mercadolivre_mercaId" value="<?php echo $mercadolivre_mercaId?>" id="mercadolivre_mercaId" />
							   <span id="category_tree_span" class="category_ok">
							     <?php echo html_entity_decode($mercadolivre_category_tree)?>
							   </span>
								<select class="form-control mercadolivre_cat_selection" name="mercadolivre_cat_selection[]">
								   <option value="">-Select-</option>
									<?php echo $mercadolivre_cats?>
								</select>
							  </div>
						  </div>
						 <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_currency; ?></label>
							   <div class="col-sm-10">
								<select class="form-control" name="mercadolivre_mercaCurrency" id="mercadolivre_mercaCurrency">
									<?php foreach ($mercadolivre_currency as $mercadolivre_cur) { $chk=''; if($mercadolivre_mercaCurrency==$mercadolivre_cur['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_cur['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_cur['name']?></option>
									<?php } ?>
								</select>
							  </div>
						  </div>
						 <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_buying_mode; ?></label>
							 <div class="col-sm-10">
								<select class="form-control" name="mercadolivre_mercaBuyMode" id="mercadolivre_mercaBuyMode">
									<?php foreach ($mercadolivre_modes as $mercadolivre_mode) { $chk=''; if($mercadolivre_mercaBuyMode==$mercadolivre_mode['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_mode['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_mode['name']?></option>
									<?php } ?>
								</select>
							  </div>
						  </div>
						  <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_listing_type; ?></label>
							 <div class="col-sm-10">
								<select class="form-control" name="mercadolivre_mercaListType" id="mercadolivre_mercaListType">
									<?php foreach ($mercadolivre_types as $mercadolivre_type) { $chk=''; if($mercadolivre_mercaListType==$mercadolivre_type['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_type['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_type['name']?></option>
									<?php } ?>
								</select>
							  </div>
						  </div>
						  <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_condition; ?></label>
							 <div class="col-sm-10">
								<select class="form-control" name="mercadolivre_mercaCondition" id="mercadolivre_mercaCondition">
									<?php foreach ($mercadolivre_conditions as $mercadolivre_cond) { $chk=''; if($mercadolivre_mercaCondition==$mercadolivre_cond['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_cond['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_cond['name']?></option>
									<?php } ?>
								</select>
							  </div>
						  </div>
						 <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_price_adjustment; ?></label>
							 <div class="col-sm-10">
								 <input type="text" class="form-control" name="mercadolivre_mercaPrice" value="<?php echo $mercadolivre_mercaPrice; ?>" size="15" />
							 </div>
						  </div>
						 <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_warranty ?></label>
							 <div class="col-sm-10">
								 <input type="text" class="form-control" name="mercadolivre_mercaWarranty" value="<?php echo $mercadolivre_mercaWarranty; ?>" size="30" />
							  </div>
						  </div>
						  <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $ml_text_reposting ?></label>
							 <div class="col-sm-10">
								 <input class="form-control" type="checkbox" <?php if($mercadolivre_reposting) echo 'checked';?> name="mercadolivre_reposting" value="1" />
							  </div>
						  </div>
                         <div class="form-group">
                           <label class="col-sm-2 control-label"><?php echo $text_add_images_in_desc; ?></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="mercadolivre_image_in_desc">
                                <?php if ($mercadolivre_image_in_desc) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                               <?php } else { ?>
                               <option value="1"><?php echo $text_yes; ?></option>
                               <option value="0" selected="selected"><?php echo $text_no; ?></option>
                              <?php } ?>
                          </select>
                         </div>
                      </div>
                 </div>
                 <div class="tab-pane" id="tab-order">
                   <p><?php echo $order_status_hints;?></p>
                   <div class="form-group">
                     <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                          <thead>
						    <tr>
							 <td><label class="control-label"><?php echo $text_ml_status; ?></label></td>
							  <td align="text-left">
								<?php echo $text_oc_status; ?>
							  </td>
						  </tr>
                         </thead>       
						  <?php foreach($merca_statuses as $status=>$oc_status){?>
						  <tr>
							 <td class="text-left"><?php echo array_key_exists($status,$ml_order_status)?$ml_order_status[$status]:$status; ?><input type="hidden" name="merca_status[]" value="<?php echo $status; ?>" /></td>
							  <td>
								<select class="form-control" name="oc_status[]">
									<?php foreach ($order_statuses as $order_status) { ?>
										<?php if ($order_status['order_status_id'] == $oc_status) { ?>
										<option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
										<?php } else { ?>
										<option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
										<?php } ?>
										<?php } ?>
								</select>
							  </td>
						  </tr>
						  <?php } ?>
						 </table> 
						</div> 
					  </div>	 
                      <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo $lang_new_user; ?></label>
                        <div class="col-sm-10"><select class="form-control" name="mercadolivre_new_customer">
                            <?php if ($mercadolivre_new_customer) { ?>
                            <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                            <option value="0"><?php echo $text_no; ?></option>
                            <?php } else { ?>
                            <option value="1"><?php echo $text_yes; ?></option>
                            <option value="0" selected="selected"><?php echo $text_no; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo $text_shipping_method; ?></label>
                        <div class="col-sm-10"><select class="form-control" name="mercadolivre_shipping">
                            <?php foreach($shipping_mods as $code=>$title){ 
                               $selected=($code==$mercadolivre_shipping)?'selected="selected"':'';
                            ?>
                              <option value="<?php echo $code;?>" <?php echo $selected;?> ><?php echo $title; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo $text_payment_method; ?></label>
                        <div class="col-sm-10"><select class="form-control" name="mercadolivre_payment">
                            <?php foreach($payment_mods as $code=>$title){ 
                               $selected=($code==$mercadolivre_payment)?'selected="selected"':'';
                            ?>
                              <option value="<?php echo $code;?>" <?php echo $selected;?> ><?php echo $title; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo $text_status_sync; ?></label>
                        <div class="col-sm-10"><select class="form-control" name="mercadolivre_sync_status">
                              <?php if ($mercadolivre_sync_status) { ?>
                            	<option value="1" selected="selected"><?php echo $text_yes; ?></option>
                            	<option value="0"><?php echo $text_no; ?></option>
                            <?php } else { ?>
                           		 <option value="1"><?php echo $text_yes; ?></option>
                            	 <option value="0" selected="selected"><?php echo $text_no; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                      </div>
                 </div>
             <div class="tab-pane" id="tab-feedback">
				  <div class="form-group">
                         <label class="col-sm-2 control-label"><?php echo $lang_auto_feedback?></label>
                         <div class="col-sm-10"> <select class="form-control" name="mercadolivre_feedback">
                            <?php if ($mercadolivre_feedback) { ?>
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
                        <label class="col-sm-2 control-label"><?php echo $lang_auto_feedback_status?></label>
                        <div class="col-sm-10">
                           
                          <select class="form-control" name="mercadolivre_feedback_order">
                          <?php foreach($merca_statuses as $status=>$oc_status){?>
                                 <?php if ($mercadolivre_feedback_order == $status) { ?>
										<option value="<?php echo $status; ?>" selected="selected"><?php echo array_key_exists($status,$ml_order_status)?$ml_order_status[$status]:$status; ?></option>
										<?php } else { ?>
										<option value="<?php echo $status; ?>"><?php echo array_key_exists($status,$ml_order_status)?$ml_order_status[$status]:$status; ?></option>
										<?php } ?>
                           <?php } ?>
                        </select>
                        </div>
                   </div>
                   <div class="form-group">
                         <label class="col-sm-2 control-label"><?php echo $lang_feedback_rating?></label>
                          <div class="col-sm-10">
                           
                          <select class="form-control" name="mercadolivre_feedback_rating">
                              <option value="positive" <?php if(isset($mercadolivre_feedback_rating) && $mercadolivre_feedback_rating=='positive') {?> selected="selected" <?php }?>>Positive</option>
                              <option value="negative" <?php if(isset($mercadolivre_feedback_rating) && $mercadolivre_feedback_rating=='negative') {?> selected="selected" <?php }?>>Negative</option>
                              <option value="neutral" <?php if(isset($mercadolivre_feedback_rating) && $mercadolivre_feedback_rating=='neutral') {?> selected="selected" <?php }?>>Neutral</option>
                        </select>
                        </div>
                   </div>
                  <div class="form-group">
                         <label class="col-sm-2 control-label"><?php echo $lang_feedback_message?></label>
                          <div class="col-sm-10">
                           <textarea class="form-control" id="mercadolivre_feedback_message" name="mercadolivre_feedback_message" cols="80" rows="8"><?php echo isset($mercadolivre_feedback_message) ? $mercadolivre_feedback_message : ''; ?></textarea>
                         </div>
                  </div>
		     </div>
		    <div class="tab-pane" id="tab-shipping">
			  <div class="form-group">	
				<div class="table-responsive">
                 <table class="table table-striped table-bordered table-hover">
				  <thead>
				    <tr>
				      <td class="left"><?php echo $lang_shipping_name?></td>
				      <td class="left"><?php echo $lang_shipping_cost?></td>
				    </tr>
				  </thead>
				  <tbody>
				    <?php
				     for($i=1;$i<=5;$i++){
		           ?>
				         <tr>
							 <td class="left"> <input class="form-control" type="text" name="mercadolivre_shipping_name<?php echo $i;?>" value="<?php echo ${'mercadolivre_shipping_name'.$i}; ?>" size="30" /></td>
				             <td class="left"> <input class="form-control" type="text" name="mercadolivre_shipping_cost<?php echo $i;?>" value="<?php echo ${'mercadolivre_shipping_cost'.$i}; ?>" size="30" /></td>
						  </tr>
					  <?php } ?>	  
					</tbody>	  
				    </table>
				    <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $lang_shipping_alter;?></label>
							 <div class="col-sm-10">
								<select class="form-control" name="mercadolivre_shipping_alter" id="mercadolivre_shipping_alter">
								      <option value=""><?php echo $lang_shipping_00;?></option>
									  <option value="me10" <?php if($mercadolivre_shipping_alter == 'me10') echo 'selected';?>><?php echo $lang_shipping_me10;?></option>
									  <option value="me11" <?php if($mercadolivre_shipping_alter == 'me11') echo 'selected';?>><?php echo $lang_shipping_me11;?></option>
									  <option value="me20" <?php if($mercadolivre_shipping_alter == 'me20') echo 'selected';?>><?php echo $lang_shipping_me20;?></option>
									  <option value="me21" <?php if($mercadolivre_shipping_alter == 'me21') echo 'selected';?>><?php echo $lang_shipping_me21;?></option>
								</select>
							  </div>
					</div>
				  </div>  
				 </div>  	  		  
			  </div>
		      <div class="tab-pane" id="tab-template">
				   <div class="form-group">
							 <label class="col-sm-2 control-label"><?php echo $entry_mercadolivre_template; ?></label>
							 <div class="col-sm-10">
								 <textarea class="form-control" id="mercadolivre_template" name="mercadolivre_template" cols="40" rows="5"><?php echo isset($mercadolivre_template) ? $mercadolivre_template : ''; ?></textarea>
							  </div>
					</div>
				</div>
            </div>    
          </form>  
       <!-- content start -->
      </div>
    </div>
  </div>
</div>

<style type="text/css">
#category_tree_span{
  
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}
.category_ok{color:green;}
.category_nok{color:red;}
.list-tbl td{padding-top:6px !important;padding-bottom:6px !important;}
.mercadolivre_cat_selection {
    width: auto;
    float: left;
    margin-right: 5px;
    margin-bottom: 5px;
}

</style>

<script type="text/javascript"><!--

$(document.body).on('change','.mercadolivre_cat_selection',function(){

    var $this=$(this);
	if($this.val()=='') return false;
	
	$('#mercadolivre_mercaId').val($this.val());
	
	$.ajax({
			url: 'index.php?route=module/mercadolivre/category&token=<?php echo $token; ?>',
			dataType: 'json',
			data:{catId:$this.val()},
			beforeSend:function()
			{
			  $('body').css('cursor','wait');
			},
			success: function(result) {
			  $('body').css('cursor','default');
			  $this.nextAll("select.mercadolivre_cat_selection").remove();
			  if(result.categories.length>0)
			  {
			    var html='<select name="mercadolivre_cat_selection[]" class="form-control mercadolivre_cat_selection"><option value="">-Select-</option>';
				for(i=0;i<result.categories.length;i++)
				{
				   html+='<option value="'+result.categories[i].id+'">'+result.categories[i].name+'</option>';   
				}
				html+='</select>';
				$this.after(html);
			  }
			  getCategoryTree();
			  
			  if(result.allowed=='1'){
				 $('#category_tree_span').removeClass('category_nok');
				 $('#category_tree_span').addClass('category_ok');
			 }else{
				 $('#category_tree_span').removeClass('category_ok');
				 $('#category_tree_span').addClass('category_nok');
				 }
			  
			}
		});
	
});

function getCategoryTree()
{
   var tree='';
   $('select.mercadolivre_cat_selection option:selected').each(function(){
      if($(this).val()!=''){
		  if(tree=='')tree+=$(this).text();
		  else tree+=' &raquo; '+$(this).text();
	  }
   });
   
   $('#mercadolivre_category_tree').val(tree); 
   $('#category_tree_span').html(tree); 
}

$('#mercadolivre_template').summernote({height: 300});

//--></script>
<?php echo $footer; ?>