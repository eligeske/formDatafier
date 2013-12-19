<?php
	if(isset($_GET["r"])){
		print_r($_POST);
		print_r($_FILES);
		exit();	
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>formDatafier example</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="formDatafier.js"></script>
		<style>
			pre { font: 11px/11px Consolas, "Liberation Mono", Courier, monospace; border: 1px solid #DADADA; border-radius: 15px; padding: 10px 20px; background: #E9E9E9; }
		</style>
		<script>
			var myData = {
				myString: "my value",
				myBoolean: true,
				myBoolean2: false,
				object: {myKey: "myValue", mySecondKey: ["array1",'arr2']}, // data[object][mykey] = value
				myArray:["asdfas","asdfasdf"],
			}		
			
			var myFormData;
			
			$(function(){
				$("#file").change(function(){
					myData.myFile = $(this)[0].files[0];
					myData.myFileList = $(this)[0].files;
					myFormData = formDatafier(myData,true); 
					console.log(myFormData);
				});
				$("#send").click(function(){
					var xhr = new XMLHttpRequest();
					xhr.open("POST","example.php?r=sent");  // uploadUrl is url to server
					xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
					xhr.onreadystatechange = function(){
						if(xhr.readyState == 4){
							$('#output').html(xhr.responseText); // Shows in Server Response box for demo
						}
					}
					xhr.send(myFormData);
				});
			});

		</script>
	</head>

	<body>
		<div>
			<input id="file" type="file" />
		</div>
		<button id="send">send</button>
		<pre id="output">response</pre>
	</body>
</html>
