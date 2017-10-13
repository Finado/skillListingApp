$("#friends").hide();
var searchTimeout;//Timer to wait a little b/4 fetching the data
$("#search").keyup(function(){
	searchkey=this.value;
	clearTimeout(searchTimeout);
	searchTimeout=setTimeout(function(){
		getUsers(searchkey);
	},400);
});

function getUsers(searchkey){
	$.ajax({
		url:'getFriends.php',
		type:'POST',
		dataType:'json',
		data:{value:searchkey},
		success:function(data){
			if (data.status) {
				$("#friends").show();
				$("#first_name").html(data.userData.first_name);
				$("#second_name").html(data.userData.second_name);
				$("#sex").html(data.userData.gender);
				//$("#image").html(data.userData.url);
				$("#image").html('<img class="img-thumbnail pull-left" width="70px;" style="margin-right:20px;" src="'+data.userData.url+'">');
			}else{

				$("#friends").hide();
				
				$("#first_name").html("");
				$("#second_name").html("");
				$("#sex").html("");
				//$("#image").html(data.userData.url);
				$("#image").html("");


		}
		}
	});
}


/**
 * Created by FRANCONET on 5/4/2016.
 */


$('.upload-all').click(function(){
	//submit all form
	$('form').submit();
});

$('.cancel-all').click(function(){
	//submit all form
	$('form .cancel').click();
});


//indirect ajax
//file collection array
var fileCollection = new Array();



$('#images').on('change', function(e){

	var files = e.target.files;

	$.each(files, function(i, file){

		fileCollection.push(file);

		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e){

			var template = '<form id="form" action="/uploads" class="text-center">' + '<div class="text-center">' +
				'<img class="img-responsive text-center"  height="400" src="'+e.target.result+'"/>' + '<div>' +
				' <label>Image Title:</label> <input type="text" name="title" required="reqiured" class="form-control"/>' +
				' <button class="btn btn-lg btn-success upload" name="upload">Upload</button>' +
				' </div>' +
				'<div class="progress progress-striped active">' +
				'<div class="progress-bar" style="width:0%">' + '</div>' +
				'</div>' + '</form>'

			$('#images-to-upload').append(template);


		};

	});
});

//form upload --- delegation
$(document).on('submit','#form',function(e){

	e.preventDefault();

	$form = $(this);

	//uploadImage($form);

	$form.find('.progress-bar').removeClass('progress-bar-success')
		.removeClass('progress-bar-danger');


	// this form index
	var index  = $(this).index();

	var formdata = new FormData($(this)[0]); //direct form not object



	var request = new XMLHttpRequest();


	request.upload.addEventListener('progress',function(e){
		var percent = Math.round(e.loaded/e.total * 100);
		$form.find('.progress-bar').width(percent+'%').html(percent+'%');
	});


	request.addEventListener('load',function(e){
		$form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');

	});


	//append the file
	formdata.append('images',fileCollection[index]);
	request.open('post', 'http://localhost/myworkbox/index.php/Workers/upload', true);
	request.send(formdata);


	$form.on('click','.cancel',function(){
		request.abort();

		$form.find('.progress-bar')
			.addClass('progress-bar-danger')
			.removeClass('progress-bar-success')
			.html('upload aborted...');
	});

});





//file collection array
var fileCollection = new Array();



$('#proimages').on('change', function(e){

	var files = e.target.files;

	$.each(files, function(i, file){

		fileCollection.push(file);

		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e){

			var template = '<form action="/uploads" class="text-center">' + '<div>' +
				'<img class="img-responsive text-center"  height="400" src="'+e.target.result+'"/>' + '<div>' +
				' <button class="btn btn-lg btn-success upload" name="upload">Upload</button>' +
				' </div>' +
				'<div class="progress progress-striped active">' +
				'<div class="progress-bar" style="width:0%">' + '</div>' +
				'</div>' + '</form>'

			$('#profile-image-to-upload').append(template);



		};

	});
});

