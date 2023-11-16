<style type="text/css">
  .dataTables_paginate 
{
float: left !important;
}

</style>
@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))

<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container con">
  <!-- <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a onclick="exportTableToExcel('dataTable','Respondant List-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->
<div class="col-lg-4">

           
        </div>
 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claim Notice Details</h6>
  </div>
  <div class="card-body" >
    <div class="row">
      <div class="col-lg-5" id="panel-heading"></div>
      <div class="col-lg-4"></div>
       <div class="col-lg-1"></div>
      <div class="col-lg-2">

   <input type="text" id="myCustomSearchBox" class="form-control" placeholder="Search">
 </div>

 </div>
  <div class="row">
      <div class="col-lg-5"></div>
      <div class="col-lg-4" ></div>
       <div class="col-lg-1" ></div>
      <div class="col-lg-2" id="panel-heading1" style="text-align: right;">

  
 </div>

 </div>
    <div class="table-responsive"> 
 
      <h1></h1>

      <h2></h2>
 
      <div role="region" aria-labelledby="HeadersRow" tabindex="0" class="colheaders">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">

          <thead >
            <tr>
              <th>Sl. No.</th>
              <th>Claim Notice No.</th>
              <th>Claim Status</th>
              <th>Claimant Type</th>

              <th>Claimant Name</th>
              <th>Branch / Dep Name</th>
              <th>Main Dis Category</th>
              <th>Sub-Dispute category</th>

              <th> Email</th>
              <th>Phone No.</th>

              <th>City</th>
              <th>State</th>
              <th>Authorisation Document</th>
              
              <th>ID Proof</th>



              @if($dispute_categories_id =='2')
              <th>Loan A/c No.</th>
              <th>Sanction Amount</th> 
              <th>Date of Application for Financial Facility</th> 
              <th>Date of Sanction</th>
              <th>Security Type</th> 
              <th>Description of Property</th> 
              <th>Value</th> 
              <th>Schedule & Boundries</th> 
              <th>Name of mortgagor / Hypotheicator/ Guarantor</th> 
              <th>Date of mortgage / Hypothecation / Gurantee</th>
              <th>Engine No. </th>
              <th>Chassis No.</th> 
              <th>Renewal Date</th>
              <th>Revival Date</th>
              <th>Other Document</th> 
              <th>Date of Default</th> 
              <th>Demand / Legal Notice</th> 
              <th>NPA Date</th> 
              <th>Amount as per Account</th> 
              <th>Rate of Interst (%)</th> 
              <th>Penal Interest</th> 
              <th>Other Charges</th> 
              <th>Outstanding Amount</th> 
              <th>Date of outstanding</th>
              <th>Total Outstanding Amount</th> 
              <th>Enforcement of Security Interest</th> 
              <th>Enforcement of Guarantees</th> 
              <th>Future Interest During Pendency of Arbitration</th> 
              <th>Future Interest from the Date of Award</th>
             
              <!-- admirality -->
              @elseif($dispute_categories_id =='1')
              <th>Vessel Name</th> 
              <th>Cargo Nature</th> 
              <th>Quantity and Specification</th> 
              <th>Seaman/ Passenger Injury/ Loss Details</th> 
              <th>Reason for Claim</th> 
              <th>Claim Amount (INR)</th> 
              <th>Claim Amount Interest(%)</th> 
              <th>Date of Contract</th> 
              <th>Bill of Lading/ Ticket No</th> 
              <th>Passenger Ticket/ Booking Date</th> 
              <th>Date of Breach/ Due Date/ Date of Cause of Action</th> 
              <th>Date of Notice</th> 
              <th>Reason for Cargo Delivery Dispute</th> 
              <th>Cargo Nature</th> 
              <th>Quantity and Specification</th> 
              <th>Value of Claim for Payment of Freight Amount</th> 
              <th>Damages</th> 
              <th>Interest (%)</th> 
              <th>Interest Amount</th> 
              <th>Total Damages Including Interest (INR)</th> 
              <th>Remarks</th> 
              <th>Estimated Value of Contract</th> 
              <!-- aviation -->
              @elseif($dispute_categories_id =='15')
              <th>Carrier Name</th> 
              <th>Charter Party</th> 
              <th>PNR No</th> 
              <th>Cargo/ Baggage Nature</th> 
              <th>Quantity</th> 
              <th>Nature of Claim</th> 
              <th>Value of Claim (INR)</th> 
              <th>Reason for Claim</th> 
              <th>Date of Contract</th> 
              <th>Bill of Lading/ Ticket No</th> 
              <th>Passenger Ticket/ Booking Date</th> 
              <th>Date of Breach/ Due Date/ Date of Cause of Action</th> 
              <th>Date of Notice</th> 
              <th>Value of Claim for Refund of Fare or Freight Amount</th> 
              <th>Interest (%)</th> 
              <th>Claim for delivery of cargo/baggage</th> 
              <th>Value of Cargo</th> 
              <th>Nature and Details of Cargo</th> 
              <th>Value of Claim for Payment of Freight Amount</th> 
              <th>Interest (%</th> 
              <th>Value of Claim for Payment of Damages</th> 
              <th>Interest (%)</th>
              <th>Value of Claim for Demurrages</th>
              <th>Interest (%)</th>
              <th>Claim Details for Specific Performance</th>
              <th>Value of Specific Performance</th>
              <th>Termination of Contract</th> 
              <th>Value of contract</th>
              <th>Return of Property</th>
              <th>Value of Property</th>
              <th>Value of Claim for Expenses and Other Charges</th>
              <th>With Interest (%</th>
              <th>Total Value Claimed</th>
              <th>With Interest (%)</th>
              <th>Interest Amount</th>
              <th>Total Relief Amount including Interest(INR)</th>
              @elseif($dispute_categories_id =='6')
              <th>Value of Claim (INR)</th> 
              <th>Details of Documents</th> 
              <th>Date of Breach</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim</th> 
              <th>Amount (INR)</th> 
              <th>Interest (%)</th> 
              <th>Interest Amount</th> 
              <th>Total Relief Amount Including Interest (INR)</th> 
              <th>Amount (INR)</th> 
              <th>Interest (%)</th> 
              <th>Claim for Admission and Removal of Members</th> 
              <th>Value</th> 
              <th>Claim to Remove or Reinstate Office Bearers</th> 
              <th>Value</th> 
              <th>Claim for Holding or Postponement of Elections</th> 
              <th>Value</th> 
              <th>Claim to Appoint Auditors or Investigators</th> 
              <th>Value</th> 
              <th>Claim to Appoint Auditors</th> 
              <th>Value</th> 
              <th>Claim to Render Accounts</th>
              <th>Value</th> 
              <th>Claim Against Members for Damages and Nuisance</th> 
              <th>Value</th> 
              <th>Claim to Carryout Repairs or Renovation</th> 
              <th>Value</th> 
              @elseif($dispute_categories_id =='3')
              <th>Details of Goods</th> 
              <th>Details of Service</th> 
              <th>Claim Amount(INR)</th> 
              <th>Reason for Claim</th> 
              <th>Date of Contract</th> 
              <th>Date of Invoice</th> 
              <th>Period of Warranty Start Date</th> 
              <th>Period of Warranty End Date</th> 
              <th>Date of Breach</th> 
              <th>Date of Default/ Date of Cause of Action</th> 
              <th>Date of Notice</th> 
              <th>Nature of Goods</th> 
              <th>Quantity of Goods</th> 
              <th>Replacement of Goods</th> 
              <th>Redo the Service</th> 
              <th>Refund of Price (INR)</th> 
              <th>Price of Goods (INR)</th> 
              <th>With Interest (%)</th> 
              <th>Damages</th> 
              <th>Interest Amount</th> 
              <th>Total Amount Including Interest (INR)</th> 
              <!-- Contract -->
              @elseif($dispute_categories_id =='4')
              <th>Total Contract Value (INR)</th> 
              <th>Date of Contract</th> 
              <th>Date of Invoice</th> 
              <th>Nature of Breach</th> 
              <th>Date of Breach</th> 
              <th>Date of Demand</th> 
              <th>Reason for Claim</th> 
              <th>Escalation of Costs</th> 
              <th>Damages</th> 
              <th>Contract Price</th> 
              <th>Specific Performance of Contract</th> 
              <th>Estimated Value of Material</th> 
              <th>Estimated Value of Material</th> 
              <th>Amount Guaranteed</th> 
              <th>Interest Amount</th> 
              <th>Total Claim (INR)</th> 
              <th>Damages</th> 
              <th>Interest (%)</th>
              <!-- corporate -->
              @elseif($dispute_categories_id =='16')
              <th>Date of Agreement</th> 
              <th>Date of Breach</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim</th> 
              <th>Equity Shares</th> 
              <th>Preference Shares</th> 
              <th>Convertible Preference Shares</th> 
              <th>subrogation_values</th> 
              <th>Convertible Debentures</th> 
              <th>Stock Options</th> 
              <th>Investment Coupons</th> 
              <th>Others</th> 
              <th>No. of Shares/ Debentures/ etc.</th> 
              <th>Market Value of Per Share/ Debentures/etc.</th> 
              <th>Face Value per Shares/ Debenture etc.</th> 
              <th>Total Market Value of Investment</th> 
              <th>Net Worth of Company</th> 
              <th>Claim for Allotment</th> 
              <th>Value</th> 
              <th>Claim for Conversion</th> 
              <th>CValue</th> 
              <th>Redemption</th> 
              <th>Value</th> 
              <th>Cancellation of Allotment</th> 
              <th>Value</th> 
              <th>Bonus</th> 
              <th>Value</th> 
              <th>Rights Issue</th> 
              <th>Value</th> 
              <th>Alteration of Register of Members</th> 
              <th>Value</th> 
              <th>Buy Back/ Exit Option</th> 
              <th>Value</th>

              <th>Claim for Interest</th> 
              <th>Value</th>
              <th>Claim for Refund</th> 
              <th>Value</th>
              <th>Appointment/ Removal of Director/ Key Employee</th> 
              <th>Value</th> 
              <th>Appointment/ Removal of Auditors</th> 
              <th>Value</th> 
              <th>Convening/ Cancelling general body meetings/ Annual General Meeting</th> 
              <th>Value</th> 
              <th>Modification/ Annulment of minutes</th> 
              <th>Value</th> 
              <th>Demand for Preferential/ Pre-emption Rights</th> 
              <th>Value/th> 
               <th>Mismanagement and Oppression</th> 
               <th>Value</th> 
               <th>Alteration of Register of Members</th> 
               <th>Value</th> 
               <th>Creation of Charge</th> 
               <th>Value</th> 
               <th>Claim for Damages</th> 
               <th>Value</th> 
               <th>Claim for Specific Performance</th>
               <th>Value</th>
               <th>Total Relief Amount Including Interest (INR)</th> 
               @elseif($dispute_categories_id =='18' || $dispute_categories_id =='20')
              <th>Contract Date</th> 
              <th>Contract Value</th> 
              <th>Nature of Breach</th> 
              <th>Date of Breach/ Cause of Action</th> 
              <th>Date of Notice</th> 
              <th>Claim value (INR)</th> 
              <th>Consideration Amount</th> 
              <th>With Interest(%)</th> 
              <th>Refund Amount:</th> 
              <th>With Interest(%)</th> 
              <th>Damages</th> 
              <th>With Interest(%)</th> 
              <th>Specific Performance Value</th> 
              <th>With Interest(%)</th> 
              <th>Total Value Claimed</th> 
              <th>With Interest(%)</th> 
              <th>Interest Amount:</th> 
              <th>Total Relief Amount Including Interest(INR)</th>
              @elseif($dispute_categories_id =='8')
              <th>Date of Employment</th> 
              <th>Date of Consultancy Contract</th> 
              <th>Date of Notice</th> 
              <th>Date of Breach/ Date of Termination/ Resignation</th> 
              <th>Claim Amount (INR)</th> 
              <th>Reason for Claim</th> 
              <th>Claim for Reinstatement</th> 
              <th>Aggregate Annual Gross Salary or Consultancy Fee</th> 
              <th>Claim for Backwages/ Salary/ Benefits/ Reimbursement of expenses</th> 
              <th>With Interest</th> 
              <th>Value of Property</th> 
              <th>Nature of Property</th> 
              <th>Value of Stock Options</th> 
              <th>Amount</th> 
              <th>Restraint on use of IPR/ Trade Secrets</th> 
              <th>Termination</th> 
              <th>Amount/ Average Annual Value of Contract</th> 
              <th>With Interest</th>
              <th>Interest Amount</th> 
              <th>Total Damages Including Interest (INR)</th>
               @elseif($dispute_categories_id =='9')
              <th>Claim Amount (INR)</th> 
              <th>Date of Contract</th> 
              <th>Date of Breach</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim</th> 
              <th>Claim Amount for Contract Price</th> 
              <th>With Interest (%)</th> 
              <th>Claim Amount for Refund</th> 
              <th>With Interest (%)</th> 
              <th>Claim Amount for Escalation of Costs</th> 
              <th>With Interest (%)</th> 
              <th>Claim Amount for Damages</th> 
              <th>To Terminate Contract</th> 
              <th>Estimated Value of Contract</th> 
              <th>To Vacate Contractual Site</th> 
              <th>Estimated Value of Contract</th> 
              <th>To Invoke/ Cancel Performance Guarantee</th> 
              <th>Estimated Value of Contract</th>
              <th>Return Material</th> 
              <th>Estimated Value of Contract</th>
              <th>Specific performance of contract </th> 
              <th>Substitution of Contractor</th> 
              <th>Estimated Value of Contract</th> 
              <th>Value of Claims/ Contract</th> 
              <th>With Interest (%)</th> 
              <th>Interest Amount</th>
              <th>Total Claim (INR)</th> 
              @elseif($dispute_categories_id =='10')
              <th>Nature of Immovable Property</th> 
              <th>Name of the Possessor</th> 
              <th>Name of the Property Owner</th> 
              <th>Description of Property</th> 
              <th>Schedule and Boundaries</th> 
              <th>Market Value of Property</th> 
              <th>Nature of Movable Property</th> 
              <th>Name of the Possessor</th> 
              <th>Name of the Owner</th> 
              <th>Value of Property</th> 
              <th>Nature of Cause of Action</th> 
              <th>Date of Cause of Action</th> 
              <th>Claim Amount (INR)</th> 
              <th>Reason for Claim</th> 
              <th>Average Annual Maintenance Claim</th> 
              <th>Total Value of Immovable Properties</th> 
              <th>Total Value of Movable Properties</th> 
              <th>Rendition of Accounts</th>
              <th>Total Value</th> 
              <th>With Interest (%)</th>
              <th>Total Value Claimed</th> 
              <th>With Interest (%)</th> 
              <th>Interest Amount</th> 
              <th>Total Relief Amount including Interest (INR)</th> 
              @elseif($dispute_categories_id =='7')
              <th>Claim Value (INR)</th> 
              <th>Date of Contract</th> 
              <th>Date of Notification</th> 
              <th>Date of Tender</th> 
              <th>Date of Breach/ Cause</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim</th> 
              <th>Value of Claims/ Contract</th> 
              <th>Interest (%)</th> 
              <th>Claim for Refund</th> 
              <th>Interest (%)</th> 
              <th>Claim for Escalation of Costs</th> 
              <th>Claim for Damages</th> 
              <th>To Terminate Contract</th> 
              <th>To Vacate Contractual Site</th> 
              <th>Specific Performance of Contract</th> 
              <th>To Return Materials</th> 
              <th>Estimated Value of Materials</th>
              <th>To Cancel Performance Guarantees</th> 
              <th>Amount Guaranteed</th>
              <th>Interest Amount</th> 
              <th>Total Claim Amount (INR)</th> 

               @elseif($dispute_categories_id =='11')
              <th>Policy Number</th> 
              <th>Nature of Cover</th> 
              <th>Date</th> 
              <th>Policy Value</th> 
              <th>Policy Maturity Date</th> 
              <th>Surrender Value</th> 
              <th>Nature of Claim</th> 
              <th>Value of Claim</th> 
              <th>Date of Claim</th> 
              <th>Date of Notice</th> 
              <th>Date of Breach</th> 
              <th>Claim Amount</th> 
              <th>Interest</th> 
              <th>Transport/ Warehousing/ Courier Document No</th> 
              <th>Date</th> 
              <th>Demurrage Charges</th> 
              <th>Freight Charges</th> 
              <th>Nature of Goods</th>
              <th>Value of Goods</th> 
              <th>Nature of Loss</th>
              <th>Claim for Refund of Fare or Freight</th> 
              <th>Interest (%)</th> 
              <th>Claim for Payment of Freight</th> 
              <th>Interest (%)</th> 
              <th>Claim for Payment of Damages</th> 
              <th>Interest (%)</th> 
              <th>Claim for Demurrages</th> 
              <th>Interest (%)</th> 
              <th>Demanding Policy Claim Amount</th> 
              <th>Interest (%)</th> 
              <th>Demanding Surrender Value Amount</th> 
              <th>Interest (%)</th> 
              <th>Challenging Cancellation of Policy Value</th> 
              <th>Subrogation Value</th> 
              <th>Interest (%)</th> 
              <th>Value of Cargo</th> 
              <th>Nature and Details of Cargo</th> 
              <th>Claim for Specific Performance</th> 
              <th>Value of Specific Performance</th> 
              <th>Total Value Claimed</th>
              <th>With Interest (%)</th> 
              <th>Interest Amount</th>
              <th>Total Relief Amount Including Interest (INR)</th>

               @elseif($dispute_categories_id =='12')
              <th>Date of Registration of IPR</th> 
              <th>Date of Agreement/ Assignment</th> 
              <th>Date of Licence</th> 
              <th>Date of Breach/ Knowledge of Infringement</th> 
              <th>Earliest Date of Prior Use</th> 
              <th>Date of Notice</th> 
              <th>Amount Claim (INR)</th> 
              <th>Reason for Claim</th> 
              <th>Demand to Stop Infringement</th> 
              <th>Value of Infringed Goods</th> 
              <th>Interest %</th> 
              <th>Demand for Licence Fee Amount</th> 
              <th>Value of License Fee</th> 
              <th>Interest %</th> 
              <th>Demand for Cancellation of License/ Assignment/ Agreement</th> 
              <th>Value of License/ Assignment Agreement</th> 
              <th>Interest %</th> 
              <th>Damages for Breach of Contract</th>
              <th>Amount of Damages Claimed</th> 
              <th>Interest %</th>
              <th>CDemand to Surrender Infringing Material</th> 
              <th>Value of Infringing Materials</th> 
              <th>Interest %</th> 
              <th>Total Relief Amount Including Interest (INR)</th>
              
              @elseif($dispute_categories_id =='17')
              <th>Contract Value (INR)</th> 
              <th>Contract Details</th> 
              <th>Date of Breach</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim</th> 
              <th>Money Claim Amount</th> 
              <th>With Interest(%)</th> 
              <th>Rendition of Accounts Contract Value</th> 
              <th>Claim to Restrain from Promotion of Competing Product</th> 
              <th>Contract Value</th> 
              <th>Claim Amount for Damages</th> 
              <th>With Interest (%)</th> 
              <th>Claim Amount for Royalty</th> 
              <th>With Interest (%)</th> 
              <th>Cancellation of Agreement</th> 
              <th>Contract Value</th> 
              <th>Claim for Specific Performance</th> 
              <th>Contract Value</th>
              <th>A Total Value Claimed</th> 
              <th>With Interest (%)</th>
              <th>Interest Amount</th> 
              <th>Total Relief Amount including Interest(INR)</th> 

               @elseif($dispute_categories_id =='5')
              <th>Partnership Deed Date</th> 
              <th>Date of Reconstitution</th> 
              <th>Date of Dissolution</th> 
              <th>Date of Agreement</th> 
              <th>Estimated Value of the Firm(INR)</th> 
              <th>Date of Breach</th> 
              <th>Date of Notice</th> 
              <th>Reason for Claim/th> 
              <th>Estimated Value of the Dispute/ Value of the Firm</th> 

              @elseif($dispute_categories_id =='13')
              <th>Nature of Contract</th> 
              <th>Date of Contract</th> 
              <th>Annual Value of Contract/ Annual Average Rental Value</th> 
              <th>Nature of Immovable Property</th> 
              <th>Name of the Possessor</th> 
              <th>Name of the Property Owner</th> 
              <th>Description of Property</th> 
              <th>Schedule and Boundaries</th> 
              <th>Market Value of Property</th> 
              <th>Mortgage Value</th> 
              <th>Date of Breach/ Cause of Action</th> 
              <th>Date of Notice</th> 
              <th>Claim for Consideration Amount</th> 
              <th>With Interest (%)</th> 
              <th>Claim for Arrears of Rent/ Defects/ Maintenance Amount</th> 
              <th>With Interest (%)</th> 
              <th>Enforcement of Mortgage Debt Amount</th> 
              <th>With Interest (%)</th>
              <th>Claim for Contractual Built Up or Land share</th> 
              <th>Area</th>
              <th>Value</th> 
              <th>Redemption of Mortgage</th> 
              <th>Market Value of Property</th> 
              <th>Possession Property</th> 
              <th>Market Value</th> 
              <th>Termination of Lease/ Mortgage/ Joint Development agreement</th> 
              <th>Market Value</th> 
              <th>Damages Amount</th> 
              <th>With Interest (%)</th> 
              <th>Specific Performance (10 Words)</th> 
              <th>Contractual Value</th> 
              <th>Area</th> 
              <th>Value</th> 
              <th>Units</th> 
              <th>Total Value Claimed</th> 
              <th>With Interest (%)</th> 
              <th>Interest Amount</th> 
              <th>Total Relief Amount including Interest (INR)</th> 
              
             
              
             
              
             


               




               @endif
                <th>Nature Of Claim</th> 
              <th>Administration Fee</th> 
              <th>Arbitration Fee</th> 
              <th>Respondent Name</th>
              <th>Respondent Decision</th> 



             </tr>
           </thead>

           <tbody>


             @foreach ($claimlist as $respondantList)
             <tr style="text-align: center">

              <td>{{ $loop->iteration}}</td>
              <td>{{ $respondantList->claimnoticeno}}</td> 
              @if( $respondantList->claimnoticestatus=='New Claim')
              <td>Draft</td>
              @elseif( $respondantList->claimnoticestatus=='New Claim Created')
              <td>Sent</td>
              @elseif( $respondantList->claimnoticestatus=='Respondent Access Provided Waiting for the Acceptance')
              <td>Awaiting respondent response</td>

              @else
              <td>Closed - Moved to petition</td>
              @endif
              <td>{{ $respondantList->claimant_respondant_type_name}}</td> 
              <td>{{ $respondantList->firstname}}</td> 
              <td>{{ $respondantList->lastname }}</td>
              <td>{{ $respondantList->category_name}}</td> 
              <td>{{ $respondantList->subcategory_name}}</td>
              <td>{{ $respondantList->email}}</td> 
              <td>{{ $respondantList->phone}}</td>
              <td>{{ $respondantList->city}}</td>
              <td>{{ $respondantList->state}}</td>

              <td>{{ $respondantList->authorisation_doc}}</td>
              <td>{{ $respondantList->id_proof}}</td>
              
              @if($dispute_categories_id =='2')
              <td>{{ $respondantList->loan_acc_bank}}</td>
              <td>{{ $respondantList->sanction_ammount}}</td>
              <td>{{ $respondantList->date_of_application_bank}}</td>
              <td>{{ $respondantList->date_of_sanction_bank}}</td>
              <td>{{ $respondantList->security_type}}</td>
              @if( $respondantList->security_type=='mortgage')
              <td>{{ $respondantList->mortgage_property}}</td>
              @elseif( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_property}}</td>
              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='mortgage')
              <td>{{ $respondantList->mortgage_value_bank}}</td>
              @elseif( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_value}}</td>
              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='mortgage')
              <td>{{ $respondantList->mortgage_schedule}}</td>
              @elseif( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_schedule}}</td>
              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='mortgage')
              <td>{{ $respondantList->mortgage_name}}</td>
              @elseif( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_name}}</td>
              @elseif( $respondantList->security_type=='guarntee')
              <td>{{ $respondantList->guarntee_name}}</td>
              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='mortgage')
              <td>{{ $respondantList->mortgage_date}}</td>
              @elseif( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_date}}</td>
              @elseif( $respondantList->security_type=='guarntee')
              <td>{{ $respondantList->guarntor_agreement}}</td>
              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_engine}}</td>

              @else
              <td>-</td>
              @endif
              @if( $respondantList->security_type=='hypothecation')
              <td>{{ $respondantList->hypo_chassis}}</td>

              @else
              <td>-</td>
              @endif
              <td>{{ $respondantList->renewal_date}}</td>
              <td>{{ $respondantList->revival_date}}</td>
              <td>{{ $respondantList->other_document}}</td>
              <td>{{ $respondantList->legal_notice}}</td>
              <td>{{ $respondantList->date_of_dafault}}</td>
              <td>{{ $respondantList->npa_date_bank}}</td>
              <td>{{ $respondantList->amount_as_account}}</td>
              <td>{{ $respondantList->interest_bank}}</td>
              <td>{{ $respondantList->penel_interest_bank}}</td>
              <td>{{ $respondantList->other_charges_bank}}</td>
              <td>{{ $respondantList->outstanding_amount}}</td>
              <td>{{ $respondantList->amount_as_date}}</td>
              <td>{{ $respondantList->total_amount_bank}}</td>
              <td>{{ $respondantList->rate_of_interest}}</td>
              <td>{{ $respondantList->amount_of_debt}}</td>
              <td>{{ $respondantList->damages_rs}}</td>
              <td>{{ $respondantList->rate_of_penal_interest}}</td>
              
              <!-- admirality -->
              @elseif($dispute_categories_id =='1')
              <td>{{ $respondantList->vesselname}}</td>
              <td>{{ $respondantList->cargonature}}</td>
              <td>{{ $respondantList->quantity}}</td>
              <td>{{ $respondantList->lossdetails}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->claim_interest}}</td>
              <td>{{ $respondantList->contractdate}}</td>
              <td>{{ $respondantList->bill_of_lading_details_date_no}}</td>
              <td>{{ $respondantList->passenger_ticket_booking_date}}</td>
              <td>{{ $respondantList->due_date}}</td>
              <td>{{ $respondantList->noticedate}}</td>
              <td>{{ $respondantList->claim_for_delivery_of_cargo}}</td>
              <td>{{ $respondantList->cargo_nature}}</td>
              <td>{{ $respondantList->nature_and_details_of_cargo}}</td>
              <td>{{ $respondantList->claim_for_payment_of_freight_amount}}</td>
              <td>{{ $respondantList->damage_amount}}</td>
              <td>{{ $respondantList->damage_amount_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              <td>{{ $respondantList->remarks}}</td>
              <td>{{ $respondantList->estimated_value_of_contract}}</td>
              <!-- aviation -->
              @elseif($dispute_categories_id =='15')
              <td>{{ $respondantList->carriername}}</td>
              <td>{{ $respondantList->charterparty}}</td>
              <td>{{ $respondantList->pnrno}}</td>
              <td>{{ $respondantList->cargonature}}</td>
              <td>{{ $respondantList->quantity}}</td>
              <td>{{ $respondantList->natureofincident}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->contractdate}}</td>
              <td>{{ $respondantList->bill_of_lading_details_date_no}}</td>
              <td>{{ $respondantList->passenger_ticket_booking_date}}</td>
              <td>{{ $respondantList->due_date}}</td>
              <td>{{ $respondantList->noticedate}}</td>
              <td>{{ $respondantList->freightrefundamount}}</td>
              <td>{{ $respondantList->frightrefundamountinerest}}</td>
              <td>{{ $respondantList->claim_for_delivery_of_cargo}}</td>
              <td>{{ $respondantList->cargo_nature}}</td>
              <td>{{ $respondantList->nature_and_details_of_cargo}}</td>
              <td>{{ $respondantList->claim_for_payment_of_freight_amount}}</td>
              <td>{{ $respondantList->freight_amount_interest}}</td>
              <td>{{ $respondantList->damage_amount}}</td>
              <td>{{ $respondantList->damage_amount_interest}}</td>
              <td>{{ $respondantList->claim_for_demurrages}}</td>
              <td>{{ $respondantList->claim_for_demurrages_interest}}</td>
              <td>{{ $respondantList->claim_for_specific_performance}}</td>
              <td>{{ $respondantList->value_performance}}</td>
              <td>{{ $respondantList->termination_of_contract}}</td>
              <td>{{ $respondantList->estimated_value_of_contract}}</td>
              <td>{{ $respondantList->return_of_property}}</td>
              <td>{{ $respondantList->estimated_value_of_property}}</td>
              <td>{{ $respondantList->payment_consideration}}</td>
              <td>{{ $respondantList->payment_consideration_interest}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              <!-- community -->
              @elseif($dispute_categories_id =='6')
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->details_of_documents}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->claim_subs_contrib_amount}}</td>
              <td>{{ $respondantList->claim_subs_contrib_amount_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              <td>{{ $respondantList->claim_refund_deposit_amount}}</td>
              <td>{{ $respondantList->claim_refund_deposit_amount_interest}}</td>
              <td>{{ $respondantList->claim_for_admission_and_removal_of_members_check}}</td>
              <td>{{ $respondantList->claim_for_admission_and_removal_of_members}}</td>
              <td>{{ $respondantList->claim_to_remove_or_reinstate_office_bearers_check}}</td>
              <td>{{ $respondantList->claim_to_remove_or_reinstate_office_bearers}}</td>
              <td>{{ $respondantList->claim_for_holding_or_postponement_of_elections_check}}</td>
              <td>{{ $respondantList->claim_for_holding_or_postponement_of_elections}}</td>
              <td>{{ $respondantList->claim_to_appoint_auditors_or_investigators_check}}</td>
              <td>{{ $respondantList->claim_to_appoint_auditors_or_investigators}}</td>
              <td>{{ $respondantList->claim_to_appoint_auditors_check}}</td>
              <td>{{ $respondantList->claim_to_appoint_auditors}}</td>
              <td>{{ $respondantList->claim_to_render_accounts_check}}</td>
              <td>{{ $respondantList->claim_to_render_accounts}}</td>
              <td>{{ $respondantList->claim_against_members_for_damages_and_nuisance_check}}</td>
              <td>{{ $respondantList->claim_against_members_for_damages_and_nuisance}}</td>
              <td>{{ $respondantList->claim_to_carryout_repairs_or_renovation_check}}</td>
              <td>{{ $respondantList->claim_to_carryout_repairs_or_renovation}}</td>
              @elseif($dispute_categories_id =='3')
              <td>{{ $respondantList->details_of_goods}}</td>
              <td>{{ $respondantList->details_of_service}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->date_of_contract}}</td>
              <td>{{ $respondantList->date_of_invoice}}</td>
              <td>{{ $respondantList->date_of_warranty}}</td>
              <td>{{ $respondantList->date_of_warranty_end}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->default_date_of_cause_of_action}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->nature_of_goods}}</td>
              <td>{{ $respondantList->quantity_of_goods}}</td>
              <td>{{ $respondantList->replacement_of_goods}}</td>
              <td>{{ $respondantList->redo_service}}</td>
              <td>{{ $respondantList->refund_of_price}}</td>
              <td>{{ $respondantList->price_of_goods}}</td>
              <td>{{ $respondantList->price_of_goods_interest}}</td>
              <td>{{ $respondantList->damages}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
             
              @elseif($dispute_categories_id =='4')
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->date_of_contract}}</td>
              <td>{{ $respondantList->date_of_invoice}}</td>
              <td>{{ $respondantList->nature_of_breach}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_demand}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->escalation_of_costs}}</td>
              <td>{{ $respondantList->claim_for_damages}}</td>
              <td>{{ $respondantList->contract_price}}</td>
              <td>{{ $respondantList->claim_for_refund_lines}}</td>
              <td>{{ $respondantList->specific_performance_of_contract}}</td>
              <td>{{ $respondantList->specific_estimated_value_of_contract}}</td>
              <td>{{ $respondantList->tocancel_estimated_value_of_contract}}</td>
              <td>{{ $respondantList->amount_guaranteed}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              <td>{{ $respondantList->claim_for_contract_price}}</td>
             
               @elseif($dispute_categories_id =='16')
              <td>{{ $respondantList->date_of_agreement}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->claim_for_refund_of_fare_or_freight}}</td>
              <td>{{ $respondantList->claim_for_refund_of_fare_or_freight_interest}}</td>
              <td>{{ $respondantList->claim_for_payment_of_damages}}</td>
              <td>{{ $respondantList->subrogation_value}}</td>
              <td>{{ $respondantList->claim_for_demurrages}}</td>
              <td>{{ $respondantList->damage_amount}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->benefit_withoutinterest}}</td>
              <td>{{ $respondantList->claim_reinstatement}}</td>
              <td>{{ $respondantList->claimforontractprice}}</td>
              <td>{{ $respondantList->demand_to_stop_infringement_select}}</td>
              <td>{{ $respondantList->demand_to_stop_infringement}}</td>
              <td>{{ $respondantList->demand_for_licence_fee}}</td>
              <td>{{ $respondantList->demand_for_licence_fee_interest}}</td>
              <td>{{ $respondantList->for_allotment_of_shares_stock}}</td>
              <td>{{ $respondantList->demand_for_licence_fee_withoutinterest}}</td>
              <td>{{ $respondantList->cancellation_license}}</td>
              <td>{{ $respondantList->damages_for_breach_of_contract}}</td>
              <td>{{ $respondantList->demand_redemption_of_preference_shares_or_debentures}}</td>
              <td>{{ $respondantList->frightamountwithpoutinterest}}</td>
              <td>{{ $respondantList->for_cancellation_of_allotments}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount}}</td>
              <td>{{ $respondantList->compel_promoters_to_purchase_ofinvestors_shares}}</td>
              <td>{{ $respondantList->eid_claim_for_contract_price}}</td>
              <td>{{ $respondantList->for_company_to_buy_back_of_shares}}</td>
              <td>{{ $respondantList->eid_claim_for_refund_withoutinterest}}</td>
              <td>{{ $respondantList->chairman_and_key_employees}}</td>
              <td>{{ $respondantList->claim_for_escalation_of_costs}}</td>
              <td>{{ $respondantList->for_enforcement_of_preferential_rights}}</td>
              <td>{{ $respondantList->aggregate_value_of_debentures}}</td>
              <td>{{ $respondantList->agreement_value}}</td>
              <td>{{ $respondantList->claim_for_specific_performance}}</td>
              <td>{{ $respondantList->damageamountinterestwithinterest}}</td>
              <td>{{ $respondantList->cancellation_license_value}}</td>

              <td>{{ $respondantList->demand_to_surrender_infringed_materials}}</td>
              <td>{{ $respondantList->frightrefundamountinerest}}</td>
              <td>{{ $respondantList->value_infringing_withoutinterest}}</td>
              <td>{{ $respondantList->damages_for_breach_of_contract_interest}}</td>
              <td>{{ $respondantList->general_meetings}}</td>
              <td>{{ $respondantList->termination}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount_interest}}</td>
              <td>{{ $respondantList->compel_or_cancel_push_or_put_options}}</td>
              <td>{{ $respondantList->eid_claim_for_contract_price_interest}}</td>
              <td>{{ $respondantList->demand_valuation_of_shares}}</td>
              <td>{{ $respondantList->eid_claim_for_refund_withoutinterest}}</td>
              <td>{{ $respondantList->cargo_nature}}</td>
              <td>{{ $respondantList->claim_for_escalation_of_costs_withoutinterest}}</td>
              <td>{{ $respondantList->demand_to_move_resolutions}}</td>
              <td>{{ $respondantList->to_invoke_guarntee}}</td>
              <td>{{ $respondantList->claim_for_damages_interest}}</td>
              <td>{{ $respondantList->freightrefundamount}}</td>
              <td>{{ $respondantList->nature_and_details_of_cargo}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              @elseif($dispute_categories_id =='18' || $dispute_categories_id =='20')
              <td>{{ $respondantList->date_of_contract}}</td>
              <td>{{ $respondantList->contractdate}}</td>
              <td>{{ $respondantList->nature_of_breach}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount_interest}}</td>
              <td>{{ $respondantList->claim_for_refund}}</td>
              <td>{{ $respondantList->refund_withinterest}}</td>
              <td>{{ $respondantList->claim_for_damages}}</td>
              <td>{{ $respondantList->claim_for_damages_interest}}</td>
              <td>{{ $respondantList->claim_for_specific_performance}}</td>
              <td>{{ $respondantList->value_performance_int}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
               @elseif($dispute_categories_id =='8')
              <td>{{ $respondantList->date_of_employment}}</td>
              <td>{{ $respondantList->date_of_consultancy_contract}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->claim_reinstatement}}</td>
              <td>{{ $respondantList->aggregate_salary}}</td>
              <td>{{ $respondantList->claim_for_salary_and_benefits}}</td>
              <td>{{ $respondantList->benefit_withinterest}}</td>
              <td>{{ $respondantList->estimated_value_of_data}}</td>
              <td>{{ $respondantList->nature_of_property}}</td>
              <td>{{ $respondantList->value_of_stock_options}}</td>
              <td>{{ $respondantList->emd_amount}}</td>
              <td>{{ $respondantList->restraint}}</td>
              <td>{{ $respondantList->termination}}</td>
              <td>{{ $respondantList->average_value}}</td>
              <td>{{ $respondantList->average_value_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
               @elseif($dispute_categories_id =='9')
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->date_of_contract}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->eid_claim_for_contract_price}}</td>
              <td>{{ $respondantList->eid_claim_for_contract_price_interest}}</td>
              <td>{{ $respondantList->eid_claim_for_refund}}</td>
              <td>{{ $respondantList->eid_claim_for_refund_interest}}</td>
              <td>{{ $respondantList->claim_for_escalation_of_costs}}</td>
              <td>{{ $respondantList->claim_for_escalation_of_costs_interest}}</td>
              <td>{{ $respondantList->claim_for_damages}}</td>
              <td>{{ $respondantList->claim_for_damages_interest}}</td>
              <td>{{ $respondantList->emd_amount}}</td>
              <td>{{ $respondantList->to_terminate_contract}}</td>
              <td>{{ $respondantList->to_terminate_contract_value}}</td>
              <td>{{ $respondantList->to_vacate_contractual_site}}</td>
              <td>{{ $respondantList->to_vacate_contractual_site_value}}</td>
              <td>{{ $respondantList->to_invoke_guarntee}}</td>
              <td>{{ $respondantList->amount_guaranteed}}</td>
              <td>{{ $respondantList->return_material_value}}</td>
              <td>{{ $respondantList->to_return_materials}}</td>
              <td>{{ $respondantList->specific_performance_of_contract}}</td>
              <td>{{ $respondantList->substitute_contractor}}</td>
              <td>{{ $respondantList->amount_guaranteed}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
               <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
               @elseif($dispute_categories_id =='10')
              <td>{{ $respondantList->immovable_nature}}</td>
              <td>{{ $respondantList->immovable_possessor}}</td>
              <td>{{ $respondantList->immovable_owner}}</td>
              <td>{{ $respondantList->immovable_description}}</td>
              <td>{{ $respondantList->immovable_schedule}}</td>
              <td>{{ $respondantList->immovable_market}}</td>
              <td>{{ $respondantList->movable_nature}}</td>
              <td>{{ $respondantList->movable_possessor}}</td>
              <td>{{ $respondantList->movable_owner}}</td>
              <td>{{ $respondantList->movable_value}}</td>
              <td>{{ $respondantList->nature_of_cause_of_action}}</td>
              <td>{{ $respondantList->date_of_cause_of_action}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->average_annnual}}</td>
              <td>{{ $respondantList->extent}}</td>
              <td>{{ $respondantList->nature_of_property}}</td>
              <td>{{ $respondantList->rendition_of_accounts}}</td>
              <td>{{ $respondantList->rendition_and_distribution_of_mense_profits}}</td>
              <td>{{ $respondantList->rendition_and_distribution_of_mense_profits_int}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              @elseif($dispute_categories_id =='7')
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->date_of_contract}}</td>
              <td>{{ $respondantList->date_of_notification}}</td>
              <td>{{ $respondantList->date_of_tender}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->claimforontractprice}}</td>
              <td>{{ $respondantList->claimforcontractpriceinerest}}</td>
              <td>{{ $respondantList->claim_for_refund}}</td>
              <td>{{ $respondantList->refund_withinterest}}</td>
              <td>{{ $respondantList->claim_for_escalation_of_costs}}</td>
              <td>{{ $respondantList->claim_for_damages}}</td>
              <td>{{ $respondantList->to_terminate_contract}}</td>
              <td>{{ $respondantList->to_vacate_contractual_site}}</td>
              <td>{{ $respondantList->specific_performance_of_contract}}</td>
              <td>{{ $respondantList->to_return_materials}}</td>
              <td>{{ $respondantList->estimated_value_of_material}}</td>
              <td>{{ $respondantList->to_cancel_performance_guarantees}}</td>
              <td>{{ $respondantList->amount_guaranteed}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>

              @elseif($dispute_categories_id =='11')
              <td>{{ $respondantList->policy_no}}</td>
              <td>{{ $respondantList->nature_of_cover }}</td>
              <td>{{ $respondantList->date_insurance}}</td>
              <td>{{ $respondantList->policy_value}}</td>
              <td>{{ $respondantList->policy_maturity_date}}</td>
              <td>{{ $respondantList->surrender_value}}</td>
              <td>{{ $respondantList->claim_nature}}</td>
              <td>{{ $respondantList->claim_value_insurance}}</td>
              <td>{{ $respondantList->date_of_claim}}</td>
              <td>{{ $respondantList->date_of_notice_insurance}}</td>
              <td>{{ $respondantList->date_of_breach_insurance}}</td>
              <td>{{ $respondantList->claim_amount_insurance}}</td>
              <td>{{ $respondantList->claim_amount_int}}</td>
              <td>{{ $respondantList->document_no}}</td>
              <td>{{ $respondantList->date_document}}</td>
              <td>{{ $respondantList->demurrage_charges}}</td>
              <td>{{ $respondantList->freight_charges}}</td>
              <td>{{ $respondantList->goods_nature}}</td>
              <td>{{ $respondantList->value_of_good}}</td>
              <td>{{ $respondantList->loss_nature}}</td>
              <td>{{ $respondantList->claim_for_refund_of_fare_or_freight}}</td>
              <td>{{ $respondantList->claim_for_refund_of_fare_or_freight_interest}}</td>
              <td>{{ $respondantList->claim_for_payment_of_freight}}</td>
              <td>{{ $respondantList->claim_for_payment_of_freight_interest }}</td>
              <td>{{ $respondantList->claim_for_payment_of_damages}}</td>
              <td>{{ $respondantList->claim_for_payment_of_damages_interest}}</td>
              <td>{{ $respondantList->claim_for_demurrages}}</td>
              <td>{{ $respondantList->claim_for_demurrages_interest}}</td>
              <td>{{ $respondantList->demanding_policy_claim_amount}}</td>
              <td>{{ $respondantList->demanding_policy_claim_amount_interest}}</td>
              <td>{{ $respondantList->demanding_surrender_value_amount}}</td>
              <td>{{ $respondantList->demanding_surrender_value_amount_interest}}</td>
              <td>{{ $respondantList->challenging_cancellation_of_policy}}</td>
              <td>{{ $respondantList->subrogation_value}}</td>
              <td>{{ $respondantList->subrogation_value_interest}}</td>
              <td>{{ $respondantList->damage_amount}}</td>
              <td>{{ $respondantList->nature_and_details_of_cargo}}</td>
              <td>{{ $respondantList->claim_for_specific_performance}}</td>
              <td>{{ $respondantList->value_performance}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>

              @elseif($dispute_categories_id =='12')
              <td>{{ $respondantList->date_of_registration}}</td>
              <td>{{ $respondantList->date_of_agreement }}</td>
              <td>{{ $respondantList->date_of_licence}}</td>
              <td>{{ $respondantList->date_of_breach_or_infringement}}</td>
              <td>{{ $respondantList->earliest_date_of_prior_use}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->demand_to_stop_infringement_select}}</td>
              <td>{{ $respondantList->demand_to_stop_infringement}}</td>
              <td>{{ $respondantList->demand_damages_for_infringement}}</td>
              <td>{{ $respondantList->demand_for_licence_fee}}</td>
              <td>{{ $respondantList->rendition_of_accounts}}</td>
              <td>{{ $respondantList->demand_for_licence_fee_interest}}</td>
              <td>{{ $respondantList->cancellation_license}}</td>
              <td>{{ $respondantList->cancellation_license_value}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->damages_for_breach_of_contract}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->damages_for_breach_of_contract_interest}}</td>
              <td>{{ $respondantList->demand_to_surrender_infringed_materials}}</td>
              <td>{{ $respondantList->value_infringing}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest }}</td>

               @elseif($dispute_categories_id =='17')
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->contract_details }}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->money_claim_amount}}</td>
              <td>{{ $respondantList->money_claim_amount_interest}}</td>
              <td>{{ $respondantList->rendition_of_accounts_contract_value}}</td>
              <td>{{ $respondantList->claim_restrain}}</td>
              <td>{{ $respondantList->contract_value}}</td>
              <td>{{ $respondantList->claim_for_damages}}</td>
              <td>{{ $respondantList->claim_for_damages_interest}}</td>
              <td>{{ $respondantList->claim_for_royalty}}</td>
              <td>{{ $respondantList->claim_for_royalty_interest}}</td>
              <td>{{ $respondantList->cancellation_of_agreement}}</td>
              <td>{{ $respondantList->cancellation_of_agreement_value}}</td>
              <td>{{ $respondantList->claim_for_specific_performance}}</td>
              <td>{{ $respondantList->contract_value}}</td>
              <td>{{ $respondantList->value_claims}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>

               @elseif($dispute_categories_id =='5')
              <td>{{ $respondantList->partnership_deed_date}}</td>
              <td>{{ $respondantList->date_of_reconstitution }}</td>
              <td>{{ $respondantList->date_of_dissolution}}</td>
              <td>{{ $respondantList->date_of_agreement}}</td>
              <td>{{ $respondantList->claimamount}}</td>
              <td>{{ $respondantList->date_of_breach}}</td>
              <td>{{ $respondantList->date_of_notice}}</td>
              <td>{{ $respondantList->reason_for_claim}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>

              @elseif($dispute_categories_id =='13')
              <td>{{ $respondantList->nature_of_contract_real}}</td>
              <td>{{ $respondantList->date_of_cintract_real }}</td>
              <td>{{ $respondantList->annual_value_real}}</td>
              <td>{{ $respondantList->natue_of_immovable_real}}</td>
              <td>{{ $respondantList->name_of_possessor_real}}</td>
              <td>{{ $respondantList->name_of_owner_real}}</td>
              <td>{{ $respondantList->description_real}}</td>
              <td>{{ $respondantList->schedule_real}}</td>
              <td>{{ $respondantList->market_value_real}}</td>
              <td>{{ $respondantList->mortgage_value}}</td>
              <td>{{ $respondantList->date_of_breach_real}}</td>
              <td>{{ $respondantList->date_of_notice_real}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount_interest}}</td>
              <td>{{ $respondantList->claim_for_arrears_of_rent_maintenance_amount}}</td>
              <td>{{ $respondantList->claim_for_arrears_of_rent_maintenance_amount_interest}}</td>
              <td>{{ $respondantList->enforcement_of_mortgage_debt_amount}}</td>
              <td>{{ $respondantList->enforcement_of_mortgage_debt_amount_int}}</td>
              <td>{{ $respondantList->claim_for_contractual_built_up_or_land_share_area_select}}</td>
              <td>{{ $respondantList->claim_for_contractual_built_up_or_land_share_area}}</td>
              <td>{{ $respondantList->claim_for_contractual_built_up_or_land_share_value}}</td>
              <td>{{ $respondantList->redemption_of_mortgage}}</td>
              <td>{{ $respondantList->redemption_of_mortgage_market_value_of_property}}</td>
              <td>{{ $respondantList->possession_property }}</td>
              <td>{{ $respondantList->possession_property_market_value}}</td>
              <td>{{ $respondantList->termination_of_lease_mortgage_select}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount_interest}}</td>
              <td>{{ $respondantList->damage_amount}}</td>
              <td>{{ $respondantList->damage_amount_interest}}</td>
              <td>{{ $respondantList->specific_perf}}</td>
              <td>{{ $respondantList->sp_project_value}}</td>
              <td>{{ $respondantList->division_of_property_area}}</td>
              <td>{{ $respondantList->division_of_property_value}}</td>
              <td>{{ $respondantList->division_of_property_unit}}</td>
              <td>{{ $respondantList->claim_for_consideration_amount_interest}}</td>
              <td>{{ $respondantList->value_claims_interest}}</td>
              <td>{{ $respondantList->interest_amount}}</td>
              <td>{{ $respondantList->damage_with_interest}}</td>
              
             
             
              
              
             
             





              @endif

