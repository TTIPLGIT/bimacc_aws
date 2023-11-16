@extends('layouts.admin')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="card mb-5">
      <div class="card-body">
        <center><h2 class="title">Add New Arbitrator</h2></center>
        <form  action="{{ route('arbitrationmaster.store') }}" method="POST">
            @csrf 
            <div class="row row-space">
                <div class="col-6">
                    <div class="form-group">
                        <label for="firstname" style="font-size: larger;" class="col-sm-4 col-form-label">
                            <strong>First Name:</strong></label>

                            <input type="text" name="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                            @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="lastname" style="font-size: larger;" class="col-sm-4 col-form-label"><strong>Last Name:</strong></label>

                            <input type="text" name="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                            @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row row-space">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="username" style="font-size: larger;" class="col-sm-4 col-form-label">
                                <strong>Username:</strong></label>

                                <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" style="font-size: larger;" class="col-sm-4 col-form-label"><strong>Email:</strong></label>

                                <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password" style="font-size: larger;" class="col-sm-4 col-form-label">
                                    <strong>Password:</strong></label>
                                    
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password" style="font-size: larger;" class="col-sm-6 col-form-label"><strong>Confirm Password:</strong></label>

                                    <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone" style="font-size: larger;" class="col-sm-4 col-form-label">
                                        <strong>Phone:</strong></label>

                                        <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div> 
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email" style="font-size: larger;" class="col-sm-6 col-form-label"><strong>Select Main Category:</strong></label>
                                        <select class="form-control" name="dispute_categories_id" style="background-color: #ececec;">
                                            <option value="">Select Main Category</option>
                                            @foreach ($disputeSubcategory as $category)
                                            <option value="{{ $category->id }}"> {{$category->category_name}}</option>
                                            @endforeach
                                        </select>                                     
                                    </div>
                                </div>
                            </div>

                            <div class="row row-space">
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="email" style="font-size: larger;" class="col-sm-6 col-form-label"><strong>Select Sub Category:</strong></label>
                                    <select class="form-control" name="dispute_subcategories_id" style="background-color: #ececec;">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($disputecategory as $category)
                                        <option value="{{ $category->id }}"> {{$category->subcategory_name}}</option>
                                        @endforeach
                                    </select>                                     
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email" style="font-size: larger;" class="col-sm-6 col-form-label"><strong>Country:</strong></label>

                                    {!! Form::countries('country', 'select2', 'form-control' ) !!}
                                    {!! $errors->first('country', '<span class="alert-msg">:message</span>') !!} 
                                    <div class="select-dropdown"> </div>                                  
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state" style="font-size: larger;" class="col-sm-4 col-form-label">
                                        <strong>State:</strong></label>

                                        <input type="text" name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                        @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city" style="font-size: larger;" class="col-sm-4 col-form-label"><strong>City:</strong></label>

                                        <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                        @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="zipcode" style="font-size: larger;" class="col-sm-4 col-form-label">
                                            <strong>Postal Code:</strong></label>

                                            <input type="text" name="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}"  style="background-color: #ececec;">
                                            @if ($errors->has('zipcode'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address" style="font-size: larger;" class="col-sm-4 col-form-label"><strong>Address:</strong></label>

                                            <textarea class="form-control" name="address"></textarea>
                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                </div> 

                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-success btn-space">Save</button>
                                    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
                                    <a class="btn btn-danger btn-space" href="{{ route('arbitrationmaster.index') }}">Cancel</a>            
                                </div> 
                            </div>             
                        </form>

                    </div>
                </div>
                @endsection



