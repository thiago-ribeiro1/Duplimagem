$(function () {
    $('#send').click(function (e) {
        // Impedir o envio do formulário e verificar a validação
        e.preventDefault();

        // Variáveis
        var error = false;
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var message = $('#message').val();

        // Validação do e-mail
        if (email.length == 0 || email.indexOf('@') == -1) {
            error = true;
            $('#email').parent().addClass('has-error has-feedback');
        } else {
            $('#email').parent().removeClass('has-error has-feedback');
        }

        // Validação do nome
        if (name == '') {
            error = true;
            $('#name').parent().addClass('has-error has-feedback');
        } else {
            $('#name').parent().removeClass('has-error has-feedback');
        }

        // Validação da mensagem
        if (message == '') {
            error = true;
            $('#message').parent().addClass('has-error has-feedback');
        } else {
            $('#message').parent().removeClass('has-error has-feedback');
        }

        // Se não houver erro de validação, processar a função de envio de e-mail
        if (!error) {
            // Desabilitar o botão de envio após o processamento bem-sucedido do formulário pela primeira vez
            $('#send').prop({ 'disabled': true, 'value': 'Enviando' });

            // Função Ajax para enviar os dados para email.php
            $.post("php/email.php", $("#form").serialize(), function (result) {
                if (result == 'sent') {
                    // Se o e-mail for enviado com sucesso, remover o botão de envio
                    $('#send').prop({ 'disabled': true, 'value': 'Obrigado!' });
                } else {
                    // Se houver algum problema, reativar o botão de envio
                    $('#send').prop({ 'disabled': false, 'value': 'Enviar' });
                }
            });
        }
    });
});
