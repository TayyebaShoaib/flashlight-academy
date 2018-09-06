<?php
    include("includes/header.php");
    include('includes/connect.php');
    $query = "SELECT name, cost, batch_id, start_date, end_date, time, days, duration
              FROM course_details, courses
              WHERE course_details.course_id = courses.course_id";
    $result = $connect->query($query);
    
?>
    <div class="timetable">
        <div class="container">
            <table class="table table-striped">
                <tr>
                    <th>Course Title and Date</th>
                    <th>Days and Time</th>
                    <th>Batch ID</th>
                    <th>Duration</th>
                    <th>Price</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['name'] . "<br/>" . $row['start_date'] . " - " . $row['end_date'] ?></td>
                    <td><?php echo $row['days'] . "<br/>" . $row['time']; ?></td>
                    <td><?php echo $row['batch_id']; ?></td>
                    <td><?php echo $row['duration'] . " Sessions"; ?></td>
                    <td><?php echo "£" . $row['cost']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <?php
        include("includes/footer.php");
    ?>        