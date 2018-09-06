<?php
    include('includes/header.html');
    include('includes/connect.php');
    $error = "";
    
    if (isset($_POST['submit'])) 
    {
        // Assign Post Variables
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $level = mysqli_real_escape_string($connect, $_POST['level']);
        $total_duration = mysqli_real_escape_string($connect, $_POST['total_duration']);
        $sessions = mysqli_real_escape_string($connect, $_POST['sessions']);
        $cost = mysqli_real_escape_string($connect, $_POST['cost']);
        $skills_required = mysqli_real_escape_string($connect, $_POST['skills']);
        $overview = mysqli_real_escape_string($connect, $_POST['overview']);
        // Simple Validation
        if ($name == '' || $category == '' || $level == '' || $total_duration == '' || $sessions == '' || $cost == '' || $skills_required == '' || $overview == '') 
        {
            // Set Error
            $error = "<div class='alert alert-danger'>Please fill out all required fields.</div>";
        }
        else 
        {
            $query = "INSERT INTO courses 
                      (name, category, course_level, total_duration, duration, cost, skills_required, overview)
                      VALUES('$name', '$category', '$level', '$total_duration', '$sessions', '$cost', '$skills_required', '$overview')";
            if ($connect->query($query) == true)
            {
                header("Location: http://localhost/sites/flashlight/admin/index.php?msg=" . urlencode('New course successfully added'));
            }
            else 
            {
                echo "Error: " . $query . "<br/>" . $connect->error;
            }
        }
    }
?>

<div class="container">
    <h3 class="my-5">Add a New Course</h3>

    <?php echo $error; ?>

    <form method="POST" action="add_course.php">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Course Name">
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Category</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category1" value="Web Design" checked>
                        <label class="form-check-label" for="category1">Web Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category2" value="Web Development">
                        <label class="form-check-label" for="category2">Web Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category3" value="Programming Languages">
                        <label class="form-check-label" for="category3">Programming Languages</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category4" value="Database / SQL">
                        <label class="form-check-label" for="category4">Database / SQL</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Course Level</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="level1" value="Beginner" checked>
                        <label class="form-check-label" for="level1">Beginner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="level2" value="Intermediate">
                        <label class="form-check-label" for="level2">Intermediate</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="level3" value="Advanced">
                        <label class="form-check-label" for="level3">Advanced</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="form-group row">
            <label for="total_duration" class="col-sm-2 col-form-label">Total Duration</label>
            <div class="col-sm-10">
                <input type="text" name="total_duration" class="form-control" id="total_duration" placeholder="15 hours">
            </div>
        </div>

        <div class="form-group row">
            <label for="sessions" class="col-sm-2 col-form-label">Sessions</label>
            <div class="col-sm-10">
                <input type="number" name="sessions" class="form-control" id="sessions" placeholder="4">
            </div>
        </div>

        <div class="form-group row">
            <label for="cost" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" name="cost" class="form-control" id="cost" placeholder="250">
            </div>
        </div>

        <div class="form-group row">
            <label for="skills" class="col-sm-2 col-form-label">Skills Required</label>
            <div class="col-sm-10">
                <textarea name="skills" class="form-control" id="skills" rows="4"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="overview" class="col-sm-2 col-form-label">Course Overview</label>
            <div class="col-sm-10">
                <textarea name="overview" class="form-control" id="overview" rows="4"></textarea>
            </div>
        </div>

        <div class="text-center mt-5">
            <input name="submit" type="submit" class="btn btn-primary" value="Submit">
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>

    </form>

</div>

<?php
	include('includes/footer.html');
?>