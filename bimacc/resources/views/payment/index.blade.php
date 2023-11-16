@extends('layouts.admin')
@section('content')
<div class="container con">
<form method="POST" action="{{ route('payumoney.payment') }}"> 
@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Amount</label>
            <input class="form-control" type="text" id="amount" name="amount" value="" placeholder="Enter Amount">                    
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">First Name</label>
            <input class="form-control" type="text" id="firstName" name="firstName" value="" placeholder="Enter First Name">                    
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" id="email" name="email" value="" placeholder="Enter Email">                    
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control" type="text" id="phone" name="phone" value="" placeholder="Enter Phone">                    
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Product Info</label>
            <input class="form-control" type="text" id="productInfo" name="productInfo" value="" placeholder="Enter Product Info">                    
        </div>
    </div>    
</div>
<div class="row text-center">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </div>
</div>
</form>
</div>
@endsection