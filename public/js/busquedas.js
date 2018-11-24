$(document).ready(function () {
    $('#bus-familia').hide()
    $('#bus-dispositivo').hide()
    $('#btn-bus-familia-hide').hide()
    $('#btn-bus-dispositivos-hide').hide()

    $('#btn-bus-familia').on('click',function () {
        $('#bus-familia').show()
        $('#btn-bus-familia-hide').show()
        $('#btn-bus-familia').hide()
    })
    $('#btn-bus-dispositivos').on('click',function () {
        $('#bus-dispositivo').show()
        $('#btn-bus-dispositivos-hide').show()
        $('#btn-bus-dispositivos').hide()
    })
    var values = new Array();
    $('#bus-familia').children('option').each(function() {
        var text = $(this).text();
        if (values.indexOf(text) === -1) {
            values.push(text);
        } else {
            //  Its a duplicate
            $(this).remove()
        }
    })
    $('#bus-familia').on('change',function () {
        /*$('#bus-dispositivo').hide()
        $('#btn-bus-dispositivo').show()
        $('#btn-bus-dispositivos-hide').hide()*/
        var value = $(this).val().toUpperCase();
        //console.log(value);
        $('#my_table tr').filter(function(){
            $(this).toggle($(this).text().indexOf(value) > -1)
        })
    })
    $('#bus-dispositivo').on('keyup',function () {
        /*$('#bus-familia').hide()
        $('#btn-bus-familia-hide').hide()*/
        var value = $(this).val().toUpperCase();
        //console.log(value);
        $('#my_table tr').filter(function(){
            $(this).toggle($(this).text().indexOf(value) > -1)
        })
    })
    $('#bus-device').on('keyup',function () {
        /*$('#bus-familia').hide()
        $('#btn-bus-familia-hide').hide()*/
        var value = $(this).val().toUpperCase();
        //console.log(value);
        $('#my_table tr').filter(function(){
            $(this).toggle($(this).text().indexOf(value) > -1)
        })
    })
    $('#btn-bus-familia-hide').on('click',function () {
        $('#bus-familia').hide()
        $('#btn-bus-familia-hide').hide()
        $('#btn-bus-familia').show()
    })
    $('#btn-bus-dispositivos-hide').on('click',function () {
        $('#bus-dispositivo').hide()
        $('#btn-bus-dispositivos-hide').hide()
        $('#btn-bus-dispositivos').show()
    })
    $('#bus-familias').on('keyup',function(){
        var value = $(this).val().toUpperCase();
        $('#familias .comenzar').filter(function(){
            $(this).toggle($(this).text().indexOf(value) > -1)
        })
    });
    $('.boton-ver-item').on('click',function (e) {
        var value = this['href'];
        //console.log(value);
        $.get( value, function( data ) {
            $('#nombre-item').text(data["item"]["NOMBRE"]);
            $('#cod_act').attr('value',data["item"]["CODIGO_ACTIVO"]);
            $('#cod_saf').attr('value',data["item"]["CODIGO_SAF"]);
            $('#ip').attr('value',data["item"]["IP"]);
            $('#usuario').attr('value',data["item"]["USUARIO_ALIAS"]);
            $('#pass').attr('value',data["item"]["PASSWORD_D"]);
            //console.log(data["item"]);
            //console.log(data);
        });

    })
    function busqHistoricos(){
        $('#bus-historico').hide()
        $('#btn-bus-historico').on('click',function () {
            $('#bus-historico').slideToggle()
        })
        $('#bus-historico').on('keyup',function () {
            var value = $(this).val().toUpperCase()
            $('#my_table tr ').filter(function () {
                $(this).toggle(
                    $(this).text().indexOf(value) > -1
                )
            })
        })
    }
    busqHistoricos();

})