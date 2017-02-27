<?php

namespace dekey\domain\web\actions;

use dekey\domain\web\base\Action;
use dekey\domain\web\base\ListingModel;
use dekey\domain\web\mixins\ViewModelManagement;

/**
 * Represents
 *
 * @package dekey\domain\web
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
class ListRecords extends Action {
    use ViewModelManagement;
    /**
     * @var callable a PHP callable that will be called to prepare a data provider that
     * should return a collection of the models. If not set, [[prepareDataProvider()]] will be used instead.
     * The signature of the callable should be:
     *
     * ```php
     * function ($dataProvider, $action) {
     *     // $dataProvider the data provider instance
     *     // $action is the action object currently running
     * }
     * ```
     *
     * The callable should return an instance of [[\yii\data\DataProviderInterface]].
     */
    public $prepareDataProvider;

    public function init() {
        $this->setViewFileIfNotSetTo('list');
        if (!$this->viewModelClassName) {
            $this->viewModelClassName = ListingModel::class;
        }
    }

    public function run() {
        $model = $this->createNewModel();
        $request = $this->getRequest();
        $model->load($request->queryParams);
        return $this->renderViewFile(compact('model'));
    }
}