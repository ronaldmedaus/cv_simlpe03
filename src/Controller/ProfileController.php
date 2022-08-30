<?php 

namespace App\Controller;

use App\Entity\User;
use App\Form\EditInfoType;
use App\Form\UploadImageType;
use App\Form\ContactSupportType;
use App\Form\EditAccountPasswordType;
use App\Repository\PurchaseRepository;
use App\Services\Mail\SendPreparedMail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile/detail', name: 'profile_detail')]
    public function profile()
    {
        return $this->render("profile/detail.html.twig");
    }

    #[Route('/profile/image/edit', name: 'profile_image_edit')]
    public function changePhotoProfile(EntityManagerInterface $em, Request $request,SluggerInterface $slugger)
    {
        /** @var User $user */
        $user = $this->getUser();

        $form = $this->createForm(UploadImageType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            /** @var UploadedFile $file */
            $file = $form->get('image')->getData();

            //Je vais d'abord récupérer le nom : 
            $originalFilename = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);

            //Je dois sluggifier le nom pour le rendre safe :
            $safeFileName = $slugger->slug($originalFilename);

            //Je dois changer le nom pour le rendre unique
            $uniqFilename = $safeFileName . '-' .  md5(uniqid()) . '.' . $file->guessExtension();

            //Je prend le file et je l envoie dans sa maison(/public/uploads/images)
            $file->move(
                $this->getParameter('app_images_directory'),
                $uniqFilename
            );

            //J'enregistre le chemin qui me ramene vers ce fichier en bdd
            //Je set le ImagePath (propriété de catégorie)
            $user->setImagePath('/uploads/images/' . $uniqFilename);

            $em->flush();

            $this->addFlash("success","La photo de profil a été mis à jour.");
            return $this->redirectToRoute("profile_detail");
    
        }

        return $this->render("profile/image_update.html.twig",[
            'form' => $form->createView()
        ]);
    }



    #[Route('/profile/edit/password', name: 'profile_edit_password')]
    public function changePassword(Request $request,
                EntityManagerInterface $em,UserPasswordHasherInterface $userPasswordHasher)
    {
           /** @var User $user */
        $user = $this->getUser();

        $formPassword = $this->createForm(EditAccountPasswordType::class);

        $formPassword->handleRequest($request);

        if($formPassword->isSubmitted() && $formPassword->isValid())
        {
               // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $formPassword->get('plainPassword')->getData()
                )
            );

            $em->flush();

            $this->addFlash("success","Votre mot de passe a bien été modifié.");
            return $this->redirectToRoute("profile_detail");
            }

            return $this->render("profile/edit_password.html.twig",[
                'form' => $formPassword->createView(),
            ]);
    }

    #[Route('/profile/edit/info', name: 'profile_edit_info')]
    public function changeInfo(Request $request,EntityManagerInterface $em)
    {
        /** @var User $user */
        $user = $this->getUser();

        $form = $this->createForm(EditInfoType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($user);
            $em->flush();

        $this->addFlash("success","Vos informations ont bien été modifiées.");
        return $this->redirectToRoute("profile_detail");
        }

        return $this->render("profile/edit_info.html.twig",[
        'form' => $form->createView(),
        ]);

    }

    #[Route('/profile/apropos', name: 'profile_apropos')]
    public function aPropos(Request $request,EntityManagerInterface $em)
    {
        /** @var User $user */
        $user = $this->getUser();

        $form = $this->createForm(EditInfoType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($user);
            $em->flush();

        $this->addFlash("success","Vos informations ont bien été modifiées.");
        return $this->redirectToRoute("profile_detail");
        }

        return $this->render("profile/apropos.html.twig",[
        'form' => $form->createView(),
        ]);

    }

}