<td>{{ $respondantList->claim_amount_purpose}}</td>

              <td>{{ $respondantList->adminstration_fees}}</td>
              <td>{{ $respondantList->arbitrator_fees}}</td>
              <td>{{ $respondantList->firstname}}</td>
              <td>{{ $respondantList->respondent_decision}}</td>








            </tr>
            @endforeach

          </tbody>

        </table>
       
      </div>





 





    </div>
<!--      <div class="row">
      <div class="col-lg-4" id="panel-heading1"></div>
       <div class="col-lg-8" id="panel-heading2">
      
     
   
 </div>

 </div> -->
    
  </div>
</div>

</div>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [{ extend: 'excel',
      title: 'Claimnotice Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ]
          } );
    

  } );
</script> -->
<!-- <script type="text/javascript">
 
</script> -->
<script type="text/javascript">
   $(document).ready(function() {
   dTable=$('#example').DataTable({
          "bLengthChange": false, // this gives option for changing the number of records shown in the UI table
          "lengthMenu": [10], // 4 records will be shown in the table
          "columnDefs": [
          {"className": "dt-center", "targets": "_all"} //columnDefs for align text to center
        ],
        buttons: [{ extend: 'excel',
      title: 'Claimnotice Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ],
          "dom":"Bfrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
   });
   
      $('#myCustomSearchBox').keyup(function(){  
        dTable.search($(this).val()).draw();   // this  is for customized searchbox with datatable search feature.
   })
      $("#example_wrapper > .dt-buttons").appendTo("div#panel-heading");
       $("#example_wrapper > .dataTables_info").appendTo("div#panel-heading1");
       // $("#example_wrapper > .dataTables_paginate").appendTo("div#panel-heading2"); 
        // $("#NewPaginationContainer").append($("#panel-heading2"));
    } );
</script>





@endsection
