<?php
namespace Bearlovescode\Taxonomy\Helpers;

class HashtagHelper
{
    public static function extractHashtags(string $body, string $marker = '#'): array
    {
        $body = self::convertHtmlEntities($body);
        $pattern = sprintf('/%s\w+/', $marker);
        $rawMatches = [];
        $matches = [];

        preg_match_all($pattern, $body, $rawMatches);

        foreach ($rawMatches as $match)
        {
            if (empty($match)) continue;

            foreach ($match as $tag)
            {
                $keyword = strtolower(substr($tag, 1));
                $matches[] = [
                    $tag,
                    $keyword
                ];
            }
        }

        return $matches;


    }

    public static function convertHashtagToLink(string $body, string $linkPattern): string
    {
        $hashtags = self::extractHashtags($body);

        if (empty($hashtags)) return $body;

        foreach ($hashtags as $tag)
        {
            $repl = sprintf($linkPattern, $tag[1]);
            $body = str_replace($tag[0], $repl, $body);
        }

        return $body;
    }

    private static function convertHtmlEntities(string $body): string
    {
        return html_entity_decode(htmlspecialchars_decode($body), ENT_QUOTES|ENT_HTML5);
    }
}
