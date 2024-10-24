<?php

namespace Axn\LaravelStepper;

class Step implements StepInterface
{
    private $name;

    private $position;

    private $url;

    private $route;

    private $title;

    private $description;

    private $current = false;

    private $passed = false;

    private $first = false;

    private $last = false;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPosition($position)
    {
        $this->position = (integer)$position;

        return $this;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCurrent($current = true)
    {
        $this->current = $current;

        return $this;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function isCurrent()
    {
        return $this->getCurrent();
    }

    public function setPassed($passed = true)
    {
        $this->passed = $passed;

        return $this;
    }

    public function getPassed()
    {
        return $this->passed;
    }

    public function isPassed()
    {
        return $this->getPassed();
    }

    public function setFirst($first = true)
    {
        $this->first = $first;

        return $this;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function isFirst()
    {
        return $this->getFirst();
    }

    public function setLast($last = true)
    {
        $this->last = $last;

        return $this;
    }

    public function getLast()
    {
        return $this->last;
    }

    public function isLast()
    {
        return $this->getLast();
    }
}
