<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/IDEstyle.css">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="./css/all.min.css">

    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="./style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>HTML Editor Online - Brave Coder</title>
</head>
<?php
include_once('./dbConnection.php');
include('./includes/header.php');
?>
<body>
    <section id="about-Home">
        <h2>Online IDE</h2>
    </section>
    <div class="container">
       
        <div class="row">
            <div class="col-lg-6 col-12">
                <h3 class="text-center">Code</h3>
                <button class="btn btn-outline-success mb-3" id="btn">Run</button>
                <div id="code"></div>
            </div>
            <div class="col-lg-6 col-12 output">
                <h3 class="text-center">Output</h3>
                <div id="output"></div>
            </div>
        </div>
    </div>

    <footer>
    <div class="footer-col">
      <h3>Top Products</h3>
      <li>Manage Reputation</li>
      <li>Power Tools</li>
      <li>Managed Website</li>
      <li>Marketing Service</li>
    </div>
    <div class="footer-col">
      <h3>Quick Links</h3>
      <li>Jobs</li>
      <li>Brand Assets</li>
      <li>investor Relations</li>
      <li>Terms of Service</li>
    </div>
    <div class="footer-col">
      <h3>Features</h3>
      <li>Manage Reputation</li>
      <li>Power Tools</li>
      <li>Managed Website</li>
      <li>Marketing Service</li>
    </div>
    <div class="footer-col">
      <h3>Resources</h3>
      <li>Guides</li>
      <li>Research</li>
      <li>Experts</li>
      <li>Marketing Service</li>
    </div>

    <div class="footer-col">
      <h3>Newsletter</h3>
      <p>you can trust us. we only send promo offers</p>
      <div class="subscribe">
        <input type="text" placeholder="Your Email Address">
        <a href="#" class="yellow">SUBSCRIBE</a>
      </div>
    </div>


    <!-- copyright section -->

    <div class="copyright">
      <p>Copyright @2022 All rights reserved</p>
      <div class="pro-links">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
      </div>
    </div>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script src="js/IDEscript.js"></script>
</body>

</html>