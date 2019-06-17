<?php

$cfg['MaxTableList'] = 5000;
$cfg['MaxNavigationItems'] = 5000;
$cfg['LoginCookieValidity'] = 1800000;
$cfg['AllowUserDropDatabase'] = true;


$i = 1;
$cfg['Servers'][$i]['verbose'] = getenv('DB_HOST');
$cfg['Servers'][$i]['host'] = getenv('DB_HOST');
$cfg['Servers'][$i]['port'] = '';
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['AllowNoPassword'] = false;

$cfg['AllowUserDropDatabase'] = true;
