function initBookList() {
    var loader = $('#ajaxList').first();
    ajaxLoad(loader.attr('data-href'), loader.attr('href'));

    $(document).on('click', '#ajaxList', function (e) {
        e.preventDefault();
        var dataLink = $(this).attr('data-href');
        var tab = $('a[data-href="' + dataLink + '"]').attr('href');

        if (tab.length > 1) {
            ajaxLoad(dataLink, tab);
        } else {
            ajaxLoad(dataLink, $('.tab-pane.active'));
        }
    });
}

function ajaxLoad(url, tab) {
    $('.tab-content').addClass('hidden');

    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function () {
            $('.spinner').removeClass('hidden');
        }
    })
        .done(function (data) {
            $('.spinner').addClass('hidden');
            $(tab).html(data.list);
            $('.tab-content').removeClass('hidden');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        });
}

function initRating(rating) {
    $('i.rating').removeClass('text-success text-danger');
    if (rating == 1) {
        $('i.rating.glyphicon-thumbs-up').addClass('text-success');
        $('input[name="rating"]').val(1);
    } else {
        $('i.rating.glyphicon-thumbs-down').addClass('text-danger');
        $('input[name="rating"]').val(2);
    }
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
