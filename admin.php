<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Chollerton Tearooms </title>

    <!-- CSS Linking-->
    <link rel="stylesheet" href="admin.css">

</head>

<body>

<!-- Header -->
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

<main>

    <!-- The content -->
    <!-- Everything is in container called div for stylesheet purposes-->
    <main>

        <!-- hero content -->
        <div class="heroccc">
            <!-- content for the hero -->
            <div class="hero-content">
                <h1 class="hero-title">CHOLLERTON TEAROOMS</h1>

                <h2><i>Escape to the countryside with our great deals</i></h2>
                <br>
                <br>
                <h3><i>Scroll down to see Admin details</i></h3>
                <br>
        </div>
    </main>
    <!-- Admin Page Title -->
    <h1 id="admin-title"> Admin Page </h1>
    <br>
    <br>
    <div class="main-div">
        <?php
        // This basically connect to the connection file

    include 'database_conn.php';
    // this orders the details users entered via PHPMYADMIN server and displays it neatly into the table
        //// it orders by surname and also uses inner join to use CT Category table
     $MYSQL = "SELECT forename, surname, email, landLineTelNo, mobileTelNo, postalAddress, sendMethod, catDesc
                from CT_expressedInterest INNER JOIN CT_category ON CT_category.catID = CT_expressedInterest.catID
                ORDER BY surname";

     // This basically ensures the SQL command is working
     $resultQuery = $dbConn -> query($MYSQL);

     if($resultQuery === false){
         echo "<p> ERROR: PROBLEM DISPLAYING USERS! PLEASE TRY AGAIN LATER</p>";
         exit;
     }
     else
     {
         // Formats the info neatly into the table like forename, surname,etc
         echo "<table>
        <tr>
        <th class = 'columnTitle'> Forename </th>
        <th class = 'columnTitle'> Surname </th>
        <th class = 'columnTitle'> Email </th>
        <th class = 'columnTitle'> LandLine Number </th>
        <th class = 'columnTitle'> Mobile Number </th>
        <th class = 'columnTitle'> Postal Address </th>
        <th class = 'columnTitle'> Send Method </th>
        <th class = 'columnTitle'> Category </th>
        </tr>";

            // Row Object fetches data one by one using variables like forename,surname and putting them into respective column declared above
         while($rowObj = $resultQuery-> fetch_object()){
             echo "

             <tr>
             <td class = 'forename'>{$rowObj->forename}</td>
               <td class = 'surname'>{$rowObj->surname}</td>
                 <td class = 'email'>{$rowObj->email}</td>
                   <td class = 'landLineTelNo'>{$rowObj->landLineTelNo}</td>
                     <td class = 'mobileTelNo'>{$rowObj->mobileTelNo}</td>
                       <td class = 'postalAddress'>{$rowObj->postalAddress}</td>
                         <td class = 'sendMethod'>{$rowObj->sendMethod}</td>
                           <td class = 'catDesc'>{$rowObj->catDesc}</td>
                 <tr>";
         }
     }
     // makes sure the fetch stream as well as the connection is closed
    $resultQuery->close();
     $dbConn->close();
     echo "</table>";
    ?>
    </div>
</main>
<br>
<br>
<br>

    <!-- This is the footer -->
    <footer>
        <span>Chollerton Tearooms<br>Copyright &copy; 2018 Northumbria University</span>
    </footer>
</body>
</html>
