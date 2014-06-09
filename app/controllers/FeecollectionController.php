<?php

class FeecollectionController extends BaseController {

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        

        $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));

   return View::make('feecollections.index', compact('studentRecords'));
   
    }


    public function getStudentDetails($search)
    {
        
   return        $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->where('studentregistrations.studentName', 'like', $search . '%')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));
        

   
   
    }



    public function getStudentDetailsId($search)
    {
        
   return     $studentRecords = DB::table('installments')->join('studentregistrations', 'studentregistrations.student_id', '=', 'installments.student_id')->join('feecollections', 'feecollections.student_id', '=', 'installments.student_id')->groupby('studentregistrations.studentName')->where('studentregistrations.student_id', 'like', $search . '%')->get(array('studentregistrations.studentName', 'studentregistrations.id', 'studentregistrations.student_id', 'feecollections.courseFees', 'feecollections.studentCourse', 'feecollections.remainingAmount'));
        

   
   
    }



    public function search($id)
    {
        


        return View::make('feecollections.search')->with('id', $id);
    }


public function getstudentfeesdetails($id){


    return DB::select('SELECT ins.id, ins.student_id, ins.installmentDate, ins.installmentAmount, ins.paidStatus, fc.courseFees, fc.studentCourse, fc.remainingAmount, sr.studentName  FROM installments as ins inner join feecollections as fc on fc.student_id = ins.student_id inner join studentregistrations as sr on sr.student_id = ins.student_id where ins.student_id like "' . $id . '%"');
	//return Installment::where('student_id', 'like', $id . '%')->with('studentregistrations')->get();
    //where('student_id', 'like', $id . '%')->
	//with('feecollections')->with('studentregistrations')->with('studentcourses')->      
	//join('studentregistrations', 'studentregistrations.id', '=', 'installments.student_id', 'left')->join('studentcourses', 'studentregistrations.id', '=', 'studentcourses.student_id')->join('feecollections', 'studentregistrations.id', '=', 'feecollections.student_id', 'left')->where('studentregistrations.student_id', 'like', $id . '%')
            					 // ->join('orders', 'users.id', '=', 'orders.user_id')

}


public function getstudentfeesdetailsbyname($name){


    return DB::select('SELECT ins.id, ins.student_id, ins.installmentDate, ins.installmentAmount, ins.paidStatus, fc.courseFees, fc.studentCourse, fc.remainingAmount, sr.studentName  FROM installments as ins inner join feecollections as fc on fc.student_id = ins.student_id inner join studentregistrations as sr on sr.student_id = ins.student_id where sr.studentName like "' . $name . '%"');
    //return Installment::where('student_id', 'like', $id . '%')->with('studentregistrations')->get();
    //where('student_id', 'like', $id . '%')->
    //with('feecollections')->with('studentregistrations')->with('studentcourses')->      
    //join('studentregistrations', 'studentregistrations.id', '=', 'installments.student_id', 'left')->join('studentcourses', 'studentregistrations.id', '=', 'studentcourses.student_id')->join('feecollections', 'studentregistrations.id', '=', 'feecollections.student_id', 'left')->where('studentregistrations.student_id', 'like', $id . '%')
                                 // ->join('orders', 'users.id', '=', 'orders.user_id')

}


public function pay($id){
        return View::make('feecollections.payForm')->with('id', $id);
}


public function paidAfter($id){

       return View::make('feecollections.index')->with('id', $id);

}

public function paid(){

            $installments = Installment::find($_POST['id']);
            $installments->paidStatus = 'Paid';
            $installments->paidDate = Input::get('paymentDate');
            $installments->paidAmount = Input::get('paymentAmount');
            $installmentAmount = $installments->installmentAmount;

            $student_id = $installments->student_id;
            $installments->save();

            if ($installmentAmount == Input::get('paymentAmount')){

            }
            else
            {
                $difference = $installmentAmount - Input::get('paymentAmount');
                $nextInstallment = Installment::find(Input::get('id')+1);
                $nextInstallment->installmentAmount = $nextInstallment->installmentAmount + $difference;
                $nextInstallment->save();
            }

            $feescollection=Feecollection::where('student_id', $student_id)->first();
            $feescollection->remainingAmount = $feescollection->remainingAmount -Input::get('paymentAmount');
            $feescollection->save();

            return Redirect::to('search/'. $student_id);
        
}


public function getPdf($id)
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
        //return View::make('feecollections.billPdf')->with('id', $id);
        $html = View::make('feecollections.billPdf')->with('id', $id);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }


}