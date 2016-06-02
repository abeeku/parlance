<?php
if(isset($_POST['word']))
{
	$word = $_POST['word'];
	$wolframUrl = "http://api.wolframalpha.com/v2/query?input=synonyms+" . $word . "&format=plaintext&appid=WK634A-VWAHYRR84P";
	
	
	$rawstring = file_get_contents($wolframUrl);
	
	echo $rawstring;
	
	
	exit;
    
	
}

?>



<!DOCTYPE HTML>
<html>
    <head>
	<title>Parlance</title>
	<link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <style type="text/css">
	header {
	    padding: 1.5rem 0;
	    border-bottom: 1px solid #aaa;
	    margin-bottom: 1rem;
	}

	h1 {
	    text-align: center;
	    font: bold 2.5rem/1em PT Serif;
	}

	#container {
	    width: 90%;
	    margin: 0 auto;
	}

	textarea {
	    width: 68%;
	    outline: none;
	    border: none;
	    font-family: PT Serif;
	    font-size: 1.65rem;
	    float: left;
	}
	
	
	

	#synonyms {
	    width: 28%;
	    background: rgba(0,0,0,.15);
	    padding: .5rem;
	    float: right;
	}

	/*.clearfix:after {
	    visibility: hidden;
	    display: block;
	    font-size: 0;
	    content: " ";
	    clear: both;
	    height: 0;
	}*/
	
	iframe {
	    display: block;
	}
        </style>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>

    <body>
	<header>
	    <h1>Parlance</h1>
	</header>

	<div id="container">
	<form action="" method="post">
	    <textarea style="border:1px dashed blue;">quick brown fox jumped over the lazy dog</textarea>
		</form >
		<div id="share"><div>
	    
	    </p>
	</div>

	
	<ul>
	</ul>
	<!--<div class="clearfix"></div>-->
<!--
	<div class="dropdown">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown trigger
    <span class="caret"></span>
  </button>
  <ul id="dropdown" class="dropdown-menu" aria-labelledby="dLabel">
    
  </ul>
</div>-->
	</body>

    
    <script>
	
	var returndata ="...";
	var update = true;
	var txt, parser, xmlDoc;
    parser = new DOMParser();
	window.setInterval(function(){
		
		
  $('#share').html($('textarea').val());
}, 1000);

	
	$('#container').append("<div class=\"dropdown\">\n  <button id=\"dLabel\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n    Dropdown trigger\n    <span class=\"caret\"></span>\n  </button>\n  <ul id=\"dropdown\" class=\"dropdown-menu\" aria-labelledby=\"dLabel\">\n    \n  </ul>\n</div>");

	    $('#share').mouseup(function() {
      //  alert(getSelectedText());
		// var word;
   //     word = getSelectedText();

	//var wolframUrl = 'http://api.wolframalpha.com/v2/query?input=synonyms+' + selection + '&format=plaintext&appid=WK634A-VWAHYRR84P';
	

$.ajax({
    type: "POST",
    
	
    data: { word: getSelectedText().replace(" ","") },
    success: function(data){
         //alert(data)
		 returndata = data;
		 
		 var txt = returndata;
      
xmlDoc = parser.parseFromString(txt,"text/xml");
	
    
    var x = xmlDoc.getElementsByTagName('plaintext')[1];
	
   // alert(x);
   //document.getElementById("demo").innerHTML = xmlDoc.getElementsByTagName('plaintext')[1].childNodes[0].nodeValue;
//document.getElementById("demo").innerHTML = x.childNodes[0].nodeValue;
console.log(xmlDoc.getElementsByTagName('plaintext')[1].childNodes[0].nodeValue)
var str = x.childNodes[0].nodeValue;

 str = str.replace("(total: )", "");
var array = str.split("|");
$('#dropdown').empty(); 
jQuery.each( array, function( i, val ) {
	 
   $("#dropdown").append( '<li><a onclick=\"doWork('+'"'+ val+'"' +')> '+ val + '\</a></li>' );
  
});
		
    }
});
		});

	/*
	$.get( "index.php", { word: getSelectedText()},
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        }); 
		 });
	*/
	

    function getSelectedText() {
        if (window.getSelection) {
            return window.getSelection().toString();
        } else if (document.selection) {
            return document.selection.createRange().text;
        }
        return '';
    }
	
	//function changeWord(newword) {
	//	bbrep(newword);
	//}
	
	function doWork(val) {
			
		$("#share").html($("#share").text().replace(getSelectedText(),val));
		
	}
	



	
  //$.(function(){
   // $.(document.body).bind('mouseup', function(e){
    //    var word;
    //    word = window.getSelection();

	//var wolframUrl = 'http://api.wolframalpha.com/v2/query?input=synonyms+' + selection + '&format=plaintext&appid=WK634A-VWAHYRR84P';
//	$.get( "index.php", { word: word} );
	
	
	//$('#synonyms').show();
	// var string = "<?php echo 5?>";
	// $('#synonyms').html(string);

	// var iframe = $('#rawxml');
	// var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
	
	//alert(wolframUrl);
   //   });
  //  })*/
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</html>