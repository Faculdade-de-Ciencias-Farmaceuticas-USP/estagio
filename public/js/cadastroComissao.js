$(document).ready(function() {

    $("#dtIniMandato").mask("99/99/9999");
	$("#dtFimMandato").mask("99/99/9999");

    $("#nusp").blur(function() {	    
	    if ($(this).val().length > 0) {
            $.ajax({
			  url: "/comissao/dadosComissao/"+$(this).val(),
			  method: "GET",
			  success: function( data ) {
				if (data == "Could not connect to host") {
					alert("Sistema em Manutenção, tente novamente mais tarde");
				} else {
                    if (data.length == 0) {
						alert("Erro ao buscar dados de Membro da Comissão, verifique o número digitado.");
						$("#nome").val("");
						$("#email").val("");
						$("#ramal").val("");
						$("#papel").find("option[text=Selecione]").attr("selected", true);
						$(this).trigger("focus");
                        return false;                        
                    }
                    var obj = data;

					if (obj.nome.length > 0) {
						$("#nome").val(obj.nome);
						$("#email").val(obj.email);
						$("#ramal").val(obj.ramal);
                        if (obj.papel.length > 0)
                            $("#papel").find("option[value=" + obj.papel + "]").attr("selected", true);
						$("#papel").trigger("focus");

					} else {
						alert("Erro ao buscar dados de Membro da Comissão, verifique o número digitado.");
						$("#nome").val("");
						$("#email").val("");
						$("#ramal").val("");
						$("#papel").find("option[text=Selecione]").attr("selected", true);
						$(this).trigger("focus");
					}
				}
			   },
			   error: function ( data ) {
					//alert( "Erro: "+data.status+"-"+data.error);
                    alert("Erro ao buscar dados de Membro da Comissão, verifique o número digitado.");
                    $("#nome").val("");
					$("#email").val("");
					$("#ramal").val("");
					$("#papel").find("option[text=Selecione]").attr("selected", true);
					$(this).trigger("focus");
               }
			});
		} else {
		    //alert("O N.o USP do Orientador deve ser informado");
		    $("#nome").val("");
			$("#email").val("");
			$("#ramal").val("");
			$("#papel").find("option[text=Selecione]").attr("selected", true);
						
		}
	});

	$('#cancelar').click(function() {
		window.location.assign("/comissao");
	})

});