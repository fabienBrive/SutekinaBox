<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 15:39
 */

namespace App\Supplier;


use App\Entity\Supplier;
use Doctrine\Common\Persistence\ObjectManager;

class SupplierRequestHandler
{
    private $manager, $supplierFactory;

    /**
     * MembreRequestHandler constructor.
     * @param ObjectManager $manager
     * @param SupplierFactory $supplierFactory
     */
    public function __construct(ObjectManager $manager,
                                SupplierFactory $supplierFactory)
    {
        $this->manager = $manager;
        $this->supplierFactory = $supplierFactory;
    }

    public function handle(SupplierRequest $request): Supplier
    {
        $supplier = $this->supplierFactory->createSupplierFromRequest($request);

        $this->manager->persist($supplier);
        $this->manager->flush();

        return $supplier;
    }
}