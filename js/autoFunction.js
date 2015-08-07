// autocomplet : this function will be executed every time we change the text
function autocomplet() {

	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#accountNumber').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#form').show();
				$('#form').html(data);
			}
		});
	} else {
		$('#form').hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#accountNumber').val(item);
	// hide proposition list
	$('#form').hide();
}