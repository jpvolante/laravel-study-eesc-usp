{{--

Une autre façon de présenter les choses...

Sources :
    - http://jsfiddle.net/jermartin77/vmc3e/

--}}

<style type="text/css">
<!--
#stepper {
    padding: 0;
    list-style-type: none;
    font-family: arial;
    font-size: 12px;
    clear: both;
    line-height: 1em;
    margin: 0 -1px;
    text-align: center;
}

#stepper li {
    float: left;
    padding: 10px 30px 10px 40px;
    background: #333;
    color: #fff;
    position: relative;
    border-top: 1px solid #666;
    border-bottom: 1px solid #666;
    margin: 0 1px;
}

#stepper li:before {
    content: '';
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    position: absolute;
    top: 0;
    left: 0;

}
#stepper li:after {
    content: '';
    border-left: 16px solid #333;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    position: absolute;
    top: 0;
    left: 100%;
    z-index: 20;
}

#stepper li.active {
    background: #555;
}

#stepper li.active:after {
    border-left-color: #555;
}
-->
</style>

<ul id="stepper">
@foreach ($stepper as $step)
    <li @if ($step->isCurrent()) class="active" @endif>
         {{ $step->getName() }}
    </li>
@endforeach
</ul>
