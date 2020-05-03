@extends('layout')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">এডমিন</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Import</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
          </div> -->
        </div>

  
        <h2 class="float-left">সকল এডমিন</h2>
        <div class="add-new"><a class="add-new-link"  href='{{route("create_user")}}'>নতুন এডমিন যোগ করুন</a></div>
        <div class="table-responsive all-applicants-list">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                  <th>ক্র.নং</th>
                <th>ইউজার আইডি</th>
                <th>যোগদানের তারিখ</th>
                <th>নাম</th>
                <th>মোবাইল নং</th>
                <th>পদবী</th>
                <th>কর্মস্থল</th>
                <th>অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
                @php
                $i = 0;
                @endphp
            @foreach ($document as $doc)
              <tr>
                  <td>{{++$i}}</td>
                <td>{{$doc->user_id}}</td>
                <td>{{$doc->created_at}}</td>
                <td>{{$doc->name}}</td>
                <td>{{$doc->mobile}}</td>
                <td>{{$doc->podobi}}</td>
                <td>{{$doc->kormostol}}</td>
                <td class="paid_btn-139">
                  <a href='{{route("delete-admin",[$doc->user_id])}}' onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <footer class="navbar fixed-bottom navbar-expand-sm">
          <p>Developed by <a href="http://futureitpark.com/">Future IT Park</a> Contact us for any emergency support - 01750-106455</p>
        </footer>
      </main>
@endsection
