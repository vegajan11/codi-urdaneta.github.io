
$(document).ready(function(){
$("#tabs").tabs();
$("#addchurchform").hide();
$("#memberform").hide();
$("#editchurchform").hide();
$("#editmember").hide();
refresher();
refresher2();

function refresher(){
	$.post('view.php', function(viewdata){
		$("#view").html(viewdata).show();
	});
}

function refresher2(){
	$.post('viewmember.php', function(viewdata2){
		$("#view2").html(viewdata2).show();
	});
}

$("#ChrchName").autocomplete({
	source:'autocomplete.php',
	select:function(event,ui){
		$("#suggest").html(ui.item.value);
		
	}
	
});

$("#EditChrchName").autocomplete({
	source:'autocomplete.php',
	select:function(event,ui){
		$("#suggest2").html(ui.item.value);
		
	}
	
});

var form = $("#customForm");
var editform = $("#EditForm");
var ChurchName = $("#ChurchName");
var ChurchAddress = $("#ChurchAddress");
var ChurchNameInfo = $("#ChurchNameInfo");
var PastorName = $("#PastorName");
var ContactNumber = $("#ContactNumber");
var EditPastorName = $("#EditPastorName");
var EditChurchName = $("#EditChurchName");
var EditChurchAddress = $("#EditChurchAddress");
var EditContactNumber = $("#EditContactNumber");
var search = $("#search");
var IDno = $("#Idno");

var state = false;

var form2 = $("#addmemberform");
var editmemberform = $("#EditMemberForm");
var MemberName = $("#MemberName");
var MemberAddress = $("#MembreAddress");
var MemberNameInfo = $("#MemberNameInfo");
var MCNumber = $("#MCNumber");
var ChrchName = $("#MCNumber");
var EditMCNumber = $("#EditMCNumber");
var EditMemberName = $("#EditMemberName");
var EditMemberAddress = $("#EditMemberAddress");
var EditChrchName = $("#EditChrchName");
var search2 = $("#membersearch");
var IDno2 = $("#Idno2");

var state2 = false;
var state = false;



ChurchName.keyup(validate);
MemberName.keyup(validatemember);
EditChurchName.keyup(editvalidate);
EditMemberName.keyup(editvalidatemember);
search2.keyup(searchmember);
search.keyup(searchchurch);



function searchchurch(){
	
	var strsearch = search.val();
	$.post('search.php', {searchstr:strsearch}, function(searchresult) {
		$("#view").html(searchresult).show();
		
	});
}

function searchmember(){
	var strsearch2 = search2.val();
	$.post('searchmember.php', {searchstr2:strsearch2}, function(searchresult2) {

		$("#view2").html(searchresult2).show();
		
	});
}



$("#clickform").click(function(){
	$('#addchurchform').attr('title','Registration Form').dialog({width:467, 
	closeOnEscape: false, draggable: true, resizable: false, show:'fade', modal:true});
});

$("#clickform2").click(function(){
	$('#addmemberform').attr('title','Registration Form').dialog({width:467, 
	closeOnEscape: false, draggable: true, resizable: false, show:'fade', modal:true});
});

function validate(){
		
		var uname = ChurchName.val();
		$.post('validate.php', {ChurchNames:uname}, function(data){

			if(data!=0){

				ChurchName.removeClass("valid");
				ChurchNameInfo.removeClass("valid");
				ChurchName.addClass("error");
				ChurchNameInfo.addClass("error");
				ChurchNameInfo.text("This name is already registered!");
				state = false;
				
			}else{

				ChurchName.removeClass("error");
				ChurchNameInfo.removeClass("error");
				ChurchName.addClass("valid");
				ChurchNameInfo.addClass("valid");
				ChurchNameInfo.text("Name available!");
				state = true;	
			}
		});
	return state;
}

function validatemember(){

		var mname = MemberName.val();
		$.post('validatemember.php', {MemberNames:mname}, function(data2){

			if(data2!=0){

				MemberName.removeClass("valid");
				MemberNameInfo.removeClass("valid");
				MemberName.addClass("error");
				MemberNameInfo.addClass("error");
				MemberNameInfo.text("This name is already registered!");
				state2 = false;
				
			}else{

				MemberName.removeClass("error");
				MemberNameInfo.removeClass("error");
				MemberName.addClass("valid");
				MemberNameInfo.addClass("valid");
				MemberNameInfo.text("Name available!");
				state2 = true;	
			}
		});
	return state2;
}

function editvalidate(){
state = true;		
					var uname = ChurchName.val();
					$.post('validate.php', {ChurchNames:uname}, function(editdata){

						if(editdata!=0){

							ChurchName.removeClass("valid");
							ChurchNameInfo.removeClass("valid");
							ChurchName.addClass("error");
							ChurchNameInfo.addClass("error");
							ChurchNameInfo.text("This name is already registered!");
							state = false;
							
						}else{

							ChurchName.removeClass("error");
							ChurchNameInfo.removeClass("error");
							ChurchName.addClass("valid");
							ChurchNameInfo.addClass("valid");
							ChurchNameInfo.text("Name available!");
							state = true;	
						}
					});
	return state;
}

function editvalidatemember(){
state2 = true;		mname = MemberName.val();
					$.post('validatemember.php', {MemberNames:mname}, function(editdata2){

						if(editdata2!=0){

							MemberName.removeClass("valid");
							MemberNameInfo.removeClass("valid");
							MemberName.addClass("error");
							MemberNameInfo.addClass("error");
							MemberNameInfo.text("This name is already registered!");
							state2 = false;
							
						}else{

							MemberName.removeClass("error");
							MemberNameInfo.removeClass("error");
							MemberName.addClass("valid");
							MemberNameInfo.addClass("valid");
							MemberNameInfo.text("Name available!");
							state2 = true;	
						}
					});
	return state2;
}



	
$("#send").click(function(){
	var all = $(form).serialize();
	if(validate()== true){
		$.ajax({
			type: "POST",
			url: "insert.php",
			data: all,
			success: function(data) {
				if(data ==1){
					alert("Success! You have registered!");
					refresher();
				}else{
					alert("You have errors");
				}
			}
		});	
	}else{
		alert("Check your errors!");
	}
});	


$("#send2").click(function(){
	var all2 = $(form2).serialize();
	if(validatemember()== true){
		$.ajax({
			type: "POST",
			url: "insertmember.php",
			data: all2,
			success: function(data2) {
				if(data2 ==1){
					alert("Success! You have registered!");
					refresher2();
				}else{
					alert("You have errors");
				}
			}
		});	
	}else{
		alert("Check your errors!");
	}
});	

$("#Editsend").click(function(){
	var editall = $(EditForm).serialize();
	if(editvalidate()== true){
		$.ajax({
			type: "POST",
			url: "update.php",
			data: editall,
			success: function(editdata) {
				if(editdata ==1){
					alert("Record has been updated.");
						refresher();
				}else{
					alert("Check your errors.");
				}
			}
		});	
	}else{
		alert("Check your errors!");
	}
});



$("#Editsend2").click(function(){
	var editall2 = $(EditMemberForm).serialize();
	if(editvalidatemember()== true){
		$.ajax({
			type: "POST",
			url: "updatemember.php",
			data: editall2,
			success: function(editdata2) {
				if(editdata2 ==1){
					alert("Record has been updated...");
						refresher2();
				}else{
					alert("Check your errors.");
				}
			}
		});	
	}else{
		alert("Check your errors!");
	}
});


$("#delete").click(function(){
$("#confirm").attr('title','Confim delete').text('Are you sure you want to delete this record?').dialog({buttons:{
	'Yes':function(){
		$(this).dialog('close');
		var iddelete = IDno.val();
		$.post('delete.php',{locateid:iddelete},function(deleteresp){
		alert(deleteresp);
		refresher();
		
	});
	}, 'No':function(){
		$(this).dialog('close');
	}
	
	
}}, {closeOnEscape: true, draggable: true, resizable: false, show:'fade', modal:true}  );
	
});	


$("#delete2").click(function(){
$("#confirm2").attr('title','Confim delete').text('Are you sure you want to delete this record?').dialog({buttons:{
	'Yes':function(){
		$(this).dialog('close');
		var iddelete2 = IDno2.val();
		$.post('deletemember.php',{locid:iddelete2},function(deleteresp2){
		alert(deleteresp2);
		refresher2();
		
	});
	}, 'No':function(){
		$(this).dialog('close');
	}
	
	
}}, {closeOnEscape: true, draggable: true, resizable: false, show:'fade', modal:true}  );
	
});


});