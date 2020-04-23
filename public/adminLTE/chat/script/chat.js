function message(text) {
    jQuery('#chat-result').append(text);
}

jQuery(document).ready(function ($) {

    var socket = new WebSocket("ws://ishop3.loc:8090/public/adminLTE/chat/server.php")

    //callback при открытии соединения
    socket.onopen = function () {
        message("<div>Соединение установлено</div>");
    };

    //callback при ошибке
    socket.onerror = function (error) {
        message("<div>Ошибка при соединении" + (error.message ? error.message : "" + "</div>"));
    };

    //callback при закрытии соединения
    socket.onclose = function () {
        message("<div>Соединение закрыто</div>")
    };

    //callback обработки сообщения
    socket.onmessage = function (event) {
        var data = JSON.parse(event.data);
        message("<div>" + data.type + " - " + data.message + "</div>")
    };

    $('#chat').on('submit', function () {
        var message = {
            chat_message: $("#chat-message").val(),
            chat_user: $("#chat-user").val(),
        };

        $("#chat-user").attr("type", "hidden");

        socket.send(JSON.stringify(message));
    })

    $('#chat').submit(function (e) {
        e.preventDefault();
    });

});