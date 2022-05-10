<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\VO;

use InvalidArgumentException;

class NodeShape
{
    /**
     * Available shapes: https://mermaid-js.github.io/mermaid/#/flowchart?id=node-shapes
     */
    public const BOX = '["%s"]';
    public const ROUND_EDGES = '("%s")';
    public const STADIUM = '(["%s"])';
    public const SUBROUTINE = '[["%s"]]';
    public const CYLINDER = '[("%s")]';
    public const CIRCLE = '(("%s"))';
    public const ASYMMETRIC = '>"%s"]';
    public const RHOMBUS = '{"%s"}';
    public const HEXAGON = '{{"%s"}}';
    public const PARALLELOGRAM = '[/"%s"/]';
    public const PARALLELOGRAM_ALT = '[\"%s"\]';
    public const TRAPEZOID = '[/"%s"\]';
    public const TRAPEZOID_ALT = '[\"%s"/]';
    public const DOUBLE_CIRCLE = '((("%s")))';

    private string $shape;

    public function __construct(string $shape)
    {
        if (!in_array($shape, self::getValidShapes())) {
            throw new InvalidArgumentException("$shape is not a valid node shape");
        }

        $this->shape = $shape;
    }

    public function toString(): string
    {
        return $this->shape;
    }

    public static function getValidShapes(): array
    {
        return [
            self::BOX,
            self::ROUND_EDGES,
            self::STADIUM,
            self::SUBROUTINE,
            self::CYLINDER,
            self::CIRCLE,
            self::ASYMMETRIC,
            self::RHOMBUS,
            self::HEXAGON,
            self::PARALLELOGRAM,
            self::PARALLELOGRAM_ALT,
            self::TRAPEZOID,
            self::TRAPEZOID_ALT,
            self::DOUBLE_CIRCLE,
        ];
    }
}
