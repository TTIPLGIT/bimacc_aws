<!-- Create Climant Information Modal-->



<div class="modal-body">
  <div class="row">
   <div id="wrap">
    <div class="tab"></div>
    <div id="tab1" class="tab selected"><a href="#" id="hrefclaimdetails" class="active"  onclick="claimdetailsselected()">Claim Details</a></div>
    <div id="tab2" class="tab" style="border-bottom: none;" id="hrefreliefrequest" onclick="reliefrequestselected()"><a href="#" style="color: black">Relief Request</a></div>
    <div class="tab"></div>
  </div>
</div>
<div class="row register-form" style="width: 100%" id="claimdetailsform">
  @if($claimantinformation->dispute_category_Code =="AAS")
  @include('ShowPageClaimDetails/1AdmiraltyDisputes') 
  @elseif($claimantinformation->dispute_category_Code =="ADS")
  @include('ShowPageClaimDetails/2AviationDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="B&F")
  @include('ShowPageClaimDetails/3BankingFinanceMoneyDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CD")
  @include('ShowPageClaimDetails/4ConsumerDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="CCD")
  @include('ShowPageClaimDetails/5ContractsAndCommercialDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CPD")
  @include('ShowPageClaimDetails/6PartnershipDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COD")
  @include('ShowPageClaimDetails/8CommunityDisputes')
  @elseif($claimantinformation->dispute_category_Code =="GOV")
  @include('ShowPageClaimDetails/12GovernmentDisputes')
  @elseif($claimantinformation->dispute_category_Code =="EMD")
  @include('ShowPageClaimDetails/9EmploymentandConsultantsDisputes')
  @elseif($claimantinformation->dispute_category_Code =="EID")
  @include('ShowPageClaimDetails/10EnergyDisputes')
  @elseif($claimantinformation->dispute_category_Code =="FAD")
  @include('ShowPageClaimDetails/11FamilyandPartitionDisputes')
   @elseif($claimantinformation->dispute_category_Code =="IND")
  @include('ShowPageClaimDetails/14InsuranceandLogisticDisptues')
   @elseif($claimantinformation->dispute_category_Code =="RED")
  @include('ShowPageClaimDetails/17RealEstateDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CID")
  @include('ShowPageClaimDetails/7CorporateandInvestmentDisputes')
    @elseif($claimantinformation->dispute_category_Code =="MAS")
  @include('ShowPageClaimDetails/15MediaandSports')
   @elseif($claimantinformation->dispute_category_Code =="IPR")
  @include('ShowPageClaimDetails/13IntellectualPropertyandInformationTechnology')
   @elseif($claimantinformation->dispute_category_Code =="AOD")
  @include('ShowPageClaimDetails/18OtherDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COV")
  @include('ShowPageClaimDetails/18OtherDisputes')
  

  @endif
</div>
<div class="row register-form" id="reliefrequestdetails" style="display: none">
 @if($claimantinformation->dispute_category_Code =="AAS")
 @include('ShowPageReliefRequest/1AdmiraltyDisputes') 
 @elseif($claimantinformation->dispute_category_Code =="ADS")
 @include('ShowPageReliefRequest/2AviationDisputes') 
 @elseif($claimantinformation->dispute_category_Code =="B&F")
  @include('ShowPageReliefRequest/3BankingFinanceMoneyDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="CD")
  @include('ShowPageReliefRequest/4ConsumerDisputes') 
  @elseif($claimantinformation->dispute_category_Code =="CCD")
  @include('ShowPageReliefRequest/5ContractsAndCommercialDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CPD")
  @include('ShowPageReliefRequest/6PartnershipDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COD")
  @include('ShowPageReliefRequest/8CommunityDisputes')
  @elseif($claimantinformation->dispute_category_Code =="GOV")
  @include('ShowPageReliefRequest/12GovernmentDisputes')
   @elseif($claimantinformation->dispute_category_Code =="EMD")
  @include('ShowPageReliefRequest/9EmploymentandConsultantsDisputes')
  @elseif($claimantinformation->dispute_category_Code =="EID")
  @include('ShowPageReliefRequest/10EnergyDisputes')
  @elseif($claimantinformation->dispute_category_Code =="FAD")
  @include('ShowPageReliefRequest/11FamilyandPartitionDisputes')
   @elseif($claimantinformation->dispute_category_Code =="IND")
  @include('ShowPageReliefRequest/14InsuranceandLogisticDisptues')
  @elseif($claimantinformation->dispute_category_Code =="RED")
  @include('ShowPageReliefRequest/17RealEstateDisputes')
  @elseif($claimantinformation->dispute_category_Code =="CID")
  @include('ShowPageReliefRequest/7CorporateandInvestmentDisputes')
  @elseif($claimantinformation->dispute_category_Code =="MAS")
  @include('ShowPageReliefRequest/15MediaandSports')
   @elseif($claimantinformation->dispute_category_Code =="IPR")
  @include('ShowPageReliefRequest/13IntellectualPropertyandInformationTechnology')
  @elseif($claimantinformation->dispute_category_Code =="AOD")
  @include('ShowPageReliefRequest/18OtherDisputes')
  @elseif($claimantinformation->dispute_category_Code =="COV")
  @include('ShowPageReliefRequest/18OtherDisputes')
  
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
  function claimdetailsselected()
  {
    //alert("Sam");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#tab1").attr('class', 'tab selected active'); 
    document.getElementById("claimdetailsform").style.display = "block";
    document.getElementById("reliefrequestdetails").style.display = "none";
  }

  function reliefrequestselected()
  {
    //alert("Aravinth");
    $("#slide").attr('class', 'move-to-second');
    $(".tab").attr('class', 'tab');
    $("#tab2").attr('class', 'tab selected active'); 
    document.getElementById("claimdetailsform").style.display = "none";
    document.getElementById("reliefrequestdetails").style.display = "block";
  }
  
</script>

<!-- End Of Climant Information Modal -->
