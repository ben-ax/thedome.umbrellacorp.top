<?php

$text = strtolower($_GET["text"]);

$pages = array(
"start page" => "/index.php",
"company presentation" => "/index.php?site=company_presentation",
"history" => "/index.php?site=history",
"board of directors" => "/index.php?site=board_of_directors",
"main research facility" => "/index.php?site=main_research_facility",
"cosmetics" => "/index.php?site=cosmetics",
"pharmaceuticals" => "/index.php?site=pharmaceuticals",
"health foods" => "/index.php?site=health_foods",
"consumer products" => "/index.php?site=consumer_products",
"international research" => "/index.php?site=international_research"
);

//$pages = array("start page", "company presentation", "board of directors", "main research facility");
$links = array("/index.php", "/index.php?site=company_presentation", "/index.php?site=board_of_directors","/index.php?site=main_research_facility");
$htmlOutput = "";

foreach ($pages as $pageName => $link)
{
    if (str_starts_with($pageName, $text))
    {
        $htmlOutput .= "<div class=\"searchAnswer\"><a href=\"".$link."\">".ucwords($pageName)."</a></div>";
    }
}

//for($x = 0; $x < count($pages); $x++)
//{
    //if (str_starts_with($pages[$x], $text))
    //{
     //   $htmlOutput .= "<div id=\"test\"><a href=\"".$links[$x]."\">".ucwords($pages[$x])."</a></div>";
    //}
    
//}

echo $htmlOutput;
?>