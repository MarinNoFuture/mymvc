<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 3:19 PM
 */
namespace lib;

interface BaseDecorator{
    function before($controller = '');
    function after($return_value = '');
}