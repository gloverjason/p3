<!DOCTYPE html>
<!-- Jason Glover; Project 3; Spring 2018 -->

<html lang='en'>
<head>
    <meta charset="UTF-8"/>
    <title>The Ultimate Bill Splitter</title>
    <link rel='stylesheet' href='css/p3.css'/>
    @stack('head')
</head>

<body>
<div id='formbox'>
    <h1>The Ultimate Bill Splitter</h1><br/>
    @yield('content')
</div>
<br/><br/>

    @yield('message')

</body>
</html>