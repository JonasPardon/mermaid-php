<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Tests;

use JonasPardon\Mermaid\Models\Node;
use JonasPardon\Mermaid\VO\NodeShape;

final class NodeTest extends TestCase
{
    /**
     * @dataProvider providesNodes
     * @test
     */
    public function it_converts_to_string(
        string $name,
        string $shape,
        string $expectedOutput,
    ): void {
        $node = new Node(
            identifier: $name,
            title: $name,
            shape: new NodeShape($shape),
        );

        $this->assertEquals($expectedOutput, $node->toString());
    }

    public function providesNodes(): array
    {
        return [
            ['A', NodeShape::BOX, 'A["A"];'],
            ['B', NodeShape::ROUND_EDGES, 'B("B");'],
            ['C', NodeShape::STADIUM, 'C(["C"]);'],
            ['D', NodeShape::SUBROUTINE, 'D[["D"]];'],
            ['E', NodeShape::CYLINDER, 'E[("E")];'],
            ['F', NodeShape::CIRCLE, 'F(("F"));'],
            ['G', NodeShape::ASYMMETRIC, 'G>"G"];'],
            ['H', NodeShape::RHOMBUS, 'H{"H"};'],
            ['I', NodeShape::HEXAGON, 'I{{"I"}};'],
            ['J', NodeShape::PARALLELOGRAM, 'J[/"J"/];'],
            ['K', NodeShape::PARALLELOGRAM_ALT, 'K[\"K"\];'],
            ['L', NodeShape::TRAPEZOID, 'L[/"L"\];'],
            ['M', NodeShape::TRAPEZOID_ALT, 'M[\"M"/];'],
            ['N', NodeShape::DOUBLE_CIRCLE, 'N((("N")));'],
        ];
    }
}
