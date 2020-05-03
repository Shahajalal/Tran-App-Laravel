@extends('layout')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">ভলেন্টিয়ার</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Import</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
          </div> -->
        </div>

  
        <h2 class="float-left">সকল ভলেন্টিয়ার</h2>
        <div class="add-new"><a class="add-new-link"  href='{{route("create_support")}}'>নতুন ভলেন্টিয়ার যোগ করুন</a></div>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav> -->
        <div class="table-responsive all-applicants-list">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                  <th>ক্র.নং</th>
                <th>ইউজার আইডি</th>
                <th>যোগদানের তারিখ</th>
                <th>নাম</th>
                <th>পিতার নাম</th>
                <th>মাতার নাম</th>
                <th>মোবাইল নং</th>
                <th>জাতীয় পরিচয় পত্র / পাসপোর্ট</th>
                <th>পেশা</th>
                <th>বর্তমান ঠিকানা</th>
                <th>স্থায়ী ঠিকানা</th>
                <th>স্টাটাস</th>
                <th>অ্যাকশন</th>
                
              </tr>
            </thead>
            <tbody>
                @php
                $i = $document->perPage() * ($document->currentPage() - 1);
                @endphp
            @foreach ($document as $doc)
              <tr>
                  <td>{{++$i}}</td>
                <td>{{$doc->user_id}}</td>
                <td>{{$doc->created_at}}</td>
                <td>{{$doc->name}}</td>
                <td>{{$doc->father}}</td>
                <td>{{$doc->mother}}</td>
                <td>{{$doc->mobile}}</td>
                <td>{{$doc->national_id}}</td>
                <td>{{$doc->occupation}}</td>
                <td>{{$doc->current_address}}</td>
                <td>{{$doc->permanent_address}}</td>
                @if($doc->status == 0)
                <td>Active</td>
                @else
                <td>Close</td>
                @endif
                
                <td class="paid_btn-139">
                  <a href='{{route("delete-support",[$doc->user_id,$document->currentPage()])}}' onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</a>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="footer-nav">
           {{ $document->links() }}
        </div>
        
        <footer class="navbar fixed-bottom navbar-expand-sm">
          <p>Developed by <a href="http://futureitpark.com/">Future IT Park</a> Contact us for any emergency support - 01750-106455</p>
        </footer>
      </main>
@endsection
