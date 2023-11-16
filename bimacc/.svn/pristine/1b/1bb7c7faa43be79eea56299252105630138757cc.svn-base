
<div class="modal fade" id="paymentaward" tabindex="-1" role="dialog" aria-labelledby="paymentaward" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentaward">Change of Name</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
         <!-- <form  action="{{ route('user.addressamendupdate, $user')}}" method="POST" enctype="multipart/form-data"> -->

        @csrf 
        <div class="row register-form">
          

          
          <div class="col-md-6">
             <div class="form-group">
                  <input type="text" class="form-control" name="address">
                  <label class="form-control-placeholder" id="address" for="address">Address<span style="color: red">*</span></label>
                  @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif  
                </div>
          </div>
         
         



        </div>              


<div class="modal-footer">
        <div class="mx-auto">
          <button type="submit" class="btn btn-success btn-space"> Save</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
           Close
         </button>           
       </div> 
     </div>

       <!-- </form> -->
     </div>
   </div>
 </div>
</div>

    

<script type="text/javascript">
  window.onload=function() {
    setTimeout(function() {
      document.getElementById('submitButton').disabled = false;
    }, 5000); 
  }
</script>





