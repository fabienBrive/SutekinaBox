<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 10:18
 */

namespace App\User;

use Symfony\Component\Validator\Constraints as Assert;

class UserRequest
{
    /**
     * @Assert\NotBlank(message="enter your Name.")
     * @Assert\Length(max="50", maxMessage="Your name is too long. {{ limit }} characters max.")
     */
    private $name;

    /**
     * @Assert\NotBlank(message="enter your firstname.")
     * @Assert\Length(max="50", maxMessage="Your firstname is too long. {{ limit }} characters max.")
     */
    private $firstName;

    /**
     * @Assert\Email(message="Vérifiez votre email.")
     * @Assert\NotBlank(message="Saisissez votre Email.")
     * @Assert\Length(max="80", maxMessage="Votre email est trop long. {{ limit }} characters max.")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="do not forget your password.")
     * @Assert\Length(
     *     min="5",
     *     minMessage="Your password is too short. {{ limit }} characters min.",
     *     max="20",
     *     maxMessage="Your password is too long. {{ limit }} characters max.")
     */
    private $password;

    private $roles =[];

    public function __construct(string $role = 'ROLE_MEMBRE')
    {
        $this->addRole($role);
    }

    public function addRole(string $role): bool
    {
        if (!in_array($role, $this->roles)) {
            $this->roles[] = $role;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }



}