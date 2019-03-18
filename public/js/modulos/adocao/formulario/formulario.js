$(document).ready(function () {

	$('#btnConfirmar').click(function () {

		// Verifica se a NOME é valido.
		var nome = document.getElementById("nome_adocao");
		console.log(nome.value);
		
		if (!verificaTamanho(1, 10, nome.value)) {
			nome.setCustomValidity("Nome com até 60 caracteres.");
		}
		nome.oninput = function (e) {
			nome.setCustomValidity("");
		}

		// Verifica se a DATA é valida.
		var data = document.getElementById("nascimento_adocao");
		if (!validarData(data.value)) {
			data.setCustomValidity("Data Invalida");
		}
		data.oninput = function (e) {
			data.setCustomValidity("");
		}

		// Verifica se o TELEFONE é valido.
		var telefone = document.getElementById("telefone_adocao");
		if (!validarTelefone(telefone.value)) {
			telefone.setCustomValidity("Telefone Invalido");
		}
		telefone.oninput = function (e) {
			telefone.setCustomValidity("");
		}

		// Verifica se a EMAIL é valido.
		var email = document.getElementById("email_adocao");
		if (!verificaTamanho(1, 50, email.value)) {
			email.setCustomValidity("E-mail com até 50 caracteres.");
		}
		email.oninput = function (e) {
			email.setCustomValidity("");
		}

		// Verifica se o CPF esta valido.
		var cpf = document.getElementById("cpf_adocao");
		if (!validarCPF(cpf.value)) {
			cpf.setCustomValidity("CPF Invalido");
		}
		cpf.oninput = function (e) {
			cpf.setCustomValidity("");
		}

		// Verifica se o CEP é valido
		var cep = document.getElementById("cep_adocao");
		if (!pesquisaCEP(cep.value)) {
			cep.setCustomValidity("CEP Invalido");
		}
		cep.oninput = function (e) {
			cep.setCustomValidity("");
		}

		// Verifica se a EMAIL é valido.
		var email = document.getElementById("email_adocao");
		if (!verificaTamanho(1, 50, email.value)) {
			email.setCustomValidity("E-mail com até 50 caracteres.");
		}
		email.oninput = function (e) {
			email.setCustomValidity("");
		}

		// Verifica se a RUA é valido.
		var rua = document.getElementById("rua_adocao");
		if (!verificaTamanho(1, 30, rua.value)) {
			rua.setCustomValidity("Rua com até 30 caracteres.");
		}
		rua.oninput = function (e) {
			rua.setCustomValidity("");
		}

		// Verifica se a NUMERO é valido.
		var numero = document.getElementById("numero_adocao");
		if (!verificaTamanho(1, 10, numero.value)) {
			numero.setCustomValidity("Numero com até 10 caracteres.");
		}
		numero.oninput = function (e) {
			numero.setCustomValidity("");
		}

		// Verifica se a BAIRRO é valido.
		var bairro = document.getElementById("bairro_adocao");
		if (!verificaTamanho(1, 150, bairro.value)) {
			bairro.setCustomValidity("Bairro com até 150 caracteres.");
		}
		bairro.oninput = function (e) {
			bairro.setCustomValidity("");
		}

		// Verifica se a CIDADE é valido.
		var cidade = document.getElementById("cidade_adocao");
		if (!verificaTamanho(1, 150, cidade.value)) {
			cidade.setCustomValidity("Cidade com até 150 caracteres.");
		}
		cidade.oninput = function (e) {
			cidade.setCustomValidity("");
		}

		// Verifica se a ESTADO é valido.
		var estado = document.getElementById("estado_adocao");
		if (!verificaTamanho(1, 150, estado.value)) {
			estado.setCustomValidity("Estado com até 150 caracteres.");
		}
		estado.oninput = function (e) {
			estado.setCustomValidity("");
		}

	});
});

function validarData(data) {
	var RegExPattern = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
	if (!((data.match(RegExPattern)) && (data != ''))) {
		return false;
	}
	else {
		return true;
	}
}

function validarTelefone(telefone) {
	if ((telefone.length >= 14) && (telefone.length <= 15)) {
		return true;
	} else {
		return false;
	}
}

function validarCPF(cpf) {
	cpf = cpf.replace(/[^\d]+/g, '');
	if (cpf == '') return false;
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 ||
		cpf == "00000000000" ||
		cpf == "11111111111" ||
		cpf == "22222222222" ||
		cpf == "33333333333" ||
		cpf == "44444444444" ||
		cpf == "55555555555" ||
		cpf == "66666666666" ||
		cpf == "77777777777" ||
		cpf == "88888888888" ||
		cpf == "99999999999")
		return false;
	// Valida 1o digito	
	add = 0;
	for (i = 0; i < 9; i++)
		add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
		return false;
	// Valida 2o digito	
	add = 0;
	for (i = 0; i < 10; i++)
		add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
		return false;
	return true;
}

function limpaFormularioEndereco() {
	//Limpa valores do formulário de cep.
	document.getElementById('rua_adocao').value = ("");
	document.getElementById('bairro_adocao').value = ("");
	document.getElementById('cidade_adocao').value = ("");
	document.getElementById('estado_adocao').value = ("");
}

function preencheEndereco(conteudo) {
	if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('rua_adocao').value = (conteudo.logradouro);
		document.getElementById('bairro_adocao').value = (conteudo.bairro);
		document.getElementById('cidade_adocao').value = (conteudo.localidade);
		document.getElementById('estado_adocao').value = (conteudo.uf);
	} //end if.
	else {
		//CEP não Encontrado.
		limpaFormularioEndereco();
		return false;
	}
}

function pesquisaCEP(valor) {

	//Nova variável "cep" somente com dígitos.
	var cep = valor.replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
	if (cep != "") {

		//Expressão regular para validar o CEP.
		var validacep = /^[0-9]{8}$/;

		//Valida o formato do CEP.
		if (validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('rua_adocao').value = "...";
			document.getElementById('bairro_adocao').value = "...";
			document.getElementById('cidade_adocao').value = "...";
			document.getElementById('estado_adocao').value = "...";

			//Cria um elemento javascript.
			var script = document.createElement('script');

			//Sincroniza com o callback.
			script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=preencheEndereco';

			//Insere script no documento e carrega o conteúdo.
			document.body.appendChild(script);

			return true;

		} //end if.
		else {
			//cep é inválido.
			limpaFormularioEndereco();
			return false
		}
	} //end if.
	else {
		//cep sem valor, limpa formulário.
		limpaFormularioEndereco();
	}
}

function verificaTamanho(min, max, texto) {
	if ((texto.length >= min) && (texto.length <= max)) {
		return true;
	} else {
		return false;
	}
};