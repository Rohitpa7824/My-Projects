<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Chat</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         
          <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    
  </head>

  <body>

    <?php

  session_start();

  if(!isset($_SESSION['login-user']))
  {
    header("location: http://localhost/Chatting-Webapp/Chat-login/");
  }
  $current_user = $_SESSION['login-user'];
  if($current_user == 'rvprvprvp7824@gmail.com')
    $_SESSION['receiver_user'] = 'nileshkevlani78@gmail.com';
  else
     $_SESSION['receiver_user'] = 'rvprvprvp7824@gmail.com';
  echo "<div class='hidden' id='username'>".$_SESSION['login-user']."</div><div class='hidden' id='receivername'>".$_SESSION['receiver_user']."</div>";
  ?>

  <div class="titlebar">
     
      
      <div class="row">
        

      <div class="titlename">
         <?php
        require ("php/connect.php");
          $query1 = 'SELECT fname,lname from `users` WHERE email = "'.$_SESSION['receiver_user'].'";';
          $result1 = mysql_query($query1);
          $row = mysql_fetch_array($result1);
          echo $row['fname'],' ',$row['lname'];
        ?>
      </div>
      <form action="php/logout.php" method="POST">
           <div id="logoutbtn"><button type="submit">LOGOUT(<?php require ("php/ME.php"); echo $current_user;?>)</button></div>
        </form>
      </div>
    
   
  </div>
  <div class="hidden" id="hiddendiv" name="hiddendiv"></div>
  <div class="chat-thread">
  <ul>
  
  <?php
  
  require ('php/connect.php');
  $query2 = "SELECT * FROM `rvprvprvp7824@gmail.com-nileshkevlani78@gmail.com` WHERE 1;";
    $result2 = mysql_query($query2);
    while($row = mysql_fetch_array($result2))
    {
      if($row['sender']==$_SESSION['login-user'])
        echo '<div class="sentmsg row"><li>'.$row['message'].'</li><br></div>';
      else
          echo '<div class="receivedmsg row"><li>'.$row['message'].'</li><br></div>';
    }

    

  ?>

  </ul>
  </div>
  <form action="msgsent.php" method="get" id="msgform">
<div class="chat-window" id="msgsubmission">
  <input type="hidden" id="secret" value=""/>
  <div class="row" id="msgdiv">
    <div class="col l11 m9" id="msgfield">
      <input class="chat-window-message" type="text" autocomplete="off" id="msginput"/> 
    </div>
  <div class="col l1 m3">
    <button class="btn waves-effect waves-light" id="sendbutton"><i class="material-icons right">send</i>
  </button>
  </div>
  </div>   
</div>
</form>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
       
        <script src="js/index.js"></script>
  </body>
</html>
