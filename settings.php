<?php
    session_start();
    if (empty($_SESSION['accountID'])) {
        header('Location: login.php');
    } else if ($_SESSION['role'] == 0) {
        header('Location: employee.php');

        $imageDirectory = 'employees/' . $_SESSION['accountID'] . "/" . date('Y-m-d');
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
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
                    <a class="dropdown-item" href="php/logout.php">Logout</a>
                </div>
            </div>
        </nav>
        <!-- /HEADER -->

        <!-- BODY -->
        <div class="container-fluid p-4 h-100">
            <a class="btn btn-link text-decoration-none text-dark" href="index.php">
                <i class="fas fa-arrow-left fa-lg fa-fw mr-2"></i> Back
            </a>
            <div class="row d-flex h-100 justify-content-center align-content-center">
                <div class="card border-0 shadow col-lg-4">
                    <div class="card-header">
                        <h4 class="car-title">Settings</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" class="needs-validation" novalidate>
                            <div class="form-group mb-4">
                                <label>Screenshot Option</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="random" id="Random">
                                        <label class="form-check-label" for="Random">Random</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="0" name="random" id="Scheduled">
                                        <label class="form-check-label" for="Scheduled">Scheduled</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="frequency">Frequency</label>
                                <div class="input-group">
                                    <input type="number" name="frequency" id="frequency" class="form-control" required min="1" value="1">
                                    <div class="input-group-append">
                                        <span class="input-group-text">per hour</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="delete">Days to delete images</label>
                                <input type="number" name="delete" id="delete" class="form-control" required min="0">
                                <small id="helpId" class="text-muted">0 to never delete</small>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save fa-fw"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /BODY -->

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
        <script src="js/formValidate.js"></script>
    </body>
</html>