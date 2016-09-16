<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="syncStart()" class="btn btn-info"><i class="fa fa-link"></i> <?php echo $button_sync; ?></button>
        <button type="button" id="button-close" onclick="closePopup()" title="<?php echo $button_close; ?>" class="btn btn-warning"><i class="fa fa-close"></i> <?php echo $button_close; ?></button>
        </div>
      <h1><?php echo $text_sync_ml_product; ?></h1>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-body">
      <div class="well">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                  <input type="text" style="display:inline-block;width:250px;" name="filter_keyword" value="<?php echo $filter_keyword; ?>" placeholder="<?php echo $text_search_keyword; ?>" class="form-control" /> <button type="button"  onclick="showProducts()" id="button-filter" style="" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo $button_show_products; ?></button>
              </div>
            </div>
          </div>
        </div>
        <form method="post" id="action_form" action="index.php?route=module/mercadolivre/product_import&token=<?php echo $token; ?>" enctype="multipart/form-data">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'ml_order\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php echo $column_product_id; ?></td>
                  <td class="text-left"><?php echo $column_product_title; ?></td>
                  <td class="text-left"><?php echo $column_product_price; ?></td>
                 
                  <td class="text-left"><?php echo $text_opencart_product; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
                <tr>
                  <td class="text-center">
                    <input type="hidden" name="ml_product[]" value="<?php echo $product['product_id']; ?>" /></td>
                    <td class="text-left"><?php echo $product['product_id']; ?></td>
                    <td class="text-left"><?php echo $product['title']; ?></td>
                    <td class="text-left"><?php echo $product['price']; ?></td> 
                   
                    <td class="text-right"><input type="hidden" name="ml_oc_product[]" value="" /><input type="text" name="ml_oc_filter[]" value="" placeholder="<?php echo $text_opencart_product; ?>" class="form-control ml_oc_filter" /></td>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="5"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="loader" style="display:none">Loading...</div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <style type="text/css">
    .page-header{margin: 5px 0; font-size: 15px;}
    .page-header h1 {font-size: 20px;}
    .well { min-height: 20px; margin-bottom: 10px;padding: 0px 6px;}
    .form-group {
    padding-top: 8px;
    padding-bottom: 11px;
    margin-bottom: 0;
    }
    .bootstrap-datetimepicker-widget {
    z-index: 99999!important;
  }
  .info-hint{
    text-align: left;
    width: 100%;
    display: inline-block;
    margin-left: 17px;
    margin-bottom: 11px;
    color: #666;
}
  </style>
  <script type="text/javascript"><!--
$('input.ml_oc_filter').autocomplete({
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
    $(this).val(item['label']);
    $(this).prev('input[name*=\'ml_oc_product\']').val(item['value']);
  }
});
</script>
