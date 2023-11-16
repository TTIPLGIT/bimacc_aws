@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container">
  <div class="row">
    
    

        <h2>Claimant Information</h2>
        
      <table class="table table-bordered " width="100%" cellspacing="0" >
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Organization Name</th>
            <th>Claimant Name</th>
            <th>Claimant Email</th>
            <th>Claimant Contact</th>
            <th width="230px">Action</th>                   
          </tr>
        </thead>                                
        <tbody>

          <tr>
            @foreach ($claimantRegister as $register)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $register->organization_name }}</td>
              <td>{{ $register->username }}</td>
              <td>{{ $register->email }}</td>
              <td>{{ $register->phone }}</td>  
              
              <td>
                <form action="{{ route('claimantregister.getdetails',$register->id) }}" method="POST"> 

                 <a class="btn btn-info" title="show" href="{{ route('claimantregister.show',$register->id) }}"><i class="fas fa-eye"></i></a>        



                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a>

                  @csrf
                  @method('DELETE')

                  <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>

              </td>
            </tr>         

            @endforeach

</tr>
          </tbody>

        </table>
    </div>
</div>

@endsection
