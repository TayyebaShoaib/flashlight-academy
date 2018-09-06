<?php
    include('includes/header.php');
?>

<!-- ***** Map Start ***** -->

<div id="map"></div>
<script>
    function initMap()
    {
        // Map Options
        var options = {
            zoom: 16,
            center: {lat:51.5379, lng:-0.0763}
        }
        // New Map
        var map = new google.maps.Map(document.getElementById('map'), options);
        // Add Marker
        var marker = new google.maps.Marker({
            position: {lat:51.5379, lng:-0.0763},
            map: map
        });
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3kGn9Vac4dm092I6oVUY4y0DyrMmhqmc&callback=initMap">
</script>
<!-- ***** Map End ***** -->

<!-- ***** Contact Us Area Start ***** -->
<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Get in touch with us!</h2>
                    <div class="line-shape"></div>
                </div>
                <div class="footer-text">
                    <p>We'll send you epic weekly blogs, whitepapers and things to make your app startup thrive, all FREE!</p>
                </div>
                <div class="address-text">
                    <p><span>Address:</span> 40 Baria Sreet 133/2 NewYork City, US</p>
                </div>
                <div class="phone-text">
                    <p><span>Phone:</span> +11-225-888-888-66</p>
                </div>
                <div class="email-text">
                    <p><span>Email:</span> info.deercreative@gmail.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Start-->
                <div class="contact_from">
                    <?php
                        
                        $required = "";
                        $requiredEmail = "";
                        $requiredMsg = "";
                        $thanks = "";
                    
                        if (isset($_POST['submit'])) 
                        {

                            include('includes/connect.php');
                            // Assign Post Variables
                            $name = mysqli_real_escape_string($connect, $_POST['name']);
                            $company = mysqli_real_escape_string($connect, $_POST['company']);
                            $email = mysqli_real_escape_string($connect, $_POST['email']);
                            $number = mysqli_real_escape_string($connect, $_POST['number']);
                            $message = mysqli_real_escape_string($connect, $_POST['message']);    
                            
                            // Simple Validation
                            if ($name == "")
                            {
                                $required = "This field is required";
                            }
                            if ($email == "") 
                            {
                                $requiredEmail = "This field is required";
                            }
                            if ($message == "")
                            {
                                $requiredMsg = "This field is required";
                            }
                            else 
                            {
                                $sql = "INSERT INTO enquiries (fullName, companyName, phoneNumber, email, `message`)
                                        VALUES('$name', '$company', '$number', '$email', '$message')";

                                if ($connect->query($sql) == true)
                                {
                                    $thanks = "Your message has been sent successfully!";
                        
                                }
                                else 
                                {
                                    echo "Error: " . $sql . "<br/>" . $connect->error;
                                }
                            }
                        }
                    ?>
                    <form action="contact.php" method="POST">
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <h3 class="thanks"><?php echo $thanks; ?></h3>
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                                        <p class="required"><?php echo $required; ?></p>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyName">Company Name (if applicable)</label>
                                        <input type="text" name="company" class="form-control" id="companyName" placeholder="Company Name">
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="number">Email</label>
                                        <input type="email" name="email" class="form-control" id="number" placeholder="yourname@gmail.com">
                                        <p class="requiredEmail"><?php echo $required; ?></p>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="number">Phone Number (optional)</label>
                                        <input type="text" name="number" class="form-control" id="number" placeholder="Telephone or mobile number">
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Please write your message here</label>
                                        <textarea name="message" class="form-control" id="message" rows="3" placeholder="Message..."></textarea>
                                        <p class="requiredMsg"><?php echo $required; ?></p>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <input name="submit" type="submit" class="btn submit-btn" value="Send Now">
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Contact Us Area End ***** -->

<?php
    include('includes/footer.php');
?>
