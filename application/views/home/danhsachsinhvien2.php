<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Sinh Viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>
<body>
<h2 style="justify-content: center; display: flex;"> Danh Sách Sinh Viên </h2>
<div style="padding: 50px;">
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@getbootstrap">Thêm sinh viên
    </button>

</div>
<div class="container-fluid" ng-app="myApp" ng-controller="customersCtrl">
    <table class="table table-hover" id="myTable">
        <thead>
        <tr>
            <th scope="col">#</th>

            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        </td>

        <?php for ($i = 0; $i < count($sv); $i++) {


            ?>
            <tr>
                <td><?php echo $sv[$i]['ID']; ?></td>
                <td><?php echo $sv[$i]['Name']; ?></td>
                <td><?php echo $sv[$i]['Date']; ?></td>
                <td><?php echo $sv[$i]['Class']; ?></td>
                <td style="display: flex;">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#sua">
                        Edit
                    </button>
                    <button type="button" class="btn btn-primary float-right" id="xoa">Delete</button>
                    <script type="text/javascript">

                        $(function () {
                            $('#myTable button').click(function (e) {
                                e.preventDefault();
                                $('#id').val($(this).closest('tr').find('td:first').text()); //Lấy value cột thứ nhất
                                $('#name').val($(this).closest('tr').find('td:nth-child(2)').text());//Hoặc lấy giá trị cột thứ 2
                                $('#date').val($(this).closest('tr').find('td:nth-child(3)').text());
                                $('#class').val($(this).closest('tr').find('td:nth-child(4)').text());
                            });
                            $('button[id=xoa]').click(function (e) {
                                e.preventDefault();
                                //  alert($(this).closest('tr').find('td:first').text());
                                var txt = $(this).closest('tr').find('td:first').text();
                                var sendInfo = {
                                    ID: txt
                                };
                                $.ajax({
                                    type: "post",
                                    url: "/thunghiem/hello2/delete",
                                    dataType: "json",
                                    success: function () {
                                        location.reload(true);
                                    }, data: sendInfo
                                });
                            });

                        });

                    </script>

            </tr>
        <?php } ?>
        </tbody>
    </table>


    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal');
        $('#sua').on('show.bs.modal');
        $('#xoa').on('show.bs.modal')
    </script>


</div>
</body>
<!-- modal add student -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm sinh viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="Name" id="name1">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Date</label>
                        <input type="date" class="form-control" name="Date" id="date1">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Class</label>
                        <input type="text" class="form-control" name="Class" id="class1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="preventDefault();" class="btn btn-primary" id="add" data-dismiss="modal">
                    Thêm
                </button>
                <script type="text/javascript">

                    $('#add').on('click', function (e) {
                        var date = $('#date1').val();
                        var name = $('#name1').val();
                        var clas = $('#class1').val();
                        var sendInfo = {
                            name: name,
                            date: date,
                            class: clas
                        };
                        $.ajax({
                            type: "get",
                            url: "/thunghiem/hello2/add",
                            dataType: "json",
                            success: function () {
                                alert('Thêm thành công');
                                location.reload(true);
                            },

                            data: sendInfo
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- end add student -->
<!-- modal edit student -->
<div class="modal fade" id="sua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa sinh viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="acb.html">
                    <input type="text" name="ID" hidden="hidden" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Date</label>
                        <input type="date" class="form-control" name="Date" id="date">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Class</label>
                        <input type="text" class="form-control" name="Class" id="class">
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" type="submit" onclick="preventDefault();" class="btn btn-primary" id="edit"
                        data-dismiss="modal">Sửa
                </button>
                <script type="text/javascript">

                    $('#edit').on('click', function (e) {
                        var date = $('#date').val();
                        var name = $('#name').val();
                        var clas = $('#class').val();
                        var id = $('#id').val();
                        var sendInfo = {
                            ID: id,
                            name: name,
                            date: date,
                            class: clas
                        };
                        $.ajax({
                            type: "get",
                            url: "/thunghiem/hello2/edit",
                            dataType: "json",
                            success: function () {
                                //   $( "#html" ).load( "thunghiem/hello2" );
                                alert('Sửa thành công');
                                location.reload(true);
                            },

                            data: sendInfo
                        });
                    });
                </script>
            </div>
            </form>
        </div>
    </div>
</div><!-- end edit student -->


</html>