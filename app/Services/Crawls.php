<?php

namespace App\Services;

use Drnxloc\LaravelHtmlDom\HtmlDomParser;

class Crawls
{
    public function getListAttribute($url, $attribute = '', $type = null)
    {
        $dom = $this->getDom($url, $type);
        return $dom->find($attribute);
    }

    public function getDom($link, $type)
    {
        if ($type == 'file') {
            $dom = HtmlDomParser::str_get_html($link);

            return $dom;
        }

        if ($type == 'text') {
            $ch = curl_init($link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec($ch);
            curl_close($ch);

            return $content;
        }

        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2000);
        $content = curl_exec($ch);
        curl_close($ch);

        $dom = HtmlDomParser::str_get_html($content);

        if ($dom == false) {
            $dom = $this->getDom($link, $type);
        }

        return $dom;
    }
}
