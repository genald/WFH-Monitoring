<?php
// $days = 0;  

  
 

function is_dir_empty($dir) {
    if (!is_readable($dir)) return NULL;
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        return FALSE;
      }
    }
    return TRUE;
  }

function deleteSubDir ($dir) {
    $screenCaptureFolder = $dir . "/screencapture/";
        if (!is_dir($screenCaptureFolder)) {
            return;
        }
        $filesScreenCapture = scandir($screenCaptureFolder);
        foreach ($filesScreenCapture as $k => $v) {
            if ($k < 2) continue;
            unlink ($screenCaptureFolder . $v);
        }
        rmdir($dir . "/screencapture");


        
        $cameraCaptureFolder = $dir . "/cameracapture/";
        if (!is_dir($cameraCaptureFolder)) { 
            return;
        }
        $filesCameraCapture = scandir($cameraCaptureFolder);
        foreach ($filesCameraCapture as $k => $v) {
            if ($k < 2) continue;
            unlink ($cameraCaptureFolder . $v);
        }
        rmdir($dir . "/cameracapture");

}
  
// Open the directory
function removeOld ($path) {
    $days = 5;
        if ($handle = opendir($path))  
    {  
        // Loop through the directory  
        while (false !== ($file = readdir($handle)))  
        { 
            // var_dump($file);
            if ($file == "." || $file == "..") {
                continue;
            }
            // echo "1"; 
            // Check the file we're doing is actually a file
            $dir = $path . "/" . $file;  
            if (is_dir($dir))  
            {
                
                // echo "2"; 
                // Check if the file is older than X days old  
                if (filemtime($dir) < ( time() - ( $days * 60 ) ))  
                {
                    if (is_dir_empty($dir)) {
                        rmdir($dir);
                        continue;
                    } else {
                        deleteSubDir($dir);
                    }
                    // echo "3";
                    // Do the deletion  
                
                rmdir($path . "/" . $file);       
                }
            }  
        }  
    }
}  
  
?>