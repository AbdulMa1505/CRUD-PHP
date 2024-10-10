<?php
require 'dbcon.php';
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, ADMIN!</h1>
    <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hola!</strong> This is the records
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        <div class="row ">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">
                            VIEW DASHBOARD
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h1>
                    </div>
                    <div class="card-body mb-3">
                        <?php
                        if(isset($_GET['id'])){
                             $user_id =$_GET['id'];
                            $query="SELECT * FROM entry WHERE id='$user_id' ";

                            $query_run =mysqli_query($conn,$query);
                            if(mysqli_num_rows($query_run)>0){
                                
                                    $user =mysqli_fetch_assoc($query_run);
                                    ?>
                                        <form action="code.php" method="post">
                                            <div class="form-group mb-3">
                                                <label for="">Name</label>
                                                <p class="form-control">
                                                <?php echo $user['name'];?>"
                                                </p>
                                                
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Email</label>
                                                <p class="form-control">
                                                <?php echo $user['email'];?>

                                                </p>
                                               
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Phone</label>
                                                <p class="form-control">
                                                <?php echo $user['phone'];?>"
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-center mt-3">
                                            <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        
                                        </form>
                                    <?php
                                
                            }
                            else{
                                echo "No RECORD NOT FOUND";
                            }

                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>