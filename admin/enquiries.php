<?php
    include('includes/header.html');
    include('includes/connect.php');
    $msg = "";
?>

<?php
    if (isset($_POST['delete'])) 
    {
        $id = $_GET['id'];
        $query = "DELETE FROM enquiries WHERE id = $id";
        if ($connect->query($query) == TRUE) 
        {
            $msg = "<div class='alert alert-danger'>Enquiry Deleted</div>";
        } 
        else 
        {
            $msg = "Error deleting record: " . $connect->error;
        }
    }
?>
<div class="container content pt-5">

	<div class="enquiries">
        <?php echo $msg; ?>
		<h2>Enquiries</h2>
		
		<table class="table table-striped">
        <?php 
            $query = "SELECT * FROM enquiries";
            $enquiries = $connect->query($query);
        ?>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Number</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($enquiry = mysqli_fetch_assoc($enquiries)): ?>
            <tr>
                <td hidden><?php $id = $enquiry['id']; ?></td>
                <th scope="row"><?php echo $enquiry['fullName']; ?></th>
                <td><?php echo $enquiry['companyName']; ?></td>
                <td><?php echo $enquiry['phoneNumber']; ?></td>
                <td><?php echo $enquiry['email']; ?></td>
                <td><?php echo $enquiry['message']; ?></td>
                <td>
                    <form action="enquiries.php?id=<?php echo $enquiry['id']; ?>" method="post" class="text-center">
                        <button type="submit" name="delete" onclick="return  confirm('Are you sure you want to delete this enquiry?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>                    
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
		</table>
	</div>
</div>



<?php
	include('includes/footer.html');
?>