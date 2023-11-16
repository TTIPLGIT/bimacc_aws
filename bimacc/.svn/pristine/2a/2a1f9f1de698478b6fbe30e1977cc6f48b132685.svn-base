@extends('layouts.admin')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif      
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="container-fluid">    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">All Notifications</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="theadalign">
						<tr>
							<th>Sl. No.</th>
							<th>Notification</th>
							<!-- <th>Created Date</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach ($rows as $notification)
						@php $data = json_decode($notification->data, true); @endphp
						<tr style="text-align: center">
							<td>{{ $loop->iteration}}</td>
							<td>  {{ $data['body'] }}</td>
							<!-- <td>{{$notification->created_at}}</td> -->
						</tr>
						@endforeach
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>     
@endsection

