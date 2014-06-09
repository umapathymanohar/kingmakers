@extends('layouts.scaffold')

@section('main')

<div class="row-fluid">
  
          <div class="span12">
           <div class="page-header">
              <h3>Dashboard</h3>
          </div>
          
            
 <h3>Master</h3>
    <div class="row"  style="text-align:center;">
      <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">STUDENTS</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>


            <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">COURSES</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Courses </i>
              </a>
            </div>
          </div>
        </a>

      </div>


                  <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2"> SUBJECTS</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Courses </i>
              </a>
            </div>
          </div>
        </a>

      </div>

            <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">COURSE DETAILS</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Course Details </i>
              </a>
            </div>
          </div>
        </a>

      </div>



    </div>
          <hr>
          <h3>Transactions</h3>
   <div class="row"  style="text-align:center;">
      <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">Fee Collection</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>
    </div>
      <hr>
 <h3>Reports</h3>
     <div class="row"  style="text-align:center;">
      <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">Fee Pending</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>

            <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">Installment Pending</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>

                  <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">Student Detail</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>

                  <div class="span2">
        <a href="{{URL::route('studentregistrations.index')}}">

          <div class="box" >
            <div class="" style="width:81%;" >
              <div class="badge " style="width:100%; background-color: #66a1d2">Student Registered</div>
            </div>
            <hr>
            <div class="settings-box settings" style="top:160px;">
              <a style="" href="#"><i >Perform add, edit, and delete Students </i>
              </a>
            </div>
          </div>
        </a>

      </div>
    </div>

        <hr>

      </div>
</div>
 
@stop