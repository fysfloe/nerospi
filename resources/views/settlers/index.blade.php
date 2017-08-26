@extends('layouts.app')

@section('content')
	<h4>Siedler</h4>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Fi</th>
        <th>Ch</th>
        <th>Kr</th>
        <th>Lo</th>
        <th>Ge</th>
        <th>Wi</th>
				<th>Ges</th>
				<th>Ki</th>
      </tr>
    </thead>
    <tbody>
			@if($settlers->count() > 0)
	      @foreach($settlers as $settler)
	        <tr>
	          <td><a href="{{ route('settlers.edit', $settler->id) }}">{{ $settler->name }}</a></td>
	          <td>{{ $settler->fitness }}</td>
	          <td>{{ $settler->charm }}</td>
	          <td>{{ $settler->creativity }}</td>
	          <td>{{ $settler->logic }}</td>
	          <td>{{ $settler->skill }}</td>
	          <td>{{ $settler->knowledge }}</td>
						<td><span class="settler-health @if($settler->health == 100) pos @elseif($settler->health == 0) neg @endif">{{ $settler->health }}</span></td>
						<td>{{ $settler->children }}</td>
	        </tr>
	      @endforeach
			@else
				<tr>
					<td colspan="9">Keine Siedler gefunden</td>
				</tr>
			@endif
    </tbody>
    <tfoot>
      <tr>
				<th>Name</th>
        <th>Fi</th>
        <th>Ch</th>
        <th>Kr</th>
        <th>Lo</th>
        <th>Ge</th>
        <th>Wi</th>
				<th>Ges</th>
				<th>Ki</th>
      </tr>
    </tfoot>
  </table>

	<a class="btn btn-primary" href="{{ route('settlers.create') }}">Siedler erstellen</a><a class="btn btn-secondary" href="{{ route('settlements.index') }}">Zurück zur Siedlung</a>

@endsection
