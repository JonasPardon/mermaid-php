<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\VO;

use InvalidArgumentException;

class GraphDirection
{
    /**
     * Available directions: https://mermaid-js.github.io/mermaid/#/flowchart?id=flowchart-orientation
     */
    public const TOP_TO_BOTTOM = 'TB';
    public const BOTTOM_TO_TOP = 'BT';
    public const LEFT_TO_RIGHT = 'LR';
    public const RIGHT_TO_LEFT = 'RL';

    private string $direction;

    public function __construct(string $direction)
    {
        if (!in_array($direction, self::getValidDirections())) {
            throw new InvalidArgumentException("$direction is not a valid graph direction");
        }

        $this->direction = $direction;
    }

    public function toString(): string
    {
        return $this->direction;
    }

    public static function getValidDirections(): array
    {
        return [
            self::TOP_TO_BOTTOM,
            self::BOTTOM_TO_TOP,
            self::LEFT_TO_RIGHT,
            self::RIGHT_TO_LEFT,
        ];
    }
}
