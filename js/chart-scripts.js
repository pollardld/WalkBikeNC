var data = {
	labels: [ '20mph', '30mph', '40mph' ],
	series: [{
		name : 'Survival Rate',
		data : [95, 50, 15]
  	}]
};

var options = {
	axisX: {
		showLabel: true,
		showGrid : true,
	},
	axisY : {
		labelInterpolationFnc: function(value) {
	      return value + '%'
	    },
    	scaleMinSpace: 10,
	},
	width : '100%',
	height : '220px'
};

var chartElement = document.querySelector('.ct-chart');

if (chartElement) { 
	var chart = new Chartist.Bar( chartElement, data, options );
}