$(document).ready(function() {
    var totalfin = 0;
    var one = false;
    $("#addfoto").click(function() {
        if (!one) {
            $("#tabla").append("<tr><td><input class='uno' type='text'></td><td><button class='guardar'>guardar</button></td></tr>");
            one = true;
            var p = parseInt($("#tabla").children().length) - 1;
            $($("#tabla").children()[p]).children(".uno").focus(); //coloca el foto en el imput 1 creado
        }

    });

    $(Document).on("click", ".guardar", function() { //se pone asi para que funcione bien puesto que es un html indexado despues de la creacion de la pagina
        if ($(this).parent().parent().find(".uno").val()) {
            //$(this).parent().children(".tres").val() forma uno
            var id = $(".idProducto").val();
            var nombre = $(this).parent().find(".uno").val(); //forma dos
            $(this).parent().children(".uno").toggle();

            one = false;
            $.ajax({
                url: "guardarImg.php",
                type: "POST",
                data: { "id": id, "nombre": nombre },
                success: function(result) {
                    alert("se guardo bien ");
                }
            });
            //$(location).attr('href', "guardarImg.php?id="+nombre);
        }
        alert("campo vacio ");

    });
});