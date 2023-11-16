@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container con"> 
    <div class="row">
       <div class="col-lg-12 margin-tb">                    
        <div class="pull-right">
            <a class="btn btn-success float-right" title="create" href="{{ route('home') }}"><i class="fas fa-plus" ></i></a>
        </div>          
    </div>
</div>

<div class="row">    
    <!-- DataTables Example -->
    
    <div class="table-responsive">
        <table class="table table-bordered " width="100%" cellspacing="0" >
             <thead class="theadalign">
                <tr>
                    <th>No</th>
                    <th>Arbitrator Name</th>
                    <th>Arbitrator Email</th>
                    <th>Arbitrator Contact</th>
                    
                    <th width="230px">Action</th>                   
                </tr>
            </thead>                                
            <tbody>
               
                <tr>
                    <td>XXX</td>
                    <td>YYY</td>
                    <td>ZZZ</td>
                    <td>zzz</td>
                    
                    <td>
                        <form action="{{ route('arbitrationmaster.destroy',$arbitrationmaster->id) }}" method="POST">
                         
                            <a class="btn btn-info" href="{{ route('arbitrationmaster.show',$arbitrationmaster->id) }}"><i class="fas fa-eye">Show</i></a>

                            
                            
                            <a class="btn btn-primary" href="{{ route('arbitrationmaster.edit',$arbitrationmaster->id) }}"><i class="fas fa-pencil-alt"></i></a>
                            
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>                 
                
                
                
                
            </tbody>
            @endforeach
        </table>
        
    </div>
</div>

<!-- /.container-fluid -->    

{!! $arbitrationmasters->links() !!} 
</div>
@endsection
