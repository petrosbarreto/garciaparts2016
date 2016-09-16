<?php
/* Copyright - Copyright (C) 2012 - 2016 opencartmart
 * Website - http://www.opencartmart.com
 * All rights reserved. No part of this module may be reproduced, distributed, or sold in any form or 
 * by any means without the prior written permission of the developer. 
 */
class ControllerModuleMercadolivre extends Controller {
   private $error = array();
    public function index(){
	
        $this->load->language('module/mercadolivre');
		$this->load->model('setting/setting');
		$this->load->model('mercadolivre/mercadolivre');
		
		$ssl_url = HTTP_CATALOG;
	  
	    if(stripos($ssl_url,'https')===false) {
	      $ssl_url = str_replace('http','https',$ssl_url);
	    }
        
        if(isset($this->session->data['error']))
        {
            $data['error_warning'] = $this->session->data['error'];
            unset($this->session->data['error']);
        } else{
            $data['error_warning'] = '';
        }
        
        if(isset($this->session->data['success']))
        {
            $data['success'] = $this->session->data['success'];
            unset($this->session->data['success']);
        }else{
            $data['success'] = '';
        }
		
		if(!$this->mercadolivre->getAccess())
		{
		  $data['error_warning'] = sprintf($this->language->get('need_auth'),$ssl_url ,$ssl_url);
		}
        
        $data['heading_title']        = $this->language->get('heading_title');
        $data['text_module']     = $this->language->get('text_module');
		$data['button_cancel']        = $this->language->get('button_cancel');
		$data['text_setting']        = $this->language->get('text_setting');
		$data['text_help']        = $this->language->get('text_help');
		$data['text_upgrade']        = $this->language->get('text_upgrade');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_import_ml_order'] = $this->language->get('text_import_ml_order');
		$data['text_sync_ml_product'] = $this->language->get('text_sync_ml_product');
		$data['text_nothing_import'] = $this->language->get('text_nothing_import');
		$data['text_nothing_sync'] = $this->language->get('text_nothing_sync');
		
		$data['text_create_project'] = $this->language->get('text_create_project');
		$data['text_project_success'] = $this->language->get('text_project_success');
		$data['text_project_apps'] = $this->language->get('text_project_apps');
        
		$accesToken=$this->config->get('mercadolivre_access_token');
		if(!empty($accesToken))
		{
		   $data['text_auth']     = $this->language->get('text_auth_done');
		   $data['auth_done'] = true;
		}
		else
		{
		    $data['text_auth']     = $this->language->get('text_auth_pending');
		    $data['auth_done'] = false;
		}
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        
        $data['setting']       = $this->url->link('module/mercadolivre/setting', 'token=' . $this->session->data['token'], 'SSL');
		$data['help']       = $this->url->link('module/mercadolivre/help', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
        $data['auth']       = str_replace(array('https','http'),'https',HTTP_CATALOG.'mercadolivre_auth');
        $data['create']       = $this->url->link('module/mercadolivre/create', 'token=' . $this->session->data['token'], 'SSL');
        $data['apps']       = $this->url->link('module/mercadolivre/apps', 'token=' . $this->session->data['token'], 'SSL');
      
       
       /*For upgrade notice*/
       
       $data['upgrade']='';
       if($this->model_mercadolivre_mercadolivre->isDBBUPdateAvail()){
         $data['upgrade']=$this->url->link('module/mercadolivre/upgrade', 'token=' . $this->session->data['token'], 'SSL');
       }

        $data['project']=$this->config->get('mercaProject_project');

        $data['token'] =$this->session->data['token'];
		$data['superAccount'] = $this->mercadolivre->superAccount;
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('module/mercadolivre/mercadolivre.tpl', $data));
    }
	
	
	public function help(){
	
        $this->load->language('module/mercadolivre');
        
        $ssl_url = HTTP_CATALOG;
	  
	    if(stripos($ssl_url,'https')===false) {
	      $ssl_url = str_replace('http','https',$ssl_url);
	    }
		
        $data['heading_title']        = $this->language->get('heading_title');
        $data['text_instruction']     = sprintf($this->language->get('text_instruction'),$ssl_url, $ssl_url);
        $data['text_edit']     = $this->language->get('text_edit');
		
		
		$data['error_warning'] = ''; 
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        
       $data['button_cancel']        = $this->language->get('button_cancel');
		$data['cancel'] = $this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL');
      
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('module/mercadolivre/help.tpl', $data));
    }
	
	 public function import() {
	
          $this->load->language('module/mercadolivre');
		  $this->load->language('module/mercadolivre_extra');
		  $this->load->model('mercadolivre/mercadolivre');

		  $type = isset($this->request->get['type']) ? $this->request->get['type'] : '';
		  $start = isset($this->request->get['start']) ? $this->request->get['start'] : '';
		  $end = isset($this->request->get['end']) ? $this->request->get['end'] : '';
		  $keyword = isset($this->request->get['keyword']) ? $this->request->get['keyword'] : '';
		  
		  $data = array();

		  $data['text_import_ml_order']        =  $this->language->get('text_import_ml_order');
		  $data['text_sync_ml_product']        =  $this->language->get('text_sync_ml_product');

		  $data['button_import']        = $this->language->get('button_import');
		  $data['button_sync']        = $this->language->get('button_sync');
		  $data['button_close']        = $this->language->get('button_close');
		  $data['entry_date_state']        = $this->language->get('entry_date_state');
		  $data['entry_date_end']        = $this->language->get('entry_date_end');
		  $data['button_show_orders']        = $this->language->get('button_show_orders');
		  $data['column_order_id']        = $this->language->get('column_order_id');
		  $data['column_order_date']        = $this->language->get('column_order_date');
		  $data['column_buyer']        = $this->language->get('column_buyer');
		  $data['column_total']        = $this->language->get('column_total');
		  $data['text_no_results']        = $this->language->get('text_no_results');
		  $data['text_date_hint']        = $this->language->get('text_date_hint');

		  $data['column_product_id']        = $this->language->get('column_product_id');
		  $data['column_product_title']        = $this->language->get('column_product_title');
		  $data['column_product_price']        = $this->language->get('column_product_price');
		  $data['column_product_status']        = $this->language->get('column_product_status');
		  $data['button_show_products']        = $this->language->get('button_show_products');
		  $data['text_search_keyword']        = $this->language->get('text_search_keyword');
		  $data['text_opencart_product']        = $this->language->get('text_opencart_product');

		  $data['orders'] = array();
		  $data['products'] = array();
		  $data['filter_date_start'] = $start;
		  $data['filter_date_end'] = $end;
		  $data['filter_keyword'] = $keyword;
		  $data['token'] =$this->session->data['token'];

		  if($type =='order') {
		
			  $orders = $this->mercadolivre->getMLOrders($start, $end);

			  if(is_object($orders) && property_exists($orders,'results')) {
	             
	             foreach ($orders->results as $order) {
	             
	             if(!$this->mercadolivre->getOCOrderIDFromML($order->id)) {
	 				  $data['orders'][] = array(
	 					'order_id' => $order->id,
	                    'date' => date($this->language->get('date_format_short'), strtotime($order->date_created)),
	                    'buyer' => $order->buyer->nickname,
	                    'total' => $this->currency->format($order->total_amount, $this->config->get('config_currency'))
	 				  );
	 			   }	
	             } 	

			  }

			  echo $this->response->setOutput($this->load->view('module/mercadolivre/order_import.tpl', $data));
		  }
         
         if($type =='product') {
		
			  $products = $this->mercadolivre->getMLProducts($keyword);

			  if(is_object($products) && property_exists($products,'results')) {
	             
	             foreach ($products->results as $product) {
	              
	               if(!$this->mercadolivre->getOCProductIDFromML($product->id)) {
	               
	 				    $data['products'][] = array(
	 					   'product_id' => $product->id,
	                       'title' => $product->title,
	                       'price' => $this->currency->format($product->price, $this->config->get('config_currency'))
	 				   );
	 				}
	             } 	

			  }

			  echo $this->response->setOutput($this->load->view('module/mercadolivre/product_import.tpl', $data));
		  }  

     }	

	
	public function order_import() {
	
          $this->load->language('module/mercadolivre');
		  $this->load->language('module/mercadolivre_extra');
		  $this->load->model('mercadolivre/mercadolivre');
		  
		   if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->request->post['ml_order']) {
		    
			   		$ml_order= is_array($this->request->post['ml_order']) ? $this->request->post['ml_order'] : array();
			   		
			   		foreach($ml_order as $mercaOrderId) {
			   		    $mercaOrderId = trim($mercaOrderId);
				   	    $this->mercadolivre->createOpencartOrder($mercaOrderId);
				    }
				    
			    $this->session->data['success'] = $this->language->get('import_success'); 
		   }
		   
		 $this->response->redirect($this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'));  
     }
     
     public function apps() {
      $this->load->language('module/mercadolivre');
      $apps = $this->mercadolivre->getApps();
      
      print_r($apps);
      
   } 
    
   public function create() {
      $this->load->language('module/mercadolivre');
      $this->mercadolivre->createProject();
      if($this->mercadolivre->error!='')
	  {
	    $this->session->data['error_warning'] ='API Error:'.$this->mercadolivre->error;
	  }
	  else {
	    $this->session->data['success'] = $this->language->get('text_project_success'); 
	  }
	  $this->response->redirect($this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'));  
   } 

     public function product_import() {
	
          $this->load->language('module/mercadolivre');
		  $this->load->language('module/mercadolivre_extra');
		  $this->load->model('mercadolivre/mercadolivre');
		  
		   if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->request->post['ml_product']) {
		    
			   	$ml_product= is_array($this->request->post['ml_product']) ? $this->request->post['ml_product'] : array();
			   	$ml_oc_product= is_array($this->request->post['ml_oc_product']) ? $this->request->post['ml_oc_product'] : array();
			   		
		   		foreach($ml_product as $inc=>$mercaId) {
		   		    $mercaId = trim($mercaId);
		   		    $product_id = $ml_oc_product[$inc];
		   		    if($mercaId && $product_id) {
		   		     
		   		        if(!$this->mercadolivre->getMercadolivreIDs($product_id)) {
		   		           $this->mercadolivre->addMLToOCMap($mercaId,$product_id); 
		   		           $this->mercadolivre->updateOpencartProduct($mercaId); 
		   		        }
		   		      
		   		    } 
			    }
				    
			    $this->session->data['success'] = $this->language->get('syn_done'); 
		   }
		   
		 $this->response->redirect($this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'));  
     }			   
	
	public function bulk_setting() {
	
          $this->load->language('module/mercadolivre');
		  $this->load->language('module/mercadolivre_extra');
		  $this->load->model('mercadolivre/mercadolivre');
		  $this->load->model('catalog/product');
		 
		   if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
		       if(isset($this->request->post['product_ml']) && $this->request->post['product_ml'] && $this->request->post['mercaId']) {
			   
			   		$product_ml=is_array($this->request->post['product_ml'])?$this->request->post['product_ml']:array();
			   		$data=$this->request->post;
			   		foreach($product_ml as $product_id) {
				   
				   	   if (!$this->mercadolivre->getMercadolivreIDs($product_id)) { /* Only update if already not synchronized*/
				      	   if (!isset($data['ml_attr']))$data['ml_attr']=array();
					  	   $this->mercadolivre->addMLProductAttribute($data['ml_attr'],$product_id);    
				      	   $this->mercadolivre->updateProductMLData($data,$product_id);
				      	  
				      	   if(isset($this->request->post['autopost']) && $this->request->post['autopost']) {
				      	       $this->model_mercadolivre_mercadolivre->synchronizeProduct($product_id);  
				      	   }
				       }
			       }
			    $this->session->data['success'] = $this->language->get('save_success');
			 }  
			
			 $this->response->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'], 'SSL'));
		   }
		 
		  $data['entry_mercadolivre_category'] = $this->language->get('entry_mercadolivre_category');
		  $data['entry_mercadolivre_currency'] = $this->language->get('entry_mercadolivre_currency');
		  $data['entry_mercadolivre_buying_mode'] = $this->language->get('entry_mercadolivre_buying_mode');
		  $data['entry_mercadolivre_listing_type'] = $this->language->get('entry_mercadolivre_listing_type');
		  $data['entry_mercadolivre_condition'] = $this->language->get('entry_mercadolivre_condition');
		  $data['tab_mercadolivre'] = $this->language->get('tab_mercadolivre');
		  $data['ml_text_category_hint'] = $this->language->get('ml_text_category_hint');
		  $data['ml_text_select'] = $this->language->get('ml_text_select');
		  $data['entry_mercadolivre_warranty'] = $this->language->get('entry_mercadolivre_warranty');
		  $data['entry_mercadolivre_subtitle'] = $this->language->get('entry_mercadolivre_subtitle');
		  $data['entry_mercadolivre_video'] = $this->language->get('entry_mercadolivre_video');
		  $data['lang_ml_select_product'] = $this->language->get('lang_ml_select_product');
		  $data['text_image_manager'] = $this->language->get('text_image_manager');
		  $data['button_save'] = $this->language->get('button_save');
		  $data['button_cancel'] = $this->language->get('button_cancel');
		  $data['ml_text_reposting']        = $this->language->get('ml_text_reposting');
		  $data['entry_mercadolivre_price_adjustment'] = $this->language->get('entry_mercadolivre_price_adjustment');
		  $data['button_post'] = $this->language->get('button_post');
		  
		  $data['token'] =$this->session->data['token'];
		  $data['action'] =$this->url->link('module/mercadolivre/bulk_setting', 'token=' . $this->session->data['token'], 'SSL');
		  
		  $data['products']=array();
		  if(isset($this->request->get['pids']) && $this->request->get['pids']){
			$product_ids=explode(',',$this->request->get['pids']); 
			foreach($product_ids as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);
	
				if ($product_info) {
					$data['products'][] = array(
						'product_id' => $product_info['product_id'],
						'name'       => $product_info['name']
					);
				 }
			}
		  }
		  
		  
		  $product_info = (isset($product_ids) && count($product_ids)==1)?$this->model_catalog_product->getProduct($product_ids[0]):array();
		   
		  $data['mercaId'] = isset($product_info['mercaId'])?$product_info['mercaId']:'';
		  $data['mercaTree'] = isset($product_info['mercaTree'])?$product_info['mercaTree']:'';
		  $data['mercaCurrency'] = isset($product_info['mercaCurrency'])?$product_info['mercaCurrency']:'';
		  $data['mercaBuyMode'] = isset($product_info['mercaBuyMode'])?$product_info['mercaBuyMode']:'';
		  $data['mercaListType'] = isset($product_info['mercaListType'])?$product_info['mercaListType']:'';
		  $data['mercaCondition'] = isset($product_info['mercaCondition'])?$product_info['mercaCondition']:'';
		  $data['mercaWarranty'] = isset($product_info['mercaWarranty'])?$product_info['mercaWarranty']:'';
		  $data['mercaVideoId'] = isset($product_info['mercaVideoId'])?$product_info['mercaVideoId']:'';
		  $data['mercaReposting'] = isset($product_info['mercaReposting'])?$product_info['mercaReposting']:'';
		  $data['mercaAdjust'] = isset($product_info['mercaAdjust'])?$product_info['mercaAdjust']:'';
			
		  if(!$data['mercaWarranty'])$data['mercaWarranty']=$this->config->get('mercadolivre_mercaWarranty');
		  
		  $data['mercadolivre_cats']=$this->model_mercadolivre_mercadolivre->getMercadoCategoryOption($data['mercaId']);
		  $data['mercadolivre_currency']=$this->model_mercadolivre_mercadolivre->getMercadoCurrency();
		  $data['mercadolivre_modes']=$this->model_mercadolivre_mercadolivre->getMercadoMode();
		  $data['mercadolivre_types']=$this->model_mercadolivre_mercadolivre->getMercadoType();
		  $data['mercadolivre_conditions']=$this->model_mercadolivre_mercadolivre->getMercadoCondition();
		  
		  $data['product_id']=(isset($product_ids) && count($product_ids)==1)?$product_ids[0]:0; 
			
     
         $data['header'] = '';
		 $data['column_left'] = '';
		 $data['footer'] = '';
		
		$this->response->setOutput($this->load->view('module/mercadolivre/bulk_setting.tpl', $data));
		 
	}
	
	public function setting(){
	
        $this->load->language('module/mercadolivre');
		$this->load->model('mercadolivre/mercadolivre');
		$this->load->model('setting/setting');
        
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
		    $this->request->post['mercadolivre_access_token']=$this->config->get('mercadolivre_access_token');  /*I dont want to loss if already  has code in db */
		    $this->request->post['mercadolivre_refresh_token']=$this->config->get('mercadolivre_refresh_token');
		    $this->request->post['mercadolivre_token_expire']=$this->config->get('mercadolivre_token_expire');
			
			$merca_statuses=$this->request->post['merca_status'];
			$oc_statuses=$this->request->post['oc_status'];
		
			
			unset($this->request->post['merca_status']);
			unset($this->request->post['oc_status']);
			unset($this->request->post['mercadolivre_cat_selection']);
			
			$this->request->post['mercadolivre_reposting'] = isset($this->request->post['mercadolivre_reposting'])? 1:0;

			$this->model_setting_setting->editSetting('mercadolivre', $this->request->post);	
			
			/*Update order status*/
			if($merca_statuses)
			{
			  $this->db->query("DELETE FROM `".DB_PREFIX."mercadolivre_status` WHERE 1");
			  foreach($merca_statuses as $i=>$merca_status)
			  {
			    $oc_status= $oc_statuses[$i];
				$this->db->query("INSERT INTO " . DB_PREFIX . "mercadolivre_status SET oc_status = '" . (int) $oc_status. "', `merca_status` = '" . $this->db->escape($merca_status) . "'");       
			  } 
			}
			
						
			$this->session->data['success'] = $this->language->get('update_success');
			$this->response->redirect($this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'));

		}
        
         $data['heading_title']        = $this->language->get('heading_title');
         $data['text_module']     = $this->language->get('text_module');
		 $data['text_setting']        = $this->language->get('text_setting');
		 $data['text_status'] = $this->language->get('text_status');
		 $data['text_enabled'] = $this->language->get('text_enabled');
		 $data['text_disabled'] = $this->language->get('text_disabled');
		 $data['text_app_id'] = $this->language->get('text_app_id');
		 $data['text_app_secret'] = $this->language->get('text_app_secret');
		 $data['text_select_category'] = $this->language->get('text_select_category');
		
		$data['entry_mercadolivre_category'] = $this->language->get('entry_mercadolivre_category');
		$data['entry_mercadolivre_currency'] = $this->language->get('entry_mercadolivre_currency');
		$data['entry_mercadolivre_buying_mode'] = $this->language->get('entry_mercadolivre_buying_mode');
		$data['entry_mercadolivre_listing_type'] = $this->language->get('entry_mercadolivre_listing_type');
		$data['entry_mercadolivre_condition'] = $this->language->get('entry_mercadolivre_condition');
		$data['tab_setting'] = $this->language->get('tab_setting');
		$data['tab_listing'] = $this->language->get('tab_listing');
		$data['text_oc_status'] = $this->language->get('text_oc_status');
		$data['text_ml_status'] = $this->language->get('text_ml_status');
		$data['listing_default'] = $this->language->get('listing_default');
		$data['tab_order'] = $this->language->get('tab_order');
		$data['ml_text_category_hint'] = $this->language->get('ml_text_category_hint');
		$data['debug_status'] = $this->language->get('debug_status');
		$data['entry_mercadolivre_template'] = $this->language->get('entry_mercadolivre_template');
		$data['tab_template'] = $this->language->get('tab_template');
		$data['entry_mercadolivre_price_adjustment'] = $this->language->get('entry_mercadolivre_price_adjustment');
		$data['entry_mercadolivre_warranty'] = $this->language->get('entry_mercadolivre_warranty');
		
		$data['lang_auto_feedback'] = $this->language->get('lang_auto_feedback');
		$data['lang_auto_feedback_status'] = $this->language->get('lang_auto_feedback_status');
		$data['lang_feedback_rating'] = $this->language->get('lang_feedback_rating');
		$data['lang_feedback_message'] = $this->language->get('lang_feedback_message');
		
		$data['lang_shipping_alter'] = $this->language->get('lang_shipping_alter');
		
		$data['lang_shipping_me10'] = $this->language->get('lang_shipping_me10');
		$data['lang_shipping_me11'] = $this->language->get('lang_shipping_me11');
		$data['lang_shipping_me20'] = $this->language->get('lang_shipping_me20');
		$data['lang_shipping_me21'] = $this->language->get('lang_shipping_me21');
		$data['lang_shipping_00'] = $this->language->get('lang_shipping_00');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['tab_shipping'] = $this->language->get('tab_shipping');
		$data['lang_shipping_name'] = $this->language->get('lang_shipping_name');
		$data['lang_shipping_cost'] = $this->language->get('lang_shipping_cost');
		$data['order_status_hints'] = $this->language->get('order_status_hints');
		$data['lang_new_user'] = $this->language->get('lang_new_user');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_shipping_method'] = $this->language->get('text_shipping_method');
		$data['text_payment_method'] = $this->language->get('text_payment_method');
		$data['text_add_images_in_desc'] = $this->language->get('text_add_images_in_desc');
		$data['text_order_status_rule'] = $this->language->get('text_order_status_rule');
		$data['text_always_sync'] = $this->language->get('text_always_sync');
		$data['tab_feedback'] = $this->language->get('tab_feedback');
		$data['ml_order_status']=array('confirmed'=>$this->language->get('lang_order_status1'),
                       'payment_required'=>$this->language->get('lang_order_status2'),
                       'payment_in_process'=>$this->language->get('lang_order_status3'),
                       'paid'=>$this->language->get('lang_order_status4'),
                       'cancelled'=>$this->language->get('lang_order_status5'));
                       
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel']        = $this->language->get('button_cancel');
		$data['ml_text_reposting']        = $this->language->get('ml_text_reposting');
		$data['lang_purchase_no']        = $this->language->get('lang_purchase_no');
		$data['text_status_sync']        = $this->language->get('text_status_sync');
		
		$data['text_import_old']        = $this->language->get('text_import_old');
		$data['text_import_all']        = $this->language->get('text_import_all');
		$data['text_import_three_days']        = $this->language->get('text_import_three_days');
		$data['text_import_week_days']        = $this->language->get('text_import_week_days');
		$data['text_import_two_week_days']        = $this->language->get('text_import_two_week_days');
		$data['text_import_one_month']        = $this->language->get('text_import_one_month');
		$data['text_dont_import']        = $this->language->get('text_dont_import');
		$data['text_auto_category']        = $this->language->get('text_auto_category');
		$data['text_default_category_hint']        = $this->language->get('text_default_category_hint');
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
		
		$data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_setting'),
            'href'      => $this->url->link('module/mercadolivre/setting', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
		
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}



 		if (isset($this->error['error_app_id'])) {
			$data['error_app_id'] = $this->error['error_app_id'];
		} else {
			$data['error_app_id'] = '';
		}
		
	
 		if (isset($this->error['error_app_secret'])) {
			$data['error_app_secret'] = $this->error['error_app_secret'];
		} else {
			$data['error_app_secret'] = '';
		}
		
		
		if (isset($this->request->post['mercadolivre_app_id'])) {
			$data['mercadolivre_app_id'] = $this->request->post['mercadolivre_app_id'];
		} else {
			$data['mercadolivre_app_id'] = $this->config->get('mercadolivre_app_id');
		}

        if (isset($this->request->post['mercadolivre_order_no'])) {
			$data['mercadolivre_order_no'] = $this->request->post['mercadolivre_order_no'];
		} else {
			$data['mercadolivre_order_no'] = $this->config->get('mercadolivre_order_no');
		}

		if (isset($this->request->post['mercadolivre_app_secret'])) {
			$data['mercadolivre_app_secret'] = $this->request->post['mercadolivre_app_secret'];
		} else {
			$data['mercadolivre_app_secret'] = $this->config->get('mercadolivre_app_secret');
		}
		
		if (isset($this->request->post['mercadolivre_status'])) {
			$data['mercadolivre_status'] = $this->request->post['mercadolivre_status'];
		} else {
			$data['mercadolivre_status'] = $this->config->get('mercadolivre_status');
		}
		
		if (isset($this->request->post['mercadolivre_debug'])) {
			$data['mercadolivre_debug'] = $this->request->post['mercadolivre_debug'];
		} else {
			$data['mercadolivre_debug'] = $this->config->get('mercadolivre_debug');
		}
		
		if (isset($this->request->post['mercadolivre_new_customer'])) {
			$data['mercadolivre_new_customer'] = $this->request->post['mercadolivre_new_customer'];
		} else {
			$data['mercadolivre_new_customer'] = $this->config->get('mercadolivre_new_customer');
		}
		

		
		if (isset($this->request->post['mercadolivre_shipping'])) {
			$data['mercadolivre_shipping'] = $this->request->post['mercadolivre_shipping'];
		} else {
			$data['mercadolivre_shipping'] = $this->config->get('mercadolivre_shipping');
		}  
		
		if (isset($this->request->post['mercadolivre_payment'])) {
			$data['mercadolivre_payment'] = $this->request->post['mercadolivre_payment'];
		} else {
			$data['mercadolivre_payment'] = $this->config->get('mercadolivre_payment');
		}
		
		if (isset($this->request->post['mercadolivre_image_in_desc'])) {
			$data['mercadolivre_image_in_desc'] = $this->request->post['mercadolivre_image_in_desc'];
		} else {
			$data['mercadolivre_image_in_desc'] = $this->config->get('mercadolivre_image_in_desc');
		}
		   
				
		if (isset($this->request->post['mercadolivre_mercaId'])) {
			$data['mercadolivre_mercaId'] = $this->request->post['mercadolivre_mercaId'];
		} else {
			$data['mercadolivre_mercaId'] = $this->config->get('mercadolivre_mercaId');
		} 
		if (isset($this->request->post['mercadolivre_mercaCurrency'])) {
			$data['mercadolivre_mercaCurrency'] = $this->request->post['mercadolivre_mercaCurrency'];
		} else {
			$data['mercadolivre_mercaCurrency'] = $this->config->get('mercadolivre_mercaCurrency');
		}
		
		if (isset($this->request->post['mercadolivre_mercaBuyMode'])) {
			$data['mercadolivre_mercaBuyMode'] = $this->request->post['mercadolivre_mercaBuyMode'];
		} else  {
			$data['mercadolivre_mercaBuyMode'] =$this->config->get('mercadolivre_mercaBuyMode');
		} 
		
		if (isset($this->request->post['mercadolivre_mercaListType'])) {
			$data['mercadolivre_mercaListType'] = $this->request->post['mercadolivre_mercaListType'];
		} else {
			$data['mercadolivre_mercaListType'] = $this->config->get('mercadolivre_mercaListType');
		} 
		
		if (isset($this->request->post['mercadolivre_mercaCondition'])) {
			$data['mercadolivre_mercaCondition'] = $this->request->post['mercadolivre_mercaCondition'];
		} else {
			$data['mercadolivre_mercaCondition'] = $this->config->get('mercadolivre_mercaCondition');
		}
		
		if (isset($this->request->post['mercadolivre_category_tree'])) {
			$data['mercadolivre_category_tree'] = $this->request->post['mercadolivre_category_tree'];
		} else {
			$data['mercadolivre_category_tree'] = $this->config->get('mercadolivre_category_tree');
		}
		
		if (isset($this->request->post['mercadolivre_shipping_alter'])) {
			$data['mercadolivre_shipping_alter'] = $this->request->post['mercadolivre_shipping_alter'];
		} else {
			$data['mercadolivre_shipping_alter'] = $this->config->get('mercadolivre_shipping_alter');
		}
		
		if (isset($this->request->post['mercadolivre_template'])) {
			$data['mercadolivre_template'] = $this->request->post['mercadolivre_template'];
		} else {
			$data['mercadolivre_template'] = $this->config->get('mercadolivre_template');
		}
		
		if (isset($this->request->post['mercadolivre_mercaPrice'])) {
			$data['mercadolivre_mercaPrice'] = $this->request->post['mercadolivre_mercaPrice'];
		} else {
			$data['mercadolivre_mercaPrice'] = $this->config->get('mercadolivre_mercaPrice');
		}
		
		if (isset($this->request->post['mercadolivre_mercaWarranty'])) {
			$data['mercadolivre_mercaWarranty'] = $this->request->post['mercadolivre_mercaWarranty'];
		} else {
			$data['mercadolivre_mercaWarranty'] = $this->config->get('mercadolivre_mercaWarranty');
		}
		
		if (isset($this->request->post['mercadolivre_reposting'])) {
			$data['mercadolivre_reposting'] = $this->request->post['mercadolivre_reposting'];
		} else {
			$data['mercadolivre_reposting'] = $this->config->get('mercadolivre_reposting');
		}
		
		if (isset($this->request->post['mercadolivre_detect_cat'])) {
			$data['mercadolivre_detect_cat'] = $this->request->post['mercadolivre_detect_cat'];
		} else {
			$data['mercadolivre_detect_cat'] = $this->config->get('mercadolivre_detect_cat');
		}
		
		if (isset($this->request->post['mercadolivre_sync_status'])) {
			$data['mercadolivre_sync_status'] = $this->request->post['mercadolivre_sync_status'];
		} else {
			$data['mercadolivre_sync_status'] = $this->config->get('mercadolivre_sync_status');
		}
		
		
		if (isset($this->request->post['mercadolivre_feedback'])) {
			$data['mercadolivre_feedback'] = $this->request->post['mercadolivre_feedback'];
		} else {
			$data['mercadolivre_feedback'] = $this->config->get('mercadolivre_feedback');
		}
		
	
		if (isset($this->request->post['mercadolivre_feedback_order'])) {
			$data['mercadolivre_feedback_order'] = $this->request->post['mercadolivre_feedback_order'];
		} else {
			$data['mercadolivre_feedback_order'] = $this->config->get('mercadolivre_feedback_order');
		}
		if (isset($this->request->post['mercadolivre_feedback_rating'])) {
			$data['mercadolivre_feedback_rating'] = $this->request->post['mercadolivre_feedback_rating'];
		} else {
			$data['mercadolivre_feedback_rating'] = $this->config->get('mercadolivre_feedback_rating');
		}
		if (isset($this->request->post['mercadolivre_feedback_message'])) {
			$data['mercadolivre_feedback_message'] = $this->request->post['mercadolivre_feedback_message'];
		} else {
			$data['mercadolivre_feedback_message'] = $this->config->get('mercadolivre_feedback_message');
		}
		
		//for custom shipping
		for($i=1;$i<=5;$i++)
		 {
				if (isset($this->request->post['mercadolivre_shipping_name'.$i])) {
					$data['mercadolivre_shipping_name'.$i] = $this->request->post['mercadolivre_shipping_name'.$i];
				} else {
					$data['mercadolivre_shipping_name'.$i] = $this->config->get('mercadolivre_shipping_name'.$i);
				}
				
				if (isset($this->request->post['mercadolivre_shipping_cost'.$i])) {
					$data['mercadolivre_shipping_cost'.$i] = $this->request->post['mercadolivre_shipping_cost'.$i];
				} else {
					$data['mercadolivre_shipping_cost'.$i] = $this->config->get('mercadolivre_shipping_cost'.$i);
				}
		}	
		
		$shipping_mods=array();
		$xshipping_installed=false;
		$result=$this->db->query("select * from " . DB_PREFIX . "extension where type='shipping'");
		if($result->rows){
		  foreach($result->rows as $row){
		     $shipping_mods[$row['code']]=$this->getModuleName($row['code'],$row['type']); 
		  }
		}
		
		$data['shipping_mods'] = $shipping_mods;	
		
		$payment_mods=array();
		$result=$this->db->query("select * from " . DB_PREFIX . "extension where type='payment'");
		if($result->rows){
		  foreach($result->rows as $row){
		     if($this->config->get($row['code'].'_status')){
		       $payment_mods[$row['code']]=$this->getModuleName($row['code'],$row['type']);  
		     }
		  }
		}
		
		$data['payment_mods'] = $payment_mods;	
		
		
		$data['token'] =$this->session->data['token'];
		
		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();	
		$data['merca_statuses'] = $this->model_mercadolivre_mercadolivre->getMercadoStatus();
		
		$data['mercadolivre_cats']=$this->model_mercadolivre_mercadolivre->getMercadoCategoryOption($data['mercadolivre_mercaId']);
		$data['mercadolivre_currency']=$this->model_mercadolivre_mercadolivre->getMercadoCurrency();
		$data['mercadolivre_modes']=$this->model_mercadolivre_mercadolivre->getMercadoMode();
		$data['mercadolivre_types']=$this->model_mercadolivre_mercadolivre->getMercadoType();
		$data['mercadolivre_conditions']=$this->model_mercadolivre_mercadolivre->getMercadoCondition();


		$data['action'] = $this->url->link('module/mercadolivre/setting', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');		
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view('module/mercadolivre/settting.tpl', $data));
    }
	
	public function category(){
	
		if ($this->request->get['catId']) {
		
		  $categories= $this->mercadolivre->getCategory($this->request->get['catId']); 
		  echo json_encode($categories);  
		}		
    }
    
    public function attribute(){
       
       if ($this->request->get['catId']) {
		
		  $attributes= $this->mercadolivre->getAttributes($this->request->get['catId']); 
		  $result=array('html'=>'','row'=>'');
		  if($attributes)$result=$this->mercadolivre->renderAttributes($attributes); 
		  $this->response->setOutput(json_encode(array('html'=>$result['html'],'row'=>$result['row'])));
		}	
    }
	
	public function desynchronize(){
	
		$this->load->model('mercadolivre/mercadolivre');
	    $this->load->language('module/mercadolivre');
		
		if (!empty($this->request->get['product_id'])) {
		
		  $this->model_mercadolivre_mercadolivre->desynchronizeProduct($this->request->get['product_id']);   
		}
		$this->session->data['success'] = $this->language->get('unsyn_done');
		$this->response->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'], 'SSL'));
        
    }
	
	public function synchronize(){
	
		$this->load->model('mercadolivre/mercadolivre');
	    $this->load->language('module/mercadolivre');
		
		if (!empty($this->request->get['product_id'])) {
		
		  $this->model_mercadolivre_mercadolivre->synchronizeProduct($this->request->get['product_id']);   
		}
		$this->session->data['success'] = $this->language->get('syn_done');
		$this->response->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'], 'SSL'));
        
    }
	
	public function bulkSynchronize(){
	
		$this->load->model('mercadolivre/mercadolivre');
	    $this->load->language('module/mercadolivre');
		
		if (isset($this->request->post['selected'])) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->model_mercadolivre_mercadolivre->synchronizeQueue($product_id);
	  		}
	   }		
		
		//$this->session->data['success'] = $this->language->get('syn_done');
		$this->response->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'], 'SSL')); 
    }
    
    public function dispatchBulk(){
	
		$this->load->model('mercadolivre/mercadolivre');
	    $this->load->language('module/mercadolivre');
	    
	    $products = $this->model_mercadolivre_mercadolivre->getProductFromSyncQueue();
		
		if ($products) {
			foreach ($products as $product_single) {
			     if(isset($product_single['product_id']) && $product_single['product_id']) {
			        $this->model_mercadolivre_mercadolivre->synchronizeProduct($product_single['product_id']);   
			        $this->model_mercadolivre_mercadolivre->DeleteSyncQueue($product_single['product_id']);
			     }
	  		}
	    }		
		$json = array();
		$json['total'] = $this->mercadolivre->haveSyncQueue();
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
    }

    public function predictCat(){   
	    
	    $title = isset($this->request->get['title']) ? $this->request->get['title'] : '';

	    $json = array();
		$json['data'] = $this->mercadolivre->getMLCategoryPredict($title);

		/*
		$json['data']['id'] = '234234';
		$json['data']['name'] = 'Iphone';
		$json['data']['mercaTree'] = 'Apple -> Iphone';
		*/

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
    }

    public function saveMLCategory() {   
	    
	    $product_id = isset($this->request->get['product_id']) ? $this->request->get['product_id'] : '';
	    $catId = isset($this->request->get['catId']) ? $this->request->get['catId'] : '';
	    $mercaTree = isset($this->request->get['mercaTree']) ? $this->request->get['mercaTree'] : '';

	    $json = array();
	    $json['success'] = false;

	    if($product_id && $mercaTree && $catId) {
	    	$data = array();
	    	$data['product_id'] = $product_id;
	    	$data['mercaTree'] = $mercaTree;
	    	$data['mercaId'] = $catId;
	    	$this->mercadolivre->setMLCategory($data);
	    	$json['success'] = true;
	    }

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
    }
    
    public function bulkDesynchronize(){
	
		$this->load->model('mercadolivre/mercadolivre');
	    $this->load->language('module/mercadolivre');
		
		if (isset($this->request->post['selected'])) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->model_mercadolivre_mercadolivre->desynchronizeProduct($product_id);   
	  		}
	   }		
		
		$this->session->data['success'] = $this->language->get('unsyn_done');
		$this->response->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'], 'SSL')); 
    }
    
    public function onAddEditProduct($product_id)
	{
	   $data = $this->request->post;
	
	   if (isset($data['mercaId'])) {
			
            if (!isset($data['ml_attr']))$data['ml_attr']=array();
			
			$this->mercadolivre->addMLProductAttribute($data['ml_attr'],$product_id);
			$this->mercadolivre->updateProductMLData($data,$product_id);
			
		}
	}
	
	public function onDeleteProduct($product_id)
	{
	   $this->load->model('mercadolivre/mercadolivre');
	   
	   $mercaInfo=$this->mercadolivre->getMercadolivreIDs($product_id);	
	   if($mercaInfo)
		 {
			$mercaId=$mercaInfo['mercaId'];
	        $this->mercadolivre->delete($mercaId,true);
	     }    
	}
	
	public function onUpdateProduct($product_id)
	{
	   $this->load->model('mercadolivre/mercadolivre');
	   $this->model_mercadolivre_mercadolivre->synchronizeProduct($product_id,true);
	}
    
     public function updateSynStatus(){
		  $order_id=$this->request->get['order_id']; 
		  $stopSyncId=$this->request->get['stopSyncId']; 
		  if($order_id){
			 
			 $this->db->query("UPDATE " . DB_PREFIX . "mercadolivre_order SET stopSync = '" . (int)$stopSyncId . "' WHERE order_id = '" .(int)$order_id . "'");  
		 }
		 echo 'Done';
	 }
	
    
    public function install(){
        $this->load->model('mercadolivre/mercadolivre');
        
        $this->model_mercadolivre_mercadolivre->install();
    }
    
    public function uninstall(){        
        $this->load->model('mercadolivre/mercadolivre');
        
        $this->model_mercadolivre_mercadolivre->uninstall();
    }
    
    public function upgrade(){
       $this->load->language('module/mercadolivre');
	   $this->load->model('mercadolivre/mercadolivre');
       $this->model_mercadolivre_mercadolivre->upgrade();
       $this->session->data['success'] = $this->language->get('upgrade_done');
       $this->response->redirect($this->url->link('module/mercadolivre', 'token=' . $this->session->data['token'], 'SSL'));
	}
	
   protected function validate() {
   
		if (!$this->user->hasPermission('modify', 'module/mercadolivre')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['mercadolivre_app_id']) {
			$this->error['error_app_id'] = $this->language->get('error_app_id');
		}

		if (!$this->request->post['mercadolivre_app_secret']) {
			$this->error['error_app_secret'] = $this->language->get('error_app_secret');
		}

		return !$this->error;	
	}
	
  private function getModuleName($code,$type)
	{
	   if(!$code) return '';
	   
	   $this->language->load($type.'/'.$code);
	   return $this->language->get('heading_title');
	}  
   
}