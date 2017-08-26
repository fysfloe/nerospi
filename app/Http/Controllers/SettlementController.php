<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

use App\Settler;
use App\Settlement;
use App\Building;
use App\NSC;
use App\Job;

class SettlementController extends Controller
{

  protected $building_types = [
    'living',
    'culture',
    'research',
    'industry',
    'food'
  ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settlers = Settler::all();
      $settlement = Settlement::first();

      if(!$settlement) {
        $settlement = Settlement::create([
          'name' => 'Passail'
        ]);
      }
      $nscs = NSC::all();
      $children = 0;
      $couples = 0;
      $health_add = 0;

      foreach($settlers as $settler) {
        if($settler->children) {
          $children += $settler->children;
        }

        $health_add += $settler->health;

        // couples count
      }

      foreach($nscs as $nsc) {
        $health_add += $nsc->health;
      }

      $buildings = [];

      foreach($this->building_types as $type) {
        $buildings[$type] = Building::where('type', '=', $type)->get();
      }

      $food = [
        'total' => 0,
        'percentage' => 0
      ];

      foreach($buildings['food'] as $building) {
        $food['total'] += $building->gains;
      }

      if(($settlers->count() + $nscs->count()) > 0) {
        $average_health = $health_add / ($settlers->count() + $nscs->count());
      } else {
        $average_health = 0;
      }

      $population = $settlers->count() + $nscs->count() + $children;
      $food['percentage'] = $population > 0 ? round($food['total'] / $population * 100, 2) : 0;
      $food['class'] = $food['percentage'] >= 100 ? 'pos' : 'neg';

      $jobs = Job::all();

      $view_variables = [
        'settlers' => $settlers,
        'nscs' => $nscs,
        'settlement' => $settlement,
        'children' => $children,
        'population' => $population,
        'couples' => $couples,
        'average_health' => $average_health,
        'food' => $food,
        'buildings' => $buildings,
        'jobs' => $jobs
      ];

      return view('settlements.index')->with($view_variables);
    }

    public function changeHealth() {
      $health_change = intval(Input::get('health_change'));

      $settlers = Settler::all();

      foreach($settlers as $settler) {
        $settler->health += $health_change;
        if($settler->health > 100) {
          $settler->health = 100;
        }
        if($settler->health < 0) {
          $settler->health = 0;
        }
        $settler->save();
      }

      $nscs = NSC::all();

      foreach($nscs as $nsc) {
        $nsc->health += $health_change;
        if($nsc->health > 100) {
          $nsc->health = 100;
        }
        if($nsc->health < 0) {
          $nsc->health = 0;
          NSC::destroy($nsc->id);
          //$nsc->destroy();
        } else {
          $nsc->save();
        }
      }

      $plus_minus = $health_change > 0 ? 'erhöht' : 'verringert';

      return Redirect::route('settlements.index')->with('message', 'Gesundheitswerte aller Siedler und NSCs um ' . $health_change . ' ' . $plus_minus . '.');
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
        //
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
        //
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
        //
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
