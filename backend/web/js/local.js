/* 
 * Script jQuery com funções genéricas
 * usado em quase todas as páginas
 */

$(document).ready(function () {

    $('input, select, textarea').on('blur', function () {
        rm_acentos_caps($(this));
    });

    // Controle dos campos dinâmicos de contatos e tabelas
    jQuery(".dynamicform_wrapper").on("afterInsert afterDelete", function (e, item) {
        jQuery(".dynamicform_wrapper .panel-title-contato").each(function (index) {
            jQuery(this).html("Pessoa: " + (index + 1));
            // Passa todos os valores de input para maiusculo removendo acentos
            $('input, select, textarea').on('blur', function () {
                rm_acentos_caps($(this));
            });
        });
    });

    // Função que remove acentos e caps formulario
    function rm_acentos_caps(campo) {
        var valor = campo.val().replace(/[áàâãÁÀÂÃ]/g, 'a').replace(/[éèêẽÉÈÊẼ]/g, 'e').replace(/[íìîĩÍÌÎĨ]/g, 'i').replace(/[óòôõÓÒÔÕ]/g, 'o').replace(/[úùûũüÚÙÛŨÜ]/g, 'u').replace(/[çÇ]/g, 'c').toUpperCase();
        campo.val(valor);
    }

});