<?php

class ReportsController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function getstudents()
    {
               require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html =  View::make('reports.students');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
    }


    public function getstudentspdf()
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billpdf')->with('id', $id);
        $html =  View::make('reports.students');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }




    public function getfeepending()
    {
        return View::make('reports.feepending');
    }


    public function getfeependingpdf()
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html =  View::make('reports.feependingpdf');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }
 


    public function getFeeCollection()
    {
        return View::make('reports.feecollection');
    }


    public function getfeecollectionpdf()
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html =  View::make('reports.feecollectionpdf');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }
 

  public function getstudentdetailspdf($data)
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html =  View::make('reports.studentdetailspdf')->with('data', $data);;
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }
 
   public function getstudentdetail()
    {
        return View::make('reports.studentdetail');
    }

    public function getinstallmentpendingpdf($date)
    {

        
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html =  View::make('reports.installmentpendingpdf')->with('date', $date);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }

    public function installmentpending()
    {
        return View::make('reports.installmentpending');
    }



    public function getstudentnamereport($name)
    {
if ($name == 'all') {
return $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));
}
else
{
return $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->where('studentregistrations.studentName', 'like', $name . '%')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));    
}

 

}


public function getstudentidreport($id)
    {
return $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->where('studentregistrations.student_id', 'like', $id . '%')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));    
 

}


public function getstudentcoursereport($course)
    {
return $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->where('studentcourses.courseselected', '=', $course)->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));    
 

}

public function getstudentbatchreport($batch)
    {
return $studentregistrations = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('studentcourses', 'studentcourses.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->where('studentcourses.batch', '=', $batch)->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.studentEmail','studentregistrations.studentPhoto','studentregistrations.studentPhone', 'studentregistrations.studentDateOfJoining', 'studentregistrations.id', 'studentregistrations.student_id','studentcourses.batch', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));    
 

}

    public function getinstallmentpending($date)
    {




       $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->orderby('installments.installmentDate')->groupby('studentregistrations.studentName')->where('installments.PaidStatus', '=', 'Pending')->where('feecollections.remainingAmount', '>', 0)->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'installments.installmentDate', 'installments.installmentAmount', 'feecollections.remainingAmount'));
       $tabletr ='<table class="table table-bordered table-striped prepend-top"><thead><tr><th>Student ID</th><th>Student Name</th><th>Student Course</th><th>Installment Date</th><th>Installment Amount</th><th>Course Remaining Fees</th></tr></thead><tbody id="installmentPending">';
          
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

           $tabletr = $tabletr . '<tr><td></td><td></td><td></td><td></td><td style="text-align:right; font-weight:bold;"> ' . $installmentAmountGrand .'</td><td style="text-align:right; font-weight:bold;">  '. $remainingAmountGrand . '</td></tr></tbody></table>';
       return $tabletr;


   }

}