<?php
  require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      if (isset($_POST['register'])){
        createAccount($_POST['regfname'],
        $_POST['reglname'],
        $_POST['regemail'],
        $_POST['regaddr'],
        $_POST['regpostalcode'],
        $_POST['regphnum'],
        $_POST['regcity'],
        $_POST['regcountry'],
        $_POST['regpassword']);
        unset($_POST['register']);

        $myusername = $_POST['regemail'];
        $mypassword = $_POST['regpassword'];
        //echo $_SERVER['DOCUMENT_ROOT'];
        $user = getUser($myusername, $mypassword);
        $_SESSION['user']['user_id'] = $user['user_id'];
        $_SESSION['user']['first_name'] = $user['first_name'];
        $_SESSION['user']['last_name'] = $user['last_name'];
        header('Location:'. $_GET['origin']);
      }
      else{
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];
        //echo $_SERVER['DOCUMENT_ROOT'];
        $user = getUser($myusername, $mypassword);
        $_SESSION['user']['user_id'] = $user['user_id'];
        $_SESSION['user']['first_name'] = $user['first_name'];
        $_SESSION['user']['last_name'] = $user['last_name'];
        header('Location:'. $_GET['origin']);
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

<header>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>the beer shoppe - Camosun ICS Year One Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</header>

<body>



    <!-- Page Content -->

    <div class="container-fluid">
      <div id="row">

        <!-- Login -->
        <div class="col-sm-6 text-center" style="border-right: 1px solid black;height: 300px;">

          <h1 class="text-center">Login</h1>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    Email<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type='password' name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary" > Login </button> or
                  <button type="submit" name="submit" class="btn btn-primary" > Go Back </button>

                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>

        <div class="col-sm-4">
          <h1 class="text-center">Register</h1>
        <form class="" method="post" enctype="multipart/form-data" action="">

          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">First Name</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <input pattern="[a-zA-Z]+" type="text" class="form-control" name="regfname" id="regfname"  placeholder="Enter your First Name" oninvalid="this.setCustomValidity('Your name can only contain letters')" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Last Name</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <input pattern="[a-zA-Z]+" type="text" class="form-control" name="reglname" id="reglname"  placeholder="Enter your Last Name" oninvalid="this.setCustomValidity('Your name can only contain letters')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Email</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                <input type="email" class="form-control" name="regemail" id="regemail"  placeholder="Enter your Email" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="address" class="cols-sm-2 control-label">Address</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                <input pattern="[a-zA-Z0-9 ]+" type="text" class="form-control" name="regaddr" id="regaddr"  placeholder="Enter your Address" oninvalid="this.setCustomValidity('Your address can only contain letters, numbers, and spaces')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="postalcode" class="cols-sm-2 control-label">Postal Code</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input pattern="[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ] ?[0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]" type="text" class="form-control" name="regpostalcode" id="regpostalcode"  placeholder="Enter your Postal Code" oninvalid="this.setCustomValidity('Format: LETTER-NUMBER-LETTER  NUMBER-LETTER-NUMBER')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="phonenumber" class="cols-sm-2 control-label">Phone Number</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input pattern="[0-9]+" type="text" class="form-control" name="regphnum" id="regphnum"  placeholder="Enter your Phone Number" oninvalid="this.setCustomValidity('Your phone number can only contain numbers')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="city" class="cols-sm-2 control-label">City</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input pattern="[a-zA-Z]+" type="text" class="form-control" name="regcity" id="regcity"  placeholder="Enter your City" oninvalid="this.setCustomValidity('Your name can only contain letters')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="country" class="cols-sm-2 control-label">Country</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input pattern="[a-zA-Z]+" type="text" class="form-control" name="regcountry" id="regcountry"  placeholder="Enter your Country" oninvalid="this.setCustomValidity('Your name can only contain letters')" required/>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="cols-sm-2 control-label">Password</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="regpassword" id="regpassword"  placeholder="Enter your Password" required/>
              </div>
            </div>
          </div>

          <div class="form-group ">
              <button type="submit" name="register" class="btn btn-primary btn-lg btn-block login-button" > Register </button>

          </div>

        </form>
      </div>
      </div>
    </div>
  </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>




        </div>
    </div>
    <!-- /.container -->



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
