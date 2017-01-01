function ajax_book_seat(param) {

    var split_param = param.split('|');
	
    console.log(split_param);
    
    $.ajax({
        type: "POST",
        url: "seat_booking_managment/ajax/" + split_param[0] + '/' + split_param[1],
        async: false,
        //data: query_value,
        success: function (res) {
			//alert(res);
			alert('Your seat has booked successfully. You can also Book extra seats by clicking to link.');
            location.reload();
            //$('#flaged').attr('src','http://insights.lenovo.com/sites/all/themes/eco/images/add_favorite_clicked.png');
            
        }
    });
}