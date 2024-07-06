<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Codepeople India
 * This project is developed and maintained by Codepeople India.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Codepeople India
 **************************************************************************************************/
?><?php echo form_open_multipart() ?>

<?php $news = $this->db->get('news')->result_array();
?>

<div class="row">
    <div class="form-group">
        <div class="col-sm-12">
            <label>News Description</label>
            <textarea class="form-control" id="editor" name="description"><?php echo (empty($news))? set_value('description') : $news[0]['description'] ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
  <?php echo form_close() ?>
</div>
