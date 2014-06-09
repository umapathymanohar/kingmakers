<html>
<head>
  <title>Kingmakers</title>
  <style type="text/css">

      @page { margin: 100px 50px; }
    #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 80px;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 80px}
    #footer .page:after { content: counter(page); }
    </style>
</head>
<body>
  <div id="header">
  
  <table>
      <img width="400" src="http://www.indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
  </table>

  </div>
    <div id="footer">
    <p class="page">Page </p>
  </div>
 
 <div id="content">


 <table>


<tbody>
  <tr style="background:#eee;">

     <th style="width:15%" >Student ID</th>
                <th style="width:20%">Student Name</th>
                <th style="width:35%">Student Course</th>
                <th  style="width:10%"> Total Fees</th>
                <th  style="width:10%">Collected Fees</th>
               
              </tr>
             
              <?php     $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));
              $courseFeesTotalGrand = 0;
              $courseFeesRemainingGrand =0;
?>
               @foreach ($studentRecords as $student)

             <tr>
                <td>{{ $student->student_id }}</td>
                  <td>{{ $student->studentName }}</td>
                  <td>{{ $student->studentCourse }}</td>
                  <td style="text-align:right">{{ $student->courseFees }}</td>
                  <td style="text-align:right"> {{ $student->courseFees  - $student->remainingAmount }} </td>
                <?php
                $courseFeesTotalGrand +=  $student->courseFees ; 
                $courseFeesRemainingGrand += $student->remainingAmount; 
                 ?>
 
            </tr>
                    @endforeach
                    <tr style="background:#eee;">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="text-align:right" > <strong>{{ $courseFeesTotalGrand}}</strong></td>
                      <td style="text-align:right"> <strong> {{$courseFeesRemainingGrand  }} </strong>  </td>
                    </tr>
          </tbody>
        </table>
  
</div>
</body>
</html>