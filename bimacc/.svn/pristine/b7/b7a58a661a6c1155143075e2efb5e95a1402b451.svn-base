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
<div class="modal fade" id="createArbitrationMasterModal" tabindex="-1" role="dialog" aria-labelledby="createArbitrationMasterlabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createArbitrationMasterlabel">Create Arbitrator</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">  

   <form  action="{{ route('arbitrationmaster.store') }}" method="POST">
    @csrf 
    <div class="row register-form">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" id="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" required>
                <label class="form-control-placeholder" for="firstname">Firstname</label>
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required>
                <label class="form-control-placeholder" for="username">Username</label>
                @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
              <input type="text" id="phone" class="form-control" name="phone"  required="true">
              <label class="form-control-placeholder" for="phone">Phone</label>
          </div>
          <div class="form-group">
            <select class="form-control" name="dispute_categories_id">
                <option value="">Select Main Dispute Category</option>
                @foreach ($disputecategory as $category)
                <option value="{{ $category->id }}"> {{$category->category_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
           <input type="text" id="lastname" name=
           "lastname" class="form-control" required>
           <label class="form-control-placeholder" for="lastname">Last Name</label>
       </div>
       <div class="form-group">
           <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
           <label class="form-control-placeholder" for="email">Email</label>
           @if ($errors->has('email'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        
    </div>
    <div class="form-group">
        <input type="text" id="alt_phone" class="form-control" name="alt_phone"  required="false">
        <label class="form-control-placeholder" for="alt_phone">alt phone</label>
    </div>

    <div class="form-group">
        <select class="form-control" name="dispute_subcategories_id">
            <option value="">Select Dispute Sub Category</option>
            @foreach ($disputesubcategory as $category)
            <option value="{{ $category->id }}"> {{$category->subcategory_name}}</option>
            @endforeach
        </select>

    </div>

</div>

<div class="col-md-6">
    <div class="form-group">
      {!! Form::countries('country', 'select2', 'form-control' ) !!}
      {!! $errors->first('country', '<span class="alert-msg">:message</span>') !!}   
  </div>
  <div class="form-group">
   <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" required="false">
   <label class="form-control-placeholder" for="city">City</label>
   @if ($errors->has('city'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('city') }}</strong>
</span>
@endif

</div>

</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" required="false">
        <label class="form-control-placeholder" for="state">State</label>
        @if ($errors->has('state'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('state') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
       <input type="text" name="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" required>
       <label class="form-control-placeholder" for="zipcode">Zipcode</label>
       @if ($errors->has('zipcode'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('zipcode') }}</strong>
       </span>
       @endif

   </div>

</div>
<div class="col-md-6">
    <textarea class="form-control" name="address"></textarea>
    @if ($errors->has('address'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
    
</div>
</div>              


</div>
<div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space" id="submitButton" disabled  onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();"> Save</button>
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
<script type="text/javascript">
    window.onload=function() {
      setTimeout(function() {
        document.getElementById('submitButton').disabled = false;
      }, 5000); 
    }
</script>





