$(document).ready(function(){
	$.ajax({
		url: "https://pixly3-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for(var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets : [
					{
						label: 'Picture Shared',
						backgroundColor: 'rgba(1, 143, 244, 1)',
						borderColor: 'rgba(248, 243, 190, 1)',
						hoverBackgroundColor: 'rgba(7, 15, 65, 1)',
						hoverBorderColor: 'rgba(248, 243, 190, 1)',
						data: Picture
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'radar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
$(document).ready(function(){
	$.ajax({
		url: "https://pixly3-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for(var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets : [
					{
						label: 'Picture Uploaded',
						backgroundColor: 'rgba(250, 41, 41, 1)',
						borderColor: 'rgba(248, 243, 190, 1)',
						hoverBackgroundColor: 'rgba(224, 61, 230, 1)',
						hoverBorderColor: 'rgba(248, 243, 190, 1)',
						data: Picture
					}
				]
			};

			var ctx = $("#mycanvas2");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
})