<?php
class ControllerPaymentBancoBradesco extends Controller {
	
	public function index() {
	
    	$data['button_confirm'] = $this->language->get('button_confirm');
		$data['continue'] = $this->url->link('checkout/success');
		$data['pedido'] = $this->session->data['order_id'];
		
		$data['url_boleto'] = $this->url->link('payment/bancobradesco/gerarboleto&pedido='.$this->session->data['order_id'].'');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/bancobradesco.tpl')) {
			$template = $this->config->get('config_template') . '/template/payment/bancobradesco.tpl';
		} else {
			$template = 'default/template/payment/bancobradesco.tpl';
		}	
		
		//layout
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		return $this->load->view($template, $data);
	}
	
	public function gerarboleto(){
	
	//Pega o numero do pedido e obriga o cliente a fazer login para ver o boleto
	if(isset($_GET['pedido']) && $_GET['pedido']>0){
	$numero_do_pedido = (int)$_GET['pedido'];
	}else{
	//Caso não encontre o pedido
	echo "O pedido n&atilde;o foi encontrado ou &eacute; invalido!<br><br>Entre em contato com a administa&ccedil;&atilde;o da loja.";
	exit;
	}
	$this->load->model('account/customer');
	if (!$this->customer->isLogged()) {  
      		$this->response->redirect($this->url->link('account/login', '', 'SSL'));
    }
	
	//Pucha os dados do cliente
	$this->load->model('checkout/order');
	$pedido = $this->model_checkout_order->getOrder($numero_do_pedido);
	$pedidoId = $pedido['order_id'];
	
	//Coloca a logo da loja no boleto
	$dadosboleto["logo"] = $this->config->get('config_logo');
	
	// DADOS DO BOLETO PARA O SEU CLIENTE
	$dias_de_prazo_para_pagamento = (int)$this->config->get('bancobradesco_dias');
	$taxa_boleto = (float)$this->config->get('bancobradesco_taxa');
	$data_venc = date("d/m/Y", strtotime($pedido['date_added']) + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
	$valor_cobrado = $pedido['total']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

	$dadosboleto["nosso_numero"] = str_pad($pedidoId, 11, "0", STR_PAD_LEFT);  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
	$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
	$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
	$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
	$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = $pedido['payment_firstname']." ".$pedido['payment_lastname'];
	$dadosboleto["endereco1"] = $pedido['payment_address_1'];
	$dadosboleto["endereco2"] = "".$pedido['payment_city']." | ".$pedido['payment_zone']." -  CEP: ".$pedido['payment_postcode']."";

	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] = $this->config->get('bancobradesco_demo1');
	$dadosboleto["demonstrativo2"] = $this->config->get('bancobradesco_demo2');
	$dadosboleto["demonstrativo3"] = $this->config->get('bancobradesco_demo3');
	$dadosboleto["instrucoes1"] = $this->config->get('bancobradesco_ins1');
	$dadosboleto["instrucoes2"] = $this->config->get('bancobradesco_ins2');
	$dadosboleto["instrucoes3"] = $this->config->get('bancobradesco_ins3');
	$dadosboleto["instrucoes4"] = $this->config->get('bancobradesco_ins4');

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] = "";
	$dadosboleto["valor_unitario"] = "";
	$dadosboleto["aceite"] = "";		
	$dadosboleto["especie"] = "R$";
	$dadosboleto["especie_doc"] = "DS";


	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


	// DADOS DA SUA CONTA - Bradesco
	$dadosboleto["agencia"] = $this->config->get('bancobradesco_agencia'); // Num da agencia, sem digito
	$dadosboleto["agencia_dv"] = $this->config->get('bancobradesco_agenciadg'); // Digito do Num da agencia
	$dadosboleto["conta"] = $this->config->get('bancobradesco_conta'); 	// Num da conta, sem digito
	$dadosboleto["conta_dv"] = $this->config->get('bancobradesco_contadg'); 	// Digito do Num da conta

	// DADOS PERSONALIZADOS - Bradesco
	$dadosboleto["conta_cedente"] = $this->config->get('bancobradesco_conta'); // ContaCedente do Cliente, sem digito (Somente Números)
	$dadosboleto["conta_cedente_dv"] = $this->config->get('bancobradesco_contadg'); // Digito da ContaCedente do Cliente
	$dadosboleto["carteira"] = str_pad($this->config->get('bancobradesco_carteira'), 2, "0", STR_PAD_LEFT);  // Código da Carteira: pode ser 06 ou 03

	// SEUS DADOS
	$dadosboleto["identificacao"] = "Boleto Banc&aacute;rio";
	$dadosboleto["cpf_cnpj"] = $this->config->get('bancobradesco_cpfcnpj');
	$dadosboleto["endereco"] = $this->config->get('bancobradesco_endereco');
	$dadosboleto["cidade_uf"] = "";
	$dadosboleto["cedente"] = $this->config->get('bancobradesco_cedente');

	// NÃO ALTERAR!
	include("system/library/boleto/bradesco/include/funcoes_bradesco.php"); 
	include("system/library/boleto/bradesco/include/layout_bradesco.php");
	}
	
	public function confirm() {
		$this->load->model('checkout/order');
		$link = $this->url->link('payment/bancobradesco/gerarboleto&pedido='.$this->session->data['order_id'].'');
		$msg = "Para Imprimir a Segunda Via do Boleto: <a href='".$link."' target='_blank'>Clique Aqui!</a>";
		$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('bancobradesco_order_status_id'), $msg, true);
	}
}
?>