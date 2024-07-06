<?php
defined("BASEPATH") or exit("No direct script access allowed");
class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        error_reporting(0);
    }

    public function min()
    {
        $this->update_legs();
        $this->binary_payout();
    }

    public function weekly()
    {
        $this->payout();
        //$this->direct_reward();
        echo "<div align=\"center\">Nothing is here so pack your bag and go home little baby..</div>";
    }
    public function daily()
    {
        // $this->update_level();
        $this->update_legs();
        //$this->custom_income();
        //$this->flexi_income();
        //$this->level_wise_income();
        $this->binary_payout();
        $this->roi();
        $this->reward();
        $this->rank_update();
        $this->database_backup();
        //$this->investment();
        //$this->payout();
        //$this->direct_reward();
        echo "<div align=\"center\">Nothing is here so pack your bag and go home little baby..</div>";
    }

    public function update_legs()
    {
        $this->db->select("id,A,B,C,D,E")->from("member"); ///->where("topup >", "0")
        $data = $this->db->get()->result();
        foreach ($data as $result) {
            if ($result->A !== "0") {
                $count_a = $this->count_node($result->A);
                //$total_a_pv = $this->count_pv($result->A) + $this->db_model->select("mypv", "member", array("id" => $result->A));
                $total_a_matching = $this->count_matching($result->A) + $this->db_model->select("my_business", "member", array("id" => $result->A));
                //$total_a_investment = $this->count_investment($result->A) + $this->db_model->select("topup", "member", array("id" => $result->A));
                // echo $count_a;
            } else {
                $count_a = 0;
                $total_a_pv = 0;
                $total_a_matching = 0;
                $total_a_investment = 0;
            }
            if ($result->B !== "0") {
                $count_b = $this->count_node($result->B);
                //$total_b_pv = $this->count_pv($result->B) + $this->db_model->select("mypv", "member", array("id" => $result->B));
                $total_b_matching = $this->count_matching($result->B) + $this->db_model->select("my_business", "member", array("id" => $result->B));
                //$total_b_investment = $this->count_investment($result->B) + $this->db_model->select("topup", "member", array("id" => $result->B));
            } else {
                $count_b = 0;
                $total_b_pv = 0;
                $total_b_matching = 0;
                $total_b_investment = 0;
            }
            // if ($result->C !== "0") {
            //     $count_c = $this->count_node($result->C);
            //     //$total_c_pv = $this->count_pv($result->C) + $this->db_model->select("mypv", "member", array("id" => $result->C));
            //     $total_c_matching = $this->count_matching($result->C) + $this->db_model->select("my_business", "member", array("id" => $result->C));
            // } else {
            //     $count_c = 0;
            // }
            // if ($result->D !== "0") {
            //     $count_d = $this->count_node($result->D);
            //     //$total_d_pv = $this->count_pv($result->D) + $this->db_model->select("mypv", "member", array("id" => $result->D));
            //     $total_d_matching = $this->count_matching($result->D) + $this->db_model->select("my_business", "member", array("id" => $result->D));
            // } else {
            //     $count_d = 0;
            // }
            // if ($result->E !== "0") {
            //     $count_e = $this->count_node($result->E);
            //     //$total_e_pv = $this->count_pv($result->E) + $this->db_model->select("mypv", "member", array("id" => $result->E));
            //     $total_e_matching = $this->count_matching($result->E) + $this->db_model->select("my_business", "member", array("id" => $result->E));
            // } else {
            //     $count_e = 0;
            // }
            // $data = array("total_a" => $count_a, "total_b" => $count_b, "total_c" => $count_c, "total_d" => $count_d, "total_e" => $count_e, "total_a_pv" => $total_a_pv, "total_b_pv" => $total_b_pv, "total_c_pv" => $total_c_pv, "total_d_pv" => $total_d_pv, "total_e_pv" => $total_e_pv, "total_a_matching_incm" => $total_a_matching, "total_b_matching_incm" => $total_b_matching, "total_c_matching_incm" => $total_c_matching, "total_d_matching_incm" => $total_d_matching, "total_e_matching_incm" => $total_e_matching, "total_a_investment" => $total_a_investment, "total_b_investment" => $total_b_investment);
            $rdata = array("total_a" => $count_a, "total_b" => $count_b, "total_a_matching_incm" => $total_a_matching, "total_b_matching_incm" => $total_b_matching);
            // echo "<pre>";print_r($data);
            $this->db->where("id", $result->id);
            $result = $this->db->update("member", $rdata);
            // echo '<br>'. $this->db->last_query();
        }
    }
    private function count_node($id, $i = 0)
    {
        if ($i == 0) {
            $top_up = $this->db_model->select("topup", "member", array("id" => $id));
            if (0 < $top_up) {
                $i = $i + 1;
            }
        }
        $this->db->select("id,topup")->where("position", $id);
        $data = $this->db->get("member")->result();
        $countdata = $this->db_model->count_all("member", array("position" => $id, "topup >" => "0"));
        $i = $i + $countdata;
        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_node($result->id, $i);
            }
        }
        return $i;
    }
    /* private function count_pv($id, $i = 0)
    {
        $this->db->select("id,mypv")->where("position", $id);
        $data = $this->db->get("member")->result();
        $countdata = $this->db_model->sum("mypv", "member", array("position" => $id, "mypv !=" => "0"));
        $i = $i + $countdata;
        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_pv($result->id, $i);
            }
        }
        return $i;
    }
    private function count_investment($id, $i = 0)
    {
        $this->db->select("id,topup")->where("position", $id);
        $data = $this->db->get("member")->result();
        $countdata = $this->db_model->sum("topup", "member", array("position" => $id, "topup >" => "0"));
        $i = $i + $countdata;
        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_investment($result->id, $i);
            }
        }
        return $i;
    } */
    public function count_matching($id, $i = 0)
    {
        $this->db->select("id,my_business")->where(array("position" => $id, "status" => "Active", "topup >" => 0));
        $data = $this->db->get("member")->result();
        $countdata = $this->db_model->sum("my_business", "member", array("position" => $id, "my_business !=" => "0"));
        $i = $i + $countdata;
        foreach ($data as $result) {
            if ($result->id) {
                $i = $this->count_matching($result->id, $i);
            }
        }
        return $i;
    }
    public function custom_income()
    {
        $this->load->model("custom_income");
        $this->custom_income->index();
    }
    public function flexi_income()
    {
        $this->load->model("earning");
        $this->earning->flexi_income();
    }
    public function level_wise_income()
    {
        $this->load->model("earning");
        $this->earning->level_wise_income();
    }
    public function binary_payout()
    {
        $member = $this->db->select('id,A,B,status,topup')->get('member')->result_array();
        foreach ($member as $m) {
            //echo $m['id']." => A =>".$m['A']."=> B =>".$m['B'];
            $A = $this->db->select('topup,status')->where(array('id' => $m['A']))->get('member')->row_array();
            $B = $this->db->select('topup,status')->where(array('id' => $m['B']))->get('member')->row_array();
            //echo "Topup A =>".$A['topup']." Topup B =>".$B['topup']."<br>";
            if ($A['topup'] != "0.00" && $B['topup'] != "0.00" && $B['status'] == "Active" && $A['status'] == "Active" && $m['topup'] != "0.00" && $m['status'] == "Active" && !empty($A) && !empty($B)) {
                //echo "<pre>";
                //print_r($member);
                $count_product_binary = $this->db_model->count_all("product", array("matching_income >" => 0));
                $count_fix_binary = $this->db_model->select("binary_income", "fix_income", array("1 >" => 0));
                $count_invst_binary = $this->db_model->select("matching_income", "investment_pack", array(0));
                if (0 < $count_product_binary || 0 < $count_fix_binary || 0 < $count_invst_binary) {
                    $this->db->select("id,total_a,total_b,paid_a,paid_b,signup_package,mypv,total_a_matching_incm,total_b_matching_incm, total_c_matching_incm, paid_a_matching_incm, paid_b_matching_incm")->from("member")->where("topup >", "0")->where("total_a >", 0)->where("total_b >", 0)->where("paid_a <", "total_a", false)->where("paid_b <", "total_b", false);
                    $data = $this->db->get()->result();
                    foreach ($data as $result) {
                        $this->load->model("earning");
                        $data2 = array(
                            "total_a" => $result->total_a,
                            "total_b" => $result->total_b,
                            "paid_a" => $result->paid_a,
                            "paid_b" => $result->paid_b,
                            "signup_package" => $result->signup_package,
                            //"mypv" => $result->mypv, 
                            //"total_a_matching_incm" => $result->total_a_matching_incm, 
                            //"total_b_matching_incm" => $result->total_b_matching_incm, 
                            //"total_c_matching_incm" => $result->total_c_matching_incm, 
                            "paid_a_matching_incm" => $result->paid_a_matching_incm,
                            "paid_b_matching_incm" => $result->paid_b_matching_incm
                        );
                        // echo $result->id."<br><pre>";
                        // print_r($data2);
                        $this->earning->process_binary($result->id, $data2);
                    }
                }
            } else {
            }
        }
    }
    public function roi()
    {
        $count_product_roi = $this->db_model->count_all("product", array("roi >" => 0));
        if (0 < $count_product_roi) {
            $this->load->model("earning");
            $this->earning->roi_earning();
            //echo $this->db->last_query();die;
        }
    }
    public function reward()
    {
        $this->load->model("earning");
        $this->earning->reward_process();
    }
    public function rank_update()
    {
        $this->load->model("earning");
        $this->earning->rank_process();
    }
    public function investment()
    {
        $this->load->model("investment");
        $this->investment->generate();
    }
    private function payout()
    {
        $member = $this->db->select('id,A,B,topup,status')->get('member')->result_array();
        $abc = array();
        foreach ($member as $m) {
            //echo $m['id']." => A =>".$m['A']."=> B =>".$m['B'];
            $A = $this->db->select('topup,status')->where('id', $m['A'])->get('member')->row_array();
            $B = $this->db->select('topup,status')->where('id', $m['B'])->get('member')->row_array();

            //echo "Topup A =>".$A['topup']." Topup B =>".$B['topup']."<br>";
            if ($A['topup'] != "0.00" && $B['topup'] != "0.00" && $B['status'] == "Active" && $A['status'] == "Active" && $m['topup'] != "0.00" && $m['status'] == "Active" && !empty($A) && !empty($B)) {
                //echo "User Pay ID".$m['id']."<br>";
                //$this->db->select("id, userid, amount")->where(array("status" => "Pending", "userid" => $m['id']));
                //$data = $this->db->get("earning")->result();
                $this->db->select('userid,SUM(amount) as amount')->where(array("status" => "Pending", "userid" => $m['id']));
                $data = $this->db->get("earning")->result();
                foreach ($data as $e) {
                    if ($e->amount <= 20000.00) {

                        $amt = $e->amount;
                        $cur_balance = $this->db_model->select("balance", "wallet", array("userid" => $e->userid));
                        echo $e->userid . "=>" . $amt . "<br>"; // die;
                        $data = array("balance" => $amt + $cur_balance, "without_tax_bal" => $e->amount + $cur_balance);
                        $this->db->where("userid", $e->userid);
                        $this->db->update("wallet", $data);
                        //echo $e->userid;
                        //print_r($data);
                        //echo $this->db->last_query();

                        //  wallet tasrnsection report start---------
                        $data = array(
                            'userid' => $e->userid,
                            'amount' => $amt,
                            'status' => 'CR',
                            'remark' => "Earning Credited",
                            'date' => date('Y-m-d')
                        );
                        $this->db->insert('wallet_transection_report', $data);
                        //  wallet tasrnsection report end---------


                        $data = array("status" => "Paid");

                        $this->db->where("userid", $e->userid);
                        $this->db->update("earning", $data);
                        //echo $this->db->last_query();
                    } else {
                        $capp = $e->amount - 20000.00;
                        $ins = $e->amount - $capp;

                        $amt = $ins;
                        $cur_balance = $this->db_model->select("balance", "wallet", array("userid" => $e->userid));
                        echo $e->userid . "=>" . $ins . "<br>"; // die;
                        $capping = array('userid' => $e->userid, 'amount' => $e->amount, 'capping_amt' => $capp);
                        print_r($capping);
                        $this->db->insert('transaction', $capping);
                        $data = array("balance" => $amt + $cur_balance, "without_tax_bal" => $ins + $cur_balance);
                        $this->db->where("userid", $e->userid);
                        $this->db->update("wallet", $data);
                        //echo $e->userid;
                        //print_r($data);
                        //echo $this->db->last_query();
                        //  wallet tasrnsection report start---------
                        $data = array(
                            'userid' => $e->userid,
                            'amount' => $amt,
                            'status' => 'CR',
                            'remark' => "Earning Credited",
                            'date' => date('Y-m-d')
                        );
                        $this->db->insert('wallet_transection_report', $data);
                        //  wallet tasrnsection report end---------




                        $data = array("status" => "Paid");

                        $this->db->where("id", $e->userid);
                        $this->db->update("earning", $data);
                        //echo $this->db->last_query();
                    }
                }
            } else {
            }
        }
    }
    /* public function payout()
    {
         $member = $this->db->select('id,A,B,topup')->get('member')->result_array();
        foreach($member as $m){ 
            //echo $m['id']." => A =>".$m['A']."=> B =>".$m['B'];
            //$A = $this->db->select('topup')->where('id',$m['A'])->get('member')->row_array();
            //$B = $this->db->select('topup')->where('id',$m['B'])->get('member')->row_array();
            //echo "User_id =>".$m['id']."Topup=>".$m['topup']."Topup A =>".$A['topup']." Topup B =>".$B['topup']."<br>";
            
            $this->db->select("e.id, e.userid, e.amount, m.A, m.B, m.topup,m.status")->where("e.status", "Pending");
            $this->db->join('member as m','e.userid = m.id');
            $data = $this->db->get("earning as e")->result_array();
            //print_r($data);
            foreach($data as $e) {
                //$A = $this->db->select('topup,status')->where('id',$e['A'])->get('member')->row_array();
                //$B = $this->db->select('topup,status')->where('id',$e['B'])->get('member')->row_array();
                //echo "User_id =>".$e['userid']."Topup=>".$e['topup']."Topup A =>".$A['topup']." Topup B =>".$B['topup']."<br>";
                //if($e['topup'] > 0 && $A['topup'] > 0 && $B['topup'] > 0 && $e['status'] == "Active" && $A['status'] == "Active" && $B['status'] == "Active"){
                    $tax = (($e->amount * 15 )/100);
                    $amt = $e->amount - $tax;
                    $cur_balance = $this->db_model->select("balance", "wallet", array("userid" => $e->userid));
                    //echo $e->userid."=>".$amt."<br>";// die;
                    $data = array("balance" => $amt + $cur_balance,"without_tax_bal" => $e->amount + $cur_balance);
                    $this->db->where("userid", $e->userid);
                    $this->db->update("wallet", $data);
                    //echo $e->userid; 
                    print_r($data);
                    //echo $this->db->last_query();
                    $data = array("status" => "Paid");
                    echo "Pay";
                    $this->db->where("id", $e->id);
                    $this->db->update("earning", $data);
                    //echo $this->db->last_query();
                }else{
                    echo "Not Pay Pay";
                }
            }
        }
    } */


    public function admin_topup()
    {
        redirect("users/topup-member");
    }
    public function member()
    {
        redirect("member");
    }
    public function generate_payout()
    {
        redirect("wallet/generate-payout");
    }
    public function complete_registration()
    {
        $this->load->dbutil();
        $this->dbutil->optimize_database();
        redirect("site/complete_registration");
    }
    public function check_user()
    {
        $user = trim($this->input->post("user"));
        if (0 < $this->db_model->count_all("franchisee", array("username" => $user))) {
            echo "<span style=\"color: red; background-color: moccasin\">The Username is Taken !</span>";
        } else {
            echo "<span style=\"color: green; background-color: #d6e9c6\">The Username is Available !</span>";
        }
    }
    public function get_stock_qty()
    {
        $fran_id = $this->input->post("fran_id");
        $prod_name = $this->input->post("prod");
        $prodid = $this->db_model->select("id", "product", array("prod_name" => $prod_name));
        $qty = $this->db_model->select("available_qty", "franchisee_stock", array("franchisee_id" => $fran_id, "product_id" => $prodid));
        if ($qty == "") {
            $qty = 0;
        }
        echo $qty;
    }
    public function get_products()
    {
        $data = trim($this->input->get("term"));
        $this->db->select("prod_name")->from("product")->where("status", "Selling")->where("qty !=", "0")->like("prod_name", $data, "BOTH");
        $data = $this->db->get()->result();
        foreach ($data as $val) {
            $res[] = $val->prod_name;
        }
        echo json_encode($res);
    }
    public function get_own_products()
    {
        $data = trim($this->input->get("term"));
        $this->db->select("id")->from("product")->like("prod_name", $data, "BOTH");
        $data = $this->db->get()->result();
        foreach ($data as $val) {
            $res[] = $val->prod_name;
        }
        echo json_encode($res);
    }
    public function get_wallet_balance($uid)
    {
        $uid = $this->common_model->filter($uid);
        $balance = $this->db_model->select("balance", "wallet", array("userid" => $uid));
        echo $balance;
    }
    public function direct_reward()
    {
        $id = $this->db->select('id')->get('member')->result_array();
        foreach ($id as $e) {
            $sponsor = $this->db_model->count_all('member', array('sponsor' => $e['id']));
            //echo $e['id'] .'=>'. $sponsor.'<br>';
            $array = array(
                'userid'   => $e['id'],
                'date'      => date('y-m-d'),
                'status'    => 'pending',
            );

            if ($sponsor >= 10 && $sponsor <= 19) {
                $rd = "Jio Phone (Direct Joining Target Achive Reward)";
                $array['reward_id'] = $rd;
                $check = $this->db->get_where('rewards', array('userid' => $e['id'], 'reward_id ' => 'Jio Phone (Direct Joining Target Achive Reward)'))->row_array();
                //echo $this->db->last_query();die;
                if (empty($check)) {
                    $this->db->insert('rewards', $array);
                }
            } elseif ($sponsor >= 20 && $sponsor <= 49) {
                $rd = "Stan Fan (Direct Joining Target Achive Reward)";
                $array['reward_id'] = $rd;
                $check = $this->db->get_where('rewards', array('userid' => $e['id'], 'reward_id ' => 'Stan Fan (Direct Joining Target Achive Reward)'))->row_array();
                if (empty($check)) {
                    $this->db->insert('rewards', $array);
                }
            } elseif ($sponsor >= 50 && $sponsor <= 99) {
                $rd = "Mixture Grinder (Direct Joining Target Achive Reward)";
                $array['reward_id'] = $rd;
                $check = $this->db->get_where('rewards', array('userid' => $e['id'], 'reward_id ' => 'Mixture Grinder (Direct Joining Target Achive Reward)'))->row_array();
                if (empty($check)) {
                    $this->db->insert('rewards', $array);
                }
            } elseif ($sponsor >= 100 && $sponsor <= 199) {
                $rd = "Android Mobile (Direct Joining Target Achive Reward)";
                $array['reward_id'] = $rd;
                $check = $this->db->get_where('rewards', array('userid' => $e['id'], 'reward_id ' => 'Android Mobile (Direct Joining Target Achive Reward)'))->row_array();
                if (empty($check)) {
                    $this->db->insert('rewards', $array);
                }
            } elseif ($sponsor >= 200 && $sponsor <= 220) {
                $rd = "Two wheeler or 20000 cash (Direct Joining Target Achive Reward)";
                $array['reward_id'] = $rd;
                $check = $this->db->get_where('rewards', array('userid' => $e['id'], 'reward_id ' => 'Two wheeler or 20000 cash (Direct Joining Target Achive Reward)'))->row_array();
                if (empty($check)) {
                    $this->db->insert('rewards', $array);
                }
            }
            //echo $this->db->last_query();
        }
    }
    /* public function sponsor_matching(){
        $id = $this->db->select('id')->get('member')->result_array();
        foreach($id as $id){
            $sponsor = $this->db->select('id,total_a,total_b,paid_a,paid_b,total_a_matching_incm,total_b_matching_incm,paid_a_matching_incm,paid_b_matching_incm,')->where('sponsor',$id['id'])->get('member')->result_array();
            foreach($sponsor as $s){
                echo $s['id']."<br>";
                $min              = min(($s['total_a_matching_incm'] - $s['paid_a_matching_incm']), ($s['total_b_matching_incm'] - $s['paid_b_matching_incm']));
                $pair_match       = min(($s['total_a'] - $s['paid_a']), ($s['total_b'] - $s['paid_b']));
                $pair_max         = max(($s['total_a'] - $s['paid_a']), ($s['total_b'] - $s['paid_b']));
                $paid_pair        = min($s['paid_a'], $s['paid_b']);
                $per_user_earning = $min / $pair_match;
                echo "minimum => ".$min."<br>"."Pair Match =>".$pair_match."<br>Pair max =>".$pair_max."<br>Paid_pair =>".$paid_pair."<br>Per user earning =>".$per_user_earning."<br>";
                if ($paid_pair <= 0 && $pair_max >= config_item('binary_frst_ratio') && $pair_match >= config_item('binary_2nd_ratio')) {
                    # First Binary.
                    //$this->pay_earning($sponsor, '', 'Referral Income', ($min*50/100), $pair_match);
                    $this->pay_earning($id, '', 'Matching Income', $min, $pair_match);
                    if ($data['total_a'] > 0) {
                        $paid_a       = config_item('binary_frst_ratio');
                        $paid_b       = 1;
                        $paid_a_match = ($per_user_earning * config_item('binary_frst_ratio'));
                        $paid_b_match = $per_user_earning;
                    } else {
                        $paid_a       = 1;
                        $paid_b       = config_item('binary_frst_ratio');
                        $paid_a_match = $per_user_earning;
                        $paid_b_match = $per_user_earning * config_item('binary_frst_ratio');
                    }
                    $array = array(
                        'paid_a'               => $paid_a,
                        'paid_b'               => $paid_b,
                        'paid_a_matching_incm' => $paid_a_match,
                        'paid_b_matching_incm' => $paid_b_match,
                    );
                    $this->db->where('id', $id);
                    $this->db->update('member', $array);
                } else if ($pair_match >= config_item('binary_2nd_ratio') && $paid_pair > 0) {
                    $cappping   = $this->db_model->select('capping', 'product', array('id' => $this->db_model->select('signup_package', 'member', array('id' => $id))));
                    $total_paid = $this->db_model->sum('amount', 'earning', array('userid' => $id, 'type' => 'Matching Income', 'date' => date('Y-m-d')));
                    # Second and after ward binary
        
        
        
        
                    for ($i = 0; $i < $pair_match; $i++) {
                        $paid_pair = $paid_pair + 1;
                        if ($paid_pair == "2") {
                            //$this->pay_earning($id, '', 'Matching Income', $per_user_earning, '1');
                            echo "Sponsor Matching";
                        } else {
                            $this->pay_earning($id, '', 'Matching Income', $per_user_earning, '1');
                        }
                    }
        
        
        
                    if ($cappping <= 0 || $total_paid < $cappping) {
                        $avl_cap = $cappping - $total_paid;
                        //echo $avl_cap.'<br>';
                        if ($min > $avl_cap && $cappping > 0) {
                            $min = $min = $avl_cap;
                            //echo $min.'<br>';
                            $this->pay_earning($id, '', 'Matching Income', $min, $pair_match);
                            //echo $this->db->last_query();
                        }
                        //$this->pay_earning($sponsor, '', 'Matching Income', ($min*50/100), $pair_match);
                        //$this->pay_earning($id, '', 'Matching Income', $min, $pair_match);
                    }
            }
        }
    } */

    public function update_level($user_id, $i = 20, $e = 1)
    {
        if ($i > 0) {
            $lvl_position_id = $this->db_model->select('position', 'member', array('id' => $user_id));
            if (strlen($lvl_position_id) > 2) {
                $get_level = $this->db_model->select('level' . $e, 'level', array('userid' => $lvl_position_id));
                $this->db->set('level' . $e, $get_level + 1);
                $this->db->where('userid', $lvl_position_id);
                $this->db->update('level');
                $this->update_level($lvl_position_id, $i - 1, $e + 1);
            }
        }
    }

    private function database_backup()
    {
        $this->load->dbutil();
        $db_format = array('format' => 'zip', 'filename' => 'my_db_backup.sql');
        $backup = &$this->dbutil->backup($db_format);
        $dbname = 'backup-on-' . date('Y-m-d') . '.zip';
        $save = './backup/' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }
}
