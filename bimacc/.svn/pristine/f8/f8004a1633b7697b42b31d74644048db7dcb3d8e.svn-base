@if($claimant_respondantcount = 0)
 $claimant_respondant_type = ClaimantRespondantType::findOrFail($id);
 @endif
@foreach ($claimant_respondant_type as $claimant_respondant)
<div class="modal fade fade-scale" id="editClaimantRespondantModal{{$claimant_respondant->id}}" tabindex="-1" role="dialog" aria-labelledby="editClaimentRespondantTypelabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                
                  <div class="modal-header">
                    <h5 class="modal-title" id="editClaimentRespondantTypelabel">Edit Claimant Respondant</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 

        <form  action="{{ route('claimant_respondant_type.update', $claimant_respondant->id ) }}" method="POST" id="typeedit_form"> 
                         
            @csrf
            @method('PUT') 
                       

                <div class="row register-form">
                  <div class="col-md-6">
                    <div class="form-group">
<input type="text" id="claimant_respondant_type_Code1" name="claimant_respondant_type_Code"  value= "{{$claimant_respondant->claimant_respondant_type_Code}}" class="form-control" required>
               <label class="form-control-placeholder" for="claimant_respondant_type_Code">Code*</label>
               @if ($errors->has('claimant_respondant_type_Code'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('claimant_respondant_type_Code') }}</strong>
              </span>
              @endif  
            </div>

                  </div>

                        <div class="col-md-6">
                             <div class="form-group">
                                 <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" required="true" id="type1">          
          <option {{old('type',$claimant_respondant->type)=="claimant"? 'selected':''}}  value="claimant">Claimant</option>
          <option {{old('type',$claimant_respondant->type)=="respondant"? 'selected':''}}  value="respondant">Respondant</option>
                               

                
        </select> 
        <label id="type" class="form-control-placeholder" for="type">Type*</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
<input type="text" id="claimant_respondant_type_name1" name="claimant_respondant_type_name" class="form-control" value="{{$claimant_respondant->claimant_respondant_type_name}}" required>
               <label class="form-control-placeholder" for="claimant_respondant_type_name">Claimant/Respondant Name*</label>
               @if ($errors->has('claimant_respondant_type_name'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('claimant_respondant_type_name') }}</strong>
              </span>
              @endif  
            </div>
                           
                           
                          
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                          <textarea name="claimant_respondant_type_description" class="form-control" value="{{$claimant_respondant->claimant_respondant_type_description}}" required>{{$claimant_respondant->claimant_respondant_type_description}}</textarea>

               <label class="form-control-placeholder" for="claimant_respondant_type_description">Description*</label>
               @if ($errors->has('claimant_respondant_type_description'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('claimant_respondant_type_description') }}</strong>
              </span>
              @endif  
            </div>
                    </div>
                    

             
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">
              <button type="submit" class="btn btn-success btn-space" >Save</button>                       
                       
                         <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">Cancel</span>
    </button>            
                </div>
    </div> 
            </div>             
        </form>

    </div>
    </div>
    </div>
    </div>
    @endforeach
    <!-- <script>
function typeeditbuttonclick() {
    
  var claimant_respondant_type_Code =  $('#claimant_respondant_type_Code1').val();
  // alert(security_type_code);
     if (claimant_respondant_type_Code =='') 
     {
       swal("Enter Claimant Respondant Type Code", "", "error");
     return false;
     }
     var type =  $('#type1').val();
     if (type =='') 
     {
       swal("Enter Type  ", "", "error");
     return false;
     }
      var claimant_respondant_type_name =  $('#claimant_respondant_type_name1').val();
     if (claimant_respondant_type_name =='') 
     {
       swal("Enter Name", "", "error");
     return false;
     }
 $("#typeeditbutton").attr("disabled", true);
     document.getElementById('typeedit_form').submit();
   }
     </script> -->








