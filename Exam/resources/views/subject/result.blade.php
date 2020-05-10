@extends('layouts.app')
<!-- Users results after exam-->
@section('content')
    @if(Session::has('flash_mess'))
        <div class="alert alert-success">{{Session::get('flash_mess')}}</div>
    @endif

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> {{$title}}</div>
        <p>Subject: {{$subject->name}}</p>
        <p>Total questions: {{$cnt}}</p>
        <p>Time taken: {{$time_taken}}</p>
        

    </div>
@stop