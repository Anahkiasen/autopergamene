@extends('portfolio')

@section('title')
  {{ $support->name }} -
@stop

@section('navigation')
  @parent
  {{{ HTML::backLink('category/illustration', 'Retour aux supports') }}}
@stop

@section('content')
  @foreach($support->illustrations as $illustration)
    <figure class='illustration'>
      <h2>{{ $illustration->name }}</h2>
      <div class='image-wrap'>
        {{{ $illustration->image($support->folder) }}}
      </div>
      @if($illustration->media)
        <figcaption>{{ $illustration->media }}</figcaption>
      @endif
    </figure>
  @endforeach
@stop