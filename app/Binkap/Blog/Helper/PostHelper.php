<?php

namespace App\Binkap\Blog\Helper;

class PostHelper
{
    public static function topicToId(string $topic)
    {
        return \str_replace(['.', ' ', ',', '_', '/', "\/"], '-', \trim($topic));
    }
}
