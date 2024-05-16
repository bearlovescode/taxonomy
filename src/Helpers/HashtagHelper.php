<?php
    namespace Bearlovescode\Taxonomy\Helpers;

    class HashtagHelper
    {
        public static function extractHashtags(string $body, string $marker = '#'): array
        {
            $pattern = sprintf('/%s(\w+)/', $marker);
            $matches = [];

            preg_match_all($pattern, $body, $matches);

            return $matches;
        }

        public static function convertHashtagToLink(string $body, string $baseUrl): string
        {
            $hashtags = self::extractHashtags($body);

            $updatedBody = $body;

            return $updatedBody;
        }
    }