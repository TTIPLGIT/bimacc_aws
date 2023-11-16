


      <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
             <th style="width: 104.4px;">Sl. No.</th>
            
            
            <th>Country Name</th>
            <th>Action</th>                      
          </tr>
        </thead>
       
      </table> -->



      <div class="container-fluid" id="tabcounterclaiminformation_list"> 
        <div class="row">
         <div class="col-lg-12 margin-tb">                    
          <div class="pull-right">

          </div>

        </div>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Respondent Decision</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead class="theadalign">
              <tr>
               <th style="width: 104.4px;">Sl. No.</th>


               <th>Respondent Email</th>
               <th>Decision</th> 
               <th>Main Dispute Category</th>
               <th>Sub Dispute Category</th> 
               <th>Action</th>                      
             </tr>
           </thead>
           <tbody>
             @foreach ($counter_claim_list as $counter_claim_lists)

             <tr style="text-align: center">
              <td>{{ $loop->iteration}}</td>

              <td> {{ $counter_claim_lists->email }}</td>
              <td> {{ $counter_claim_lists->respondent_decision }}</td>

              @if($counter_claim_lists->respondent_decision =='Making a Counter Claim')
              <td> {{ $counter_claim_lists->category_name }}</td>
              <td> {{ $counter_claim_lists->subcategory_name }}</td>
              <td>

               <a href="#" class="" rel="idcounterclaiminformation_show"  onclick="functionidcounterclaiminformation_show('{{$counter_claim_lists->user_id}}')" style="    border-radius: 36px;"><i class="fas fa-dollar-sign"></i>Show</a>
             </td> 
             @else
             <td>-</td>    
             <td>-</td>    
             <td>-</td>                     
           </tr>
           @endif
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
 
</div>




@foreach ($respodentcounterclaimandrelief as $details)
<div id="back_button{{$details->user_id}}" style="display: none;">

 <a class="btn btn-primary" onclick="back_button('{{$details->user_id}}')" style="
 color: white;">BACK</a>
</div>

<div class="modal-body" id="tabcounterclaiminformation_show{{$details->user_id}}" style="display: none;"> 
  <div class="row register-form"> 



    @include('CounterClaimShowPageClaimDetails/ClaimDetails') 


  </div>
</div>

@endforeach



<script type="text/javascript">
  function functionidcounterclaiminformation_show(id)
  {
      // alert(id);
      document.getElementById("tabcounterclaiminformation_list").style.display = "none";
      document.getElementById("tabcounterclaiminformation_show"+id).style.display = "block";
      document.getElementById("back_button"+id).style.display = "block";

    }
  </script>
  <script type="text/javascript">
    function back_button(id)
    {
      // alert(id);
      document.getElementById("tabcounterclaiminformation_list").style.display = "block";
      document.getElementById("tabcounterclaiminformation_show"+id).style.display = "none";
      document.getElementById("back_button"+id).style.display = "none";

    }
  </script>




