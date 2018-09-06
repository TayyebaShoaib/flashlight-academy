<!DOCTYPE html>
<html lang="en">
<?php 
    include('includes/connect.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Flashlight Academy</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.png">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated page-header">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="index.php">fa.</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Courses
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <ul class="multi-column-dropdown">
                                                        <li>
                                                            <h5>Web Design</h5>
                                                        </li>
                                                        <hr/>
                                                        <?php 
                                                            $query = "SELECT name, course_id
                                                                      FROM courses 
                                                                      WHERE category = 'Web Design'";
                                                            $result = $connect->query($query);
                                                            while($row = mysqli_fetch_assoc($result)):
                                                        ?>
                                                        <li>
                                                            <a href="course.php?id=<?php echo $row['course_id']; ?>""><?php echo $row['name']?></a>
                                                        </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4">
                                                    <ul class="multi-column-dropdown">
                                                        <li>
                                                            <h5>Web Development</h5>
                                                        </li>
                                                        <hr/>
                                                        <?php 
                                                            $query = "SELECT name, course_id
                                                                      FROM courses 
                                                                      WHERE category = 'Web Development'";
                                                            $result = $connect->query($query);
                                                            while($row = mysqli_fetch_assoc($result)):
                                                        ?>
                                                        <li>
                                                            <a href="course.php?id=<?php echo $row['course_id']; ?>""><?php echo $row['name']?></a>
                                                        </li>
                                                        <?php endwhile; ?>
                                                        <hr/>
                                                        <li>
                                                            <h5>Database / SQL</h5>
                                                        </li>
                                                        <hr/>
                                                        <?php 
                                                            $query = "SELECT name, course_id
                                                                      FROM courses 
                                                                      WHERE category = 'Database / SQL'";
                                                            $result = $connect->query($query);
                                                            while($row = mysqli_fetch_assoc($result)):
                                                        ?>
                                                        <li>
                                                            <a href="course.php?id=<?php echo $row['course_id']; ?>""><?php echo $row['name']?></a>
                                                        </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4">
                                                    <ul class="multi-column-dropdown">
                                                        <li>
                                                            <h5>Programming Languages</h5>
                                                        </li>
                                                        <hr/>
                                                        <?php 
                                                            $query = "SELECT name, course_id
                                                                      FROM courses 
                                                                      WHERE category = 'Programming Languages'";
                                                            $result = $connect->query($query);
                                                            while($row = mysqli_fetch_assoc($result)):
                                                        ?>
                                                        <li>
                                                            <a href="course.php?id=<?php echo $row['course_id']; ?>""><?php echo $row['name']?></a>
                                                        </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="timetable.php">Timetable</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="faq.php">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->