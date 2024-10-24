
<style type="text/css">
<!--
/* Copyright 2013-2015 etc Chris Tabor. Licensed under MIT. */

.flexer,
.progress-indicator {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.no-flexer,
.progress-indicator.stacked {
    display: block;
}
.no-flexer-element {
    -ms-flex: 0;
    -webkit-flex: 0;
    -moz-flex: 0;
    flex: 0;
}
.flexer-element,
.progress-indicator > li {
    -ms-flex: 1;
    -webkit-flex: 1;
    -moz-flex: 1;
    flex: 1;
}
.progress-indicator {
    margin: 0;
    padding: 0;
    font-size: 80%;
    text-transform: uppercase;
    margin-bottom: 1em;
}
.progress-indicator > li {
    list-style: none;
    text-align: center;
    width: auto;
    padding: 0;
    margin: 0;
    position: relative;
    text-overflow: ellipsis;
    color: #bbbbbb;
    display: block;
}
.progress-indicator > li:hover {
    color: #6e6e6e;
}
.progress-indicator > li .bubble {
    border-radius: 1000px;
    width: 20px;
    height: 20px;
    background-color: #bbbbbb;
    display: block;
    margin: 0 auto 0.5em auto;
    border-bottom: 1px solid #888888;
}
.progress-indicator > li .bubble:before,
.progress-indicator > li .bubble:after {
    display: block;
    position: absolute;
    top: 9px;
    width: 100%;
    height: 3px;
    content: '';
    background-color: #bbbbbb;
}
.progress-indicator > li .bubble:before {
    left: 0;
}
.progress-indicator > li .bubble:after {
    right: 0;
}
.progress-indicator > li.completed {
    color: green;
}
.progress-indicator > li.completed .bubble {
    background-color: #65d074;
    color: #65d074;
    border-color: #247830;
}
.progress-indicator > li.completed .bubble:before,
.progress-indicator > li.completed .bubble:after {
    background-color: #65d074;
    border-color: #247830;
}
.progress-indicator > li a:hover .bubble {
    background-color: #5671d0;
    color: #5671d0;
    border-color: #1f306e;
}
.progress-indicator > li a:hover .bubble:before,
.progress-indicator > li a:hover .bubble:after {
    background-color: #5671d0;
    border-color: #1f306e;
}
.progress-indicator > li.danger .bubble {
    background-color: #d3140f;
    color: #d3140f;
    border-color: #440605;
}
.progress-indicator > li.danger .bubble:before,
.progress-indicator > li.danger .bubble:after {
    background-color: #d3140f;
    border-color: #440605;
}
.progress-indicator > li.warning .bubble {
    background-color: #edb10a;
    color: #edb10a;
    border-color: #5a4304;
}
.progress-indicator > li.warning .bubble:before,
.progress-indicator > li.warning .bubble:after {
    background-color: #edb10a;
    border-color: #5a4304;
}
.progress-indicator > li.info .bubble {
    background-color: #5b32d6;
    color: #5b32d6;
    border-color: #25135d;
}
.progress-indicator > li.info .bubble:before,
.progress-indicator > li.info .bubble:after {
    background-color: #5b32d6;
    border-color: #25135d;
}
.progress-indicator.stacked > li {
    text-indent: -10px;
    text-align: center;
    display: block;
}
.progress-indicator.stacked > li .bubble:before,
.progress-indicator.stacked > li .bubble:after {
    left: 50%;
    margin-left: -1.5px;
    width: 3px;
    height: 100%;
}
.progress-indicator.stacked .stacked-text {
    position: relative;
    z-index: 10;
    top: 0;
    margin-left: 60% !important;
    width: 45% !important;
    display: inline-block;
    text-align: left;
    line-height: 1.2em;
}
.progress-indicator.stacked > li a {
    border: none;
}
@media handheld,
screen and (max-width: 400px) {
    .progress-indicator {
        font-size: 60%;
    }
}
-->
</style>


<ul class="progress-indicator">
@foreach ($stepper as $step)
    @if ($step->isCurrent())
    <li class="warning">
        <span class="bubble"></span>
        {{ $step->getTitle() }}
    </li>
    @elseif ($step->isPassed())
    <li class="completed">
        <a href="{{ $step->getUrl() }}">
            <span class="bubble"></span>
            <i class="fa fa-check-circle"></i>
            {{ $step->getTitle() }}
        </a>
    </li>
    @else
    <li>
        <span class="bubble"></span>
        {{ $step->getTitle() }}
    </li>
    @endif
@endforeach
</ul>

<hr>

<div class="row">
    <div class="col-sm-4">
        <h4>Étape précédente</h4>

        <p><code>$stepper->getPrevStep()</code></p>
        {{ var_dump($stepper->getPrevStep()) }}

        <p><code>$stepper->getPrevStep()->getName()</code></p>
        {{ var_dump($stepper->getPrevStep()->getName()) }}

        <p><code>$stepper->getPrevStep()->getUrl()</code></p>
        {{ var_dump($stepper->getPrevStep()->getUrl()) }}

        <p><code>$stepper->getPrevStep()->getRoute()</code></p>
        {{ var_dump($stepper->getPrevStep()->getRoute()) }}

        <p><code>$stepper->getPrevStep()->getPosition()</code></p>
        {{ var_dump($stepper->getPrevStep()->getPosition()) }}

        <p><code>$stepper->getPrevStep()->getTitle()</code></p>
        {{ var_dump($stepper->getPrevStep()->getTitle()) }}

        <p><code>$stepper->getPrevStep()->getDescription()</code></p>
        {{ var_dump($stepper->getPrevStep()->getDescription()) }}

        <p><code>$stepper->getPrevStep()->isCurrent()</code></p>
        {{ var_dump($stepper->getPrevStep()->isCurrent()) }}

        <p><code>$stepper->getPrevStep()->isPassed()</code></p>
        {{ var_dump($stepper->getPrevStep()->isPassed()) }}

        <p><code>$stepper->getPrevStep()->isFirst()</code></p>
        {{ var_dump($stepper->getPrevStep()->isFirst()) }}

        <p><code>$stepper->getPrevStep()->isLast()</code></p>
        {{ var_dump($stepper->getPrevStep()->isLast()) }}

    </div>
    <div class="col-sm-4">
        <h4>Étape en cours</h4>

        <p><code>$stepper->getCurrentStep()</code></p>
        {{ var_dump($stepper->getCurrentStep()) }}

        <p><code>$stepper->getCurrentStep()->getName()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getName()) }}

        <p><code>$stepper->getCurrentStep()->getUrl()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getUrl()) }}

        <p><code>$stepper->getCurrentStep()->getRoute()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getRoute()) }}

        <p><code>$stepper->getCurrentStep()->getPosition()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getPosition()) }}

        <p><code>$stepper->getCurrentStep()->getTitle()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getTitle()) }}

        <p><code>$stepper->getCurrentStep()->getDescription()</code></p>
        {{ var_dump($stepper->getCurrentStep()->getDescription()) }}

        <p><code>$stepper->getCurrentStep()->isCurrent()</code></p>
        {{ var_dump($stepper->getCurrentStep()->isCurrent()) }}

        <p><code>$stepper->getCurrentStep()->isPassed()</code></p>
        {{ var_dump($stepper->getCurrentStep()->isPassed()) }}

        <p><code>$stepper->getCurrentStep()->isFirst()</code></p>
        {{ var_dump($stepper->getCurrentStep()->isFirst()) }}

        <p><code>$stepper->getCurrentStep()->isLast()</code></p>
        {{ var_dump($stepper->getCurrentStep()->isLast()) }}
    </div>
    <div class="col-sm-4">
        <h4>Étape suivante</h4>

        <p><code>$stepper->getNextStep()</code></p>
        {{ var_dump($stepper->getNextStep()) }}

        <p><code>$stepper->getNextStep()->getName()</code></p>
        {{ var_dump($stepper->getNextStep()->getName()) }}

        <p><code>$stepper->getNextStep()->getUrl()</code></p>
        {{ var_dump($stepper->getNextStep()->getUrl()) }}

        <p><code>$stepper->getNextStep()->getRoute()</code></p>
        {{ var_dump($stepper->getNextStep()->getRoute()) }}

        <p><code>$stepper->getNextStep()->getPosition()</code></p>
        {{ var_dump($stepper->getNextStep()->getPosition()) }}

        <p><code>$stepper->getNextStep()->getTitle()</code></p>
        {{ var_dump($stepper->getNextStep()->getTitle()) }}

        <p><code>$stepper->getNextStep()->getDescription()</code></p>
        {{ var_dump($stepper->getNextStep()->getDescription()) }}

        <p><code>$stepper->getNextStep()->isCurrent()</code></p>
        {{ var_dump($stepper->getNextStep()->isCurrent()) }}

        <p><code>$stepper->getNextStep()->isPassed()</code></p>
        {{ var_dump($stepper->getNextStep()->isPassed()) }}

        <p><code>$stepper->getNextStep()->isFirst()</code></p>
        {{ var_dump($stepper->getNextStep()->isFirst()) }}

        <p><code>$stepper->getNextStep()->isLast()</code></p>
        {{ var_dump($stepper->getNextStep()->isLast()) }}
    </div>
</div>
