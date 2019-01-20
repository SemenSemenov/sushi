
function openCart(event) {
    event.preventDefault();
    $.ajax({
        url: '/cart/open',
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function () {
            alert('Ошибка');
        }
    })
}

$('.product-button__add') .on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
        },
        error: function () {
            alert('Ошибка');
        }
    })
});

$('.modal-content') .on('click', '.btn-close', function () {
    $('#cart') .modal('hide');
});

function clearCart(event) {
    if (confirm("Точно очистить корзину?")) {
        event.preventDefault();
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (res) {
                $('#cart .modal-content').html(res);
            },
            error: function () {
                alert('Ошибка');
            }
        })
    }
}

$('.modal-content') .on('click', '.delete', function () {
    let id = $(this).data('id');
    // console.log(id);
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
        },
        error: function () {
            alert('Ошибка');
        }
    })
});