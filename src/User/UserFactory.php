<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 10:46
 */

namespace App\User;


use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFactory
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param UserRequest $request
     * @return User
     */
    public function createFromUserRequest(UserRequest $request): User
    {
        /** @var User $user */
        $user = new User();
        $user->setFirstname($request->getFirstName());
        $user->setName($request->getName());
        $user->setEmail($request->getEmail());
        $user->setPassword($this->encoder->encodePassword($user, $request->getPassword()));
        $user->setRoles($request->getRoles());

        return $user;
    }
}