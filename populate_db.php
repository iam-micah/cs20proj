<?php 

//establish connection with database
    $server = "127.0.0.1";
    $userid = "ue25bvzryotbr";
    $pw = "klcyqkgf6pir";
    $db= "db4m4v99nim28z";

    //create connections
    $conn = new mysqli($server, $userid, $pw);

    //check connection
    if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
    }
    // getting all the variables
    $first_name = $_POST['Fname'];
    $last_name = $_POST['Lname'];
    $email = $_POST['Email'];
    $house_number = $_POST['House_number'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $zip = $_POST['Zip'];
    $price = $_POST['Price'];
    $bathrooms = $_POST['Bathrooms'];
    $description = $_POST['Descriptions'];
    $start_date = $_POST['Date_Start_Test_DatetimeLocal'];
    $end_date = $_POST['Date_End_Test_DatetimeLocal'];
    $room_image = $_POST['room_photo'];

    $location = $house_number." ".$street." ".$City." ".$zip;
    echo "console.log('help');";
   


    //run a query
    $sql = "INSERT INTO RoomData(`fname`, `lname`, `location`, `email`, `price`, `num_bathrooms`, `description`, `image`, `move_in_date`, `move_out_date`)
        VALUES (".$first_name.",".$last_name.",".$location.",".$email.",".$price.",".$bathrooms.",".$description.",".$room_image.",".$start_date.",".$end_date.")";

    $run = $conn->query($sql);



    
       
 //close connection
 $conn->close();
?>
