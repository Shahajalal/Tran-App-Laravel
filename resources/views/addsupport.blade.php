@extends('layout')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">নতুন ভলেন্টিয়ার যোগ করুন</h1>
      </div>
      <section class="add-form">
      <form method="post" action="{{route('create_support')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Volunteer's Name" required>
                    <input type="text" name="mobile" placeholder="Mobile No" required>
                    <input type="text" name="father" placeholder="Father's Name" required>
                    <input type="text" name="mother" placeholder="Mother's Name" required>
                    <input type="text" name="national_id" placeholder="National ID / Passport" required>
                    <input type="text" name="occupation" placeholder="Occupation" required>
                    <input type="text" name="current_address" placeholder="Current Address" required>
                    <input type="text" name="permanent_address" placeholder="Permanent Address" required>
                    <input class="submit" type="submit" name="Submit">
                </div>
                <div class="col-md-6">
                    <input type="text" name="user_id" placeholder="User ID" required>
                    <input type="text" name="password" placeholder="Password" required>
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
