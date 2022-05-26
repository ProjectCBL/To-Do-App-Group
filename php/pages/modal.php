<div class="modal fade" id="modalEditor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" class="form-container" method="POST">

                    <h5 for="title" class="mt-1" style="position: relative; left:-39%;">Task:</h5>
                    <input type="text" id="title" name="task" class="form-control" style="width: 100%;" required>

                    <h5 class="mt-3" style="position: relative; left:-28%;">Description:</h5>
                    <textarea class="form-control" id="description" name="description" rows="3" style="width: 100%;"></textarea>

                    <h5 class="mt-3" style="position: relative; left:-36%;">Status:</h5>
                    <select class="form-control" style="width: 100%;" id="status" name="status">
                        <option>Not-Started</option>
                        <option>In-Progress</option>
                        <option>Done</option>
                        <option>OverDue</option>
                    </select>

                    <h5 class="mt-3" style="position: relative; left:-26%;">Date & Time:</h5>
                    <input id="due-date" type="date" name="dateTime" class="form-control" style="width: 100%;"> <br>

                </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                <button id="task" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>