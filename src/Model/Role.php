<?php
namespace sirjasongo\atk4acl\Model;

class Role extends \atk4\data\Model
{
    use \sirjasongo\atk4m2m\ManyToMany;
    
    public $table = 'roles';
    const our_field = 'id';
    const their_field = 'role_id';

    public function init()
    {
        parent::init();

        $this->addField('name', ['required' => true, 'type' => 'string']);
        $this->addField('title', ['required' => true, 'type' => 'string']);
        $this->addField('description', ['type' => 'string']);

        $this->hasManyToMany(User::class, Assignments::class, 'email');
        $this->hasManyToMany(Permission::class, Grants::class, 'name');
    }
}

?>