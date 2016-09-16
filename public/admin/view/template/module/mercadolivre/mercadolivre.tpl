<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
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
          <table  width="100%" cellspacing="0" cellpadding="2" border="0" class="adminlist">
                    <tr>
                        <td width="200" align="center"><a href="<?php echo $setting?>"><img src="view/image/mercadolivre/setting.png" /><br /><?php echo $text_setting ?></a></td>
						<td width="200" align="center"><a target="_blank" href="<?php echo $auth?>"><img src="view/image/mercadolivre/lock_icon.png" /><br /><?php echo $text_auth ?></a></td>
						<?php if($upgrade){?>
						 <td width="200" align="center"><a href="<?php echo $upgrade?>"><img src="view/image/mercadolivre/ml_upgrade.png" /><br /><?php echo $text_upgrade ?></a></td>
						<?php } ?>
						<td width="200" align="center"><a href="<?php echo $help?>"><img src="view/image/mercadolivre/help.png" /><br /><?php echo $text_help ?></a></td>
                    </tr>
                    <?php if($auth_done) {?>
                    <tr><td colspan="4" height="45">&nbsp;</td></tr>
                    <tr>
                        <td width="200" align="center"><a class="ml-popup" rel="product" href="#"><img width="120" src="view/image/mercadolivre/ml_import_product.png" /><br /><?php echo $text_sync_ml_product ?></a></td>
						<td width="200" align="center"><a class="ml-popup" rel="order" href="#"><img width="120" src="view/image/mercadolivre/ml_import_order.png" /><br /><?php echo $text_import_ml_order ?></a></td>
                    </tr>
                    <?php } ?>
                    
                    <?php if($superAccount) {?>
                    <tr><td colspan="4" height="45">&nbsp;</td></tr>
                    <tr>
                        <?php if(!$project) {?>
                        <td width="200" align="center"><a href="<?php echo $create?>"><img src="view/image/mercadolivre/project.png" /><br /><?php echo $text_create_project ?></a></td>
                        <?php } ?>
                         <?php if($project) {?>
						<td width="200" align="center"><a href="<?php echo $apps?>"><img src="view/image/mercadolivre/project.png" /><br /><?php echo $text_project_apps ?></a></td>
						<?php } ?>
                    </tr>
                    <?php } ?>
               </table>
       <!-- content start -->
      </div>
    </div>
  </div>
</div>
<style>
  .adminlist td a {
    width: 200px;
    display: block;
    height: 170px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
}
  .loader,
  .loader:before,
  .loader:after {
    background: #ff5c00;
    -webkit-animation: load1 1s infinite ease-in-out;
    animation: load1 1s infinite ease-in-out;
    width: 1em;
    height: 4em;
  }
  .loader:before,
  .loader:after {
    position: absolute;
    top: 0;
    content: '';
  }
  .loader:before {
    left: -1.5em;
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
  }
  .loader {
    color: #ff5c00;
    text-indent: -9999em;
    margin: 88px auto;
    position: relative;
    font-size: 11px;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
  }
  .loader:after {
    left: 1.5em;
  }
  @-webkit-keyframes load1 {
    0%,
    80%,
    100% {
      box-shadow: 0 0;
      height: 4em;
    }
    40% {
      box-shadow: 0 -2em;
      height: 5em;
    }
  }
  @keyframes load1 {
    0%,
    80%,
    100% {
      box-shadow: 0 0;
      height: 4em;
    }
    40% {
      box-shadow: 0 -2em;
      height: 5em;
    }
  }

  .table-responsive{ height: 375px;
    overflow: auto;  }
</style>
<script type="text/javascript">
            
        var popup_tpl = '<div id="popup-block" style="position:fixed;background-color:rgba(0,0,0,0.8);height:100%;left:0;bottom:0;text-align:center;vertical-align:middle;display:table;width:100%;z-index:99999;">'
                          +'<div style="display:table-cell;text-align:center;vertical-align:middle;">'
                              +'<div id="popup-content" style="height:600px;max-height:96%;width:1000px;max-width:90%;display:inline-block;background-color: #fff;">'
                              +'<div class="loader" style="margin-top:250px;">Loading...</div>'
                              +'</div>'
                              +'</div>'
                        +'</div>'; 
           
          var import_type, start, end, keyword;              

          $(document).ready(function(){
              
              $('a.ml-popup').click(function(e) {
                   e.preventDefault();
                   $('body').append(popup_tpl);
                   import_type = $(this).attr('rel');
                   initCall();
              });

          }); 

          function initCall() {

                start = (typeof start != 'undefined') ? start : '';
                end = (typeof end != 'undefined') ? end : '';
                keyword = (typeof keyword != 'undefined') ? keyword : '';
                
                 $.ajax({
                            url: "index.php?route=module/mercadolivre/import&token=<?php echo $token; ?>&type="+import_type+'&start='+start+'&end='+end+'&keyword='+keyword
                         })
                  .done(function(data) {
                       $('.loader').hide();
                       $('#popup-content').html(data);

                  });  

          }

          function showOrders() {
               start = $("input[name='filter_date_start']").val();
               end = $("input[name='filter_date_end']").val();
               $('.loader').show();
               initCall();
          }


          function showProducts() {
               keyword = $("input[name='filter_keyword']").val();
               $('.loader').show();
               initCall();
          }

          

          function closePopup() {
            $('#popup-block').remove();
             start = end = keyword = '';
          }   

          function importStart() {
              
             if($('input[name*=\'ml_order\']').length == 0) {
                 alert("<?php echo $text_nothing_import ?>");
              }
              else {
                 $('#action_form').submit();
              }
          }  
          
          function syncStart() {
              
              if($('input[name*=\'ml_oc_product\']').length == 0) {
                 alert("<?php echo $text_nothing_sync ?>");
              }
              else {
                 $('#action_form').submit();
              }
          }           
                 
          </script>
<?php echo $footer; ?>