<?php
    include("includes/header.php");
    include("includes/connect.php");
    $id = $_GET['id'];
    $query = "SELECT * FROM courses WHERE course_id=$id";
    $result = $connect->query($query);
    while($course = mysqli_fetch_assoc($result)):
?>
    
    <!-- Single Course Intro Start -->
    <div class="single-course-intro">
        <div class="single-course-intro-content">
            <p><?php echo $course['name']; ?></p>
            <div class="meta d-flex justify-content-center align-items-center">
                <span>Web Design</span>
                <span>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </span>
                <span>£<?php echo $course['cost']; ?></span>
            </div>
        </div>
    </div>
    <!-- Single Course Intro End -->

    <!-- Single Course Content Start -->
    <div class="single-course-content clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="about-course">
                        <h4>About this course</h4>
                        <?php echo $course['overview']; ?>
                        <h4>Skills required</h4>
                        <p><?php echo $course['skills_required']; ?></p>
                    </div>
                    <div class="dates-panel">
                        <h3>Course Dates, Prices &amp; Enrolment</h3>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">Dates</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="enrol">Enrol</th>
                                </tr>
                                <?php 
                                    $sql = "SELECT * FROM course_details where course_id=$id";
                                    $details = $connect->query($sql);
                                    while($row = mysqli_fetch_assoc($details)): ;
                                ?>
                                <tr>
                                    <td scope="col"><?php echo $row['start_date']; ?> - <?php echo $row['end_date']; ?> <br/> <?php echo $row['days']; ?></td>
                                    <td scope="col"><?php echo $row['time']; ?></td>
                                    <td scope="col"><?php echo $course['duration']; ?> Sessions</td>
                                    <td scope="col">£<?php echo $course['cost']; ?></td>
                                    <td scope="col" class="enrol"><a href="#">Enrol Now</a></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="side-widget d-flex flex-lg-column align-items-end align-items-lg-start">
                        <div class="features mr-md-4">
                            <h4 class="text-center">Course Features</h4>
                            <table class="text-center">
                                <tr>
                                    <td><h6>Course Level</h6></td>
                                    <td><h6>Beginner</h6></td>
                                </tr>
                                <tr>
                                    <td><h6>Total Duration</h6></td>
                                    <td><h6><?php echo $course['total_duration']; ?></h6></td>
                                </tr>
                                <tr>
                                    <td><h6>Sessions</h6></td>
                                    <td><h6><?php echo $course['duration']; ?></h6></td>
                                </tr>
                                <tr>
                                    <td><h6>Price</h6></td>
                                    <td><h6>£<?php echo $course['cost']; ?></h6></td>
                                </tr>
                            </table>
                        </div>
                        <div class="instructor">
                            <h4>
                                <a>Sarah Parker</a>
                                <small>Tutor</small>
                            </h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sunt, enim nihil voluptatibus porro ratione culpa!</p>
                        </div>
                    </div>
                    <div class="question">
                        <h3>Have a Question?</h3>
                        <p>Please read our <a href="#">frequently asked questions</a> or <a href="#">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <!-- Single Course Content End -->

    <?php
        include('includes/footer.php');
    ?>