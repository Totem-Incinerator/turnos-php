document.addEventListener('DOMContentLoaded', function() {
    var modalForm = document.getElementById('modalForm');
    let	form_modal =document.getElementById('form-modal');
	let infoturno =document.querySelectorAll('#info-turno');

	// console.log(infoturno);

	infoturno.forEach((e) => {
		
		e.addEventListener("click",() =>{
			
			let padre =e.parentElement.parentElement
			console.log(padre.children[2])
			if(localStorage.length ===  0){
				localStorage.setItem("nombre",padre.children[1].innerHTML)
			    localStorage.setItem("apellido",padre.children[2].innerHTML)
			}else{
				localStorage.clear()
				localStorage.setItem("nombre",padre.children[1].innerHTML)
			    localStorage.setItem("apellido",padre.children[2].innerHTML)
			}
			
			
			// let turnoId = e.getAttribute('data-id');
			

		});
	});

	
    // Create an input element
	const input = document.createElement('input');
	input.setAttribute("name", 'id_turno');
	//console.log(input);
	
    modalForm.addEventListener('show.bs.modal',function(event) {
    	//event.preventDefault();
		// localStorage.clear();
		
		console.log(localStorage.length);
        var button = event.relatedTarget;
        var turnoId = button.getAttribute('data-id');
		console.log(button.getAttribute(""))
        // Assign a value to the input element
		input.type ="number";
		input.name="id_turno";
		input.style.display = "none";
		//input.setAttribute("name", 'id_turno');
		input.setAttribute("value", `${turnoId}`);
	// Append the input element to the form
		form_modal.appendChild(input);

       
		speakTurn(localStorage.getItem("nombre"), localStorage.getItem("apellido"), turnoId)

    });

	function speakTurn(nombre,apellido,turno) {
        const msg = new SpeechSynthesisUtterance();
        msg.text = `Atendiendo turno número: ${turno}. Nombre: ${nombre}${apellido}`;
        window.speechSynthesis.speak(msg);
    }
	
	
});
 
console.log("hola mundo");

