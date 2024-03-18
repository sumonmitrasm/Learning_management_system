$(function(e){
  'use strict'
  
	//Spark11
    var spark11 = {
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
        data: [0, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46]
      }],
      yaxis: {
        min: 0
      },
      colors: ['#4454c3'],

    }
	var spark11 = new ApexCharts(document.querySelector("#spark11"), spark11);
    spark11.render();
	
	//Spark2
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
        data: [0, 45, 93, 53, 61, 27, 54, 43, 19, 46, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, ]
      }],
      yaxis: {
        min: 0
      },
      colors: ['#2dce89'],

    }
	var spark2 = new ApexCharts(document.querySelector("#spark2"), spark2);
    spark2.render();
	//Spark3
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
        data: [0, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46,45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51]
      }],
      yaxis: {
        min: 0
      },
      colors: ['#ff5b51'],

    }
	var spark3 = new ApexCharts(document.querySelector("#spark3"), spark3);
    spark3.render();
	
	/* sparkline_bar11 */
	$(".sparkline_bar11").sparkline([2, 4, 3, 4, 5, 4,5,3,4,5,2,4,5,4,3,5,4,3,4,5,4,5,4,3,5,4,3,4,5], {
		type: 'bar',
		height: 50,
		width:250,
		barWidth: 5,
		barSpacing: 7,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#4454c3'
	});
	/* sparkline_bar11 end */
	
	/* sparkline_bar12 */
	$(".sparkline_bar12").sparkline([3, 5, 4, 4, 5, 4,5,3,4,5,3,4,5,4,3,5,4,3,4,5,4,5,4,3,5,4,3,4,5], {
		type: 'bar',
		height: 50,
		width:250,
		barWidth: 5,
		barSpacing: 7,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#f7346b'
	});
	/* sparkline_bar12 end */
	
	/* sparkline_bar13 */
	$(".sparkline_bar13").sparkline([3, 5, 4, 4, 5, 4,5,3,4,5,3,4,5,4,3,5,4,3,4,5,4,5,4,3,5,4,3,4,5], {
		type: 'bar',
		height: 50,
		width:250,
		barWidth: 5,
		barSpacing: 7,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#2dce89'
	});
	/* sparkline_bar13 end */
	
	/* sparkline_bar14 */
	$(".sparkline_bar14").sparkline([3, 5, 4, 4, 5, 4,5,3,4,5,3,4,5,4,3,5,4,3,4,5,4,5,4,3,5,4,3,4,5], {
		type: 'bar',
		height: 50,
		width:250,
		barWidth: 5,
		barSpacing: 7,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#45aaf2'
	});
	/* sparkline_bar14 end */
	
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
				backgroundColor: 'rgb(68, 84, 195,0.06)',
				borderColor: 'rgba(68, 84, 195,0.6)',
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
	
	/*----CryptoChart11----*/
	var ctx = document.getElementById( "CryptoChart11" );
	var myChart = new Chart( ctx, {
		type: 'line',
		data: {
			labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
			type: 'line',
			datasets: [ {
				data: [45,78,67,78,36,78,89,84],
				label: 'Nem',
				backgroundColor: 'rgb(68, 84, 195,0.06)',
				borderColor: 'rgba(68, 84, 195,0.6)',
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
	/*----End CrptoChart1----*/
	
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
				backgroundColor: 'rgb(68, 84, 195,0.06)',
				borderColor: 'rgba(68, 84, 195,0.6)',
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
				backgroundColor: 'rgb(68, 84, 195,0.06)',
				borderColor: 'rgba(68, 84, 195,0.6)',
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
	/*----End CrptoChart3----*/
  
 });