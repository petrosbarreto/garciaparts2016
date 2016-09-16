<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-bancobradesco" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
      	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-bancobradesco" class="form-horizontal">
          <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-nome"><span data-toggle="tooltip" title="<?php echo $help_nome; ?>"><?php echo $entry_nome; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_nome" value="<?php echo $bancobradesco_nome; ?>" placeholder="<?php echo $entry_nome; ?>" id="input-nome" class="form-control" />
              <?php if ($error_nome) { ?>
              <div class="text-danger"><?php echo $error_nome; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-cedente"><span data-toggle="tooltip" title="<?php echo $help_cedente; ?>"><?php echo $entry_cedente; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_cedente" value="<?php echo $bancobradesco_cedente; ?>" placeholder="<?php echo $entry_cedente; ?>" id="input-cedente" class="form-control" />
              <?php if ($error_cedente) { ?>
              <div class="text-danger"><?php echo $error_cedente; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-cpfcnpj"><span data-toggle="tooltip" title="<?php echo $help_cpfcnpj; ?>"><?php echo $entry_cpfcnpj; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_cpfcnpj" value="<?php echo $bancobradesco_cpfcnpj; ?>" placeholder="<?php echo $entry_cpfcnpj; ?>" id="input-cpfcnpj" class="form-control" />
              <?php if ($error_cpfcnpj) { ?>
              <div class="text-danger"><?php echo $error_cpfcnpj; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-endereco"><span data-toggle="tooltip" title="<?php echo $help_endereco; ?>"><?php echo $entry_endereco; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_endereco" value="<?php echo $bancobradesco_endereco; ?>" placeholder="<?php echo $entry_endereco; ?>" id="input-endereco" class="form-control" />
              <?php if ($error_endereco) { ?>
              <div class="text-danger"><?php echo $error_endereco; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-agencia"><span data-toggle="tooltip" title="<?php echo $help_agencia; ?>"><?php echo $entry_agencia; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_agencia" value="<?php echo $bancobradesco_agencia; ?>" placeholder="<?php echo $entry_agencia; ?>" id="input-agencia" class="form-control" />
              <?php if ($error_agencia) { ?>
              <div class="text-danger"><?php echo $error_agencia; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-agenciadg"><span data-toggle="tooltip" title="<?php echo $help_agenciadg; ?>"><?php echo $entry_agenciadg; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_agenciadg" value="<?php echo $bancobradesco_agenciadg; ?>" placeholder="<?php echo $entry_agenciadg; ?>" id="input-agenciadg" class="form-control" />
              <?php if ($error_agenciadg) { ?>
              <div class="text-danger"><?php echo $error_agenciadg; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-conta"><span data-toggle="tooltip" title="<?php echo $help_conta; ?>"><?php echo $entry_conta; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_conta" value="<?php echo $bancobradesco_conta; ?>" placeholder="<?php echo $entry_conta; ?>" id="input-conta" class="form-control" />
              <?php if ($error_conta) { ?>
              <div class="text-danger"><?php echo $error_conta; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-contadg"><span data-toggle="tooltip" title="<?php echo $help_contadg; ?>"><?php echo $entry_contadg; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_contadg" value="<?php echo $bancobradesco_contadg; ?>" placeholder="<?php echo $entry_contadg; ?>" id="input-contadg" class="form-control" />
              <?php if ($error_contadg) { ?>
              <div class="text-danger"><?php echo $error_contadg; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-carteira"><span data-toggle="tooltip" title="<?php echo $help_carteira; ?>"><?php echo $entry_carteira; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_carteira" value="<?php echo $bancobradesco_carteira; ?>" placeholder="<?php echo $entry_carteira; ?>" id="input-carteira" class="form-control" />
              <?php if ($error_carteira) { ?>
              <div class="text-danger"><?php echo $error_carteira; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group">
          	<label class="col-sm-2 control-label" for="input-taxa"><span data-toggle="tooltip" title="<?php echo $help_taxa; ?>"><?php echo $entry_taxa; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_taxa" value="<?php echo $bancobradesco_taxa; ?>" placeholder="<?php echo $entry_taxa; ?>" id="input-taxa" class="form-control" />
            </div>
          </div>
		  <div class="form-group required">
          	<label class="col-sm-2 control-label" for="input-dias"><span data-toggle="tooltip" title="<?php echo $help_dias; ?>"><?php echo $entry_dias; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_dias" value="<?php echo $bancobradesco_dias; ?>" placeholder="<?php echo $entry_dias; ?>" id="input-dias" class="form-control" />
              <?php if ($error_dias) { ?>
              <div class="text-danger"><?php echo $error_dias; ?></div>
              <?php } ?>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-demo1"><span data-toggle="tooltip" title="<?php echo $help_demo; ?>"><?php echo $entry_demo1; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_demo1" value="<?php echo $bancobradesco_demo1; ?>" placeholder="<?php echo $entry_demo1; ?>" id="input-demo2" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-demo2"><span data-toggle="tooltip" title="<?php echo $help_demo; ?>"><?php echo $entry_demo2; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_demo2" value="<?php echo $bancobradesco_demo2; ?>" placeholder="<?php echo $entry_demo2; ?>" id="input-demo2" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-demo3"><span data-toggle="tooltip" title="<?php echo $help_demo; ?>"><?php echo $entry_demo3; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_demo3" value="<?php echo $bancobradesco_demo3; ?>" placeholder="<?php echo $entry_demo3; ?>" id="input-demo3" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-ins1"><span data-toggle="tooltip" title="<?php echo $help_ins; ?>"><?php echo $entry_ins1; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_ins1" value="<?php echo $bancobradesco_ins1; ?>" placeholder="<?php echo $entry_ins1; ?>" id="input-ins1" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-ins2"><span data-toggle="tooltip" title="<?php echo $help_ins; ?>"><?php echo $entry_ins2; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_ins2" value="<?php echo $bancobradesco_ins2; ?>" placeholder="<?php echo $entry_ins2; ?>" id="input-ins2" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-ins3"><span data-toggle="tooltip" title="<?php echo $help_ins; ?>"><?php echo $entry_ins3; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_ins3" value="<?php echo $bancobradesco_ins3; ?>" placeholder="<?php echo $entry_ins3; ?>" id="input-ins3" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-ins4"><span data-toggle="tooltip" title="<?php echo $help_ins; ?>"><?php echo $entry_ins4; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_ins4" value="<?php echo $bancobradesco_ins4; ?>" placeholder="<?php echo $entry_ins4; ?>" id="input-ins4" class="form-control" />
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_total" value="<?php echo $bancobradesco_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control" />
            </div>
          </div> 
		  <div class="form-group">
          	<label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_order_status; ?>"><?php echo $entry_order_status; ?></span></label>
            <div class="col-sm-10">
              <select name="bancobradesco_order_status_id" id="input-order-status" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $bancobradesco_order_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
            <div class="col-sm-10">
              <select name="bancobradesco_geo_zone_id" id="input-geo-zone" class="form-control">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $bancobradesco_geo_zone_id) { ?>
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
              <select name="bancobradesco_status" id="input-status" class="form-control">
                <?php if ($bancobradesco_status) { ?>
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
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="bancobradesco_sort_order" value="<?php echo $bancobradesco_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
      	</form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>