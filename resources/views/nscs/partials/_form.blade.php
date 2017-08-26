<div class="form-group">
    {!! Form::label('name', 'Name') !!}<br>
    {!! Form::text('name', isset($nsc->name) ? $nsc->name : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('health', 'Gesundheit') !!}<br>
    <div class="character-value">
      <button type="button" data-feature="health" class="btn btn-secondary value-control" data-control="-">-</button>
      {!! Form::number('health', isset($nsc->health) ? $nsc->health : 100, array('class' => 'form-control', 'min' => '0', 'max' => '100', 'readonly' => 'true')) !!}
      <button type="button" data-feature="health" class="btn btn-secondary value-control" data-control="+">+</button>
    </div>
</div>
