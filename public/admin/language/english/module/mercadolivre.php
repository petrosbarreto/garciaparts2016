<?php
// Heading 
$_['heading_title']        = 'Mercadolivre'; 
$_['text_module']         = 'Module'; 

// Text

$_['text_app_id']         = 'App ID';
$_['text_app_secret']         = 'App Secret';
$_['text_status']         = 'Status';
$_['text_enabled']         = 'Enabled';
$_['text_disabled']         = 'Disabled';
$_['text_help']         = 'Help';

$_['text_auth_pending']         = 'Authenticate to Mercadolivre';
$_['text_auth_done']         = 'Authentication Done.';

$_['syn_done']        = 'Synchronization done!'; 
$_['unsyn_done']        = 'Unbind done!'; 

$_['text_oc_status']         = 'Opencart Status';
$_['text_ml_status']         = 'Mercadolivre Status';

$_['tab_setting']          = 'APP Setting';
$_['tab_listing']          = 'Listing Setting';
$_['tab_order']          = 'Order Setting';
$_['listing_default']          = 'These are default configuration and it will only work if no setting found for a particular product while synchrozing to ML.';

$_['entry_mercadolivre_currency']        = 'Listing Currency'; 
$_['entry_mercadolivre_buying_mode']        = 'Buying Mode'; 
$_['entry_mercadolivre_listing_type']        = 'Listing Type'; 
$_['entry_mercadolivre_condition']        = 'Item Condition';   
$_['entry_mercadolivre_category']        = 'Mercadolivre Category'; 
$_['entry_mercadolivre_template']        = 'Product Template: <br />(Product template must have a placeholder \'__CONTENT__\' by which product description will be replaced.)'; 
$_['tab_template']        = 'Product Template';
$_['entry_mercadolivre_price_adjustment']        = 'Product Price Adjustment: <br />(It will adjust product price before posting to Mercado livre. Percentage is Allowed)';
$_['entry_mercadolivre_warranty']        = 'Product Warranty';
$_['entry_mercadolivre_subtitle']        = 'Product Sub-Title';
$_['entry_mercadolivre_video']        = 'Product Video: <br />(Youtube Video ID)';


$_['need_auth']          = 'Authentication with mecadolivre not yet done. Please authenticate <a target="_blank" href="%smercadolivre_auth">%smercadolivre_auth</a>';

$_['text_instruction']        = '<li>Please install Mercadolivre Module from Extensions -> Modules -> Mercadolivre </li>
                                 <li>Create an mercadolivre application from <a target="_blank" href="http://applications.mercadolibre.com/">http://applications.mercadolibre.com/ </a></li>
								 <li>Set Redirect URL to <a target="_blank" href="%smercadolivre_auth">%smercadolivre_auth</a> </li>
								 <li>Set Notification URL to <a target="_blank" href="'.HTTP_CATALOG.'mercadolivre_callback">'.HTTP_CATALOG.'mercadolivre_callback</a></li>
								 <li>Then authenticate opencart with your mercadolivre account</li>
								 <li>Please create a category tree for your local db by clicking <a target="_blank" href="'.HTTP_CATALOG.'index.php?route=mercadolivre/mercadolivre/syncat">'.HTTP_CATALOG.'index.php?route=mercadolivre/mercadolivre/syncat</a></li>
								 <li><span style="color:#FF0000;font-weight:bold;">Very Important:</span> Since mercadolivre does not support opnecart default URL, you have to enable SEF URL from opencart setting.</li>
								 <li><strong>CronJob:</strong> CronJob is optional. If you want to fetch ML order data without logging to store admin. Please add this URL '.HTTP_CATALOG.'mercadolivre_cron in your cronjob in every
few hours.</li> '; 

/*Feedback*/
$_['lang_auto_feedback']        = 'Automatically Feedback?';
$_['lang_auto_feedback_status']        = 'Submit Feedback when Mercadolivre order status is?';
$_['lang_feedback_rating']        = 'Feedback Rating';
$_['lang_feedback_message']        = 'Feedback Message';
$_['tab_feedback']        = 'Feedback Setting';
$_['text_edit']        = 'Mercadolivre Module'; 

$_['lang_order_status1']        = 'Confirmed';
$_['lang_order_status2']        = 'Payment Required';
$_['lang_order_status3']        = 'Payment in Process';
$_['lang_order_status4']        = 'Paid';
$_['lang_order_status5']        = 'Cancelled';
$_['lang_purchase_no']        = 'Your Opencart.com Order#: <br />(<a target="_blank" href="https://www.opencart.com/index.php?route=account/order">Click here</a> to find your order# )';

