<?php
session_start();

include 'dbcon.php';
$query ="SELECT * FROM entry";
$query_run =mysqli_query($conn,$query);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, ADMIN!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <div class="container mt-5">
    <div class="row">
        <div class="card">
            <?php include('message.php');?>
            <div class="card-header mt-3">
                <h4>read Dashboard
                    <a href="create.php" class="btn btn-primary float-end">ADD STUDENT</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run)>0){
                            foreach($query_run as $user){
                                ?>
                                <tr>
                                <td><?php echo $user['id'];?></td>
                                <td><?php echo $user['name'];?></td>
                                <td><?php echo $user['email'];?></td>
                                <td><?php echo $user['phone'];?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $user['id'];?>" class="btn btn-success btn-sm">View</a>
                                    <a href="edit.php?id=<?php echo $user['id'];?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?php echo $user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
           
            </div>
        </div>
    </div>
  </div>
   
</body>
</html>