<?php

namespace app\common\models;

use app\common\validators\rules\CategoryRules;
use app\common\validators\UuidValidator;
use Phalcon\Validation;
use Phalcon\Validation\Validator\AlphaNumericValidator;
use app\common\models\behaviors\AdjacencyListModelBehaviorInterface;
use app\common\utils\UuidUtil;
use app\common\validators\ExistenceValidator;

/**
 * Category
 * 
 * @package app\common\models
 * @autogenerated by Phalcon Developer Tools
 * @date 2018-09-13, 19:46:12
 */
class Category extends BaseModel
{
    const CREATE_WHITE_LIST = [
        'id',
        'parentId',
        'vendorId',
        'userId',
        'name',
        'order',
        'url',
        'depth'
    ];

    const UPDATE_WHITE_LIST = [
        'name',
        'parentId',
        'order',
        'url',
        'depth'
    ];

    /**
     * @var string
     * @Primary
     * @Column(column="id", type="string", length=36, nullable=false)
     */
    public $id;

    /**
     * @var string
     * @Column(column="parent_id", type="string", length=36)
     */
    public $parentId;

    /**
     * @var string
     * @Column(column="vendor_id", type="string", length=36, nullable=false)
     */
    public $vendorId;

    /**
     * @var string $userId
     * @Column(column="user_id", type="string", length=36, nullable=false)
     */
    public $userId;

    /**
     * @var string
     * @Column(column="name", type="string", length=100, nullable=false)
     */
    public $name;

    /**
     * @var string
     * @Column(column="url", type="string", length=255)
     */
    public $url;

    /**
     * @var integer $order
     * @Column(column="order", type="integer", length=3, nullable=false)
     */
    public $order = 0;

    /**
     * @var int
     * @Column(column="depth", type="integer", size=2, nullable=false)
     */
    public $depth = 0;

    /**
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    public $createdAt;

    /**
     * @var string
     * @Column(column="updated_at", type="string")
     */
    public $updatedAt;

    /**
     * @var string
     * @Column(column="deleted_at", type="string")
     */
    public $deletedAt;

    /**
     * @var int
     * @Column(column="is_deleted", type="integer", length=1, default="0", nullable=false)
     */
    public $isDeleted = false;

    /** @param string */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /** @param string|null */
    public function setParentId(?string $parentId)
    {
        $this->parentId = $parentId;
    }

    /** @param string */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /** @param int */
    public function setOrder(int $order = 0): void
    {
        $this->order = $order;
    }

    /** @param string */
    public function setVendorId(string $vendorId)
    {
        $this->vendorId = $vendorId;
    }

    /** @param string */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**@param string|null */
    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

    /** @var int */
    public function setDepth(int $depth = 0)
    {
        $this->depth = $depth;
    }

    /**@param string */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**@param string */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**@param string */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /** @param bool */
    public function setIsDeleted(bool $isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    /** @return string */
    public function getId(): string
    {
        return $this->id;
    }

    /** @return string */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /** @return string */
    public function getVendorId(): string
    {
        return $this->vendorId;
    }

    /**@return string */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**@return int */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**@return string */
    public function getName(): string
    {
        return $this->name;
    }

    /**@return string */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**@return int */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**@return string */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**@return string|null */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**@return string|null */
    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }

    /**@return bool */
    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**@throws \Exception */
    public function initialize()
    {
        $this->setSource("category");
        $this->useDynamicUpdate(true);

        $this->defaultBehavior();

        $this->addBehavior(new AdjacencyListModelBehaviorInterface([
            'itemIdAttribute' => 'id',
            'parentIdAttribute' => 'parentId',
            'orderByAttribute' => 'order',
            'isDeletedAttribute' => 'isDeleted',
            'isDeletedValue' => false,
            'subItemsSlug' => 'children',
            'noParentValue' => null
        ]));

        $this->skipAttributesOnUpdate(['id', 'vendorId']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'category';
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'parent_id' => 'parentId',
            'name' => 'name',
            'order' => 'order',
            'vendor_id' => 'vendorId',
            'user_id' => 'userId',
            'url' => 'url',
            'depth' => 'depth',
            'created_at' => 'createdAt',
            'updated_at' => 'updatedAt',
            'deleted_at' => 'deletedAt',
            'is_deleted' => 'isDeleted'
        ];
    }

    /**
     * Returns model as an array (public columns only)
     * @return array
     */
    public function toApiArray()
    {
        return [
            'id' => $this->id,
            'parentId' => $this->parentId,
            'vendorId' => $this->vendorId,
            'name' => $this->name,
            'url' => $this->url,
            'order' => $this->getOrder(),
            'depth' => $this->getDepth()
        ];
    }

    public function beforeDelete()
    {
        $this->_operationMade = self::OP_DELETE;
    }

    /**
     * @return CategoryRules
     */
    private function getValidationRules(): CategoryRules
    {
        return new CategoryRules();
    }

    /**
     * Validate models' attributes
     * @return bool
     */
    public function validation(): bool
    {
        if ($this->_operationMade == self::OP_DELETE) {
            return true;
        }

        $validator = new Validation();

        // Validate English input
        $validator->add(
            'name',
            new Validation\Validator\Callback([
                'callback' => function ($data) {
                    $categoryName = preg_replace('/[\d\s_]/i', '', $data['name']);
                    if (preg_match('/[a-z]/i', $categoryName) == false) {
                        return false;
                    }
                    return true;
                },
                'message' => 'We only support English language'
            ])
        );

        $validator->add(
            'name',
            new AlphaNumericValidator([
                'whiteSpace' => $this->getValidationRules()->allowNameWhiteSpace,
                'underscore' => $this->getValidationRules()->allowNameUnderscore,
                'min' => $this->getValidationRules()->minNameLength,
                'max' => $this->getValidationRules()->maxNameLength,
                'message' => 'Invalid category name',
                'messageMinimum' => 'Category name should be at least 3 characters',
                'messageMaximum' => 'Category name should not exceed 100 characters'
            ])
        );

        $validator->add(
            ['name', 'vendorId'],
            new Validation\Validator\Uniqueness([
                'model' => self::model(true),
                'convert' => function ($values) {
                    $values['vendorId'] = $this->vendorId;
                    return $values;
                },
                'except' => ['id' => $this->id],
                'message' => 'Category name already exists'
            ])
        );

        $validator->add(
            'parentId',
            new UuidValidator([
                'allowEmpty' => true
            ])
        );

        $validator->add(
            'parentId',
            new ExistenceValidator([
                'model' => self::class,
                'column' => 'id',
                'conditions' => [
                    'where' => 'vendorId = :vendorId: AND isDeleted = false',
                    'bind' => ['vendorId' => $this->vendorId]
                ],
                'message' => 'Parent category does not exist'
            ])
        );

        $validator->add(
            'order',
            new Validation\Validator\NumericValidator([
                'min' => $this->getValidationRules()->minOrder,
                'max' => $this->getValidationRules()->maxOrder,
                'message' => 'Category order should be a number'
            ])
        );

        $this->_errorMessages = $messages = $validator->validate([
            'name' => $this->name,
            'parentId' => $this->parentId,
            'order' => $this->order
        ]);

        return !$messages->count();
    }
}
