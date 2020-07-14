<?php
class controller{

    protected $db;

    public function __construct(){
        global $db;
        $this->db = $db;
    }
    
public function loadView($viewName, $viewData = array()){
    extract($viewData);// extract transforma a chave de um array em uma variavel
    require 'views/'.$viewName.'.php';

}

public function loadTemplate($viewName, $viewData = array()){
    extract($viewData);
    require 'views/template.php';
}

public function loadViewInTemplate($viewName, $viewData = array()){
    extract($viewData);
    require 'views/'.$viewName.'.php';
}
}