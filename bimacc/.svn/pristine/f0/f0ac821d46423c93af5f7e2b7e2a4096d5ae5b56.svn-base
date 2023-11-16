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
<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <!-- <a class="btn btn-success float-right" title="create" href="{{ route('videoconferencing.create') }}" ><i class="fas fa-plus" ></i></a> -->
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">View Video Conferencing</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="theadalign">
        <tr>
          <th>Sl. No.</th>
          <th>Claim Petition No.</th>
          <!-- <th>Stage Description</th>-->
          <th>Link</th>         
          <th>Start Date and Time</th>                                             
          <th>End Date and Time</th>
          <th>Email List</th>                                            
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>  
      @if($videoconferencing['video_conference_header'] != null)   
      <tbody>          
       @foreach ($videoconferencing['video_conference_header'] as $video_conference_header)
       <tr>

        <td>{{ $loop->iteration}}</td>
        <td> <a href="{{ route('ArbitratorAllocatedClaims.show',$video_conference_header->claimnoticeid) }}"  >
          {{ $video_conference_header->arbitration_petionno }}
            </a> 
          </td>
         
        <!-- <td>{{ $video_conference_header->video_conferencing_header }}</td>  -->                       
        <td>{{ $video_conference_header->link }}</td>                        
        <!-- <td>{{ $video_conference_header->meeting_id }}</td>                        
        <td>{{ $video_conference_header->meeting_passcode }}</td>                         -->
        <td>{{date('d-m-Y H-i-s', strtotime($video_conference_header->start_date))}}</td>                        
        <td>{{date('d-m-Y H-i-s', strtotime($video_conference_header->end_date))}}</td>                        
        <td>
          <table>
           @foreach ($videoconferencing['video_conference_email'] as $video_conference_email)
           @if($video_conference_email->video_conferencing_link_id == $video_conference_header->id)
           <tr>
              <td style="border: none;">
                  {{ $video_conference_email->email_id }}
              </td>
            </tr>
            @endif
           @endforeach
          </table>
        </td> 
        <td>
          @if($video_conference_header->timedifference > 0)
          Meeting Ended
          @else
          {{ $video_conference_header->status }}
          @endif
          
        </td>   
        <td style="text-align: center;"> 
          @if($video_conference_header->timedifference < 0)
         <!-- <button type="button" class="btn btn-success btn-space"  id="videoconferencingbutton"><a  title="Edit" href="{{ route('videoconferencing.edit',$video_conference_header->id)}}" style="color: white;">Resend</a> 
         </button> -->
  <a class="btn btn-primary"  data-toggle="modal" data-target="#videomessage{{$video_conference_header->id}}" style="
  color: white;">Resend</a>
         @endif
         <button type="button" class="btn btn-success btn-space"  id="videoconferencingbutton"><a  title="Edit" href="{{ route('videoconferencing.show',$video_conference_header->id)}}" style="color: white;">View</a> 
         </button></td>                                          
      </tr>
      @endforeach
    </tbody>
    @endif  
  </table>
  
  @include('modals/videomessage')
</div>
</div>
</div>

<!-- /.container-fluid -->  

</div>
@endsection


