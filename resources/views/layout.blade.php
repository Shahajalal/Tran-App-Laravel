
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

  <script>

function checkallbox(iobj)
{
inputArray = document.getElementsByTagName("input");
for(i=0; i<inputArray.length; i++)
{
if(inputArray[i].type.toLowerCase() == "checkbox" && inputArray[i] != iobj && inputArray[i].name.toLowerCase() == 'chkbox[]')
{
tempCheckbox = inputArray[i];
if(tempCheckbox.checked)
{
		tempCheckbox.checked = false;
}
else
{
		tempCheckbox.checked = true;
}
}
}
}

</script>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">বেসরকারি ত্রাণ সহায়তা সেল</a>
  <form method="post" action="{{route('search')}}" onkeypress='return event.charCode 13' >
  {{ csrf_field() }}
  <input class="form-control form-control-dark w-100" name="id_or_no" type="text" placeholder="খুজুন..." aria-label="Search">
  </form>
  <ul class="navbar-nav sign-out px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href='{{route("signout")}}'>সাইন আউট</a>
      <!--<a href='{{route("reset-password")}}'>Password Reset</a>-->
    </li>
    <li class="nav-item text-nowrap">
      <a href='{{route("reset-password")}}'>রিসেট পাসওয়ার্ড </a>
</li>
  </ul>
</nav>



<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link  {{ Route::is('index') ? 'active' : '' }}" href='{{route("index")}}'>
              <span data-feather="home"></span>
              ড্যাশবোর্ড <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('applicants') ? 'active' : '' }}" href='{{route("applicants")}}'>
                <span data-feather="users"></span>
            আবেদনকারী
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('volunteer') ? 'active' : '' }}" href='{{route("volunteer")}}'>
            <span data-feather="bar-chart-2"></span>
              ভলেন্টিয়ার
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('admin') ? 'active' : '' }}" href='{{route("admin")}}'>
              <span data-feather="user"></span>
              এডমিন
            </a>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')
    
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="js/dashboard.js"></script></body>
</html>
