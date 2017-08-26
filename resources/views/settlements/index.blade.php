@extends('layouts.app')

@section('content')

<table class="table">
  <thead class="thead-default">
    <tr>
      <th colspan="2">Einwohner</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Einwohnerzahl</th>
      <td>{{ $population }}</td>
    </tr>
    <tr>
      <th scope="row"><a href="{{ route('settlers.index') }}">Siedler</a></th>
      <td>{{ $settlers->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Kinder</th>
      <td>{{ $children }}</td>
    </tr>
    <tr>
      <th scope="row"><a href="{{ route('nscs.index') }}">NSCs</a></th>
      <td>{{ $nscs->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Ehepaare</th>
      <td>{{ $couples }}</td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead class="thead-default">
    <tr>
      <th colspan="2">Siedlungswerte</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Kultur</th>
      <td>{{ $settlement->culture }}</td>
    </tr>
    <tr>
      <th scope="row">Forschung</th>
      <td>{{ $settlement->research }}</td>
    </tr>
    <tr>
      <th scope="row">Durchschnittliche Gesundheit</th>
      <td>{{ $average_health }}</td>
    </tr>
    <tr>
      <th scope="row">Gesundheit ändern (+/-)</th>
      <td>
        {!! Form::open(['route' => 'settlements.changeHealth']) !!}
        {!! Form::number('health_change', 0, array('class' => 'form-control', 'min' => '-50', 'max' => '50')) !!}
        {!! Form::submit('Gesundheit ändern', ['class'=>'btn btn-secondary btn-sm']) !!}</div>
        {!! Form::close() !!}
    </tr>
    <tr>
      <th scope="row">Nahrung</th>
      <td>{{ $food['total'] }} (Deckung: <span class="food-coverage {{ $food['class'] }}">{{ $food['percentage'] }} %</span>)</td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead class="thead-default">
    <tr>
      <th colspan="2">Gebäude <a class="btn btn-primary btn-sm" href="{{ route('buildings.create') }}">+</a>  (<a href="{{ route('buildings.index') }}">alle anzeigen</a>)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Häuser</th>
      <td>{{ $buildings['living']->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Industrie</th>
      <td>{{ $buildings['industry']->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Nahrung</th>
      <td>{{ $buildings['food']->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Kultur</th>
      <td>{{ $buildings['culture']->count() }}</td>
    </tr>
    <tr>
      <th scope="row">Forschung</th>
      <td>{{ $buildings['research']->count() }}</td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead class="thead-default">
    <tr>
      <th>
        Karriere <a class="btn btn-primary btn-sm" href="{{ route('jobs.create') }}">+</a> (<a href="{{ route('jobs.index') }}">alle anzeigen</a>)
      </th>
      <th>Anzahl Arbeiter</th>
    </tr>
  </thead>
  <tbody>
    @foreach($jobs as $job)
      <tr>
        <th>{{ $job->name }}</th>
        <td>{{ $job->settlers()->count() }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
