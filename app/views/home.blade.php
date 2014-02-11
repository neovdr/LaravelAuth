@extends('layout.main')

@section('content')
	@if(Auth::check())
		Hello {{ Auth::user()->username }}
	@else
		<p>You are not signed in!</p>
	@endif
@stop