@extends('layouts.master')

@section('message')
    <p>Messages and results from calculation will go here</p>
    <?php if ($form->hasErrors) : ?>
    <div class='errorMessages'>
        <ul>
            <?php foreach ($errors as $error) : ?>
            <li class='errors'><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php elseif (isset($costPerPerson)) : ?>
    <h2 id='success'>Cost Per Person = $<?=($costPerPerson) ?></h2>
    <?php endif; ?>
@endsection


<!-- the only difference between this page and index page
is the result messages.

Result messages include errors and/or results