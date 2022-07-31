<?php

function censor($string)
{
    if ($string)
    {
        $badwords = file_get_contents("badwords.txt");
        $badwords = explode(",", $badwords);
        $replacewith = array();
        $index = 0;
        foreach ($badwords as $value) {
            $lengthOfStars = strlen($badwords[$index]) - 2;
            $replacewith[$index] = substr($badwords[$index], 0, 1).str_repeat("*", $lengthOfStars).substr($badwords[$index], -1);
            $index++;
        }
        $newstring = str_ireplace($badwords, $replacewith, $string);
        return $newstring;
    }
}

echo censor("Some really bad swear words to remove");

?>