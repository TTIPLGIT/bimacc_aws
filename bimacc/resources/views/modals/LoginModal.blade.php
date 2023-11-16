 <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="
    width: 75%;">
      <div class="modal-header" style="
    background-color: #2d1747;
">
        <h5 class="modal-title" id="loginmodal" style="
    
    color: white;
">Select Role</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="type" >
 @csrf   
           <input type="text" name="email"   id="role_email" style="display: none;">
          <input type="text" name="password"   id="role_pass" style="display: none;">
           <!-- <input type="text" name="verify_count"   id="verify_count" style="display: none;"> -->

            <div id="select_role">

            </div>
            

       
        

       </form>
     </div>
   </div>
 </div>
</div>
</div>









