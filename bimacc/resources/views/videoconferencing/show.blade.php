@extends('layouts.admin')
@section('content')
<style>
  #frname{
    color: red;
  }
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    

   </div>
 </div>
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Resend / Show Video Conferencing Link</h6>
  </div>
    @foreach ($videoconferencing['video_conference_header'] as $videoconferencings)
  <div class="card-body">
    <div class="table-responsive" style="overflow-x: hidden;">
      <form  action="{{ route('videoconferencing.store') }}" method="PUT" id="videoconferencing_form">
        @csrf 
        <div class="row register-form">
          <div class="col-md-4">
            <div class="form-group">
              <label >Claim Notice ID<span style="color: red">*</span></label>
              <select class="col-xs-12 col-sm-12 col-md-12 form-control" id="claim_notice_id" name="claim_notice_id" disabled>
                <option value="">Select Claim Notice<span style="color: red">*</span></option>
                @foreach ($claimnotice as $notice)
                <option value="{{ $notice->id }}" {{ $notice->id ==  $videoconferencings->claim_notice_id ? 'selected':''  }}> {{$notice->claimnoticeno}} ::{{$notice->arbitration_petionno}} </option>
                @endforeach
              </select>

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label >Stage Description<span style="color: red">*</span></label>
              <input type="text" id="video_conferencing_header" class="form-control{{ $errors->has('video_conferencing_header') ? ' is-invalid' : '' }}" name="video_conferencing_header" required id="video_conferencing_header" value="{{$videoconferencings->video_conferencing_header}}" disabled>

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label >Mail<span style="color: red">*</span></label>
              <select class="col-xs-12 col-sm-12 col-md-12 form-control" id="mail_id" name="mail_id[]" multiple style="pointer-events: none;">
               @foreach ($videoconferencing['video_conference_email'] as $video_conference_email)
               @if($video_conference_email->video_conferencing_link_id == $videoconferencings->id)
               <option value="" selected> {{ $video_conference_email->email_id }}</option>
               @endif
               @endforeach
             </select>
           </div>
         </div>
         <div class="col-md-4">
          <div class="form-group">
            <label >Video Conference Link<span style="color: red">*</span></label>
            <input type="text" id="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" required id="link" value="{{$videoconferencings->link}}" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >Meeting ID<span style="color: red">*</span></label>
            <input type="text" id="meeting_id" class="form-control{{ $errors->has('meeting_id') ? ' is-invalid' : '' }}" name="meeting_id" required id="meeting_id" value="{{$videoconferencings->meeting_id}}" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >Meeting Passcode<span style="color: red">*</span></label>
            <input type="text" id="meeting_passcode" class="form-control{{ $errors->has('meeting_passcode') ? ' is-invalid' : '' }}" name="meeting_passcode" required id="meeting_passcode" maxlength="4" value="{{$videoconferencings->meeting_passcode}}" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >Start Date and Time<span style="color: red">*</span></label>
            <input type="text" id="start_date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" required id="start_date" value="{{date('d-m-Y H-i-s', strtotime($videoconferencings->start_date))}}" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >End Date and Time<span style="color: red">*</span></label>
            <input type="text" id="end_date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" required id="end_date"  value="{{date('d-m-Y H-i-s', strtotime($videoconferencings->end_date))}}" disabled>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="mx-auto">
          <button class="btn btn-danger btn-space" type="button" >
            <a  style="color: white;" href="{{ route('videoconferencing.index') }}"> Back</a>           
          </button>             
        </div>
      </div> 
    </form>  
  </div>
</div>  
@endforeach 
</div>
</div>
@endsection

