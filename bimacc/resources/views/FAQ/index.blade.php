@extends('layouts.admin')
@section('content')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 18px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.dataTable_length{
  font-weight: 500px !important;
}

td{
  color: black !important;
  font-style: normal !important;
}
th,td{
  font-size:15px !important
}
  </style>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif








<div class="container con"> 
      <div class="row">
       <div class="col-lg-12 margin-tb">                    
        <div class="pull-right">
        <button type="button" class="btn btn-success float-right" title="Create" href="{{ route('FAQ.create') }}" data-toggle="modal" data-target="#addfaqModal"><i class="fas fa-plus" ></i></button>    

        </div>          
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">FAQ</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <tr>
             <th style="width: 50.4px;">Sl. No.</th>
             <th style="width: 100.4px;">Module Name</th>
              <th>Question</th>
              <th>Answer</th>      
               @role('centre')               
              <th style="width: 200.4px;">Action</th>
              @endrole
            </tr>
          </thead>
      
          <tbody>
          @foreach($FAQ_module as $data)
       
           <tr style="text-align: center">


             <td >{{$loop->iteration}}</td>
             <td width="35px">{{$data->modulename}}</td>
            <td >{{$data->question}}</td>
            <td>{{$data->answer}}</td>
            @role('centre') 
            <td> 
            <form action="{{ route('FAQ.destroy',$data->id) }}" method="POST">



              <a class="btn btn-info"  href="{{ route('FAQ.show',$data->id) }}" title="Show" data-toggle="modal" data-target="#showfaqmodal{{$data->id}}" ><i class="fas fa-eye"></i></a>
            
            <a class="btn btn-primary" href="{{ route('FAQ.edit',$data->id) }}" title="Edit" data-toggle="modal" data-target="#editfaqmodal{{$data->id}}" ><i class="fas fa-pencil-alt"></i></a>

              @csrf 
              @method('DELETE')

              <button type="submit" title="Delete" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              
 
<label class="switch " title="Toggle On / OFF" style="float: right !important;">
<input type="hidden"  name="toggle_id" value="{{$data->id}}" >

  <input type="checkbox"   class="toggle_status" onclick="functiontoggle('{{$data->id}}')"  @if($data->flag) checked @endif id="is_active" name="is_active" value="1" data-toggle="toggle">
  <span class="slider round"></span>
</label>


            </form>
          </td>   
          @endrole                   
          </tr>
          @endforeach
        </tbody>


      
         

      </table>
    </div>
  </div>
</div>
  

 
</div>
 

  
   
@include('FAQ.create')
@include('FAQ.edit')
@include('FAQ.show')





  <script type="text/javascript">
$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

   function functiontoggle(id){
           
    

      var is_active = $("input[name='is_active']:checked").val();
     
      var f_id = id;

    
      
     

      $.ajax({
    url: "{{ route('faq_flag') }}",
    type: 'POST',
    data: {is_active:is_active,f_id:f_id,_token: '{{csrf_token()}}' },
    error: function() {
     alert('Something is wrong');
   },
   success: function(data)
    {
    console.log(data);
    if(data == 1){
   
       swal({title: "Toggle Actived", text: "Question and Answer will be hidden", type: "error"},
     
     ); 
    }
    else{
      swal({title: "Toggle Deactived", text: "Question and Answer will not be hidden", type: "success"},
    ); 
    }
     
   }
   });
   }
</script>
  


@endsection
