<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

		// index.php
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function cadastrar()
	{

		// RECUPERAR OS DADOS DE POST GRAVAR NO BANCO DE DADOS


		if($this->input->post()){

			$this->load->model('Leads_model');

			$nome = $this->input->post('nome');
			$email = $this->input->post('email');
			$telefone = $this->input->post('telefone'); 
			$estado  = $this->input->post('estado');
			$cidade  = $this->input->post('cidade');
			$investimento  = $this->input->post('Investimento');
			if($telefone == null){
				$this->session->set_flashdata('error', 'Registro não pode ser gravado, os dados do telefone estão incorretos.');
				redirect(base_url('home'));
			}
			if($telefone == 0){
				
				$this->session->set_flashdata('error', 'Registro não pode ser gravado, os dados do telefone estão incorretos.');
				redirect(base_url('home'));
			}
			


			
			$this->Leads_model->cadastrar_lead($nome, $email, $telefone, $estado, $cidade, $investimento);


			$mensagem = '<p style="background-color: #F2DEDE; border: 1px solid #EBCCD1; color: #a94442; padding: 5px 10px">';
			$mensagem .='Esta mensagem foi enviada através do formulário da página ' . base_url('') . '. Não responda esta mensagem!';
			$mensagem .= '</p>';
			$mensagem .= "<p>Nome: {$nome }</p>";
			$mensagem .= "<p>E-mail: {$email}</p>";
			$mensagem .= "<p>Telefone: {$telefone}</p>";
			$mensagem .= "<p>Estado: {$estado}</p>";
			$mensagem .= "<p>Cidade: {$cidade}</p>";
			$mensagem .= "<p>Mensagem: {$investimento}</p>";
			$mensagem .= '<div style="padding: 15px 0; margin-top: 15px; border-top: 1px solid #eee">';
			$mensagem .= '&copy; ' . date('Y') . ' ' . APP_NAME;
			$mensagem .= '</div>';


			$destinatarios = array(
				array("email" => "lavateriahome@lavateria.com.br", "nome" => APP_NAME.' - Home'),
				// array("email" => " higienizacaoestofados@higienizacaoestofados.com.br", "nome" => APP_NAME),
			);

			$this->load->library('phpmail');
			$mailer = new Phpmail();
			$phpmailer = NULL;
			$enviado = $mailer->sendEmail($phpmailer, $mensagem, '[' . APP_NAME . ']' . " - Mensagem", $destinatarios);



			$mensagem = '<p style="background-color: #F2DEDE; border: 1px solid #EBCCD1; color: #a94442; padding: 5px 10px">';
			$mensagem .='Esta mensagem foi enviada através do formulário da página ' . APP_NAME.'- Home. Não responda esta mensagem!';
			$mensagem .= '</p>';
			$mensagem .= "<p>Olá {$nome },tudo bem por aí?</p>";
			$mensagem .= "<p>Vi que há pouco você se cadastrou para receber mais informações sobre nossa franquia. Em anexo seguem nossos materiais de apresentação para facilitar o entendimento de nosso modelo de negócios, investimento e retorno.</p>";
			$mensagem .= "<p>Faremos contato em seu telefone cadastrado em breve para prosseguir com o seu atendimento. Portanto, se notar algum número desconhecido te ligando com o DDD 17, serei eu fazendo um rápido contato inicial.</p>";
			$mensagem .= "<p>• Baixe nossa apresentação: <a href='".base_url('APRESENTACAOHOME2020.pdf')."'>Clique Aqui</a> </p>";
			$mensagem .= "<p>Atenciosamente;</p>";
			$mensagem .= "<p>Equipe de Expansão Lavateria;</p>";
			$mensagem .= '&copy; ' . date('Y') . ' ' . APP_NAME.'- Home';
			$mensagem .= '</div>';

		

			$destinatarios = array(
				array("email" => $email, "nome" => APP_NAME.'- Home'),
				// cleanfor@lavateria.com.br
			);
			$phpmailer = NULL;
			$enviado = $mailer->sendEmail($phpmailer, $mensagem, '[' . APP_NAME . ']' . " - Mensagem", $destinatarios);

			$this->load->view('./sucesso/index');

		}

	}
	
	public function arquivos()
	{

		$data = array();

		$this->load->view('./arquivos/index', $data, FALSE);
		
	}
}
