@extends('layouts.admin')
@section('content')
<form method="POST" action="{{ $action }}" id="payForm">
    <input type="hidden" name="key" value="{{ $key }}" />
    <input type="hidden" name="hash" value="{{ $hash }}"/>
    <input type="hidden" name="txnid" value="{{ $txnid }}" />
    <input type="hidden" name="amount" value="{{ $amount }}" />
     <input type="hidden" name="udf1" value="{{ $udf1 }}" />
     <input type="hidden" name="udf2" value="{{ $udf2 }}" />
    <input type="hidden" name="firstname" id="firstname" value="{{ $firstname }}" />
    <input type="hidden" name="email" id="email" value="{{ $email }}" />
    <input type="hidden" name="phone" value="{{ $phone }}" />
    <textarea name="productinfo" style="display:none;">{{ $productinfo }}</textarea>
    <input type="hidden" name="surl" value="{{ $success }}" size="64" />
    <input type="hidden" name="furl" value="{{ $failure }}" size="64" />
    <input type="hidden" name="service_provider" value="{{ $serviceProvider }}" size="64" />    
    <button type="submit" class="btn btn-primary" style="display:none;"></button>
</form>


<script>
$(document).ready(function() {
    $("#payForm").submit();
});
</script>
@endsection