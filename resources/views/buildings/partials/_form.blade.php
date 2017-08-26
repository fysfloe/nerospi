<div class="form-group">
    {!! Form::label('name', 'Name') !!}<br>
    {!! Form::select('name', $buildings, isset($building->name) ? $building->name : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('gains', 'Bringt') !!}<br>
    {!! Form::number('gains', isset($building->gains) ? $building->gains : 0, array('class' => 'form-control', 'min' => '0', 'max' => '20')) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Typ') !!}<br>
    {!! Form::select('type', $types, isset($building->type) ? $building->type : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('stability', 'Stabilität') !!}<br>
    {!! Form::select('stability', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'], isset($building->stability) ? $building->stability : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('settler_id', 'Gebaut von') !!}<br>
    {!! Form::select('settler_id', $settlers, isset($building->settler_id) ? $building->settler_id : null, array('class' => 'form-control')) !!}
</div>
