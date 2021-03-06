<?php
session_start();
$name;
    if (empty($_SESSION['accountID'])) {
            header('Location: login.php');
    } else if ($_SESSION['role'] == 0) {
            header('Location: employee.html');
    } else if (empty($_POST['name'])) {
        echo "You shouldn't be here.";
        exit();
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $accountID = $_POST['accountID'];
        $employeeDirCamera = 'employees/' . $accountID . "/" .$date . "/cameracapture/";
        $employeeDirScreen = 'employees/' . $accountID . "/" .$date . "/screencapture/";
        if (is_dir($employeeDirScreen)) {
            $imageFilesScreen = scandir($employeeDirScreen);
            $screenCapture = true;
        }
        else {
            $screenCapture = false;
        }
        if (is_dir($employeeDirCamera)) {
            $imageFilesCamera = scandir($employeeDirCamera);
            $cameraCapture = true;
        } else {
            $cameraCapture = false;
        }
    }
    
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Employees</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <!-- Bootstrap Table -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">WFH <span class="d-none d-sm-inline">Monitoring System</span></a>
            <div class="dropdown open ml-auto">
                <button class="btn btn-link text-light text-decoration-none dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user-cog fa-lg fa-fw"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="settings.php">
                        <i class="fas fa-cogs fa-fw"></i>
                        Settings</a>
                    <hr>
                    <a class="dropdown-item" href="php/logout.php">
                        <i class="fas fa-sign-out-alt fa-fw"></i>
                        Logout</a>
                </div>
            </div>
        </nav>
        <!-- /HEADER -->

        <!-- BODY -->
        <div class="container-fluid p-4">
            <a class="btn btn-link text-decoration-none text-dark" href="index.php">
                <i class="fas fa-arrow-left fa-lg fa-fw mr-2"></i> Back
            </a>
            <h4 class="text-center"><?php echo $name;?></h4>
            <legend class="text-center"><?php echo $date; ?></legend>
            <div class="row">
                <div class="col-md-6 border-left">
                    <h5 class="text-center">Camera Captures</h5>
                    <!-- <legend class="font-italic text-black-50 text-capitalize text-center">THERE ARE NO CAPTURES</legend> -->
                    <div class="card-columns">
                        <!-- <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src=" <?php echo $image; ?>">
                        </a> -->

                        <?php
                        if ($cameraCapture) {
                            foreach ($imageFilesCamera as $k => $v) {
                                if ($k < 2) continue;
                                $image = $employeeDirCamera . $imageFilesCamera[$k];
                            ?>
                                <a class="card border-0 shadow w-100" onclick='preview("<?php echo $image; ?>")' href="#">
                                <img class="card-img-top" src=" <?php echo $image; ?>">
                            </a>
                        <?php
                            } 
                        } else {
                            echo "No camera Images were captured.";
                        }  
                        ?>
                        <!-- <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a> -->
                    </div>
                </div>
                <div class="col-md-6 border-left">
                    <h5 class="text-center">Screen Captures</h5>
                    <!-- <legend class="font-italic text-black-50 text-capitalize text-center">THERE ARE NO CAPTURES</legend> -->
                    <div class="card-columns">
                        
                    <?php
                        if ($screenCapture) {
                            foreach ($imageFilesScreen as $k => $v) {
                                if ($k < 2) continue;
                                $image = $employeeDirScreen . $imageFilesScreen[$k];
                            ?>
                                <a class="card border-0 shadow w-100" onclick='preview("<?php echo $image; ?>")' href="#">
                                <img class="card-img-top" src=" <?php echo $image; ?>">
                            </a>
                    <?php
                            }
                        } else {
                            echo "No Screen capture Images were captured";
                        }
                         
                    ?>
                        <!-- <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a>
                        <a class="card border-0 shadow w-100" onclick='preview("img/image.jfif")' href="#">
                            <img class="card-img-top" src="img/image.jfif">
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /BODY -->

        <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                        <img id="ImagePreview" class="img-fluid" width="100%">
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
        
        <!-- Bootstrap Table -->
        <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
        <script src="js/preview.js"></script>
    </body>
</html>