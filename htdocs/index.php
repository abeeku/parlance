<?php

$homepage = file_get_contents('http://www.example.com/');

?>

<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
        .hide {
            display: none;
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

	var string = "<?php echo 5?>";
	$('#content').html(string);
      });
    });
    </script>
</html>