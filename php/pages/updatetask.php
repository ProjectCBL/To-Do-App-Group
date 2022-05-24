<div class="container">
    <div class="row">
        <div class="col" />
        <div class="col">
            <div class="input-group">
                <form action="" class="form-container" method="POST">
                    <h2>Update Task</h2> <br>

                    <?php

                        require_once(__DIR__ . "/../config/lib.php");

                        session_start();

                        $_SESSION["url"] = "update";

                        $id = $_GET["tID"];
                        $username = $_SESSION["username"];

                        $todoDB->connect();

                        $row = mysqli_fetch_assoc($todoDB->getTask($id));

                        echo '<h4 for="title">Task:</h4>';
                        echo '<input type="text" id="title" name="task" class="form-control" style="width: 100%;" required>';

                        echo "<script>$('#title').attr('value', '" . $row["Title"] . "');</script>";

                        echo '<br> <br>';

                        echo '<h4>Description:</h4>';
                        echo '<textarea class="form-control" id="description" name="description" rows="3" style="width: 100%;"></textarea> <br> <br>';

                        echo "<script>$('#description').append('" . $row["Description"] . "');</script>";

                        echo '<h4>Status:</h4>';
                        echo '<select class="form-control" style="width: 100%;" id="status" name="status">
                                <option>Not-Started</option>
                                <option>In-Progress</option>
                                <option>Done</option>
                                <option>OverDue</option>
                            </select>';

                        echo "<script>$('#status').val('" . $row["Status"] . "').change();</script>";

                        echo '<br> <br>';

                        echo '<h4 >Date & Time:</h4>';
                        echo '<input id="due-date" type="date" name="dateTime" class="form-control" style="width: 100%;"> <br> <br>';

                        echo "<script>$('#due-date').val('" . $row["DueDate"] . "');</script>";

                        $todoDB->close();

                        echo '<div class="d-flex">';
                        echo '<button id="update-task' . $id . '" type="button" class="btn btn-success" style="margin: 1%;">Update</button>';
                        echo '<button id="back-to-todo" type="button" class="btn btn-info" style="margin: 1%;">Cancel</button>';
                        echo '<button id="delete' . $id . '" type="button" class="btn cancel" style="margin: 1%;">Delete</button>';
                        echo '</div>';

                    ?>


                </form>
            </div>
        </div>
        <div class="col" />
    </div>
</div>