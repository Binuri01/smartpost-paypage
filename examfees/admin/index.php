<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


    
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="examaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Exam Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertexam.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name Of The Examination </label>
                            <input type="text" name="ename" class="form-control" placeholder="Enter Exam Name">
                        </div>

                        <div class="form-group">
                            <label> Due Date To Accept Fee </label>
                            <input type="date" name="duration" class="form-control" placeholder="Enter Fee Acceptance Duration">
                        </div>

                        <div class="form-group">
                            <label> Fee Amount </label>
                            <input type="number" name="amount" class="form-control" placeholder="Enter Fee Amount">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Exam Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updateexam.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Name Of the Examination</label>
                            <input type="text" name="ename" id="ename" class="form-control"
                                placeholder="Enter Fee Acceptance Duration">
                        </div>

                        <div class="form-group">
                            <label> Due Date To Accept Fee </label>
                            <input type="date" name="duration" id="duration" class="form-control"
                                placeholder="">
                        </div>

                        <div class="form-group">
                            <label> Exam Fee </label>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Exam Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteexam.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Are you sure you want to archive this record?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Archive </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- VIEW POP UP FORM -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Exam Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">

                    <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, 'payments');

                        $query = "SELECT * FROM exams";
                        $query_run = mysqli_query($connection, $query);
                    ?>
                    <div class="modal-body">
                        <input type="hidden" name="view_id" id="update_id">
                        <?php if ($row = mysqli_fetch_assoc($query_run)) { ?>
                            <div class="form-group">
                                <label> Name Of the Examination</label>
                                <input type="text" name="ename" id="ename" class="form-control" placeholder="Enter Fee Acceptance Duration" value="<?php echo $row['ename']; ?>">
                            </div>
                            <div class="form-group">
                                <label> Due Date To Accept Fee </label>
                                <input type="text" name="duration" id="duration" class="form-control" placeholder="" value="<?php echo $row['duration']; ?>">
                            </div>
                            <div class="form-group">
                                <label> Exam Fee </label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount" value="<?php echo $row['amount']; ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        
                    </div>   
            </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container">
    <div class="jumbotron">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examaddmodal">
                        ADD DATA
                    </button>
                    <a href="archive.php">Archive</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Duration </th>
                                <th scope="col"> Amount </th>
                                <th hidden scope="col"> Status </th>
                                <th scope="col"> VIEW </th>
                                <th scope="col"> EDIT </th>
                                <!--<th scope="col"> DELETE </th>-->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection, 'payments');
            
                            $query = "SELECT * FROM exams WHERE status = 1";
                            $query_run = mysqli_query($connection, $query);
                            foreach($query_run as $row){
                        ?>
                        
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['ename']; ?> </td>
                                <td> <?php echo $row['duration']; ?> </td>
                                <td> <?php echo $row['amount']; ?> </td>
                                <td hidden> <?php echo $row['status']; ?> </td>
                                
                                <td><button type="button" class="btn btn-info viewbtn"> VIEW </button></td>
                                <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td>
                                <!--<td><button type="button" class="btn btn-danger deletebtn"> DELETE </button></td>-->
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>
	$(document).ready(function() {
		let table = $('#myTable').DataTable({
			"searching": true,
			"language": {
				"searchPlaceholder": "Search table data"
			}
		});
	});
</script>

<script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
</script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#ename').val(data[1]);
                $('#duration').val(data[2]);
                $('#amount').val(data[3]);
            });
        });
    </script>

</body>

</html>