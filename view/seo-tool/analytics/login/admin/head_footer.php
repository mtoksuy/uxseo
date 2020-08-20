<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>


<?php




		$analytics_ticket_res = model_db::query("
			SELECT *
			FROM analytics_ticket
				WHERE uxseo_id	 = '".$_SESSION['uxseo_id']."'
				ORDER BY turn_id DESC
			");
foreach($analytics_ticket_res as $key => $value) {
	foreach(json_decode($value['keyword_json']) as $keyword_json_key => $keyword_json_value) {
		$googler_query_res = model_db::query("
			SELECT *
			FROM googler_query
				WHERE analytics_ticket_primary_id	 = ".$value['primary_id']."
				AND query = '".$keyword_json_value."'
				AND test_time > '2020-08-15 05:56:39'
				ORDER BY primary_id ASC
			");
		foreach($googler_query_res as $googler_query_key => $googler_query_value) {
			$query[]          = $googler_query_value['query'];
//			$create_time[] = $googler_query_value['test_time'];
			$unixtime = strtotime($googler_query_value['test_time']);
			$create_time[] = date('Y/m/d', $unixtime);
			$rank[]            = (int)preg_replace('/位/', '',  $googler_query_value['rank']);
			if($keyword_json_key === 0) {
				if($googler_query_key === 0) {
					$backgroundColor .="'rgba(54, 162, 235, 0)',
";
					$borderColor .="'rgba(54, 162, 235, 1)',
";
				}
					$backgroundColor .="'rgba(54, 162, 235, 1)',
";
					$borderColor .="'rgba(54, 162, 235, 1)',
";
			}
				else if($keyword_json_key === 1) {
					if($googler_query_key === 0) {
						$backgroundColor .="'rgba(39, 170, 99, 0)',
";
						$borderColor .="'rgba(39, 170, 99, 1)',
";

					}
					$backgroundColor .="'rgba(39, 170, 99, 1)',
";
					$borderColor .="'rgba(39, 170, 99, 1)',
";
				}
					else if($keyword_json_key === 2) {
						if($googler_query_key === 0) {
							$backgroundColor .="'rgba(255, 177, 69, 0)',
";
							$borderColor .="'rgba(255, 177, 69, 1)',
";
						}
						$backgroundColor .="'rgba(255, 177, 69, 0)',
";
						$borderColor .="'rgba(255, 177, 69, 1)',
";
					}
		}
pre_var_dump('<br>-----------------------------------------');

			$query_json_data              = json_encode($query, JSON_UNESCAPED_UNICODE);
			$create_time_json_data     = json_encode($create_time, JSON_UNESCAPED_UNICODE);
			$rank_json_data                = json_encode($rank, JSON_UNESCAPED_UNICODE);
//echo($rank_json_data);
$glaf_data.= "
			{
	            label: '".$keyword_json_value."',
	            data: ".$rank_json_data.",
				order:1,
	            backgroundColor: [
					".$backgroundColor."
	            ],
	            borderColor: [
					".$borderColor."
	            ],
	            borderWidth: 3,
				tension: 0.3,
				pointRadius: 0,
				pointStyle: 'circle',
	        },";
$query = array();
$create_time = array();
$rank = array();
$color = '';
$backgroundColor = '';
$borderColor = '';
	}
}
	// シングルクウォートに変換
	$create_time_json_data            = preg_replace('/"/', "'",  $create_time_json_data);
	// グラフデータ合体
    $glaf_data="
data: {
        labels: ".$create_time_json_data.",
        datasets: [
		".$glaf_data."
	]
},";
//pre_var_dump( $glaf_data);
?>



<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
	<?php echo $glaf_data; ?>
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
					reverse: true, //y軸の反転(1位を上にして昇順で表示)
					min: 1,  //最小値を1に
					max: 100,  //最大値を100に
					callback: function(value) {
						return value+'位';  //labelに「〜位」をつける
                	}
				}
            }]
        },
		tooltips: {
			intersect: false,
			mode: 'index',
			callbacks: {
				label: function(tooltipItem, myData) {
					var label = myData.datasets[tooltipItem.datasetIndex].label || '';
					if (label) {
					}
					label = label+'：'+tooltipItem.value+'位';
					return label;
				}
			}
		}
    }
});














































/*
原本
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],




        datasets: [
			{
	            label: 'キーワード',
	            data: [100, 19, 3, 5, 2, 3, 20,12, 19, 3, 5, 2, 3, 20,100, 19, 3, 5, 2, 3, 20,12, 19, 3, 5, 2, 3, 20,100, 19, 3, 5, 2, 3, 20,12, 19, 3, 5, 2, 3, 20,100, 19, 3, 5, 2, 3, 20,12, 19, 3, 5, 2, 3, 20],


				order:1,
	            backgroundColor: [
	                'rgba(255, 159, 64, 0)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	            ],
	            borderColor: [
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	            ],
	            borderWidth: 3,
				tension: 0.3,
				pointRadius: 3,

				pointStyle: 'circle',
	        },

		] // datasets: [
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
					reverse: true, //y軸の反転(1位を上にして昇順で表示)
					min: 1,  //最小値を1に
					max: 100,  //最大値を100に
					callback: function(value) {
						return value+'位';  //labelに「〜位」をつける
                	}
				}
            }]
        },
		tooltips: {
			intersect: false,
			mode: 'index',
			callbacks: {
				label: function(tooltipItem, myData) {
					var label = myData.datasets[tooltipItem.datasetIndex].label || '';
					if (label) {
					}
					label = tooltipItem.value+'位';
					return label;
				}
			}
		}
    }
});
*/

</script>