jQuery.expr[':'].contains = function(a, i, m) {
  return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
};

$(document).ready(function(){
	var info = $('#loadtime').html();
	$('#load').html(info);

	$('.subchamp img').click(function(){
		/*
			WIP
		*/
		var key = $(this).parent().prop('className');
		key = key.replace('subchamp ', '');
		var name = $(this).next('p').html();
		var title = $(this).next().next('p').html();
		title = title.charAt(0).toUpperCase() + title.slice(1);
		var image = "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/"+ key +"_0.jpg";

		$('#champmodal .modal-header').css("background-image", "url('"+ image +"')");
		$('#champmodal .modal-title').html(name + ' - ' + title);
		$('#champmodal .modal-body').html('< Masteries here >');

		$('#champmodal').modal('show');
	});

	$('#searchfield').keyup(function(){
		var value = $('#searchfield').val();
		$(".subchamp p:not(:contains("+ value +"))").parent().fadeOut('fast');
		$(".subchamp p:contains("+ value +")").parent().fadeIn('fast');
	});
});