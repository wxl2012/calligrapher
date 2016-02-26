<?php
/**
 * 后台管理默认控制器
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

namespace admin;

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
        $keyword = \Input::get('keyword', false);
        $items = \Model_Calligrapher::query()
            ->related(['country', 'province', 'city', 'county']);
        if($keyword){
            $items->or_where('country.name', 'like', $keyword);
            $items->or_where('province.name', 'like', $keyword);
            $items->or_where('city.name', 'like', $keyword);
            $items->or_where('county.name', 'like', $keyword);
            $items->or_where('name', 'like', $keyword);
        }
        $params['items'] = $items->get();
        \View::set_global($params);
        $this->template->title = '书法名家数据库';
        $this->template->content = \View::forge('home/index');
    }

    /**
     * 查看书法家详情
     * @param int $id 书法家ID
     */
    public function action_view($id = 0){

        $params['item'] = \Model_Calligrapher::find($id);
        \View::set_global($params);

        $this->template->title = '书法名家数据库';
        $this->template->content = \View::forge('home/view');
    }
}
