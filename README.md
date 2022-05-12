# Mermaid.js generator for php

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonaspardon/mermaid-php.svg?style=flat-square)](https://packagist.org/packages/jonaspardon/mermaid-php)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jonaspardon/mermaid-php/run-tests?label=tests)](https://github.com/jonaspardon/mermaid-php/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jonaspardon/mermaid-php/Check%20&%20fix%20styling?label=code%20style)](https://github.com/jonaspardon/mermaid-php/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jonaspardon/mermaid-php.svg?style=flat-square)](https://packagist.org/packages/jonaspardon/mermaid-php)

Generate mermaid.js flowcharts with php.

## Installation

You can install the package via composer:

```bash
composer require jonaspardon/mermaid-php
```

## Usage

```php
$graph = new Graph(new GraphDirection(GraphDirection::LEFT_TO_RIGHT));

$from = new Node(
    identifier: 'A',
    title: 'This package',
    shape: new NodeShape(NodeShape::ROUND_EDGES),
    style: new Style(
        backgroundColor: '#16a085',
        fontColor: '#ffffff',
        borderColor: '#333333',
    ),
);

$to = new Node(
    identifier: 'B',
    title: 'Your application',
    shape: new NodeShape(NodeShape::HEXAGON),
    style: new Style(
        backgroundColor: '#55efc4',
        fontColor: '#000',
        borderColor: '#333333',
    ),
);

$link = new Link($from, $to);

$output = $graph->addNode($from)
    ->addNode($to)
    ->addLink($link)
    ->render();
```

<img src="./example.png" />

```
flowchart LR;
A("This package");
style A fill:#16a085,stroke:#333333,stroke-width:1px,color:#ffffff;
B{{"Your application"}};
style B fill:#55efc4,stroke:#333333,stroke-width:1px,color:#000;
A-->B;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jonas Pardon](https://github.com/JonasPardon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
