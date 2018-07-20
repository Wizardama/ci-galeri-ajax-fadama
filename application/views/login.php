<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="http://localhost/crud_ci/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/crud_ci/assets/css/main.css">

  <!-- Iconic Icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://localhost/crud_ci/assets/js/jquery-3.2.1.js"></script>
    <script src="http://localhost/crud_ci/assets/js/popper.min.js"></script>
    <script src="http://localhost/crud_ci/assets/js/bootstrap.min.js"></script>
  <title>Login - Fadama</title>
  </head>
  <body>

    <div class="push large"></div>

    <div class="container">
      <div class="col-lg-6" style="margin: auto;">
         <form>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
          <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="username" placeholder="Enter Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
          <div class="col-sm-10">
          <input type="password" class="form-control form-control-sm" id="password" placeholder="Enter Password">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
          <button id="btn-login" type="button" class="btn btn-primary">Login</button>
          </div>
        </div>
      </form>
      </div>
    </div>
    <script type="text/javascript">
       $('#btn-login').on('click', function() {
          var username = $('#username').val();
          var password = $('#password').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('user/user_login'); ?>",
            dataType : "html",
            data : {username : username, password: password},
            success : function(data) {
              console.log(data);
              if(data == 1){
                window.location = '<?php echo site_url('wuw'); ?>'
              }else{
                alert("Username atau password salah!");
              }
            }
          });
          return false;
        });
    </script>
   
  </body>
</html>