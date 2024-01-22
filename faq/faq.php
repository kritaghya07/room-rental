<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQ</title>
    <link rel="stylesheet" href="faq1.css" />
  </head>
  <body>

    <?php include "../header/header1.php"; ?>

    <div class="container">
      <h2>Frequently Asked Questions</h2>
      <div class="accordion">
        <div class="accordion-item">
          <button id="accordion-button-1" aria-expanded="false">
            <span class="accordion-title">What is Room Rental System?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-2" aria-expanded="false">
            <span class="accordion-title">Why is the sky blue?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-3" aria-expanded="false">
            <span class="accordion-title">Will we ever discover aliens?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-4" aria-expanded="false">
            <span class="accordion-title">How much does the Earth weigh?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
        <div class="accordion-item">
          <button id="accordion-button-5" aria-expanded="false">
            <span class="accordion-title">How do airplanes stay up?</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut.
              Ut tortor pretium viverra suspendisse potenti.
            </p>
          </div>
        </div>
      </div>
    </div>
    <script src="faq.js"></script>

    <div class="cform">
      
    <h1>ContactUs</h1>

    <div class="inpfld">
    
    <form method="POST" action="faq.php">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>
        
        <label for="email">Email:</label><br>
        <input type="text" name="email" required><br>
        
        <label for="subject">Subject:</label><br>
        <input type="text" name="subject" required><br>
        
        <label for="message">Message:</label><br>
        <textarea name="message" rows="4" required></textarea><br>
        
        <input type="submit" value="Submit" name="submit">
    </form>
    </div>
    </div>
    <div class="foot">
 <?php include "../footer/footer.html"; ?>
</div>
  </body>
</html>

<?php
include '../connection.php';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  require_once '../connection.php';

$query = "INSERT INTO faq VALUES('$name','$email','$subject','$message')";
$res=mysqli_query($conn,$query);


  if ($res) {

    echo "<script>alert('message sent successfull')</script>";
    

  }else {
    echo "<script>alert('message failed')</script>";
  }
}

?>