/*Shipping*/
$_['tab_shipping']        = 'Custom Shipping';
$_['lang_shipping_name']        = 'Shipping Name';
$_['lang_shipping_cost']        = 'Shipping Cost';
$_['lang_shipping_alter']        = 'Select alternative method, If Custom Shipping is not available <br />(<i>Note: Product dimensional is required for me1/me2.</i>)';
$_['lang_shipping_me10']        = 'MercadoEnvios 1 (me1) with local pickup';
$_['lang_shipping_me11']        = 'MercadoEnvios 1 (me1) without local pickup';
$_['lang_shipping_me20']        = 'MercadoEnvios 2 (me2) with local pickup';
$_['lang_shipping_me21']        = 'MercadoEnvios 2 (me2) without local pickup';
$_['lang_shipping_00']        = 'Don\'t need';


// Column
$_['text_setting']          = 'Setting';
$_['lang_column_status']        = 'Status';
$_['lang_column_action']        = 'Action';

//New
$_['order_status_hints']          = 'Please map mercadolivere order status to your opencart order status. Please also select shipping and payment method. It will be used when a ML order synchronize to opencart.';
$_['lang_new_user']        = 'Create a new customer if ML customer email does not exist in opencart';
$_['text_yes']         = 'Yes';
$_['text_no']         = 'No';
$_['text_shipping_method']         = 'Shipping Method';
$_['text_payment_method']         = 'Payment Method';
$_['text_add_images_in_desc']         = 'Add Images in Product Description';
$_['text_order_status_rule']         = 'Don\'t Synchronize Order Status When Opencart Order Status is';
$_['text_always_sync']         = 'Always Sync';
$_['text_status_sync']         = 'Sync Order Status after importing';

$_['text_import_old']         = 'Period of Old Order Importing';
$_['text_import_all']         = 'All Orders';
$_['text_import_three_days']         = 'Orders of the last three days';
$_['text_import_week_days']         = 'Orders of the last week';
$_['text_import_two_week_days']         = 'Orders of the last two weeks';
$_['text_import_one_month']         = 'Orders of the last month';
$_['text_dont_import']         = 'Don\'t import';

// Error
$_['error_permission']          = 'Warning: You do not have permission to modify Mercadolivre extensions!';
$_['update_success']                    = 'Module has been updated Mercadolivre module';
$_['error_app_id']        = 'App ID Required!';
$_['error_app_secret']          = 'App Secret Required!';
$_['ml_text_category_hint']        = '(Text green means listing allowed. Text red means listing not allowed)';
$_['debug_status']          = 'Debug Status:';
$_['upgrade_done']        = 'Module has been upgraded.';
$_['text_upgrade']        = 'Upgrade';
$_['ml_text_reposting']        = 'Repost Automatically After close';

$_['text_sync_ml_product']        = 'Sync Existing ML Products';
$_['text_import_ml_order']        = 'Import ML Orders';

$_['button_import']        = 'Import';
$_['button_sync']        = 'Synchronize';
$_['button_close']        = 'Close';
$_['button_save']        = 'Save';
$_['entry_date_state']        = 'From Date';
$_['entry_date_end']        = 'To Date';
$_['button_show_orders']        = 'Show Orders';
$_['column_order_id']        = 'Order #';
$_['column_order_date']        = 'Date of Order';
$_['column_buyer']        = 'Buyer Name';
$_['column_total']        = 'Order Total'; 
$_['text_no_results']        = 'Sorry, no data found';
$_['text_date_hint']        = 'Date range should be in between six months';
$_['text_nothing_import']        = 'Nonthing to import';
$_['text_nothing_sync']        = 'Nonthing to sync';

$_['column_product_id']        = 'Product #'; 
$_['column_product_title']        = 'Title';
$_['column_product_price']        = 'Price';
$_['column_product_status']        = 'Status';
$_['button_show_products']        = 'Show Products';
$_['text_search_keyword']        = 'Enter ML product name to search';
$_['text_opencart_product']        = 'Your Store Product';
$_['text_auto_category']        = 'Detect ML category automatically if not set';
$_['text_default_category_hint']        = 'This category will consider if auto detection failed and no category is set';

$_['text_create_project']        = 'Create Project';
$_['text_project_apps']        = 'Show Application List';
$_['text_project_success']        = 'Project created successfully';