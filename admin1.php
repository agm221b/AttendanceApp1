
<!DOCTYPE html>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">

		body {
			background-image: url("https://i.pinimg.com/originals/a7/b7/ef/a7b7efe38d4fcf77e5069f720ccb46e8.jpg");
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: center;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:nth-child(even) td {
			background-color: #ccccb3;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body >
			<?php
			echo "<table class='data-table'>
				<caption class='title'><h1 style='font-family : courier;font-size:30px;color : white'>Attendence Table</h1></caption>
				<thead>
					<tr>
					<th>DATE</th>
					<th>R1</th>
					<th>R2</th>
					<th>R3</th>
					<th>R4</th>
					</tr>
				</thead>";
			echo "<tbody>";
			$db_host = 'localhost'; // Server Name
			$db_user = 'root'; // Username
			$db_pass = ''; // Password
			$db_name = 'attendance'; // Database Name

			$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
			if (!$conn) {
				die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
			}

			$sql = 'SELECT * 
					FROM studreg';
					
			$query = mysqli_query($conn, $sql);

			if (!$query) {
				die ('SQL Error: ' . mysqli_error($conn));
			}
			while($row = mysqli_fetch_array($query))
			  {
			   echo "<tr align='center'>";
				  echo "<td>" . $row['date'] . "</td>";
				  echo "<td>" . $row['1'] . "</td>";
				  echo "<td>" . $row['2'] . "</td>";
				  echo "<td>" . $row['3'] . "</td>";
				  echo "<td>" . $row['4'] . "</td>";
				  //echo "<td>" . $row['r5'] . "</td>";
				  echo "</tr>";
			  }
			echo "</tbody>";               
			echo "</table>";
		?>
		<p style="padding-top: 200px; text-align: center;color: black;opacity: 0.1">x~~~~~x</p>
</body>
</html> 