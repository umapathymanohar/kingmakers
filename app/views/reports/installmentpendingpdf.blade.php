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
      <img width="400" src="http://indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
  </table>

  </div>
    <div id="footer">
    <p class="page">Page </p>
  </div>
 
 <div id="content">
<?php



       $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->orderby('installments.installmentDate')->groupby('studentregistrations.studentName')->where('installments.PaidStatus', '=', 'Pending')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'installments.installmentDate', 'installments.installmentAmount', 'feecollections.remainingAmount'));
       $tabletr ='<table class="table table-bordered table-striped prepend-top"><thead style="background:#eee;" ><tr style="background:#eee;">   <th style="width:15%" >Student ID</th><th style="width:20%">Student Name</th><th style="width:5%">Installment Date</th><th style="width:25%">Student Course</th><th  style="width:10%">Installment Amount</th><th  style="width:10%"> Remaining Fees</th></tr></thead><tbody id="installmentPending">';
          
            $date = explode('-', $date);
            $newdate   = $date [2] .'-'. $date [1] . '-' . $date [0];

            $searchDate =  strtotime ( $newdate );
$installmentAmountGrand =0;
 $remainingAmountGrand =0;

       foreach ( $studentRecords as $studentRecord) {

            $date = explode('-', $studentRecord->installmentDate);
            $installmentDate   = strtotime ($date [2] .'-'. $date [1] . '-' . $date [0]);

            $searchDate =  strtotime ( $newdate );
            if ($installmentDate < $searchDate) {
           $tabletr = $tabletr . '<tr><td>'.  $studentRecord->student_id.'</td><td>'.$studentRecord->studentName.'</td><td style="text-align:right">'. $studentRecord->installmentDate .'</td><td>'.$studentRecord->studentCourse.'</td><td style="text-align:right">'.$studentRecord->installmentAmount.'</td><td style="text-align:right"> '.$studentRecord->remainingAmount.'</td></tr>';

           $installmentAmountGrand +=  $studentRecord->installmentAmount;
           $remainingAmountGrand +=  $studentRecord->remainingAmount;
           }
       }

           $tabletr = $tabletr . '<tr style="background:#eee;" ><td></td><td></td><td></td><td></td><td style="text-align:right; font-weight:bold;"> ' . $installmentAmountGrand .'</td><td style="text-align:right; font-weight:bold;">  '. $remainingAmountGrand . '</td></tr></tbody></table>';
       echo $tabletr;
?>


  
</div>
</body>
</html>