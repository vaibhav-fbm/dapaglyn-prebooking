<!DOCTYPE html>
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/dapaglyn_prebooking/assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/fonts/boxicons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/css/core.css">
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/css/demo.css">

    <!-- Page CSS -->
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="/dapaglyn_prebooking/assets/vendor/js/helpers.js"></script>

    <script src="/dapaglyn_prebooking/assets/js/config.js"></script>

</head>

<body>

    <div class="container-xxl">

        <div class="authentication-wrapper authentication-basic container-p-y">

            <div class="authentication-inner">

                <div class="card">

                    <div class="card-body">

                        <h4 class="mb-2">Admin Login</h4>

                        <p class="mb-4">Please sign in to continue</p>


                        <form class="mb-3" method="POST" action="/dapaglyn_prebooking/controllers/login_process.php">

                            <div class="mb-3">

                                <label class="form-label">Username</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    placeholder="Enter username"
                                    required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">Password</label>

                                <div class="input-group input-group-merge">

                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Enter password"
                                        required>

                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>

                                </div>

                            </div>


                            <div class="mb-3">

                                <button class="btn btn-primary d-grid w-100" type="submit">

                                    Login

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Core JS -->

    <script src="/dapaglyn_prebooking/assets/vendor/libs/jquery/jquery.js"></script>

    <script src="/dapaglyn_prebooking/assets/vendor/libs/popper/popper.js"></script>

    <script src="/dapaglyn_prebooking/assets/vendor/js/bootstrap.js"></script>

    <script src="/dapaglyn_prebooking/assets/vendor/js/menu.js"></script>

    <script src="/dapaglyn_prebooking/assets/js/main.js"></script>

</body>

</html>