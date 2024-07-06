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
    @media print{

    
    .front {
        width: 2.125in;
        height: 3.375in;      
        background: url("<?php echo base_url() ?>uploads/id_card/front1.jpg") center / cover no-repeat;
        background-position: center;       
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
        margin-top: 1px;
        color:black;
    }

    p {
        line-height: 0.1;
        font-weight: 600;
        
    }

   
    .company{
        margin-top: 10px;
    }

   
/* back design start */
    .back {
        width: 2.125in;
        height: 3.375in;       
        background: url("<?php echo base_url() ?>uploads/id_card/back.jpg") center / cover no-repeat !important;
        background-position: center;      
        border: 2px SOLID BLACK;
    }
    .sign {
        margin-top: 115px;
        margin-left: 50px;
    }
    .company p {
        line-height: normal;
        text-align: justify;
        font-size: 10px;
        padding: 0px 10px;

    }


}

    /* POTRAIT DESIGN END */
</style>

<div style="margin: 2% 20%; display: inline-flex">




    <!-- pOTRAIT DESIGN START -->



    <div class="front">
        <div class="img" style="width: 70px; height: 70px; margin-top: 12px; margin-left: 65px">
            <img src="<?php echo ($user->my_img) ? base_url() . $user->my_img : base_url() . 'uploads/default.jpg' ?>" style="max-width: 100%; border-radius: 50%;border:2px solid white" alt="" />
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
                    <td>:<?php echo ($user->email)?$user->email:'N/A';?></td>
                </tr>
            </table>
        </div>

        <div class="company">
            <p style="text-align: center;margin-top: 30px;">
                <img src="<?php echo base_url() ?>uploads/id_card/logo.png" alt="logo" style="width: 80%" />
            </p>
            <h4 style="text-align: center; margin-top: -5px"><?php echo config_item('company_name');?></h4>
        </div>
    </div>

    <div style="margin: 10px; "></div>

    <div class="back">
        <div class="company">
            <p style="text-align: center">
                <img src="<?php echo base_url() ?>uploads/id_card/logo.png" alt="logo" style="width: 80%" />
            </p>
            <p><?php echo config_item('company_address');?> </p>
        </div>
        <div class="sign">
            <p><img src="<?php echo base_url() ?>uploads/id_card/sign.png" alt="" style="max-width: 50%;" /></p>
            <p>Auth Sign</p>
        </div>

        <div>
        <h4 style="text-align: center; margin-top: 95px"><?php echo config_item('company_name');?></h4>
        </div>

    </div>

    <!-- pOTRAIT  DESIGN END -->
</div>





