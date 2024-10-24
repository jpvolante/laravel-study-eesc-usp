{{--

Le template par défaut, embarque les styles pour plus de simplicité.

Sources :
    - http://blog.sathomas.me/post/tracking-progress-in-pure-css
    - http://stackoverflow.com/questions/5213753/build-step-progress-bar-css-and-jquery

--}}

<style type="text/css">
<!--
ol.stepper {
    display: table;
    list-style-type: none;
    margin: 0;
    padding: 0;
    table-layout: fixed;
    width: 100%;
}
ol.stepper li {
    display: table-cell;
    text-align: center;
    line-height: 3em;
}

ol.stepper li.stepper-passed {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.stepper li.stepper-futur {
    color: silver;
    border-bottom: 4px solid silver;
}
ol.stepper li:after {
    content: "\00a0\00a0";
}
ol.stepper li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.stepper li.stepper-passed:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 1.2em;
    width: 1.2em;
    line-height: 1.2em;
    border: none;
    border-radius: 1.2em;
}
ol.stepper li.stepper-futur:before {
    content: "\039F";
    color: silver;
    background-color: white; /* need to be set to the background color */
    font-size: 1.5em;
    bottom: -1.6em;
}
-->
</style>

<ol class="stepper">
@foreach ($stepper as $step)
    <li class="@if ($step->isPassed()) stepper-passed @else stepper-futur @endif">
         {{ $step->getName() }}
    </li>
@endforeach
</ol>
