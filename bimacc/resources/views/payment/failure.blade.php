@extends('layouts.admin')
@section('content')
{{ $request }}
<div class="row">
    <div class="col-md-4">
        <div class="form-group"> 
                <strong>Status:</strong>
            {{ $status }}
        </div>
        <div class="form-group"> 
                <strong>Mode:</strong>
            {{ $mode }}
        </div>
        <div class="form-group"> 
                <strong>Transaction Id:</strong>
            {{ $txnid }}
        </div>
        <div class="form-group"> 
                <strong>Phone:</strong>
            {{ $phone }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
                <strong>Amount:</strong>
            {{ $amount }}
        </div>
        <div class="form-group"> 
                <strong>Card Category:</strong>
            {{ $cardCategory }}
        </div>
        <div class="form-group"> 
                <strong>First Name:</strong>
            {{ $firstname }}
        </div>
        <div class="form-group"> 
                <strong>Email:</strong>
            {{ $email }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
                <strong>Card Number:</strong>
            {{ $cardnum }}
        </div>
        <div class="form-group"> 
                <strong>Card Type:</strong>
            {{ $card_type }}
        </div>
        <div class="form-group"> 
                <strong>Card Name:</strong>
            {{ $name_on_card }}
        </div>
        <div class="form-group"> 
                <strong>Message:</strong>
            {{ $error_Message }}
        </div>
    </div>
</div>
@endsection