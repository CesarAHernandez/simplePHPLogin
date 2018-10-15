
<html lang="en-us">

  <head>
    <meta charset="utf-8">
    <title>Hello...</title>
  </head>
  
  <body>    
    <h1><strong>Lab4 - javascript and web programming</strong></h1>
    <?php 
      session_start();
      $login = $_SESSION['login'];
      $email =$_SESSION['email'];
      $firstName= $_SESSION['firstName'];
      $lastName= $_SESSION['lastName'];
    ?>
    
    <table border="1">    
      <tr>
        <td ALIGN="center" colspan="2">
        	<I>banking example </I> 
        	<?php echo $login ?>
        </td>
      </tr>
      <tr>
        <td ALIGN="top" >   
        	<iframe id="loginframe" src="loginform.php" frameborder="0" style="width:100%;height:100%"></iframe>
        	<div id="logininfo">
        	  <p> 
      	      Welcome<br> 
      	      <?php echo $firstName, " ",$lastName  ?><br>
      	      <?php echo $email ?><br>
        	  </p>
        	  
        	  
        	  <!--p> <?php echo $firstName, " ",$lastName  ?> </p-->
        	  <!--p> <?php echo $email ?></p-->
        	</div>
        	<script>   
            var login = '<?php echo $login;?>';
            if (login)
            {
              document.getElementById('loginframe').style.display = 'none';
              document.getElementById('logininfo').style.display = 'block';
              
            }
            else
            {
              document.getElementById('loginframe').style.display = 'block';
              document.getElementById('logininfo').style.display = 'none';
            }
          </script>
        </td>
        <td id="frame">features
          <script>   
            var login = '<?php echo $login; ?>';
            if (login)
       	      document.getElementById('frame').style.display = 'block';
       	    else
       	      document.getElementById('frame').style.display = 'none';
          </script>
          
      		<iframe id="featuresframe" src="features.html" frameborder="0" style="width:100%;height:100%"></iframe>
        </td>  
      </tr>
    </table>
    
    <p>plese try email: dmurphy@edu.com</p>
    <p>and password: 123456</p>
  </body>
  
</html>