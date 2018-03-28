@extends('layouts.master')

@section('form')
<div id='formbox'>
    <h1>The Ultimate Bill Splitter</h1><br/>
    <form method='GET' action='/bill/index'>
        <label>How many ways would you like to split the bill? &nbsp;
            <input type='number' name='splitWays' value='{{ $splitWays or '' }}'/>
        </label>
        <br/><br/>
        <label>What was the total cost of your meal? &nbsp;
            <input type='number' name='totalCost' value='{{ $totalCost or ''}}'/>
        </label>
        <br/><br/>
        <label>How was the service? &nbsp;
            <select name='service'>
                <!-- incomplete = need to fix default/reload echoing-->
                <option value='excellent'<?php if ($service == 'excellent') echo 'selected' ?>>Excellent (25%)</option>
                <option value='good'<?php if ($service == 'good') echo 'selected' ?>>Good (20%)</option>
                <option value='average'<?php if ($service == 'average') echo 'selected' ?>>Average (15%)</option>
                <option value='fair'<?php if ($service == 'fair') echo 'selected' ?>>Fair (10%)</option>
                <option value='bad'<?php if ($service == 'bad') echo 'selected' ?>>Bad (5%)</option>
                <option value='horrible'<?php if ($service == 'horrible') echo 'selected' ?>>Horrible (no tip)</option>
            </select>
        </label>
        <br/><br/>
        <label>Round up?
            <input type='checkbox' name='roundUp' value = 'checked'  />
               &nbsp; <span id='checkboxYes'>Yes</span>
        </label>
        <br/><br/><br/>
        <input type='submit' value='Calculate' name='calculate' id='submit'>
        <br/><br/>
    </form>
</div>

@endsection








