 @foreach ($videoconferencing['video_conference_header'] as $video_conference_header)
<div class="modal fade" id="videomessage{{$video_conference_header->id}}" tabindex="-1" role="dialog" aria-labelledby="videomessage" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videomessage">Meaasge</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        
    <form  action="{{ route('videoconferencing.edit',$video_conference_header->id)}}" method="update" enctype="multipart/form-data">


        @csrf 
        <div class="row register-form">
           <input type="number" name="claimnoticeid" style="display: none" value="{{$video_conference_header->id}}">

          
         <div class="col-md-6"> 
      <div class="form-group">
         <textarea id="message" class="form-control{{ $errors->has('injurydetails') ? ' is-invalid' : '' }}" name="message">   
         </textarea>
      
       <label class="form-control-placeholder" for="message">Message<span style="color: red">*</span>:</label>
      
    </div>
  </div>
         
         



        </div>              


<div class="modal-footer">
        <div class="mx-auto">
          <button type="submit" class="btn btn-success btn-space"> send</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
           Close
         </button>           
       </div> 
     </div>

      </form> 
     </div>
   </div>
 </div>
</div>
@endforeach

    







