$(function(){
  var colors = ['#007bff','#28a745','#333333'];
  var donutOptions = {
    cutoutPercentage: 85,
    legend: {position:'bottom', padding:100, labels: {pointStyle:'circle', usePointStyle:true}}
  };
  var chDonutData1 = {
      labels: ['15%', '20%', '65%'],
      datasets: [
        {
          backgroundColor: colors.slice(0,3),
          borderWidth: 0,
          data: [15, 20, 65]
        }
      ]
  };
  var chDonut1 = $("#chDonut1");
  if (chDonut1) {
    new Chart(chDonut1, {
        type: 'pie',
        data: chDonutData1,
        options: donutOptions
    });
  }
})// XXX: End DOM
