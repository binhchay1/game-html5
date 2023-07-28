<?php
set_time_limit(0);

const EXTENSION_FILE_LIST = [
    'png', 'jpg', 'jpeg', 'ogg', 'gtz'
];

const IGNORE_EXTENSION_FILE_LIST = [
    'wasm', 'pck'
];

$handle = fopen("list.txt", "r");
$numberCount = 1;
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        try {
            $explodeLine = explode(" - ", $line);
            $gameName = trim($explodeLine[1]);
            $processFile = fopen("process.txt", "w");
            fwrite($processFile, trim($explodeLine[0]));
            fclose($processFile);

            $listResult = json_decode(exec('python process.py'), true);

            foreach ($listResult[0] as $item) {
                echo "-----------bat dau game so " . $numberCount . "---------------- \n";
                if (strpos($gameName, "|")) {
                    $explode = explode("|", $gameName);
                    $gameName = $explode[1];
                    if (strpos($gameName, "-") == 0) {
                        $gameName = substr($gameName, 1);
                    }
                }
                echo "-----------lay ten game - " . $gameName . "---------------- \n";
                mkdirWithPath($gameName);

                foreach ($item as $attr) {
                    if (array_key_exists("name", $attr)) {
                        $url = $attr["name"];
                        $parse = parse_url($url);
                        $explode = explode('/', $parse['path']);
                        $path = generatePath($explode, $gameName);
                        $extensionFile = getExtensionFile(end($explode));

                        if (in_array($extensionFile, EXTENSION_FILE_LIST)) {
                            curl($url, $path, 'file');
                        } else {
                            curl($url, $path);
                        }
                    }
                }

                $urlIndexHtml = end($item);
                getIndexHtml(str_replace(' ', '%20', trim($urlIndexHtml[0])), $gameName);
                echo "-----------done game " . $gameName . " - game so " . $numberCount . "---------------- \n";
            };
            $numberCount++;
        } catch (Throwable $t) {
            $processFile = fopen("error.txt", "a");
            fwrite($processFile, $line . ' - ' . $t . PHP_EOL . PHP_EOL);
            fclose($processFile);
            continue;
        }
    }

    fclose($handle);
}

function curl($url, $path, $type = null)
{
    $ch = curl_init();
    $fp = fopen($path, "w");
    curl_setopt($ch, CURLOPT_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    if ($type == 'file') {
        curl_setopt($ch, CURLOPT_FILE, $fp);

        curl_exec($ch);
        curl_close($ch);

        echo "-----------tao file - " . $path . "---------------- \n";

        fclose($fp);
        return;
    }

    $content = trim(curl_exec($ch));

    fwrite($fp, $content);
    fclose($fp);
    curl_close($ch);
    echo "-----------tao file - " . $path . "---------------- \n";

    return;
}

function generatePath($explode, $gameName)
{
    $path = 'C:\Users\Admin\Desktop\getNetWorkByPython\\' . $gameName;
    $numItems = count($explode);
    $i = 4;

    foreach ($explode as $key => $value) {
        if ($key <= 2) {
            continue;
        }

        $path = trim($path) . '\\' . trim($value);

        if ($i != $numItems) {
            mkdirWithPath($path);
        }

        $i++;
    }

    return $path;
}

function getExtensionFile($fileName)
{
    $array = explode('.', $fileName);
    $extension = end($array);

    return $extension;
}

function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function mkdirWithPath($path)
{
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

function getIndexHtml($url, $gameName)
{
    $parse = parse_url($url);
    $explode = explode('/', $parse['path']);
    $path = generatePath($explode, $gameName);
    curl($url, $path);
}
