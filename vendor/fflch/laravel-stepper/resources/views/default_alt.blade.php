{{--

Le même que default mais utilise display:inline-block
à la place de display:table et display:table-cell.

Ceci peut-être utile pour les navigateurs ayant un faible support de display.

Sources :
    - http://blog.sathomas.me/post/tracking-progress-in-pure-css

--}}

<style type="text/css">
<!--
ol.stepper {
    margin: 0;
    padding: 0;
    list-style-type none;
}
ol.stepper li {
    display: inline-block;
    text-align: center;
    line-height: 3em;
}
ol.stepper[data-stepper-steps="2"] li { width: 49%; }
ol.stepper[data-stepper-steps="3"] li { width: 33%; }
ol.stepper[data-stepper-steps="4"] li { width: 24%; }
ol.stepper[data-stepper-steps="5"] li { width: 19%; }
ol.stepper[data-stepper-steps="6"] li { width: 16%; }
ol.stepper[data-stepper-steps="7"] li { width: 14%; }
ol.stepper[data-stepper-steps="8"] li { width: 12%; }
ol.stepper[data-stepper-steps="9"] li { width: 11%; }

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

<ol class="stepper" data-stepper-steps="{{ $stepper->getNumSteps() }}">
@foreach ($stepper as $step)<!--
 --><li class="@if ($step->isPassed()) stepper-passed @else stepper-futur @endif">
     {{ $step->getName() }}
</li><!--
 -->@endforeach
</ol>
