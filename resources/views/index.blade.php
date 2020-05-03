@extends('layout')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ড্যাশবোর্ড</h1>
      </div>

    <section id="statistics">
        <div class="row">
            <div class="col-md-4">
                <div class="all-applicant">
                    <h1 class="title">মোট আবেদনকারী</h1>
                    <h2 class="stats">{{$document}}</h2>
                </div>
                <!-- /.all-applicant -->
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <div class="all-applicant">
                    <h1 class="title">সহায়তা প্রদান করা হয়েছে</h1>
                    <h2 class="stats">{{$documentSuccess}}</h2>
                </div>
                <!-- /.all-applicant -->
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <div class="all-applicant">
                    <h1 class="title">ভলেন্টিয়ার</h1>
                    <h2 class="stats">{{$support}}</h2>
                </div>
                <!-- /.all-applicant -->
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /#statistics -->
    
    <footer class="navbar fixed-bottom navbar-expand-sm">
          <p>Developed by <a href="http://futureitpark.com/">Future IT Park</a> Contact us for any emergency support - 01750-106455</p>
        </footer>
    
    </main>
@endsection
