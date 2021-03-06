<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ClubCrudController extends AbstractCrudController
{
    public const CLUB_BASE_PATH = 'upload/images/club';
    public const CLUB_UPLOAD_DIR = 'public/upload/images/club';

    public static function getEntityFqcn(): string
    {
        return Club::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            AssociationField::new('country', 'Pays'),
            AssociationField::new('sport'), 
            TextareaField::new('description', 'Description'),
            ImageField::new('image', 'Image')->setBasePath(self::CLUB_BASE_PATH)
                                             ->setUploadDir(self::CLUB_UPLOAD_DIR)
                                             ->setSortable(false),
            UrlField::new('website', 'Site internet'),                                 
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
        // if ($entityInstance instanceof Sport) return;
        $entityInstance->setUser($this->getUser());
        $entityInstance->setCreatedAt(new \DateTimeImmutable);

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Club) return;

        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($entityManager, $entityInstance);
    }
}
