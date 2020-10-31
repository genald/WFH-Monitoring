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
        <div class="container-fluid p-4">
            <div class="row">
                <div class="card border-0 shadow w-100">
                    <div class="card-body p-4">
                        <h4 class="card-title">Employees</h4>
                        <table class="table table-striped">
                            <thead class="thead-default">
                                <tr class="bg-dark text-light">
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <form> -->
                                    <?php 
                                    include('config/config.php');
                                    $managerID = $_SESSION['accountID'];
                                    $sql = "SELECT accountID, name from useraccounts where managerID = '$managerID' ";
                                    $conn = connectSql();
                                    $result = $conn->query($sql);
                                    if (mysqli_num_rows($result)>0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<form action='captures.php' method='post'>";
                                            echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>";
                                            echo '<input type="hidden" name="accountID" value="' . $row['accountID'] . '" required>';
                                            echo '<input type="hidden" name="name" value="' . $row['name'] . '" required>';
                                            echo '<input type="date" name="date" class="form-control" required>';
                                            echo '</td>';
                                            echo '<td class="text-center">';
                                            echo '<button type="submit" class="btn btn-info text-decoration-none">';
                                            echo '<i class="fas fa-image fa-fw"></i> View Captures';
                                            echo '</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                            echo "</form>";
                                        }
                                    }

                                    ?>


                                    <!-- <tr>
                                    <td> Manloctao, Genald Christian </td>
                                    <td>
                                        <input type="hidden" name="employee" required>
                                        <input type="date" name="date" class="form-control" required>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-info text-decoration-none">
                                            <i class="fas fa-image fa-fw"></i> View Captures
                                        </button>
                                    </td>
                                    </tr> -->
                                <!-- </form> -->
                            </tbody>
                        </table>
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
    </body>
</html>