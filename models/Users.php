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
    
    public function getUid(){
        return $this->uid;
    }

}