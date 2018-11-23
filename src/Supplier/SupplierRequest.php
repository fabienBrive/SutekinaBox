<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 15:39
 */

namespace App\Supplier;

use Symfony\Component\Validator\Constraints as Assert;

class SupplierRequest
{
    /**
     * @Assert\NotBlank(message="Dont forget to place here The Supplier Name")
     * @Assert\Length(max="50", maxMessage="This supplier name is too long, {{ limit }} characters max.")
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Dont forget to enter here the location of the supplier")
     */
    private $location;

    /**
     * @Assert\Email(message="Check your email.")
     * @Assert\NotBlank(message="Enter your email.")
     * @Assert\Length(max="80", maxMessage="Your Email is too long {{ limit }} characters max.")
     */
    private $email;

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
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
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




}