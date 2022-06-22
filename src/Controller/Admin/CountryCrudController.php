<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CountryCrudController extends AbstractCrudController
{
    public const COUNTRY_BASE_PATH = 'upload/images/country';
    public const COUNTRY_UPLOAD_DIR = 'public/upload/images/country';

    public static function getEntityFqcn(): string
    {
        return Country::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'), 
            ImageField::new('image', 'Image')->setBasePath(self::COUNTRY_BASE_PATH)
                                             ->setUploadDir(self::COUNTRY_UPLOAD_DIR)
                                             ->setSortable(false),                                 
            NumberField::new('latitude', 'Latitude'),
            NumberField::new('longitude', 'Longitude'),
            BooleanField::new('active', 'Activer'),    
            DateTimeField::new('updatedAt')->hideOnForm(),
            DatetimeField::new('createdAt')->hideOnForm(),                         
            TextField::new('user', 'Utilisateur')->onlyOnIndex(),                                 
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // if ($entityInstance instanceof Country) return;
        $entityInstance->setUser($this->getUser());
        $entityInstance->setCreatedAt(new \DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Country) return;

        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($entityManager, $entityInstance);
    }
}
