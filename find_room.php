<!DOCTYPE html>
<html>
<head>
<title> Find Room </title>


<!-- Link to CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="css/styles.css">

<style>
    .main-top {
        margin-top: 6rem;
    }
    
</style>
</head>



<body>

    <script
	src="https://code.jquery.com/jquery-3.6.1.js"
	integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
	crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Navbar -->
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.html" class="logo"><i class="bx bx-home"></i>Sublet Tufts</a>
            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class="bx bx-menu" id="menu-icon"></i></label>
            <!-- Nav List -->
            <ul class="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="list_room.html">List Room</a></li>
                <li><a href="find_room.php">Find Room</a></li>
            </ul>

            <!-- Log In Button -->
            <a href="#" class="login-btn">Log In</a>
        </div>
    </header>


    <!-- Rooms -->
    <section class="rooms container main-top" id="rooms">
        <div class="heading">
            <span>Recent Listings</span>
            <h2>Our Featured Spaces</h2>
            <p> Check out all our listings</p>
        </div>
        <div class="rooms-container container">
            <?php
                //establish connection with database
                $server = "127.0.0.1";
                $userid = "ue25bvzryotbr";
                $pw = "klcyqkgf6pir";
                $db= "db4m4v99nim28z";

                //create connections
                $conn = new mysqli($server, $userid, $pw, $db);

                //check connection
                if($conn->connect_error){
                    die("connection failed: ". $conn->connect_error);
                }

                //get room data from the database
                $sql = "SELECT * FROM RoomData";
                $res = $conn->query($sql);

                while ($room = $res->fetch_assoc()) {
                    echo '<div class="box" onclick="navigateToRoom(' . $room['room_id'] .')">';
                        echo '<img src="' . $room['image'] . '" alt="picture1">';
                        echo '<h3>$' . $room['price'] . '</h3>';
                        echo '<div class="content">';
                            echo '<div class="tex">';
                                echo '<h3>' . $room['location'] . '</h3>';
                                echo '<p>' . $room['availability'] . '</p>';
                            echo '</div>';
                            echo '<div class="icon">';
                                echo '<i class="bx bx-bed"><span>' . $room['beds'] . '</span></i>';
                                echo '<i class="bx bx-bath"><span>' . $room['baths'] . '</span></i>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';    
                }
            ?>
        </div>
    </section>


    <!-- Footer -->
   <section class="footer">
	<div class="footer-container container">
		<!-- Logo -->
		<a href="index.html" class="logo"><i class="bx bx-home"></i>Sublet Tufts</a>
		<div class="footer-box">
			<h3>Quick Links</h3>
			<a href="list_room.html">List Room</a>
			<a href="#">Find Room</a>
			<a href="index.html">Home</a>
		</div>
		<div class="footer-box">
			<h3>Location</h3>
			<a href="find_room.php">Somervile</a>
			<a href="find_room.php">Medford</a>
			<a href="find_room.php">On-Campus</a>
		</div>
		<div class="footer-box">
			<h3>Contact</h3>
			<a href="#">(617) 999 9999</a>
			<a href="#">help@tsublet.com</a>
			<div class="social">
				<a href="#"><i class="bx bxl-facebook"></i></a>
				<a href="#"><i class="bx bxl-twitter"></i></a>
				<a href="#"><i class="bx bxl-instagram"></i></a>
			</div>
		</div>
	</div>
</section>

    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; Four Musketeers All Rights Reserved |<a href="privacy.html" style="color: #fff; text-decoration: none;">Privacy and Policy</a> </p>
    </div>

    <script>
        function navigateToRoom(roomId) {
            window.location.href = "room.php?roomId=" + roomId;
        }
    </script>
</body>
</html>
