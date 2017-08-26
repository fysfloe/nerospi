@extends('layouts.app')

@section('content')
	<h4>Gebäude</h4>
	<table class="table">
    <thead class="thead-default">
      <tr>
				<th>#</th>
        <th>Name</th>
        <th>Bringt...</th>
	      <th>Typ</th>
				<th>Stabilität</th>
				<th>Gehört</th>
				<th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
			@if($buildings->count() > 0)
	      @foreach($buildings as $building)
	        <tr>
						<td>{{ $building->id }}</td>
	          <td><a href="{{ route('buildings.edit', $building->id) }}">{{ $building->name }}</a></td>
	          <td>{{ $building->gains }}</td>
						<td>{{ $types[$building->type] }}</td>
						<td>{{ $building->stability + 1 }}</td>
						<td>{{ $building->settler()->first() ? $building->settler()->first()->name : 'Niemand' }}</td>
						<td>
							{!! Form::open(array('onsubmit' => 'return confirm("Willst du dieses Gebäude wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('buildings.destroy', $building->id))) !!}
                <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>
              {!! Form::close() !!}
						</td>
	        </tr>
	      @endforeach
			@else
				<tr>
					<td colspan="7">Keine Gebäude gefunden</td>
				</tr>
			@endif
    </tbody>
    <tfoot class="thead-default">
			<tr>
				<th>#</th>
				<th>Name</th>
        <th>Bringt...</th>
	      <th>Typ</th>
				<th>Stabilität</th>
				<th>Gehört</th>
				<th>&nbsp;</th>
      </tr>
    </tfoot>
  </table>

	<a class="btn btn-primary" href="{{ route('buildings.create') }}">Gebäude erstellen</a><a class="btn btn-secondary" href="{{ route('settlements.index') }}">Zurück zur Siedlung</a>

	<hr>

	<h5>Mehrere Gebäude löschen</h5>
	<div>
		{!! Form::open(['method' => 'POST', 'onsubmit' => 'return confirm("Willst du diese Gebäude wirklich löschen?")', 'route' => ['buildings.destroyAllUnder'], 'class' => 'form-horizontal']) !!}
		<table class="table">
			<tbody>
				<tr>
					<td>{!! Form::label('min_stability', 'Alle Gebäude löschen mit Stabilität <=') !!}</td>
					<td>{!! Form::select('min_stability', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'], 0, array('class' => 'form-control')) !!}</td>
				</tr>
				<tr>
					<td colspan="2">{!! Form::submit('Gebäude löschen', ['class'=>'btn btn-secondary']) !!}</td>
				</tr>
			</tbody>
		</table>
		{!! Form::close() !!}
	</div>

@endsection
