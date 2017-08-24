<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="">?</th>
            <th class="">Name</th>
            <th class="">Email/Login</th>
            <th class="">Phone</th>
            <th class="">Skype</th>
            <th class="">Role</th>
            <th class="">Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align:center;" class="">1</td>
            <td class="">user123</td>
            <td style="text-align:center;" class="">123@hotmail.com</td>
            <td style="text-align:center;" class="">0123456</td>
            <td style="text-align:center;" class="">user123</td>
            <td style="text-align:center;" class="">Admin</td>
            <td style="text-align:center;">
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal" contenteditable="false">Edit</button>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;" class="">2</td>
            <td class="">user456</td>
            <td style="text-align:center;" class="">456@hotmail.com</td>
            <td style="text-align:center;" class="">0123458</td>
            <td style="text-align:center;" class="">user456</td>
            <td style="text-align:center;" class="">User</td>
            <td style="text-align:center;">
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Edit</button>
            </td>
        </tr>
    </tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Modal title</h4>

            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>