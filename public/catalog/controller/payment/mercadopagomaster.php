<?php
class ControllerPaymentMercadopagomaster extends Controller {

	private $error;
	private $order_info;

	public function index() {
    	$data['button_confirm'] = $this->language->get('button_confirm');
		$data['button_back'] = $this->language->get('button_back');

		if ($this->config->get('mercadopagomaster_country')) {
			$data['action'] = $this->config->get('mercadopagomaster_country');
		}

		$this->load->model('checkout/order');

		$this->load->language('payment/mercadopagomaster');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		//Cambio el código ISO-3 de la moneda por el que se les ocurrio poner a los de mercadopagomaster!!!
		
		 switch($order_info['currency_code']) {
			case"ARS":
				$currency = 'ARS';
				break;
                        case"ARG":
				$currency = 'ARS';
				break;    
                        case"VEF":
				$currency = 'VEF';
				break;  
                        case"BRA":
			case"BRL":
                        case"REA":
				$currency = 'BRL';
				break;
			case"MXN":
				$currency = 'MEX';
				break;
			case"CLP":
				$currency = 'CHI';
				break;
			default:
				$currency = 'USD';
				break;
		}
		$currencies = array('ARS','BRL','MEX','CHI','VEF');
		if (!in_array($currency, $currencies)) {
			$currency = '';
			$data['error'] = $this->language->get('currency_no_support');
		}

		if ($this->request->get['route'] != 'checkout/checkout') {
			$data['url_cancel'] = HTTPS_SERVER . 'index.php?route=checkout/checkout';
		} else {
			$data['url_cancel'] = HTTPS_SERVER . 'index.php?route=checkout/checkout';
		}

		$data['acc_id'] = $this->config->get('mercadopagomaster_acc_id');
		$data['enc'] = $this->config->get('mercadopagomaster_token');
		$data['item_id'] = $this->config->get('config_name') . ' - #' . $order_info['order_id'];
		
		$products = '';
		
		foreach ($this->cart->getProducts() as $product) {
    		$products .= $product['quantity'] . ' x ' . $product['name'] . ' || ';
    	}
		
	
		$data['name'] = substr($products,0,70) . '...';
				$data['currency'] = $currency;
		$data['price'] =  $order_info['total'] * $order_info['currency_value'];  
		$data['url_process'] = $this->url->link('payment/mercadopagomaster/callback', 'order=' . $this->session->data['order_id'], 'SSL');
		$data['url_succesfull'] = $this->url->link('payment/mercadopagomaster/callback', 'order=' . $this->session->data['order_id'], 'SSL');
		$data['seller_op_id'] = str_repeat('0', 20 - strlen($order_info['order_id'])) . $order_info['order_id'];
		
					
		$data['extra_part'] ='';

		if ($this->request->get['route'] != 'checkout/checkout') {
			$data['back'] =  $this->url->link('checkout/checkout', '', 'SSL');
		} else {
			$data['back'] =  $this->url->link('checkout/checkout', '', 'SSL');
		}

		$this->code = 'payment';

		
if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/mercadopagomaster.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/mercadopagomaster.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/mercadopagomaster.tpl', $data);
		}

		$this->render();
	}

	public function callback() {
		
		$this->load->model('checkout/order');
		
		$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('mercadopagomaster_order_status_id'));
		
		$this->response->redirect($this->url->link('checkout/success', '', 'SSL'));
	}
	
}