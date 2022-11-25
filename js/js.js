ienviar.onclick = function(){
	let nome = window.document.getElementById('inome').value.trim()
	let idade = window.document.getElementById('iidade')
	idade = Number(idade.value)
	let select = document.getElementById('iarea')
	let valorselect = select.options[select.selectedIndex].value
	let caixaexp = document.getElementById('iexperiente')
	let dados = document.getElementById('dados')
	let img = document.getElementById('img')
	let profissao = window.document.getElementById('iprofissao').value.trim()
	let email = document.getElementById('iemail').value
	const regex1 = /[0-9]/
	const regex2 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
	const regex3 = /^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/

	if (!(regex2.test(email))){email = ""}
	exp = 'Não'
	if(caixaexp.checked){
		exp = 'Sim'}
	let controlador = false;
	dados.style.textAlign = "center";
	dados.style.color = 'red';
	switch(true){
		case((nome == "") || regex1.test(nome) || (regex3.test(nome)) || nome.search("<") != -1):
			dados.innerHTML = 'Nome inválido!';
			event.preventDefault()
			break;
		case(idade < 14 || idade >70 || idade%1 != 0):
			dados.innerHTML = 'Idade inválida!';
			event.preventDefault()
			break;
		case ((profissao == "") || regex1.test(profissao) || (regex3.test(profissao)) || profissao.search("<") != -1):
			dados.innerHTML = 'Informe a profissão!';
			event.preventDefault()
			break;
		case(email == ""):
			dados.innerHTML = "Email inválido";
			event.preventDefault()
			break;		
		default:
			controlador = true;
			dados.style.color = 'black';
			dados.style.textAlign = "left";
			break;
	}
	if(controlador){
		dados.innerHTML = `Nome: ${nome}<br>Email: ${email}<br>Idade: ${idade}<br>Profissão: ${profissao}<br>Experiência na área? ${exp}`
		switch(true){
		case(valorselect == 'humanas'):
			img.innerHTML =  "<img src='../imgs/humanas.png'>"; 
			break;
		case(valorselect == 'exatas'):
			img.innerHTML = "<img src='../imgs/exatas.png'>";
			break;
		case(valorselect == 'biologicas'):
			img.innerHTML = "<img src='../imgs/biologicas.png'>";
			break; 
		case(valorselect == 'nenhuma'):
			img.innerHTML = "<img src='../imgs/nenhuma.png'>";
			break; 
		}
	}
	/*else{
		$("#form").submit(function () {
				alert('formulario não foi enviado')
				return false;
		})}*/
}