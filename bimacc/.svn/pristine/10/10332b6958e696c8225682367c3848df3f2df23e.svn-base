
<!-- Edit Climant Details Modal-->
@foreach ($claimantinformations as $claimantinformation)
@foreach ($claimandrelief as $claimDetail)

<div class="modal fade" id="editClaimantDetailsModal{{$claimDetail->claimnoticeid}}" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="claimdetailslabel">Edit Claim and Relief Request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
         <div id="wrap">
          <div class="tab"></div>
          <div id="tab1" class="tab selected"><a href="#" id="hrefclaimdetails" class="active"  onclick="claimdetailsselected()">Claim Details</a></div>
          <div id="tab2" class="tab" style="border-bottom: none;" id="hrefreliefrequest" onclick="reliefrequestselected()"><a href="#" style="color: black">Relief Request</a></div>
          <div class="tab"></div>
        </div>
      </div>
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
  <div class="row register-form" id="claimdetailsform">

    @if($claimantinformation->dispute_category_Code =="AAS")
    @include('ClaimDetailForms/1AdmiraltyDisputes') 
    @elseif($claimantinformation->dispute_category_Code =="ADS")
    @include('ClaimDetailForms/2AviationDisputes') 
    @elseif($claimantinformation->dispute_category_Code =="B&F")
    @include('ClaimDetailForms/3BankingFinanceMoneyDisputes')
    @elseif($claimantinformation->dispute_category_Code =="CD")
    @include('ClaimDetailForms/4ConsumerDisputes')
    @elseif($claimantinformation->dispute_category_Code =="CCD")
    @include('ClaimDetailForms/5ContractsAndCommercialDisputes')
    @elseif($claimantinformation->dispute_category_Code =="CPD")
    @include('ClaimDetailForms/6PartnershipDisputes')
    @elseif($claimantinformation->dispute_category_Code =="CPD")
    @include('ClaimDetailForms/6PartnershipDisputes')
    @elseif($claimantinformation->dispute_category_Code =="CID")
    @include('ClaimDetailForms/7CorporateandInvestmentDisputes')
    @elseif($claimantinformation->dispute_category_Code =="COD")
    @include('ClaimDetailForms/8CommunityDisputes')
    @elseif($claimantinformation->dispute_category_Code =="EMD")
    @include('ClaimDetailForms/9EmploymentandConsultantsDisputes')
    @elseif($claimantinformation->dispute_category_Code =="EID")
    @include('ClaimDetailForms/10EnergyDisputes')
    @elseif($claimantinformation->dispute_category_Code =="FAD")
    @include('ClaimDetailForms/11FamilyandPartitionDisputes')
    @elseif($claimantinformation->dispute_category_Code =="GOV")
    @include('ClaimDetailForms/12GovernmentDisputes')
    @elseif($claimantinformation->dispute_category_Code =="IPR")    @include('ClaimDetailForms/13IntellectualPropertyandInformationTechnology')
    @elseif($claimantinformation->dispute_category_Code =="IND")
    @include('ClaimDetailForms/14InsuranceandLogisticDisptues')
    @elseif($claimantinformation->dispute_category_Code =="FAD")
    @elseif($claimantinformation->dispute_category_Code =="MAS")
    @include('ClaimDetailForms/15MediaandSports')
    @elseif($claimantinformation->dispute_category_Code =="RED")
    @include('ClaimDetailForms/17RealEstateDisputes')
    @elseif($claimantinformation->dispute_category_Code =="AOD")
    @include('ClaimDetailForms/18OtherDisputes')
    @elseif($claimantinformation->dispute_category_Code =="COV")
    @include('ClaimDetailForms/18OtherDisputes')
    @endif
  </div>
  <div class="row register-form" id="reliefrequestdetails" style="display: none">

   @if($claimantinformation->dispute_category_Code =="AAS")
   @include('ReliefRequestDetailsForms/1AdmiraltyDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="ADS")
   @include('ReliefRequestDetailsForms/2AviationDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="B&F")
   @include('ReliefRequestDetailsForms/3BankingFinanceMoneyDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CD")
   @include('ReliefRequestDetailsForms/4ConsumerDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CCD")
   @include('ReliefRequestDetailsForms/5ContractsAndCommercialDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CPD")
   @include('ReliefRequestDetailsForms/6PartnershipDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CPD")
   @include('ReliefRequestDetailsForms/6PartnershipDisputes')
   @elseif($claimantinformation->dispute_category_Code =="CID")
   @include('ReliefRequestDetailsForms/7CorporateandInvestmentDisputes')
   @elseif($claimantinformation->dispute_category_Code =="COD")
   @include('ReliefRequestDetailsForms/8CommunityDisputes')
   @elseif($claimantinformation->dispute_category_Code =="EMD")
   @include('ReliefRequestDetailsForms/9EmploymentandConsultantsDisputes')
   @elseif($claimantinformation->dispute_category_Code =="EID")
   @include('ReliefRequestDetailsForms/10EnergyDisputes')   
   @elseif($claimantinformation->dispute_category_Code =="FAD")
   @include('ReliefRequestDetailsForms/11FamilyandPartitionDisputes')
   @elseif($claimantinformation->dispute_category_Code =="GOV")
   @include('ReliefRequestDetailsForms/12GovernmentDisputes') 
   @elseif($claimantinformation->dispute_category_Code =="IPR")
   @include('ReliefRequestDetailsForms/13IntellectualPropertyandInformationTechnology')
   @elseif($claimantinformation->dispute_category_Code =="IND")
   @include('ReliefRequestDetailsForms/14InsuranceandLogisticDisptues')
   @elseif($claimantinformation->dispute_category_Code =="MAS")
   @include('ReliefRequestDetailsForms/15MediaandSports')
   @elseif($claimantinformation->dispute_category_Code =="RED")
   @include('ReliefRequestDetailsForms/17RealEstateDisputes')
    @elseif($claimantinformation->dispute_category_Code =="AOD")
   @include('ReliefRequestDetailsForms/18OtherDisputes')
    @elseif($claimantinformation->dispute_category_Code =="COV")
   @include('ReliefRequestDetailsForms/18OtherDisputes')
   @else

   @endif

 </div>                                 
</div>

</div>
</div>
</div> 
<script type="text/javascript">
    $('.date').datepicker({  
       dateFormat: 'yy-mm-dd'
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
function duplicate() {
  var original = document.getElementById('personnelloan_details');
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "personnelloan_details" + ++i; // there can only be one element with an ID
    original.parentNode.appendChild(clone);
}
</script>
@endforeach
@endforeach




<!-- End Of Climant Information Modal -->
