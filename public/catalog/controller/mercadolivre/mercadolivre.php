<?php
/* Copyright - Copyright (C) 2012 - 2015 opencartmart
 * Website - http://www.opencartmart.com
 * All rights reserved. No part of this module may be reproduced, distributed, or sold in any form or 
 * by any means without the prior written permission of the developer. 
 */
class ControllerMercadolivreMercadolivre extends Controller {

	public function index() {
  
		  $this->language->load('module/mercadolivre');
	      $data['breadcrumbs'] = array();
		
			$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_home'),
				'href'      => $this->url->link('common/home'),
				'separator' => false
			);
		
	
      		$data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('text_title'),
				'href'      => $this->url->link('mercadolivre/mercadolivre'),
        		'separator' => $this->language->get('text_separator')
      		);
				
	  		$this->document->setTitle($this->language->get('text_title'));
			
      		$data['heading_title'] = $this->language->get('text_title');
			$data['text_intro'] = $this->language->get('text_intro');
			$data['text_auth'] = $this->language->get('text_auth');
			$data['text_auth_done'] = $this->language->get('text_auth_done');

      		$data['button_continue'] = $this->language->get('button_continue');

      		$data['continue'] = $this->url->link('common/home');
			
			$data['error']='';
			if(isset($this->request->get['error']))
			{
			    $data['error']='Error: '.$this->request->get['error'].(($this->request->get['error_description'])?' - '.$this->request->get['error_description']:'');
			}
			
			if(isset($this->request->get['code']))
			{
			    $data['error']=$this->mercadolivre->getAccessToken($this->request->get['code']);
			}
			
			
			
			$data['auth_done']=''; 
			if($this->mercadolivre->getAccess())
			{
			   $data['auth_done']='1'; 
			   $data['text_auth'] = $this->language->get('text_reauth');
			}
		    
			$data['login_url']=$this->mercadolivre->getLoginUrl();
			
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
					
	  		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/mercadolivre/auth.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/mercadolivre/auth.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/mercadolivre/auth.tpl', $data));
			}
	  
	}
	
   public function syncat()
   {
     
     $this->mercadolivre->updateCategory();
     $this->mercadolivre->updateListingType();
     
     echo 'Done.';
   }
   
    public function testUser()
    {
      $this->mercadolivre->createTestUser();
    }
	

	public function callback() {
	 
	    $data = file_get_contents('php://input');
		$data=json_decode($data, true);
		
		if($data['topic']=='items')
		{
			$itemId=str_replace('/items/','',$data['resource']);
			$itemId=trim($itemId);
			$this->mercadolivre->updateOpencartProduct($itemId);
		}
		if($data['topic']=='orders')
		{
			$orderId=str_replace('/orders/','',$data['resource']);
			$orderId=trim($orderId);
			$this->mercadolivre->addAPICall($orderId,'order');
			
		}
		
		if($this->config->get('mercadolivre_debug')){
		  $this->log->write('MERCADOLIVRE callback - Type ='.$data['topic'].' Response='.print_r($data,true));
		}
		
		$this->response->addHeader($_SERVER["SERVER_PROTOCOL"]." 200 OK");
		$this->response->setOutput('done');
	}
	
	public function cron() {
	    $this->mercadolivre->processAPIOrder();
		$this->response->setOutput('done');
	}


}

?>