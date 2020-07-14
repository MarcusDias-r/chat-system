<?php
class Core{

    public function run(){

        $url = '/';
        if(isset($_GET['url'])){
            $url .=$_GET['url'];
        }

        $params = array();

        if(!empty($url) && $url != '/'){

            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0].'Controller'; //imprime o primeiro diretorio apos a barra da url seguido de controller
            array_shift($url);
            
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }

            if(count($url) > 0){
                $params = $url;
            }


        }else{
            $currentController = 'homeController';
            $currentAction     = 'index';
        }
        
        /*echo '<hr/>';
        echo $currentController.'</br>';
        echo $currentAction.'</br>';
        print_r($params, true).'</br>';*/

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }

   
}