<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$db =& DB();
$settings = $db->get('settings')->result_array();
foreach ($settings as $key => $value)
{
    $config[$value['name']] = $value['value'];
}

$config['cms_version']	= '4.29.03';
$config['multi-language'] = 'false';
$config['language']	= 'russian';
$config['pagination']	= '50';
