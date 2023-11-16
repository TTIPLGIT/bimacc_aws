@extends('layouts.admin')

@section('content')
 

    <div id="wrapper" style="padding-left: 2%;
    padding-right: 2%;">       

        <div id="content-wrapper">
            <div class="container-fluid">              
                <!-- Area Chart Example-->
                <div class="col-xl-12 col-sm-12">
                    <div class="row">
                 <div class="col-xl-6 col-sm-6">   
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Arbitration Status</div>
                    <div class="card-body">
                          {!! $pie->html() !!}
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
             <div class="col-xl-6 col-sm-6">      
                    <div class="card mb-3">                        
                        <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Clients Responding</div>
                    <div class="card-body">
                       {!! $chart->html() !!}
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                
            </div>
          
            </div>
        </div>
            
        </div>
                     

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/img_285971.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>7</h1></div><br>
                                <div class="mr-5"><h3>Clients</h3></div>     
                            </div>                            
                        </div>
                    </div>
                     <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-cases o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/cases.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>4</h1></div><br>
                                <div class="mr-5"><h3>Cases</h3></div>     
                            </div>                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-mytask o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/mytask.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>2</h1></div><br>
                                <div class="mr-5"><h3>My Tasks</h3></div>     
                            </div>                            
                        </div>
                    </div>                   
                </div>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-employee o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/employee.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>10</h1></div><br>
                                <div class="mr-5"><h3>Employee</h3></div>     
                            </div>                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-task o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/task.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>6</h1></div><br>
                                <div class="mr-5"><h3>Task</h3></div>     
                            </div>                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-4" >
                        <div class="card text-white bg-startcase o-hidden h-100">
                            <div class="card-body">                               
                                <span class="float-right">
                                <img src="{{ url(asset('images/startedcase.png')) }}"  />
                                 </span>
                                <div class="mr-5"><h1>1</h1></div><br>
                                <div class="mr-5"><h3>Started Case</h3></div>     
                            </div>                            
                        </div>
                    </div>                   
                </div>

                    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
                </div>

           </div>                      <!-- /.container-fluid --> 

          

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
{!! $pie->script() !!}
@endsection
