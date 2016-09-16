<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>

                    <a onclick="bulkSynchronize();" class="btn btn-default" data-toggle="tooltip" title="<?php echo $lang_bulk_btn; ?>"><i class="fa fa-link"></i></a>&nbsp;<a onclick="bulkDeSynchronize();" class="btn btn-default" data-toggle="tooltip" title="<?php echo $lang_bulk_desyn_btn; ?>"><i class="fa fa-unlink"></i></a>&nbsp;<a onclick="bulkMLSetting()" data-toggle="modal" data-target="#mlModal" class="btn btn-default" title="<?php echo $lang_bulk_ml_product; ?>"><i class="fa fa-wrench"></i></a>
                
        <button type="submit" form="form-product" formaction="<?php echo $copy; ?>" data-toggle="tooltip" title="<?php echo $button_copy; ?>" class="btn btn-default"><i class="fa fa-copy"></i></button>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                <input type="text" name="filter_name" value="<?php echo $filter_name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-model"><?php echo $entry_model; ?></label>
                <input type="text" name="filter_model" value="<?php echo $filter_model; ?>" placeholder="<?php echo $entry_model; ?>" id="input-model" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-price"><?php echo $entry_price; ?></label>
                <input type="text" name="filter_price" value="<?php echo $filter_price; ?>" placeholder="<?php echo $entry_price; ?>" id="input-price" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-quantity"><?php echo $entry_quantity; ?></label>
                <input type="text" name="filter_quantity" value="<?php echo $filter_quantity; ?>" placeholder="<?php echo $entry_quantity; ?>" id="input-quantity" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-status"><?php echo $entry_status; ?></label>
                <select name="filter_status" id="input-status" class="form-control">
                  <option value="*"></option>
                  <?php if ($filter_status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <?php } ?>
                  <?php if (!$filter_status && !is_null($filter_status)) { ?>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
              </div>
 <div class="form-group">
                   <label class="control-label" for="input-mlstatus"><?php echo $lang_markets; ?></label>
				    <select id="input-mlstatus" class="form-control" name="filter_ml">
					  <option value="*"></option>
					  <?php if ($filter_ml) { ?>
					  <option value="1" selected="selected"><?php echo $mercadolivre_product_yes; ?></option>
					  <?php } else { ?>
					  <option value="1"><?php echo $mercadolivre_product_yes; ?></option>
					  <?php } ?>
					  <?php if (!is_null($filter_ml) && !$filter_ml) { ?>
					  <option value="0" selected="selected"><?php echo $mercadolivre_product_no; ?></option>
					  <?php } else { ?>
					  <option value="0"><?php echo $mercadolivre_product_no; ?></option>
					  <?php } ?>
                  </select>
				  </div> 
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
          </div>
        </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-product">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-center"><?php echo $column_image; ?></td>
                  <td class="text-left"><?php if ($sort == 'pd.name') { ?>
                    <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'p.model') { ?>
                    <a href="<?php echo $sort_model; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_model; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_model; ?>"><?php echo $column_model; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'p.price') { ?>
                    <a href="<?php echo $sort_price; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_price; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_price; ?>"><?php echo $column_price; ?></a>
                    <?php } ?></td>
                  <td class="text-right"><?php if ($sort == 'p.quantity') { ?>
                    <a href="<?php echo $sort_quantity; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_quantity; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_quantity; ?>"><?php echo $column_quantity; ?></a>
                    <?php } ?></td>
                  <td class="text-left"><?php if ($sort == 'p.status') { ?>
                    <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                    <?php } ?></td>

                    <td class="text-center"><?php echo $text_ml_category; ?></td>
                    <td class="text-center"><?php echo $lang_markets; ?></td>
                
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($product['product_id'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $product['product_id']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $product['product_id']; ?>" />
                    <?php } ?></td>
                  <td class="text-center"><?php if ($product['image']) { ?>
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-thumbnail" />
                    <?php } else { ?>
                    <span class="img-thumbnail list"><i class="fa fa-camera fa-2x"></i></span>
                    <?php } ?></td>
                  <td class="text-left"><?php echo $product['name']; ?></td>
                  <td class="text-left"><?php echo $product['model']; ?></td>
                  <td class="text-left"><?php if ($product['special']) { ?>
                    <span style="text-decoration: line-through;"><?php echo $product['price']; ?></span><br/>
                    <div class="text-danger"><?php echo $product['special']; ?></div>
                    <?php } else { ?>
                    <?php echo $product['price']; ?>
                    <?php } ?></td>
                  <td class="text-right"><?php if ($product['quantity'] <= 0) { ?>
                    <span class="label label-warning"><?php echo $product['quantity']; ?></span>
                    <?php } elseif ($product['quantity'] <= 5) { ?>
                    <span class="label label-danger"><?php echo $product['quantity']; ?></span>
                    <?php } else { ?>
                    <span class="label label-success"><?php echo $product['quantity']; ?></span>
                    <?php } ?></td>
                  <td class="text-left"><?php echo $product['status']; ?></td>

                    <td class="text-center"><?php 
                       if($product['ml_category'] !=='N/A') {
                          echo $product['ml_category'];
                       }
                       else {
                       ?>
                       <a href="javascript:void(0);" onclick="predictCategory('<?php echo $product['product_id']; ?>','<?php echo $product['name']; ?>')" class="ml-cat-info<?php echo $product['product_id']; ?>"><?php echo $product['ml_category'];?></a>
                      <?php   
                       }
                      ?></td>
                    <td class="text-left">
                        <a href="<?php echo $product['syn_url']; ?>"><img align="top" src="view/image/mercadolivre/syn-icon.png" />&nbsp;<?php echo $lang_syn; ?></a><br /> <?php echo $product['listing_status'];?> <?php if(!empty($product['listing_item_status'])) echo '<br />'.$product['listing_item_status'];?> <?php if(!empty($product['unbind_url'])) echo '<br /><a href="'.$product['unbind_url'].'">'.$lang_desyn.'</a>'; ?>
                    </td> 
                
                  <td class="text-right"><a href="<?php echo $product['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                   <td class="text-center" colspan="10"><?php echo $text_no_results; ?></td> 
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	var url = 'index.php?route=catalog/product&token=<?php echo $token; ?>';

	var filter_name = $('input[name=\'filter_name\']').val();

	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}

	var filter_model = $('input[name=\'filter_model\']').val();

	if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	}

	var filter_price = $('input[name=\'filter_price\']').val();

	if (filter_price) {
		url += '&filter_price=' + encodeURIComponent(filter_price);
	}

	var filter_quantity = $('input[name=\'filter_quantity\']').val();

	if (filter_quantity) {
		url += '&filter_quantity=' + encodeURIComponent(filter_quantity);
	}

 
				    var filter_ml = $('select[name=\'filter_ml\']').val();
	
						if (filter_ml != '*') {
							url += '&filter_ml=' + encodeURIComponent(filter_ml);
						}
				 
	var filter_status = $('select[name=\'filter_status\']').val();

	if (filter_status != '*') {
		url += '&filter_status=' + encodeURIComponent(filter_status);
	}

	location = url;
});
//--></script> 
  <script type="text/javascript"><!--
