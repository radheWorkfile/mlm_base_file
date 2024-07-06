<div class="row">
<div class="col-sm-12 " style="overflow-x:auto;">
        <table class="table table-responsive">
            <thead style="background-color:#aaabb7;">
                <tr>
                    <th>S.no</th>  
                    <th>UserID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Total Amount</th>
                    <th>Request date</th>
                    <th>Action</th>                 

                </tr>              
            </thead>
            <tbody>
                <?php foreach($request as $i=>$req):?>
                <tr>
                    <td><?php echo ++$i;?></td>
                    <td><?php echo config_item('ID_EXT').$req['requested_by'];?></td>
                    <td><?php echo $req['name'];?></td>
                    <td><?php echo $req['epin_qty'];?></td>
                    <td><?php echo $req['total_amount'];?></td>
                    <td><?php echo date('d M Y',strtotime($req['request_date']));?></td>
                    <td><a href="javascript:void(0);" data-id="<?php echo $req['id']  ?>" class="viewreq" data-toggle="modal" data-target="#view"><i class="fa fa-eye text-danger"></i></a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    </div>
</div>




<!-- model start -->

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EPIN Request Varification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="view_req"></div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<!-- model end -->




<script>
   $(document).on('click',".viewreq",function(){
        var id=$(this).data('id');
       $.ajax({
        url:"<?php echo base_url()?>"+'Admin/get_epin_request',
        type:'post',
        data:{'request_id':id},
        success:function(data)
        {
            $("#view_req").html(data);
        }

       });
   });
</script>