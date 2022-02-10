var wpcomment = document.getElementById('htmlInput');

document.getElementById("clickMe").onclick = refreshPreview;

wpcomment.onkeyup = wpcomment.onkeypress = function(){
    document.getElementById('preview').innerHTML = this.value;
}​

function refreshPreview(){
		document.getElementById('preview').innerHTML =  document.getElementById("htmlInput").value;
	}