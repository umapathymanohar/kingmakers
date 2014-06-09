@extends('layouts.scaffold')

@section('main')

<div class="row">
  
 
 <div class="span12">

<a href="{{URL::to('reports/getInstallmentPendingPdf')}}" target="_blank" class="btn btn-success pull-right printReport">Print</a> 

  <ul class="unstyled " id="search-area" >

    <li>  <input type="text" id = "feePendingMonth" class="input-large report-datepicker" placeholder="Date"></li>
    
    <li> <button type="submit" id="feePendingReportFetch" class="btn">Search</button></li>
  </ul>
 

 </div>
 </div>       
<div class="row-fluid">
  
          <div id="installmentPending" class="span12">
 
          
           
 
        <hr>

      </div>
</div>


@stop

