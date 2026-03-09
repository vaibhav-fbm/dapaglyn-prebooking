<?php
require './middleware/auth.php';
require './config/database.php';

$limit = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $limit;

/* TOTAL RECORDS */
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM book_reservations");
$totalRow = $totalQuery->fetch_assoc();
$totalRecords = $totalRow['total'];

$totalPages = ceil($totalRecords / $limit);

/* PAGINATED DATA */
$result = $conn->query("SELECT * FROM book_reservations ORDER BY id DESC LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no,
minimum-scale=1.0, maximum-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/dapaglyn_prebooking/assets/img/favicon/favicon.ico">

    <title>Dapaglyn</title>

    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="./assets/vendor/css/core.css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">

                    <div class="d-flex justify-content-between w-100 align-items-center">

                        <div>
                            <span class="fw-semibold">
                                Hello <?php echo $_SESSION['username']; ?>
                            </span>
                        </div>

                        <div>
                            <a href="/dapaglyn_prebooking/logout" class="btn btn-sm btn-danger">
                                Logout
                            </a>
                        </div>

                    </div>

                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4 class="fw-bold m-0">
                                Prebooking Entries
                            </h4>

                            <a href="/dapaglyn_prebooking/export" class="btn btn-primary">
                                Download CSV
                            </a>

                        </div>

                        <!-- Table Card -->
                        <div class="card">

                            <div class="table-responsive text-nowrap">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>
                                            <th>Doctor</th>
                                            <th>Contact</th>
                                            <th>City</th>
                                            <th>Email</th>
                                            <th>Speciality</th>
                                            <th>Created At</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php while ($row = $result->fetch_assoc()) { ?>

                                            <tr>

                                                <td><?php echo $row['doctor_name']; ?></td>
                                                <td><?php echo $row['contact_number']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['speciality']; ?></td>
                                                <td><?php echo $row['created_at']; ?></td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>
                        <!-- / Table Card -->
                        <?php if ($totalRecords > 10) { ?>

                            <div class="card-body">

                                <nav aria-label="Page navigation" class="d-flex justify-content-end">

                                    <ul class="pagination justify-content-center">

                                        <!-- Previous -->

                                        <li class="page-item <?php if ($page <= 1) {
                                                                    echo 'disabled';
                                                                } ?>">

                                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">

                                                <i class="tf-icon bx bx-chevron-left"></i>

                                            </a>

                                        </li>

                                        <!-- Page Numbers -->

                                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>

                                            <li class="page-item <?php if ($page == $i) {
                                                                        echo 'active';
                                                                    } ?>">

                                                <a class="page-link" href="?page=<?php echo $i; ?>">

                                                    <?php echo $i; ?>

                                                </a>

                                            </li>

                                        <?php } ?>

                                        <!-- Next -->

                                        <li class="page-item <?php if ($page >= $totalPages) {
                                                                    echo 'disabled';
                                                                } ?>">

                                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">

                                                <i class="tf-icon bx bx-chevron-right"></i>

                                            </a>

                                        </li>

                                    </ul>

                                </nav>

                            </div>

                        <?php } ?>

                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">

                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

                            <div class="mb-2 mb-md-0">

                                © <script>
                                    document.write(new Date().getFullYear())
                                </script> Dapaglyn. All rights reserved.


                            </div>

                            <!-- <div>

                                <a href="#" class="footer-link me-4">Documentation</a>
                                <a href="#" class="footer-link me-4">Support</a>

                            </div> -->

                        </div>

                    </footer>
                    <!-- / Footer -->

                </div>
                <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->

        </div>
    </div>

    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>