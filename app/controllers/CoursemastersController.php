<?php

class CoursemastersController extends BaseController {

    /**
     * Coursemaster Repository
     *
     * @var Coursemaster
     */
    protected $coursemaster;

    public function __construct(Coursemaster $coursemaster)
    {
        $this->coursemaster = $coursemaster;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $coursemasters = $this->coursemaster->all();

        return View::make('coursemasters.index', compact('coursemasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('coursemasters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Coursemaster::$rules);

        if ($validation->passes())
        {
            $this->coursemaster->create($input);

            return Redirect::route('coursemasters.index');
        }

        return Redirect::route('coursemasters.create')
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
        $coursemaster = $this->coursemaster->findOrFail($id);

        return View::make('coursemasters.show', compact('coursemaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $coursemaster = $this->coursemaster->find($id);

        if (is_null($coursemaster))
        {
            return Redirect::route('coursemasters.index');
        }

        return View::make('coursemasters.edit', compact('coursemaster'));
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
        $validation = Validator::make($input, Coursemaster::$rules);

        if ($validation->passes())
        {
            $coursemaster = $this->coursemaster->find($id);
            $coursemaster->update($input);

            return Redirect::route('coursemasters.show', $id);
        }

        return Redirect::route('coursemasters.edit', $id)
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
        $this->coursemaster->find($id)->delete();

        return Redirect::route('coursemasters.index');
    }

}