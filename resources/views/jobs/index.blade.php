@extends('layouts.app')

@section('content')
	<h4>Siedler</h4>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Karriere-Name</th>
        <th>Stufe 1</th>
				<th>Stufe 2</th>
				<th>Stufe 3</th>
				<th>Stufe 4</th>
				<th>Stufe 5</th>
      </tr>
    </thead>
    <tbody>
			@if($jobs->count() > 0)
	      @foreach($jobs as $job)
	        <tr>
	          <td><a href="{{ route('jobs.edit', $job->id) }}">{{ $job->name }}</a></td>
	          <td>{{ $job->step1 }}</td>
						<td>{{ $job->step2 }}</td>
						<td>{{ $job->step3 }}</td>
						<td>{{ $job->step4 }}</td>
						<td>{{ $job->step5 }}</td>
	        </tr>
	      @endforeach
			@else
				<tr>
					<td colspan="9">Keine Jobs gefunden</td>
				</tr>
			@endif
    </tbody>
    <tfoot>
      <tr>
				<th>Karriere-Name</th>
        <th>Stufe 1</th>
				<th>Stufe 2</th>
				<th>Stufe 3</th>
				<th>Stufe 4</th>
				<th>Stufe 5</th>
      </tr>
    </tfoot>
  </table>

	<a class="btn btn-primary" href="{{ route('jobs.create') }}">Job erstellen</a><a class="btn btn-secondary" href="{{ route('settlements.index') }}">Zurück zur Siedlung</a>

@endsection
