<!-- Create Climant Information Modal-->


<div class="modal fade" id="idrespondentclaiminformationdetails" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="claimdetailslabel">Claim and Relief Request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
         <div id="wrap">
          <div class="tab"></div>

          
         
            @if(empty($claim_respondent_details))
           <div id="tab1_res" class="tab selected"><a href="#" id="hrefclaimdetails" data_attr="claimDetails" class="res_form active"  onclick="claimdetailsselected_respondant()">Claim Details</a></div>
            <div id="tab2_res" class="tab" style="border-bottom: none; display: none" id="hrefreliefrequest" onclick="reliefrequestselected_respondant()"><a href="#" data_attr="reliefRequest" class="res_form" style="color: black" >Relief Request</a></div>
           @else
           <div id="tab1_res" class="tab" style="border-bottom: none;pointer-events: none;"><a href="#" data_attr="claimDetails" class="res_form" id="hrefclaimdetails"  onclick="claimdetailsselected_respondant()" style="color: black">Claim Details</a></div>
           <div id="tab2_res" class="tab selected"  id="hrefreliefrequest"   onclick="reliefrequestselected_respondant()"><a href="#" data_attr="reliefRequest" class="res_form active" style="color: black" >Relief Request</a></div>
           @endif
          <div class="tab"></div>
        </div>
      </div>
      @foreach ($claimant_dispute as $claimantinformation)
      <div class="row register-form">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
              <label class="" style="font-weight: bold">Main Dispute Category:</label>
              <input type="text" value="{{$claimantinformation->category_name}}" readonly class="form-control" style="text-align: center;margin-left: -12px">
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group" >
            <label class="" style="font-weight: bold">Sub Dispute Category:</label>

            <input type="text" value="{{$claimantinformation->subcategory_name}}" readonly class="form-control" style="text-align: center;">


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row register-form" id="respondent_claimdetailsform">
   @if($claimantinformation->dispute_category_Code =="AAS")
   @include('RespondantClaimDetails/1AdmiraltyDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="ADS")
   @include('RespondantClaimDetails/2AviationDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="B&F")
   @include('RespondantClaimDetails/3BankingFinanceMoneyDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CD")
   @include('RespondantClaimDetails/4ConsumerDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CCD")
   @include('RespondantClaimDetails/5ContractsAndCommercialDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CPD")
   @include('RespondantClaimDetails/6PartnershipDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CPD")
   @include('RespondantClaimDetails/6PartnershipDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CID")
   @include('RespondantClaimDetails/7CorporateandInvestmentDisputes')
   @elseif($claimantinformation->dispute_category_Code =="COD")
   @include('RespondantClaimDetails/8CommunityDisputes')
   @elseif($claimantinformation->dispute_category_Code =="EMD")
   @include('RespondantClaimDetails/9EmploymentandConsultantsDisputes')
   @elseif($claimantinformation->dispute_category_Code =="EID")
   @include('RespondantClaimDetails/10EnergyDisputes')   
   @elseif($claimantinformation->dispute_category_Code =="FAD")
   @include('RespondantClaimDetails/11FamilyandPartitionDisputes')
   @elseif($claimantinformation->dispute_category_Code =="GOV")
   @include('RespondantClaimDetails/12GovernmentDisputes')
   @elseif($claimantinformation->dispute_category_Code =="IPR")
   @include('RespondantClaimDetails/13IntellectualPropertyandInformationTechnology')
   @elseif($claimantinformation->dispute_category_Code =="IND")
   @include('RespondantClaimDetails/14InsuranceandLogisticDisptues')
   @elseif($claimantinformation->dispute_category_Code =="MAS")
   @include('RespondantClaimDetails/15MediaandSports')
   @elseif($claimantinformation->dispute_category_Code =="RED")
   @include('RespondantClaimDetails/17RealEstateDisputes')
   @elseif($claimantinformation->dispute_category_Code =="AOD")
   @include('RespondantClaimDetails/18OtherDisputes')
   @elseif($claimantinformation->dispute_category_Code =="COV")
   @include('RespondantClaimDetails/18OtherDisputes')
   @else

   @endif
   
 </div>
 <div class="row register-form" id="respondent_reliefrequestdetails" style="display: none">
  @if($claimantinformation->dispute_category_Code =="AAS")
  @include('RespondantReliefRequest/1AdmiraltyDisputes') 
  @elseif($claimantinformation->dispute_category_Code =="ADS")
  @include('RespondantReliefRequest/2AviationDisputes') 
  @elseif($claimantinformation->dispute_category_Code =="B&F")
  @include('RespondantReliefRequest/3BankingFinanceMoneyDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CD")
  @include('RespondantReliefRequest/4ConsumerDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CCD")
  @include('RespondantReliefRequest/5ContractsAndCommercialDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CPD")
  @include('RespondantReliefRequest/6PartnershipDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CPD")
  @include('RespondantReliefRequest/6PartnershipDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CID")
  @include('RespondantReliefRequest/7CorporateandInvestmentDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COD")
  @include('RespondantReliefRequest/8CommunityDisputes')
  @elseif($claimantinformation->dispute_category_Code =="EMD")
  @include('RespondantReliefRequest/9EmploymentandConsultantsDisputes')
  @elseif($claimantinformation->dispute_category_Code =="EID")
  @include('RespondantReliefRequest/10EnergyDisputes')
  @elseif($claimantinformation->dispute_category_Code =="FAD")
  @include('RespondantReliefRequest/11FamilyandPartitionDisputes')
  @elseif($claimantinformation->dispute_category_Code =="GOV")
  @include('RespondantReliefRequest/12GovernmentDisputes')
  @elseif($claimantinformation->dispute_category_Code =="IPR")    @include('RespondantReliefRequest/13IntellectualPropertyandInformationTechnology')
  @elseif($claimantinformation->dispute_category_Code =="IND")
  @include('RespondantReliefRequest/14InsuranceandLogisticDisptues')
  @elseif($claimantinformation->dispute_category_Code =="MAS")
  @include('RespondantReliefRequest/15MediaandSports')
  @elseif($claimantinformation->dispute_category_Code =="RED")
  @include('RespondantReliefRequest/17RealEstateDisputes')
  @elseif($claimantinformation->dispute_category_Code =="AOD")
  @include('RespondantReliefRequest/18OtherDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COV")
  @include('RespondantReliefRequest/18OtherDisputes')
  @endif
  

</div>                  
</div>
@endforeach
</div>
</div>
</div> 
</div>
<style type="text/css">
  input[type=date]:required:invalid::-webkit-datetime-edit {
    color: transparent;
  }
  input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
  }
</style>

<script>

  $('.percentage input[type=text]').on('keyup',function(e){

    var oldstr=$('.percentage input[type=text]').val();
    var tokens = oldstr.split('%');
    var suffix = tokens.pop() + '%';
    var prefix = tokens.join("");
    $('.percentage input[type=text]').val(prefix+suffix);
  });
  $('.penalinterest input[type=text]').on('keyup',function(e){

    var oldstr=$('.penalinterest input[type=text]').val();
    var tokens = oldstr.split('%');
    var suffix = tokens.pop() + '%';
    var prefix = tokens.join("");
    $('.penalinterest input[type=text]').val(prefix+suffix);
  });

</script>
<script>
  function DatepickerValidation()
  {

    var loan_taken_date = new Date($('#loan_taken_date').val());
    var NPADate = new Date($('#NPADate').val());

    if (NPADate <= loan_taken_date){
      alert('NPA Date is should be greater than Loan Taken Date');
    //$('#NPADate').datepicker('#NPADate', null);
    // $('#loan_taken_date').val() = null;
    document.getElementById('NPADate').value = null;
  }   

}
</script>

<script>
  function claimdetailsselected_respondant()
  {
    //alert("Sam");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#tab1_res").attr('class', 'tab selected active'); 
    document.getElementById("respondent_claimdetailsform").style.display = "block";
    document.getElementById("respondent_reliefrequestdetails").style.display = "none";
  }

  function reliefrequestselected_respondant()
  {
    // alert("Aravinth");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#tab2_res").attr('class', 'tab selected active'); 
    document.getElementById("respondent_claimdetailsform").style.display = "none";
    document.getElementById("respondent_reliefrequestdetails").style.display = "block";
  }
  
</script>
<script>

  $(document).ready(function(){
    $( ".res_form" ).each(function() {
  if($( this ).hasClass( "active" )){
    var val=$(this).attr("data_attr");
    if(val=='claimDetails')
      claimdetailsselected_respondant();
    else
      reliefrequestselected_respondant();
  }
});
   $('#sample_form').on('submit', function(event){
   // alert("ASdasdasd"); 

    // var claimamount = $('#claimamount').val();

    // //alert(claimamount);
    //  if (claimamount =='')
    //   {
    //   swal("Enter Claim Amount ", "", "error");
    //   return false;
    // }
    // if (claimamount < 25000)
    //   {
    //   swal("Claim Amount Should be Greater than 25000 ", "", "error");
    //   return false;
    // }
    var reason_for_claim = $('#reason_for_claim').val();
// alert (reason_for_claim);
if (reason_for_claim =='')
{
  swal("Enter Reasons For Claim ", "", "error");
  return false;
}
event.preventDefault();
$.ajax({
  url:"{{ route('claimdetails.respondantclaim') }}",
  method:"POST",
  data: new FormData(this),
  contentType: false,
  cache:false,
  processData: false,
  dataType:"json",
  success:function(data)
  {
   var html = '';
   if(data.errors)
   {
    html = '<div class="alert alert-danger">';
    for(var count = 0; count < data.errors.length; count++)
    {
     html += '<p>' + data.errors[count] + '</p>';
   }
   html += '</div>';
 }
 if(data.success)
 {
  swal("Claim Details Added Successfully", "", "success");
  
  $("#tab2_res").show();
  $("#slide").attr('class', 'move-to-second');
  $(".tab").attr('class', 'tab');
  $("#tab2_res").attr('class', 'tab selected active'); 
  document.getElementById("respondent_claimdetailsform").style.display = "none";
  document.getElementById("respondent_reliefrequestdetails").style.display = "block";

      // html = '<div class="alert alert-success">' + data.success + '</div>';
      // $('#sample_form')[0].reset();
    }
    $('#form_result').html(html);
  }
})
});

  // var newUrl= 'create';
   $('#reliefrequest_form').on('submit', function(event){

    $('#reliefrequestsave').hide();
  var demand_for_licence_fee_interest = $('#demand_for_licence_fee_interest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var for_allotment_of_shares_stock = $('#for_allotment_of_shares_stock').val();
  if (demand_for_licence_fee_interest ==true)
  {
     if (for_allotment_of_shares_stock =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var cancellation_license_value = $('#cancellation_license_value').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var demand_to_surrender_infringed_materials = $('#demand_to_surrender_infringed_materials').val();
  if (cancellation_license_value ==true)
  {
     if (demand_to_surrender_infringed_materials =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var demand_for_licence_fee_withoutinterest = $('#demand_for_licence_fee_withoutinterest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var cancellation_license = $('#cancellation_license').val();
  if (demand_for_licence_fee_withoutinterest ==true)
  {
     if (cancellation_license =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }

 var frightrefundamountinerest = $('#frightrefundamountinerest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var value_infringing_withoutinterest = $('#value_infringing_withoutinterest').val();
  if (frightrefundamountinerest ==true)
  {
     if (value_infringing_withoutinterest =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var damages_for_breach_of_contract = $('#damages_for_breach_of_contract').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var demand_redemption_of_preference_shares_or_debentures = $('#demand_redemption_of_preference_shares_or_debentures').val();
  if (damages_for_breach_of_contract ==true)
  {
     if (demand_redemption_of_preference_shares_or_debentures =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var damages_for_breach_of_contract_interest = $('#damages_for_breach_of_contract_interest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var general_meetings = $('#general_meetings').val();
  if (damages_for_breach_of_contract_interest ==true)
  {
     if (general_meetings =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var frightamountwithpoutinterest = $('#frightamountwithpoutinterest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var for_cancellation_of_allotments = $('#for_cancellation_of_allotments').val();
  if (frightamountwithpoutinterest ==true)
  {
     if (for_cancellation_of_allotments =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var termination = $('#termination').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var value_claims_interest = $('#value_claims_interest').val();
  if (termination ==true)
  {
     if (value_claims_interest =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var claim_for_consideration_amount = $('#claim_for_consideration_amount').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var compel_promoters_to_purchase_ofinvestors_shares = $('#compel_promoters_to_purchase_ofinvestors_shares').val();
  if (claim_for_consideration_amount ==true)
  {
     if (compel_promoters_to_purchase_ofinvestors_shares =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var claim_for_consideration_amount_interest = $('#claim_for_consideration_amount_interest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var compel_or_cancel_push_or_put_options = $('#compel_or_cancel_push_or_put_options').val();
  if (claim_for_consideration_amount_interest ==true)
  {
     if (compel_or_cancel_push_or_put_options =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var eid_claim_for_contract_price = $('#eid_claim_for_contract_price').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var for_company_to_buy_back_of_shares = $('#for_company_to_buy_back_of_shares').val();
  if (eid_claim_for_contract_price ==true)
  {
     if (for_company_to_buy_back_of_shares =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var eid_claim_for_contract_price_interest = $('#eid_claim_for_contract_price_interest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var demand_valuation_of_shares = $('#demand_valuation_of_shares').val();
  if (eid_claim_for_contract_price_interest ==true)
  {
     if (demand_valuation_of_shares =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var eid_claim_for_refund_withoutinterest = $('#eid_claim_for_refund_withoutinterest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var chairman_and_key_employees = $('#chairman_and_key_employees').val();
  if (eid_claim_for_refund_withoutinterest ==true)
  {
     if (chairman_and_key_employees =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var eid_claim_for_refund_withoutinterest = $('#eid_claim_for_refund_withoutinterest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var cargo_nature = $('#cargo_nature').val();
  if (eid_claim_for_refund_withoutinterest ==true)
  {
     if (cargo_nature =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var claim_for_escalation_of_costs = $('#claim_for_escalation_of_costs').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var for_enforcement_of_preferential_rights = $('#for_enforcement_of_preferential_rights').val();
  if (claim_for_escalation_of_costs ==true)
  {
     if (for_enforcement_of_preferential_rights =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var claim_for_escalation_of_costs_withoutinterest = $('#claim_for_escalation_of_costs_withoutinterest').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var demand_to_move_resolutions = $('#demand_to_move_resolutions').val();
  if (claim_for_escalation_of_costs_withoutinterest ==true)
  {
     if (demand_to_move_resolutions =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var aggregate_value_of_debentures = $('#aggregate_value_of_debentures').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var agreement_value = $('#agreement_value').val();
  if (aggregate_value_of_debentures ==true)
  {
     if (agreement_value =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var to_invoke_guarntee = $('#to_invoke_guarntee').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var claim_for_damages_interest = $('#claim_for_damages_interest').val();
  if (to_invoke_guarntee ==true)
  {
     if (claim_for_damages_interest =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var claim_for_specific_performance = $('#claim_for_specific_performance').is(':checked'); 
   
  var damageamountinterestwithinterest  = $('#damageamountinterestwithinterest').val();
  if (claim_for_specific_performance ==true)
  {
    // alert(damageamountinterestwithinterest);
     if (damageamountinterestwithinterest  =='')
  {

   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
 var freightrefundamount = $('#freightrefundamount').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var nature_and_details_of_cargo = $('#nature_and_details_of_cargo').val();
  if (freightrefundamount ==true)
  {
     if (nature_and_details_of_cargo =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }
  var freightrefundamount = $('#freightrefundamount').is(':checked'); 
  // alert(demand_for_licence_fee_interest);
  var nature_and_details_of_cargo = $('#nature_and_details_of_cargo').val();
  if (freightrefundamount ==true)
  {
     if (nature_and_details_of_cargo =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Value", "", "error");
   return false;
 }
 }

 //corporate end
  var damage_with_interest = $('#damage_with_interest').val();
    // alert (damage_with_interest); exit;
    if (damage_with_interest =='')
    {
      $('#reliefrequestsave').show();
      swal("Enter Total Amount Including Interest", "", "error");
      return false;
    }
    event.preventDefault();
    $.ajax({
      url:"{{ route('reliefrequest.respondantrelief') }}",
      method:"POST",
      data: new FormData(this),
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      success:function(data)
      {
       var html = '';
       if(data.errors)
       {
        html = '<div class="alert alert-danger">';
        for(var count = 0; count < data.errors.length; count++)
        {
         html += '<p>' + data.errors[count] + '</p>';
       } 
       html += '</div>';
     }
     if(data.success)  
     {
       swal("Relief Request Added Successfully ", "", "success");
   // alert("Relief Request Added Successfully");
   // window.location.href = newUrl;
    window.location.reload();
 }
}
})
  });

 

   var user_id;
 });

</script>
<script type="text/javascript">
// $("#add_newaccount").click(function(){

  $('#add_newaccount').on('submit', function(event){
     
    var claim_id=$('#claimnoticeid').val();
    event.preventDefault();
    $.ajax({
      url:"{{ route('claimdetails.loan_details_counter') }}",
      method:"POST",
      data: new FormData(this),
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      success:function(data)
      {
        var html = '';
        if(data.errors)
        {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
            html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
        } 
        if(data.success)
        {
          var get_url="{{url('/gettotal_outstandingamount_counter')}}/{{$claimnotices[0]->id}}"
          swal("Loan Added Successfully", "", "success");
          $.ajax({
           type:"GET",
           url:get_url,
           success:function(res){ 
            console.log(res['loan_details'].length);
            console.log(res);
            html += '';
            $("#loan_details_sync_res").empty();
            var sn_count = 1;
            document.getElementById("total_amount_bank_counter").value = res['outstanding_amount'][0]['total_amount'];
            for(var count = 0; count < res['loan_details'].length; count++)
            {
             var sn_count_new = sn_count++;
             html += '<tr>';
             html += '<td>'+sn_count_new +'</td>';
             if (res['loan_details'][count].loan_acc_bank == null) 
             {
              html += '<td></td>';
            }
            else
            {
              html += '<td>'+res['loan_details'][count].loan_acc_bank+'</td>'; 
            }

            if (res['loan_details'][count].date_of_application_bank == null) 
            {
              html += '<td></td>';
            }
            else
            {
              html += '<td>'+res['loan_details'][count].date_of_application_bank+'</td>';
            }


            html += '<td>'+res['loan_details'][count].date_of_sanction_bank+'</td>';
            html += '<td>'+res['loan_details'][count].sanction_ammount+'</td>';
            html += '<td>'+res['loan_details'][count].outstanding_amount+'</td>';
            html += '</tr>';
          }
          $('#loan_details_sync_res').append(html);
       // $('tbody').html(html);


     }
   });
          $("#add_newaccount")[0].reset();
// alert("Claim Details Added Successfully");



// document.getElementById("claimdetailsform").style.display = "block";

}
// $('#add_newaccount').html(html);
}
})

// });

});
</script>
<script type="text/javascript">
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $('#bankclaimsavefunctionality_counter').click(function (e) {

     var total_amount_bank = $('#total_amount_bank_counter').val();
      var reason_for_claim = $('#reason_for_claim').val();
      var claim_id=$('#claimnoticeid').val();
    if (reason_for_claim =='')
    {
      swal("Enter Reasons For Claim ", "", "error");
      return false;
    }
     if (total_amount_bank =='')
    {
      swal("Enter Total Amount Bank ", "", "error");
      return false;
    }
 $('#bankclaimsavefunctionality_counter').hide();

   //alert("Sample");

    e.preventDefault();
      $.ajax({
    url:"{{ route('claimdetails.savebankdetails_counter') }}",
    method:"POST",         
    data:{reason_for_claim:reason_for_claim,total_amount_bank:total_amount_bank,claim_id:claim_id},
    success:function(data){
       swal("Claim Details Added Successfully", "", "success");
   // alert("Claim Details Added Successfully");
   $("#tab2_res").show();
  $("#slide").attr('class', 'move-to-second');
  $(".tab").attr('class', 'tab');
  $("#tab2_res").attr('class', 'tab selected active'); 
   document.getElementById("respondent_claimdetailsform").style.display = "none";
  document.getElementById("respondent_reliefrequestdetails").style.display = "block";

    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 })
  });
 });
</script>




<!-- End Of Climant Information Modal -->
