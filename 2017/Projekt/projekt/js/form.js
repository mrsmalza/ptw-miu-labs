$(document).ready(function () {
    $("form").submit(function () {
        return false;
    });

    $("form > input").on("click", function () {
        if ($("form > label > input").val()==""){
            alert("Komentarz jest wymagany");
            return false;
        }
        $.post("action/addcomment.php", {
                id: $(this).parent().children().eq(1).children().val(),
                description: $(this).parent().children().eq(0).children().val()
            },
            function (data, status) {
                alert(status);
                if ($("article").eq(1).children().eq(0).text() === 'Brak komentarzy') {
                    $("article").eq(1).children().eq(0).remove();
                }
                $("article").eq(1).prepend("<div></div>");
                $("article").eq(1).children().eq(0).load("action/loadcomment.php");
            });
    })
});