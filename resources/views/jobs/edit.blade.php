@extends('layouts.app')

@section('content')
	@if (count($errors->job_create) > 0)
		<div class="alert alert-danger">
			<p><strong>Error</strong></p>
			<ul>
				@foreach ($errors->job_create->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model(new App\Job, ['method' => 'PATCH', 'route' => ['jobs.update', $job->id], 'class' => 'form-horizontal']) !!}
	 @include('jobs/partials/_form')

  <!-- Submit -->
  {!! Form::submit('Speichern', ['class'=>'btn btn-primary']) !!}</div>

	 {!! Form::close() !!}
@endsection
