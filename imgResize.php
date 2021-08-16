<?php
    function imageResize($width, $height, $target) 
    {

        //takes the larger size of the width and height and applies the
        //formula accordingly...this is so this script will work
        //dynamically with any size image
        
        if ($width > $height) {
        $percentage = ($target / $width);
        } else {
        $percentage = ($target / $height);
        }
        
        //gets the new value and applies the percentage, then rounds the value
        $width = round($width * $percentage);
        $height = round($height * $percentage);
        
        //returns the new sizes in html image tag format...this is so you
        // can plug this function inside an image tag and just get the
        
        return "width=".$width." height=".$height."";
        
    }
?>