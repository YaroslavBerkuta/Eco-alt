function filterBy(filter_name, all_items) {
    let filter_elements = jQuery(`.shop__filter .shop__filter-item.${filter_name} input:checked`);
    if (filter_elements.length) {
        let filters = [];
        filter_elements.each(function () {
            filters.push(jQuery(this).attr(`data-filter-${filter_name}`).toLowerCase());
        });

        all_items.each(function () {
            if (!filters.includes(jQuery(this).attr(`data-${filter_name}`).toLowerCase())) {
                jQuery(this).hide();
            }
        });
    }
}



function applyFilters() {
    let all_items = jQuery(".shop__main .filter__cart");
    all_items.show();

    filterBy("vendor", all_items);
    filterBy("area", all_items);
    filterBy("mode", all_items);
    filterBy("compressor", all_items);
    filterByPrice(all_items)
}


jQuery('.shop__filter-form input').on("change", function () {
    if (!jQuery(this).hasClass("disabled")) {
        applyFilters();
    }
});



jQuery('.shop__filter-form .shop__filter-item.price .price__value .price__value_min, .shop__filter-form .shop__filter-item.price .price__value .price__value_max').on("change", function () {

    applyFilters();
});



function filterByPrice(all_items) {
    let min_price = Number(jQuery(".shop__filter-form .shop__filter-item.price .price__value .price__value_min").val());
    let max_price = Number(jQuery(".shop__filter-form .shop__filter-item.price .price__value .price__value_max").val());

    all_items.each(function () {
        let current_price = Number(jQuery(this).attr("data-price"));
        if (current_price < min_price || current_price > max_price) {
            jQuery(this).hide();
        }
    });
}





// при клике на кнопки
jQuery('.cart__count-item .quantity input').on( 'click', 'button.plus, button.minus', function() {

    var qty = $(this).parent().find( 'input' ),
        val = parseInt( qty.val() ),
        min = parseInt( qty.attr( 'min' ) ),
        max = parseInt( qty.attr( 'max' ) ),
        step = parseInt( qty.attr( 'step' ) );

    // дальше меняем значение количества в зависимости от нажатия кнопки
    if ( jQuery( this ).is( '.plus' ) ) {
        if ( max && ( max <= val ) ) {
            qty.val( max );
        } else {
            qty.val( val + step );
        }
    } else {
        if ( min && ( min >= val ) ) {
            qty.val( min );
        } else if ( val > 1 ) {
            qty.val( val - step );
        }
    }

});



