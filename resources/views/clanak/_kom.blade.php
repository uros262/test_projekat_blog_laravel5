{!! Form::open(['url' => ['komentar', $clanak_id],'class'=>'kom', 'id'=> 'acc'.$id,'style' => 'display: none; max-width: 600px; margin: 50px 0px; border: 1px solid darkgrey; padding: 20px; border-radius: 20px']) !!}
<h2>Ostavite komentar:</h2>
<div class="form-group">
    {!! Form::label('name','Ime: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tekst','Komentar: ') !!}
    <span style="float: right;">0/1500</span>
    {!! Form::textarea('tekst', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('parent_id',$komentar->id) !!}
    {!! Form::hidden('level',$komentar->level) !!}
</div>

<div class="form-group">
    {!! Form::label('anti','AntiBot pitanje: ') !!}
    <span>{{$sabirak1}} + {{$sabirak2}}</span>
    {!! Form::select('anti', ['null' => '','jedan' => 'jedan', 'dva' => 'dva', 'tri' => 'tri', 'cetiri' => 'cetiri', 'pet' => 'pet', 'sest' => 'sest', 'sedam' => 'sedam', 'osam' => 'osam', 'devet' => 'devet', 'deset' => 'deset'], ['class' => 'form-control']); !!}
    {!! Form::hidden('rezultat',$rezultat) !!}?
</div>

<div class="form-group">
    {!! Form::hidden('id', $clanak_id) !!}
    {!! Form::submit('Prokomentarisi', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}