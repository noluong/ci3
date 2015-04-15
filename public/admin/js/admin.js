(function($) {
	$(function() {
		
		$(".confirm").click( function() {
			return confirm($(this).attr("data-alert"));
		});
		
		// if ($().datepicker) {
		// 	$("input.datepicker").datepicker({
		// 		dateFormat : "yy-mm-dd"
		// 	});
		// 	$("input.datetimepicker").datetimepicker({
		// 		dateFormat : "yy-mm-dd",
		// 		timeFormat : "hh:mm:ss"
		// 	});
		// }
		
		// if ($().timepicker) {
		// 	$("input.timepicker").timepicker({
		// 		timeFormat : "hh:mm:ss"
		// 	});
		// }

		// if ($("#showGmap")[0]) {
		// 	var map;
		// 	var marker;
		// 	var glat = parseFloat(document.getElementById('latitude').value); // 緯度
		// 	var glng = parseFloat(document.getElementById('logtitude').value); // 経度

		// 	if(!glat && !glng) {
		// 		glat = 35.6894875;
		// 		glng = 139.69170639999993;
		// 	}
			
		// 	var myOptions = {
		// 		zoom: 15,
		// 		center: new google.maps.LatLng(glat,glng),
		// 		mapTypeId: google.maps.MapTypeId.ROADMAP,
		// 		scrollwheel:false
		// 	};
			
		// 	map = new google.maps.Map(document.getElementById("map"), myOptions);
		
		// 	var location = new google.maps.LatLng(glat,glng);
		// 	marker = new google.maps.Marker({
		// 		position	: location,
		// 		map			: map,
		// 		draggable	: true
		// 	});
		// 		$("#latitude").val(marker.getPosition().lat());
		// 		$("#logtitude").val(marker.getPosition().lng());
				
		// 	google.maps.event.addListener(marker, 'dragend', function() {
		// 		map.panTo(marker.getPosition());
		// 		$("#latitude").val(marker.getPosition().lat());
		// 		$("#logtitude").val(marker.getPosition().lng());
		// 	});
			
		// 	$("#showGmap").click(function () {
		// 		searchMap($("#address").val());
		// 	});
			
			
		// 	function searchMap(address){
			
		// 		address= document.getElementById('address').value;
		// 		if(!address){
		// 			return false;
		// 		}
		// 		geocoder = new google.maps.Geocoder();
			
		// 		geocoder.geocode(
		// 			{"address":address},
		// 			function(results, status){
		// 				if (status == google.maps.GeocoderStatus.OK) {
		// 					map.setCenter(results[0].geometry.location);
		// 					marker.setPosition(results[0].geometry.location);
		// 					$("#latitude").val(marker.getPosition().lat());
		// 					$("#logtitude").val(marker.getPosition().lng());
		// 				} else {
		// 					alert("address not is validate!");
		// 				}
		// 			}
		// 		);
		// 	}
		// }

		$("#loginForm").submit(function() {
			// 実際に使用するにはバリデーションの処理が必要になります。
			$("#loginWrapper").animate({ left: -30 }, 75)
				.animate({ left: 30 }, 75)
				.animate({ left: -15 }, 75)
				.animate({ left: 15 }, 75)
				.animate({ left: -7 }, 75)
				.animate({ left: 7 }, 75)
				.animate({ left: 0 }, 75);
			
			
		});
		$("table tr td:nth-child(2)").css('word-break','break-all');
		
	});
})(jQuery);

function redirect(location){
	window.location=location;
	return false;
}

// ==============================================================
// limit show text
// ==============================================================
function limit_text (str){
	if(str.length >35){
		str = str.substring(0, 35)+'...';
	}
	return str;
}


$(document).ready(function() {
	$("#result").html('');
    $(".dropdown img.flag").addClass("flagvisibility");

    $(".dropdown dt a").click(function() {
        $(".dropdown dd ul").toggle();
    });
                
    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
        getSelectedValue("sample");
    });
                
    function getSelectedValue() {
    	var value = $("#sample").find("dt a span.value").html();
        return $("#result").html('<input type="hidden" name="category[id]" value='+value+ '>');
    }

    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (! $clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });


    $("#flagSwitcher").click(function() {
        $(".dropdown img.flag").toggleClass("flagvisibility");
    });
});
