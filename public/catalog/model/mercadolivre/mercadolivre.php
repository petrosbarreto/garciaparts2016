<?php
/* Copyright - Copyright (C) 2012 - 2015 opencartmart
 * Website - http://www.opencartmart.com
 * All rights reserved. No part of this module may be reproduced, distributed, or sold in any form or 
 * by any means without the prior written permission of the developer. 
 */
class ModelMercadolivreMercadolivre extends Model
{   

    public function desynchronizeProduct($product_id)
	{
	   $product_info=$this->db->query("SELECT * FROM " . DB_PREFIX . "mercadolivre_product WHERE product_id = '" . (int) $product_id. "'")->row; 
	   
	   if($product_info){
		   $this->mercadolivre->delete($product_info['mercaId']);
	   	   $this->db->query("DELETE FROM " . DB_PREFIX . "mercadolivre_product WHERE product_id = '" . (int) $product_id. "'");
		    
	   }
	   return true; 
	}
	
	public function synchronizeProduct($product_id, $updateOnly=false)
	{
	   if(empty($product_id)) return false;
	   
	   $this->load->model('catalog/product');
	   
	   $product=$this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'")->row;
	   if(!$product) return false;
	   
	   $product_images = $this->model_catalog_product->getProductImages($product_id); 
	   
	   $lang_code=$this->config->get('config_language');
	   $language_id=$this->db->query("select language_id from `".DB_PREFIX."language` where code='$lang_code'")->row['language_id'];
	   
	  
	   
	   if(empty($product['mercaId']))$product['mercaId']=$this->config->get('mercadolivre_mercaId');
	   if(empty($product['mercaCurrency']))$product['mercaCurrency']=$this->config->get('mercadolivre_mercaCurrency');
	   if(empty($product['mercaBuyMode']))$product['mercaBuyMode']=$this->config->get('mercadolivre_mercaBuyMode');
	   if(empty($product['mercaListType']))$product['mercaListType']=$this->config->get('mercadolivre_mercaListType');
	   if(empty($product['mercaCondition']))$product['mercaCondition']=$this->config->get('mercadolivre_mercaCondition');
	   if(empty($product['mercaWarranty']))$product['mercaWarranty']=$this->config->get('mercadolivre_mercaWarranty');
	   
	   
	   $mercadolivre_template=$this->config->get('mercadolivre_template');
	   $mercadolivre_mercaPrice=$this->config->get('mercadolivre_mercaPrice');
	   
	  
	   $added_images=array();
	   $list_images=array();
	   if ($product['image']) {
	      $list_images[]=array('source'=>$this->url_encode(HTTP_SERVER.'image/'.$product['image']));
		  $added_images[]=$product['image'];
	   }
	   
	   foreach ($product_images as $product_image) {
		  if(!in_array($product_image['image'],$added_images)){ 
		   $list_images[]=array('source'=>$this->url_encode(HTTP_SERVER.'image/'.$product_image['image']));
		   $added_images[]=$product_image['image'];
		  }
	   }
	   
	   
	
	   
	   /*fix special price issue*/
	   $customer_group_id = $this->config->get('config_customer_group_id');
	   $special_row=$this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = '".$product_id."' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC, price ASC LIMIT 1")->row;
	   if ($special_row && (float)$special_row['price']) {
				$product['price'] = $special_row['price'];
	    }
	   
	    /*Adjust price for ML*/
	    if(trim($mercadolivre_mercaPrice)){
	      if(substr(trim($mercadolivre_mercaPrice), -1)=='%'){
				     $percent=rtrim(trim($mercadolivre_mercaPrice),'%'); 
				     $adjust_price=(float)(($percent*$product['price'])/100);
				   }else{
				     $adjust_price=(float)$mercadolivre_mercaPrice;  
		    }
		   if($adjust_price){
		     $product['price']+=$adjust_price;
		   }  
		}   	
		
	  $mercaInfo=$this->mercadolivre->getMercadolivreIDs($product_id);	
	  
	  if($mercaInfo && $mercaInfo['status']=='closed'){
		  return false;  
	  }
		
	  /* Product ML Attributes */
	   $product_attributes=array();
	   
	   $combinations=$this->mercadolivre->getMLProductAttribute($product_id);
	   
	   if(is_array($combinations) && $combinations){
	           
	           foreach($combinations as $index=>$combination){
	               
				    $attr_image=array();
					
				    $quantity=(int)$combination['quantity']; 
	               $picture=$combination['picture'];
				    $price=($combination['price'])?$combination['price']:$product['price'];   
	               
	               if ($picture) {
	                  $attr_image[]=$this->url_encode(HTTP_SERVER.'image/'.$picture); 
					    
						if(!in_array($picture,$added_images)){ 
						   $list_images[]=array('source'=>$this->url_encode(HTTP_SERVER.'image/'.$picture));
						   $added_images[]=$picture;
						  }
						
	               }else{
	                  
	                  if ($product['image']) {
	                    $attr_image[]=$this->url_encode(HTTP_SERVER.'image/'.$product['image']); 
	                  }
	               }
				   
	               $attribute_combinations=array();
	               foreach($combination['attributes'] as $attributeId=>$attributeValueId){ 
				   
	                        if($attributeId && $attributeValueId){
	                          $attribute_combinations[]=array('id'=>(string)$attributeId,'value_id'=>$attributeValueId);
	                        } 
	                }
	                 
	               
	               if($attribute_combinations){
					   
						if($combination['mercaId'] && $mercaInfo){
						  
						  $product_attributes[]=array(
						   'id'=>(float)$combination['mercaId'],
						   'available_quantity'=>(int)$quantity,
						   'price'=>(float)$this->currency->format($price, $product['mercaCurrency'], false, false)
						  );
						  	
					    }else { 
						  $product_attributes[]=array(
						   'attribute_combinations'=>$attribute_combinations,
						   'available_quantity'=>(int)$quantity,
						   'price'=>$this->currency->format($price, $product['mercaCurrency'], false, false),
						   'picture_ids'=>$attr_image
						  );
						}
	               }
	           }
	       }
	   
	  /* end ML attribute*/  
	  
	     /* Add image in proudct description if set to yes*/
		 
		 if($this->config->get('mercadolivre_image_in_desc')){
			  foreach($list_images as $single_img){
				 $product['description'].='<img src="'.$single_img['source'].'" border="0" /><br />';  
			  } 
		 }  
	  
	    /* Product template*/
	    
	    if(strpos($mercadolivre_template,'__CONTENT__')!==false){
	      $product['description']=str_replace('__CONTENT__',$product['description'],$mercadolivre_template);
	    }
	       
	   
	      
		  
		  /* Trim product title if it is greater than 60*/
		  if(strlen($product['name'])>60){
			 $product['name']=substr($product['name'],0,60);  
		  }
		  
		  
		
		  if($mercaInfo)
				{
				     $mercaId=$mercaInfo['mercaId'];
					  $param=array();
				     $param['title']=$product['name'];
					  $param['pictures']=$list_images;
					 
					 if($product_attributes){
				       $param['variations']=$product_attributes;
				     }else{
						 $param['price']=$this->currency->format($product['price'], $product['mercaCurrency'], false, false); 
					     $param['available_quantity']=(int)$product['quantity']; // if attribute exist, then main quantity is not updatable	 
				     }
					 
				    
				    $this->mercadolivre->updateProduct($param,$mercaId);
					if($this->mercadolivre->error==''){
					  $this->mercadolivre->updateMLAttributeIDs($mercaId,$product_id);
					}
				}
				elseif($updateOnly===false)
				{  
				   $param=array();
				   $param['title']=$product['name'];
				   $param['category_id']=$product['mercaId'];
				   $param['price']=$this->currency->format($product['price'], $product['mercaCurrency'], false, false);
				   $param['currency_id']=$product['mercaCurrency'];
				   $param['available_quantity']=(int)$product['quantity'];
				   $param['buying_mode']=$product['mercaBuyMode'];
				   $param['listing_type_id']=$product['mercaListType'];
				   $param['condition']=$product['mercaCondition'];
				   $param['description']=html_entity_decode($product['description']);
				   $param['pictures']=$list_images;
				   if($product_attributes){
				     $param['variations']=$product_attributes;
				   }
				   
				   if($product['mercaWarranty']){
				     $param['warranty']=$product['mercaWarranty'];
				   }
				   
				  if($product['mercaVideoId']){
				     $param['video_id']=$product['mercaVideoId'];
				   }
				   
				   $shipping_costs=$this->getCustomShipping();
				   
				   if( $shipping_costs ) {
				   
				     if( $this->mercadolivre->isShippingAllowed($product['mercaId']) ) {
				        
				        $shipping=array();
				     	$shipping['mode']='custom';
				     	$shipping['methods']=array();
				     	$shipping['costs']=$shipping_costs;
				     	$param['shipping']=$shipping;
				     
				     } else {
				        
				        $mercadolivre_shipping_alter = $this->config->get('mercadolivre_shipping_alter');  
				        
				        if ($mercadolivre_shipping_alter == 'me10' && $product['length'] && $product['width'] && $product['height'] && $product['weight']) {
				           
				           $shipping=array();
				     	   $shipping['mode']='me1';
				     	   $shipping['local_pick_up']=false;
				     	   $shipping['dimensions']= (int)$product['length']."x".(int)$product['width']."x".(int)$product['height'].",".(int)$product['weight'];
				     	   $param['shipping']=$shipping;
				        }
				        
				        if ($mercadolivre_shipping_alter == 'me11' && $product['length'] && $product['width'] && $product['height'] && $product['weight']) {
				          
				           $shipping=array();
				     	   $shipping['mode']='me1';
				     	   $shipping['local_pick_up']=true;
				     	   $shipping['dimensions']= (int)$product['length']."x".(int)$product['width']."x".(int)$product['height'].",".(int)$product['weight'];
				     	   $param['shipping']=$shipping;
				        
				        }
				        
				        if ($mercadolivre_shipping_alter == 'me20' && $product['length'] && $product['width'] && $product['height'] && $product['weight']) {
				        
				           $shipping=array();
				     	   $shipping['mode']='me2';
				     	   $shipping['local_pick_up']=false;
				     	   $shipping['dimensions']= (int)$product['length']."x".(int)$product['width']."x".(int)$product['height'].",".(int)$product['weight'];
				     	   $param['shipping']=$shipping;
				           
				        }
				        
				        if ($mercadolivre_shipping_alter == 'me21' && $product['length'] && $product['width'] && $product['height'] && $product['weight']) {
				           
				           $shipping=array();
				     	   $shipping['mode']='me2';
				     	   $shipping['local_pick_up']=true;
				     	   $shipping['dimensions']= (int)$product['length']."x".(int)$product['width']."x".(int)$product['height'].",".(int)$product['weight'];
				     	   $param['shipping']=$shipping;
				        }
				     
				    }
				   }
				   
				   //$this->mercadolivre->dump=true;
				      
				   $mercaId=$this->mercadolivre->addProduct($param);
				  
				   if(!empty($mercaId))
				   {
				     $option='';
				     $this->db->query("INSERT INTO " . DB_PREFIX . "mercadolivre_product SET product_id = '" . (int) $product_id. "', `mercaId` = '" . $this->db->escape($mercaId) . "'");  
					  $this->mercadolivre->updateMLAttributeIDs($mercaId,$product_id);
				   }
				   
			}
	  
	  if($this->mercadolivre->error!='')
	  {
	    $this->session->data['error_warning'] ='API Error:'.$this->mercadolivre->error;
	  }
	   
	}
	
