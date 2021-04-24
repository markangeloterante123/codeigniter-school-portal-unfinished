<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation','session','database','upload','email');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','form','array','html','download');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('model_users');
