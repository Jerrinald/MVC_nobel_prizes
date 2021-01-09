<?php

class Controller_set extends Controller{


	public function action_form_add(){
		$m = Model::getModel();
		$data=["categories"=> $m->getCategories()];
		$this->render("form_add", $data);
	}

	public function action_add(){
		$infos = $this->checkDataPost()
			if($infos === false){
				$this->action_error();
			}
			$res = $m->addNobelPrize($infos);
			if(!$res){
				$this->action_error("Problem adding a nobel prize");
			}else{
				$this->render("message", ["title" => "add", "message" => "works!"]);
			}

			}else{
                $this->action_error("Category problem");    
            }
		}
	}

	public function action_update(){
        
        $ok = true;
        if(!isset($_POST["id"]) or !preg_match("/^\d+$/", $_POST["id"])){
            $ok = false;
        }
        if($ok){
            $infos = $this->checkDataPOST();
            if($infos === false){
                $ok = false;
            }else{
                
                $infos["id"] = $_POST["id"];
                // $infos contient les informations pour mettre à jour le prix nobel
                $m = Model::getModel();
                $ok = $m->updateNobelPrize($infos);
            }
        }
        // $ok vaut false en cas de problème
        if($ok){
            $data = [
                "title" => "Updating",
                "message" => "The nobel prize has been updated"
            ];
            $this->render("message", $data);
        }
        else{
            $this->action_error("An error occured when updating the nobel prize");
        }
    }


	public function action_form_update(){

		if(isset($_GET["id"]) and preg_match("/^\d+$/", $_GET["id"])){
			$m = Model::getModel();
			$np = $m->getNobelPrizesInformations($_GET["id"]);
			if($np === false){
				$this->action_error("not correspond to a nobel prize");
			}else{

				//on ajoute les categories au tableau contenant les infos du prix nobel
				$np["categories"] = $m->getCategories();
				$this->render("form_update", $np);
			}
		}else{
			$this->action_error("incorrect ID in the url");
		}
	}

	public function action_remove(){
        if(isset($_GET["id"]) and preg_match("/^\d+$/", $_GET["id"])){

            $m = Model::getModel();
            $res  = $m->removeNobelPrize($_GET["id"]);
            if(!$res){
                $this->action_error("The nobel prize does not exist");
            }else{
                $data = [
                    "title" => "Removing a np", 
                    "message" => "works!"
                ];
                $this->render("message", $data);
            }
        }
        else{
            $this->action_error("No id in the url");
        }
    }

	public function action_default(){
		$this->action_form_add();
	}


	
	private function checkDataPOST(){
        if(isset($_POST["name"]) and isset($_POST["category"]) and isset($_POST["year"])
        and !preg_match("/^ *$/", $_POST["name"]) and !preg_match("/^ *$/", $_POST["category"])
        and preg_match("/^\d{4}$/", $_POST["year"])){
            $m = Model::getModel();
            $categories = $m->getCategories();
            if (in_array($_POST["category"], $categories)) {
                $infos = [];

                $cles = ['year', 'category', 'name', 'birthdate', 'birthplace', 'county', 'motivation'];

                foreach ($cles as $cle) {
                    if (isset($_POST[$cle]) and !preg_match("/^ *$/", $_POST[$cle])) {
                        $infos[$cle] = $_POST[$cle];
                    } else {
                        $infos[$cle] = null;
                    }
                }
                return $infos;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}