<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages']  = array();
$autoload['libraries'] = array('database', 'session', 'form_validation', 'cart','Custum_lib');
$autoload['drivers']   = array();
$autoload['helper']    = array('url', 'form','custome_helper');
$autoload['config']    = array('global', 'payout');
$autoload['language']  = array();
$autoload['model']     = array('common_model', 'db_model', 'login');
