<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

use JonasPardon\Mermaid\VO\NodeShape;

class Node
{
    public function __construct(
        private string $identifier,
        private string $title,
        private NodeShape $shape,
        private ?Style $style = null,
    ) {
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getShape(): NodeShape
    {
        return $this->shape;
    }

    public function hasStyle(): bool
    {
        return !is_null($this->style);
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function toString(): string
    {
        return $this->getIdentifier()
            . sprintf(
                $this->getShape()->toString(),
                $this->getTitle(),
            )
            . ';';
    }
}