	public function getCustomShipping(){
	   $shipping_costs=array();
	   for($i=1;$i<=5;$i++)
			{
				
				if($this->config->get('mercadolivre_shipping_name'.$i)) {
				   $shipping_costs[]=array('description'=>$this->config->get('mercadolivre_shipping_name'.$i),'cost'=>(float)$this->config->get('mercadolivre_shipping_cost'.$i));
				}
		    }		
	   return $shipping_costs;
	}
	
	

	public function url_encode($url) {
		$url=str_replace('https','http',$url);
		$reserved = array(
			":" => '!%3A!ui',
			"/" => '!%2F!ui',
			"?" => '!%3F!ui',
			"#" => '!%23!ui',
			"[" => '!%5B!ui',
			"]" => '!%5D!ui',
			"@" => '!%40!ui',
			"!" => '!%21!ui',
			"$" => '!%24!ui',
			"&" => '!%26!ui',
			"'" => '!%27!ui',
			"(" => '!%28!ui',
			")" => '!%29!ui',
			"*" => '!%2A!ui',
			"+" => '!%2B!ui',
			"," => '!%2C!ui',
			";" => '!%3B!ui',
			"=" => '!%3D!ui',
			"%" => '!%25!ui',
		);
	
	   $url = rawurlencode($url);
	   $url = preg_replace(array_values($reserved), array_keys($reserved), $url);
	   return $url;
	}

}