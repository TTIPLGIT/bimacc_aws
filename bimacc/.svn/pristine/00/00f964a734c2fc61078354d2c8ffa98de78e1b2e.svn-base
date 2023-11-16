@if($systemfeescount = 0)
 $systemFees = SystemFees::findOrFail($id);
 @endif
@foreach ($systemFees as $fees) 
<div class="modal fade fade-scale" id="editSystemFeesModal{{$fees->id}}" tabindex="-1" role="dialog" aria-labelledby="editSystemFeeslabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
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
                  <div class="modal-header">
                    <h5 class="modal-title" id="editSystemFeeslabel">Edit System Fees</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 

        <form  action="{{ route('systemfees.update', $fees->id ) }}" method="POST"> 
                         
            @csrf
            @method('PUT') 
                       

                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">

                <select class="form-control" name="claimant_type_id" required>
                    @foreach ($claimant_type as $claimant)
                        <option value="{{$claimant->id}}" {{$claimant->id == $fees->claimant_type_id ? 'selected':''}} >{{$claimant->claimant_respondant_type_name}}</option>     
                    @endforeach
                </select>
                               
                            </div>
                            <div class="form-group">
                                <input type="text" id="system_fees" class="form-control{{ $errors->has('system_fees') ? ' is-invalid' : '' }}" name="system_fees" required value="{{$fees->system_fees }}" >
                                <label class="form-control-placeholder" for="system_fees">System Fees</label>
                                 @if ($errors->has('system_fees'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('system_fees') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" id="system_fees_description" class="form-control{{ $errors->has('system_fees_description') ? ' is-invalid' : '' }}" name="system_fees_description" required value="{{$fees->system_fees_description }}" >
                                <label class="form-control-placeholder" for="system_fees">Description</label>
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
                        <button type="submit" class="btn btn-success btn-space">Save</button>                       
                       
                        <a class="btn btn-danger btn-space" href="{{ route('systemfees.index') }}">Cancel</a>            
                </div>
    </div> 
            </div>             
        </form>

    </div>
    </div>
    </div>
    </div>
    @endforeach







