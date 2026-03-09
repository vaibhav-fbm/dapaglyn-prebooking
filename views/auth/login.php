<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_SESSION['user_id'])) {
    header("Location: /dashboard");
    exit;
}
?>

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

    <title>Dapaglyn</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css">
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="/assets/css/demo.css">

    <!-- Page CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <script src="/assets/js/config.js"></script>

</head>

<body>

    <div class="container-xxl">

        <div class="authentication-wrapper authentication-basic container-p-y">

            <div class="authentication-inner">

                <div class="card">

                    <div class="card-body">

                        <div class="text-center mb-3">

                            <img
                                src="/assets/img/logo.png"
                                alt="Dapaglyn Logo"
                                style="width:140px;">
                        </div>

                        <h4 class="mb-1">Admin Login</h4>

                        <p class="mb-3">Please sign in to continue</p>



                        <?php if (isset($_SESSION['login_error'])) { ?>

                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['login_error']; ?>
                            </div>

                        <?php unset($_SESSION['login_error']);
                        } ?>


                        <form class="mb-3" method="POST" action="/controllers/login_process.php">

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
                                        id="password"
                                        placeholder="Enter password"
                                        required>

                                    <span class="input-group-text cursor-pointer" id="togglePassword">

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

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const icon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', function() {

            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            icon.classList.toggle('bx-hide');
            icon.classList.toggle('bx-show');

        });
    </script>

    <!-- Core JS -->

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>

    <script src="/assets/vendor/libs/popper/popper.js"></script>

    <script src="/assets/vendor/js/bootstrap.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>

    <script src="/assets/js/main.js"></script>

</body>

</html>