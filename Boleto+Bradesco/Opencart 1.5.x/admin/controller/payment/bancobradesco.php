<?php
/**
 * Boleto Banco Bradesco
 * 
 * Desenvolvedor: Rogerio Alan Dobler
 *
 * Contato: rogerioalandobler@hotmail.com 
 */ 
class ControllerPaymentBancoBradesco extends Controller {
	private $error = array(); 
	 
	public function index() { 
		$this->language->load('payment/bancobradesco');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('bancobradesco', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$this->data['entry_nome'] = $this->language->get('entry_nome');
		$this->data['entry_cedente'] = $this->language->get('entry_cedente');
		$this->data['entry_cpfcnpj'] = $this->language->get('entry_cpfcnpj');
		$this->data['entry_endereco'] = $this->language->get('entry_endereco');
		$this->data['entry_agencia'] = $this->language->get('entry_agencia');
		$this->data['entry_conta'] = $this->language->get('entry_conta');
		$this->data['entry_carteira'] = $this->language->get('entry_carteira');
		$this->data['entry_taxa'] = $this->language->get('entry_taxa');
		$this->data['entry_dias'] = $this->language->get('entry_dias');
		$this->data['entry_demo1'] = $this->language->get('entry_demo1');
		$this->data['entry_demo2'] = $this->language->get('entry_demo2');
		$this->data['entry_demo3'] = $this->language->get('entry_demo3');
		$this->data['entry_ins1'] = $this->language->get('entry_ins1');
		$this->data['entry_ins2'] = $this->language->get('entry_ins2');
		$this->data['entry_ins3'] = $this->language->get('entry_ins3');
		$this->data['entry_ins4'] = $this->language->get('entry_ins4');
		
		$this->data['entry_config'] = $this->language->get('entry_config');
		$this->data['entry_about'] = $this->language->get('entry_about');
		$this->data['entry_about_name'] = $this->language->get('entry_about_name');
		$this->data['entry_about_name_description'] = $this->language->get('entry_about_name_description');
		$this->data['entry_about_version'] = $this->language->get('entry_about_version');
		$this->data['entry_about_version_description'] = $this->language->get('entry_about_version_description');
		$this->data['entry_about_author'] = $this->language->get('entry_about_author');
		$this->data['entry_about_author_description'] = $this->language->get('entry_about_author_description');
		$this->data['entry_about_support'] = $this->language->get('entry_about_support');
		$this->data['entry_about_support_description'] = $this->language->get('entry_about_support_description');
		$this->data['entry_about_support_ped'] = $this->language->get('entry_about_support_ped');
		$this->data['entry_about_support_ped_description'] = $this->language->get('entry_about_support_ped_description');
		
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');		
		$this->data['entry_total'] = $this->language->get('entry_total');	
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/bancobradesco', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('payment/bancobradesco', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');	
		
		if (isset($this->request->post['bancobradesco_nome'])) {
			$this->data['bancobradesco_nome'] = $this->request->post['bancobradesco_nome'];
		} else {
			$this->data['bancobradesco_nome'] = $this->config->get('bancobradesco_nome'); 
		}
		
		if (isset($this->request->post['bancobradesco_cedente'])) {
			$this->data['bancobradesco_cedente'] = $this->request->post['bancobradesco_cedente'];
		} else {
			$this->data['bancobradesco_cedente'] = $this->config->get('bancobradesco_cedente'); 
		}
		
		if (isset($this->request->post['bancobradesco_cpfcnpj'])) {
			$this->data['bancobradesco_cpfcnpj'] = $this->request->post['bancobradesco_cpfcnpj'];
		} else {
			$this->data['bancobradesco_cpfcnpj'] = $this->config->get('bancobradesco_cpfcnpj'); 
		}
		
		if (isset($this->request->post['bancobradesco_endereco'])) {
			$this->data['bancobradesco_endereco'] = $this->request->post['bancobradesco_endereco'];
		} else {
			$this->data['bancobradesco_endereco'] = $this->config->get('bancobradesco_endereco'); 
		}
		
		if (isset($this->request->post['bancobradesco_conta'])) {
			$this->data['bancobradesco_conta'] = $this->request->post['bancobradesco_conta'];
		} else {
			$this->data['bancobradesco_conta'] = $this->config->get('bancobradesco_conta'); 
		}
		
		if (isset($this->request->post['bancobradesco_contadg'])) {
			$this->data['bancobradesco_contadg'] = $this->request->post['bancobradesco_contadg'];
		} else {
			$this->data['bancobradesco_contadg'] = $this->config->get('bancobradesco_contadg'); 
		}
		
		if (isset($this->request->post['bancobradesco_agencia'])) {
			$this->data['bancobradesco_agencia'] = $this->request->post['bancobradesco_agencia'];
		} else {
			$this->data['bancobradesco_agencia'] = $this->config->get('bancobradesco_agencia'); 
		}
		
		if (isset($this->request->post['bancobradesco_agenciadg'])) {
			$this->data['bancobradesco_agenciadg'] = $this->request->post['bancobradesco_agenciadg'];
		} else {
			$this->data['bancobradesco_agenciadg'] = $this->config->get('bancobradesco_agenciadg'); 
		}
		
		if (isset($this->request->post['bancobradesco_carteira'])) {
			$this->data['bancobradesco_carteira'] = $this->request->post['bancobradesco_carteira'];
		} else {
			$this->data['bancobradesco_carteira'] = $this->config->get('bancobradesco_carteira'); 
		}
		
		if (isset($this->request->post['bancobradesco_taxa'])) {
			$this->data['bancobradesco_taxa'] = $this->request->post['bancobradesco_taxa'];
		} else {
			$this->data['bancobradesco_taxa'] = $this->config->get('bancobradesco_taxa'); 
		}
		
		if (isset($this->request->post['bancobradesco_dias'])) {
			$this->data['bancobradesco_dias'] = $this->request->post['bancobradesco_dias'];
		} else {
			$this->data['bancobradesco_dias'] = $this->config->get('bancobradesco_dias'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo1'])) {
			$this->data['bancobradesco_demo1'] = $this->request->post['bancobradesco_demo1'];
		} else {
			$this->data['bancobradesco_demo1'] = $this->config->get('bancobradesco_demo1'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo2'])) {
			$this->data['bancobradesco_demo2'] = $this->request->post['bancobradesco_demo2'];
		} else {
			$this->data['bancobradesco_demo2'] = $this->config->get('bancobradesco_demo2'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo3'])) {
			$this->data['bancobradesco_demo3'] = $this->request->post['bancobradesco_demo3'];
		} else {
			$this->data['bancobradesco_demo3'] = $this->config->get('bancobradesco_demo3'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins1'])) {
			$this->data['bancobradesco_ins1'] = $this->request->post['bancobradesco_ins1'];
		} else {
			$this->data['bancobradesco_ins1'] = $this->config->get('bancobradesco_ins1'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins2'])) {
			$this->data['bancobradesco_ins2'] = $this->request->post['bancobradesco_ins2'];
		} else {
			$this->data['bancobradesco_ins2'] = $this->config->get('bancobradesco_ins2'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins3'])) {
			$this->data['bancobradesco_ins3'] = $this->request->post['bancobradesco_ins3'];
		} else {
			$this->data['bancobradesco_ins3'] = $this->config->get('bancobradesco_ins3'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins4'])) {
			$this->data['bancobradesco_ins4'] = $this->request->post['bancobradesco_ins4'];
		} else {
			$this->data['bancobradesco_ins4'] = $this->config->get('bancobradesco_ins4'); 
		}
		
		if (isset($this->request->post['bancobradesco_total'])) {
			$this->data['bancobradesco_total'] = $this->request->post['bancobradesco_total'];
		} else {
			$this->data['bancobradesco_total'] = $this->config->get('bancobradesco_total'); 
		}
				
		if (isset($this->request->post['bancobradesco_order_status_id'])) {
			$this->data['bancobradesco_order_status_id'] = $this->request->post['bancobradesco_order_status_id'];
		} else {
			$this->data['bancobradesco_order_status_id'] = $this->config->get('bancobradesco_order_status_id'); 
		} 
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['bancobradesco_geo_zone_id'])) {
			$this->data['bancobradesco_geo_zone_id'] = $this->request->post['bancobradesco_geo_zone_id'];
		} else {
			$this->data['bancobradesco_geo_zone_id'] = $this->config->get('bancobradesco_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');						
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['bancobradesco_status'])) {
			$this->data['bancobradesco_status'] = $this->request->post['bancobradesco_status'];
		} else {
			$this->data['bancobradesco_status'] = $this->config->get('bancobradesco_status');
		}
		
		if (isset($this->request->post['bancobradesco_sort_order'])) {
			$this->data['bancobradesco_sort_order'] = $this->request->post['bancobradesco_sort_order'];
		} else {
			$this->data['bancobradesco_sort_order'] = $this->config->get('bancobradesco_sort_order');
		}

		$this->template = 'payment/bancobradesco.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	protected function validate() {
		return true;	
	}
}
?>