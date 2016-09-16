<?php
class ControllerPaymentMercadopagomaster extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/mercadopagomaster');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('mercadopagomaster', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
	    $data['text_edit'] = $this->language->get('text_edit');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_mercadopagomaster'] = $this->language->get('text_mercadopagomaster');
		
		$data['entry_acc_id'] = $this->language->get('entry_acc_id');
		$data['entry_token'] = $this->language->get('entry_token');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_sonda_key'] = $this->language->get('entry_sonda_key');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_ipn_status'] = $this->language->get('entry_ipn_status');
		$data['entry_order_status_completed'] = $this->language->get('entry_order_status_completed');
		$data['entry_order_status_pending'] = $this->language->get('entry_order_status_pending');
		$data['entry_order_status_canceled'] = $this->language->get('entry_order_status_canceled');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

 		if (isset($this->error['acc_id'])) {
			$data['error_acc_id'] = $this->error['acc_id'];
		} else {
			$data['error_acc_id'] = '';
		}

 		if (isset($this->error['token'])) {
			$data['error_token'] = $this->error['token'];
		} else {
			$data['error_token'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/mercadopagomaster', 'token=' . $this->session->data['token'], 'SSL')
		);		
		
		$data['action'] = $this->url->link('payment/mercadopagomaster', 'token=' . $this->session->data['token'], 'SSL');
			
		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');
		
		

		if (isset($this->request->post['mercadopagomaster_acc_id'])) {
			$data['mercadopagomaster_acc_id'] = $this->request->post['mercadopagomaster_acc_id'];
		} else {
			$data['mercadopagomaster_acc_id'] = $this->config->get('mercadopagomaster_acc_id');
		}

		if (isset($this->request->post['mercadopagomaster_token'])) {
			$data['mercadopagomaster_token'] = $this->request->post['mercadopagomaster_token'];
		} else {
			$data['mercadopagomaster_token'] = $this->config->get('mercadopagomaster_token');
		}

		if (isset($this->request->post['mercadopagomaster_status'])) {
			$data['mercadopagomaster_status'] = $this->request->post['mercadopagomaster_status'];
		} else {
			$data['mercadopagomaster_status'] = $this->config->get('mercadopagomaster_status');
		}

		$data['countries'] = $this->getCountries();
		
		if (isset($this->request->post['mercadopagomaster_country'])) {
			$data['mercadopagomaster_country'] = $this->request->post['mercadopagomaster_country'];
		} else {
			$data['mercadopagomaster_country'] = $this->config->get('mercadopagomaster_country');
		}

		if (isset($this->request->post['mercadopagomaster_order_status_id'])) {
			$data['mercadopagomaster_order_status_id'] = $this->request->post['mercadopagomaster_order_status_id'];
		} else {
			$data['mercadopagomaster_order_status_id'] = $this->config->get('mercadopagomaster_order_status_id');
		}

		if (isset($this->request->post['mercadopagomaster_geo_zone_id'])) {
			$data['mercadopagomaster_geo_zone_id'] = $this->request->post['mercadopagomaster_geo_zone_id'];
		} else {
			$data['mercadopagomaster_geo_zone_id'] = $this->config->get('mercadopagomaster_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['mercadopagomaster_sort_order'])) {
			$data['mercadopagomaster_sort_order'] = $this->request->post['mercadopagomaster_sort_order'];
		} else {
			$data['mercadopagomaster_sort_order'] = $this->config->get('mercadopagomaster_sort_order');
		}

		if (isset($this->request->post['mercadopagomaster_sonda_key'])) {
			$data['mercadopagomaster_sonda_key'] = $this->request->post['mercadopagomaster_sonda_key'];
		} else {
			$data['mercadopagomaster_sonda_key'] = $this->config->get('mercadopagomaster_sonda_key');
		}

		if (isset($this->request->post['mercadopagomaster_order_status_id_completed'])) {
			$data['mercadopagomaster_order_status_id_completed'] = $this->request->post['mercadopagomaster_order_status_id_completed'];
		} else {
			$data['mercadopagomaster_order_status_id_completed'] = $this->config->get('mercadopagomaster_order_status_id_completed');
		}

		if (isset($this->request->post['mercadopagomaster_order_status_id_pending'])) {
			$data['mercadopagomaster_order_status_id_pending'] = $this->request->post['mercadopagomaster_order_status_id_pending'];
		} else {
			$data['mercadopagomaster_order_status_id_pending'] = $this->config->get('mercadopagomaster_order_status_id_pending');
		}

		if (isset($this->request->post['mercadopagomaster_order_status_id_canceled'])) {
			$data['mercadopagomaster_order_status_id_canceled'] = $this->request->post['mercadopagomaster_order_status_id_canceled'];
		} else {
			$data['mercadopagomaster_order_status_id_canceled'] = $this->config->get('mercadopagomaster_order_status_id_canceled');
		}
		
		if (isset($this->request->post['mercadopagomaster_ipn_status'])) {
			$data['mercadopagomaster_ipn_status'] = $this->request->post['mercadopagomaster_ipn_status'];
		} else {
			$data['mercadopagomaster_ipn_status'] = $this->config->get('mercadopagomaster_ipn_status');
		}
		
		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['mercadopagomaster_geo_zone_id'])) {
		  $data['maercadopago_geo_zone_id'] = $this->request->post['mercadopagomaster_geo_zone_id'];
		} else {
		  $data['mercadopagomaster_geo_zone_id'] = $this->config->get('mercadopagomaster_geo_zone_id'); 
		} 
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/mercadopagomaster.tpl', $data));
	}

	private function getCountries() {
 		$countries = array();

   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mla/buybutton',
       		'name'      => $this->language->get('text_argentina'),
			'id'		=> '1'
   		);

   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlb/buybutton',
       		'name'      => $this->language->get('text_brasil'),
			'id'		=> '2'
   		);
		
   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mco/buybutton',
       		'name'      => $this->language->get('text_colombia'),
			'id'		=> '3'
   		);
		
   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlc/buybutton',
       		'name'      => $this->language->get('text_chile'),
			'id'		=> '4'
   		);

		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlv/buybutton',
       		'name'      => $this->language->get('text_venezuela'),
			'id'		=> '5'
   		);
		
		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlm/buybutton',
       		'name'      => $this->language->get('text_mexico'),
			'id'		=> '6'
   		);
		return $countries;
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/mercadopagomaster')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['mercadopagomaster_acc_id']) {
			$this->error['acc_id'] = $this->language->get('error_acc_id');
		}

		if (!$this->request->post['mercadopagomaster_token']) {
			$this->error['token'] = $this->language->get('error_token');
		}

	return !$this->error;	
	}
	
}