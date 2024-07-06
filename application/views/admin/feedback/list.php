<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<a href="<?php echo base_url()?>admin/add_feedback" class="btn btn-danger" style="float:right;"><i class="fa fa-plus"></i> feedback</a>
<br>
<br>

<div class="table-responsive">
    <table class="table table-striped" id="example" style="font-size:13px">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Feedback</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sn = 1;
            foreach ($feedback as $f) { ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $f->name; ?></td>
                    <td><?php echo $f->feedback; ?></td>
                    <td><?php echo $f->status; ?></td>
                    <td>
                        <?php if ($f->status == 'Published') { ?>

                            <a href="javascript:void(0);" onclick="publishe('<?php echo $f->id ?>','Unpublished')" class="btn btn-danger">Unpublished</a>
                        <?php } else { ?>
                            <a href="javascript:void(0);" onclick="publishe('<?php echo $f->id ?>','Published')" class="btn btn-success">Published</a>
                            <?php } ?>&emsp;
                            <!-- <a href="javascript:void(0);" class="text-warning" title="Click to Edit record"><i class="fa fa-edit"></i></a>&emsp; -->
                            <a href="javascript:void(0);" onclick="deleted('<?php echo $f->id ?>')" class="text-danger" title="Click to Delete record"><i class="fa fa-trash"></i></a>&emsp;


                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
<!-- <a onclick="return confirm('Are you sure you want to delete this Member ?')"
                        href="<?php echo site_url('users/remove_member/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a> -->


<script>
    var base_url='<?php echo base_url();?>'
    function deleted(id) {
        // alert(id);
        $.ajax({
            type: 'post',
            url: base_url + 'admin/delete_feedback',
            data: {
                'id': id
            },
            // dataType: 'json',
            success: function(data) {
                // alert('Delete successfully');
                window.location.reload(true);
            }
        });

    }

    function publishe(id,type)
    {
        // alert(type)
        $.ajax({
            type: 'post',
            url: base_url + 'admin/publishe',
            data: {
                'id': id,
                'type':type
            },
            // dataType: 'json',
            success: function(data) {
                // alert('updated successfully');
                window.location.reload(true);
            }
        });
    }
</script>