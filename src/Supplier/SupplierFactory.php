<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 15:39
 */

namespace App\Supplier;


use App\Entity\Supplier;

class SupplierFactory
{
    /**
     * @param SupplierRequest $request
     * @return Supplier
     */
    public function createSupplierFromRequest(SupplierRequest $request): Supplier
    {
        $supplier = new Supplier();
        $supplier->setName($request->getName());
        $supplier->setEmail($request->getEmail());
        $supplier->setLocation($request->getLocation());
        return $supplier;
    }
}