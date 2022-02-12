//remove a mensagem de tarefa salva depois de 1 segundos
function alertaMensagem() {
    setTimeout(function () {
        document.getElementById('alerta-mensagem').remove()
        location.href = "index.php"
    }, 1000);

    function alertaMensagemPerfil() {

    }

}
if (document.getElementById('alerta-mensagem')) {
    alertaMensagem()
}

//editar tarefa
function editarTarefa(id, txt_tarefa) {

    //criando um formulario para fazer a edição da tarefa
    let form = document.createElement("form")
    form.action = "tarefa_controller.php?acao=atualizar"
    form.method = "post"
    form.className = "row"
    form.id = "form-editar"

    //criar um input para a entrada do texto 
    let inputTarefa = document.createElement("input")
    inputTarefa.type = "text"
    inputTarefa.name = "tarefa"
    inputTarefa.className = "col-3 inputTarefaAtualizar"
    inputTarefa.value = txt_tarefa

    //criar um input hidden para o id da tarefa
    let inputId = document.createElement("input")
    inputId.type = "hidden"
    inputId.name = "id"
    inputId.value = id

    //criar um button para enviar o formulario
    let button = document.createElement("button")
    button.type = "submit"
    button.className = "col-2 btn btn-info"
    button.innerHTML = "<i class='icones far fa-edit'/>"

    //criar um button para enviar o formulario
    let buttonCancelar = document.createElement("button")
    buttonCancelar.type = "button"
    buttonCancelar.className = "col-2 btn btn-danger"
    buttonCancelar.innerHTML = "<i class='icones far fa-times-circle'/>"



    //incluir inputTarefa no form
    form.appendChild(inputTarefa)

    //incluir inputId no form
    form.appendChild(inputId)

    //incluir button no form
    form.appendChild(button)

    //incluir button cancelar no form
    form.appendChild(buttonCancelar)


    //selecionar a div tarefa
    let tarefa = document.getElementById("tarefa_" + id)

    //limpar o texto da tarefa para a inclusão do form
    tarefa.innerHTML = " "

    tarefa.insertBefore(form, tarefa[0])

    //cancela alterações do form
    buttonCancelar.addEventListener('click', () => {
        tarefa.innerHTML = txt_tarefa
    })

}

//excluir tarefa
function removerTarefa(id) {
    location.href = "tarefa_controller.php?pag=index&acao=remover&id=" + id
}

//marcar tarefa como concluida
function marcarRealizada(id) {
    location.href = "tarefa_controller.php?acao=marcarRealizada&id=" + id

}

//removo do DOM a tarefa com status realizada
function removerRealizadoDOM() {
    var element = document.getElementsByName('realizado'), i;
    for (i = element.length - 1; i >= 0; i--) {
        element[i].remove();
        //console.log(element.length);
    }
}
removerRealizadoDOM()