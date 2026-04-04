<?php
    function getRandomColour() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    function contrastColour(string $hex): string {
        $hex = ltrim($hex, '#');
        [$r, $g, $b] = [hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2))];
        // sRGB luminance
        $luminance = 0.2126*($r/255) + 0.7152*($g/255) + 0.0722*($b/255);
        return $luminance > 0.45 ? '#1a1a1a' : '#f5f0e8';
    }
?>