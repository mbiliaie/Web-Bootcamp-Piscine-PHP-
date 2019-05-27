<?php


function remove_id($inFl, $identNum)
{
    if (($nof = fopen($inFl, "r+")) !== FALSE)
    {
        ini_set('auto_detect_line_endings', TRUE);

        $save = tmpfile();

        while (($mtx = fgetcsv($nof, 0, ";")) !== FALSE)
        {
            if ($mtx[0] !== $identNum)
                fputcsv($save, $mtx, ";");
        }

        ftruncate($nof, 0);
        rewind($nof);
        rewind($save);

        while (($txt = fgets($save)) !== FALSE)
        {
            fwrite($nof, $txt);
        }

        fclose($nof);
        fclose($save);
    }
}
function edit_str($inFl, $txt, $identNum)
{
    if (($nof = fopen($inFl, "r+")) !== FALSE)
    {
        ini_set('auto_detect_line_endings', TRUE);

        $save = tmpfile();

        while (($mtx = fgetcsv($nof, 0, ";")) !== FALSE)
        {
            if ($mtx[0] !== $identNum)
                fputcsv($save, $mtx, ";");
            else
                fwrite($save, $txt."\n");
        }

        ftruncate($nof, 0);
        rewind($nof);
        rewind($save);

        while (($txt = fgets($save)) !== FALSE)
        {
            fwrite($nof, $txt);
        }

        fclose($nof);
        fclose($save);
    }
}

?>