<!-- Create Climant Information Modal-->



<div class="modal-body">
  <div class="row">
   <div id="wrap">
    <div class="tab"></div>
    <div id="tab1_res{{$details->user_id}}" class="tab selected"><a href="#"  class="active"  onclick="res_claimdetailsselected('{{$details->user_id}}')">Claim Details</a></div>
    <div id="res_tab2{{$details->user_id}}" class="tab" style="border-bottom: none;"  onclick="res_reliefrequestselected('{{$details->user_id}}')"><a href="#" style="color: black">Relief Request</a></div>
    <div class="tab"></div> 
  </div>
</div>
<div class="row register-form" style="width: 100%" id="res_claimdetailsform{{$details->user_id}}">
  @if($details->dispute_category_Code =="AAS")
  @include('CounterClaimShowPageClaimDetails/1AdmiraltyDisputes') 
  @elseif($details->dispute_category_Code =="ADS")
  @include('CounterClaimShowPageClaimDetails/2AviationDisputes') 
   @elseif($details->dispute_category_Code =="B&F")
  @include('CounterClaimShowPageClaimDetails/3BankingFinanceMoneyDisputes')
   @elseif($details->dispute_category_Code =="CD")
  @include('CounterClaimShowPageClaimDetails/4ConsumerDisputes') 
   @elseif($details->dispute_category_Code =="CCD")
  @include('CounterClaimShowPageClaimDetails/5ContractsAndCommercialDisputes')
  @elseif($details->dispute_category_Code =="CPD")
  @include('CounterClaimShowPageClaimDetails/6PartnershipDisputes')
  @elseif($details->dispute_category_Code =="COD")
  @include('CounterClaimShowPageClaimDetails/8CommunityDisputes')
  @elseif($details->dispute_category_Code =="GOV")
  @include('CounterClaimShowPageClaimDetails/12GovernmentDisputes')
  @elseif($details->dispute_category_Code =="EMD")
  @include('CounterClaimShowPageClaimDetails/9EmploymentandConsultantsDisputes')
  @elseif($details->dispute_category_Code =="EID")
  @include('CounterClaimShowPageClaimDetails/10EnergyDisputes')
  @elseif($details->dispute_category_Code =="FAD")
  @include('CounterClaimShowPageClaimDetails/11FamilyandPartitionDisputes')
   @elseif($details->dispute_category_Code =="IND")
  @include('CounterClaimShowPageClaimDetails/14InsuranceandLogisticDisptues')
   @elseif($details->dispute_category_Code =="RED")
  @include('CounterClaimShowPageClaimDetails/17RealEstateDisputes')
   @elseif($details->dispute_category_Code =="CID")
  @include('CounterClaimShowPageClaimDetails/7CorporateandInvestmentDisputes')
    @elseif($details->dispute_category_Code =="MAS")
  @include('CounterClaimShowPageClaimDetails/15MediaandSports')
   @elseif($details->dispute_category_Code =="IPR")
  @include('CounterClaimShowPageClaimDetails/13IntellectualPropertyandInformationTechnology')
   @elseif($details->dispute_category_Code =="AOD")
  @include('CounterClaimShowPageClaimDetails/18OtherDisputes')
   @elseif($details->dispute_category_Code =="COV")
  @include('CounterClaimShowPageClaimDetails/18OtherDisputes')
  
  

  @endif
</div>
<div class="row register-form" id="res_reliefrequestdetails{{$details->user_id}}" style="display: none">
 @if($details->dispute_category_Code =="AAS")
 @include('CounterClaimShowPageReliefRequest/1AdmiraltyDisputes') 
 @elseif($details->dispute_category_Code =="ADS")
 @include('CounterClaimShowPageReliefRequest/2AviationDisputes') 
 @elseif($details->dispute_category_Code =="B&F")
  @include('CounterClaimShowPageReliefRequest/3BankingFinanceMoneyDisputes') 
   @elseif($details->dispute_category_Code =="CD")
  @include('CounterClaimShowPageReliefRequest/4ConsumerDisputes') 
  @elseif($details->dispute_category_Code =="CCD")
  @include('CounterClaimShowPageReliefRequest/5ContractsAndCommercialDisputes')
   @elseif($details->dispute_category_Code =="CPD")
  @include('CounterClaimShowPageReliefRequest/6PartnershipDisputes')
  @elseif($details->dispute_category_Code =="COD")
  @include('CounterClaimShowPageReliefRequest/8CommunityDisputes')
  @elseif($details->dispute_category_Code =="GOV")
  @include('CounterClaimShowPageReliefRequest/12GovernmentDisputes')
   @elseif($details->dispute_category_Code =="EMD")
  @include('CounterClaimShowPageReliefRequest/9EmploymentandConsultantsDisputes')
  @elseif($details->dispute_category_Code =="EID")
  @include('CounterClaimShowPageReliefRequest/10EnergyDisputes')
  @elseif($details->dispute_category_Code =="FAD")
  @include('CounterClaimShowPageReliefRequest/11FamilyandPartitionDisputes')
   @elseif($details->dispute_category_Code =="IND")
  @include('CounterClaimShowPageReliefRequest/14InsuranceandLogisticDisptues')
  @elseif($details->dispute_category_Code =="RED")
  @include('CounterClaimShowPageReliefRequest/17RealEstateDisputes')
  @elseif($details->dispute_category_Code =="CID")
  @include('CounterClaimShowPageReliefRequest/7CorporateandInvestmentDisputes')
  @elseif($details->dispute_category_Code =="MAS")
  @include('CounterClaimShowPageReliefRequest/15MediaandSports')
   @elseif($details->dispute_category_Code =="IPR")
  @include('CounterClaimShowPageReliefRequest/13IntellectualPropertyandInformationTechnology')
  @elseif($details->dispute_category_Code =="AOD")
  @include('CounterClaimShowPageReliefRequest/18OtherDisputes')
  @elseif($details->dispute_category_Code =="COV")
  @include('CounterClaimShowPageReliefRequest/18OtherDisputes')
  
 @endif
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
  function res_claimdetailsselected(id)
  {
    // alert("Sam");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#tab1_res"+id).attr('class', 'tab selected active'); 
    document.getElementById("res_claimdetailsform"+id).style.display = "block";
    document.getElementById("res_reliefrequestdetails"+id).style.display = "none";
  }

  function res_reliefrequestselected(id)
  {
    // alert("Aravinth");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#res_tab2"+id).attr('class', 'tab selected active'); 
    document.getElementById("res_claimdetailsform"+id).style.display = "none";
    document.getElementById("res_reliefrequestdetails"+id).style.display = "block";
  }
  
</script>

<!-- End Of Climant Information Modal -->
