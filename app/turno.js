document.addEventListener('DOMContentLoaded', function() {
    var modalForm = document.getElementById('modalForm');
    let	form_modal =document.getElementById('form-modal');
    // Create an input element
	const input = document.createElement('input');
	input.setAttribute("name", 'id_turno');
	//console.log(input);
	
    modalForm.addEventListener('show.bs.modal',function(event) {
    	//event.preventDefault();
        var button = event.relatedTarget;
        var turnoId = button.getAttribute('data-id');
        // Assign a value to the input element
		input.type ="number";
		input.name="id_turno";
		input.style.display = "none";
		//input.setAttribute("name", 'id_turno');
		input.setAttribute("value", `${turnoId}`);
	// Append the input element to the form
		form_modal.appendChild(input);
        //console.log(turnoId);
    });

	function speakTurn(turn) {
		const msg = new SpeechSynthesisUtterance();
		msg.text = `Atendiendo turno número: ${turn.turnType} ${turn.id}. Nombre: ${turn.name} ${turn.surname}`;
		window.speechSynthesis.speak(msg);
	}
	
});
 



