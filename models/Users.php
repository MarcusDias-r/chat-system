<?php 
Class Users extends Model{

    private $uid;

    public function verifyLogin(){
        if(!empty($_SESSION['chathashlogin'])){
            $s = $_SESSION['chathashlogin'];

            $sql = "SELECT * FROM users WHERE loginhash = :hash";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":hash", $s);
            $sql->execute();

            if($sql->rowCount()>0){
                $data = $sql->fetch();
                $this->uid = $data['id'];

                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function validateUsername($u){
        if(preg_match('/^[a-z0-9]+$/', $u)){// aula 3 a 5 min 29 38:42
           
            return true;
        }else{
            return false;
        }
    }

    public function userExists($u){
        
        $sql = "SELECT * FROM users WHERE username = :u";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":u", $u);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function registerUser($username, $pass){
        $newpass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, pass) VALUES(:u, :p)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":u", $username);
        $sql->bindValue(":p", $newpass);
        $sql->execute();
    }
    
    public function validateUser($username, $pass){

        $sql = "SELECT * FROM users WHERE username = :username";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":username", $username);
        $sql->execute();

        if($sql->rowCount()>0){
            $info = $sql->fetch();

            if(password_verify($pass, $info['pass'])){
                $loginhash = md5(rand(0,99999).time().$info['id']);
                
                $this->setLoginHash($info['id'], $loginhash);
                $_SESSION['chathashlogin'] = $loginhash;

                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }

    }

    private function setLoginHash($uid, $hash){
        $sql = "UPDATE users SET loginhash = :hash WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $hash);
        $sql->bindValue(":id", $uid);
        $sql->execute();
    }
  

    public function getUid(){
        return $this->uid;
    }

}