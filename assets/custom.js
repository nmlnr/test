let farmitoo = farmitoo || {};

farmitoo.deleteItem = {
    init: () => {
        const trashItems$ = $('.js-delete-item');
        if (trashItems$.length) {
            trashItems$.on('click', function () {
                let this$ = $(this);
                if (confirm(this$.data('message'))) {
                    $.post(
                        $(this).data('route'),
                        {}
                    ).done(function (result) {
                        location.reload();
                    });
                }
            });
        }
    }
}

$(function () {
    farmitoo.deleteItem.init();
});