<?php
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/newstyle.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<meta charset="utf-8">
<title>Dash | Web Editor</title>
</head>
<body>
<div class="form">

<div style="margin:20px;"><span style="font-size:20px">Welcome</span><br><span style="font-size:50px;"><?php echo $_SESSION['username']; ?>!</span></div>

<script type="text/javascript">

	var wpcomment = document.getElementById('htmlInput');
	var bgColor = 'white';
	
	function refreshPreview(){
		document.getElementById('preview').innerHTML =  document.getElementById("htmlInput").value;
	}
	
	$(function() {
	  $('#saveToFile').click(function(e) {
		var data = document.getElementById('htmlInput').value;
		var fname = document.getElementById('filename').value;
		
		
		var staticdata = "<!DOCTYPE html>\n<html>\n<head><title>\n" + fname + "\n</title></head>\n<body background='" + bgColor + "'>\n" + data + "\n</body>\n</html>"; 
		var data = 'data:application/csv;charset=utf-8,' + encodeURIComponent(staticdata);
		
		var el = e.currentTarget;
		el.href = data;
		el.target = '_blank';
		el.download = fname +'.html';
	  });
	});
	
	function boldText(){
		//var selectionText = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionStart, document.getElementById("htmlInput").selectionEnd);
		//document.getElementById("htmlInput").value = "<b>" + selectionText + "</b>";
	
		var start = document.getElementById("htmlInput").selectionStart;

		var finish = document.getElementById("htmlInput").selectionEnd;

		var sel = document.getElementById("htmlInput").value.substring(start, finish);

	
		var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		document.getElementById("htmlInput").value = textBeforeSelection + "<b>" + sel + "</b>" + textAfterSelection;
	}
	
	function italicsText(){

		var start = document.getElementById("htmlInput").selectionStart;
		var finish = document.getElementById("htmlInput").selectionEnd;
		var sel = document.getElementById("htmlInput").value.substring(start, finish);

		var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		document.getElementById("htmlInput").value = textBeforeSelection + "<i>" + sel + "</i>" + textAfterSelection;
	}
	
	function underlineText() {
		var start = document.getElementById("htmlInput").selectionStart;
		var finish = document.getElementById("htmlInput").selectionEnd;
		var sel = document.getElementById("htmlInput").value.substring(start, finish);
	
		var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		document.getElementById("htmlInput").value = textBeforeSelection + "<u>" + sel + "</u>" + textAfterSelection;
	}
	
	function insertLine() {
		var size = prompt("Enter the line size", 2);
		var color = prompt("Enter the color", "green");

		if (size != null && color != null) {
		  var start = document.getElementById("htmlInput").selectionStart;
		  var finish = document.getElementById("htmlInput").selectionEnd;
		  var sel = document.getElementById("htmlInput").value.substring(start, finish);
	
		  var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		  var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		  document.getElementById("htmlInput").value = textBeforeSelection + sel + "<hr size=" + size + " color='" + color + "'>" + textAfterSelection;
		} 
	}
	
	function insertTable() {
		var rows = prompt("Enter number of rows", 3);
		var cols = prompt("Enter number of columns", 3);

		if (rows != null && cols != null) {
		  var start = document.getElementById("htmlInput").selectionStart;
		  var finish = document.getElementById("htmlInput").selectionEnd;
		  var sel = document.getElementById("htmlInput").value.substring(start, finish);
		  
		  var inputTable = "<table border='1'>\n";
		  for (var i=0;i < rows;i++){
			  inputTable += "<tr>\n";
			  for (var j=0;j < cols;j++){
				  inputTable += "<td>Insert Data here...</td>\n";
			  }
			  inputTable += "</tr>\n";
		  }
		  inputTable += "</table>";
		  
		  //inputTable = inputTable.replace(/\r?\n/g, '<br />');
	
		  var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		  var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		  document.getElementById("htmlInput").value = textBeforeSelection + sel + inputTable + textAfterSelection;
		} 
	}
	
	
	
	function changeSize(){
		var size = prompt("Enter the font size", 14);

		if (size != null) {
		  var start = document.getElementById("htmlInput").selectionStart;
		  var finish = document.getElementById("htmlInput").selectionEnd;
		  var sel = document.getElementById("htmlInput").value.substring(start, finish);
	
		  var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		  var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		  document.getElementById("htmlInput").value = textBeforeSelection + "<font size=" + size + ">" + sel + "</font>" + textAfterSelection;
		} 
	}
	
	function changeBackgroundColor(){
		var color = prompt("Enter the color", "#1a1a1a");

		if (color != null) {
		  bgColor = color;
		  document.getElementById("preview").style.backgroundColor = color; 
		} 
	}
	
	function changeColor(){
		var size = prompt("Enter the color", "green");

		if (size != null) {
		  var start = document.getElementById("htmlInput").selectionStart;
		  var finish = document.getElementById("htmlInput").selectionEnd;
		  var sel = document.getElementById("htmlInput").value.substring(start, finish);
	
		  var textBeforeSelection = document.getElementById("htmlInput").value.substr(0, document.getElementById("htmlInput").selectionStart);
		  var textAfterSelection = document.getElementById("htmlInput").value.substr(document.getElementById("htmlInput").selectionEnd, document.getElementById("htmlInput").value.length);
		  document.getElementById("htmlInput").value = textBeforeSelection + "<font color='" + size + "'>" + sel + "</font>" + textAfterSelection;
		} 
	}
	
</script>

<table>

	<tr>
		<td>
			<input type="button" style="padding:10px;" value=" B " onclick="boldText();" />
			<input type="button" style="padding:10px;" value=" I " onclick="italicsText();" />
			<input type="button" style="padding:10px;" value=" U " onclick="underlineText();" />
			<input type="button" style="padding:10px;" value="Change Text Size" onclick="changeSize();" />
			<input type="button" style="padding:10px;" value="Change Text Color" onclick="changeColor();" />
			<input type="button" style="padding:10px;" value="Insert Line" onclick="insertLine();" />
			<input type="button" style="padding:10px;" value="Insert Table" onclick="insertTable();" />
			<input type="button" style="padding:10px;" value="Background Color" onclick="changeBackgroundColor();" /><br>
			<input type="text" name="filename" style="width:150px;" value="firstfile" id="filename"/>.html
			<a  id="saveToFile" style="background-color:#03fcf8;border-radius:10px;borders:none;padding:20px;color:#003837;">
				Save My Website
			</a>
		</td>
		<td>
			<span style="font-size:30px;vertical-align: middle;">PREVIEW</span> <input type="button" style="padding:10px;margin-left:20px;" id="clickMe" value="Refresh" onclick="refreshPreview();" />
		</td>
	</tr>

	<tr>
		<td>
			<!--<form onSubmit="WriteToFile(this)">-->
				<textarea id="htmlInput" name="htmlInput" placeholder="Enter your html code here..." spellcheck="false" onkeypress="document.getElementById('preview').innerHTML = this.value" rows="50" cols="100"></textarea><br>
				<!--<input type="submit" value="submit">
			</form>-->
		</td>
		<td id="preview">
			<!--<div id="preview"></div>-->
		</td>
	</tr>
</table>

<center>
	<footer>
		<a href="login.php">Logout</a><br>
		<span style="color:#575757;">Designed and Developed by Shahabas Shakeer</span>
	</footer>
</center>

</div>
</body>
</html>