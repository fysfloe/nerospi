<div class="form-group">
    {!! Form::label('name', 'Name') !!}<br>
    {!! Form::text('name', isset($settler->name) ? $settler->name : null, array('class' => 'form-control')) !!}
</div>
<hr>
<div class="form-group">
    {!! Form::label('fitness', 'Fitness') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="fitness" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('fitness', isset($settler->fitness) ? $settler->fitness : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="fitness" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('charm', 'Charme') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="charm" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('charm', isset($settler->charm) ? $settler->charm : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="charm" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('creativity', 'Kreativität') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="creativity" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('creativity', isset($settler->creativity) ? $settler->creativity : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="creativity" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('logic', 'Logik') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="logic" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('logic', isset($settler->logic) ? $settler->logic : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="logic" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('skill', 'Geschick') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="skill" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('skill', isset($settler->skill) ? $settler->skill : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="skill" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('knowledge', 'Wissen') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="knowledge" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('knowledge', isset($settler->knowledge) ? $settler->knowledge : 1, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="knowledge" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label('health', 'Gesundheit') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="health" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('health', isset($settler->health) ? $settler->health : 100, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="health" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('children', 'Kinder') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="children" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('children', isset($settler->children) ? $settler->children : 0, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="children" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
<hr>
<div class="form-group">
  {!! Form::label('job_id', 'Karriere') !!}<br>
  {!! Form::select('job_id', $jobs, isset($settler->job_id) ? $settler->job_id : null, array('class' => 'form-control')) !!}
</div>
<div class="job-title">
  <strong>Aktueller Beruf:</strong><br>{{ isset($settler) && $settler->job()->first() ? $settler->job()->first()->getAttribute('step' . $settler->job_step) : '-' }}
</div>
<div class="form-group">
    {!! Form::label('job_step', 'Stufe') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="job_step" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('job_step', isset($settler->job_step) ? $settler->job_step : 1, array('class' => 'form-control', 'min' => '1', 'max' => '5', 'readonly' => 'true')) !!}
      <button type="button" data-feature="job_step" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
