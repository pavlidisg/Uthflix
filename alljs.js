	var x = document.getElementsByClassName("sh");

	function showHide(k) {
	  if (x[k].style.display === "none") {
		x[k].style.display = "block";
	  } else {
		x[k].style.display = "none";
	  }
	}

	var slider = document.getElementById("rrange");
	var rate = document.getElementById("rv");
	rate.innerHTML = slider.value;

	slider.oninput = function() {
	  rate.innerHTML = this.value;
	}

	$.ajaxSetup ({
        cache: false
    });
	
    $(document).ready(function(){
        $('#emn').load('shownotification.php');
        setInterval(function(){
            $('#emn').load('shownotification.php');
        },10000); 
    });
	
	var m = document.getElementById("m");
	var s = document.getElementById("s");
	function shm(){
		s.style.display = "none";
		m.style.display = "block";
	}
	function shs(){
		m.style.display = "none";
		s.style.display = "block";
	}