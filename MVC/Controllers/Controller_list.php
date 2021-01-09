<?php

class Controller_list extends Controller{
	public function action_last(){
		$m = Model::getModel();
        $data=[
            "liste" => $m->get_last();;
        ];

	    $this->render("list", $data);
	}

	public function action_informations(){
        if(isset($_GET["id"]) and preg_match("/^\d+$/", $_GET["id"])){

            $m = Model::getModel();
            $res = $m->getNobelPrizeInformations($_GET["id"]);

            if($res === false){
                $this->action_error("There is no such nobel prize");
            }
            else{
                $this->render("infos", $res);
            }
        }
        else{
            $this->action_error("Pas d'id dans l'url");
        }
    }

    public function action_pagination(){

        if(isset($_GET["start"]) and preg_match("/^\d+$/", $_GET["start"])){
            $start = $_GET["start"];
        }
        else{
            $start = 1;
        }


        $debut = $start - 5;
        if($debut <= 0 ){
            $debut = 1;
        }

        $m = Model::getModel();
        $dernierPage = (int)(ceil($m->getNbNobelPrizes() / 25));
        $fin = $debut + 9;
        if($fin > $dernierPage){
            $fin = $dernierPage;
        }
        
        $previous = $start > 1;
        $next = $start < $dernierPage;
        
        $offset = ($start-1) * 25;
        $data = [
          "liste" =>    $m->getNobelPrizesWithLimit($offset),
          "start" => $start, 
          "debut" => $debut,
          "fin" => $fin,
          "next" => $next,
          "previous" => $previous
        ];
        $this->render("pagination", $data);
    }

       
}
?>