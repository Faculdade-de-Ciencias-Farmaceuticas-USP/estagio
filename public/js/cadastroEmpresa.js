$(document).ready(function() {

    $('#cnpj').mask('99.999.999/9999-99');
    //011.444.777/0001-61
    $('#cep').mask('99999-999');
    
    $('#tel_representante').mask('(99)9999-9999');
    $('#cel_representante').mask('(99)99999-9999');
    $('#tel_contato_1').mask('(99)9999-9999');
    $('#tel_contato_2').mask('(99)9999-9999');
    $('#cel_contato_1').mask('(99)99999-9999');
    $('#cel_contato_2').mask('(99)99999-9999');
    
    $('#cpf_representante').mask('999.999.999-99');
    $('#cpf_contato_1').mask('999.999.999-99');
    $('#cpf_contato_2').mask('999.999.999-99');

    $("input[name=orgao_publico]").click(function() {
        if ($(this).val() == "S") {
            $('#divDocumentos').hide();
        } else {
            $('#divDocumentos').show();
        }
    });
});