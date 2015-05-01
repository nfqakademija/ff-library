function initAjaxForm() {
    $(document).on('click', '#book-tab', function (e) {
        var tab = $(this).attr('href');

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('data-link'),
            data: JSON.stringify({
                "type": $(this).attr('data-type')
            }),
            beforeSend: function (xhr) {
                $(tab).html('<center>Prašome palaukti...</center>');
            },
            dataType: "json",
            contentType: "application/json"
        })
            .done(function (data) {
                if (typeof data.message !== 'undefined') {
                    $(tab).html(data.list);
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            });
    });
}


$(document).ready(function () {/* off-canvas sidebar toggle */

    $('[data-toggle=offcanvas]').click(function () {
        $(this).toggleClass('visible-xs text-center');
        $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
        $('.row-offcanvas').toggleClass('active');
        $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
        $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
        $('#btnShow').toggle();
    });
});