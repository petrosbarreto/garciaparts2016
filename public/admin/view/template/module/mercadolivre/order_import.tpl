<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="importStart()" class="btn btn-info"><i class="fa fa-truck"></i> <?php echo $button_import; ?></button>
        <button type="button" id="button-close" onclick="closePopup()" title="<?php echo $button_close; ?>" class="btn btn-warning"><i class="fa fa-close"></i> <?php echo $button_close; ?></button>
        </div>
      <h1><?php echo $text_import_ml_order; ?></h1>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="input-group date">
                  <input type="text" name="filter_date_start" value="<?php echo $filter_date_start; ?>" placeholder="<?php echo $entry_date_state; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group">
                <div class="input-group date">
                  <input type="text" name="filter_date_end" value="<?php echo $filter_date_end; ?>" placeholder="<?php echo $entry_date_end; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
            </div>
            <div class="col-sm-4">
                <button type="button"  onclick="showOrders()" id="button-filter" style="margin-top:8px;" class="btn btn-primary pull-left"><i class="fa fa-search"></i> <?php echo $button_show_orders; ?></button>
            </div>
          </div>
           <div class="row"> <span class="info-hint"><?php echo $text_date_hint; ?></span></div>
        </div>
        <form method="post" id="action_form" action="index.php?route=module/mercadolivre/order_import&token=<?php echo $token; ?>" enctype="multipart/form-data">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'ml_order\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php echo $column_order_id; ?></td>
                  <td class="text-left"><?php echo $column_order_date; ?></td>
                  <td class="text-left"><?php echo $column_buyer; ?></td>
                  <td class="text-left"><?php echo $column_total; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($orders) { ?>
                <?php foreach ($orders as $order) { ?>
                <tr>
                  <td class="text-center">
                    <input type="checkbox" name="ml_order[]" value="<?php echo $order['order_id']; ?>" /></td>
                    <td class="text-left"><?php echo $order['order_id']; ?></td>
                    <td class="text-left"><?php echo $order['date']; ?></td>
                    <td class="text-left"><?php echo $order['buyer']; ?></td>
                    <td class="text-left"><?php echo $order['total']; ?></td>
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
    z-index: 9999999!important;
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
  <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
  <script type="text/javascript"><!--
$('.date').datetimepicker({
  pickTime: false
});
//--></script>
