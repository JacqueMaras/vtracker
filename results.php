<?php include 'connect.php'; ?>
<style type="text/css">
th {
	background-color: #36BB4C;
	text-align: center;
	padding: 5px;
	color: #fff;
}

td{
	background-color: #93D59D;
	text-align: center;
	padding: 5px;
	color: #000;
}
</style>
<table>
	<thead>
		<tr>
			<th>IP Address</th>
			<th>Location</th>
			<th>Is it a web bot</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Date</th>
			<th>Time</th>
			<th>Hostname</th>
			<th>Provider (org)</th>
			<th>Useragent</th>
			<th>From</th>
			<th>URL</th>
			<th>Query string</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = "SELECT * FROM vtracker";
		$result = $mysqli->query($query);
		while ($row = $result->fetch_array()) {
			if(!isset($row['has_host'])){
				$row['has_host'] = 0;
			}
			if(!isset($row['hostname'])){
				$row['hostname'] = 0;
			}
			echo "<tr>";
			echo "<td>{$row['ip']}</td>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['is_bot']}</td>";
			echo "<td>{$row['lat']}</td>";
			echo "<td>{$row['long']}</td>";
			echo "<td>{$row['date']}</td>";
			echo "<td>{$row['time']}</td>";
			echo "<td>{$row['hostname']}</td>";
			echo "<td>{$row['org']}</td>";
			echo "<td>{$row['ua']}</td>";
			echo "<td>{$row['from']}</td>";
			echo "<td>{$row['url']}</td>";
			echo "<td>{$row['querystr']}</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<h2>Results</h2>";
		$result_num = $mysqli->query("SELECT DISTINCT ip FROM vtracker");
		$result_num_ = $mysqli->query("SELECT DISTINCT location, latlong, org, is_bot FROM vtracker");
		echo "Unique IP addresses: <strong>".$result_num->num_rows."</strong><br />";
		echo "Unique Computers: <strong>".$result_num_->num_rows."</strong><br /><br />";
		$unique_computers = $result_num_->num_rows;
		$unique_ips = $result_num->num_rows;
		$month_num = $mysqli->query("SELECT DISTINCT month FROM vtracker");
		$average_per_month = $unique_computers/$month_num->num_rows;
		echo "The average unique computers per month: ".$average_per_month."<br />";
		$average_ips_per_month = $unique_ips/$month_num->num_rows;
		echo "The average unique ip addresses per month: ".$average_ips_per_month."<br /><br />";
		
		$hourly_num = $mysqli->query("SELECT DISTINCT hour FROM vtracker");
		$average_per_hour = $unique_computers/$hourly_num->num_rows;
		echo "The average unique computers per hour: ".$average_per_hour."<br />";
		$average_ips_per_hour = $unique_ips/$hourly_num->num_rows;
		echo "The average unique ip addresses per hour: ".$average_ips_per_hour."<br />";
		?>
	</tbody>
