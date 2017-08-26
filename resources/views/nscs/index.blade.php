@extends('layouts.app')

@section('content')
	<h4>NSCs</h4>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Ges</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
			@if($nscs->count() > 0)
	      @foreach($nscs as $nsc)
	        <tr>
	          <td><a href="{{ route('nscs.edit', $nsc->id) }}">{{ $nsc->name }}</a></td>
						<td>{{ $nsc->health }}</td>
						<td>
							{!! Form::open(array('onsubmit' => 'return confirm("Willst du diesen NSC wirklich löschen?")', 'class' => 'form-inline', 'method' => 'DELETE', 'route' => array('nscs.destroy', $nsc->id))) !!}
                <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>
              {!! Form::close() !!}
						</td>
	        </tr>
	      @endforeach
			@else
				<tr>
					<td colspan="3">Keine NSCs gefunden</td>
				</tr>
			@endif
    </tbody>
    <tfoot>
      <tr>
				<th>Name</th>
        <th>Ges</th>
        <th>&nbsp;</th>
      </tr>
    </tfoot>
  </table>

	<a class="btn btn-secondary" href="{{ route('settlements.index') }}">Zurück zur Siedlung</a>

	<hr>

	<h5>Mehrere NSCs erstellen</h5>
	<div>
		{!! Form::model(new App\Settler, ['route' => ['nscs.store'], 'class' => 'form-horizontal']) !!}
		<table class="table">
			<thead>
				<tr>
					<th>{!! Form::label('num', 'Anzahl') !!}</th>
					<th>{!! Form::label('health', 'Gesundheit') !!}</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{!! Form::number('num', 1, array('class' => 'form-control', 'min' => '1', 'max' => '1000')) !!}</td>
					<td>{!! Form::number('health', 100, array('class' => 'form-control', 'min' => '1', 'max' => '100')) !!}</td>
				</tr>
				<tr>
					<td colspan="2">{!! Form::submit('NSCs erstellen', ['class'=>'btn btn-primary']) !!}</td>
				</tr>
			</tbody>
		</table>
		{!! Form::close() !!}
	</div>

@endsection
