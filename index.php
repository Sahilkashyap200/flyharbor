<!DOCTYPE html>
<html lang="en">
<head>
<title>Ritika</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="https://kit.fontawesome.com/230b92d4e6.js" crossorigin="anonymous"></script>
<style>
 

  /* Additional CSS styles for reducing the gap */
  .wrapper {
    padding-top: 29px; /* Adjust the padding top as needed */
  }

  /* Additional CSS to manage spacing of header from top margin */
  #header {
    margin-top: 29px; /* Adjust the top margin as needed */
  }

/* Additional CSS for user info display */
  .user-info-popup {
    position: absolute;
    top: 150px; /* Adjust the top position as needed */
    right: 20px; /* Adjust the right position as needed */
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.04);
    display: none;
  }

  .user-info-popup.active {
    display: block;
  }
  
  #pageintro {
    margin-left: 280px; /* Adjust the value to move the text as needed */
    position: relative; /* Use relative positioning */
    top: -20px; /* Adjust the top value to move the text upward */
  }

/* Additional CSS for the text typing animation */
  .typing-animation {
    font-size: 24px;
    font-weight: bold;
    white-space: nowrap;
    overflow: hidden;
    padding: 10px;
  }

  @keyframes typing {
    from {
      width: 0;
    }
    to {
      width: 100%;
    }
  }

  @keyframes blink-caret {
    from, to {
      border-color: transparent;
    }
    50% {
      border-color: white;
    }
  }

  /* Video background styles */
  .video-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1; /* Place the video behind other content */
  }
</style>
</head>
<body id="top">

<!-- Video Background -->
<video autoplay muted loop class="video-background" preload="auto" playsinline onended="this.play()">
  <source src="homepagevid.mp4" type="video/mp4">
  <!-- Add additional video formats if needed (e.g., WebM, Ogg) -->
  Your browser does not support the video tag.
</video>
  
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.html">AIR</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="homepage2.php">Home</a></li>
        <li><a class="drop" href="#">Flight Details</a>
          <ul>
            <li><a href="#">Search Flight</a></li>
            <?php
              // Check if the user is logged in and user information is available
              if (isset($user_name) && isset($user_email)) {
                  echo '<li><a href="bookingpage.php">Book Flight</a></li>';
              } else {
                  echo '<li><a href="login.html">Book Flight</a></li>';
              }
              ?>
            <li><a href="#">Cancel Booking</a></li>
          </ul>
        </li>
        <li><a href="login.html">Login</a></li>
        <li><a href="register.html">Register</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li>
          <!-- Add user logo icon with an onclick event to display user info -->
          <i class='fas fa-user-circle' style='font-size:24px;'></i>
        </li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <div class="typing-animation">Explore the world Travel the world with us</div>
    </article>
  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

<!-- Add a user info popup to display user information -->
<div id="userPopup" class="user-info-popup">
  <p>User Information</p>
  <?php if (isset($user_name) && isset($user_email)) : ?>
    <p>Name: <?php echo $user_name; ?> </p>
    <p>Email: <?php echo $user_email; ?></p>
    <p><a href="logout.php" style="color: white;"  onmouseover="this.style.color='blue'" onmouseout="this.style.color='white';">Sign Out</a></p>
  <?php endif; ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const userPopup = document.getElementById("userPopup");

  // Show user info popup when the user icon is clicked
  const userIcon = document.querySelector(".fa-user-circle");
  userIcon.addEventListener("click", function() {
    userPopup.classList.toggle("active");
  });

  // Hide user info popup when clicking outside of it
  document.addEventListener("click", function(event) {
    if (!userPopup.contains(event.target) && !userIcon.contains(event.target)) {
      userPopup.classList.remove("active");
    }
  });
});
</script>

<!-- JavaScript for the typing animation -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.querySelector(".typing-animation");
    const textToType = [
      "Click, Pack, and Jet Off to Your Destinations",
      "Discover the Magic of Stress-Free Adventures",
      "Vaayu - Where Every Journey Begins at the Top",
      "Your First Step Toward Unforgettable Experiences",
      "Reserve, Pack, Embark on Adventures with Vaayu",
      ];

    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeText() {
      const currentText = textToType[textIndex];
      if (isDeleting) {
        textElement.textContent = currentText.substring(0, charIndex - 1);
        charIndex--;

        if (charIndex === 0) {
          isDeleting = false;
          textIndex = (textIndex + 1) % textToType.length;
          setTimeout(typeText, 100); // Increase the delay to 3000ms (3 seconds)
        } else {
          setTimeout(typeText, 100);
        }
      } else {
        textElement.textContent = currentText.substring(0, charIndex + 1);
        charIndex++;

        if (charIndex === currentText.length) {
          isDeleting = true;
          setTimeout(typeText, 1500); // Increase the delay to 3000ms (3 seconds) after displaying the complete text
        } else {
          setTimeout(typeText, 100);
        }
      }
    }

    setTimeout(typeText, 1000);
  });
</script>

</body>
</html>
