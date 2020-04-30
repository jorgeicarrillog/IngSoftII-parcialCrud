<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inoutput;

class InOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Inoutput::paginate(10);

        return view('vehicles.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:out,in',
            'user_id' => 'required|exists:App\User,id',
            'vehicle_id' => 'required|exists:App\Vehicle,id',
        ]);

        $inout = new Inoutput();
        $inout->fill($request->all());
        if ($inout->save()) {
            return redirect()->route('inout.show',$inout->id);
        }else{
            return redirect()->back()->withErrors(['Ocurrio algo intentalo de nuevo.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Inoutput::find($id);

        return view('vehicles.show')->withItem($item);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Inoutput::find($id);

        return view('vehicles.edit')->withItem($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Inoutput::find($id);
        if (empty($item)) {
            return redirect()->route('inout.index');
        }
        $validatedData = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:out,in',
            'user_id' => 'required|exists:App\User,id',
            'vehicle_id' => 'required|exists:App\Vehicle,id',
        ]);

        $item->fill($request->all());
        if ($item->save()) {
            return redirect()->route('inout.show',$item->id);
        }else{
            return redirect()->back()->withErrors(['Ocurrio algo intentalo de nuevo.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Inoutput::find($id);
        if (empty($item)) {
            return redirect()->route('inout.index');
        }
        $item->delete();
        return redirect()->route('inout.index');
    }
}
