<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\PostTag[] $post_tags
 * @property \App\Model\Entity\Tag[] $tags
 */
class Post extends Entity
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
        'title' => true,
        'description' => true,
        'user_id' => true,
        'category_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
        'comments' => true,
        'post_tags' => true,
        'tags' => true
    ];
}
