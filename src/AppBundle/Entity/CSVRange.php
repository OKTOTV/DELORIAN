<?php

namespace AppBundle\Entity;

class CSVRange {

    private $from;
    private $to;
    private $delimiter;

    public function __construct()
    {
        $this->delimiter = ';';
        $this->from = new \DateTime('-1 week');
        $this->to = new \DateTime('now');
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }
}
