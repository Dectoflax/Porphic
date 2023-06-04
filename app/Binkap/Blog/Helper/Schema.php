<?php

namespace App\Binkap\Blog\Helper;

class Schema
{
    private string $schema;

    public function __construct(
        string $headline,
        string $type,
        string $author,
        string $image,
        string $datePublished,
        string $context = "http://schema.org"
    ) {
        $this->schema = \json_encode([
            "@context" => $context,
            '@type' => $type,
            'author' => [
                '@type' => 'Person',
                'name' => $author
            ],
            'datePublished' => $datePublished,
            'image' => $image
        ], \JSON_PRETTY_PRINT);
    }

    public function getSchema()
    {
        return \sprintf('<script type="application/ld+json">%s</script>', $this->schema);
    }
}
