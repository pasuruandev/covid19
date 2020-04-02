<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Covid19 - PasuruanDev | Login</title>

  <!-- Custom fonts for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= url('dist/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <br><br><br>
                    <h1 class="h4 text-gray-900 mb-4">Login untuk memulai Sesi</h1>
                  </div>
                  <form id="form" class="user" method="POST" action="<?= route('login.index') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" aria-describedby="emailHelp" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <br><br><br>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= url('dist/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= url('dist/js/script.js') ?>"></script>

<script>
  $(document).ready(function() {
    $("#form").on("submit", function(e) {
      e.preventDefault();
      $(this).find('.alert').remove();
      const $button = $(this).find("[type='submit']");
      $button.loading();
      const form = $("#form").serialize();
      $.post(`<?= route('login.index') ?>/ajax`, form)
      .done(res => {
        if (res == "Success") window.location.assign(`<?= route('dashboard.index') ?>`);
      })
      .fail(res => {
        if (res.status == 401) alert("Pengguna Tidak dikenali");
        // $(this).prepend(`<div class="alert alert-danger" role="alert">${res.responseText}</div>`)
      })
      .always(() => {
        $button.loading(false);
      });
    })
  })
</script>

</body>

</html>
