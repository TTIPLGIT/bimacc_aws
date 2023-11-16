@extends('layouts.admin')   
@section('content')
<!-- @if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --> 

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="container">
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">

    </div>
    
  </div>
</div> 
<!--     <div class="col-lg-12 margin-tb">
        <div class="row">
            <div class="pull-left">
                <h2>Edit Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('arbitrationmaster.index') }}"> Back</a>
            </div>
        </div>
      </div>  -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
        </div>
        <div class="card-body">

          <div class="row">
            <form method="post" action="{{route('users.update', $user)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('patch') }}
              <div class="row register-form">
                 <input type="number" style="display: none" value="{{$user->id}}">
               <div class="col-md-4">
                <div class="form-group">
                  <input type="text"  name="firstname" class="form-control"  value="{{ $claimantinformation[0]->name }}" />
                 
                    <label class="form-control-placeholder" for="firstname">Name<span style="color: red">*</span></label>
                 
                  @if ($errors->has('firstname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>
              
                <div class="col-md-2">
                 
     @if($claimantamend[0]->details_count =='') 
           <a class="btn btn-primary" href="" data-toggle="modal" data-target="#usernameamendmodal{{$user->id}}" style="
    color: white;">Amend</a>
    @else
    <a class="btn btn-secondary" href="" data-toggle="modal" data-target="#usernameamendmodal{{$user->id}}" style="
    color: white;pointer-events: none !important;">Amend</a>
    
     
  
    @endif
                 
                </div>
              
              <!-- <div class="col-md-6">
                <div class="form-group">
                  <h7></h7>
                  <input type="file" 
                  class="form-control{{ $errors->has('fileupload') ? ' is-invalid' : '' }}"
                  name="fileupload">
                  <label class="form-control-placeholder" for="fileupload" 
                  >Upload Proof<span style="color: red">*</span></label>
                  @if ($errors->has('fileupload'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fileupload') }}</strong>
                  </span>
                  @endif
                </div>
              </div> -->
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text"  class="form-control" name="address" value="{{ $user->address }}">
                  <label class="form-control-placeholder" id="address" for="address">Address<span style="color: red">*</span></label>
                  @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>
              <div class="col-md-2">
                 
                 @if($claimantamend1[0]->details_count =='') 
           <a class="btn btn-primary" href="" data-toggle="modal" data-target="#addressnameamendmodal{{$user->id}}" style="color: white;">Amend</a>
    @else
     <a class="btn btn-secondary" href="" data-toggle="modal" data-target="#addressnameamendmodal{{$user->id}}" style="color: white;pointer-events: none !important;">Amend</a>
   
    
     
  
    @endif
                 
                </div>
             <!--  <div class="col-md-6">
                <div class="form-group">
                  <h7></h7>
                  <input type="file" 
                  class="form-control{{ $errors->has('fileidproof') ? ' is-invalid' : '' }}"
                  name="fileidproof">
                  <label class="form-control-placeholder" for="fileidproof" 
                  >Upload Proof<span style="color: red">*</span></label>
                  @if ($errors->has('fileidproof'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fileidproof') }}</strong>
                  </span>
                  @endif
                </div>
              </div> -->

              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" name="email" class="form-control"  value="{{ $user->email }}" />
                  <label class="form-control-placeholder" for="email">Email<span style="color: red">*</span></label>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input type="password" class="form-control"  name="password" />
                  <label class="form-control-placeholder" for="password">Password<span style="color: red">*</span></label>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirmation" />
                  <label class="form-control-placeholder" id="password_confirmation" for="password_confirmation">Confirm Password<span style="color: red">*</span></label>
                  @if ($errors->has('password_confirmation'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>
              <div class="col-md-12"> 
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success btn-space">Send</button>
                  <a class="btn btn-danger btn-space" title="create" href="{{ route('home') }}" >Back</a>
                </div>
              </div> 
            </div>
            <!--  <button type="submit" class="btn btn-primary">Send</button> -->
          </form>  

        </div>
      </div>
    </div> 



  </div>
  @include('modals/usernameamendmodal')
   @include('modals/addressnameamendmodal')

  @endsection
