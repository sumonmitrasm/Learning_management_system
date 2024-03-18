$(function(e){

	//Spark2
	var sparklineData2 = [0, 45, 93, 53, 61, 27, 54, 43, 19, 46, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, ];
    var spark2 = {
      chart: {
        type: 'area',
        height: 60,
		width: 160,
        sparkline: {
          enabled: true
        },
		dropShadow: {
			enabled: true,
			blur: 3,
			opacity: 0.2,
		}
		},
		stroke: {
			show: true,
			curve: 'smooth',
			lineCap: 'butt',
			colors: undefined,
			width: 2,
			dashArray: 0,      
		},
		fill: {
        gradient: {
          enabled: false
        }
      },
      series: [{
		name: 'Unique Visitors',
        data: randomizeArray(sparklineData2)
      }],
      yaxis: {
        min: 0
      },
      colors: ['#2dce89'],

    }
	var spark2 = new ApexCharts(document.querySelector("#spark2"), spark2);
    spark2.render();

	//Spark3
	var sparklineData3 = [0, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46,45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51];
    var spark3 = {
      chart: {
        type: 'area',
        height: 60,
		width: 160,
        sparkline: {
          enabled: true
        },
		dropShadow: {
			enabled: true,
			blur: 3,
			opacity: 0.2,
		}
		},
		stroke: {
			show: true,
			curve: 'smooth',
			lineCap: 'butt',
			colors: undefined,
			width: 2,
			dashArray: 0,      
		},
		fill: {
        gradient: {
          enabled: false
        }
      },
      series: [{
		name: 'Expenses',
        data: randomizeArray(sparklineData3)
      }],
      yaxis: {
        min: 0
      },
      colors: ['#ff5b51'],

    }
	var spark3 = new ApexCharts(document.querySelector("#spark3"), spark3);
    spark3.render();
	
	/*----P-scrolling JS ----*/
	const ps31 = new PerfectScrollbar('.countryscroll', {
	  useBothWheelAxes:true,
	});
	
	const ps32 = new PerfectScrollbar('#scrollbar', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	
	const ps33 = new PerfectScrollbar('#scrollbar2', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	
	const ps34 = new PerfectScrollbar('#scrollbar3', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/*-----P-scrolling JS -----*/
	
});

function index1() {
	document.querySelector(".chart-container").innerHTML = '<canvas id="leads" class="h-400 chart-dropshadow-primary"></canvas>';
	const ctx = document.getElementById('leads').getContext('2d');
	const myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			type: 'line',
			datasets: [{
				label: "Sales",
				data: [253, 256, 395, 204, 251, 458, 364, 145, 156, 250, 253, 278],
				backgroundColor: hexToRgba(myVarVal, 0.1),
				borderColor: hexToRgba(myVarVal, 0.9),
				borderWidth: 5,
				fill: true,
				pointStyle: 'circle',
				pointRadius: 0,
				pointBorderColor: 'transparent',
				pointBackgroundColor: hexToRgba(myVarVal, 0.8),
				lineTension: 0.3,        
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			interaction: {
				intersect: false,
				mode: 'index',
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
			},
			scales: {
				x: {
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						fontColor: "rgba(171, 167, 167, 0.9)",
					},
					title: {
						display: true,
						text: 'Months',
						color: "#8e9cad",
						font: {
							size: 15,
							weight: '500',
						},
					},
					grid: {
						display: false,
						color: 'rgba(171, 167, 167, 0.1)',
						drawBorder: false,
					},
				},
				y: {
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						fontColor: "rgba(171, 167, 167, 0.9)",
						callback: function(value, index, values) {
							return '$' + value;
						},
						stepSize: 100,
						min: 0,
						max: 500
					},
					title: {
						display: true,
						text: 'Revenue',
						color: "#8e9cad",
						font: {
							size: 15,
							weight: '500',
						},
					},
					grid: {
						display: false,
						color: 'rgba(171, 167, 167, 0.1)',
						drawBorder: false,
					},
				}
			},
		}
	});
}

function vectormap() {
	document.querySelector('#vmap').innerHTML = ""
	$(document).ready(function() {

		function sizeMap() {
			var containerWidth = $('.some-parent-element').width(),
				containerHeight = (containerWidth / 1.4);

			$('#vmap').css({
				'width': containerWidth,
				'height': containerHeight
			});
		}
		sizeMap();
		$(window).on("resize", sizeMap);
		jQuery('#vmap').vectorMap({
			map: 'world_en',
			backgroundColor: 'transparent',
			color: '#ffffff',
			hoverOpacity: 0.7,
			enableZoom: false,
			showTooltip: true,
			scaleColors: [myVarVal],
			values: sample_data,
			normalizeFunction: 'polynomial'
		});
	});	

}

 /*sparkline*/
var randomizeArray = function (arg) {
	var array = arg.slice();
	var currentIndex = array.length,
	temporaryValue, randomIndex;
	while (0 !== currentIndex) {
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}
	return array;
}

function spark1() {
	
	//Spark1
	var sparklineData = [0, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];
	var spark1 = {
	  chart: {
		type: 'area',
		height: 60,
		width: 160,
		sparkline: {
		  enabled: true
		},
		dropShadow: {
			enabled: true,
			blur: 3,
			opacity: 0.2,
		}
		},
		stroke: {
			show: true,
			curve: 'smooth',
			lineCap: 'butt',
			colors: undefined,
			width: 2,
			dashArray: 0,      
		},
	  fill: {
		gradient: {
		  enabled: false
		}
	  },
	  series: [{
		name: 'Total Revenue',
		data: randomizeArray(sparklineData)
	  }],
	  yaxis: {
		min: 0
	  },
	  colors: [myVarVal],
	
	}
	document.querySelector("#spark1").innerHTML = '';
	var spark1 = new ApexCharts(document.querySelector("#spark1"), spark1);
	spark1.render();
	
}