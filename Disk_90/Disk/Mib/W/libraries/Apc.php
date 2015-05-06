<?php
/*********************************************************************************
 *适用的范围,数据量不大,更新不频繁的
 * 管理 /T/apc.php
 *-------------------------------------------------------------------------------
 * set_cache($key, $value, $time = 0)
 * get_cache($key)
 * clear($key)
 * clear_all()
 * exists($key)
 * inc($key, $step)
 * dec($key, $step)
 * info()
    $this->S->apc->set_cache("vid",1);
    echo $this->S->apc->get_cache("vidd");
    $this->S->apc->clear();
    $this->S->apc->clear_all($key);
    $this->S->apc->exists($key);
    $this->S->apc->inc("vidd",1);
    $this->S->apc->dec("vidd",1);
    $mr =  $this->S->apc->info();
 * *-------------------------------------------------------------------------------
 * */
class Apc{
    /**
     * Apc缓存-设置缓存
     * 设置缓存key，value和缓存时间
     * @param  string $key   KEY值
     * @param  string $value 值
     * @param  string $time  缓存时间
     */
    public function set_cache($key, $value, $time = 0) {
        if ($time == 0) $time = null; //null情况下永久缓存
        return apc_store($key, $value, $time);
    }


    /**
     * Apc缓存-获取缓存
     * 通过KEY获取缓存数据
     * @param  string $key   KEY值
     */
    public function get_cache($key) {
        return apc_fetch($key);
    }

    /**
     * Apc缓存-清除一个缓存
     * 从memcache中删除一条缓存
     * @param  string $key   KEY值
     */
    public function clear($key) {
        return apc_delete($key);
    }

    /**
     * Apc缓存-清空所有缓存
     * 不建议使用该功能
     * @return
     */
    public function clear_all() {
        apc_clear_cache('user'); //清除用户缓存
        return apc_clear_cache(); //清楚缓存
    }

    /**
     * 检查APC缓存是否存在
     * @param  string $key   KEY值
     */
    public function exists($key) {
        return apc_exists($key);
    }

    /**
     * 字段自增-用于记数
     * @param string $key  KEY值
     * @param int    $step 新增的step值
     */
    public function inc($key, $step) {
        return apc_inc($key, (int) $step);
    }

    /**
     * 字段自减-用于记数
     * @param string $key  KEY值
     * @param int    $step 新增的step值
     */
    public function dec($key, $step) {
        return apc_dec($key, (int) $step);
    }

    /**
     * 返回APC缓存信息
     */
    public function info() {
        return apc_cache_info();
    }
}
