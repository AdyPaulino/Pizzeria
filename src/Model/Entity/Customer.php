<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 *
 * @property string $personName * @property int $id * @property string $phone * @property string $email * @property string $street * @property string $province * @property string $city * @property string $postalCode * @property int $user */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
