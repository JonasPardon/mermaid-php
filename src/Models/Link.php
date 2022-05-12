<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

use JonasPardon\Mermaid\VO\LinkStyle;

class Link
{
    public function __construct(
        private Node $from,
        private Node $to,
        private ?string $text = null,
        private ?LinkStyle $linkStyle = null,
    ) {
        if (!$this->linkStyle) {
            $this->linkStyle = new LinkStyle(LinkStyle::ARROW_HEAD);
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

    public function toString(): string
    {
        return $this->getFrom()->getIdentifier()
            . $this->getConnectionString()
            . $this->getTo()->getIdentifier()
            . ';';
    }

    private function getConnectionString(): string
    {
        if (!$this->text) {
            return $this->linkStyle->getStyle();
        }

        return $this->linkStyle->getStyle() . "|{$this->text}|";
    }
}
