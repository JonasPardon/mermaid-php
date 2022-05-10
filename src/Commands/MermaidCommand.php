<?php

namespace JonasPardon\Mermaid\Commands;

use Illuminate\Console\Command;

class MermaidCommand extends Command
{
    public $signature = 'mermaid-php';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
