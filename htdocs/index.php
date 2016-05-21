<?php
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
"http://api.wolframalpha.com/v2/query?input=synonyms+granular&format=plaintext&appid=WK634A-VWAHYRR84P";

$xml = file_get_contents($url, false, $context);
$xml = simplexml_load_string($xml);
print_r($xml);
	
?>

<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
        .hide {
            display: none;
        }

        .show {
            display: block;
        }
        </style>
    </head>

    <body>
        <textarea>yes</textarea>

        <p id="synonyms" class="hide">triggered</p>

	<p id="content"></p>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
    $(function(){
    $(document.body).bind('mouseup', function(e){
        var selection;
        selection = window.getSelection();
        $('#synonyms').show();

	var string = "<?php echo $str?>";
	$('#content').html(string);
      });
    });
    </script>
</html>