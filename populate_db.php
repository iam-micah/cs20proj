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

    //select the database
    $conn->select_db($db);

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
    $description = $_POST['Description'];
    $availability = $_POST['availability'];
    $room_image = $_POST['room_photo'];

    $Location = $house_number." ".$street." ".$city." ".$zip;
    
   


    //run a query
    $query = "INSERT INTO RoomData (fname,lname,location,email,price,num_bathrooms,description,image,availability)
        VALUES ('$first_name','$last_name','$Location','$email','$price','$bathrooms','$description','$room_image','$availability')";

    $run = $conn->query($query);

    if($run){
        echo"submitted successfully. If you received Warnings about your address, you might want to verify that it is right then resubmit the form!";
    }
    else{
        echo"not submitted";
    }


    
 //close connection
 $conn->close();
?>
