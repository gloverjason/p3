@extends('layouts.master')


@section('message')
    <p>Messages and results from calculation will go here</p>

    @if (isset($costPerPerson))
    <h2 id='success'>Cost Per Person = $<?=($costPerPerson) ?></h2>
    @endif

@endsection


<!-- the only difference between this page and index page
is the result messages. -->

