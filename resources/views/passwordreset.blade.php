@extends('layout')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Password Reset</h1>
        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif
      </div>
      <section class="add-form">
      <form method="post" action="{{route('reset-password')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="old" placeholder="Old Password" required>
                    <input type="text" name="new" placeholder="New Password" required>
                    <input class="submit" type="submit" name="Submit">
                </div>
                
            </div>
            <!-- /.row -->
          </form>
      </section>
      <!-- /.add-form -->

    <footer class="navbar fixed-bottom navbar-expand-sm">
      <p>Developed by <a href="http://futureitpark.com/">Future IT Park</a> Contact us for any emergency support - 01750-106455</p>
    </footer>
    </main>
    @endsection
