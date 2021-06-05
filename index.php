<?php
require_once('Signup.php');
if(isset($_POST['signup'])){
        if(!empty($_POST['fname']&&$_POST['lname']&&$_POST['username']&&$_POST['email']&&$_POST['password'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        if(checkEmail($email)==1){
                echo "<div class=\"alert\">email already exist<div>";
        }else{
            if(ctype_alpha($fname)&&ctype_alpha($lname)){
                $fname = strtolower($fname);
                $fname= strtoupper($fname[0]).substr($fname,1,strlen($fname));
                $lname = strtolower($lname);
                $lname= strtoupper($lname[0]).substr($lname,1,strlen($lname));
                if(checkUname($username)==1){
                    echo "<div class=\"alert\">user already exist</div>";
                }else{
                    if(strlen($password)<8 || strlen($password)>32){
                        echo "<div class=\"alert\">Password Must be at least 8 and less than 32<div>";
                    }else{
                        if (!(preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)))
                        {
                                echo '<div class="alert">Password Must contain letter and number</div>';
                        }else{
                            if(insertData($fname,$lname,$username,$email,$password)==1){
                                echo "<div class=\"success\">has been created</div>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
                             }else{
                                echo "<div class=\"alert\">sorry there's problem</div>";
                             }
                        }
                    }
                }
            }else{
                echo "sorry there's problem ";
            }
        }
    }else{
      echo"<div class=\"alert\">pls fill all fields<div>";
      echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form V</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <form action='index.php' method='post'>
            <fieldset>
                <legend>Personal Information</legend>
                <table>
                <tr><td><label for="firstName">FirstName:<br/><input type='text' id='firstName' name='fname'/></label><br/><br/></td></tr>
                <tr><td><label for="lastName">LastName:<br/><input type='text' id='lastName' name='lname'/></label><br/><br/></td></tr>
                <tr><td><label for="username">Username:<br/><input type='text' id='username' name='username'/></label><br/><br/></td></tr>
                <tr><td><label for="email">Email:<br/><input type='email' id='email' name='email'/></label><br/><br/></td></tr>
                <tr><td><label for="password">Password:<br/><input type='password' id='password' name='password'/></label><br/><br/></td></tr>
                <tr><td><br/><input type='submit' id='submit' name='signup' value='Signup'/><br/><br/></td></tr>
                </table>
            </fieldset>
    </body>
    </html>