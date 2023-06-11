$(function () {
    //FUNCION PARA GUARDAR COMENTARIO METODO POST
    $('#form-comentario').on('submit', function (e) {
        e.preventDefault();

        var form = this;
        //console.log(form);
        var ruta = $(form).attr('action');
        //console.log("ruta: "+ruta);

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            contentType: false,
            dataType: 'json',

            beforeSend: function () {
                $(form).find('span.error-text').text();
            },

            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    if (data.code == 1) {
                        $.notify(data.msg, "success");
                    } else {
                        $.notify("Tu comentario no se Agrego!!", "error");
                    }
                    console.log(data.msg);
                    fectComentario();
                }
            }
        });
    });

    //TRAENDO LOS COMENTARIOS METODO GET
    fectComentario();
    function fectComentario() {
        //console.log($('#id_post').val());
        id_post = $('#id_post').val()
        $.get('/comentario/fetch/comentarios', { id_post: id_post }, function (data) {
            $('#all-comemts').html(data.result).fadeIn();
        }, 'json');
    }
});