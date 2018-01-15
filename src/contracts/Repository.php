<?php

namespace PHPKitchen\Domain\contracts;

/**
 * Represents
 *
 * @package PHPKitchen\Domain\contracts
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
interface Repository {
    const EVENT_BEFORE_SAVE = 'beforeSave';
    const EVENT_AFTER_SAVE = 'afterSave';
    const EVENT_BEFORE_ADD = 'beforeAdd';
    const EVENT_BEFORE_UPDATE = 'beforeUpdate';
    /**
     * @deprecated use EVENT_AFTER_ADD if you used this one
     */
    const AFTER_BEFORE_ADD = 'afterAdd';
    const EVENT_AFTER_ADD = 'afterAdd';
    const EVENT_AFTER_UPDATE = 'afterUpdate';
    const EVENT_BEFORE_DELETE = 'beforeDelete';
    const EVENT_AFTER_DELETE = 'afterDelete';

    public function validateAndSave(DomainEntity $entity, $attributes = null);

    public function saveWithoutValidation(DomainEntity $entity, $attributes = null);

    public function delete(DomainEntity $entity);

    public function validate(DomainEntity $entity);

    public function findOneWithPk($pk);

    public function findAll();

    public function each();

    public function find();

    public function createNewEntity();

    public function getEntitiesProvider();
}