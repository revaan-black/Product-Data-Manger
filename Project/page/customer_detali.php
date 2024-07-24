<?php

include "../links/include.php";

$conn = new mysqli("localhost", "root", "", "water_project");
if (isset($_POST['delete'])) {
	$delete_id = $_POST['delete_id'];
	// code to delete the product with id $delete_id
	$deleteProductSql = "DELETE FROM register WHERE id = '$delete_id'";

	if ($conn->query($deleteProductSql) === TRUE) {
		alert("Data Was Deleted Successfully!", "success");
	} else {
		alert("Something Went Wrong!", "danger");
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		@media(max-width: 500px) {
			.table thead {
				display: none;
			}

			.table,
			.table tbody,
			.table tr,
			.table td {
				display: block;
				width: 100%;
			}

			.table tr {
				margin-bottom: 15px;
			}

			.table td {
				text-align: right;
				padding-left: 50%;
				text-align: right;
				position: relative;
			}

			.table td::before {
				content: attr(data-label);
				position: absolute;
				left: 0;
				width: 50%;
				padding-left: 15px;
				font-size: 15px;
				font-weight: bold;
				text-align: left;
			}
		}

		.active-cyan input.form-control[type=text] {
			border-bottom: 1px solid #4dd0e1;
			box-shadow: 0 1px 0 0 #4dd0e1;
		}

		.btn-default {
			background-color: #007bff;
			border: none;
			color: #fff;
			border-radius: 4px;
			padding: 10px 20px;
			transition: all 0.2s ease-in-out;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
		}

		.btn-default:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.5);
		}
	</style>
	<title>Hello, world!</title>

<body>
	<div class="container">
		<form action="./customer_detali.php?page=1" method="post" class=" d-flex justify-content-center md-form form active-cyan active-cyan-2 mb-2">
			<div class="input-group mb-3">
				<input name="param" type="text" class="form-control" id="name" placeholder="Search" required>
				<button name="search" class="btn btn-outline-info" type="submit" id="button-addon2">Search</button>
			</div>
		</form>
		<div class="row">
			<div class="col-6">
				<h1>Customer Information</h1>
			</div>
			<div class="col-6 text-right">
				<button type="button" id="btnExport" class="btn btn-primary btn-default">download table</button>
			</div>
		</div>
		<table id="tblCustomers" class="table table-striped">
			<thead>
				<tr class="bg-info">
					<th>#</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_POST["search"])) {
					$i = "";
					$total_rows = 1;

					$param = $_POST['param'];
					$query = "SELECT * FROM register where customer like \"%$param%\" or email like \"%$param%\" or phone like \"%$param%\" or addres	 like \"%$param%\" ";

					$sql = $conn->query($query);
					// echo $param;
				} else {
					$i = "";
					$limit = 10;
					$query1 = "SELECT count(*) FROM register";
					$sql1 = $conn->query($query1);
					$total_rows = mysqli_fetch_array($sql1)[0];
					$total_page = ceil($total_rows / $limit);
					$page = $_GET["page"];
					$offset = ($page - 1) * $limit;
					$query = "SELECT * FROM register ORDER BY id DESC limit $offset, $limit";
					$sql = $conn->query($query);
				}
				while ($row = $sql->fetch_array()) {
					$customer = $row['customer'];
					$email = $row['email'];
					$phone = $row['phone'];
					$addres = $row['addres'];
					$id = $row['id'];
					$i++;
				?>
					<tr>
						<td class="pro_id" data-label="#"><?php echo $i; ?></td>
						<td data-label="Name"><?php echo $customer; ?></td>
						<td data-label="Email"><?php echo $email; ?></td>
						<td data-label="Phone"><?php echo $phone; ?></td>
						<td data-label="Addres"><?php
							if (strlen($addres) > 20) {
								$addres = substr($addres, 0, 20) . "...";
							}
							echo $addres;
							?></td>
						<td data-label="Action">
							<a href="./update_customer.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-primary btn-sm mb-1">Edit</button></a>
							<button name="detele_btn" data-id="<?php echo $id; ?>" type="submit" class="btn btn-sm btn-danger delete_btn mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Delete
							</button>
							<a href="./view_customer.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-info btn-sm mb-1">view</button></a>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<?php
				if ($total_rows > 10) {

					if ($page > 1) {
				?>
						<li class="page-item">
							<a class="page-link" href="customer_detali.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
					<?php
					}
					for ($i = 1; $i <= $total_page; $i++) {
					?>

						<li class="page-item"><a class="page-link" href="customer_detali.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php
					}
					if ($total_page > $page) {
					?>
						<li class="page-item">
							<a class="page-link" href="customer_detali.php?page=<?php echo $page + 1; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
				<?php
					}
				}
				?>
			</ul>
		</nav>
	</div>
	<!-- ----------------------------------------  MODAL  ------------------------------- -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						Are you sure you want to delete the product?
						<input type="hidden" name="delete_id" id="delete_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="delete" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ----------------------------------------  MODAL  ------------------------------- -->
	<!-- ------------------------------------------------------------------------------------------ -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<script>
		$('.delete_btn').click(function() {
			var id = $(this).data('id');
			$('#delete_id').val(id);
		});
	</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

	<script type="text/javascript">
		$("body").on("click", "#btnExport", function() {
			html2canvas($('#tblCustomers')[0], {
				onrendered: function(canvas) {
					var data = canvas.toDataURL();
					var docDefinition = {
						content: [{
							image: data,
							width: 500
						}]
					};
					pdfMake.createPdf(docDefinition).download("customer-details.pdf");
				}
			});
		});
	</script>
</body>

</html>