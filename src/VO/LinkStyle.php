<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\VO;

use InvalidArgumentException;

class LinkStyle
{
    public const ARROW_HEAD = '-->';
    public const OPEN = '---';
    public const DOTTED = '-.->';
    public const THICK = '==>';

    private string $style;

    public function __construct(string $style)
    {
        if (!in_array($style, self::getValidStyles())) {
            throw new InvalidArgumentException("$style is not a valid link style");
        }

        $this->style = $style;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public static function getValidStyles(): array
    {
        return [
            self::ARROW_HEAD,
            self::OPEN,
            self::DOTTED,
            self::THICK,
        ];
    }
}
