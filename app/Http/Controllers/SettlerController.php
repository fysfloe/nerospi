<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Settler;
use App\Settlement;
use App\Building;
use App\Job;

class SettlerController extends Controller
{
    protected $rules = [
      'name' => 'required',
      'fitness' => 'required|integer|max:100|min:0',
      'charm' => 'required|integer|max:100|min:0',
      'creativity' => 'required|integer|max:100|min:0',
      'logic' => 'required|integer|max:100|min:0',
      'skill' => 'required|integer|max:100|min:0',
      'knowledge' => 'required|integer|max:100|min:0',
      'health' => 'required|integer|max:100|min:0',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settlers = Settler::all();

      $view_variables = [
        'settlers' => $settlers,
      ];

      return view('settlers.index')->with($view_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('settlers.create')->with(['title' => 'Siedler erstellen', 'jobs' => $this->getJobsArray()]);
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
        $settler = Input::all();
        $settler['job_step'] = 1;

        $settlement->settlers()->create($settler);

        return Redirect::route('settlers.index');
      }

      return Redirect::back()->withErrors($validator, 'settler_create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Redirect::route('settlers.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $settler = Settler::find($id);

      return view('settlers.edit')->with(['settler' => $settler, 'jobs' => $this->getJobsArray()]);
    }

    protected function getJobsArray() {
      $all_jobs = Job::all();
      $jobs = [];

      $jobs[null] = '--- Arbeitslos ---';

      foreach($all_jobs as $job) {
        $jobs[$job->id] = $job->name;
      }

      return $jobs;
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
        $settler = Settler::find($id);

        $input = Input::all();
        if(Input::get('job_id') != $settler->job_id) {
          $input['job_step'] = 1;
        }

        $settler->update($input);

        return Redirect::back()->with('success', 'Spitze! Deine Werte wurden aktualisiert.');
      }

      return Redirect::back()->withErrors($validator, 'league_game_update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
