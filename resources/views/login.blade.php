
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Door to Door Khulna</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
   
    
  </head>
  <body class="text-center">
        <div class="login">
            <form class="form-signin" method="post" enctype="multipart/form-data" action="{{ url('/validate') }}">
            {{ csrf_field() }}
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputText" class="sr-only">User ID</label>
                <input type="text" id="inputEmail" name="user_id" class="form-control" placeholder="User ID" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">Developed by <a href="http://futureitpark.com/">Future IT Park</a></p>
            </form>
        </div>
        <!-- /.login -->
</body>
</html>
