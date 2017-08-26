@extends('layouts.app')

@section('content')
	@if (count($errors->settler_create) > 0)
		<div class="alert alert-danger">
			<p><strong>Error</strong></p>
			<ul>
				@foreach ($errors->settler_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new App\Settler, ['route' => ['settlers.store'], 'class' => 'form-horizontal']) !!}
	 @include('settlers/partials/_form')

  <!-- Submit -->
  {!! Form::submit('Siedler erstellen', ['class'=>'btn btn-primary']) !!}</div>

	 {!! Form::close() !!}
@endsection
