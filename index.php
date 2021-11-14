<?php
$insert = false;
if(isset($_POST['name'])){
    //Set Variable connection
    $server = "localhost";
    $username = "root";
    $password = "";
    //Create a database Connection
    $con = mysqli_connect($server, $username, $password);
    
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Successfully connected to the database.";
    //Collect POST Variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $date = $_POST['date'];
    $sql = "INSERT INTO `skilltest`.`form` (`Name`, `Email`, `Designation`, `Salary`, `Date`) VALUES
    ('$name', '$email', '$designation', '$salary', '$date');";
    //echo $sql;

    //Execute the query
    if($con->query($sql) == true){
        //echo "successfully Inserted.";
        //Flag for successfull insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    //Close the Database Connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap" rel="stylesheet">
    <h1>Programming Skill Test</h1>
    <p>Enter your details here and submit this form.</p>
    <?php
    if($insert == true){
    echo "<p class='submit'>Thanks for submitting the form.</p>";
}
?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name here">
        <input type="email" name="email" id="email" placeholder="Enter your Email here">
        <input type="text " name="designation" id="designation" placeholder="Enter your Designation Number">
        <input type="int" name="salary" id="salary" placeholder="Enter your Salary here">
        <input type="int" name="date" id="date" placeholder="Enter Date here">
        <button class="btn">Submit</button>
    </form>
    </div>
    <script src="index.js"></script>
</body>
</html>