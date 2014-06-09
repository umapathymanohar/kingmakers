<?php

class CoursecategoriesController extends BaseController {

    /**
     * Coursecategory Repository
     *
     * @var Coursecategory
     */
    protected $coursecategory;

    public function __construct(Coursecategory $coursecategory)
    {
        $this->coursecategory = $coursecategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $coursecategories = $this->coursecategory->all();

        return View::make('coursecategories.index', compact('coursecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('coursecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Coursecategory::$rules);

        if ($validation->passes())
        {
            $this->coursecategory->create($input);

            return Redirect::route('coursecategories.index');
        }

        return Redirect::route('coursecategories.create')
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
        $coursecategory = $this->coursecategory->findOrFail($id);

        return View::make('coursecategories.show', compact('coursecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $coursecategory = $this->coursecategory->find($id);

        if (is_null($coursecategory))
        {
            return Redirect::route('coursecategories.index');
        }

        return View::make('coursecategories.edit', compact('coursecategory'));
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
        $validation = Validator::make($input, Coursecategory::$rules);

        if ($validation->passes())
        {
            $coursecategory = $this->coursecategory->find($id);
            $coursecategory->update($input);

            return Redirect::route('coursecategories.show', $id);
        }

        return Redirect::route('coursecategories.edit', $id)
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
        $this->coursecategory->find($id)->delete();

        return Redirect::route('coursecategories.index');
    }

}