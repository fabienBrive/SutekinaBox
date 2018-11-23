<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 17:35
 */

namespace App\Product;

use Symfony\Component\Validator\Constraints as Assert;

class ProductRequest
{
    /**
     * @Assert\NotBlank(message="The product must have a supplier.")
     */
    private $Supplier;

    /**
     * @Assert\NotBlank(message="Dont forget to place here The Supplier Name")
     * @Assert\Length(max="50", maxMessage="This supplier name is too long, {{ limit }} characters max.")
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Dont forget to enter here the location of the supplier")
     */
    private $description;

    /**
     * @Assert\NotBlank(message="Everything have got a Price")
     */
    private $price;

    /**
     * @Assert\Image(
     *     mimeTypesMessage="asserts.article.image.mimetype",
     *     maxSize="2M", maxSizeMessage="Max Size of image : {{ limit }}"
     * )
     */
    private $image;

    private $reference;

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->Supplier;
    }

    /**
     * @param mixed $Supplier
     */
    public function setSupplier($Supplier): void
    {
        $this->Supplier = $Supplier;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }







}