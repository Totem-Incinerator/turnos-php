document.addEventListener('DOMContentLoaded', function() {
    var modalForm = document.getElementById('modalForm');
    let	form_modal =document.getElementById('form-modal');
	let infoturno =document.querySelectorAll('#info-turno');

	infoturno.forEach((e) => {
		e.addEventListener("click",() =>{
			
			let padre = e.parentElement.parentElement
			let turno = padre.children[0].innerHTML
			let nombrePaciente = padre.children[1].innerHTML
			let apellidoPaciente = padre.children[2].innerHTML
			
			speakTurn(nombrePaciente, apellidoPaciente, turno)
			
		});
	});

    // Create an input element
	const input = document.createElement('input');
	input.setAttribute("name", 'id_turno');
	
    modalForm.addEventListener('show.bs.modal',function(event) {
    	
        var button = event.relatedTarget;
        var turnoId = button.getAttribute('data-id');
		
        // Assign a value to the input element
		input.type ="number";
		input.name="id_turno";
		input.style.display = "none";		
		input.setAttribute("value", `${turnoId}`);

		// Append the input element to the form
		form_modal.appendChild(input);

    });

	function speakTurn(nombre,apellido,turno) {
        const msg = new SpeechSynthesisUtterance();
        msg.text = `Atendiendo turno número: ${turno}. Nombre: ${nombre}${apellido}`;
        window.speechSynthesis.speak(msg);
    }
	
	
});
 
console.log("hola mundo");

