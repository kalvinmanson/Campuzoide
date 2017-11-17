$(function() {

	//jSonizr
	/*$(".jsonizr").each(function() {
		var thisjson = $(this);
		var target = $('#'+ $(this).data('target'));
		var data = jQuery.parseJSON(target.val());
		function updateData() {
			data.perro = "guaGua";
			delete data["name"];
			$.each( data, function( key, value ) {
			  $('.table tr:last', thisjson).after('<tr><td>'+key+'</td><td>'+value+'</td></tr>');
			});
			target.val(JSON.stringify(data));
		}		
		updateData();

	});*/

	$('.dataTable').DataTable({
		"pageLength": 50
	});

	$( ".ckfile" ).click(function() {
		var id = $(this).attr('id');
		openKCFinder(id);
		function openKCFinder(field) {
		    window.KCFinder = {
		        callBack: function(url) {
		            $( "#"+id ).val(url);
		            window.KCFinder = null;
		        }
		    };
		    window.open('/editor/kcfinder/browse.php?type=images&dir=files/public', 'kcfinder_textbox',
		        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		        'resizable=1, scrollbars=0, width=800, height=600'
		    );
		}
	});

	$(".tr_addField").click( function () {
		var newField = $("#new_config").val();
		$('#tableTarget tr:last').after('<tr><td>'+newField+'</td><td><input type="text" name="config['+newField+']" value="" class="form-control"></td></tr>');
	});

	$("[data-fancybox]").fancybox({
		// Options will go here
	});

	$(".tr_name_field").dblclick( function() {
		$( this ).replaceWith( "<input type='text' class='form-control' name='name' required>" );
	});
	$(".tr_format_field").dblclick( function() {
		$( this ).replaceWith( "<input type='text' class='form-control' name='format' required>" );
	});

	$(".tagsInput").tagsinput();


	$.fn.randomize = function(selector){
	    var $elems = selector ? $(this).find(selector) : $(this).children(),
	        $parents = $elems.parent();

	    $parents.each(function(){
	        $(this).children(selector).sort(function(){
	            return Math.round(Math.random()) - 0.5;
	        // }). remove().appendTo(this); // 2014-05-24: Removed `random` but leaving for reference. See notes under 'ANOTHER EDIT'
	        }).detach().appendTo(this);
	    });

	    return this;
	};

	$('.answers').randomize('li');

	$(".answer").click( function() {
		let result = $(this).data('result');
		answer(result);
	});

	// Timer
	var time = $('#timer').text() * 60;
	var timePlayer = 0;
	if(time > 0) {
		var timer = setInterval(muestraReloj, 1000);
	}
	function muestraReloj() {
		time = time - 1;
  		var minutes = Math.floor(time / 60) % 60;
  		var seconds =  (time % 60);
		$('#timer').text(minutes + ':' + seconds);
		timePlayer = timePlayer + 1;
		$("input[name='timePlayer']").val(timePlayer);
		if(time < 1) {
			clearInterval(timer);
			answer(0);
			
		}
	}

	function answer(result) {
		let token = $("input[name='_token']").val();
		let question_id = $("input[name='question_id']").val();
		let url = $("input[name='url']").val();
		let timePlayer = $("input[name='timePlayer']").val();

		$( "#result" ).load( "/questions/answer", { 
			_token: token, 
			answer: result, 
			question_id: question_id, 
			url: url, 
			timePlayer: timePlayer 
		}, function() {
		  $('.answers').remove();
		});

	}


	

});

