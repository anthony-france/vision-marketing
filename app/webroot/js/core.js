$(document).ready(function() {
	$("#content").on('click', "a.addtag", function(event){
		event.preventDefault();
		
		//alert($(this).parent().find("div.add-form").is(":visible"));
		
		if ($(this).parent().find("div.add-form").is(":visible")) {
			$(this).parent().find("div.add-form").hide("slide", {direction:'left'}, 250);
		}
		else {
			$(this).parent().find("div.add-form").show("slide", {direction:'left'}, 250);
		}	
	});
	
	$("#content").on('submit', '.add-tag-doc', function() {
	
		$.post(
			"/documents/tagged", 
			$(this).serialize(), 
			function(data) {
				var element = "#tags-for-" + data.object_id;
				$(element).find(".add-form").hide("slide", {direction:'left'}, 250);
				
				if (data.create) {
					$(element).prepend('<a href="/tags/view/' + data.tag_id + '"><span class="label">' + data.label + '</span></a>'); 	
				}
				else {
				
				}
				
			}, 'json'	
		);
		return false;
	});
	
		
	$("#content").on('submit', '.add-tag-img', function() {
		
		$.post(
			"/images/tagged", 
			$(this).serialize(), 
			function(data) {
				var element = "#tags-for-" + data.object_id;
				$(element).find(".add-form").hide("slide", {direction:'left'}, 250);
				
				if (data.create) {
					$(element).prepend('<a href="/tags/view/' + data.tag_id + '"><span class="label">' + data.label + '</span></a>'); 	
				}
				else {
				
				}
				
			}, 'json'	
		);
		return false;
	});
	
	$(".load-tags-doc").each(function (i) {
		var id = $(this).attr('id');
		$(this).load('/documents/view/'+id.substr(2)+" div.tags");
	});
	
	$(".load-tags-img").each(function (i) {
		var id = $(this).attr('id');
		$(this).load('/images/view/'+id.substr(2)+" div.tags");
	});
	
	
	
 });
  