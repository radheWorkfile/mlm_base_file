<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<?php
// echo "<pre>";
// print_r($this->session->userdata());
// die;

$member = $this->db->select('my_img')->where('id', $this->session->user_id)->get('member')->row();


?>
<div id="message"></div>

<form method="post" id="image_update">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6 text-center">
        <img  src="<?php echo ($member->my_img) ? base_url() . $member->my_img : base_url() . 'uploads/default.jpg' ?>" alt="profile image" style="max-width: 100%;">
        <img  id="preview" src="" alt="">

        <p style="background:#260e0e; padding:10px; margin:5px 0px">

            <label>Update Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
            <input type="hidden" class="form-control" name="mem_id" value="<?php echo $this->session->user_id; ?>">
            <br>
            <button type="submit" id="sub" class="btn btn-primary">Update</button>
        </p>
    </div>
    <div class="col-sm-3">
    </div>
</form>
<br />
<p>&nbsp;</p>
<script>
    $(document).ready(function() {

        $('#image').on('change', function() {
            var img = $('#image').val();
            $('#preview').attr('src', img);
        });


    });





    var base_url = '<?php echo base_url(); ?>';

    $('#image_update').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: base_url + 'Member/update_image',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'JSON',
        beforeSend: function() {
            $("#sub").html('<button type="submit" id="sub" class="btn btn-primary">uploading...</button>');

        },
        success: function(data) {

            if (data.icon == 'success') {
                $('#message').html(data.text);
            } else {
                $('#message').html(data.text);
            }

            setTimeout(function() {
                window.location.reload(true);
            }, 2000);

        }
    });
    });
    });
</script>