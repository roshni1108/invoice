<?php 
class Invoice extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('Invoicem');
	}

	public function index()
	{
		/*load registration view form*/
		$this->load->view('invoice.php');
	}
        /*Insert*/
	public function savedata()
	{
		// exit;
		/*load registration view form*/
		$this->load->view('invoice.php');
		/*Check submit button */
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			// print_r($this->input->post('name'));
			$data['Cname']=$this->input->post('cname');
			$data['cemail']=$this->input->post('cemail');
			$data['caddess']=$this->input->post('caddress');
			$data['cmobile']=$this->input->post('cphone');
			$data['productname']=$this->input->post('productname');
			$data['productdescription']=$this->input->post('producetdescription');
			$data['productqty']=$this->input->post('qty');
			$data['total']=$this->input->post('amt');
			// $FTotal=$this->input->post('FTotal');
			// $Fgst=$this->input->post('Fgst');
			// $Fdiscount=$this->input->post('Fdiscount');
			// $Famount=$this->input->post('Famount');
			// $cmobile=$this->input->post('cmobile');
			// $cfax=$this->input->post('cfax');
			$response=$this->Invoicem->saverecords($data);
			print_r($response);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}
	
}
?>