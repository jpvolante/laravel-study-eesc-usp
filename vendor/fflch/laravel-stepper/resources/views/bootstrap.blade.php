{{--

Un bootstrap qui marche pas partout....

Sources :
    - http://codepen.io/davidjamesstone/pen/Agclw

--}}

<style type="text/css">
<!--
.stepper {
}
.stepper:before, .stepper:after {
    display: none;
}
.stepper .step {
    text-align: center;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.stepper .img-circle {
    display: inline-block;
    width: 12px;
    height: 12px;
}
.stepper .step .img-circle:before {
    content: "";
    display: block;
    background: #808080;
    height: 2px;
    width: 50%;
    position: absolute;
    bottom: 25%;
    left: 0;
    z-index: -1;
}
.stepper .step .img-circle:after {
    content: "";
    display: block;
    background: #808080;
    height: 2px;
    width: 50%;
    position: absolute;
    bottom: 25%;
    left: 50%;
    z-index: -1;
}

.stepper .step:last-of-type .img-circle:after {
    display: none;
}
.stepper .step:first-of-type .img-circle:before {
    display: none;
}
-->
</style>

<div class="row stepper">
@foreach ($stepper as $step)
    <div class="col-md-{{ floor(12/$stepper->getNumSteps()) }} step">{{ $step->getName() }}<br />
        <span class="img-circle bg-primary"></span>
    </div>
@endforeach
</div>

