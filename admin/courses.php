<?php
	include('includes/header.html');
	include('includes/connect.php');

	$query = "SELECT * FROM courses";
	$courses = $connect->query($query);
?>

<div class="container content pt-5">
	<h2>Admin Area</h2>

	<div class="courses">
		<h3>Courses</h3>
		
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
	</div>
</div>



<?php
	include('includes/footer.html');
?>