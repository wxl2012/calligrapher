<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * 行政区域管理控制器
 *
 * 区域查询
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Region extends \Fuel\Core\Controller_Template
{
    public $template = 'home/template';
    /**
     * 书法家首页控制器
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        $region = \Model_Region::find(1);
        if(\Input::get('id', false)){
            $region = \Model_Region::find(\Input::get('id'));
        }
        $regions = $region->children()->get();

        $items = [];
        foreach($regions as $key => $value){
            array_push($items, $value->to_array());
        }
        die(json_encode(['status' => 'succ', 'msg' => '', 'data' => $items]));
    }
}
