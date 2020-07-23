<?php 
class ajaxController extends controller{
    
    private $user;

    public function __construct(){
        parent::__construct();
      
        $this->users = new Users();
    
        if(!$this->users->verifyLogin()){
            $array = array(
                'status' => '0'
            );
            echo json_encode($array);
            exit;
        }
    }
    public function index(){}

    public function get_groups(){
        $array  = array('status' => '1');
        $groups = new Groups();

        $array['list'] = $groups->getList();

        echo json_encode($array);
        exit;
    }

    public function add_group(){
        $array = array('status'=> '1', 'error'=>'0');
        $groups = new Groups();

        if(!empty($_POST['name'])){
            $name = $_POST['name'];

            $groups->add($name);
        }else{
            $array['error'] = '1';
            $array['errorMsg'] = 'Nome do grupo nao foi enviado.';
        }

        echo json_encode($array);
        exit;
    }

}

?>