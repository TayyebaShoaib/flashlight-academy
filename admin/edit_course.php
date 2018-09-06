<?php
	include('includes/header.html');
    include('includes/connect.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM courses WHERE course_id=$id";
    $course = $connect->query($query);
    $msg = "";
    $error = "";
?>

<?php
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
            // $id = $_GET['id'];
            $query = "UPDATE courses 
                      SET `name` = '$name', category = '$category', course_level = '$level', total_duration = '$total_duration', duration = '$sessions', cost = '$cost', skills_required = '$skills_required', overview = '$overview'
                      WHERE course_id = $id";                      
    
            if ($connect->query($query) == TRUE) 
            {
                $msg = "<div class='alert alert-success'>Record Updated Successfully</div>";
            } 
            else 
            {
                $msg = "Error updating record: " . $connect->error;
            }
        }
    }
?>

<?php
if (isset($_POST['delete'])) 
{
    $query = "DELETE FROM courses WHERE course_id = $id";
    
    if ($connect->query($query) == TRUE) 
    {
        header("Location: http://localhost/sites/flashlight/admin/index.php?msg=" . urlencode('Record Deleted'));
    } 
    else 
    {
        $msg = "Error deleting record: " . $connect->error;
    }
}
?>

<div class="container">
    <h3 class="text-center">Edit Course</h3>
    <?php echo  $msg; ?>
    <?php echo  $error; ?>
    <form method="POST" action="edit_course.php?id=<?php echo $id; ?>">
        <?php while($row = mysqli_fetch_assoc($course)): ?>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name']; ?>">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Category</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category1" value="Web Design"  <?php if ($row['category'] == 'Web Design' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="category1">Web Design</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category2" value="Web Development" <?php if ($row['category'] == 'Web Development' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="category2">Web Development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category3" value="Programming Languages" <?php if ($row['category'] == 'Programming Languages' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="category3">Programming Languages</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category4" value="Database / SQL"<?php if ($row['category'] == 'Database / SQL' ) echo 'checked'; ?>>
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
                        <input class="form-check-input" type="radio" name="level" id="level1" value="Beginner" 
                            <?php if ($row['course_level'] == 'Beginner' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="level1">Beginner</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="level2" value="Intermediate"
                            <?php if ($row['course_level'] == 'Intermediate' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="level2">Intermediate</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="level3" value="Advanced"
                            <?php if ($row['course_level'] == 'Advanced' ) echo 'checked'; ?>>
                        <label class="form-check-label" for="level3">Advanced</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label for="total_duration" class="col-sm-2 col-form-label">Total Duration</label>
            <div class="col-sm-10">
                <input type="text" name="total_duration" class="form-control" id="total_duration"  value="<?php echo $row['total_duration']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="sessions" class="col-sm-2 col-form-label">Sessions</label>
            <div class="col-sm-10">
                <input type="number" name="sessions" class="form-control" id="sessions"  value="<?php echo $row['duration']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="cost" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" name="cost" class="form-control" id="cost" value="<?php echo $row['cost']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="skills" class="col-sm-2 col-form-label">Skills Required</label>
            <div class="col-sm-10">
                <textarea name="skills" class="form-control" id="skills" rows="4"><?php echo $row['skills_required']; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="overview" class="col-sm-2 col-form-label">Course Overview</label>
            <div class="col-sm-10">
                <textarea name="overview" class="form-control" id="overview" rows="4"><?php echo $row['overview']; ?></textarea>
            </div>
        </div>

        <div>
            <input name="submit" type="submit" class="btn btn-primary" value="Submit">
            <input name="delete" onclick="return  confirm('Are you sure you want to delete this course?')" type="submit" class="btn btn-danger" value="Delete">
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php
    endwhile;
	include('includes/footer.html');
?>