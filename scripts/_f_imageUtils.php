<?php


function generateImageIndex($path)
{
    if(file_exists($path))
    {
       
        $p = opendir($path);
        $count = 1;
        while ($file = readdir($p)) 
        {
    
            if ($file != "." && $file != "..") 
            {
                $count += 1;
            }
        }

        closedir($p);
        return $count;
    }
    else
    {
        return 0;
    }
}

function writeOutImages($id, $path)
{
    if(file_exists($path))
    {
        $p = opendir($path);
        $imageOutput = "";
        while ($file = readdir($p)) {
            
            if ($file != "." && $file != ".." && str_starts_with($file, "tumb")) {
                $imageOutput .= "<span>";
                $imageOutput .= "<a class=\"imageDeleteButton\" href=\"/research_image_delete_doit.php?id=".$id."&path=".$path."/".$file."\" style=\"text-decoration:none;\" onClick=\"return confirm('Are you sure you want to delete image?');\">D</a>";
                $imageOutput .= "<img src='$path/$file'/></span>";
            }
        }

        closedir($p);
        return $imageOutput;
    }
    else
    {
        return "";
    }
    
}

function createtumbnail($folder, $file, $nwidth, $nheight)
{
    $filename = $file;
    $filepath = $folder.$file;
    $abc = imagecreatefrompng($filepath);
    $def = imagecreatetruecolor($nwidth, $nheight);
    $background_color = imagecolorallocate($def, 0, 0, 0);
    list($width, $height, $type, $attr) = getimagesize($filepath);
    imagecopyresized($def, $abc, 1, 1, 0, 0, $nwidth-2, $nheight-2, $width, $height);
    $fh=fopen($folder."tumb_".$filename,'w');
    fclose($fh);
    imagepng($def, $folder."tumb_".$filename, 8);
}

?>