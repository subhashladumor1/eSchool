<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <title>New School</title>

</head>

<body>


<?php

require('config.php');
include('../dbConnection.php');
include('../includes/header.php');

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $stu_email = $_SESSION['stu_email'];
    $amount = $_SESSION['price'];
    $course_id = $_SESSION['course_id'];
    date_default_timezone_set("Asia/Calcutta");
    $order_date = date('Y-m-d');

    $sql = "INSERT INTO courseorder (order_id , stu_email, course_id, response, razorpay_payment_id, amount, order_date ) VALUES ('$razorpay_order_id','$stu_email', '$course_id','Success','$razorpay_payment_id', '$amount', '$order_date')";
    if($conn->query($sql) == TRUE){
        echo "<div class='alert alert-success col-sm-6 ml-4 mt-5'>Payment Successfully
                <p> Payment ID: {$_POST['razorpay_payment_id']}</p></div>";

                echo "<h2>Redirecting to My Profile....</h2>";
                echo "<script>setTimeout(() => { window.location.href = '../Student/myCourse.php';}, 1500);</script>";
        
    }else {
        echo "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>unable to Payment</div>";
    }

    // $html = "<p class='alert alert-success col-sm-6 ml-4 mt-5'>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else {
    echo "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>unable to Payment <p>{$error}</p></div>";
}

// echo $html;

?>

 <!-- *********** End Admin Login Form Modal *************** -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

    <!-- jQUERY AND Boostrap JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/testislider.js"></script>

    <!-- Fontawesome JavaScript -->
    <script src="js/all.min.js"></script>
    <!-- Include New JavaScript File AJAXREQUEST  for Student Login / Signup Request-->
    <script src="js/ajaxrequest.js"></script>
    
    <!-- Include New JavaScript File AJAXREQUEST for Admin Login Request -->
    <script src="js/adminajaxrequest.js"></script>
</body>

</html>


