<?php 
global $status;
include('config/config.php');
    if(isset($_POST['submit'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT accountID, name, password, role from useraccounts where accountID = '$username' ";
        $conn = connectSql();
        $result = $conn->query($sql);
        
		if (mysqli_num_rows($result)==1) {
            while ($row = mysqli_fetch_array($result)) {
                if(password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['accountID'] = $username;
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['name'] = $row['name'];
                    header('Location: index.php');
                } else {
                    $status = "0";
                }
            }
        } else {
            $status = "0";
        }

        $conn->close();
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">WFH <span class="d-none d-sm-inline">Monitoring System</span></a>
        </nav>
        <!-- /HEADER -->
        
        <div class="container vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card border-0 shadow h-auto mb-5">
                    <div class="card-body p-5">
                        <?php 
                        global $status;
                            if ($status == "0") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<strong>Wrong Username or Password</strong>';
                                echo '</div>';
                            }
                        
                        ?>
                        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group mb-4">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" name='submit'class="btn btn-info btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    </body>
</html>