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
 * 书法家查询控制器
 *
 * 书法家查询,书法家列表,书法家详情等操作
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Home extends \Fuel\Core\Controller_Template
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
        $this->template->title = '书法名家数据库';
        $this->template->content = \View::forge('home/index');
    }

    /**
     * 书法家列表
     */
    public function action_list(){

    }

    /**
     * 查看书法家详情
     * @param int $id 书法家ID
     */
    public function action_view($id = 0){
        $this->template->title = '书法名家数据库';
        $this->template->content = \View::forge('home/view');
    }
}
