$(document).ready(() => {
    $('#tarefas_realizadas').on('click', () => {
        $('#busca').load('todas_tarefas.php')
    })

    $('#dashboard').on('click', () => {
        $('#busca').load('dashboard.php')
    })

    $('#perfil_usuario_logado').on('click', () => {
        $('#busca').load('perfil_usuario.php')
    })

    $('#sobre').on('click', () => {
        $('#busca').load('sobre.php')
    })

    $('#configuracoes').on('click', () => {
        $('#busca').load('configuracoes.php')
    })

})
