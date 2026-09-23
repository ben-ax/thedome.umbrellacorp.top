<?php
function readtextfile($target)
{
    if(file_exists($target))
    {
        if(!($fp = fopen($target, "r"))) die ("Cannot open $target.");
        $textcontent = fread($fp, filesize($target));
        fclose($fp);
        echo $textcontent;
    }
}
?>
