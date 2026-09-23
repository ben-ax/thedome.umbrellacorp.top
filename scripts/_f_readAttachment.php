<?php

function readAttachment($id, $path)
{
    if(file_exists($path))
    {
        $p = opendir($path);
        $output = "<table>";

        while ($file = readdir($p)) {
            
            if ($file != "." && $file != "..") {
                $fileSize = round(filesize($path.$file)/1000000, 2);
                $output .= "<tr>";
                $output .= "<td>".$file."</td>";
                $output .= "<td>".$fileSize." MB</td>";
                $output .= "<td>".date("d.m.Y", filemtime($path.$file))."</td>";
                $output .= "<td><a class=\"\" href=\"/research_image_delete_doit.php?id=".$id."&path=".$path."/".$file."\" style=\"text-decoration:none;\" onClick=\"return confirm('Are you sure you want to delete attachment?');\">D</a></td>";
                $output .= "</tr>";
            }
        }

        closedir($p);
        $output .= "</table>";
        return $output;
    }
    else
    {
        return "";
    }
}

?>