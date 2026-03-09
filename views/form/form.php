<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/dapaglyn_prebooking/assets/img/favicon/favicon.ico">

    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/vendor/css/theme-default.css" />

    <link rel="stylesheet" href="/dapaglyn_prebooking/assets/css/demo.css" />

    <title>Dapaglyn</title>

    <style>
        @media (min-width:768px) {
            .page-center {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }


        .logo-img {
            width: 160px;
            margin: 15px;
        }

        .required {
            color: red;
            margin-left: 3px;
        }
    </style>

</head>

<body>

    <div class="page-center">

        <div class="col-md-6 col-lg-5">

            <div class="card">

                <div class="card-body">


                    <!-- LOGO -->
                    <div class="text-center mb-2">

                        <img
                            src="/dapaglyn_prebooking/assets/img/logo.png"
                            alt="Dapaglyn Logo"
                            class="logo-img">

                    </div>

                    <h4 class="text-center mb-3">Reserve Your Copy</h4>


                    <form method="POST" action="/dapaglyn_prebooking/controllers/form_submit.php">

                        <div class="mb-3">

                            <label class="form-label">Doctor Name<span class="required">*</span></label>

                            <input
                                type="text"
                                class="form-control"
                                name="doctor_name"
                                placeholder="Enter Doctor Name"

                                required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Contact Number <span class="required">*</span>
                            </label>

                            <input
                                type="tel"
                                class="form-control"
                                name="contact_number"
                                placeholder="Enter Contact Number"
                                maxlength="10"
                                pattern="[0-9]{10}"
                                title="Please enter a valid 10 digit contact number"
                                oninput="this.value = this.value.replace(/[^0-9]/g,'')"

                                required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">City<span class="required">*</span></label>

                            <input
                                type="text"
                                class="form-control"
                                name="city"
                                placeholder="Enter City"

                                required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">Email<span class="required">*</span></label>

                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Enter Email"

                                required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">Speciality<span class="required">*</span></label>

                            <input
                                type="text"
                                class="form-control"
                                name="speciality"
                                placeholder="Enter Speciality"
                                required>

                        </div>


                        <div class="text-center">

                            <button type="submit" class="btn btn-primary px-4">
                                Submit
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="responseModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="modalTitle"></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body" id="modalMessage"></div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        OK
                    </button>

                </div>

            </div>

        </div>

    </div>

    <script src="/dapaglyn_prebooking/assets/vendor/js/helpers.js"></script>
    <script src="/dapaglyn_prebooking/assets/js/config.js"></script>

    <script src="/dapaglyn_prebooking/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/dapaglyn_prebooking/assets/vendor/libs/popper/popper.js"></script>
    <script src="/dapaglyn_prebooking/assets/vendor/js/bootstrap.js"></script>

    <script src="/dapaglyn_prebooking/assets/js/main.js"></script>

    <?php if (isset($_SESSION['response'])): ?>

        <script>
            document.addEventListener("DOMContentLoaded", function() {

                var modal = new bootstrap.Modal(document.getElementById('responseModal'));

                var type = "<?= $_SESSION['response']['type'] ?>";
                var message = "<?= $_SESSION['response']['message'] ?>";

                document.getElementById("modalTitle").innerText = (type === "success") ? "Success" : "Error";
                document.getElementById("modalMessage").innerText = message;

                modal.show();

            });
        </script>

    <?php unset($_SESSION['response']);
    endif; ?>



</body>

</html>