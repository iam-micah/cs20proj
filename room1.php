<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tufts Sublet | Find Your Perfect Room</title>

        <!-- Link to CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            .main-top {
                margin-top: 6rem;
            }
            
            .room {
                display: flex;
                flex-direction: row;
                justify-content: center;
                min-height: 60vh;
            }
            
            .room-img img {
                height: 300px;
                width: 500px;
                object-fit: cover;
                overflow: hidden;
                border-radius: 1.5rem;
            }

            .room-desc {
                display: flex;
                flex-direction: column;
                margin-left: 20px;
            }

            .room-title {
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            #room-desc {
                margin-top: 10px;
            }

            .bxs-map {
                font-size: 27px;
                margin-left: -5px;
                padding-right: 5px;
            }
            
            .icon {
                font-size: 24px;
                padding-right: 5px;
            }

            .room-property {
                display: flex;
                flex-direction: row;
                align-items: center;
                margin-top: 10px;
            }

            #contact-btn-container {
                display: flex;
                margin-top: 20px;
            }

            @media screen and (max-width: 900px) {
                section {
                    padding-top: 0px;
                }

                .room {
                    flex-direction: column;
                }

                .room-img {
                    display: flex;
                    justify-content: center;
                    margin-bottom: 30px;
                }
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
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
                    <li><a href="find_room.html">Find Room</a></li>
                </ul>

                <!-- Log In Button -->
                <a href="#" class="login-btn">Log In</a>
            </div>
        </header>

        <!-- Image in First Column. Information in Second Column -->
        <section class="room container main-top" id="room">
            <?php
                //get the room id from the url
                $room_id = $_GET['roomId'];

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
                $sql = "SELECT * FROM RoomData where room_id = " . $room_id;
                $res = $conn->query($sql);
                $result = $res->fetch_assoc();

                //room image
                echo '<div class="room-img">';
                    echo '<img id="room-img-img" src=' . $result['image'] . ' alt="room">';
                echo '</div>';

                //room description
                echo '<div class="room-desc">';
                    echo '<div class="room-title">';
                        echo '<i class="bx bxs-map"></i>';
                        echo '<h1 id="room-title-h1">' . $result['location'] . '</h1>';
                    echo '</div>';

                    echo '<p id="room-desc">' . $result['description'] . '</p>';

                    echo '<div class="room-property">';
                        echo '<i class="bx bx-bed icon"></i>';
                        echo '<span id="room-num-bedrooms">' . $result['num_bedrooms'] . '</span>';
                    echo '</div>';

                    echo '<div class="room-property">';
                        echo '<i class="bx bx-bath icon"></i>';
                        echo '<span id="room-num-bathrooms">' . $result['num_bathrooms'] . '</span>';
                    echo '</div>';

                    echo '<div class="room-property">';
                        echo '<i class="bx bx-dollar icon"></i>';
                        echo '<span id="room-cost-per-month">' . $result['price'] . ' per month</span>';
                    echo '</div>';

                    echo '<div class="room-property">';
                        echo '<i class="bx bx-calendar icon"></i>';
                        echo '<span id="room-availability">' . $result['availability'] . '</span>';
                    echo '</div>';

                    echo '<div id="contact-btn-container">';
                        echo '<a href="mailto:' . $result['email'] . '" class="login-btn" id="contact-btn-link">Contact</a>';
                    echo '</div>';
                echo '</div>';

                //close connection
                $conn->close();
            ?>
        </section>

        <!-- Footer -->
        <section class="footer">
            <div class="footer-container container">
                <!-- Logo -->
                <a href="index.html" class="logo"><i class="bx bx-home"></i>Sublet Tufts</a>
                <div class="footer-box">
                    <h3>Quick Links</h3>
                    <a href="list_room.html">List Room</a>
                    <a href="find_room.html">Find Room</a>
                    <a href="index.html">Home</a>
                </div>
                <div class="footer-box">
                    <h3>Location</h3>
                    <a href="find_room.html">Somervile</a>
                    <a href="find_room.html">Medford</a>
                    <a href="find_room.html">On-Campus</a>
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
    </body>
</html>

