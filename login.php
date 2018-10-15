<?php
    $servername = getenv('IP');
    $username = "root";
    $password = "";
    $database = "classicmodels";
    $dbport = 3306;
    $login =0;
    
      
    session_start();
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
        $email= $_POST["email"]; 
        $pwd= $_POST["password"];  
        
        //using session
        $_SESSION['email']=$email;
        $_SESSION['password']=$pwd;
        
        
        $sql = "SELECT * FROM customers WHERE email='$email' and password='$pwd'";          
        $result= $db->query($sql);   
        if (mysqli_num_rows($result) <=0)
            echo "wrong email or password";
        else
        {    	    
            $login =1;
            $_SESSION['login']=$login;
            $row = mysqli_fetch_assoc($result);               
              echo nl2br("Welcome\n");
              echo $row['firstName']; 
              echo " ";
              echo $row['lastName'];      
              echo nl2br("\n");
              echo $row['email'];        
              $getBalance = $row['balance'];
              $_SESSION['balance']=$getBalance;                 
              //echo $GLOBALS['email']; 
              $_SESSION['firstName']=$row['firstName'];
              $_SESSION['lastName']=$row['lastName'];
        }   
    }
    $db->close();    
?>