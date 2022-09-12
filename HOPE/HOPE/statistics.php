<?php 
include_once 'header.php'
?>
<head>
  <title>Statistics</title>
</head>
<body>
<div class="page-wrapper">
    <div class="grid">
        <div class="one">
            <table id="data-table">
                <tr>
                    <th>Covid Declaration Dates</th>
                </tr>
            </table>
        </div>
        <div class="two">
			<table id="data-table2">
				<tr>
					<th>Visited Stores</th>
					<th>Date</th>
				</tr>
			</table>
		</div>
        <div class="three">
			<table id="data-table3">
				<tr>
					<th>Stores Were There Was Reported Covid Case</th>
					<th>Date</th>
				</tr>
			</table>
		</div>
	</div>
            <!-- <thread>
                <tr>
                    <th>Visited Stores</th>
                    <th>Date</th>
                    <th>Stores Were There Was Reported Covid Case</th>
                    <th>Date</th>
                </tr>
            </thread> -->
</div>
</body>
<script src="scripts/statistics.js"></script>
<?php 
include_once 'footer.php'
?>