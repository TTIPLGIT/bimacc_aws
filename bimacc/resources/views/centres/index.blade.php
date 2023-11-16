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

                <!-- DataTables Example -->
             <!--    <div class="card mb-3"> -->
                   <!--  <div class="card-header">
                        <i class="fas fa-table"></i>
                        Data Table Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>                      
                                
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>28</td>
                                    <td>2010/11/14</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011/06/07</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010/03/11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011/08/14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sidney</td>
                                    <td>37</td>
                                    <td>2011/06/02</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>53</td>
                                    <td>2009/10/22</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>27</td>
                                    <td>2011/05/07</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008/10/26</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>46</td>
                                    <td>2011/03/09</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/12/09</td>
                                    <td>$85,675</td>
                                </tr>
                               
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2012/04/09</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>63</td>
                                    <td>2010/01/04</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>56</td>
                                    <td>2012/06/01</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>43</td>
                                    <td>2013/02/01</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011/12/06</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2011/03/21</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009/02/27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010/07/14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008/11/13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div> -->

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
