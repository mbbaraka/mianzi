@extends('layouts.admin')

@section('title')
 Login Activities
@endsection

@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Login Activities</li>
          <li class="breadcrumb-item active"><a href="#">List</a></li>
        </ul>
      </div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div>
                <h3>User Login Activities</h3>
                <a href="{{ route('home') }}" class="float-right btn btn-sm btn-primary">Back</a>
            </div>
            <div class="tile-body">
                <table class="table table-responsive table-bordered table-responsive-sm table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Message</th>
                            <!-- <th>Email</th> -->
                            <th>Mobile</th>
                            <!-- <th>Url</th> -->
                            <!-- <th>Method</th> -->
                            <th>IP</th>
                            <th>Agent</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($userLoginActivities) > 0)
                            @foreach($userLoginActivities as $key => $row)
                            <tr>                                        	
                                <td>{{ $key+1 }}</td>
                                <td style="width: 1%;">{{ $row->subject }} </td> 
                                <!-- <td>{{ $row->email }}</td> -->
                                <td>{{ $row->mobile?$row->mobile:'NA' }}</td>
                                <!-- <td>{{ $row->url }}</td> -->     
                                <!-- <td>{{ $row->method }}</td> -->
                                <td>{{ $row->ip }}</td>
                                <td style="width: 1%;">{{ $row->agent }}</td>
                                <td>{{ $row->created_at->toDayDateTimeString() }}<br> ({{ $row->created_at->diffForHumans() }}z)</td>                
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $userLoginActivities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
