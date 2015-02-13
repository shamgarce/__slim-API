<meta charset="utf-8">
<?php

//模拟PHP无限分类查询结果
$result =  array(
    array(
        'id'=>1,
        'pid'=>0,
        'name'=>'主页'
    ),
    array(
        'id'=>2,
        'pid'=>0,
        'name'=>'新闻'
    ),
    array(
        'id'=>3,
        'pid'=>0,
        'name'=>'媒体'
    ),
    array(
        'id'=>4,
        'pid'=>0,
        'name'=>'下载'
    ),
    array(
        'id'=>5,
        'pid'=>0,
        'name'=>'关于我们'
    ),
    array(
        'id'=>6,
        'pid'=>2,
        'name'=>'天朝新闻'
    ),
    array(
        'id'=>7,
        'pid'=>2,
        'name'=>'海外新闻'
    ),
    array(
        'id'=>8,
        'pid'=>6,
        'name'=>'州官新闻'
    ),
    array(
        'id'=>9,
        'pid'=>3,
        'name'=>'音乐'
    ),
    array(
        'id'=>10,
        'pid'=>3,
        'name'=>'电影'
    ),
    array(
        'id'=>11,
        'pid'=>3,
        'name'=>'小说'
    ),
    array(
        'id'=>12,
        'pid'=>9,
        'name'=>'铃声'
    ),
    array(
        'id'=>13,
        'pid'=>9,
        'name'=>'流行音乐'
    ),
    array(
        'id'=>14,
        'pid'=>9,
        'name'=>'古典音乐'
    ),
    array(
        'id'=>15,
        'pid'=>12,
        'name'=>'热门铃声'
    ),
    array(
        'id'=>16,
        'pid'=>12,
        'name'=>'搞笑铃声'
    ),
    array(
        'id'=>17,
        'pid'=>12,
        'name'=>'MP3铃声'
    ),
    array(
        'id'=>18,
        'pid'=>17,
        'name'=>'128K'
    ),
    array(
        'id'=>19,
        'pid'=>8,
        'name'=>'娱乐新闻'
    ),
    array(
        'id'=>20,
        'pid'=>11,
        'name'=>'穿越类'
    ),
    array(
        'id'=>21,
        'pid'=>11,
        'name'=>'武侠类'
    ),
);

/**
 * Tree 树型类(无限分类)
 *
 * @author Kvoid
 * @copyright http://kvoid.com
 * @version 1.0
 * @access public
 * @example
 *   $tree= new Tree($result);
 *   $arr=$tree->leaf(0);
 *   $nav=$tree->navi(15);
 */
class Tree {
    private $result;
    private $tmp;
    private $arr;
    private $already = array();
    /**
     * 构造函数
     *
     * @param array $result 树型数据表结果集
     * @param array $fields 树型数据表字段，array(分类id,父id)
     * @param integer $root 顶级分类的父id
     */
    public function __construct($result, $fields = array('id', 'pid'), $root = 0) {
        $this->result = $result;
        $this->fields = $fields;
        $this->root = $root;
        $this->handler();
    }
    /**
     * 树型数据表结果集处理
     */
    private function handler() {
        foreach ($this->result as $node) {
            $tmp[$node[$this->fields[1]]][] = $node;
        }
        krsort($tmp);
        for ($i = count($tmp); $i > 0; $i--) {
            foreach ($tmp as $k => $v) {
                if (!in_array($k, $this->already)) {
                    if (!$this->tmp) {
                        $this->tmp = array($k, $v);
                        $this->already[] = $k;
                        continue;
                    } else {
                        foreach ($v as $key => $value) {
                            if ($value[$this->fields[0]] == $this->tmp[0]) {
                                $tmp[$k][$key]['child'] = $this->tmp[1];
                                $this->tmp = array($k, $tmp[$k]);
                            }
                        }
                    }
                }
            }
            $this->tmp = null;
        }
        $this->tmp = $tmp;
    }
    /**
     * 反向递归
     */
    private function recur_n($arr, $id) {
        foreach ($arr as $v) {
            if ($v[$this->fields[0]] == $id) {
                $this->arr[] = $v;
                if ($v[$this->fields[1]] != $this->root) $this->recur_n($arr, $v[$this->fields[1]]);
            }
        }
    }
    /**
     * 正向递归
     */
    private function recur_p($arr) {
        foreach ($arr as $v) {
            $this->arr[] = $v[$this->fields[0]];
            if ($v['child']) $this->recur_p($v['child']);
        }
    }
    /**
     * 菜单 多维数组
     *
     * @param integer $id 分类id
     * @return array 返回分支，默认返回整个树
     */
    public function leaf($id = null) {
        $id = ($id == null) ? $this->root : $id;
        return $this->tmp[$id];
    }
    /**
     * 导航 一维数组
     *
     * @param integer $id 分类id
     * @return array 返回单线分类直到顶级分类
     */
    public function navi($id) {
        $this->arr = null;
        $this->recur_n($this->result, $id);
        krsort($this->arr);
        return $this->arr;
    }
    /**
     * 散落 一维数组
     *
     * @param integer $id 分类id
     * @return array 返回leaf下所有分类id
     */
    public function leafid($id) {
        $this->arr = null;
        $this->arr[] = $id;
        $this->recur_p($this->leaf($id));
        return $this->arr;
    }
}


$tree= new Tree($result);
$arr=$tree->leaf(0);
$nav=$tree->navi(15);























?>