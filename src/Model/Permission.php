<?php
namespace sirjasongo\atk4acl\Model;

class Permission extends \atk4\data\Model
{
    use \sirjasongo\atk4m2m\ManyToMany;
    
    public $table = 'permissions';
    const our_field = 'id';
    const their_field = 'perm_id';

    public function init()
    {
        parent::init();

        $this->addField('name', ['required' => true, 'type' => 'string']);
        $this->addField('title', ['required' => true, 'type' => 'string']);
        $this->addField('description', ['type' => 'string']);

        $this->hasManyToMany(Role::class, Grants::class, 'name');
    }
}

?>