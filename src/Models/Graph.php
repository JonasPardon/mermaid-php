<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

use Illuminate\Support\Collection;
use JonasPardon\Mermaid\VO\GraphDirection;

class Graph
{
    private GraphDirection $direction;
    private Collection $nodes;
    private Collection $links;

    public function __construct(
        ?GraphDirection $direction = null,
    )
    {
        $this->direction = $direction ?? new GraphDirection(GraphDirection::LEFT_TO_RIGHT);
        $this->nodes = new Collection();
        $this->links = new Collection();
    }

    public function render(): string
    {
        $output = "flowchart {$this->direction->toString()};" . PHP_EOL;

        $this->nodes->each(function (Node $node) use (&$output, &$styles) {
            $output .= $node->getIdentifier()
                . sprintf($node->getShape()->toString(), $node->getTitle())
                . ';' . PHP_EOL;

            if ($node->hasStyle()) {
                $style = $node->getStyle();
                $format = 'style %s fill:%s,stroke:%s,stroke-width:%s,color:%s;';

                $output .= sprintf(
                        $format,
                        $node->getIdentifier(),
                        $style->getBackgroundColor(),
                        $style->getBorderColor(),
                        $style->getBorderWidth(),
                        $style->getFontColor(),
                    ) . PHP_EOL;
            }
        });

        $this->links->each(function (Link $link) use (&$output) {
            $output .= $link->toString() . PHP_EOL;
        });

        return $output;
    }

    public function addNode(Node $node): self
    {
        /** @var Node|null $existingNodeWithSameIdentifier */
        $existingNodeWithSameIdentifier = $this->nodes
            ->filter(fn(Node $existingNode) => $existingNode->getIdentifier() === $node->getIdentifier())
            ->first();

        if (!$existingNodeWithSameIdentifier) {
            $this->nodes->push($node);
        }

        return $this;
    }

    public function addLink(Link $link): self
    {
        $existingLinkWithSameIdentifiers = $this->links
            ->filter(function (Link $existingLink) use ($link) {
                return $existingLink->getFrom()->getIdentifier() === $link->getFrom()->getIdentifier()
                    && $existingLink->getTo()->getIdentifier() === $link->getTo()->getIdentifier();
            })
            ->first();

        if (!$existingLinkWithSameIdentifiers) {
            $this->links->push($link);
        }

        return $this;
    }
}
