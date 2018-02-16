$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    var fullUrl = window.location.href;
    var orderCreate = fullUrl.slice(fullUrl.indexOf('?')+1,fullUrl.length);

    if(orderCreate === 'buyer') {
        var idCounterpaties = [];
        var products;
        var options = $('#counterpaty').find('option');

        if(options.length > 0) {
            for(var count = 0; count < options.length; count++) {
                idCounterpaties.push($(options[count]).val());
            }
        }

        $.ajax({
            type: "POST",
            url: orderCreate,
            data: "idCounterpaties=" + JSON.stringify(idCounterpaties),
            success: function(res) {
                 products = JSON.parse(res);
                 console.log(products);
            },
            error: function(res) {
                console.log('error');
            }
        });
    }

    if(orderCreate === 'provider') {
        var checkCounterpaty = [];
        var checkProduct = [];
        var idCounterpaties = [];
        var pruducts;
        var options = $('#counterpaty').find('option');

        if(options.length > 0) {
            for(var count = 0; count < options.length; count++) {
                idCounterpaties.push($(options[count]).val());
            }
        }

        $.ajax({
            type: "POST",
            url: orderCreate,
            data: "idCounterpaties=" + JSON.stringify(idCounterpaties),
            success: function(res) {
                products = JSON.parse(res);
            },
            error: function(res) {
                console.log('error');
            }
        });

        $("#checkCounterpaty").on('click', function(e) {
            e.preventDefault();
            var idCounterpaty = $('#counterpaty option:selected').val();

            if(checkCounterpaty.indexOf(idCounterpaty) !== -1) {
                return false;
            }

            checkCounterpaty.push(idCounterpaty);

            if(products[idCounterpaty]) {
                $('.form-order__wrap-items').append('\
                        <div class="form-group form-order__wrap-product">\
                            <label for="counterpaty">Products: </label>\
                            <div class="form-order__products">\
                                <select id="products' + idCounterpaty + '" class="form-control"></select>\
                                <button class="btn btn-warning check-product">Ckeck</button>\
                            </div>\
                        </div>\
                    ');
                products[idCounterpaty].forEach(function(valProduct, keyProduct) {
                    $('#products' + idCounterpaty).append('\
                            <option data-price=' + valProduct['priceProduct'] + ' value=' + valProduct['idProduct'] + '>'
                                + valProduct['nameProduct'] + ' (' + valProduct['countProduct'] + ')\
                            </option>\
                        ');
                });
            }

            $('.check-product').on('click', function(e) {
                e.preventDefault();
                var idProduct = $(this).siblings('select').find('option:selected').val();
                var priceProduct = $(this).siblings('select').find('option:selected').data('price');
                var nameProduct = $(this).siblings('select').find('option:selected').text();

                if(checkProduct.indexOf(idProduct) !== -1) {
                    return false;
                }

                checkProduct.push(idProduct);

                $(this).parent().after('\
                        <h3 style="text-align: center;">' + nameProduct + '</h3>\
                        <div class="form-order__count-price">\
                            <div class="form-group">\
                                <label for="countProduct">Count: </label>\
                                <input type="hidden" name="idProduct[]" value="' + idProduct + '" />\
                                <input class="count-price__count" type="number" name="countProduct[]">\
                            </div>\
                            <span class="count-price__arrow">&rarr;</span>\
                            <div class="form-group">\
                                <label for="priceProduct">Price: </label>\
                                <input class="count-price__price" type="text" disabled>\
                            </div>\
                        </div>\
                    ');
                    $('.count-price__count').on('blur', function() {
                        var count = $(this).val();
                        $(this).parent().parent().find('.count-price__price').val(count*priceProduct);
                    });
                return false;
            });

            return false;
        });
    }

});