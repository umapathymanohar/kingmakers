<?php

class FeedetailsController extends BaseController {

    /**
     * Feedetail Repository
     *
     * @var Feedetail
     */
    protected $feedetail;

    public function __construct(Feedetail $feedetail)
    {
        $this->feedetail = $feedetail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feedetails = $this->feedetail->all();

        return View::make('feedetails.index', compact('feedetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('feedetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Feedetail::$rules);

        if ($validation->passes())
        {
            $this->feedetail->create($input);

            $studentregistration = Studentregistration::find(Input::get('student_id'));

            $studentregistration->studentRemainingFees = $studentregistration->studentRemainingFees - Input::get('paidAmount');
            $studentregistration->save();
            return Redirect::route('feedetails.index');
        }

        return Redirect::route('feedetails.create')
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
        $feedetail = $this->feedetail->findOrFail($id);

        return View::make('feedetails.show', compact('feedetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $feedetail = $this->feedetail->find($id);

        if (is_null($feedetail))
        {
            return Redirect::route('feedetails.index');
        }

        return View::make('feedetails.edit', compact('feedetail'));
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
        $validation = Validator::make($input, Feedetail::$rules);

        if ($validation->passes())
        {
            $feedetail = $this->feedetail->find($id);
            $feedetail->update($input);

            return Redirect::route('feedetails.show', $id);
        }

        return Redirect::route('feedetails.edit', $id)
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
        $this->feedetail->find($id)->delete();

        return Redirect::route('feedetails.index');
    }

    public function pay(){
        $input = Input::all();
        
            $this->feedetail->create($input);

            return 'submit';
     
    }


    public function getdetails($id)
    {
        return Feedetail::where('student_id', $id)->orderBy('id', 'desc')->get();
    }

}