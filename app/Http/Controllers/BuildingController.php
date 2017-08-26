<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Settlement;
use App\Settler;
use App\Building;

class BuildingController extends Controller
{
  protected $rules = [
    'name' => 'required',
    'type' => 'required',
    'stability' => 'required|min:1|max:10'
  ];

  protected $types = [
    'living' => 'Wohnen',
    'culture' => 'Kultur',
    'research' => 'Forschung',
    'industry' => 'Industrie',
    'food' => 'Nahrung',
    'others' => 'Sonstige'
  ];

  protected $buildings = [
    'Holzhütte',
    'Steinhütte',
    'Lehmhütte',
    'Sägewerk',
    'Lehmwerk',
    'Steinbruch',
    'Weizenfeld',
    'Maisfeld',
    'Rinderfarm',
    'Schaffarm',
    'Museum',
    'Theater',
    'Oper',
    'Schule',
    'Universität',
    'Spezialgebäude'
  ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $buildings = Building::all();

      $view_variables = [
        'types' => $this->types,
        'buildings' => $buildings
      ];

      return view('buildings.index')->with($view_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $view_variables = [
        'title' => 'Gebäude erstellen',
        'types' => $this->types,
        'buildings' => $this->getBuildingsArray(),
        'settlers' => $this->getSettlersArray()
      ];

      return view('buildings.create')->with($view_variables);
    }

    protected function getBuildingsArray() {
      $buildings = [];

      foreach($this->buildings as $building) {
        $buildings[$building] = $building;
      }

      return $buildings;
    }

    protected function getSettlersArray() {
      $all_settlers = Settler::all();
      $settlers = [];

      foreach($all_settlers as $settler) {
        $settlers[$settler->id] = $settler->name;
      }

      $settlers[null] = 'Niemand';

      return $settlers;
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
        $building = Input::all();

        $building = $settlement->buildings()->create($building);

        if(Input::get('settler_id')) {
          $settler = Settler::find(Input::get('settler_id'));
          $settler->buildings()->save($building);
        }

        if($building->type === 'culture') {
          $settlement->culture += $building->gains;
        }

        if($building->type === 'research') {
          $settlement->research += $building->gains;
        }

        $settlement->save();

        return Redirect::route('buildings.index');
      }

      return Redirect::back()->withErrors($validator, 'building_create')->withInput();
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
      $building = Building::find($id);
      return view('buildings.edit')->with(
        [
          'building' => $building,
          'buildings' => $this->getBuildingsArray(),
          'settlers' => $this->getSettlersArray(),
          'types' => $this->types
        ]
      );
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
        $building = Building::find($id);

        $building->update(Input::all());

        return Redirect::route('buildings.index')->with('success', 'Spitze! Das Gebäude wurde aktualisiert.');
      }

      return Redirect::back()->withErrors($validator, 'building_update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $building = Building::find($id);
      if($building) {
        $settlement = Settlement::first();

        if($building->type === 'culture') {
          $settlement->culture -= $building->gains;
        }

        if($building->type === 'research') {
          $settlement->research -= $building->gains;
        }
        Building::destroy($id);
        $settlement->save();
        return Redirect::back()->with('message', 'Gebäude #' . $id . ' gelöscht.');
      }
    }

    public function destroyAllUnder() {
      $min_stability = Input::get('min_stability');

      if($min_stability != null) {
        $buildings = Building::where('stability', '<=', $min_stability)->get();
        $building_ids = [];

        foreach($buildings as $building) {
          $building_ids[] = $building->id;
          Building::destroy($building->id);
        }

        $building_ids = implode(', ', $building_ids);

        $message = 'Alle Gebäude mit Stabilität <= ' . ($min_stability + 1) . ' wurden gelöscht (IDs: ' . $building_ids . ').';

        return Redirect::route('buildings.index')->with('message', $message);
      } else {
        return Redirect::back()->withErrors(['min_stability' => 'Bitte gib eine minimale Stabilität an.'], 'building_destroy_all_under')->withInput();
      }

    }
}
