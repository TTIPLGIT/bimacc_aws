<!-- Create Climant Information Modal-->


<div class="modal fade" id="idclaiminformationdetails" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
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
          <div id="tab1" class="tab selected"><a href="#" id="hrefclaimdetails" class="active"  onclick="claimdetailsselected()">Claim Details</a></div>
          <div id="tab2" class="tab" style="border-bottom: none; display: none" id="hrefreliefrequest" onclick="reliefrequestselected()"><a href="#" style="color: black" >Relief Request</a></div>
          <div class="tab"></div>
        </div>
      </div>
      @foreach ($claimantinformations as $claimantinformation)
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
<script type="text/javascript">
// $("#add_newaccount").click(function(){

  $('#add_newaccount').on('submit', function(event){z
  event.preventDefault();
  $.ajax({
    url:"{{ route('claimdetails.loan_details') }}",
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
        swal("Loan Added Successfully", "", "success");
        $.ajax({
         type:"GET",
         url:"{{url('/gettotal_outstandingamount')}}",
         success:function(res){ 
          console.log(res['loan_details'].length);
          console.log(res);
            html += '';
            $("#loan_details_sync").empty();
          var sn_count = 1;
          document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount'];
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
         $('#loan_details_sync').append(html);
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
<script>

  $(document).ready(function(){
   $('#sample_form').on('submit', function(event){


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
    if (reason_for_claim =='')
    {
      swal("Enter Reasons For Claim ", "", "error");
      return false;
    }
    event.preventDefault();
    $.ajax({
      url:"{{ route('claimdetails.store') }}",
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
   // alert("Claim Details Added Successfully");
   $("#tab2").show();
   $("#slide").attr('class', 'move-to-second');
   $(".tab").attr('class', 'tab');
   $("#tab2").attr('class', 'tab selected active'); 
   document.getElementById("claimdetailsform").style.display = "none";
   document.getElementById("reliefrequestdetails").style.display = "block";

      // html = '<div class="alert alert-success">' + data.success + '</div>';
      // $('#sample_form')[0].reset();
    }
    $('#form_result').html(html);
  }
})
  });


   $('#claimdetails_update_form').on('submit', function(event){
//  var claimamount = $('#claimamount').val();
//       if (claimamount =='')
//       {
//       swal("Enter Claim Amount ", "", "error");
//       return false;
//     }
// if (claimamount < 25000)
//       {
//       swal("Claim Amount Should be Greater than 25000 ", "", "error");
//       return false;
//     }

var reason_for_claim = $('#reason_for_claim').val();
if (reason_for_claim =='')
{
  swal("Enter Reasons For Claim ", "", "error");
  return false;
}
event.preventDefault();
$.ajax({
  url:"{{ route('claimdetails.updateClaimDetails') }}",
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
    console.log(data.errors);
    html = '<div class="alert alert-danger">';
    for(var count = 0; count < data.errors.length; count++)
    {
     html += '<p>' + data.errors[count] + '</p>';
   }
   html += '</div>';
 }
 if(data.success)
 {

  swal("Claim Details Updated Successfully ", "", "success");
  $("#slide").attr('class', 'move-to-second');
  $(".tab").attr('class', 'tab');

  $("#tab2").attr('class', 'tab selected active'); 
  document.getElementById("claimdetailsform").style.display = "none";
  document.getElementById("reliefrequestdetails").style.display = "block";
$('#claimsave').hide();
      // html = '<div class="alert alert-success">' + data.success + '</div>';
      // $('#sample_form')[0].reset();
    }
    $('#form_result').html(html);
  }
})
});
   var newUrl= 'create';
   $('#reliefrequest_form').on('submit', function(event){

    $('#reliefrequestsave').hide();
   // alert("ASdasdasd"); 
   var valuation_of_firm_and_or_goodwill = $('#valuation_of_firm_and_or_goodwill').val();
   if (valuation_of_firm_and_or_goodwill =='')
   {
    swal("Enter Estimated Value of the Firm", "", "error");
    $('#reliefrequestsave').show();
    return false;
  }
  var damage_with_interest = $('#damage_with_interest').val();
  if (damage_with_interest =='')
  {
   $('#reliefrequestsave').show();
   swal("Enter Total Amount Including Interest", "", "error");
   return false;
 }
 event.preventDefault();
 $.ajax({
  url:"{{ route('reliefrequest.store') }}",
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
   window.location.href = newUrl;
 }
}
})
});

   $('#reliefrequest_update_form').on('submit', function(event){
    var valuation_of_firm_and_or_goodwill = $('#valuation_of_firm_and_or_goodwill').val();
    if (valuation_of_firm_and_or_goodwill =='')
    {
      swal("Enter Estimated Value of the Firm", "", "error");
      return false;
    }
    var damage_with_interest = $('#damage_with_interest').val();
    if (damage_with_interest =='')
    {
      swal("Enter Total Amount Including Interest", "", "error");
      return false;
    }
    event.preventDefault();
    $.ajax({
      url:"{{ route('reliefrequest.updatereliefrequest') }}",
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
       swal("Relief Request Updated Successfully ", "", "success");
      //alert("Relief Request Updated Successfully");
      window.location.href = newUrl;
    }
  }
})
  });

   var user_id;
 });

</script>
<script>
  var i = 0;
  function duplicate() 
  {
    var original = document.getElementById('personnelloan_details');
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "personnelloan_details" + ++i; // there can only be one element with an ID
    original.parentNode.appendChild(clone);
  }
</script>




<!-- End Of Climant Information Modal -->
