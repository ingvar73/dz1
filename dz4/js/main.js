$(document).ready(function () {
    $('.block')on('enter', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/action.php',
            data: {
                test: 'dataTest'
            },
            success : function () {

            },
            error : function () {

            },
            dataType: 'json'
        })
    })
})