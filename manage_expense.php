<?php
include('session.php');

$exp_fetched = mysqli_query($con, "SELECT * FROM expenses WHERE user_id = '$userid'");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset ="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/style.css">
        <script src="js/feather.min.js"></script>
        
        <title>Expense Manager-Dashboard</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="border-right" id="sidebar-wrapper">
        <div class="user">
            <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
            <h5><?php echo $username ?></h5>
            
            <p><?php echo $useremail ?></p>

</div>
<div class="siderbar-heading">Management</div>
<div class="list-group list-group-flush">
    <a href="index.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="home"></span>Dashboard</a>
    <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span>Add Expenses</a>
    <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span>Manage Expenses</a>


</div>
<div class="siderbar-heading">Setting</div>
<div class="list-group list-group-flush">
    <a href="profile.php" class="list-group-item list-group-item-action"><span data-feather="user"></span>Profile</a>
    <a href="change_password.php" class="list-group-item list-group-item-action "><span data-feather="key"></span>Change password</a>
    <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span>Logout</a>


</div>
</div>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
     <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
        <span data-feather="menu"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25" >
                
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Your Profile</a>
                <div class="dropdown-divider"></div> 
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>  
            </li> 
         </ul>
    </div> 
    </nav>
    <div class="container-fluid">
      <h3 class="text-center mt-4">Manage Expenses</h3>
      <hr>
      <div class="row justify-content-center">
        
        <div class="col-md-6 ">
            <table class="table table-hover table-bordered">
           <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Date</th>
                <th>Amout</th>
                <th>Expense category</th>
                <th colspan="2">Action</th>

                 


</tr>
</thead>
<?php $count=1; while($row=mysqli_fetch_array($exp_fetched)){?>
  
    <tr>
    <td> <?php echo $count; ?></td>
    <td> <?php echo $row['expensedate']; ?></td>
    <td> <?php echo '₹' .$row['expense']; ?></td>
    <td> <?php echo $row['expensecategory'];?></td>
    <td class="text-center">
        <a href="add_expense.php?edit=<?php echo $row['expense_id'];?>" class="btn btn-primary btn-sm">Edit</a>
</td>
<td class="text-center">
        <a href="add_expense.php?delete=<?php echo $row['expense_id'];?>" class="btn btn-danger btn-sm">Delete</a>
</td>
    
</tr>
<?php $count++;}?>

        </table>
           
</div>

</div>
</div>  
</div>
</div>
   


<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>


<script>
$("#menu-toggle").click(function(e) {
   
        e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    
});
</script>
<script>
feather.replace();
</script>




</body>
</html>