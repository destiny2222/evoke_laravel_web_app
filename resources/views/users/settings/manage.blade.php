@extends('layout.master')
@section('content')
    <div class="">
        <h1 class="np-text-title-screen m-b-2" style="color:blue">Transaction History</h1>    
    </div>  

    <div class="card-body shadow-lg">
        <div class="table-responsive">
          <table class="table table-flush manage">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Transactions ID/reference</th>
                <th>Purpose of payment</th>
                <th>Amount</th>
                <th>Transactions status </th>
              </tr>
            </thead>
            <tbody>
              <tr class="cursor-pointer">
                <td>1.</td>
                <td>07-07-23</td>
                <td> EE-101546 </td>
                <td> Tuition Payment </td>
                <th>$23,000.00</th>
                <td>
                    <span class="badge badge-pill badge-success"><i class="fal fa-sync"></i> Completed</span>
                  </td>
              </tr>
              <tr class="cursor-pointer">
                <td>2.</td>
                <td>07-07-23</td>
                <td> EE-101546 </td>
                <td> Tuition Payment </td>
                <th>$29,000.00</th>
                <td>
                    <span class="badge badge-pill badge-warning"><i class="fal fa-sync"></i> pending</span>
                  </td>
              </tr>
              <tr class="cursor-pointer">
                <td>3.</td>
                <td>07-07-23</td>
                <td> EE-101546 </td>
                <td> Tuition Payment </td>
                <th>$23,000.00</th>
                <td>
                    <span class="badge badge-pill badge-success"><i class="fal fa-sync"></i> Completed</span>
                  </td>
              </tr>
              <tr class="cursor-pointer">
                <td>4.</td>
                <td>07-07-23</td>
                <td> EE-101546 </td>
                <td> Tuition Payment </td>
                <th>$29,000.00</th>
                <td>
                    <span class="badge badge-pill badge-warning"><i class="fal fa-sync"></i> pending</span>
                  </td>
              </tr>
              
              <tr class="cursor-pointer">
                <td>5.</td>
                <td>07-07-23</td>
                <td> EE-101546 </td>
                <td> Tuition Payment </td>
                <th>$23,000.00</th>
                <td>
                    <span class="badge badge-pill badge-success"><i class="fal fa-sync"></i> Completed</span>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
@endsection