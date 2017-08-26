<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

use App\Job;

class JobController extends Controller
{
  protected $rules = [
    'name' => 'required',
    'step1' => 'required',
    'step2' => 'required',
    'step3' => 'required',
    'step4' => 'required',
    'step5' => 'required'
  ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jobs = Job::all();

      $view_variables = [
        'jobs' => $jobs,
      ];

      return view('jobs.index')->with($view_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('jobs.create')->with(['title' => 'Job erstellen']);
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
        $job = Input::all();
        $job = Job::create($job);

        return Redirect::route('jobs.index')->with('success', 'Job erstellt.');
      }

      return Redirect::back()->withErrors($validator, 'job_create')->withInput();
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
      $job = Job::find($id);
      return view('jobs.edit')->with(['job' => $job]);
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
        $job = Job::find($id);
        $job->update(Input::all());

        return Redirect::route('jobs.index')->with('success', 'Spitze! Der Job wurde aktualisiert.');
      }

      return Redirect::back()->withErrors($validator, 'job_create')->withInput();
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
