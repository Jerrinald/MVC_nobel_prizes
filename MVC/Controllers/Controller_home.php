<?php 

class Controller_home extends Controller{
	public function action_home(){

		$m= Model::getModel();
		$data=[
			"nb" => $m->getNbNobelPrizes()
		];
		this->render("home", $data);
	}

	public function action_default(){
		$this->action_home();
	}
}


?>