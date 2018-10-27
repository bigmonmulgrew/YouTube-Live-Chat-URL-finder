<!DOCTYPE html>
<html>
<body>

<h3>Loading Chat...</h3>
<p>To direct to your own chat visit <i>"http://bigmond.co.uk/p/youtube_chat.php?channel=https://gaming.youtube.com/c/<b>YourChannelName</b>/live"</i></p>

<?php

function get_line_number($splitString, $strSearch) {
    $length = count($splitString);
    for ($i = 0; $i < $length; $i++) {
        if (strpos($splitString[$i], $strSearch) !== false) {
            return $i;
        }
    }
}


//default channel, BigMonMulgrew
if (count($_GET["channel"]) == 0) {
        $youtube_channel = "https://gaming.youtube.com/c/BigMonMulgrew/live";
    }else{
        $youtube_channel = $_GET["channel"];
    }

//Load the Live video page so we can parse it for the unique stream identifier
$html_input = file_get_contents($youtube_channel);

//Split the string into an array that is simpler to work with
$html_split = (explode(" ",$html_input));
//search for a string which is known to preceed the stream identifier.
$search_string = "i.ytimg.com/vi/";
//find teh first line where the stream identifier appears
$line_number = get_line_number($html_split, $search_string);
//Get the string form that line
$line_string = $html_split[$line_number];
echo $line_string;
//take a substring of the line string 11 characters long to get the stream id
$stream_id = substr($line_string,32,11); 
//build the chat url using the stream id.
$chat_url = "https://gaming.youtube.com/live_chat?v=$stream_id&is_popout=1";

//add a javascript redirect to the stream
//echo "$chat_url";
echo '<script type="text/javascript">
          window.location = "' . $chat_url . '"
      </script>';

echo "<br>";
$str="Hello World";
echo trim($str, World);
?>

</body>
</html>