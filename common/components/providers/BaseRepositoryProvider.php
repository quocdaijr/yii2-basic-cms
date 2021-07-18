<?php


namespace common\components\providers;


use common\components\repositories\BaseApiRepository;
use common\components\repositories\BaseDataRepository;
use common\components\repositories\BaseDbRepository;
use common\components\repositories\BaseElasticsearchRepository;
use yii\base\Exception;

class BaseRepositoryProvider extends BaseProvider
{
    /**
     * @var  BaseDbRepository | BaseApiRepository | BaseElasticsearchRepository | BaseDataRepository $repository
     */
    protected $repository = false;


    /**
     * @throws Exception
     */
    public function init()
    {
        $this->component = $this->repository;

        parent::init(); // TODO: Change the autogenerated stub
    }
}