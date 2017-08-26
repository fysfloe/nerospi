<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

use App\NSC;
use App\Settlement;

class NSCController extends Controller
{
    protected $names = [
      'Susi', 'Gertrude', 'Franz', 'John', 'Joe', 'Martha', 'Hans', 'Adelinde', 'Alfons', 'Hubert', 'Wolfgang', 'Jacqueline'
    ];

    protected $rules = [
      //'num' => 'required',
      'health' => 'required|integer|max:100|min:0',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nscs = NSC::all();

      $view_variables = [
        'nscs' => $nscs,
      ];

      return view('nscs.index')->with($view_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make(Input::all(), $this->rules);

      if($validator->passes()) {
        $settlement = Settlement::first();
        for($i = 0; $i < Input::get('num'); $i++) {
          $nsc = [
            'name' => $this->names[array_rand($this->names, 1)],
            'health' => Input::get('health')
          ];
          $settlement->nscs()->create($nsc);
        }

        return Redirect::route('nscs.index')->with('message', Input::get('num') . ' NSCs erstellt.');
      }

      return Redirect::back()->withErrors($validator, 'nsc_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $nsc = NSC::find($id);
      return view('nscs.edit')->with(['nsc' => $nsc]);
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
      $validator = Validator::make(Input::all(), $this->rules);

      if($validator->passes()) {
        $nsc = NSC::find($id);
        $nsc->update(Input::all());

        return Redirect::route('nscs.index')->with('success', 'Spitze! Der NSC wurde aktualisiert.');
      }

      return Redirect::back()->withErrors($validator, 'nsc_create')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $nsc = NSC::find($id);
      if($nsc) {
        NSC::destroy($id);
        return Redirect::back()->with('message', 'NSC #' . $id . ' gelöscht.');
      }
    }
}
