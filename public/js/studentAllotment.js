$(document).ready(function() {

	$( "#date-input" ).css('display','none');
	
	/***
	* Sets the visibility of the Fetch button
	*/
	function checkForFetch() {
		if($('#to-add-main').children().length > 0 || $('#already-added-main').children().length > 0) {
			$('#fetch').parent().parent().hide();
		}
		else {
			$('#fetch').parent().parent().show();
		}
	}

	$(document).on("click", ".date-input-btn", function() {
        $( "#date-input" ).slideDown("slow");
	});


	/***
	* Used to clear the temporary session data stored when submiting a new term
	*/
	$(document).on("click", "#form-submit", function() {
        $( "#to-add-main" ).empty();
	});

	$('#confirm-to-add').on('hide.bs.modal', function (event) {
		$( "#date-input" ).css('display','none');
	})

	$('#confirm-to-delete').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		if(button.hasClass("remove-db")) {
			var uid = button.parent().find("button:eq(0)").text();
			var id = button.parent().parent().parent().attr('id');
			var modal = $(this);
			modal.find('.delete-db').data('uid',uid);
			modal.find('.delete-db').data('id',id);
		}
		else {
			var id = button.attr('id');
			var modal = $(this);
			modal.find('.delete-db').data('id',id);
		}
	})


	/***
	* Reset button of already enrolled section
	*
	* Extracts the uids from already enrolled section and sends them through an ajax request to get them removed from DB
	*/
	$(document).on("click", ".delete-db", function() {
		$('*').css("cursor", "wait");

		if($(this).data('uid')) {
			var id = $(this).data('id');
			var uids = [$(this).data('uid')];
			uids = JSON.stringify(uids);
			var option = $(this).data('option');
			var term = $('#'+id).data('term'),
				division = $('#'+id).data('division');
		}
		else {
			var id = $(this).data('id').split('-');
			var option = $(this).data('option');
			var term = $('#'+id[1]).data('term'),
				division = $('#'+id[1]).data('division');
			var uids = [];
			$( "#"+id[1]+" > div > div" ).each(function() {
				uids.push($(this).find("button:eq(0)").text());
			});
			uids = JSON.stringify(uids);
		}

		var date = $('input[name="dt2"]').val();

		if(date.length == 0) {
			alert("Please select a date");
			$('*').css("cursor", "");
		}
		else {
			$.ajax({
				url: '/staff/remove_from_db',
				data: {uid: uids, term: term, division: division, option: option, date: date},
				success: function() {
					$('*').css("cursor", "");
					$( "#already-added-main" ).empty();
					location.reload();
					checkForFetch();
				}
			});
		}
	});
	

	/***
	* Reset button of to be enrolled section
	*
	* Empty the whole section
	*/
    $(document).on("click", "#reset", function() {
        $( "#to-add-main" ).empty();
        checkForFetch();
	});
	
	
	/***
	* Removes single record from the To be enrolled section
	*/
    $(document).on("click", ".remove", function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
		$('#to-add-main > fieldset > legend').text($('#to-add').children().length + ' Student(s) To Be Enrolled');
        if ($('#to-add').children().length == 0) {
        	$( "#to-add-main" ).empty();
        }
        checkForFetch();
	});

	/***
	* Fetch button
	*
	* Extracts the current term and makes an ajax request to get the data of students enrolled in the previous term
	*/
	$('#fetch').click(function() {
		var term = $(this).data('term'),
			division = $(this).data('division');
		$('*').css("cursor", "wait");

		if(term%2 == 0) {
			term = term - 1;
		}
		else {
			term = (((term/1000|0)-1)*1000) + (term%1000) - 1;
		}

		$.ajax({
            url: '/staff/fetch_students',
            data: {term : term,division : division},
            success: function (data) { 
				data = JSON.parse(data);
				$('*').css("cursor", "");
				if(data.length == 0) {
					$('#fetch-students').append("<div class='col-sm-8'>Students not enrolled in previous term</div>");
					$('#add-fetched').addClass('disabled');
				}
				else {
					$('#fetch-students').empty();
					for (var i = 0; i < data.length; i++) {
						var text = '<div class="col-sm-6">'+
									'<div class="btn-group btn-lg btn-block" role="group">'+
										'<button type="button" class="btn btn-secondary btn-lg" style="width: 25%" disabled>'+data[i]['uid']+'</button>'+
										'<button type="button" class="btn btn-secondary btn-lg" style="width: 65%" disabled>'+data[i]['last_name']+' '+data[i]['first_name']+'</button>'+
										'<button type="button" class="btn btn-secondary btn-lg remove" style="width: 10%"><span class="fa fa-trash-o"></span></button>'+
									'</div>'+
								   '</div>';
						$('#fetch-students').append(text);
					}
				}
            }
        }); 
	});


	/***
	* Add by UID input submit button
	*
	* Makes an Ajax request to get the student details
	*/
	$('#add-uids').click(function(e) {
		e.preventDefault()
		var uids = $('input[name="uids"]').val();
		var term = $(this).data('term');
		term = term.toString();
		$('input[name="uids"]').val("");
		$('*').css("cursor", "wait");

		$.ajax({
            url: '/staff/submit_UIDs',
            data: {uids : uids, term_id : term},
            success: function(data) {
				$('*').css("cursor", "");
				var result = JSON.parse(data[0]);
				addToReady(result);
				if(data[1].length > 0) {
					data[1].unshift("Invalid UID(s)");
					data[1].push("\nRemaining valid UIDs if any will be added further");
					alert(data[1].join("\n"));
				}
				if(data[2].length > 0) {
					data[2].unshift("Already Enrolled");
					data[2].push("\nRemaining valid UIDs if any will be added further");
					alert(data[2].join("\n"));
				}
            }
        });
	});


	/***
	* 'Add' in the modal
	*
	* Extracts the uids and name visible in the modal and sends them as array to the function addToReady()
	*/
	$('#add-fetched').click(function() {
		var data = [];
        $( "#fetch-students > div > div" ).each(function() {
        	r = {uid : $(this).find("button:eq(0)").text(),full_name : $(this).find("button:eq(1)").text()}
            data.push(r);
        });
        addToReady(data);
	});


	/***
	* Funtion to populate the 'To be enrolled' section
	*
	* Also checks if the uid is already present in any of the two sections
	*/
	function addToReady(data) {
		if($('#to-add-main').children().length == 0){
			var main = '<fieldset style="padding: 0.5rem !important;border: 2px solid #aaa !important;"><legend style="width: auto !important;text-align: center"></legend><div class="row" id="to-add"></div><br><div class="row"><div class="col-sm-6 col-sm-offset-6"><button type="submit" class="btn btn-success col-sm-6 col-sm-offset-1" id="verify-and-submit" data-toggle="modal" data-target="#confirm-to-add">Verify and Submit</button><button type="submit" class="btn btn-danger col-sm-3 col-sm-offset-1" id="reset">Reset</button></div></div><br></fieldset>';
			$('#to-add-main').append(main);
		}

		var uidsToAdd = [];
        $( "#to-add > div > div" ).each(function() {
            uidsToAdd.push(parseInt($(this).find("button:eq(0)").text()));
		});
		var count = uidsToAdd.length;
        for (var i = 0; i < data.length; i++) {
        	if ($.inArray(data[i]['uid'],uidsToAdd) == -1) {
	        	var text = '<div class="col-sm-6"><div class="btn-group btn-lg btn-block" role="group"><button type="button" class="btn btn-secondary btn-lg uid" style="width: 25%" disabled>'+ data[i]['uid'] +'</button><button type="button" class="btn btn-secondary btn-lg" style="width: 65%" disabled>'+ data[i]['full_name'] +'</button><button type="button" class="btn btn-secondary btn-lg remove" style="width: 10%"><span class="fa fa-trash-o"></span></button></div></div>';
				$('#to-add').append(text);
				count++;
			}
			else {
				alert(data[i]['uid'] + " Already Present");
			}
		}
		if($('#to-add').children().length == 0) {
			$('#to-add-main').empty();
		}
		$('#to-add-main > fieldset > legend').text(count + ' Student(s) To Be Enrolled');
        checkForFetch();
	}

	/***
	* 'Verify and Submit' button handler
	*
	* Extracts the uids visible in to be enrolled section and send them as array to get enrolled
	*/
	$(document).on("click", ".add-db", function(e) {
		e.preventDefault();
		$('*').css("cursor", "wait");
		var uids = [];
        $( "#to-add > div > div" ).each(function() {
            uids.push(parseInt($(this).find("button:eq(0)").text()));
        });
        var term = $('#to-add-main').data('term'),
			division = $('#to-add-main').data('division'),
			status = $(this).data('status'),
			date = $('input[name="dt1"]').val();

		uids = JSON.stringify(uids);

        $.ajax({
            url: '/staff/add_to_db',
            data: {uid: uids, term: term, division: division, status: status, date: date},
            success: function() {
				$('*').css("cursor", "");
				$('#to-add-main').empty();
				location.reload();
            }
        });
	});


	/***
	* 'Done' button to redirect to initial page
	*/
	$(document).on('click','#done',function() {
		location.href = "http://cms.com/staff/examdept/updatestudents";
	});


	/***
	* Stores the uids in to be enrolled section to session storage
	*/
	$(window).on("beforeunload", function() {
		var data = [];
        $( "#to-add > div > div" ).each(function() {
        	r = {uid : $(this).find("button:eq(0)").text(),full_name : $(this).find("button:eq(1)").text()}
            data.push(r);
		});
		sessionStorage.setItem("data",JSON.stringify(data));
	});


	/***
	* Retrieves the uids present in the session storage
	*/
	$(window).on("load", function() {
		var data = JSON.parse(sessionStorage.getItem('data'));
		addToReady(data);
	});
})