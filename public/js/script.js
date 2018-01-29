$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    var checkCounterpaty = [];
    var getProduct = [];

    $("#checkCounterpaty").on('click', function(e) {
        var url = "products";
        var idCounterpaty = $('#counterpaty option:selected').val();

        if(checkCounterpaty.indexOf(idCounterpaty) === -1) {
            checkCounterpaty.push(idCounterpaty);
            $.ajax({
                type: "POST",
                url: url,
                data: "id =" + idCounterpaty,
                success: function(res) {
                    var products = JSON.parse(res);
                    if(products) {
                        $('.form-order__wrap-items').append('\
                                <div class="form-group form-order__wrap-product">\
                                    <label for="counterpaty">Products: </label>\
                                    <div class="form-order__products">\
                                        <select id="products' + idCounterpaty + '" name="products" class="form-control"></select>\
                                        <button class="btn btn-warning check-product">Ckeck</button>\
                                    </div>\
                                </div>\
                            ');
                        products.forEach(function(valProduct, keyProduct) {
                            $('#products' + idCounterpaty).append('\
                                    <option value=' + valProduct['id'] + '>'
                                        + valProduct['nameProduct'] + ' (' + valProduct['countProduct'] + ')\
                                    </option>\
                                ');
                        });
                    }

                    $('.check-product').on('click', function(e) {
                        console.log($(this).parent().find('select'));
                        $(this).parent().after('\
                                <div class="form-order__count-price">\
                                    <div class="form-group">\
                                        <label for="countProduct">Count: </label>\
                                        <input class="count-price__count" id="countProduct" type="number" name="countProduct">\
                                    </div>\
                                    <span class="count-price__arrow">&rarr;</span>\
                                    <div class="form-group">\
                                        <label for="priceProduct">Price: </label>\
                                        <input class="count-price__price" id="priceProduct" type="text" name="priceProduct">\
                                    </div>\
                                </div>\
                            ');
                        return false;
                    });
                },
                error: function(res) {
                    console.log(res);
                }
            });
        }

        return false;
    });

});