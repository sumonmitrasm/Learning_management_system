( function ( $ ) {
	"use strict";

	/*----P-scrolling JS ----*/
	const ps32 = new PerfectScrollbar('#scrollbar', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/*-----P-scrolling JS -----*/

	/*----P-scrolling JS ----*/
	const ps33 = new PerfectScrollbar('#scrollbar2', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/*-----P-scrolling JS -----*/
	
})( jQuery );


function canvasDoughnut2() {
	document.querySelector(".chart-container2").innerHTML = '<canvas class="canvasDoughnut2 donutShadow" height="200" width="200"></canvas>';
	if ($('.canvasDoughnut2').length){

		var chart_doughnut_settings = {
			type: 'doughnut',
			tooltipFillColor: "rgba(51, 51, 51, 0.55)",
			data: {
				labels: [
					"Completed",
					"Running",
					"Pending",
				],
				datasets: [{
					data: [68, 55, 45],
					backgroundColor: [
						"#2dce89",
						myVarVal,
						"#f72d66"
					],
					borderColor: [
						"#2dce89",
						myVarVal,
						"#f72d66"
					]
				}]
			},
			options: {
				plugins: {
				  legend: {
					display: false,
				  }
				},
				cutout: "70%",
				responsive: true,
			},
		}

		$('.canvasDoughnut2').each(function(){

			var chart_element = $(this);
			var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

		});
	}
}

function projectInvestment() {

	var chartdata3 = [
		{
		name: 'Project Budget',
		type: 'line',
		smooth:true,
		data: [7635, 5465, 6754, 5432, 5435, 6545, 4453, 3425, 7654, 3245, 4532, 5643],
		lineStyle:{  
				normal:{  
				opacity:0.8,
				width:4,
				curveness:1
				}
			}
		},
		{
		name: 'Expenses',
		type: 'line',
		smooth:true,
		data: [ 5435, 3452, 5432, 3452, 2564, 3456, 3123, 2435, 5463, 1245, 3245, 4534,],
			lineStyle:{  
				normal:{  
				opacity:0.8,
				width:4,
				curveness:1
				}
			}
		}
	];

	var option5 = {
		grid: {
		top: '6',
		right: '0',
		bottom: '17',
		left: '35',
		},
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer:
			{
				label: {
					show: false,
				}
			}

		},
		xAxis: {
		data: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		axisLine: {
			lineStyle: {
			color: 'rgba(67, 87, 133, .09)'
			}
		},
		axisLabel: {
			fontSize: 10,
			color: '#8e9cad'
		}
		},
		yAxis: {
		splitLine: {
			lineStyle: {
			color: 'rgba(67, 87, 133, .09)'
			}
		},
		axisLine: {
			lineStyle: {
			color: 'rgba(67, 87, 133, .09)'
			}
		},
		axisLabel: {
			fontSize: 10,
			color: '#8e9cad'
		}
		},
		series: chartdata3,
		color:[ myVarVal, '#f72d66']
	};
	var chart5 = document.getElementById('projectInvestment');
	var barChart5 = echarts.init(chart5);
	barChart5.setOption(option5);
	window.addEventListener('resize',function(){
		barChart5.resize();
	})
}


function expense() {

	document.querySelector(".chart-container").innerHTML = '<canvas id="expense" class="overflow-hidden"></canvas>';
	var ctx = document.getElementById( "expense" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [13, 26, 20, 93, 61, 140, 85, 96],
				label: 'Expenses',
				backgroundColor: hexToRgba(myVarVal, 0.06),
				borderColor: hexToRgba(myVarVal, 0.8),
				fill: true,
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
				lineTension: 0.3,        
			}
			]
		},
		options: {

			responsive: true,
			maintainAspectRatio: false,
			interaction: {
				intersect: false,
				mode: 'index',
			},
			scales: {
				x: {
					display: false,
				},
				y: {
					display: false,
				},
			},
			plugins: {
				legend: {
					display: false,
					labels: {
						display: false
					}
				},
				tooltip: {
					enabled: true
				}			
			}
		}
	} );

}
