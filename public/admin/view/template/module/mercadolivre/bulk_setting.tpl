<div id="content">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="$('#form_ml').submit();" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <button type="button" onclick="$('#autopost').val(1);$('#form_ml').submit();" data-toggle="tooltip" title="<?php echo $button_post; ?>" class="btn btn-danger"><i class="fa fa-link"></i></button>
        <a data-dismiss="modal" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-close"></i></a></div>
     </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-body">
       <!-- content starts -->  
    
       <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_ml">
                 <div class="form-group product">
                    <label class="col-sm-3 control-label" for="input-products"><?php echo $lang_ml_select_product; ?></label>
                    <div class="col-sm-9">
                      <input type="text" name="product" value="" id="input-products" class="form-control" />
			          <div class="well well-sm product-product" style="height: 150px; overflow: auto;">
			           <?php
			           foreach ($products as $product_ml) {
						   echo '<div><i class="fa fa-minus-circle"></i> '.$product_ml['name'].'<input type="hidden" name="product_ml[]" value="'.$product_ml['product_id'].'" /></div>';
						}
			           ?>
				     </div>
			        </div>
                  </div>
                  <div class="form-group">
							 <label class="col-sm-3 control-label"><span data-toggle="tooltip" title="<?php echo $ml_text_category_hint; ?>"><?php echo $entry_mercadolivre_category; ?></span></label>
							   <div class="col-sm-9">
								<input type="hidden" name="mercaTree" value="<?php echo $mercaTree?>" id="mercaTree" />
							    <input type="hidden" name="mercaId" value="<?php echo $mercaId?>" id="mercaId" />
							   <span id="category_tree_span" class="category_ok">
							     <?php echo html_entity_decode($mercaTree)?>
							   </span>
								<select name="mercadolivre_cat_selection[]" class="form-control mercadolivre_cat_selection">
								   <option value=""><?php echo $ml_text_select;?></option>
									<?php echo $mercadolivre_cats?>
								</select>
							  </div>
					  </div>
					  <div class="form-group" id="ml_attr_row_wrapper" style="display:none"> 
					     <div class="col-sm-12">
					     </div>
					  </div> 
					  <div class="form-group">
							<label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_currency; ?></label>
							<div class="col-sm-9">
								<select class="form-control" name="mercaCurrency" id="mercaCurrency">
								<option value=""><?php echo $ml_text_select;?></option>
									<?php foreach ($mercadolivre_currency as $mercadolivre_cur) { $chk=''; if($mercaCurrency==$mercadolivre_cur['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_cur['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_cur['name']?></option>
									<?php } ?>
								</select>
							  </div>
						</div>
						<div class="form-group">
							 <label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_buying_mode; ?></label>
							   <div class="col-sm-9">
								<select class="form-control" name="mercaBuyMode" id="mercaBuyMode">
								  <option value=""><?php echo $ml_text_select;?></option>
									<?php foreach ($mercadolivre_modes as $mercadolivre_mode) { $chk=''; if($mercaBuyMode==$mercadolivre_mode['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_mode['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_mode['name']?></option>
									<?php } ?>
								</select>
							  </div>
						</div>
						<div class="form-group">
							 <label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_listing_type; ?></label>
							   <div class="col-sm-9">
								<select class="form-control" name="mercaListType" id="mercaListType">
								<option value=""><?php echo $ml_text_select;?></option>
									<?php foreach ($mercadolivre_types as $mercadolivre_type) { $chk=''; if($mercaListType==$mercadolivre_type['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_type['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_type['name']?></option>
									<?php } ?>
								</select>
							  </div>
						</div>
					    <div class="form-group">
							 <label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_condition; ?></label>
							   <div class="col-sm-9">
								<select class="form-control" name="mercaCondition" id="mercaCondition">
								<option value=""><?php echo $ml_text_select;?></option>
									<?php foreach ($mercadolivre_conditions as $mercadolivre_condition) { $chk=''; if($mercaCondition==$mercadolivre_condition['value']) $chk='selected'; ?>
									  <option value="<?php echo $mercadolivre_condition['value']?>" <?php echo $chk; ?> ><?php echo $mercadolivre_condition['name']?></option>
									<?php } ?>
								</select>
							  </div>
						</div>
						<div class="form-group">
							 <label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_warranty; ?></label>
							  <div class="col-sm-9">
								 <input class="form-control" type="text" name="mercaWarranty" value="<?php echo $mercaWarranty; ?>" size="30" />
							  </div>
						</div>
						<div class="form-group">
							 <label class="col-sm-3 control-label"><?php echo $entry_mercadolivre_video; ?></label>
							  <div class="col-sm-9">
								 <input class="form-control" type="text" name="mercaVideoId" value="<?php echo $mercaVideoId; ?>" size="30" />
							  </div>
					   </div>
					    <div class="form-group">
							 <label for="reposting" class="col-sm-3 control-label"><?php echo $entry_mercadolivre_price_adjustment; ?></label>
							  <div class="col-sm-9">
								  <input type="text" class="form-control" name="mercaAdjust" value="<?php echo $mercaAdjust; ?>" size="30" />
							  </div>
					   </div>
					   <div class="form-group">
							
							  <div class="col-sm-12">
								  <label ><?php echo $ml_text_reposting; ?>&nbsp;<input type="checkbox" <?php if($mercaReposting==1) echo 'checked';?>  name="mercaReposting" value="1" /></label>
							  </div>
					   </div>
					  <input type="hidden" name="autopost" id="autopost" value="0" /> 	   
		   </form>			   		   
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
#ml_attribute {
      width: 90% !important;
      margin: 0 auto;
 }
 </style>
 
	<script type="text/javascript"><!--
     var ml_attr_row='';
     $(document.body).on('change','.mercadolivre_cat_selection',function(){
    
        var $this=$(this);
        if($this.val()=='') return false;
        
        $('#mercaId').val($this.val());
        
        $.ajax({
                url: 'index.php?route=module/mercadolivre/category&token=<?php echo $token; ?>',
                dataType: 'json',
                data:{catId:$this.val(),listingType:$('#mercaListType').val()},
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
                  
                  if(result.listing_type!=''){
                    $('#mercaListType').html(result.listing_type);
                  }
                  
                  if(result.allowed=='1'){
                    $('#category_tree_span').removeClass('category_nok');
                    $('#category_tree_span').addClass('category_ok');
                  }else{
                    $('#category_tree_span').removeClass('category_ok');
                    $('#category_tree_span').addClass('category_nok');
                  }
                  
                  
                  
                  if(result.attribute_types=='1'){
                    getCatAttr($this.val());
                  }else{
                     $('#ml_attr_row_wrapper div').html('');
                     $('#ml_attr_row_wrapper').hide(); 
                   
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
       
       $('#mercaTree').val(tree); 
       $('#category_tree_span').html(tree); 
    }
						
			function getCatAttr(catId)
				{
					 var product_id = '<?php echo isset($product_id)?$product_id:0; ?>';
					 $.ajax({
					 url: 'index.php?route=module/mercadolivre/attribute&token=<?php echo $token; ?>',
					 dataType: 'json',
					 data:{catId:catId,product_id:product_id},
					 beforeSend:function()
						{
							$('body').css('cursor','wait');
						},
					success: function(result) {
						$('body').css('cursor','default');
						ml_attr_row=result.row;
						$('#ml_attr_row_wrapper div').html(result.html);
						if(result.html==''){ 
						  $('#ml_attr_row_wrapper').hide(); 
						}
						else {
						 $('#ml_attr_row_wrapper').show(); 
					   }
				}
			  });
			}
			
			if($('#mercaId').length>0){
			  if($('#mercaId').val()!='') getCatAttr($('#mercaId').val());
			}
			
			function addMLAttribute(){
			   var no_of_ml_attr=$('tr.ml_attr_row').length;
			   no_of_ml_attr=parseInt(no_of_ml_attr)+1;
			   
			   while($('#ml_attr_row'+no_of_ml_attr).length!=0)
				{
				  no_of_ml_attr++; 
				}
				ml_attr_row_html=ml_attr_row;
				ml_attr_row_html=ml_attr_row_html.replace(/__AINDEX__/g, no_of_ml_attr);
				$('#ml_attribute tbody').append(ml_attr_row_html);
			}
			
			function removeMLAttribute(id){
			  $('#ml_attr_row'+id).remove();
			}
			
	
	function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(text) {
						$('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};		
	
    
    var auto_complete_prod={
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
		 
		$('#input-products').val('');
		$('.product-product').append('<div><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_ml[]" value="' + item['value'] + '" /></div>');	
	  }	
  };
  
  $('#input-products').autocomplete(auto_complete_prod);  
    
  $('.product-product').delegate('.fa-minus-circle', 'click', function() {
	  $(this).parent().remove();
  });	
						
//--></script>