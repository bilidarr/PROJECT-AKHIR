<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- Site Icons -->
     <link rel="shortcut icon" href="css/logo.png" type="image/x-icon" />
    <title>LOGIN</title>
</head>

<body>

    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card shadow-sm my-3">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo "<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss = 'alert' aria-label = 'Close'> <span aria-hidden = 'true'>&times;</span></button> Username & Password Salah
                                    </div>";
                                }
                            }
                            ?>

                            <form method="POST" action="<?= "proses_login.php?aksi=login" ?>">
                                <div class="text-center">
                                <img src="css/logo.png" class="img-fluid" width="150px">
                                    <h3 class="h4 text-gray-900 mb-4">Selamat Datang</h3>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukan Username...">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukan Password...">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" id="password" class="btn btn-info" value="Sign In">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>