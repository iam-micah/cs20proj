<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
    <script>
console.log("heyyy process page");

</script>
	<?php

    // getting all the variables
    $first_name = $_GET['Fname'];
    $last_name = $_GET['Lname'];
    $email = $_GET['Email'];
    $house_number = $_GET['House_number'];
    $street = $_GET['Street'];
    $city = $_GET['City'];
    $zip = $_GET['Zip'];
    $price = $_GET['Price'];
    $bathrooms = $_GET['Bathrooms'];
    $description = $_GET['Descriptions'];
    $start_date = $_GET['Date_Start_Test_DatetimeLocal'];
    $end_date = $_GET['Date_End_Test_DatetimeLocal'];
    $room_image = $_GET['room_photo'];

    $location = $house_number." ".$street." ".$City." ".$zip;

    //establish connection with database
    $server = "localhost";
    $userid = "ue25bvzryotbr";
    $pw = "klcyqkgf6pir";
    $db= "db4m4v99nim28z";

    //create connections
    $conn = new mysql($server, $userid, $pw);

    //check connection
    if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
    }


    //run a query
    $sql = "INSERT INTO `RoomData`(`fname`, `lname`, `location`, `email`, `price`, `num_bathrooms`, `description`, `image`, `move_in_date`, `move_out_date`)
    VALUES (".$first_name.",".$last_name .",".$location.",".$email",".$price.",".$bathrooms.",".$description.",".$room_image.",".$start_date.",".$end_date.")";

    $conn->query($sql);



    
       
 //close connection
 $conn->close();
    ?>
</body>
</html>