@extends('layouts.app')

@section('content')
	@if (count($errors->building_create) > 0)
		<div class="alert alert-danger">
			<p><strong>Error</strong></p>
			<ul>
				@foreach ($errors->building_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new App\Building, ['route' => ['buildings.store'], 'class' => 'form-horizontal']) !!}
	 @include('buildings/partials/_form')

  <!-- Submit -->
  {!! Form::submit('Gebäude erstellen', ['class'=>'btn btn-primary']) !!}</div>

	 {!! Form::close() !!}
@endsection
