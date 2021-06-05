<?php
require_once('connection.php');
  
function checkEmail($mail){
       global $PDO;
       try{
            $con=$PDO->prepare("SELECT `email` FROM `user` WHERE email=:e");
            $con->bindValue(':e',$mail);
            $con->execute();
            if($con->rowCount()>0){
                return true;
            }else{
                    return false;
            }
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
function checkUname($user){
        global $PDO;
        try{
             $con=$PDO->prepare("SELECT `email` FROM `user` WHERE username=:u");
             $con->bindValue(':u',$user);
             $con->execute();
             if($con->rowCount()>0){
                 return true;
             }else{
                     return false;
             }
         }catch(PDOException $e){
             $e->getMessage();
         }
}
function insertData($first,$last,$user,$mail,$pass){
    global $PDO;
    try{
            $con = $PDO->prepare("INSERT INTO `user`(`fname`,`lname`,`username`,`email`,`password`) VALUES (:f,:l,:u,:e,:p)");
            $con->bindValue("f",$first);
            $con->bindValue("l",$last);
            $con->bindValue("u",$user);
            $con->bindValue("e",$mail);
            $con->bindValue("p",$pass);

            $con->execute();
            return true;
    }catch(PDOException $e){
            $e->getMessage();
            return false;
    }
}
?>