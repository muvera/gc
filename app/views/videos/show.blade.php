@extends('layouts.master')
@section('content')
<h1>{{$video->name}}</h1>
{{$video->video}}
<p>{{$video->description}}</p>
@stop