$('input[name=\'filter_name\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['product_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_name\']').val(item['label']);
	}
});

$('input[name=\'filter_model\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_model=' +  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['model'],
						value: item['product_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'filter_model\']').val(item['label']);
	}
});
//--></script></div>

					<script type="text/javascript">
						
	             $('#mlModalBtn').modal({show:false});
							function bulkSynchronize(){
								$('#form-product').attr('action', 'index.php?route=module/mercadolivre/bulkSynchronize&token=<?php echo $token; ?>');  			
								$('#form-product').submit();
							}
							
							function bulkDeSynchronize(){
								$('#form-product').attr('action', 'index.php?route=module/mercadolivre/bulkDesynchronize&token=<?php echo $token; ?>');  			
								$('#form-product').submit();
							}
							
							function bulkMLSetting(){
							    $('#modal-ml').remove();
								var selected_products=$('input[name="selected[]"]:checked').map(function() {return this.value;}).get().join(',');			
				                $.ajax({
									url: "index.php?route=module/mercadolivre/bulk_setting&token=<?php echo $token; ?>&pids="+selected_products,
								 }).done(function(data) {
									  
									html  = '<div id="modal-ml" class="modal">';
				                	html += '  <div style="width:800px;" class="modal-dialog">';
				                	html += '    <div class="modal-content">';
				               	 	html += '      <div class="modal-body">';
				               	 	html += data;
				                	html += '      </div>';
				                	html += '    </div>';
				                	html += '   </div>';
				                	html += '   </div>';
				                	
				                	$('body').append(html);
                                    $('#modal-ml').modal('show');
									  	
								 });	
							}
							
							var bulk_tpl = '<div id="ml_bulk_block" style="position:fixed;background-color:rgba(0,0,0,0.8);height:100%;left:0;bottom:0;text-align:center;vertical-align:middle;display:table;width:100%;z-index:999999;">'
   												+'<div style="display:table-cell;text-align:center;vertical-align:middle;">'
         											+'<div style="height:175px;width:500px;display:inline-block;background-color: #fff;">'
         											+'<p style="margin: 20px 10px;font-size: 18px;"><?php echo $lang_bulk_processing?></p>'
         											+'<p style="font-weight: bold;color: #FF5722;font-size: 22px;text-align: center;" id="ml_bulk_pecentage">0% Done</p>'
         											+'</div>'
         									    +'</div>'
         									+'</div>';    
         									     		
							var total_sync_req = parseInt(<?php echo $ml_sync_queue;?>); 
							
							function sendBulkSync() {
							    
				          $.ajax({
									url: "index.php?route=module/mercadolivre/dispatchBulk&token=<?php echo $token; ?>",
									dataType: 'json',
								 }).done(function(data) {
									 var now_total = parseInt(data['total']); 
									 
									 if(now_total == 0) {
									    $('#ml_bulk_pecentage').html('100% Done');
									    location.reload();
									 }
									 else {
									   var total_done = total_sync_req -  now_total;
									   var remaining = parseInt(( total_done * 100 ) / total_sync_req);
									   $('#ml_bulk_pecentage').html(remaining+'% Done');
									   setTimeout(sendBulkSync,1000);
									 }
									 	
								 });	
							}

              function predictCategory(product_id,title) {

                 var predict_tpl = '<div  id="ml_predict_block" style="position:fixed;background-color:rgba(0,0,0,0.8);height:100%;left:0;bottom:0;text-align:center;vertical-align:middle;display:table;width:100%;z-index:999999;">'
                                  +'<div style="display:table-cell;text-align:center;vertical-align:middle;">'
                                  +'<div id="ml_category_list" style="height:250px;width:450px;display:inline-block;background-color: #fff;position: relative;">'
                                  +'<a href="javascript:void(0);" style="position: absolute;right: 9px;top: 6px;font-size: 25px;display: inline-block;" class="predict_close">x</a>'
                                  +'<b class="predict_loader" style=" font-size: 13px;display: inline-block;background: rgba(255, 152, 0, 0.44);padding: 5px 8px;border-radius:6px 6px;color: #795548;position: absolute;top: 50%;left: 50%;margin-top: -10px;margin-left: -25px;">Loading ...</b>'
                                   +'</div>'
                                   +'</div>'
                                +'</div>'; 

                  $('body').append(predict_tpl);


                  $.ajax({
                  url: "index.php?route=module/mercadolivre/predictCat&token=<?php echo $token; ?>&title="+title,
                  dataType: 'json',
                 }).done(function(json) {

                         $('.predict_loader').hide();
                         
                         var content ='<div class="category-content" style="height: 215px;width: 90%;">';
                          
                        if(json['data'] != 'false' && json['data'] !=false) {
                           content += '<span style="display: block;height: 20px;font-size: 13px;text-align: left;margin-left: 23px;margin-top: 25px;"><b><?php echo $text_ml_category_id;?>:</b>  '+json['data']['id']+'</span>';  
                           content += '<span style="display: block;height: 20px;font-size: 13px;text-align: left;margin-left: 23px;margin-top: 25px;"><b><?php echo $text_ml_category;?>:</b> '+json['data']['name']+'</span>';  
                           content += '<span style="display: block;height: 85px;font-size: 13px;text-align: left;margin-left: 23px;margin-top: 25px;"><b><?php echo $text_ml_category_path;?>:</b> '+json['data']['mercaTree']+'</span>';
                           
                           content += '<div class="pull-right">';
                           content += '<button style="margin-right:3px;" type="button" onclick="saveMLCat('+product_id+','+json['data']['id']+',\''+json['data']['mercaTree']+'\',\''+json['data']['name']+'\');" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;<?php echo $button_save; ?></button>';
                           content += '</div>';
                      
                          
                        }
                        else {
                          content +='<p style="margin-top: 100px;font-size: 15px;"><?php echo $text_ml_category_no_match;?></p>';
                        }

                        content += '</div>';

                        $('#ml_category_list').append(content);

                  });

                 $('.predict_close').click(function(e){

                     $('#ml_predict_block').remove();    
                 });
              }

              function saveMLCat(product_id, catId, mercaTree, name) {

                     var catId = (typeof catId != 'undefined') ? catId : '';
                     var mercaTree = (typeof mercaTree != 'undefined') ? mercaTree : '';
                     
                     $.ajax({
                      url: "index.php?route=module/mercadolivre/saveMLCategory&token=<?php echo $token; ?>&catId="+catId+'&mercaTree='+mercaTree+'&product_id='+product_id,
                      dataType: 'json',
                     }).done(function(json) { 

                          if(json['success']) {

                              $('.ml-cat-info'+product_id).html(name);
                          }
                          else {
                             alert('<?php echo $text_ml_category_failed;?>');
                          }
                          
                          $('#ml_predict_block').remove();
                          
                     }); 
                 }
							
							<?php
							  if($ml_sync_queue) {
							?> 
							   $('body').append(bulk_tpl);
							   sendBulkSync();
							<?php } ?>
					</script>
						
<?php echo $footer; ?>