<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

class Link
{
    public function __construct(
        private Node $from,
        private Node $to,
        private ?Arrow $arrow = null,
    ) {
        if (!$this->arrow) {
            $this->arrow = new Arrow();
        }
    }

    public function getFrom(): Node
    {
        return $this->from;
    }

    public function getTo(): Node
    {
        return $this->to;
    }

    public function getArrow(): Arrow
    {
        return $this->arrow;
    }
}
