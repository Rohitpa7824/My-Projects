<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  </head>

  <body>
  
    <?php
      session_start();
      if(isset($_SESSION['login_user']))
      {
       echo ' <form action="php/logout.php" method="POST">
                <button type="submit" class="btn waves-effect waves-light" id="logoutbtn">Logout</button>
              </form>'; 
       echo '<div id="loginid">'.$_SESSION['login_user'].'</div>';
      }
      else
      {
        echo '<a class="waves-effect waves-light btn modal-trigger" href="#login" id="loginbtn">Login</a>';
      }
    ?>


    <div class="topsection">
      <div class="headerfont">
        CATALOGUE
      </div>
    </div>

<div class="containers">

<!-- Electronics -->
<a class="modal-trigger" href="#elec">
<div class="secitems p-marjaisa">
  <img src="img/elec.png" />
  <h2>Electronics</h2>
  <ul></ul>
</div>
</a>

<!-- Clothing -->
<a class="modal-trigger" href="#clot">
<div class="secitems p-marjaisa">
  <img src="img/cloth.png" />
  <h2>Clothing</h2>
  <ul>
  </ul>
</div>
</a>

<!-- FootWear -->
<a class="modal-trigger" href="#foot">
<div class="secitems p-marjaisa">
  <img src="img/foot.png" />
  <h2>FootWear</h2>
  <ul>
  </ul>
</div>
</a>

<!-- Furniture -->
<a class="modal-trigger" href="#furni">
<div class="secitems p-marjaisa">
   <img src="img/furni.png" />
  <h2>Furniture</h2>
  <ul>
  </ul>
</div>
</a>

<!-- Sports -->
<a class="modal-trigger" href="#sport">
<div class="secitems p-marjaisa">
   <img src="img/sport.png" />
  <h2>Sports</h2>
  <ul>
  </ul>
</div>
</a>


</div><!-- container-->

<div class='page-footer'>

  <a class="waves-effect waves-light btn" href="cart.php" id="cart-btn">Move to Cart</a>

</div>
        
<div id="elec" class="modal">

    <div class="modal-content">
      <div class="modal-header">
        Electronics
      </div>

      <div class="row">
      <?php
           $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

            $query = "SELECT * FROM items WHERE cat_no=1"; 
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result))
            {  

            echo '<div class="col l4">
                  <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/test.jpeg">
                  </div>
                  <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">' . $row['name'];

                  if(isset($_SESSION['login_user']))
                  echo '<form action="php/cart.php" method="POST">
                          <input type="hidden" name="pid" value="'.$row['pid'].'">
                          <input type="hidden" name="user" value="'.$_SESSION['login_user'].'">
                          <button type="submit">ADD TO CART</button>
                          <input type="int" name="qty" style="width:34px" value="1" >
                        </form>'; 
                        
                  else
                  echo '<p><a class="modal-trigger" href="#login">ADD TO CART</a></p>';


                  echo
                  '</div>
                  <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">' . $row['name'] . '<i class="material-icons right">close</i></span>
                <p>' . $row['sdescription'] . '</p>
                <p>
                <a href="#">ADD TO CART</a></p>
                </div>
                </div>
                </div>' ;
            }

            mysql_close(); //Make sure to close out the database connection


      ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
  </div>

<div id="clot" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        Clothing
      </div>

      <div class="row">
      <?php

           $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

            $query = "SELECT * FROM items WHERE cat_no=2"; 
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result))
            {  

            echo '<div class="col l4">
                  <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/test.jpeg">
                  </div>
                  <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">' . $row['name'];


                  if(isset($_SESSION['login_user']))
                  echo '<form action="php/cart.php" method="POST">
                          <input type="hidden" name="pid" value="'.$row['pid'].'">
                          <input type="hidden" name="user" value="'.$_SESSION['login_user'].'">
                          <button type="submit">ADD TO CART</button>
                          <input type="int" name="qty" style="width:34px" value="1" >
                        </form>'; 
                        
                  else
                  echo '<p><a class="modal-trigger" href="#login">ADD TO CART</a></p>';

                  echo
                  '</div>
                  <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">' . $row['name'] . '<i class="material-icons right">close</i></span>
                <p>' . $row['sdescription'] . '</p>
                <p>
                <a href="#">ADD TO CART</a></p>
                </div>
                </div>
                </div>' ;
            }
            mysql_close(); //Make sure to close out the database connection
      ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
  </div>

