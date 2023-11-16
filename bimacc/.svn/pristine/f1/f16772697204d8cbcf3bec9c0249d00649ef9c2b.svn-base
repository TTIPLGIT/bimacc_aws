@if($securitytypes_count = 0)
$security_types = SecurityTypes::findOrFail($id);
@endif
@foreach ($security_types as $security_type)
<div class="modal fade" id="showSecurityMasterModal{{$security_type->id}}" tabindex="-1" role="dialog" aria-labelledby="showSecurityMasterlabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                     
                  <div class="modal-header">
                    <h5 class="modal-title" id="showSecurityMasterlabel">Show Security Master</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

                <div class="row register-form">
                        <div class="col-md-6">
                          <div class="form-group">
                                 <strong>Security Type Code:</strong>
                                {{ $security_type->security_type_code }}
                            </div>
                            <div class="form-group">
                                 <strong>Security Type Name:</strong>
                                {{ $security_type->security_type_name }}
                            </div>
                            <div class="form-group">
                                 <strong>Category Description:</strong>
                                {{ $security_type->security_type_description  }}
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                               <strong>Created At : </strong>
                                {{ $security_type->created_at }} 
                            </div>
                            
                         </div>
                </div>
            
     <div class="modal-footer">
                <div class="mx-auto">                     
                        
                        <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cancel</span>
                        </button>            
                </div>
    </div> 
            </div>             
     
    </div>
    </div>
    </div>
    @endforeach





