<?php

namespace Axn\LaravelStepper;

interface StepInterface
{
    public function __construct($name);

    public function setName($name);

    public function getName();

    public function setPosition($position);

    public function getPosition();

    public function setCurrent($current = true);

    public function getCurrent();

    public function isCurrent();

    public function setPassed($passed = true);

    public function getPassed();

    public function isPassed();

    public function setFirst($first = true);

    public function getFirst();

    public function isFirst();

    public function setLast($last = true);

    public function getLast();

    public function isLast();
}
