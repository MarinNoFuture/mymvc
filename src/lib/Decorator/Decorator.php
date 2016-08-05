<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 3:19 PM
 */
namespace lib\Decorator;

interface Decorator{
    function before($controller = '');
    function after($return_value = '');
}