<div id="foot" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        Footwear
      </div>

      <div class="row">
      <?php

           $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

            $query = "SELECT * FROM items WHERE cat_no=3"; 
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result))
            {  

            echo '<div class="col l4">
                  <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/test.jpeg">
                  </div>
                  <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">' . $row['name'];

                  if(isset($_SESSION['login_user']))
                  echo '<form action="php/cart.php" method="POST">
                          <input type="hidden" name="pid" value="'.$row['pid'].'">
                          <input type="hidden" name="user" value="'.$_SESSION['login_user'].'">
                          <button type="submit">ADD TO CART</button>
                          <input type="int" name="qty" style="width:34px" value="1" >
                        </form>'; 
                        
                  else
                  echo '<p><a class="modal-trigger" href="#login">ADD TO CART</a></p>';
                echo
                  '</div>
                  <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">' . $row['name'] . '<i class="material-icons right">close</i></span>
                <p>' . $row['sdescription'] . '</p>
                <p>
                <a href="#">ADD TO CART</a></p>
                </div>
                </div>
                </div>' ;
            }

            mysql_close(); //Make sure to close out the database connection


      ?>


      
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
  </div>

<div id="furni" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        Furniture
      </div>

      <div class="row">
      <?php

          $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

            $query = "SELECT * FROM items WHERE cat_no=4"; 
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result))
            {  

            echo '<div class="col l4">
                  <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/test.jpeg">
                  </div>
                  <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">' . $row['name'];

                  if(isset($_SESSION['login_user']))
                  echo '<form action="php/cart.php" method="POST">
                          <input type="hidden" name="pid" value="'.$row['pid'].'">
                          <input type="hidden" name="user" value="'.$_SESSION['login_user'].'">
                          <button type="submit">ADD TO CART</button>
                          <input type="int" name="qty" style="width:34px" value="1" >
                        </form>'; 
                        
                  else
                  echo '<p><a class="modal-trigger" href="#login">ADD TO CART</a></p>';

                  echo 
                  '</div>
                  <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">' . $row['name'] . '<i class="material-icons right">close</i></span>
                <p>' . $row['sdescription'] . '</p>
                <p>
                <a href="#">ADD TO CART</a></p>
                </div>
                </div>
                </div>' ;
            }

            mysql_close(); //Make sure to close out the database connection


      ?>


      
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
  </div>

<div id="sport" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        Sports
      </div>

      <div class="row">
      <?php

          $con = mysql_connect("localhost","u522924279_root","123456789");
  mysql_select_db("u522924279_shop",$con);

            $query = "SELECT * FROM items WHERE cat_no=5"; 
            $result = mysql_query($query);

            while($row = mysql_fetch_array($result))
            {  
            echo '<div class="col l4">
                  <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/test.jpeg">
                  </div>
                  <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">' . $row['name'];

                  if(isset($_SESSION['login_user']))
                  echo '<form action="php/cart.php" method="POST">
                          <input type="hidden" name="pid" value="'.$row['pid'].'">
                          <input type="hidden" name="user" value="'.$_SESSION['login_user'].'">
                          <button type="submit">ADD TO CART</button>
                          <input type="int" name="qty" style="width:34px" value="1" >
                        </form>'; 
                        
                  else
                  echo '<p><a class="modal-trigger" href="#login">ADD TO CART</a></p>';
                  
                  echo
                  '</div>
                  <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">' . $row['name'] . '<i class="material-icons right">close</i></span>
                <p>' . $row['sdescription'] . '</p>
                <p>
                <a href="#">ADD TO CART</a></p>
                </div>
                </div>
                </div>' ;
            }

            mysql_close(); //Make sure to close out the database connection


      ?>


      
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>
  </div>
     <!-- MODAL ENDS -->

     <!-- Login MODAL starts-->

    <div id="login" class="modal">
      <div class="modal-content">
        <div class="logintit">LOGIN</div>
        <div class="logincon">
          <form action="php/login.php" method="POST">
          <input type="text" name="email" placeholder="Enter Email" />
          <input type="password" name="password" placeholder="Enter Password">
          <input type="submit" class="btn"></input>
          </form>
        </div>
      </div>
    </div>

     <!-- Login modal Ends -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>  
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
