<?php 

namespace app\classes\filters;
use yii\base\ActionFilter;

/**
 * Summary of TempoAcaoFilter
 */
class TempoAcaoFilter extends ActionFilter
{
    private $start;
    public $message = 'Sua action demorou';
    /**
     * Summary of beforeAction
     * @param mixed $action
     * @return void
     */
    public function beforeAction($action)
    {
        $this->start = microtime(true);
        return parent::beforeAction($action);

    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->start;

        echo "<p>{$this->message} {$time}  segundos</p>";

        return parent::afterAction($action, $result);
    }
}

?>