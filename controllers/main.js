/**
 * Metodo que se llamara cuando se cargue la pagina
 */
function onReady() {
    cleanForm();
    statusAutobus();
    statusAsientos();
    selectAsientosVacios();
}

/**
 * Llenar los datos del formulario
 */
function crearDatos() {
    faker.locale = "es_MX";

    $("#inp_name").val(faker.name.firstName);
    $("#inp_first_name").val(faker.name.lastName);
    $("#inp_destiny").val(faker.address.state);
    $("#inp_origin").val(faker.address.state);
    $("#inp_cost").val(faker.commerce.price);
}

/**
 * Metodo que carga el select del formulario con los asientos vacios
 */
function selectAsientosVacios() {
    $.ajax({
        data: {x: "x"},
        type: "POST",
        url: "views/asientos_disponibles.php",
        success: function (response) {
            $("#_select").html(response);
        },
        error: function (data) {

        }
    });
}

/**
 * Muestra los asientos disponibles y vacios del autobus
 */
function statusAutobus() {
    $.ajax({
        data: {x: "x"},
        type: "POST",
        url: "views/autobus_status.php",
        success: function (response) {
            $("#_detatail_bus").html(response);
        },
        error: function (data) {

        }
    });
}

/**
 * Metodo que muestra el status de los asientos
 */
function statusAsientos() {
    $.ajax({
        data: {x: "x"},
        type: "POST",
        url: "views/asientos_status.php",
        success: function (response) {
            $("#_autobus").html(response);
        },
        error: function (data) {

        }
    });
}

/**
 * Función que es llamada por el evento OnClick del Button del formulario
 * Accion: Comprar Boleto
 */
function comprarBoleto() {
    var object = {
        number: $("#inp_number").val(),
        name: $("#inp_name").val(),
        first_name: $("#inp_first_name").val(),
        destiny: $("#inp_destiny").val(),
        origin: $("#inp_origin").val(),
        cost: $("#inp_cost").val()
    };

    $.ajax({
        data: object,
        type: "POST",
        url: "controllers/asiento_comprar.php",
        success: function (response) {
            var obj = JSON.parse(response);
            onReady();
            M.toast({html: obj.msj});
        },
        error: function (response) {

        }
    });
}

/**
 * Obtener la informacación de un asiento
 * @param $numero
 */
function infoAsiento($numero) {
    $.ajax({
        data: {asiento: $numero},
        type: "POST",
        url: "views/asiento_informacion.php",
        success: function (response) {
            $("#_detail").html(response);
        },
        error: function (data) {

        }
    });
}

/**
 * Actualización de datos de un asiento
 */
function actualizarAsiento() {
    var object = {
        number: $("#_inp_number").val(),
        name: $("#_inp_name").val(),
        first_name: $("#_inp_first_name").val(),
        destiny: $("#_inp_destiny").val(),
        origin: $("#_inp_origin").val(),
        cost: $("#_inp_cost").val()
    };

    $.ajax({
        data: object,
        type: "POST",
        url: "controllers/asiento_actualizar.php",
        success: function (response) {
            var obj = JSON.parse(response);
            onReady();
            M.toast({html: obj.msj});
        },
        error: function (response) {

        }
    });
}

/**
 * Elimina a un asiento en especifico
 * @param $number
 */
function eliminarAsiento($number) {
    $.ajax({
        data: {seat: $number},
        type: "POST",
        url: "controllers/asiento_eliminar.php",
        success: function (response) {
            onReady();
        },
        error: function (data) {

        }
    });
}

/**
 * Limpia las cajas de texto (inputs)
 */
function cleanForm() {
    $("#inp_number").val("");
    $("#inp_name").val("");
    $("#inp_first_name").val("");
    $("#inp_destiny").val("");
    $("#inp_origin").val("");
    $("#inp_cost").val("");
}