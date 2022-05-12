<?php

declare(strict_types=1);

namespace JonasPardon\Mermaid\Models;

class Style
{
    private string $backgroundColor;
    private string $fontColor;
    private string $borderColor;
    private string $borderWidth;

    public function __construct(
        ?string $backgroundColor = null,
        ?string $fontColor = null,
        ?string $borderColor = null,
        ?string $borderWidth = null,
    ) {
        $this->backgroundColor = $backgroundColor ?? '#ececff';
        $this->fontColor = $fontColor ?? '#333333';
        $this->borderColor = $borderColor ?? '#9470db';
        $this->borderWidth = $borderWidth ?? '1px';
    }

    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    public function getFontColor(): string
    {
        return $this->fontColor;
    }

    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    public function getBorderWidth(): string
    {
        return $this->borderWidth;
    }
}
