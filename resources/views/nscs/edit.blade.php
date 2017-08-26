@extends('layouts.app')

@section('content')
	@if (count($errors->nsc_create) > 0)
		<div class="alert alert-danger">
			<p><strong>Error</strong></p>
			<ul>
				@foreach ($errors->nsc_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new App\NSC, ['method' => 'PATCH', 'route' => ['nscs.update', $nsc->id], 'class' => 'form-horizontal']) !!}
	 @include('nscs/partials/_form')

  <!-- Submit -->
  {!! Form::submit('Speichern', ['class'=>'btn btn-primary']) !!}</div>

	 {!! Form::close() !!}
@endsection
