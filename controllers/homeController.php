<?php
class homeController extends controller{

    public function index(){
        $data = array();
     
        $data['quantidade'] = 20;

        $this->loadTemplate('home', $data);
    }

 
}