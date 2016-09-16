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
			
			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$data['entry_nome'] = $this->language->get('entry_nome');
		$data['help_nome'] = $this->language->get('help_nome');
		$data['error_nome'] = $this->language->get('error_nome');
		
		$data['entry_cedente'] = $this->language->get('entry_cedente');
		$data['help_cedente'] = $this->language->get('help_cedente');
		$data['error_cedente'] = $this->language->get('error_cedente');
		
		$data['entry_cpfcnpj'] = $this->language->get('entry_cpfcnpj');
		$data['help_cpfcnpj'] = $this->language->get('help_cpfcnpj');
		$data['error_cpfcnpj'] = $this->language->get('error_cpfcnpj');
		
		$data['entry_endereco'] = $this->language->get('entry_endereco');
		$data['help_endereco'] = $this->language->get('help_endereco');
		$data['error_endereco'] = $this->language->get('error_endereco');
		
		$data['entry_agencia'] = $this->language->get('entry_agencia');
		$data['help_agencia'] = $this->language->get('help_agencia');
		$data['error_agencia'] = $this->language->get('error_agencia');
		
		$data['entry_agenciadg'] = $this->language->get('entry_agenciadg');
		$data['help_agenciadg'] = $this->language->get('help_agenciadg');
		$data['error_agenciadg'] = $this->language->get('error_agenciadg');
		
		$data['entry_conta'] = $this->language->get('entry_conta');
		$data['help_conta'] = $this->language->get('help_conta');
		$data['error_conta'] = $this->language->get('error_conta');
		
		$data['entry_contadg'] = $this->language->get('entry_contadg');
		$data['help_contadg'] = $this->language->get('help_contadg');
		$data['error_contadg'] = $this->language->get('error_contadg');
		
		$data['entry_carteira'] = $this->language->get('entry_carteira');
		$data['help_carteira'] = $this->language->get('help_carteira');
		$data['error_carteira'] = $this->language->get('error_carteira');
		
		$data['entry_taxa'] = $this->language->get('entry_taxa');
		$data['help_taxa'] = $this->language->get('help_taxa');
		
		$data['entry_dias'] = $this->language->get('entry_dias');
		$data['help_dias'] = $this->language->get('help_dias');
		$data['error_dias'] = $this->language->get('error_dias');
		
		$data['entry_demo1'] = $this->language->get('entry_demo1');
		$data['help_demo'] = $this->language->get('help_demo');
		$data['entry_demo2'] = $this->language->get('entry_demo2');
		$data['entry_demo3'] = $this->language->get('entry_demo3');
		
		$data['entry_ins1'] = $this->language->get('entry_ins1');
		$data['help_ins'] = $this->language->get('help_ins');
		$data['entry_ins2'] = $this->language->get('entry_ins2');
		$data['entry_ins3'] = $this->language->get('entry_ins3');
		$data['entry_ins4'] = $this->language->get('entry_ins4');
		
				
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['help_order_status'] = $this->language->get('help_order_status');	
		
		$data['entry_total'] = $this->language->get('entry_total');
		$data['help_total'] = $this->language->get('help_total');
		
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['help_geo_zone'] = $this->language->get('help_geo_zone');
		
		$data['entry_status'] = $this->language->get('entry_status');
		$data['help_status'] = $this->language->get('help_status');
		
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['help_sort_order'] = $this->language->get('help_sort_order');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['nome'])) {
		  $data['error_nome'] = $this->error['nome'];
		} else {
		  $data['error_nome'] = '';
		}
		
		if (isset($this->error['cedente'])) {
		  $data['error_cedente'] = $this->error['cedente'];
		} else {
		  $data['error_cedente'] = '';
		}
		
		if (isset($this->error['cpfcnpj'])) {
		  $data['error_cpfcnpj'] = $this->error['cpfcnpj'];
		} else {
		  $data['error_cpfcnpj'] = '';
		}
		
		if (isset($this->error['endereco'])) {
		  $data['error_endereco'] = $this->error['endereco'];
		} else {
		  $data['error_endereco'] = '';
		}
		
		if (isset($this->error['agencia'])) {
		  $data['error_agencia'] = $this->error['agencia'];
		} else {
		  $data['error_agencia'] = '';
		}
		
		if (isset($this->error['agenciadg'])) {
		  $data['error_agenciadg'] = $this->error['agenciadg'];
		} else {
		  $data['error_agenciadg'] = '';
		}
		
		if (isset($this->error['conta'])) {
		  $data['error_conta'] = $this->error['conta'];
		} else {
		  $data['error_conta'] = '';
		}
		
		if (isset($this->error['contadg'])) {
		  $data['error_contadg'] = $this->error['contadg'];
		} else {
		  $data['error_contadg'] = '';
		}
		
		if (isset($this->error['carteira'])) {
		  $data['carteira'] = $this->error['carteira'];
		} else {
		  $data['error_carteira'] = '';
		}
		
		if (isset($this->error['dias'])) {
		  $data['error_dias'] = $this->error['dias'];
		} else {
		  $data['error_dias'] = '';
		}

  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/bancobradesco', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$data['action'] = $this->url->link('payment/bancobradesco', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');	
		
		if (isset($this->request->post['bancobradesco_nome'])) {
			$data['bancobradesco_nome'] = $this->request->post['bancobradesco_nome'];
		} else {
			$data['bancobradesco_nome'] = $this->config->get('bancobradesco_nome'); 
		}
		
		if (isset($this->request->post['bancobradesco_cedente'])) {
			$data['bancobradesco_cedente'] = $this->request->post['bancobradesco_cedente'];
		} else {
			$data['bancobradesco_cedente'] = $this->config->get('bancobradesco_cedente'); 
		}
		
		if (isset($this->request->post['bancobradesco_cpfcnpj'])) {
			$data['bancobradesco_cpfcnpj'] = $this->request->post['bancobradesco_cpfcnpj'];
		} else {
			$data['bancobradesco_cpfcnpj'] = $this->config->get('bancobradesco_cpfcnpj'); 
		}
		
		if (isset($this->request->post['bancobradesco_endereco'])) {
			$data['bancobradesco_endereco'] = $this->request->post['bancobradesco_endereco'];
		} else {
			$data['bancobradesco_endereco'] = $this->config->get('bancobradesco_endereco'); 
		}
		
		if (isset($this->request->post['bancobradesco_conta'])) {
			$data['bancobradesco_conta'] = $this->request->post['bancobradesco_conta'];
		} else {
			$data['bancobradesco_conta'] = $this->config->get('bancobradesco_conta'); 
		}
		
		if (isset($this->request->post['bancobradesco_agencia'])) {
			$data['bancobradesco_agencia'] = $this->request->post['bancobradesco_agencia'];
		} else {
			$data['bancobradesco_agencia'] = $this->config->get('bancobradesco_agencia'); 
		}
		
		if (isset($this->request->post['bancobradesco_agenciadg'])) {
			$data['bancobradesco_agenciadg'] = $this->request->post['bancobradesco_agenciadg'];
		} else {
			$data['bancobradesco_agenciadg'] = $this->config->get('bancobradesco_agenciadg'); 
		}
		
		if (isset($this->request->post['bancobradesco_contadg'])) {
			$data['bancobradesco_contadg'] = $this->request->post['bancobradesco_contadg'];
		} else {
			$data['bancobradesco_contadg'] = $this->config->get('bancobradesco_contadg'); 
		}
		
		if (isset($this->request->post['bancobradesco_carteira'])) {
			$data['bancobradesco_carteira'] = $this->request->post['bancobradesco_carteira'];
		} else {
			$data['bancobradesco_carteira'] = $this->config->get('bancobradesco_carteira'); 
		}
		
		if (isset($this->request->post['bancobradesco_taxa'])) {
			$data['bancobradesco_taxa'] = $this->request->post['bancobradesco_taxa'];
		} else {
			$data['bancobradesco_taxa'] = $this->config->get('bancobradesco_taxa'); 
		}
		
		if (isset($this->request->post['bancobradesco_dias'])) {
			$data['bancobradesco_dias'] = $this->request->post['bancobradesco_dias'];
		} else {
			$data['bancobradesco_dias'] = $this->config->get('bancobradesco_dias'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo1'])) {
			$data['bancobradesco_demo1'] = $this->request->post['bancobradesco_demo1'];
		} else {
			$data['bancobradesco_demo1'] = $this->config->get('bancobradesco_demo1'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo2'])) {
			$data['bancobradesco_demo2'] = $this->request->post['bancobradesco_demo2'];
		} else {
			$data['bancobradesco_demo2'] = $this->config->get('bancobradesco_demo2'); 
		}
		
		if (isset($this->request->post['bancobradesco_demo3'])) {
			$data['bancobradesco_demo3'] = $this->request->post['bancobradesco_demo3'];
		} else {
			$data['bancobradesco_demo3'] = $this->config->get('bancobradesco_demo3'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins1'])) {
			$data['bancobradesco_ins1'] = $this->request->post['bancobradesco_ins1'];
		} else {
			$data['bancobradesco_ins1'] = $this->config->get('bancobradesco_ins1'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins2'])) {
			$data['bancobradesco_ins2'] = $this->request->post['bancobradesco_ins2'];
		} else {
			$data['bancobradesco_ins2'] = $this->config->get('bancobradesco_ins2'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins3'])) {
			$data['bancobradesco_ins3'] = $this->request->post['bancobradesco_ins3'];
		} else {
			$data['bancobradesco_ins3'] = $this->config->get('bancobradesco_ins3'); 
		}
		
		if (isset($this->request->post['bancobradesco_ins4'])) {
			$data['bancobradesco_ins4'] = $this->request->post['bancobradesco_ins4'];
		} else {
			$data['bancobradesco_ins4'] = $this->config->get('bancobradesco_ins4'); 
		}
		
		if (isset($this->request->post['bancobradesco_total'])) {
			$data['bancobradesco_total'] = $this->request->post['bancobradesco_total'];
		} else {
			$data['bancobradesco_total'] = $this->config->get('bancobradesco_total'); 
		}
				
		if (isset($this->request->post['bancobradesco_order_status_id'])) {
			$data['bancobradesco_order_status_id'] = $this->request->post['bancobradesco_order_status_id'];
		} else {
			$data['bancobradesco_order_status_id'] = $this->config->get('bancobradesco_order_status_id'); 
		} 
		
		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['bancobradesco_geo_zone_id'])) {
			$data['bancobradesco_geo_zone_id'] = $this->request->post['bancobradesco_geo_zone_id'];
		} else {
			$data['bancobradesco_geo_zone_id'] = $this->config->get('bancobradesco_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');						
		
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['bancobradesco_status'])) {
			$data['bancobradesco_status'] = $this->request->post['bancobradesco_status'];
		} else {
			$data['bancobradesco_status'] = $this->config->get('bancobradesco_status');
		}
		
		if (isset($this->request->post['bancobradesco_sort_order'])) {
			$data['bancobradesco_sort_order'] = $this->request->post['bancobradesco_sort_order'];
		} else {
			$data['bancobradesco_sort_order'] = $this->config->get('bancobradesco_sort_order');
		}
		
		//layout
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/bancobradesco.tpl', $data));
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/bancobradesco')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['bancobradesco_nome']) {
		  $this->error['nome'] = $this->language->get('error_nome');
		}
		
		if (!$this->request->post['bancobradesco_cedente']) {
		  $this->error['cedente'] = $this->language->get('error_cedente');
		}
		
		if (!$this->request->post['bancobradesco_cpfcnpj']) {
		  $this->error['cpfcnpj'] = $this->language->get('error_cpfcnpj');
		}
		
		if (!$this->request->post['bancobradesco_endereco']) {
		  $this->error['endereco'] = $this->language->get('error_endereco');
		}
		
		if (!$this->request->post['bancobradesco_agencia']) {
		  $this->error['agencia'] = $this->language->get('error_agencia');
		}
		
		if (!$this->request->post['bancobradesco_agenciadg']) {
		  $this->error['agenciadg'] = $this->language->get('error_agenciadg');
		}
		
		if (!$this->request->post['bancobradesco_conta']) {
		  $this->error['conta'] = $this->language->get('error_conta');
		}
		
		if (!$this->request->post['bancobradesco_contadg']) {
		  $this->error['contadg'] = $this->language->get('error_contadg');
		}
		
		if (!$this->request->post['bancobradesco_carteira']) {
		  $this->error['carteira'] = $this->language->get('error_carteira');
		}
		
		if (!$this->request->post['bancobradesco_dias']) {
		  $this->error['dias'] = $this->language->get('error_dias');
		}

		return !$this->error;
	}
}
?>