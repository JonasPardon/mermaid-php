<?php

namespace JonasPardon\Mermaid\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JonasPardon\Mermaid\Mermaid
 */
class Mermaid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mermaid-php';
    }
}
