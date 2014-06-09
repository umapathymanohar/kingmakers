<?php

class CoursebatchesController extends BaseController {

    /**
     * Coursebatch Repository
     *
     * @var Coursebatch
     */
    protected $coursebatch;

    public function __construct(Coursebatch $coursebatch)
    {
        $this->coursebatch = $coursebatch;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $coursebatches = $this->coursebatch->all();

        return View::make('coursebatches.index', compact('coursebatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('coursebatches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Coursebatch::$rules);

        if ($validation->passes())
        {
            $this->coursebatch->create($input);

            return Redirect::route('coursebatches.index');
        }

        return Redirect::route('coursebatches.create')
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
        $coursebatch = $this->coursebatch->findOrFail($id);

        return View::make('coursebatches.show', compact('coursebatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $coursebatch = $this->coursebatch->find($id);

        if (is_null($coursebatch))
        {
            return Redirect::route('coursebatches.index');
        }

        return View::make('coursebatches.edit', compact('coursebatch'));
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
        $validation = Validator::make($input, Coursebatch::$rules);

        if ($validation->passes())
        {
            $coursebatch = $this->coursebatch->find($id);
            $coursebatch->update($input);

            return Redirect::route('coursebatches.show', $id);
        }

        return Redirect::route('coursebatches.edit', $id)
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
        $this->coursebatch->find($id)->delete();

        return Redirect::route('coursebatches.index');
    }

}