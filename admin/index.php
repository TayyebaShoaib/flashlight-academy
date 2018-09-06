<?php
	include('includes/header.html');
	include('includes/connect.php');

	$query = "SELECT * FROM courses 
			  ORDER BY course_id DESC 
			  LIMIT 6";
	$courses = $connect->query($query);
?>

<div class="container content index pt-5">

	<?php 
		if (isset($_GET['msg'])) {
			echo "<div class='alert alert-success'>" . htmlentities($_GET['msg']) . "</div>";
		}
	?>

	<div class="courses">
		<h2>Courses</h2>
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Category</th>
					<th scope="col">Cost</th>
					<th scope="col">Total Duration</th>
				</tr>
			</thead>
			<tbody>
				<?php while($course = mysqli_fetch_assoc($courses)): ?>
				<tr>
					<td scope="row"><?php echo $course['course_id']; ?></td>
					<td><a href="edit_course.php?id=<?php echo $course['course_id']; ?>"><?php echo $course['name']; ?></a></td>
					<td><?php echo $course['category']; ?></td>
					<td><?php echo $course['cost']; ?></td>
					<td><?php echo $course['total_duration']; ?></td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>

		<a href="courses.php" class="btn btn-success btn-lg">View All Courses</a>
	</div>

		<hr>

	<div class="enquiries">
		<h2>Enquiries</h2>
		
		<table class="table table-striped">
			<?php 
				$query = "SELECT * FROM enquiries LIMIT 6";
				$enquiries = $connect->query($query);
			?>
			<thead>
				<tr>
				<th scope="col">Name</th>
				<th scope="col">Company Name</th>
				<th scope="col">Number</th>
				<th scope="col">Email</th>
				<th scope="col">Message</th>
				</tr>
			</thead>
			<tbody>
				<?php while($enquiry = mysqli_fetch_assoc($enquiries)): ?>
				<tr>
					<th scope="row"><?php echo $enquiry['fullName']; ?></th>
					<td><?php echo $enquiry['companyName']; ?></td>
					<td><?php echo $enquiry['phoneNumber']; ?></td>
					<td><?php echo $enquiry['email']; ?></td>
					<td><?php echo $enquiry['message']; ?></td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>

		<a href="enquiries.php" class="btn btn-success btn-lg">View All Enquiries</a>
	</div>
</div>



<?php
	include('includes/footer.html');
?>