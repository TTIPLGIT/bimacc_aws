  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createSystemFeesModal" tabindex="-1" role="dialog" aria-labelledby="createSystemFeeslabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">  

        <div class="modal-header">

          <h5 class="modal-title" id="createSystemFeeslabel">Create Fees</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
          @if (count($errors) > 0)
          <div class="alert alert-danger">

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

          <form id="createForm" action="{{ route('systemfees.store') }}" method="POST" >
           @csrf 
           <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
                <select name="claimant_type_id" class="form-control" required>
                  @foreach ($claimant_type as $claimant)
                  <option value=""></option>
                  <option value="{{$claimant->id}}">{{$claimant->claimant_respondant_type_name}}</option>
                  @endforeach
                </select> 
                <label class="form-control-placeholder" for="claimant_type_id">Claimant Type</label>              
                                               
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
<input type="text" id="system_fees" name="system_fees" class="form-control" required>
               <label class="form-control-placeholder" for="system_fees">system fees</label>
               @if ($errors->has('system_fees'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('system_fees') }}</strong>
              </span>
              @endif  
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
<input type="text" id="system_fees_description" name="system_fees_description" class="form-control" required>
               <label class="form-control-placeholder" for="system_fees_description">system Description</label>
               @if ($errors->has('system_fees_description'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('system_fees_description') }}</strong>
              </span>
              @endif  
            </div>
          </div>
</div>            


</div>
<div class="modal-footer">
  <div class="mx-auto">

    <button type="submit" id="register" class="btn btn-success btn-space" >Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <a class="btn btn-danger btn-space" href="{{ route('systemfees.index') }}">Cancel</a>            
  </div>
</div> 
</div>             
</form>

</div>
</div>








<!-- End of create Arbitration modal -->





