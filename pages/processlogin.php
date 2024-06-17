<?php
require('../includes/connection.php');
require('session.php');

if (isset($_POST['btnlogin'])) {
    $users = trim($_POST['user']);
    $upass = trim($_POST['password']);
    $h_upass = sha1($upass);

    if ($upass == '') {
       
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
         
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        </head>
        <body>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password is missing!',
                }).then(function() {
                    window.location = "login.php";
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        // Create SQL statement to check credentials
        $sql = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, e.EMAIL, e.PHONE_NUMBER, j.JOB_TITLE, l.PROVINCE, l.CITY, t.TYPE
                FROM `users` u
                JOIN `employee` e ON e.EMPLOYEE_ID = u.EMPLOYEE_ID
                JOIN `location` l ON e.LOCATION_ID = l.LOCATION_ID
                JOIN `job` j ON e.JOB_ID = j.JOB_ID
                JOIN `type` t ON t.TYPE_ID = u.TYPE_ID
                WHERE `USERNAME` = '" . $users . "' AND `PASSWORD` = '" . $h_upass . "'";
        $result = $db->query($sql);

        if ($result) {
            // Check if there are results
            if ($result->num_rows > 0) {
                $found_user = mysqli_fetch_array($result);
                // Store user data in session variables
                $_SESSION['MEMBER_ID'] = $found_user['ID'];
                $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME'];
                $_SESSION['LAST_NAME'] = $found_user['LAST_NAME'];
                $_SESSION['GENDER'] = $found_user['GENDER'];
                $_SESSION['EMAIL'] = $found_user['EMAIL'];
                $_SESSION['PHONE_NUMBER'] = $found_user['PHONE_NUMBER'];
                $_SESSION['JOB_TITLE'] = $found_user['JOB_TITLE'];
                $_SESSION['PROVINCE'] = $found_user['PROVINCE'];
                $_SESSION['CITY'] = $found_user['CITY'];
                $_SESSION['TYPE'] = $found_user['TYPE'];

                // Redirect based on user type
                if ($_SESSION['TYPE'] == 'Admin') {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Login Page</title>
                        <!-- Include SweetAlert CSS -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                    </head>
                    <body>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: 'success',
                                title: '<?php echo $_SESSION['FIRST_NAME']; ?> Welcome!',
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
                    </body>
                    </html>
                    <?php
                } elseif ($_SESSION['TYPE'] == 'User') {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Login Page</title>
                        <!-- Include SweetAlert CSS -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                    </head>
                    <body>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                icon: 'success',
                                title: '<?php echo $_SESSION['FIRST_NAME']; ?> Welcome!',
                            }).then(function() {
                                window.location = "pos.php";
                            });
                        </script>
                    </body>
                    </html>
                    <?php
                }
            } else {
                // No result found (invalid credentials)
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Login Page</title>
                    <!-- Include SweetAlert CSS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                </head>
                <body>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script type="text/javascript">
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Username or Password Not Registered! Contact Your administrator.',
                        }).then(function() {
                            window.location = "login.php";
                        });
                    </script>
                </body>
                </html>
                <?php
            }
        } else {
            // SQL query error
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    $db->close();
}
?>
