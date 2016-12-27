var main=function(){
	$('.detail').click(function(event){
		console.log($(this).attr('id'));		
	});
}
$(document).ready(main);