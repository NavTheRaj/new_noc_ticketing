<?php 
include ('conf.php');
include ('header.php');
?>

<meta http-equiv="refresh" content="60">
<hr>
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>List of Acknowledged Nodes</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					<i class="fa fa-wrench"></i>
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Settings 1</a>
					<a class="dropdown-item" href="#">Settings 2</a>
				</div>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
		<div class="row">
		<!--div for table column -->
		<div class="col-sm-12">
		<div class="card-box table-responsive">

		<table id="table_ack" class="exportTable table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Host Name</th>
									<th>Interface</th>
									<th>Description</th>
									<th>Status</th>
							<th class="js-not-exportable">Action</th>

						<!-- </tr>
							<tr id="filters">
							<th class="filterhead">Host Name</th>
							<th class="filterhead">Interface</th>
							<th class="filterhead">Description</th>
							<th class="filterhead">Status</th>
							<th class="filterhead"></th>	

								</tr>  -->


	</thead>


							<tbody>
<?php
$result = $con->query("
	select hostname,interface,description,node_status from tbl_host h JOIN tbl_node n ON h.id=n.hid JOIN tbl_ack a ON n.id=a.nid;
");

while($row = mysqli_fetch_array($result))
{	$stat=$row['node_status']; //node_status is from tbl_ack for acknowlegded nodes.

if ($stat==0){echo "<tr style='color:red;'>";}
else if ($stat==1){echo "<tr style='color:blue;'>";}
else {echo "<tr style='color:green;'>";}
echo "<td>".$row['hostname']."</td>";
echo "<td>".$row['interface']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td>";
//converting 0=Acknowledged,1= Up but not resolved and 2=Resolved from tbl_ack
if($stat==0){ echo "Acknowleged";}
else if($stat==1){echo "Up not resolved";}
else{echo "Resolved";}
echo "</td>";
echo "<td>
	<center><div class='btn-group mr-2' role='group' aria-label='First group'>
	<a href='#' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-eye-open' style='color:#ffff' data-toggle='tooltip' title='View Logs'></span></a>
	</div></center>
	</td>";
echo "</tr>";
}
mysqli_close($con);
?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php
include ('footer.php');
?>
