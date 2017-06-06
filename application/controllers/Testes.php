<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controllername extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->library('unit_test');
	}
   public function index()
   {
      
   }
   public function UmMaisUm()
	{
		$test = 1 + 1;
		$expected_result = 2;
		$test_name = 'Um mais um';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} | {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
	}

}

/* End of file Controllername.php */
