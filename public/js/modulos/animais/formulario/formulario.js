$(document).ready(function () {

    $('#btnConfirmar').click(function () {

        // Verifica se a NOME é valido.
		var nome = document.getElementById("nome");		
		if (!verificaTamanho(1, 60, nome.value)) {
			nome.setCustomValidity("Nome com até 60 caracteres.");
		}
		nome.oninput = function (e) {
			nome.setCustomValidity("");
        }
        
        // Verifica se a ESPECIE é valido.

        // Verifica se a RAÇA é valido.
        
        // Verifica se a IDADE é valido.

        // Verifica se a PELAGEM é valido.
        
        // Verifica se a COMPORTAMENTO é valido.
        var comportamento = document.getElementById("comportamento");		
		if (!verificaTamanho(1, 50, comportamento.value)) {
			comportamento.setCustomValidity("Comportamento com até 50 caracteres.");
		}
		comportamento.oninput = function (e) {
			comportamento.setCustomValidity("");
        }   
		
	});
});

function verificaTamanho(min, max, texto) {
	if ((texto.length >= min) && (texto.length <= max)) {
		return true;
	} else {
		return false;
	}
};