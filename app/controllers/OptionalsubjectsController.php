<?php

class OptionalsubjectsController extends BaseController {

    /**
     * Optionalsubject Repository
     *
     * @var Optionalsubject
     */
    protected $optionalsubject;

    public function __construct(Optionalsubject $optionalsubject)
    {
        $this->optionalsubject = $optionalsubject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $optionalsubjects = $this->optionalsubject->all();

        return View::make('optionalsubjects.index', compact('optionalsubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('optionalsubjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Optionalsubject::$rules);

        if ($validation->passes())
        {
            $this->optionalsubject->create($input);

            return Redirect::route('optionalsubjects.index');
        }

        return Redirect::route('optionalsubjects.create')
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
        $optionalsubject = $this->optionalsubject->findOrFail($id);

        return View::make('optionalsubjects.show', compact('optionalsubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $optionalsubject = $this->optionalsubject->find($id);

        if (is_null($optionalsubject))
        {
            return Redirect::route('optionalsubjects.index');
        }

        return View::make('optionalsubjects.edit', compact('optionalsubject'));
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
        $validation = Validator::make($input, Optionalsubject::$rules);

        if ($validation->passes())
        {
            $optionalsubject = $this->optionalsubject->find($id);
            $optionalsubject->update($input);

            return Redirect::route('optionalsubjects.show', $id);
        }

        return Redirect::route('optionalsubjects.edit', $id)
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
        $this->optionalsubject->find($id)->delete();

        return Redirect::route('optionalsubjects.index');
    }

}