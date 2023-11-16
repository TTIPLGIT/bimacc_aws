

@extends('layouts.admin')
@section('content')
 @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
 @endif

<div class="container con"> 
      <div class="row">
       <div class="col-lg-12 margin-tb">                    
        <div class="pull-right">
          <a class="btn btn-success float-right" title="create" href="{{ route('arbitrationmaster.create') }}" data-toggle="modal" data-target="#createArbitrationMasterModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
        </div>          
      </div> 
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Arbitrator Details</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <tr>
             <th style="width: 104.4px;">Sl. No.</th>
              <th>Code</th>
              <th>Name</th>
              <th>Yrs of Experience</th>
              <th>Place</th>
              <th>Conflict</th> 
              
             <th>Name Amend Document</th> 
        <th>Address Amend Document</th> 
        <th>Mail Verification Status</th>                    
              <th>Action</th>
            </tr>
          </thead>
        @if($arbitrationcount != 0)  
          <tbody>
          
           @foreach ($arbitrationmasters as $arbitrationmaster)
           <tr style="text-align: center">
            <!-- <td>{{ $arbitrationmaster->user_id}}</td> -->
             <td>{{ $loop->iteration}}</td>
            <td>
  <a href="{{ route('arbitrationmaster.arbitratorindex',$arbitrationmaster->user_id) }}">
  
     {{ $arbitrationmaster->arbitrator_code }}
    
  </a>
</td>
           
             <!-- <td>{{ $arbitrationmaster->arbitrator_code }}</td> -->
            <td>{{ $arbitrationmaster->username }}</td>
            <td>{{$arbitrationmaster->experience}}</td>
            <td>{{ $arbitrationmaster->address }}</td>
             <td>{{ $arbitrationmaster->conf_interest }}</td>
             @if($arbitrationmaster->name_id!='')
      <td><a href='{{route('getclaimdetailsDocuments',$arbitrationmaster->name_id) }}''  download>
        {{$arbitrationmaster->name_doc}}
      </a></td>
      @else
      <td>-</td>
      @endif
      @if($arbitrationmaster->address_id!='')
      <td><a href='{{route('getclaimdetailsDocuments',$arbitrationmaster->address_id) }}''  download>
        {{$arbitrationmaster->address_name}}
      </a></td>
      @else
      <td>-</td>
      @endif
           
             @if( $arbitrationmaster->mail_verify=='1')
           <td style="color: #62b662;font-weight: bolder;">Verified</td> 
           @else
           <td style="color: red;font-weight: bolder;">Not Verified</td> 
           @endif
            <td>
              <form action="{{ route('arbitrationmaster.destroy',$arbitrationmaster->user_id) }}" method="POST">


      <a class="btn btn-info" href="{{ route('arbitrationmaster.show',$arbitrationmaster->id) }}" data-toggle="modal"  data-target="#showArbitrationMasterModal{{$arbitrationmaster->id}}"><i class="fas fa-eye"></i></a>
            
            <a class="btn btn-primary" id="test1" href="{{ route('arbitrationmaster.edit',$arbitrationmaster->id) }}" data-toggle="modal"  data-target="#editArbitrationMasterModal{{$arbitrationmaster->id}}" ><i class="fas fa-pencil-alt"></i></a>

              @csrf 

              @method('DELETE')

              <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
          </td>                      
          </tr>
          @endforeach
        </tbody>
         @endif
      </table>
    </div>
  </div>
</div>
  
<!-- /.container-fluid -->  
 
</div>
 
    @include('arbitrationmaster/create')
    @if($arbitrationcount != 0)
    @include('arbitrationmaster/show')
    @include('arbitrationmaster/edit')
  @endif
 
@endsection
