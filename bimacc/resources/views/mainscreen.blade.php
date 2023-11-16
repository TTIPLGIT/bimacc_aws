@extends('layouts.faqscreen')

@section('content')
<style>

.text-line {
        background-color: white;
        color: #eeeeee;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid  #d9d9d9 1px;
        padding: 3px 10px;
    }
   
    h1{
        float: left !important;
font-weight:300 !important;
text-decoration: underline!important;
font: 20px Arial, sans-serif!important;
padding: 15px 15px !important;
    }
    u{
       
text-decoration: underline 4px solid!important;
text-decoration-color: orange !important;
text-underline-position: under !important;
    }
    

p{
   font-size:15px !important;
   color:black !important;
   font-weight:500 !important;
}
#question{
   font-size:15px !important;
   color:black !important;
   font-weight:500 !important;
   

}
#answer{
   font-size:15px !important;
   color:#737373 !important;
 
   padding:0px 65px !important;
}
body{
   background-color: #f2f2f2 !important;
}

.collapsible {
  background-color: white;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: white;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  color:black;
  background-color: white;
}
th{
   color: #602e9e !important;
   background-color: white !important; 
   border-color: white !important;
}
table,td{
   border-color: white !important;

}
/* .sorting_asc{
   display:none !important;
} */

.faqsearch{
   color:black !important;
}

#name{
   font-size:18px !important;
}


#q_faq{
  padding:10px 30px !important;
}
#a_faq{
  padding:0px 50px !important;
   color: #666666 !important;
}
#m_faq
{
  font-size:18px !important;
  font-weight:800 !important;
}
    </style>
<div class="main-content" >
   

   
<div class="container con"> 
      <div class="row">
       <div class="col-lg-12 margin-tb">                    
                
      </div>
    </div>
    <div class="card" style="margin-top:50px; margin-bottom:90px !important;">
    
    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
       
    <div class="card-body">
            
            <fieldset>
               <div class="row">                 
               <h1><b><u>Frequently Asked Questions on EAS</u></b></h1>         
                  <div class="col-lg-12">
                
            
                  <div id="faq_id">

                        @foreach($modules as $data)
                        <button type="button"  class="collapsible"><p id="name"><b>{{$loop->iteration}}) {{$data->modulename}}</b></p></button>
                               

                        <div class="content">
                        @if($faq != '') 
                        @foreach ($faq as $key => $faqdata)
                          @if($data->id == $faqdata->module_id)
                          <div style="padding: 10px 25px !important;">
                             <p id="question{{$faqdata->id}}"><span style=""><b>{{$loop->iteration}} . {{$faqdata->question}}</b></span></p>
                          </div> 

                          <div style="padding: 0px 48px  !important;">
                             <p id="answer{{$faqdata->id}}"><span style=" color: #666666 !important;"> {{$faqdata->answer}}</span></p>                                                           
                          </div> 
                               @endif              
                            @endforeach 
                        @endif 
                            </div> 
                            
                        <div class="text-line">
                        </div>
                        @endforeach
                   </div>

                        <div class="faqsearch" id="search_id">
                        
                          </div>
                          <div class="alert text-center"  id="alert_message">
                            <p> NO DATA FOUND </p>
                          </div>
                  </div>
                </div>
               
      </fieldset>      
   </div>
</table>
</div>
  
</div>
 
</div>





<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<script>
  $(document).ready(function(){
    $('#alert_message').hide();
});
  </script>


<script type="text/javascript">

$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
function searchIt(){

      var module_name = $("input[name='module_name']").val();
    
      if ( module_name == null || module_name =="")
{

alert("Please Enter The  Data In Search Field !");exit();

}

   
   $.ajax({
    url: "{{route('module_name.store')}}",
    type: 'POST',
    dataType:"json",
    async: false,
    data: {module_name:module_name,_token:'{{csrf_token()}}'},
    error: function() {
     alert('Something is wrong');
   },
   success: function(data)
    {

     console.log(data);
   


     $('#faq_id').hide();
 

     var search_faq = data['search'];
    //  var faqs_search = data['fa_search'];
   
    
     if ( search_faq == null || search_faq ==""){
      $('.collapsible' ).remove();
     $('.content' ).remove();
      $('#alert_message').show();
  
     }
     else if( search_faq != null || search_faq !=""){
       $('#alert_message').hide();
}

var optionsdata='';
var optionsdata1='';
    for(var i = 0 ; i < search_faq.length; i++){

      var module_name = search_faq[i]['module_name'];
      // var question = search_faq[i]['question'];
      // var answer = search_faq[i]['answer'];
      var mod_id = search_faq[i]['id'];

      var j=i+1;
     
      optionsdata += "<button type='button'  class='collapsible'><b><p id='m_faq' >"+j+"."+module_name+"</p></b></button><div class='content'> ";

     
      $.ajax({
    url: "{{route('moduleid')}}",
    type: 'POST',
    dataType:"json",
    async: false,
    data: {mod_id:mod_id,_token:'{{csrf_token()}}'},
    error: function() {
     alert('Something is wrong');
   },
   success: function(data)
    {

     console.log(data);
    var faqs_search=data;

     for(var z = 0 ; z < faqs_search.length; z++){
        var module_name = faqs_search[z]['modulename'];
        var question = faqs_search[z]['question'];
        var answer = faqs_search[z]['answer'];
        var m_id = faqs_search[z]['module_id'];

  
          //  var j=i+1;
            var y=z+1;
           optionsdata += "<p id='q_faq'> "+y+"."+question+"</p><p id='a_faq'>"+answer+"</p>";
         
      }
      optionsdata+="</div>";

      console.log(optionsdata);
     $('.collapsible' ).remove();
$('.content' ).remove();

  $('.faqsearch').append(optionsdata);

  
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    }
    
      });
}

// var stageoption = ddd.concat(optionsdata);








   }
   });

   
   };
   
   
</script>








@endsection


