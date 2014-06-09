<?php

class StudentregistrationsController extends BaseController {

    /**
     * Studentregistration Repository
     *
     * @var Studentregistration
     */
    protected $studentregistration;

    public function __construct(Studentregistration $studentregistration)
    {
        $this->studentregistration = $studentregistration;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $studentregistrations = $this->studentregistration->orderBy('created_at', 'desc')->paginate(10);

        return View::make('studentregistrations.index', compact('studentregistrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('studentregistrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Studentregistration::$rules);

        if ($validation->passes())
        {
            


     
            

            $studentregistration = $this->studentregistration->create($input);
            $student_id =  $studentregistration->id;
            $student_new_id = 'Temp_0000' . $studentregistration->id;
            $studentregistration->student_id = $student_new_id;
            $studentregistration->save();


            if ( $studentregistration->id )
            {
                $studentregistration_id = $studentregistration->id;


                if (!is_dir(base_path().'/public/student_assets')) {
                    mkdir(base_path().'/public/student_assets');
                }
                
                if (!is_dir(base_path().'/public/student_assets/'. $student_id)) {
                    mkdir(base_path().'/public/student_assets/'. $student_id);
                }
                
                
                }

            if (Input::file('studentPhoto')){
            $studentPhotoExtension = Input::file('studentPhoto')->getClientOriginalExtension();
            $newPhotoName = 'photo.' . $studentPhotoExtension;

            $input['studentPhoto'] = $newPhotoName;


            if ( $studentregistration->id )
            {
                $studentregistration_id = $studentregistration->id;


 
                
                if (Input::hasFile('studentPhoto'))
                {
                    $destinationPath = base_path().'/public/student_assets/'.$student_id;
                    Input::file('studentPhoto' )->move($destinationPath,  $newPhotoName);
                    // $imageNameArray = explode('.', $newPhotoName);
                    // $imageName = $imageNameArray[0];
                    // $imageExt = $imageNameArray[1];
                   // Image::make($studentregistrationPhotoPath)->save($destinationPath .'/'. $imageName.'.'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(600, 400)->save($destinationPath .'/'. $imageName.' (600x400).'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(300, 200)->save($destinationPath .'/'. $imageName.' (300x200).'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(150, 100)->save($destinationPath .'/'. $imageName.' (150x100).'.$imageExt);

                }
            }
}

 
            return Redirect::to('assigncourses/'.$studentregistration->id.'/edit');
        }

        return Redirect::route('studentregistrations.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $studentregistration = $this->studentregistration->findOrFail($id);

        return View::make('studentregistrations.show', compact('studentregistration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $studentregistration = $this->studentregistration->find($id);

        if (is_null($studentregistration))
        {
            return Redirect::route('studentregistrations.index');
        }

        return View::make('studentregistrations.edit', compact('studentregistration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Studentregistration::$rules);

        if ($validation->passes())
        {
            $studentregistration = $this->studentregistration->find($id);
            $studentregistration->update($input);


            if (Input::file('studentPhoto')){
                
            $studentPhotoExtension = Input::file('studentPhoto')->getClientOriginalExtension();
            $newPhotoName = 'photo.' . $studentPhotoExtension;

            $input['studentPhoto'] = $newPhotoName;


            if ($id)
            {
                $studentregistration_id = $id;
 
                
                if (Input::hasFile('studentPhoto'))
                {
                    $destinationPath = base_path().'/public/student_assets/'.$id;
                    Input::file('studentPhoto' )->move($destinationPath,  $newPhotoName);
                    // $imageNameArray = explode('.', $newPhotoName);
                    // $imageName = $imageNameArray[0];
                    // $imageExt = $imageNameArray[1];
                   // Image::make($studentregistrationPhotoPath)->save($destinationPath .'/'. $imageName.'.'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(600, 400)->save($destinationPath .'/'. $imageName.' (600x400).'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(300, 200)->save($destinationPath .'/'. $imageName.' (300x200).'.$imageExt);
                    // Image::make($studentregistrationPhotoPath)->resize(150, 100)->save($destinationPath .'/'. $imageName.' (150x100).'.$imageExt);

                }
            }
}



            return Redirect::route('studentregistrations.show', $id);
        }

        return Redirect::route('studentregistrations.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->studentregistration->find($id)->delete();

        return Redirect::route('studentregistrations.index');
    }

    public function getdetails($id)
    {
        return $this->studentregistration->find($id);

        
    }

    public function getStudentDetails($search)
    {
        if ($search == 'all'){
        return $this->studentregistration->get();

        }
        else
        {
        return $this->studentregistration->where('studentName', 'like', $search . '%')->get();

        }

        
    }


     public function getStudentDetailsId($search)
    {
        if ($search == '0'){
        return $this->studentregistration->get();

        }
        else
        {
        return $this->studentregistration->where('student_id', 'like', $search . '%')->get();

        }

        
    }


public function getPdf($id)
    {
               // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF <-- im sure someone has a better way of referencing it for Laravel?
        require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
               // You can use raw HTML or a blade template, i made a pdf folder within *views* for my templates.
        
//        return View::make('studentregistrations.initial')->with('id', $id);
        $html = View::make('studentregistrations.initial')->with('id', $id);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();

        // Use this to output to the broswer
        $dompdf->stream('my.pdf',array('Attachment'=>0));
        // Use this to download the file.
        // $dompdf->stream("my.pdf");
    }


}