//form upload --- delegation
$(document).on('submit','form',function(e){

	e.preventDefault();

	$form = $(this);

	//uploadImage($form);

	$form.find('.progress-bar').removeClass('progress-bar-success')
		.removeClass('progress-bar-danger');


	// this form index
	var index  = $(this).index();

	var formdata = new FormData($(this)[0]); //direct form not object



	var request = new XMLHttpRequest();


	request.upload.addEventListener('progress',function(e){
		var percent = Math.round(e.loaded/e.total * 100);
		$form.find('.progress-bar').width(percent+'%').html(percent+'%');
	});


	request.addEventListener('load',function(e){
		$form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');

	});


	//append the file
	formdata.append('proimages',fileCollection[index]);
	request.open('post', 'http://localhost/myworkbox/index.php/Workers/proupload', true);
	request.send(formdata);


	$form.on('click','.cancel',function(){
		request.abort();

		$form.find('.progress-bar')
			.addClass('progress-bar-danger')
			.removeClass('progress-bar-success')
			.html('upload aborted...');
	});

});

















$("#form2").hide();
$('#submit').click(function(e){
	e.preventDefault();

	var name_commodity = $('#name_commodity').val();
	var type_commodity = $('#type_commodity').val();
	var location_commodity = $('#location_commodity').val();
	var weight_commodity = $('#weight_commodity').val();
	var commodity_export_cost = $('#commodity_export_cost').val();
	var submit = $('#submit').val();
	if(name_commodity!='' && type_commodity!='' && location_commodity!='' && weight_commodity!='' && commodity_export_cost!='')

	{
		$.ajax({
			type: 'POST',
			url: "CommodityUpload",
			data: {submit:submit, name_commodity:name_commodity, type_commodity:type_commodity, location_commodity:location_commodity, weight_commodity:weight_commodity, commodity_export_cost:commodity_export_cost},

			success: function (response) {
				if(response=="true")
				{
					$("#sum").hide();
					$("#message").html("<div class='text-success'><span class='glyphicon glyphicon-ok'></span> <h4 class='text-center'>Successfully Post</h4></div>");
				}
				else
				{
					$("#submit").prop('disabled', false);

					$("#form2").fadeIn();
					$("#message").html("<div class='text-success'><h4 class='text-center'>Commodity Details Saved, Upload Commodity image(s)</h4></div>")
					$("#myform")[0].reset();
					$("#myform").fadeOut();

					$("#message").fadeIn();

					setTimeout(function(){
						$("#message").fadeOut();
					}, 5000);
					console.log(response);
				}

			}
		});

	}


});





$('.upload-all').click(function(){
	//submit all form
	$('form').submit();
});

$('.cancel-all').click(function(){
	//submit all form
	$('form .cancel').click();
});


//indirect ajax
//file collection array
var fileCollection = new Array();



$('#imagess').on('change', function(e){

	var files = e.target.files;

	$.each(files, function(i, file){

		fileCollection.push(file);

		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e){

			var template = '<form action="/uploads">' +
				'<img class="img-responsive"  height="400" src="'+e.target.result+'"/>' + '<div>' +
				' <button class="btn btn-sm btn-success upload" name="upload" id="uploder">Upload</button>' +
				' </div>' +
				'<div class="progress progress-striped active">' +
				'<div class="progress-bar" style="width:0%">' + '</div>' +
				'</div>' + '</form>'

			$('#images-to-upload').append(template);

		};

	});
});


/*$(document).ready(function(){
 $.ajax({
 url:'display_ships()',
 type:'GET',
 success:function(data){
 $('#default_tiles_view').html(data);
 }
 })

 }); */

/*$(document).ready(function(){
 $.ajax({
 url: 'display_ships',
 type:'POST',
 dataType: 'json',
 data : [{


 }],
 success:function(data){
 $('#default_tiles_view').append('<p>hello world</p>');
 alert("Success!");
 $.each(data.results, function(k, v) {
 $.each(v, function(key, value) {
 $('#default_tiles_view').append('<br/>' + key + ' : ' + value);
 })
 })
 }
 })
 }); */




var fileCollection = new Array();



$('#proimg').on('change', function(e){

	var files = e.target.files;

	$.each(files, function(i, file){

		fileCollection.push(file);

		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e){

			var template = '<form action="/uploads">' +
				'<img class="img-responsive" height="200" src="'+e.target.result+'"/>' + '<div>' +
				' </div>' +
				'<div class="progress progress-striped active">' +
				'<div class="progress-bar" style="width:0%">' + '</div>' +
				'</div>' + '</form>'

			$('#proimage').append(template);

		};

	});
});