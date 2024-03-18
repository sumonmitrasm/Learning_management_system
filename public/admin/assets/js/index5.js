$(function(e){
  'use strict'
  
	/*----CryptoChart----*/
	var ctx = document.getElementById( "CryptoChart" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [83,56,89, 73, 61, 75, 86, 56],
				label: 'Bitcon',
				backgroundColor: 'rgb(249, 162, 60,0.06)',
				borderColor: 'rgba(249, 162, 60,0.8)',
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
	/*----End CrptoChart----*/
	
	
	/*----CryptoChart2----*/
	var ctx = document.getElementById( "CryptoChart2" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [56,78,36,78,29,78,37,56],
				label: 'Ripple',
				backgroundColor: 'rgb(70, 212, 151,0.06)',
				borderColor: 'rgba(70, 212, 151,0.8)',
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
	/*----End CrptoChart2----*/
  
  	/*----CryptoChart3----*/
	var ctx = document.getElementById( "CryptoChart3" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [45,78,98,34,67,28,89,45],
				label: 'Neo',
				backgroundColor: 'rgb(248, 70, 120,0.06)',
				borderColor: 'rgba(248, 70, 120,0.8)',
				fill: true,
				borderWidth: '3',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
				lineTension: 0.3
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
	/*----End CrptoChart3----*/

	/*----P-scrolling JS ----*/
	const ps33 = new PerfectScrollbar('#scrollbar2', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	/*-----P-scrolling JS -----*/
});


function cryptotrading() {

	var chartdata = [
		{
		  name: 'Last Price $',
		  type: 'line',
		  smooth: true,
		  data: [254, 678, 346, 789, 452, 389, 576, 689, 937, 457, 782, 827],
		  lineStyle:{  
			normal:{  
			   opacity:0.8,
			   width:4,
			   curveness:1
			}
		 }
		},
		{
		  name: 'Daily Change $',
		  type: 'line',
		  smooth: true,
		  data: [154, 578, 226, 589, 252, 189, 376, 289, 637, 257, 582, 727],
		  lineStyle:{  
			normal:{  
			   opacity:0.8,
			   width:4,
			   curveness:1
			}
		 }
		}
	];

	var chart = document.getElementById('cryptotrading');
	var barChart = echarts.init(chart);

	var option = {
		grid: {
		  top: '6',
		  right: '0',
		  bottom: '17',
		  left: '35',
		},
		xAxis: {
		  data: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug',  'Sep', 'Oct', 'Nov', 'Dec'],
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
		series: chartdata,
		color:[ myVarVal,'#f72d66']
	};
	barChart.setOption(option);
	window.addEventListener('resize',function(){
		barChart.resize();
	})
	
}

function cryptoChart1()  {

	document.querySelector(".chart-container").innerHTML = '<canvas id="CryptoChart1" class="h-5 overflow-hidden"></canvas>';
	var ctx = document.getElementById( "CryptoChart1" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [45,78,67,78,36,78,89,84],
				label: 'Nem',
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