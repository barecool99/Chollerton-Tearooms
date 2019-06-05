<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chollerton Tearooms</title>
</head>
<body>
<link rel="stylesheet" href="fom.css">
<header>

    <!-- Main Logo used via royalty free logo site -->
    <a id="logo" href="index.html">
        <img src="img/logo.png" alt="Logo">

        <!-- This is the title beside the logo-->
        <div style="color: black">
            <h3>Chollerton Tearooms</h3>
        </div>
    </a>

    <!-- This is the Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="fom.html">FIND OUT MORE</a></li>
            <li><a href="admin.php">ADMIN</a></li>
            <li><a href="credits.html">CREDITS</a></li>
            <li><a href="Wireframe/Wireframe.pdf">WIREFRAME</a></li>

        </ul>
    </nav>

</header>
// div used to style the confirmation page
<div id="CentreEverything">
<?php
include 'database_conn.php';

// Form request is sent through the $_POST request. The array values are stored in independent variables.
// Before assigning superglobal array values, checks if they have a value.

$forename = isset($_REQUEST['forename']) ? $_REQUEST['forename'] : null;
$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$landLineTelNo = isset($_REQUEST['landLineTelNo']) ? $_REQUEST['landLineTelNo'] : null;
$mobileTelNo = isset($_REQUEST['mobileTelNo']) ? $_REQUEST['mobileTelNo'] : null;
$postalAddress = isset($_REQUEST['postalAddress']) ? $_REQUEST['postalAddress'] : null;
$sendMethod = isset($_REQUEST['sendMethod']) ? $_REQUEST['sendMethod'] : null;
$catID = isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null;

// This echos all the details user have entered in a HTML Confirmation page
echo "<section>\n";
echo "\t<h1> CONFIRMATION PAGE </h1>\n";
echo "\t<p>First name: $forename</p>\n";
echo "\t<p>Last name: $surname</p>\n";
echo "\t<p>Email: $email</p>\n";
echo "\t<p>Landline Number: $landLineTelNo</p>\n";
echo "\t<p>Mobile Number: $mobileTelNo</p>\n";
echo "\t<p>Address: $postalAddress</p>\n";


// this basically allows user to select different radio buttons and it displays relevant image choice after the form has been submitted
echo "\t<p> Facilities you might be interested: $sendMethod</p>\n";
if ($sendMethod == "Post") {
    echo "<img width ='60px' height='60px' src='img/post.png'>";
} else if ($sendMethod == "SMS") {

    echo "<img width ='60px' height='60px' src='img/sms.png'>";
} else if ($sendMethod == "Email") {
    echo "<img width ='60px' height='60px' src='img/email.png'>";
}


// This basically allows user to select different options from drop down lists and displays relevant image choice after the form has been submitted

if ($catID == "c5") {
    echo "\t<p>Choice you would like to know more about : Bed and Breakfast </p>\n";
    echo "<img width ='100px' height='100px' src='img/bedn.jpg'>";
} else if ($catID == "c2") {
    echo "\t<p>Choice you would like to know more about : Craftshop </p>\n";
    echo "<img width ='100px' height='100px' src='img/craft.jpg'>";
} else if ($catID == "c4") {
    echo "\t<p>Choice you would like to know more about : Postoffice </p>\n";
    echo "<img width ='100px' height='100px' src='img/postOffice.png'>";
} else if ($catID == "c1") {
    echo "\t<p>Choice you would like to know more about : Tearoom </p>\n";
    echo "<img width ='100px' height='100px' src='img/tearoom.png'>";
} else if ($catID == "c3") {
    echo "\t<p>Choice you would like to know more about : Villagestore </p>\n";
    echo "<img width ='100px' height='100px' src='img/villageshop.png'>";
}

// Validation for  form to check if any of the fields are empty
if (empty($forename) || empty($surname) || empty($email) || empty($landLineTelNo) || empty($mobileTelNo) || empty($postalAddress) || empty($catID)) {
    echo '<h2>Please fill in the missing fields</h2>';
    echo '<a href = " fom.html"? Go back </a>';
} else {
// taking the user  input and sets into the variables
    $sql = "INSERT INTO CT_expressedInterest(forename, surname, email, landlineTelNo, mobileTelNo, postalAddress, sendMethod, catID)
VALUES('$forename','$surname','$postalAddress','$landLineTelNo','$mobileTelNo','$email','$sendMethod','$catID')";
    $result = $dbConn->query($sql);

// an other  check if the variable we declared link is correct
    if ($result === false) {
        echo "<p>Problem when saving: " . $dbConn->error . ". Try again</p>\n</body>\n</html>";
        exit;
    } else {
        echo "<p>Thank you for the feedback! We will get in touch with you as soon as possible!</p>\n";
    }
    $dbConn->close();
}
?>
    <!-- This is the footer -->
    <footer>
        <span>Chollerton Tearooms<br>Copyright &copy; 2018 Northumbria University</span>
    </footer>
</div>
</body>

</html>
