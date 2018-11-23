<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 10:44
 */

namespace App\User;


use Doctrine\Common\Persistence\ObjectManager;

class UserRequestHandler
{
    private $manager, $userFactory;

    /**
     * UserRequestHandler constructor.
     * @param ObjectManager $manager
     * @param UserFactory $userFactory
     */
    public function __construct(ObjectManager $manager,
                                UserFactory $userFactory)
    {
        $this->manager = $manager;
        $this->userFactory = $userFactory;
    }

    public function handle(UserRequest $request)
    {
        # création de l'objet via factory dont la seul tache est de "construire"
        $user = $this->userFactory->createFromUserRequest($request);

        #enregistrement BDD
        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}