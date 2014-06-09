@extends('layouts.scaffold')

@section('main')
@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

<div class="row-fluid">
  <div class="span12">
    <ul class="breadcrumb">
      <li><a href="index.html">Fees Master</a> &rsaquo; </li>
      <li>Fee Collection</li>
    </ul>
    <div class="page-header">
      <h3 class="page-title">Fees Collection</h3>
    </div>
  </div>

  <div class="span12">

    <div class="input-append">
  <input class="" id="studentid" name="studentid" placeholder="Enter Student ID" type="text">
  <button class="btn" id="fetch" type="button">Fetch!</button>
</div>

       
      
  </div>

  <div id="studentDetails" class="span12">

      
  </div>

  <div id="payForm" class="span12">
      
      {{ Form::open(array('route' => 'feedetails.store', 'class'=> 'ajax')) }}
<input type="hidden" id="student_id" name="student_id" class="input-small">
  <input type="text" id="paidDate" name="paidDate" class="input-small datepicker" placeholder="Date">
  <div class="input-prepend input-append">
  <span class="add-on">₹</span>
  <input class="" id="paidAmount" name="paidAmount"  type="text">
  <span class="add-on">.00</span>
</div>
<input type="submit" class="btn pay_submit" id="" >
      
  
</form>
  </div>

  <div id="feeDetails" class="span12" style="height:300px; overflow:scroll">
 
  </div>



</div>
@stop


