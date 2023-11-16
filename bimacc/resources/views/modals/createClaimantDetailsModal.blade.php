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
           @if($claimantinformation->others !='')
            <input type="text" value="{{$claimantinformation->others}}" readonly class="form-control" style="text-align: center;">
            @else
             <input type="text" value="{{$claimantinformation->subcategory_name}}" readonly class="form-control" style="text-align: center;">
            @endif


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

  $('#add_newaccount').on('submit', function(event){
    // alert("jjh");
     $('#add_newaccount1').hide();

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
             html += '<td><a href="#" onclick="bank_showonclick_main('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
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
            html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_mainonclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_delete('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
            
            html += '</tr>';
          }
          $('#loan_details_sync').append(html);
           window.location.reload();
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
// $("#add_newaccount").click(function(){
  $(".common-class-on-the-forms").on("submit", function() {
    // Use `this` here to refer to the specific form that was submitted
});
  $('#add_newaccount_update').on('submit', function(event){
    $('#add_newaccount_update1').hide();
    event.preventDefault();
    $.ajax({
      url:"{{ route('claimdetails.loan_details_update') }}",
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
            $("#loan_details_sync_update").empty();
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
              html += '<td><a href="#" onclick="bank_showonclick('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
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
             html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
            
            html += '</tr>';
          }
          $('#loan_details_sync_update').append(html);
       // document.getElementById("bank_showedit_form_main").style.display = "none";
        window.location.reload();


     }
   });
          $("#add_newaccount_update")[0].reset();


}
// $('#add_newaccount').html(html);
}
})
 $('#bankclaimsavefunctionality').on('submit', function(event){
  var html = '';
  document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount']; 
          $('#damage_with_interest').append(html);
       // $('tbody').html(html);


     })

});

</script>
<script type="text/javascript">
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $('#bankclaimsavefunctionality').click(function (e) {

     var total_amount_bank = $('#total_amount_bank').val();
      var reason_for_claim = $('#reason_for_claim').val();
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
 $('#bankclaimsavefunctionality').hide();
   // alert("Sample");

    e.preventDefault();
      $.ajax({
    url:"{{ route('claimdetails.savebankdetails') }}",
    method:"POST",         
    data:{reason_for_claim:reason_for_claim,total_amount_bank:total_amount_bank},
    success:function(data){
       swal("Claim Details Added Successfully", "", "success");
   // alert("Claim Details Added Successfully");
   $("#tab2").show();
   $("#slide").attr('class', 'move-to-second');
   $(".tab").attr('class', 'tab');
   $("#tab2").attr('class', 'tab selected active'); 
   document.getElementById("claimdetailsform").style.display = "none";
   document.getElementById("reliefrequestdetails").style.display = "block";
   window.location.reload();
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 })
  });
 });
</script>
<script type="text/javascript">
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $('#bankclaimupdatefunctionality').click(function (e) {

     var total_amount_bank = $('#total_amount_bank').val();
      var reason_for_claim = $('#reason_for_claim').val();
    if (reason_for_claim =='')
    {
      swal("Enter Reasons For Claim ", "", "error");
      return false;
    }

   // alert("Sample");

    e.preventDefault();
      $.ajax({
    url:"{{ route('claimdetails.updatebankdetails') }}",
    method:"POST",         
    data:{reason_for_claim:reason_for_claim,total_amount_bank:total_amount_bank},
    success:function(data){
       swal("Claim Details Updated Successfully", "", "success");
   // alert("Claim Details Added Successfully");
   $("#tab2").show();
   $("#slide").attr('class', 'move-to-second');
   $(".tab").attr('class', 'tab');
   $("#tab2").attr('class', 'tab selected active'); 
   document.getElementById("claimdetailsform").style.display = "none";
   document.getElementById("reliefrequestdetails").style.display = "block";
   window.location.reload();
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 })
  });
 });
</script>
<script type="text/javascript">
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 });
    function loanupdatefunctionality1(id,e) {

   // alert("jhhjj");
   // var id=$('#loanupdatefunctionality').attr('form_id');
   var loan_acc = $('#loan_acc').val();
   var myForm = document.getElementById('loanupdatefunctionality1'+id);
   var formData = new FormData(myForm);
 //alert (id);
     e.preventDefault();
      $.ajax({
    url:"{{ route('claimdetails.loanbank_details_update') }}",
    method:"POST",         
    data:$('#loanupdatefunctionality1'+id).serialize(),
    success:function(data){
       swal("Loan Details Updated Successfully", "", "success");
       var html='';
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
              // html += '<td>'+res['loan_details'][count].loan_acc_bank+'</td>'; 
               html += '<td><a href="#" onclick="bank_showonclick_main('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
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
             html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_mainonclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_delete('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
             html += '</tr>';
         }
         $('#loan_details_sync').append(html);
          // $('#loanupdatefunctionality').append(html);
          // document.getElementById("bank_show_form").style.display = "none";
           window.location.reload();
          // document.getElementById("bank_edit").style.display = "none";
       // $('tbody').html(htmlban

       }
     });
 
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 });
  };
</script>
<script type="text/javascript">
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 });
    function loanupdatefunctionality(id,e) {

   // alert("jhhjj");
   // var id=$('#loanupdatefunctionality').attr('form_id');
   var loan_acc = $('#loan_acc').val();
   var myForm = document.getElementById('loanupdatefunctionality'+id);
   var formData = new FormData(myForm);
 //alert (id);
     e.preventDefault();
      $.ajax({
    url:"{{ route('claimdetails.loanbank_details_update') }}",
    method:"POST",         
    data:$('#loanupdatefunctionality'+id).serialize(),
    success:function(data){
       swal("Loan Details Updated Successfully", "", "success");
       var html='';
       $.ajax({
         type:"GET",
         url:"{{url('/gettotal_outstandingamount')}}",
         success:function(res){ 
          console.log(res['loan_details'].length);
          console.log(res);

            html += '';
            $("#loan_details_sync_update").empty();
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
              // html += '<td>'+res['loan_details'][count].loan_acc_bank+'</td>'; 
               html += '<td><a href="#" onclick="bank_showonclick('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
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
             html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
             html += '</tr>';
         }
         $('#loan_details_sync_update').append(html);
          // $('#loanupdatefunctionality').append(html);
          // document.getElementById("bank_show_form").style.display = "none";
           window.location.reload();
          // document.getElementById("bank_edit").style.display = "none";
       // $('tbody').html(htmlban

       }
     });
 
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 });
  };
</script>
<script>

  $(document).ready(function(){
   $('#sample_form').on('submit', function(event){

     //
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
    if (reason_for_claim =='')
    {
      swal("Enter Reasons For Claim ", "", "error");
      return false;
    }
     $('#claimsave').hide();
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

   // validation corporate
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
      // validation corporate
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
    $( document ).ready(function() {
    var div_id=$('.div_id').last().remove();
});
</script>




<!-- End Of Climant Information Modal -->
