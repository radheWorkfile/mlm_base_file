<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$detail = $this->db_model->select_multi('name, email, phone, address, sponsor, signup_package, join_time', 'member', array('id' => $this->session->user_id));

$array_src = array(
    '{{company_name}}',
    '{{member_id}}',
    '{{member_name}}',
    '{{member_phone}}',
    '{{member_email}}',
    '{{member_add}}',
    '{{member_sponsor}}',
    '{{member_join_date}}',
    '{{member_purchased}}',
);

$array_rplc = array(
    config_item('company_name'),
    config_item('ID_EXT').$this->session->user_id,
    $detail->name,
    $detail->phone,
    $detail->email,
    $detail->address,
    $detail->sponsor,
    $detail->join_time,
    $this->db_model->select('prod_name', 'product', array('id' => $detail->signup_package)),

);
$file_data  = str_ireplace($array_src, $array_rplc, $file_data);
echo $file_data;
?>