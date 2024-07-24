<?php
include "../links/include.php";

error_reporting(0);
session_start();
$con = new mysqli("localhost", "root", "", "water_project");
date_default_timezone_set('Asia/Karachi');
$date = date("m/d/Y");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- -----------------------------------------style of search bar------------------------------------------------------- -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



<!-- -----------------------------------------input search bar------------------------------------------------------- -->

      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->




  <!-- <link href="path/to/select2.min.css" rel="stylesheet" />
    <script src="path/to/select2.min.js"></script> -->



  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



    <style>
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

        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 0px !important;
        }
    </style>
    <title>Hello, world!</title>

</head>

<body>
    <div id="alert"></div>
    <h1 class="text-center">Selling product</h1>
    <form action="./" method="POST" id="form_data">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-info me-md-2 add_item btn-default" type="button"><i class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="">Selcet Product</label>
                            <select class="form-control select2"  name="porduct" required>
                                <option value="">Select Product</option>
                                <?php
                                $query = "SELECT * FROM product";
                                $sql = $con->query($query);
                                while ($row = $sql->fetch_array()) {
                                ?>
                                    <option><?php echo $row['product']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="">Date</label>
                            <input name="date" type="text" value="<?php echo $date; ?>" class="form-control" required>
                        </div>
                    </div>
                    <hr style="border: 1px solid #ff0000;">
                    <!-- ---------------------------------------------------------------------------- -->
                    <div id="show_id">
                        <div>
                            <div class="form-group row ">
                                <div class="col-md-3">
                                    <label for="">Customer</label>
                                    <select name="customer[]" class="form-select select2" aria-label="Default select example" required>
                                        <option value="">Select Customer</option>
                                        <?php
                                        $query = "SELECT * FROM register";
                                        $sql = $con->query($query);
                                        while ($row = $sql->fetch_array()) {
                                        ?>
                                            <option><?php echo $row['customer']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Bottle delivered</label>
                                    <input name="bd[]" type="number" class="form-control" id="phone" placeholder="Enter Bottle delivered" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Bottle revered</label>
                                    <input name="br[]" type="number" value="0" class="form-control" id="phone" placeholder="Enter Bottle revered">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Payment</label>
                                    <input name="payment[]" value="0" type="number" class="form-control" id="phone" placeholder="Payment" required>
                                </div>
                            </div>                            <hr style="border: 1px solid #ff0000;">
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------- -->
                    <input type="submit" value="Add" class="btn btn-primary w-25 btn-default" id="save_data">
                    <button class="btn btn-info  add_item btn-default" type="button"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
        </div>
        </form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 

<script>
    $(document).ready(function() {

        $(".add_item").click(function(e) {
    e.preventDefault();
    $("#show_id").prepend('<div class="append_items">\
        <button type="submit" class="btn btn-danger mb-4 remove_item btn-default"><i class="bi bi-dash-lg"></i></button>\
        <div class="form-group row ">\
            <div class="col-12 col-md-3">\
                <label for="">Select Customer</label>\
                <select name="customer[]" class="form-select select2" aria-label="Default select example">\
                    <?php
                        $query = "SELECT * FROM register";
                        $sql = $con->query($query);
                        while ($row = $sql->fetch_array()) {
                    ?>\
                    <option><?php echo $row['customer']; ?></option>\
                    <?php } ?>\
                </select>\
            </div>\
            <div class="col-12 col-md-3">\
                <label for="">Bottle delivered</label>\
                <input name="bd[]" type="number" class="form-control" id="phone"\
                placeholder="Enter Bottle delivered" required>\
            </div>\
            <div class="col-12 col-md-3">\
                <label for="">Bottle returned</label>\
                <input name="br[]" type="number" class="form-control" id="phone"\
                placeholder="Enter Bottle returned" required>\
            </div>\
            <div class="col-12 col-md-3">\
                <label for="">Payment</label>\
                <input name="payment[]" value="0" type="number" class="form-control" id="phone"\
                placeholder="Enter Payment" required>\
            </div>\
        </div>\
        <hr style="border: 1px solid #ff0000;">\
    </div>');

    // Call the select2 method on the newly added select element
    $('.select2').select2();
});

                        $(document).on('click', '.remove_item', function(e) {
                            e.preventDefault();
                    let row_item = $(this).parent();
                    $(row_item).remove();
                });
                
                $("#form_data").submit(function(e) {
                    e.preventDefault();
                    $("#save_data").val('Adding...');
                    $.ajax({
                        url: 'php_of_selling_product.php', // replace with a valid URL
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $("#save_data").val('Add');
                            // // $("#save_data").val('Add');
                            $('#form_data')[0].reset();
                            $(".append_items").remove();
                            $("#alert").html(
                                '<p>' + response + '</p>'
                                )
                                // console.log(response);
                                
                            }
                        });
                    });
    
                });
        </script>
 
 <script>
     $(document).ready(function() {
        $('.select2').select2();

        var dateFormat = "dd/mm/yy";
        var from = $("#from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: dateFormat,
        }).on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        });
        
        var to = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: dateFormat,
        }).on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });
        
        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }
            return date;
        }
    });
</script>

</script>
<!-- ------------------------------------------------------------------------------------------ -->
</body>

</html>