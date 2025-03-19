<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Tests;

use JonasPardon\Mermaid\Models\Graph;
use JonasPardon\Mermaid\Models\Link;
use JonasPardon\Mermaid\Models\Node;
use JonasPardon\Mermaid\VO\GraphDirection;
use JonasPardon\Mermaid\VO\NodeShape;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;

final class MermaidTest extends TestCase
{
    #[Test]
    #[DataProvider("providesGraphDirections")]
    public function it_can_set_the_direction(string $direction): void
    {
        $graph = new Graph(new GraphDirection($direction));

        $this->assertStringContainsString(
            $direction,
            $graph->render(),
        );
    }

    #[Test]
    public function it_can_add_a_node_to_the_graph(): void
    {
        $graph = new Graph();
        $node = new Node(
            identifier: 'A',
            title: 'Erlich Bachman',
            shape: new NodeShape(NodeShape::ROUND_EDGES),
        );
        $graph->addNode($node);

        $this->assertStringContainsString($node->toString(), $graph->render());
    }

    #[Test]
    public function it_can_add_a_link_between_nodes(): void
    {
        $graph = new Graph();
        $from = new Node(
            identifier: 'A',
            title: 'Erlich Bachman',
            shape: new NodeShape(NodeShape::ROUND_EDGES),
        );
        $to = new Node(
            identifier: 'B',
            title: 'Bertram Gilfoyle',
            shape: new NodeShape(NodeShape::ROUND_EDGES),
        );
        $link = new Link($from, $to);
        $graph->addLink($link);

        $this->assertStringContainsString($link->toString(), $graph->render());
    }

    public static function providesGraphDirections(): array
    {
        return collect(GraphDirection::getValidDirections())
            ->map(fn ($direction) => [$direction])
            ->toArray();
    }
}
