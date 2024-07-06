<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>

<style>
    /* POTRAIT DESIGN START */
    .front {
        width: 2.125in;
        height: 3.375in;
        /* border:1px solid aquamarine;  */
        /* background-color: aquamarine; */
        background: url("<?php echo base_url() ?>uploads/id_card/front1.jpg") center / cover no-repeat;
        background-position: center;
        /* background-attachment:fixed; */
        /* background-origin: border-box; */

        /* background-size: 100%; */
        border: 2px SOLID BLACK;
    }

    .back {
        width: 2.125in;
        height: 3.375in;
        /* border:1px solid aquamarine;  */
        /* background-color: aquamarine; */
        background: url("<?php echo base_url() ?>uploads/id_card/back.jpg") center / cover no-repeat;
        background-position: center;
        /* background-attachment:fixed; */
        /* background-origin: border-box; */

        /* background-size: 100%; */
        border: 2px SOLID BLACK;
    }

    table {
        margin-top: 80px;
        margin-left: 30px;
    }

    table tr td {
        color: rgb(0, 0, 0);
        font-size: 10px;
        font-weight: 600;
    }

    .emp_info {
        margin-top: 10px;
    }

    p {
        line-height: 0.3;
        font-weight: 600;
        color:black
    }

    .company p {
        line-height: normal;
        text-align: justify;
        font-size: 10px;
        padding: 0px 10px;

    }
    .company{
        margin-top: 10px;
    }

    .sign {
        margin-top: 105px;
        margin-left: 95px;
    }

    /* POTRAIT DESIGN END */
</style>

<div style="margin: 2% 20%; display: inline-flex">




    <!-- pOTRAIT DESIGN START -->



    <div class="front">
        <div class="img" style="width: 70px; height: 70px; margin-top: 12px; margin-left: 65px">
            <img src="<?php echo ($memb->my_img) ? base_url() . $memb->my_img : base_url() . 'uploads/default.jpg' ?>" style="max-width: 100%; border-radius: 50%;border:2px solid white" alt="" />
        </div>
        <div class="emp_info" style="text-align: center">
            <p style="text-transform:uppercase"><?php echo $user->name;?></p>
            <p style="font-size: 10px;"><?php echo ($user->rank=='Agent')?'Agent':'Member';?></p>
        </div>

        <div>
            <table>
                <tr>
                    <td>MemberId</td>
                    <td>:<?php echo config_item('ID_EXT').$user->id;?></td>
                </tr>

                <tr>
                    <td>Mobile</td>
                    <td>:<?php echo $user->phone;?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:<?php echo $user->email;?></td>
                </tr>
            </table>
        </div>

        <div class="company">
            <p style="text-align: center;margin-top: 30px;">
                <img src="<?php echo base_url() ?>uploads/id_card/logo.png" alt="logo" style="width: 80%" />
            </p>
            <h4 style="text-align: center; margin-top: 10px"><?php echo config_item('company_name');?></h4>
        </div>
    </div>

    <div style="margin: 10px"></div>

    <div class="back">
        <div class="company">
            <p style="text-align: center">
                <img src="<?php echo base_url() ?>uploads/id_card/logo.png" alt="logo" style="width: 80%" />
            </p>
            <p><?php echo config_item('company_address');?> </p>
        </div>
        <div class="sign">
            <p><img src="<?php echo base_url() ?>uploads/id_card/sign.png" alt="" style="max-width: 100%;" /></p>
            <p>Auth Sign</p>
        </div>

        <div>
        <h4 style="text-align: center; margin-top: 100px"><?php echo config_item('company_name');?></h4>
        </div>

    </div>

    <!-- pOTRAIT  DESIGN END -->
</div>
<br>


<p style="text-align: center;">

    <a href="javascript:void(0);" class="btn btn-danger"  id="print">Print id Card</a>
</p>


<script>
    var base_url = '<?php echo base_url();?>';
    $(document).on('click','#print',function(){
        $.ajax({
            url:base_url+'member/print_id_card',
            type:"post",
            success:function(data)
            {
                popup(data)
            }
        });
    })


    function popup(data,print=false)
    {
        var base_url = base_url;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');       
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
            if(print){
                  window.location.reload(true);
            }
        }, 500);
        return true;
    }
</script>