<div class="form-group">
    {!! Form::label('name', 'Karriere-Name') !!}<br>
    {!! Form::text('name', isset($job->name) ? $job->name : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('step1', 'Stufe 1') !!}<br>
    {!! Form::text('step1', isset($job->step1) ? $job->step1 : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('step1', 'Stufe 2') !!}<br>
    {!! Form::text('step2', isset($job->step2) ? $job->step2 : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('step3', 'Stufe 3') !!}<br>
    {!! Form::text('step3', isset($job->step3) ? $job->step3 : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('step4', 'Stufe 4') !!}<br>
    {!! Form::text('step4', isset($job->step4) ? $job->step4 : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('step5', 'Stufe 5') !!}<br>
    {!! Form::text('step5', isset($job->step5) ? $job->step5 : null, array('class' => 'form-control')) !!}
</div>
