
@foreach ($Countries as $country)
<div class="modal fade fade-scale" id="editCountryModal{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="editCountryModal" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h5 class="modal-title" id="editCountryModal">Edit Country</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 

        <form action="{{ route('country.update',$country->id) }}" method="POST" id="dispute_editform">

                         
            @csrf
            @method('PUT') 
                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="country_name" class="form-control" name="country_name"  value="{{$country->country_name }}" required="true">
                                <label class="form-control-placeholder" for="country_name" id="country_name">Country Name<span style="color: red">*</span></label>
                                 <!-- @if ($errors->has('country_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country_name') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                            
                    </div>


                     <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="country_Code" class="form-control{{ $errors->has('country_Code') ? ' is-invalid' : '' }}" name="country_Code" required value="{{$country->country_Code }}" required="true">
                                <label class="form-control-placeholder" for="country_Code">Country Code<span style="color: red">*</span></label>
                                 @if ($errors->has('country_Code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country_Code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                    </div>

                    <div class="col-md-6">
                        
                     <div class="form-group">
                         <input type="text" id="country_description" class="form-control{{ $errors->has('country_description') ? ' is-invalid' : '' }}" name="country_description" required value="{{$country->country_description }}">
                     <label class="form-control-placeholder" for="country_description">Country Description<span style="color: red">*</span></label>
                     @if ($errors->has('country_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country_description') }}</strong>
                                    </span>
                    @endif
                    </div>
                   
                

               

            </div>

            
            
              
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">
                        <button type="submit" class="btn btn-success btn-space" >Update</button>                        
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
function disputeeditbuttonclick() {

    
  var country_name =  $('#country_name1').val();
  alert(country_name);
     if (country_name =='') 
     {
       swal("Enter Category Name ", "", "error");
     return false;
     }
     var country_Code =  $('#country_Code').val();
     if (country_Code =='') 
     {
       swal("Enter Category Code ", "", "error");
     return false;
     }
      var country_description =  $('#country_description').val();
     if (country_description =='') 
     {
       swal("Enter Category Description ", "", "error");
     return false;
     }
      $("#disputeeditbutton").attr("disabled", true);
     document.getElementById('dispute_editform').submit();
   }
     </script> -->










