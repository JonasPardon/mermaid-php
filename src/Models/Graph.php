<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

use Illuminate\Support\Collection;
use JonasPardon\Mermaid\VO\GraphDirection;

class Graph
{
    private Collection $nodes;
    private Collection $links;

    public function __construct(
        private string $direction = GraphDirection::LEFT_TO_RIGHT,
    ) {
        $this->nodes = new Collection();
        $this->links = new Collection();
    }

    public function render(): string
    {
        $output = "flowchart {$this->direction}" . ';' . PHP_EOL;

        $this->nodes->each(function (Node $node) use (&$output) {
            $output .= $node->getIdentifier()
                . sprintf($node->getShape()->toString(), $node->getTitle())
                . ';' . PHP_EOL;
        });

        $this->links->each(function (Link $link) use (&$output) {
            $output .= $link->getFrom()->getIdentifier()
                . $link->getArrow()->toString()
                . $link->getTo()->getIdentifier()
                . ';' . PHP_EOL;
        });

        return $output;
    }

    public function addNode(Node $node): self
    {
        if ($this->nodes->doesntContain($node)) {
            $this->nodes->push($node);
        }

        return $this;
    }

    public function addLink(Link $link): self
    {
        if ($this->links->doesntContain($link)) {
            $this->links->push($link);
        }

        return $this;
    }
}
