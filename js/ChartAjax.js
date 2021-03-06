// ajax call with jquery to get the chart color and style from the canvas id and also dispaly the data from the database
// with the data.php file  

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}
			var chartdata = {
				labels: user,
				datasets: [{
					label: 'Picture Shared',
					backgroundColor: "rgba(255,99,132,0.2)",
					borderColor: "rgba(255,99,132,1)",
					pointBackgroundColor: "rgba(255,99,132,1)",
					pointBorderColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(255,99,132,1)",
					data: Picture
				}]
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

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets: [{
					label: 'Picture Uploaded',
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1,
					hoverBackgroundColor: [
						'rgba(252,71,107,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					hoverBorderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					data: Picture
				}]
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

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets: [{
					label: 'Picture Liked',
					fill: false,
					lineTension: 0.1,
					backgroundColor: "rgba(75,192,192,0.4)",
					borderColor: "rgba(75,192,192,1)",
					borderCapStyle: 'butt',
					borderDash: [],
					borderDashOffset: 0.0,
					borderJoinStyle: 'miter',
					pointBorderColor: "rgba(75,192,192,1)",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 1,
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(75,192,192,1)",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointHoverBorderWidth: 2,
					pointRadius: 1,
					pointHitRadius: 10,
					data: Picture
				}]
			};

			var ctx = $("#mycanvas3");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
})

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets: [{

					fill: false,
					lineTension: 0.1,
					backgroundColor: [
						"#FF6384",
						"#4BC0C0",
						"#FFCE56",
						"#E7E9ED",
						"#36A2EB"
					],
					labels: [
						"Red",
						"Green",
						"Yellow",
						"Grey",
						"Blue"
					],
					borderColor: "rgba(75,192,192,1)",
					borderCapStyle: 'butt',
					borderDash: [],
					borderDashOffset: 0.0,
					borderJoinStyle: 'miter',
					pointBorderColor: "rgba(75,192,192,1)",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 1,
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(75,192,192,1)",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointHoverBorderWidth: 2,
					pointRadius: 1,
					pointHitRadius: 10,
					data: Picture
				}]
			};

			var ctx = $("#mycanvas4");

			var barGraph = new Chart(ctx, {
				type: 'polarArea',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
})

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets: [{
					label: 'Picture Liked',
					fill: false,
					lineTension: 0.1,
					backgroundColor: [
						"#0D7502",
						"#36A2EB",
						"#FECE56",
						"#5683FB",
						"#f60c1f"
					],
					hoverBackgroundColor: [
						"#0D7502",
						"#36A2EB",
						"#FECE56",
						"#5683FB",
						"#f60c1f"
					],
					
					borderCapStyle: 'butt',
					borderDash: [],
					borderDashOffset: 0.0,
					borderJoinStyle: 'miter',
					pointBorderColor: "rgba(75,192,192,1)",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 1,
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(75,192,192,1)",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointHoverBorderWidth: 2,
					pointRadius: 1,
					pointHitRadius: 10,
					data: Picture
				}]
			};

			var ctx = $("#mycanvas5");

			var barGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
})

$(document).ready(function() {
	$.ajax({
		url: "https://pixly5-giuseppestirpe89.c9users.io/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var user = [];
			var Picture = [];

			for (var i in data) {
				user.push("User " + data[i].users);
				Picture.push(data[i].Picture);
			}

			var chartdata = {
				labels: user,
				datasets: [{
					label: 'Picture Liked',
					fill: false,
					lineTension: 0.1,
					backgroundColor: [
						"#0D7502",
						"#36A2EB",
						"#FECE56",
						"#5683FB",
						"#f60c1f"
					],
					hoverBackgroundColor: [
						"#0D7502",
						"#36A2EB",
						"#FECE56",
						"#5683FB",
						"#f60c1f"
					],
					borderCapStyle: 'butt',
					borderDash: [],
					borderDashOffset: 0.0,
					borderJoinStyle: 'miter',
					pointBorderColor: "rgba(75,192,192,1)",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 1,
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(75,192,192,1)",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointHoverBorderWidth: 2,
					pointRadius: 1,
					pointHitRadius: 10,
					data: Picture
				}]
			};

			var ctx = $("#mycanvas6");

			var barGraph = new Chart(ctx, {
				type: 'doughnut',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
})