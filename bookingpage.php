<?php
include('user_info.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/230b92d4e6.js" crossorigin="anonymous"></script>


    <title>Booking Form HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css" />

    <!-- Custom CSS -->
    <style>
        .form-checkbox input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #fff;
            border-radius: 50%;
            margin-right: 5px;
            vertical-align: middle;
        }

        .form-checkbox input[type="radio"]:checked {
            background-color: white;
        }

        #booking {
            position: relative;
            height: 100vh;
            overflow: hidden;
            
        }


        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .video-background video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .section-center {
            position: relative;
            top: 50%;
            left: 0;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .container {
            z-index: 1;
            position: relative;
        }

        .booking-form {
            background: rgba(0, 0, 0, 0.2);
            padding: 40px;
            border-radius: 6px;
margin-top: -120px;
        }

/* Additional CSS styles for reducing the gap */
  .wrapper {
    padding-top: 10px; /* Adjust the padding top as needed */
  }

  /* Additional CSS to manage spacing of header from top margin */
  #header {
    margin-top: 10px; /* Adjust the top margin as needed */
  }



    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="booking" class="section">
        <div class="video-background">
            <video autoplay muted loop playbackRate="0.2">
                <source src="background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
 </video>
        </div>




<div class="wrapper row1">
<header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.html">AIR</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="homepage2.php" style="color: Black;"  onmouseover="this.style.color='blue'" onmouseout="this.style.color='black';">Home</a></li>
        <li><a class="drop" href="#" style="color: black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black';">Flight Details</a>
          <ul>
            <li><a href="#" style="color: black;">Search Flight</a></li>
            <?php
              // Check if the user is logged in and user information is available
              if (isset($user_name) && isset($user_email)) {
                  echo '<li><a href="bookingpage.php"  style="color: black;">Book Flight</a></li>';
              } else {
                  echo '<li><a href="login.html">Book Flight</a></li>';
              }
              ?>
            <li><a href="#" style="color: black;">Cancel Booking</a></li>
          </ul>
        </li>
                <li><a href="login.html" style="color: black;"  onmouseover="this.style.color='blue'" onmouseout="this.style.color='black';">Login</a></li>
        <li><a href="register.html" style="color: black;" style="color: #0c090A;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black';">Register</a></li>
        <li><a href="contact.html" style="color: black;"  onmouseover="this.style.color='blue'" onmouseout="this.style.color='black';">Contact Us</a></li>
      
          <!-- Add user logo icon with an onclick  event to display user info -->
          <i class='fas fa-user-circle' style='font-size:24px;'></i>
        </li>
      </ul>
    </nav>
  </header></div>



        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <form action="booking.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Flying from</span>
                                        <input id="departureInput" name="departureInput" class="form-control" type="text" list="citiesList" placeholder="City or airport" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                        <datalist id="citiesList">
					<option value="New York City (USA)">
					<option value="London (UK)">
					<option value="Paris (France)">
					<option value="Dubai (UAE)">
					<option value="Singapore">
					<option value="Sydney (Australia)">
					<option value="Tokyo (Japan)">
					<option value="Los Angeles (USA)">
					<option value="Beijing (China)">
					<option value="Rome (Italy)">
					<option value="Amsterdam (Netherlands)">
					<option value="Toronto (Canada)">
					<option value="Moscow (Russia)">
					<option value="Istanbul (Turkey)">
					<option value="Berlin (Germany)">
					<option value="Madrid (Spain)">
					<option value="Seoul (South Korea)">
					<option value="Bangkok (Thailand)">
					<option value="Cape Town (South Africa)">
					<option value="Buenos Aires (Argentina)">
					<option value="Mumbai (India)">
					<option value="Rio de Janeiro (Brazil)">
					<option value="Cairo (Egypt)">
					<option value="Athens (Greece)">
					<option value="Auckland (New Zealand)">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Flying to</span>
                                        <input id="destinationInput" name="destinationInput" class="form-control" type="text" list="citiesLists" placeholder="City or airport" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                        <datalist id="citiesLists">
					<option value="New Delhi (India)">
					<option value="Kolkata (India)">
					<option value="Bengaluru (India)">
					<option value="Goa (India)">
					<option value="Manchester (UK)">
					<option value="Birmingham (UK)">
					<option value="Melbourne (Australia)">
					<option value="Perth (Australia)">
					<option value="Christchurch (New Zealand)">
					<option value="Queenstown (New Zealand)">
					<option value="Dallas (USA)">
					<option value="Chicago (USA)">
					<option value="Barcelona (Spain)">
					<option value="Marseille (Spain)">
					<option value="Cordoba (Argentina)">
					<option value="Venice (Italy)">
					<option value="Milan (Italy)">
					<option value="Johannesburg (South Africa)">
					<option value="Colombo (Sri Lanka)">
					<option value="Porto (Portugal)">
					<option value="Dublin (Ireland)">
					<option value="Belgium">
					<option value="Finland">
					<option value="Norway">
					<option value="Galway (Ireland)">
					<option value="Denmark">
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Departing</span>
                                        <input id="departureDate" name="departureDate" class="form-control" type="date" required style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Adults (18+)</span>
                                        <input id="adults" name="adults" class="form-control" type="number" min="0" placeholder="0" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Children (0-17)</span>
                                        <input id="children" name="children" class="form-control" type="number" min="0" placeholder="0" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Travel class</span>
                                        <select name="travel_class" class="form-control" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                            <option>Economy class</option>
                                            <option>Business class</option>
                                            <option>First class</option>
                                        </select>
                                        <span class="select-arrow" style="position: absolute; right: 10px; bottom: 6px; width: 32px; line-height: 32px; height: 32px; text-align: center; pointer-events: none; color: rgba(0, 0, 0, 0.3); font-size: 14px;">▶</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" style="position: relative; margin-bottom: 20px;">
                                        <span class="form-label" style="display: block; margin-left: 20px; margin-bottom: 5px; font-weight: 400; text-transform: uppercase; line-height: 24px; height: 24px; font-size: 12px; color: #fff;">Email</span>
                                        <!-- Use PHP to auto-fill the email field if the user is logged in -->
                                        <?php if (isset($_SESSION['user_id'])) { ?>
                                            <input id="email" name="email" class="form-control" type="text" placeholder="abc@domin.com" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;" value="<?php echo $user_email; ?>" readonly>
                                        <?php } else { ?>
                                            <input id="email" name="email" class="form-control" type="text" placeholder="abc@domin.com" style="background-color: #fff; height: 50px; color: #191a1e; border: none; font-size: 16px; font-weight: 400; -webkit-box-shadow: none; box-shadow: none; border-radius: 40px; padding: 0px 25px;">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-btn" style="margin-top: 27px;">
                                        <button class="submit-btn" style="color: #fff; background-color: #f23e3e; font-weight: 400; height: 50px; font-size: 14px; border: none; width: 100%; border-radius: 40px; text-transform: uppercase;">Show flights</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
