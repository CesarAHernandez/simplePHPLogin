<!DOCTYPE html>
<html>
    <body>
    <?php 
      session_start();
      $login = $_SESSION['login']; 
    ?>
    
    login
        <form action="login.php" method="post" id="login">
      	  Email: <input type="text" id="email" name="email"><br>
      	  Password: <input type="text" id="password" name="password"><br>
      	  <input type="submit" onclick="javascript:display();">
      	  
            <script>  		  
      	    function display()
      	    {
      	      var login = '<?php echo $login; ?>'; //pass variable $login from php to javascript and store in variable login
              if (login)
                parent.document.getElementById('frame').style.display = 'block'; 
                parent.document.location.reload();
            }
      	  </script>   
      	  
    </body>
</html>