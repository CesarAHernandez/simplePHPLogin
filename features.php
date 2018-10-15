<?php
    $servername = getenv('IP');
    $username = "root";
    $password = "";
    $database = "classicmodels";
    $dbport = 3306;
    
    session_start();
    $login=$_SESSION['login'];
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) 
    {
        die("Connection failed: " . $db->connect_error);        
    } 
    //echo "Connected successfully (".$db->host_info.")";     
    else 
    {
        if ($login)
        {           
            //load session variables
            $email=  $_SESSION['email'];
            $pwd= $_SESSION['password'];   
            $getBalance = $_SESSION['balance'];  
                        
            if (isset($_POST['deposit']))
            {
                $deposit = $_POST["deposit"];                 
                echo nl2br("\n");
                $sqlDeposit="UPDATE customers SET balance = balance+$deposit WHERE email='$email'";//dmurphy@edu.com'";    
                $depositResult= $db->query($sqlDeposit);
                if ($depositResult) 
                {
                    echo "deposited successfully";
                    echo nl2br("\n");
                    $getBalance += $deposit;
                    $_SESSION['balance'] = $getBalance; 
                    echo $getBalance;
                    
                }
                else                  
                {
                    echo "deposit failed"; 
                    echo nl2br("\n");
                    echo $getBalance;
                }
                echo " ";
                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
            }
            
            else if (isset($_POST['withdraw']))
            {
                $withdraw = $_POST["withdraw"];
                if ($withdraw > $getBalance)
                {
                    echo "can't withdraw more than your current balance";
                }
                else {
                    $sqlWithdraw="UPDATE customers SET balance = balance-$withdraw WHERE email='$email'";     
                    $result= $db->query($sqlWithdraw);
                    echo "withdraw successfully";
                    echo nl2br("\n");
                    $getBalance -= $withdraw;
                    $_SESSION['balance'] = $getBalance; 
                    echo $getBalance;
                    echo " ";
                    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
                }
            }
            
            else if (isset($_POST['balance']))
            {      
                echo $getBalance;    
                echo " ";
                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
            }
            
            else if (isset($_POST['logout']))
            {      
                unset($_SESSION);
                session_destroy();  
                echo "log out successfully";
                history.go(-1);
            }
            
        } 
        else
            echo "failed to log in";
        $db->close();   
    }
?>