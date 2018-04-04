<!DOCTYPE html>
<!-- Jason Glover; Project 3; Spring 2018 -->

<html lang='en'>
<head>
    <meta charset='UTF-8'/>
    <title>The Ultimate Bill Splitter</title>
    <link rel='stylesheet' href='css/p3.css'/>
    @stack('head')
</head>

<body>
<div id='formbox'>
    <h1>The Ultimate Bill Splitter</h1><br/>
    <!-- action to /results is needed even though there is no results view -->
    <form method='GET' action='/results'>
        <label>How many ways would you like to split the bill? &nbsp;
            <input type='number' name='splitWays' value='{{ $splitWays or '' }}'/>
        </label>
        <br/><br/>
        <label>What was the total cost of your meal? &nbsp;
            <input type='number' name='totalCost' step='0.01' value='{{ $totalCost or ''}}'/>
        </label>
        <br/><br/>
        <label>How was the service? &nbsp;
            <select name='service'>
                <!-- incomplete = need to fix default/reload echoing-->
                <option value='excellent'@if($service == 'excellent') {{ 'selected' }} @endif>Excellent (25%)</option>
                <option value='good'@if($service == 'good') {{ 'selected' }} @endif>Good (20%)</option>
                <option value='average'@if($service == 'average') {{ 'selected' }} @endif>Average (15%)</option>
                <option value='fair'@if($service == 'fair') {{ 'selected' }} @endif>Fair (10%)</option>
                <option value='bad'@if($service == 'bad') {{ 'selected' }} @endif>Bad (5%)</option>
                <option value='horrible'@if($service == 'horrible') {{ 'selected' }} @endif>Horrible (no tip)</option>
            </select>
        </label>
        <br/><br/>
        <label>Round up?
            <input type='checkbox' name='roundUp' {{ ($roundUp) ? 'checked' : '' }} />
               &nbsp; <span id='checkboxYes'>Yes</span>
        </label>
        <br/><br/><br/>
        <input type='submit' value='Calculate' name='calculate' id='submit'>
        <br/><br/>
    </form>
</div>
<br/><br/>

@include('bill.error-form')

@if (isset($costPerPerson))
    <h2 id='success'>Cost Per Person = ${{ $costPerPerson }}</h2>
@endif

<footer>
    <br/><br/>
    <a href='https://github.com/gloverjason/p3'>View on Github</a>
</footer>

</body>
</html>