<?php

class FeesmastersController extends BaseController {

    /**
     * Feesmaster Repository
     *
     * @var Feesmaster
     */
    protected $feesmaster;

    public function __construct(Feesmaster $feesmaster)
    {
        $this->feesmaster = $feesmaster;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feesmasters = $this->feesmaster->all();

        return View::make('feesmasters.index', compact('feesmasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('feesmasters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Feesmaster::$rules);

        if ($validation->passes())
        {
            $this->feesmaster->create($input);

            return Redirect::route('feesmasters.index');
        }

        return Redirect::route('feesmasters.create')
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
        $feesmaster = $this->feesmaster->findOrFail($id);

        return View::make('feesmasters.show', compact('feesmaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $feesmaster = $this->feesmaster->find($id);

        if (is_null($feesmaster))
        {
            return Redirect::route('feesmasters.index');
        }

        return View::make('feesmasters.edit', compact('feesmaster'));
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
        $validation = Validator::make($input, Feesmaster::$rules);

        if ($validation->passes())
        {
            $feesmaster = $this->feesmaster->find($id);
            $feesmaster->update($input);

            return Redirect::route('feesmasters.show', $id);
        }

        return Redirect::route('feesmasters.edit', $id)
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
        $this->feesmaster->find($id)->delete();

        return Redirect::route('feesmasters.index');
    }

}