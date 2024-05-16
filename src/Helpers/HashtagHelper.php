<?php
namespace Bearlovescode\Taxonomy\Helpers;

class HashtagHelper
{
    public static function extractHashtags(string $body, string $marker = '#'): array
    {
        $body = htmlspecialchars_decode($body, ENT_QUOTES | ENT_XML1);
//            $body = (mb_convert_encoding($body, 'UTF-8', 'HTML-ENTITIES'));
        $pattern = sprintf('/%s(\w+)/', $marker);
        $matches = [];

        preg_match_all($pattern, $body, $matches);

        return $matches;
    }

    public static function convertHashtagToLink(string $body, string $baseUrl): string
    {
        $hashtags = self::extractHashtags($body);

        $updatedBody = $body;

        foreach ($hashtags as $tag)
        {
            if (empty($tag) || empty($tag[0]))
                continue;

            $updatedBody = preg_replace(sprintf('/%s/', $tag[0]), sprintf('%s/%s', $baseUrl, $tag[0]), $updatedBody);
        }

        return $updatedBody;
    }
}
