<?php 

class homeController extends controller{
    
    private $user;

    public function __construct(){
        parent::__construct();
      
        $this->users = new Users();
    
        if(!$this->users->verifyLogin()){
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function index(){
        $data = array();
    
        $this->loadTemplate('home', $data);
        $this->user->getUid();
    }
}

?>