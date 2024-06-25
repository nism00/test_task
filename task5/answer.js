
function printOrderTotal(responseString) {
    let responseJSON = JSON.parse(responseString),
        orderSubtotal = 0,
        cost = '';

    $.each(responseJSON, function (index, value) {
        if (value.price) {
            orderSubtotal += value.price;
        }
    });

    cost = orderSubtotal <= 0 ? 'Бесплатно' : `${orderSubtotal} руб.`;

    console.log(`Стоимость заказа: ${cost}`);
}
