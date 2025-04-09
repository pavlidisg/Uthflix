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
	
	function ccf() {
		var cif = document.createElement("input");
		cif.type = "text";
        cif.name = "cast[]";
        document.getElementById('cf').appendChild(cif);
		document.getElementById('acb').style.display="inline-block";
    }
	
	function cdf() {
		var cif1 = document.createElement("input");
		cif1.type = "text";
        cif1.name = "dirs[]";
        document.getElementById('df').appendChild(cif1);
		document.getElementById('adb').style.display="inline-block";
    }
	
	function cwf() {
		var cif2 = document.createElement("input");
		cif2.type = "text";
        cif2.name = "wrs[]";
        document.getElementById('wf').appendChild(cif2);
		document.getElementById('awb').style.display="inline-block";
    }
	
	function ccf2() {
		var cif3 = document.createElement("input");
		cif3.type = "text";
        cif3.name = "cat[]";
        document.getElementById('cf2').appendChild(cif3);
    }
	
	
	function cep() {
		var epf1 = document.createElement("input");
		var epf2 = document.createElement("input");
		var epf3 = document.createElement("input");
		var epf4 = document.createElement("input");
		var epf5 = document.createElement("input");
		
		var t1 = document.createTextNode("Όνομα επισοδείου : ");
		var t2 = document.createTextNode("Δειάρκεια επισοδείου(ΛΕΠΤΑ): ");
		var t3 = document.createTextNode("Αριθμός επισοδείου: ");
		var t4 = document.createTextNode("Αριθμός Σεζόν: ");
		var t5 = document.createTextNode("ΠΕΡΙΓΡΑΦΗ: ");
		var t6 = document.createElement("br");

		epf1.type = "text";
        epf1.name = "ep_name[]";
		
		epf2.type = "number";
        epf2.name = "ep_dur[]";
		
		epf3.type = "number";
        epf3.name = "ep_num[]";
		
		epf4.type = "number";
        epf4.name = "s_num[]";
		
		epf5.type = "text";
        epf5.name = "ep_des[]";
		
		cnef = document.getElementById("cnef");
		
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
		cnef.appendChild(t1);
        cnef.appendChild(epf1);
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
		
		cnef.appendChild(t2);
		cnef.appendChild(epf2);
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
		
		cnef.appendChild(t3);
		cnef.appendChild(epf3);
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
		
		cnef.appendChild(t4);
		cnef.appendChild(epf4);
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
		
		cnef.appendChild(t5);
		cnef.appendChild(epf5);
		var t6 = document.createElement("br");
		cnef.appendChild(t6);
    }