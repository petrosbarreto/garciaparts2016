<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      
      <p><?php echo $text_intro?></p>
  
     <?php if($error){?> <p class="ml-error"> <?php echo $error;?></p> <?php }?>
     <?php if($auth_done){?> <p class="ml-success"> <?php echo $text_auth_done;?></p> <?php }?>
  
     <p><a class="ml-btn" href="<?php echo $login_url?>"><?php echo $text_auth?></a></p>
      
      
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>

  <style type="text/css">
    .ml-btn {
    background: none repeat scroll 0 0 #38B0E3;
    clear: both;
    color: #FFFFFF !important;
    display: block;
    font-size: 15px;
    margin: 50px auto;
    width: 220px;
    padding: 9px 12px;
    text-decoration: underline;
   }
 .ml-success {
    background: none repeat scroll 0 0 #60A45F;
    border-radius: 4px;
    color: #FFFFFF !important;
    font-weight: bold;
    padding: 8px 10px;
}
.ml-error {
    background: none repeat scroll 0 0 #D66F75;
    border-radius: 4px;
    color: #FFFFFF;
    font-weight: bold;
    padding: 8px 10px;
}
  </style>
  <?php echo $footer; ?> 