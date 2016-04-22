<html>
<head>
	<title>Cart</title>
	 <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	 <!-- link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	 <link rel="stylesheet" type="text/css" href="css/cartstyle.css">
</head>
<body>
<div class="maintit">SHOPPING CART</div>

<div class="containermain">

    <?php
      session_start();
     $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

      $user=$_SESSION['login_user'];

      $query="SELECT * FROM `cart` WHERE email='$user';";
      $result=mysql_query($query);

      while($row=mysql_fetch_array($result))
      {
          $pid=$row['pid'];
          $sub_query="SELECT `name` FROM `items` WHERE `pid`=$pid";
          $sub_result=mysql_query($sub_query);
          $name=mysql_fetch_assoc($sub_result);
          echo '<div class="row">
                  <div class="col l10 offset-l1">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                         <span class="fieldname">Product Name : </span><span class="fieldval">'.$name['name'].'</span> <br>
                         <span class="fieldname">Quantity : </span><span class="fieldval">' . $row['qty'] . '</span> <br>
                        </div>
                        <form action="php/deleteitem.php" method="post" >
                          <div class="card-action">
                          <input type="hidden" name="username" value="'.$_SESSION['login_user'].'"><input type="hidden" name="pidofdel" value="'.$row['pid'].'">
                          <button type="submit" class="btn-floating btn-large waves-effect waves-light red">
                          <a> <i class="material-icons ">X</i></a></button></div>
                        </form>
                      </div>
                  </div>
                </div>';
      }
      mysql_close($con);
    ?>


<div class="row">
  <div class="col l3 offset-l1">
    <a class="waves-effect waves-light btn" href="http://localhost/shopping/index.php">GO Back</a>
  </div>
<!-- 	<div class="col l3 offset-l3">
	<a class="waves-effect waves-light btn">Proceed to Checkout</a>
	</div> -->
</div>

</div>
	 <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>  
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>