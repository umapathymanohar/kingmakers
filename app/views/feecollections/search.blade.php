@extends('layouts.scaffold')

@section('main')


<div class="row-fluid">

  <div class="span6">

   <div class="control-group">

   <label for="">Student ID</label>   
     <input type="text" id="student_full_id" name="student_full_id" placeholder="Please enter the student ID" value="{{$id}}">



   </div>



 </div>


  <div class="span6">

   <div class="control-group">

   <label for="">Student Name</label>   
     <input type="text" id="studentNameSearch" name="studentNameSearch" placeholder="Please enter the student name">



   </div>



 </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <table class="table table-bordered">
     <thead>

       <th>Student Name</th>
       <th>Student Course</th>
       <th>Course Total Fees</th>
       <th>Course Remaining Fees</th>
     </thead>
     <tbody>
       <tr>
         <td><span id="studentName"></span></td>
         <td><span id="studentCourse"></span></td>
         <td><span id="courseFees"></span></td>
         <td><span id="courseRemainingFees"></span></td>
       </tr>






     </tbody>
     </table> 
   </div>
 </div>
 <div class="row-fluid">

  <div class="span12" id="">
    <table class="table table-bordered">
     <thead>

       <th>Installment Date</th>
       <th>Installment amount</th>
       <th></th>
     </thead>
     <tbody id="searchResults">

     </tbody>
   </table>
 </div>
</div>




<script>
  


$(document).on('keyup', '#studentNameSearch', function(){


studentName = $('#studentNameSearch').val();
if (studentName.length > 3){
 $.ajax({
  url: '/kingmakers/public/getstudentfeesdetailsbyname/' + studentName,
  type: 'POST',
  dataType: 'json',
  success: function(data) {
console.log(data);
    var str ="";
    if (data != 0) { 
    tabletr ="";
        $('#studentName').html(data[0].studentName);
        $('#studentCourse').html(data[0].studentCourse);
        
        $('#courseFees').html(data[0].courseFees);
        $('#courseRemainingFees').html(data[0].remainingAmount);

      for (var i = 0; i < data.length; i++) {

        // dateString = data[i].installmentDate;
        // dateStringArray = dateString.split("-");

        // yearValue = dateStringArray[0];
        // monthValue = dateStringArray[1];
        // dayValue = dateStringArray[2];
        // newDate = dayValue + '/' + monthValue + '/' + yearValue;

        newDate =        data[i].installmentDate;
        dis ="";
        danger ="";
        if (data[i].paidStatus == 'Paid') {
          dis = 'disabled="disabled"';
          tabletr +='<tr><td>'+newDate+'</td><td>'+data[i].installmentAmount+'</td><td><a href="/kingmakers/public/pay/'+ data[i].id +'"' +  dis + ' class="btn pay" >'+data[i].paidStatus+'</a> <a target="_blank" href="/kingmakers/public/getPdf/'+ data[i].id +'" class="btn btn-primary">Print</a></td></tr>';
 
        }
        else
        {
          tabletr +='<tr><td>'+newDate+'</td><td>'+data[i].installmentAmount+'</td><td><a href="/kingmakers/public/pay/'+ data[i].id +'"' +  dis + ' class="btn danger pay" >'+data[i].paidStatus+'</a> </td></tr>';
 
        }


        
      }

      $('#searchResults').html(tabletr);

    }


  },
 
});
}

  });


</script>

@stop