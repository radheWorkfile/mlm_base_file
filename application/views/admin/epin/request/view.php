<div class="row">
   
    <div class="col-md-12">
        <a href="<?php echo base_url() . $request['screenshot_document']; ?>" target="_blank">
            <img src="<?php echo base_url() . $request['screenshot_document']; ?>" alt="<?php echo base_url() . $request['screenshot_document']; ?>" style="max-width: 100%;">
        </a>
    </div>
    <div class="col-md-12 ">
        <p class="mt-2">
            <a href="<?php echo base_url()."admin/request_generate_epin/{$request['id']}"?>" class="btn btn-primary">Generate Epin</a>
            <a href="<?php echo base_url()."admin/block_epin_request/{$request['id']}"?>" class="btn btn-danger">Block Request</a>
        </p>
    </div>
</div>