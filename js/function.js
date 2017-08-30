
$(document).ready(function() {
  $('.like-toggle').click(function(event) {
    if ($(event.target).hasClass('like')) {
      var item_id = $(this).attr("id");
console.log(item_id+'fsm');
	var dataString = 'item_id='+item_id;  
	$('a#'+item_id).removeClass('like');

	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(data){
		if (data == 0) {
		alert('you have liked this quote before');
		} else {
		$('a#'+item_id).addClass('liked');
		$('a#'+item_id).html(data);
		}
		}  
	});// Call your unlike code, replace like with liked.
    } 
	else {
		var item_id = $(this).attr("id");
	console.log(item_id+"df");
	var dataString = 'item_id='+item_id;  
	$('a#'+item_id).removeClass('liked');

	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(data){
		if (data == 0) {
		alert('you have liked this quote before');
		} else {
		$('a#'+item_id).addClass('like');
		$('a#'+item_id).html(data);
      // Call your like code, replace liked with like.
    }
  }
	});
	}
  });
});