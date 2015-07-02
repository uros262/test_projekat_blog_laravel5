<!--{!! Form::hidden('user_id',1) !!}-->

<div class="form-group">
    {!! Form::label('title','Naslov: ') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Tekst: ') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Objavljen: ') !!}
    {!! Form::input('date','published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($TekstNaDugmetu, ['class' => 'btn btn-primary form-control']) !!}
</div>