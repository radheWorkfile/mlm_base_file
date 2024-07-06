<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('axxets/member/theme.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/eggplant/jquery-ui.css">
    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css" type="text/css">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('uploads/favicon.ico') ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>axxets/select2/select2.min.css">
    <style>
        .pro_img {
            position: relative;
        }

        .pro_img .ed {
            color: black;
            font-size: 20px;
            font-weight: 900;

            z-index: 100;
            position: absolute;
            top: 33%;
            left: 50%;
            display: none !important;
        }

        .pro_img:hover .ed {
            display: inline !important;
        }

        @media (max-width:768px) {
            #user {
                font-size: 5px;
            }
        }
    </style>


    <?php $tax_percent = config_item('payout_tax') + config_item('payout_admin_tax'); ?>
</head>

<body>

    <div id="ui" class="ui">

        <!--header start-->
        <header id="header" class="ui-header">

            <div class="navbar-header">
                <!--logo start-->
                <a href="<?php echo site_url('member') ?>" class="navbar-brand">
                    <span class="logo"><img style="max-width: 100px; max-height: 36px" src="<?php echo base_url('uploads/logo.png') ?>" alt="Logo" /></span>
                </a>
                <!--logo end-->
            </div>

            <div class="navbar-collapse nav-responsive-disabled">

                <!--toggle buttons start-->
                <ul class="nav navbar-nav">
                    <li>
                        <a class="toggle-btn" data-toggle="ui-nav" href="">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li>
                        <a style="padding-left:120px !important;" href="<?php echo base_url('member') ?>">Welcome, <?php echo $this->session->name ?>(<?php echo config_item('IT_EXT') . $this->session->user_id ?>)</a>
                    </li>

                </ul>
                <!-- toggle buttons end -->
                <!--notification start-->
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li class="dropdown language-switch">
                        <div id="google_translate_element"></div>
                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'en',
                                    includedLanguages: 'ar,bn,en,gu,hi,kn,mr,ms,pa,ta,te',
                                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                    autoDisplay: false
                                }, 'google_translate_element');
                            }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </li>
                    <?php if (config_item('enable_repurchase') == "Yes") { ?>
                        <a href="<?php echo site_url('cart/pre_checkout') ?>" class="btn btn-danger hidden-xs glyphicon glyphicon-shopping-cart" style="margin: 10px">
                            Cart: <?php echo count($this->cart->contents()) ?> </a>
                    <?php } ?>
                    <li class="dropdown dropdown-usermenu">
                        <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="hidden-sm hidden-xs" style="font-weight: bold">
                                <?php  $memb = $this->db->select('my_img')->where('id', $this->session->user_id)->get('member')->row(); ?>
                                <img src="<?php echo ($memb->my_img) ? base_url() . $memb->my_img : base_url() . 'uploads/default.jpg' ?>" alt="<?php echo $this->session->name ?>" style="width: 30px;height: 30px; border:1px solid black;border-radius:50%">
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo site_url('member/settings') ?>"><i class="fa fa-cogs"></i> Settings</a>
                            </li>
                            <li><a href="<?php echo site_url('member/proile') ?>"><i class="fa fa-user"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--notification end-->

            </div>

        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside id="aside" class="ui-aside">
            <ul class="nav" ui-nav>
                <li>
                    <p class="pro_img" style="text-align:center">
                        <img src="<?php echo ($memb->my_img) ? base_url() . $memb->my_img : base_url() . 'uploads/default.jpg' ?>" alt="<?php echo ($memb->my_img) ? base_url() . $memb->my_img : base_url() . 'uploads/default.jpg' ?>" style="width:100px;height:100px;border:1px solid gray; border-radius:50%;">
                        <a href="<?php echo base_url() ?>Member/update_profile_pic" class="ed"><i class="fa fa-edit"></i></a>
                    </p>
                </li>
                <li class="active">
                    <a href="<?php echo base_url('member') ?>">Hi, <?php echo $this->session->name ?><br />(
                        My ID
                        : <?php echo config_item('IT_EXT') . $this->session->user_id ?>)
                        <?php echo ($topup > 0) ? "<span class='text-success ' style='font-weight:900; font-size:15px'>Active</span>" : "<span class='text-danger' style='font-weight:900; font-size:15px'>Inactive</span>"; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('member') ?>"><i class="fa fa-home"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('member/welcome-letter') ?>"><i class="fa fa-file-text-o"></i><span> Welcome Letter</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('member/business') ?>"><i class="fa fa-file-text-o"></i><span> Business Plan</span></a>
                </li>
                <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                    <li>
                        <a href="<?php echo site_url('member/my-invoices') ?>"><i class="fa fa-print"></i><span> My Invoices</span></a>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_epin') == "Yes") { ?>
                    <li>
                        <a href="#"><i class="fa fa-xing-square"></i><span>My e-PINs</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('member/unused-epin') ?>"><span>Un-Used e-PINs</span></a></li>
                            <li><a href="<?php echo site_url('member/used-epin') ?>"><span>Used e-PINs</span></a></li>
                            <li><a href="<?php echo site_url('member/transfer-epin') ?>"><span>Transfer e-PIN</span></a>
                            </li>
                            <li><a href="<?php echo site_url('member/generate-epin') ?>"><span>Generate e-PIN</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('member/requestfor-epin') ?>"><i class="fa fa-key"></i><span>Request for e-PIN</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_topup') == "Yes") { ?>
                    <li>
                        <a href="#"><i class="fa fa-xing-square"></i><span>Upgrade</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('member/topup_member') ?>"><span>Topup Member</span></a></li>
                            <li><a href="<?php echo site_url('member/topup_list') ?>"><span>Topup List</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-money"></i><span>My Earnings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('member/view-earning') ?>"><span>My Earnings</span></a></li>
                            <li><a href="<?php echo site_url('member/search-earning') ?>"><span>Search Earnings</span></a>
                            </li>
                            <?php if (config_item('enable_reward') == "Yes") { ?>
                                <li><a href="<?php echo site_url('member/my-rewards') ?>"><span>My Rewards</span></a></li>
                            <?php } ?>
                            <li><a href="<?php echo site_url('wallet/transfer-balance') ?>"><span>Transfer Fund</span></a>
                            </li>
                            <?php if (config_item('user_withdraw') == "Yes") { ?>
                                <li>
                                    <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><span>Withdraw Payouts</span></a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo site_url('wallet/withdrawal-list') ?>"><span>Payout Report</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('wallet/balance-transfer-list') ?>"><span>Balance Transfer Report</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href=""><i class="fa fa-sitemap"></i><span>Tree & Downline</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('tree/genealogy') ?>"><span>My Genealogy</span></a></li>
                        <li><a href="<?php echo site_url('tree/my-tree') ?>"><span>My Downline Tree</span></a></li>
                        <li><a href="<?php echo site_url('tree/alldownline') ?>"><span>All Downline List</span></a>
                        <li><a href="<?php echo site_url('tree/directlist') ?>"><span>Direct Referrer List</span></a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>"><span>Add Member</span></a>
                        </li>
                    </ul>
                </li>
                <?php if (config_item('enable_help_plan') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-gift"></i><span>My Donations</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('donation/sent-donation') ?>"><span>Sent History</span></a>
                            </li>
                            <li><a href="<?php echo site_url('donation/received-donation') ?>"><span>Received History</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_repurchase') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-shopping-cart"></i><span>My Purchases</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('cart/new-purchase') ?>"><span>New Purchase</span></a></li>
                            <li><a href="<?php echo site_url('cart/old-purchase') ?>"><span>Old Purchases</span></a></li>
                            <li><a href="<?php echo site_url('cart/pre-checkout') ?>"><span>My Cart</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_recharge') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-mobile-phone"></i><span>Recharge Zone</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('recharge/new-recharge') ?>"><span>New Recharge</span></a></li>
                            <li><a href="<?php echo site_url('recharge/old-recharges') ?>"><span>Old Recharges</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if (config_item('enable_coupon') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-code"></i><span>My Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('coupon/unused') ?>"><span>Un Used Coupons</span></a></li>
                            <li><a href="<?php echo site_url('coupon/used') ?>"><span>Used Coupons</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_ad_incm') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-bullhorn"></i><span>Advertisements</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('ads/myads') ?>"><span>My Ads</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_investment') == "Yes") { ?>
                    <li>
                        <a href=""><i class="fa fa-bitcoin"></i><span>My Investments</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li><a href="<?php echo site_url('investments/new_invest') ?>"><span>New Investments</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('investments/recent_investment') ?>"><span>Recent Investments</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('investments/expired_investment') ?>"><span>Expired Investments</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_survey') == "Yes") { ?>

                    <li><a href="<?php echo site_url('survey/mysurveys') ?>"><i class="fa fa-list"></i>
                            <span>My Surveys</span></a>
                    </li>

                <?php } ?>
                <li>
                    <a href=""><i class="fa fa-question"></i><span>My Support</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('ticket/new-ticket') ?>"><span>New Support Request</span></a></li>
                        <li><a href="<?php echo site_url('ticket/old-Supports') ?>"><span>List Tickets</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class=" fa fa-cog" aria-hidden="true"></i><span>My Profile & Setting</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('member/proile') ?>"><span>My Profile</span></a></li>
                        <li><a href="<?php echo site_url('member/id_card') ?>"><span>My Id Card</span></a></li>

                        <li><a href="<?php echo site_url('member/settings') ?>"><span>Setting & Password</span></a></li>
                        <li><a href="<?php echo site_url('member/pin_settings') ?>"><span>Transaction pin</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </li>
            </ul>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <div id="content" class="ui-content ui-content-aside-overlay">
            <div class="ui-content-body">

                <div class="ui-container">

                    <div class="row">
                        <?php
                        echo validation_errors('<div class="alert alert-danger">', '</div>');
                        echo $this->session->flashdata('common_flash');
                        $this->session->set_flashdata('common_flash','');
                        echo $this->session->flashdata('common_flash');

                        if (trim($layout) !== "") {
                            echo "<h3 style='color: #3c3c3c'>" . $title . "</h3><hr/>";
                            include_once $layout;
                        } else {

                            if (config_item('enable_help_plan') == "Yes") {
                        ?>

                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="panel panel-default-light panel-card border-default rounded">
                                            <div class="panel-heading">
                                                <div class="panel-title">Total Help Sent:
                                                </div>
                                            </div><!-- /.panel-heading -->

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-item">
                                                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                                                                            'status'    => 'Accepted',
                                                                                                            'sender_id' => $this->session->user_id,
                                                                                                        )) ?></strong>
                                                    </div><!-- /.col-xs-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.panel-body -->
                                        </div><!-- /.panel -->
                                    </div><!-- /.col-sm-6 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="panel panel-default-light panel-card border-default rounded">
                                            <div class="panel-heading">
                                                <div class="panel-title">Total Help Received:
                                                </div>
                                            </div><!-- /.panel-heading -->

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-item">
                                                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                                                                            'status'      => 'Accepted',
                                                                                                            'receiver_id' => $this->session->user_id,
                                                                                                        )) ?></strong>
                                                    </div><!-- /.col-xs-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.panel-body -->
                                        </div><!-- /.panel -->
                                    </div><!-- /.col-sm-6 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="panel panel-default-light panel-card border-default rounded">
                                            <div class="panel-heading">
                                                <div class="panel-title">Total Pending Receivable
                                                </div>
                                            </div><!-- /.panel-heading -->

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-item">
                                                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                                                                            'status'      => 'Sent',
                                                                                                            'receiver_id' => $this->session->user_id,
                                                                                                        )) ?></strong>
                                                    </div><!-- /.col-xs-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.panel-body -->
                                        </div><!-- /.panel -->
                                    </div><!-- /.col-sm-6 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="panel panel-default-light panel-card border-default rounded">
                                            <div>
                                                <br />
                                            </div><!-- /.panel-heading -->

                                            <div class="panel-body">
                                                <div class="row">
                                                    <a href="<?php echo site_url('ticket/old-Supports') ?>">
                                                        <div class="col-xs-12 col-item blink" style="text-align: center; color:red">
                                                            <strong>Click Here</strong><br />
                                                            <span>for Support</span>
                                                        </div>
                                                    </a>
                                                    <!-- /.col-xs-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.panel-body -->
                                        </div><!-- /.panel -->
                                    </div><!-- /.col-sm-6 -->
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 table-responsive">
                                        <h3>Please Send Donations to:</h3>
                                        <table class="table table-bordered table-striped alert-info">
                                            <tr style="font-weight: 900; background-color: #0d638f; color:#fff">
                                                <td>Receiver</td>
                                                <td>Bank Detail</td>
                                                <td>Phone No</td>
                                                <td>Amount</td>
                                                <td>#</td>
                                            </tr>
                                            <?php
                                            $this->db->select('id,receiver_id, donation_amount')->from('donations')
                                                ->where(array(
                                                    'status'         => 'Sent',
                                                    'sender_id'      => $this->session->user_id,
                                                    'expiry_date >=' => date('Y-m-d'),
                                                ))
                                                ->order_by('id', 'DESC')->limit(10);
                                            $no   = 1;
                                            $data = $this->db->get()->result();
                                            foreach ($data as $res) {
                                                $detail = $this->db_model->select_multi('id, name,phone', 'member', array('id' => $res->receiver_id));
                                                $bank   = $this->db_model->select_multi('bank_ac_no,bank_name,bank_ifsc', 'member_profile', array('userid' => $res->receiver_id));
                                                echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>Bank:' . $bank->bank_name . '<br/>A/C No:' . $bank->bank_ac_no . '<br/>IFSC: ' . $bank->bank_ifsc . '</td>
                                            <td>' . $this->db_model->select('phone', 'member', array('id' => $res->receiver_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td><a href="javascript:;" onclick="document.getElementById(\'id\').value=\'' . $res->id . '\'" 
                                            data-toggle="modal" 
                                            data-target="#myModal" 
                                            class="btn btn-xs btn-primary">Send</a></td>
                                        </tr>';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="col-sm-6 table-responsive">
                                        <h3>Confirm Donations:</h3>
                                        <table class="table table-bordered table-striped alert-warning">
                                            <tr style="font-weight: 900; background-color: #ff4848; color:#fff">
                                                <td>Sender</td>
                                                <td>Phone No</td>
                                                <td>Amount</td>
                                                <td>Transaction Detail</td>
                                                <td>#</td>
                                            </tr>
                                            <?php
                                            $this->db->select('id,sender_id, donation_amount, trid, file,status')->from('donations')
                                                ->where(array(
                                                    'status !='   => 'Accepted',
                                                    'receiver_id' => $this->session->user_id,
                                                ))
                                                ->order_by('id', 'DESC')->limit(10);
                                            $no   = 1;
                                            $data = $this->db->get()->result();
                                            foreach ($data

                                                as $res) {

                                                $detail = $this->db_model->select_multi('name,phone', 'member', array('id' => $res->sender_id));
                                                if ($res->file !== "") {
                                                    $file_line = '<br/><a target="_blank" class="btn btn-xs btn-primary" href="' . base_url('uploads/' . $res->file) . '">See Receipt</a>';
                                                }
                                                echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>' . $this->db_model->select('phone', 'member', array('id' => $res->sender_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td>';
                                                if ($res->status !== 'Waiting') {
                                                    echo '<td colspan="2">Waiting to Send Payment</td>';
                                                } else {
                                                    echo ' ' . $res->trid . '
                                            ' . $file_line . '</td>
                                            <td><a href="donation/approve-donation/' . $res->id . '" onclick="return confirm(\'Are you sure, you have received this payment and want to confirm ?\')" 
                                            class="btn btn-xs btn-success">Accept
                                            </a></td>';
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div><!-- /.row -->

                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Send Donation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <?php echo form_open_multipart('donation/send-donation') ?>
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <label>Enter Transaction Detail (Optional)</label><br />
                                                    <textarea name="tdetail" class="form-control"></textarea><br />
                                                    <input name="files" type="file"> Upload Receipt<br />
                                                    <button class="btn btn-primary">Submit</button>
                                                    <?php echo form_close() ?>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>

                                <!--task states start-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="panel">
                                        <header class="panel-heading">
                                            Task Statistics
                                            <span class="tools pull-right">
                                                <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="close-box fa fa-times" href="javascript:;"></a>
                                            </span>
                                        </header>
                                        <div class="panel-body">
                                            <div class="row w-states">
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-primary btn-block">
                                                        <span class="value">
                                                            <?php echo $detail->total_a + $detail->total_b + $detail->total_c + $detail->total_d + $detail->total_e ?>
                                                        </span>
                                                        <span class="info">Total Downline</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                   <a href="#" class="btn btn-info btn-block">
                                                       <span class="value"><?php

                                                                           echo $this->db_model->count_all('member', array('sponsor' => $this->session->user_id));
                                                                           ?></span>
                                                       <span class="info">Direct Referred</span>
                                                   </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-primary btn-block">
                                                        <span class="value">
                                                            <?php $left = $this->db->select('total_a')->where('id', $this->session->user_id)->get('member')->result_array();
                                                            echo $left[0]['total_a']; ?>
                                                        </span>
                                                        <span class="info">Total Left</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-info btn-block">
                                                        <span class="value"><?php $right = $this->db->select('total_b')->where('id', $this->session->user_id)->get('member')->result_array();
                                                                            echo $right[0]['total_b']; ?></span>
                                                        <span class="info">Total Right</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 ">
                                                    <a href="#" class="btn btn-info btn-block">
                                                        <span class="value"><?php $match = $this->db->select('SUM(pair_match) as total')->where('userid', $this->session->user_id)->get('earning')->result_array();
                                                                            echo empty($match[0]['total']) ? "0" : $match[0]['total']; ?></span>
                                                        <span class="info">Total Matching</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 ">
                                                    <a href="#" class="btn btn-info btn-block">
                                                        <span class="value"><?php $match = $this->db->select('SUM(amount) as total')->where(array('userid' => $this->session->user_id, 'type' => 'Matching Income'))->get('earning')->result_array();
                                                                            echo empty($match[0]['total']) ? "0" : $match[0]['total']; ?></span>
                                                        <span class="info">Total Matching Income</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 ">
                                                   <a href="#" class="btn btn-info btn-block">
                                                       <span class="value"><?php $match = $this->db->select('SUM(amount) as total')->where(array('userid' => $this->session->user_id, 'type' => 'Sponsor Matching Income'))->get('earning')->result_array();
                                                                       echo empty($match[0]['total'])? "0" : $match[0]['total'];?></span>
                                                       <span class="info">Total Sponsor Matching Income</span>
                                                   </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-success btn-block">
                                                        <span class="value"><?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                                                                            if ($data <= "0") {
                                                                                echo config_item('currency') . '0';
                                                                            } else {
                                                                                echo config_item('currency') . $data;
                                                                            } ?></span>
                                                        <span class="info">Total Earned</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-success btn-block">
                                                        <span class="value"><?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                                                                            $tax = (($data * $tax_percent) / 100);
                                                                            $amt = $data - $tax;
                                                                            if ($data <= "0") {
                                                                                echo config_item('currency') . '0';
                                                                            } else {
                                                                                echo config_item('currency') . $amt;
                                                                            } ?></span>
                                                        <span class="info">Total After Tax Deduction</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="<?php echo base_url()?>member/wallet_transactions_report" class="btn btn-danger btn-block">
                                                        <span class="value"><?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)); ?></span>
                                                        <span class="info">Wallet Balance</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-default btn-block margin0">
                                                        <span class="value"><?php $data = $this->db_model->sum('amount', 'withdraw_request', array(
                                                                                'userid' => $this->session->user_id,
                                                                                'status' => 'Paid',
                                                                            ));
                                                                            if ($data == "") {
                                                                                echo config_item('currency') . '0';
                                                                            } else {
                                                                                echo config_item('currency') . $data;
                                                                            }
                                                                            ?></span>
                                                        <span class="info">Paid Payout</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-default btn-block margin0">
                                                        <span class="value"><?php $data = $this->db_model->sum('amount', 'withdraw_request', array(
                                                                                'userid' => $this->session->user_id,
                                                                                'status' => 'Un-Paid',
                                                                            ));
                                                                            if ($data == "") {
                                                                                echo config_item('currency') . '0';
                                                                            } else {
                                                                                echo config_item('currency') . $data;
                                                                            }
                                                                            ?></span>
                                                        <span class="info">Pending Payout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p align="center">
                                <a href="<?php echo site_url('member/topup-wallet') ?>"
                                   class="btn btn-lg btn-primary"><span class="fa fa-usd"></span> Top
                                    Up Wallet &rarr;</a>
                            </p>
                                    </div>
                                </div>
                                <!--task states end-->

                                <!--charts start-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="panel">
                                        <div class="panel-body" style="height: 430px">
                                            <?php
                                            if (config_item('enable_topup') == "Yes" && $this->db_model->select('topup', 'member', array('id' => $this->session->user_id)) <= '0') {

                                            ?>

                                                <div class="alert alert-warning">Top Up your Account.</div>
                                                <hr />
                                                <?php echo form_open('member/topup') ?>
                                                <div class="col-sm-6">
                                                    <label for="product" class="control-label">Package</label>
                                                    <select class="form-control" id="product" name="product" required>
                                                        <?php foreach ($products as $val) {
                                                            echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Enter TopUp e-PIN</label>
                                                    <select class="form-control myselect" id="topup" name="topup">
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($epin as $val) {
                                                            echo '<option value="' . $val['epin'] . '">' . $val['epin'] . " | ₹" . number_format($val['amount'], 2) . ' </option>';
                                                        } ?>
                                                    </select>
                                                    <br>
                                                </div>
                                                &emsp;<button type="submit" class="btn btn-success">Submit </button>
                                                <?php echo form_close() ?>
                                            <?php
                                            } else {
                                            ?>
                                                <strong>Latest Earnings</strong>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table class="table table-hovered">
                                                        <thead>
                                                            <tr style="font-weight: 700">
                                                                <td>Income Name</td>
                                                                <td>TDS + Admin(<?php echo $tax_percent; ?>%)</td>
                                                                <td>Amount</td>
                                                                <td>Date</td>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $this->db->select('type, amount, date')
                                                            ->where('userid', $this->session->user_id)->order_by('id', 'DESC')
                                                            ->limit(12);
                                                        $inc = $this->db->get('earning')->result();

                                                        ?>
                                                        <tbody>
                                                            <?php foreach ($inc as $e) : $tax = (($e->amount * 15) / 100); ?>
                                                                <tr>
                                                                    <td><?php echo $e->type ?></td>
                                                                    <td><?php echo  config_item('currency') . $tax ?></td>
                                                                    <td>₹ <?php echo  $e->amount - $tax ?></td>
                                                                    <td><?php echo $e->date ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <h4 align="center" class="notranslate alert alert-primary" style="word-wrap: break-word;">My Referral Link: <a target="_blank" href="<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>"><?php echo site_url() . 'site/register/A/' . $this->session->user_id ?></a>
                                                </h4>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                    </div>
            <?php }
                        } ?>
                </div>
            </div>
        </div>
    </div>
    <!--main content end-->
    <!--footer start-->
    <!--footer end-->
    <script src="<?php echo base_url() ?>axxets/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>axxets/select2/select2.full.min.js"></script>
    <!-- inject:js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.0/autosize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <!-- endinject -->
    <script src="<?php echo base_url('axxets/member/theme.js') ?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf'] // 'colvis' for column visiblity
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

    <!--Data Table--->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                placement: "top"
            });

            $(".myselect").select2({
                tags: true
            });
        });
    </script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                yearRange: "-70:+70",
                changeMonth: true,
                changeYear: true,
                defaultDate: 0,
                showOptions: {
                    direction: "down"
                },
            });
        });

        var base_url="<?php echo base_url();?>";
    </script>

</body>

</html>