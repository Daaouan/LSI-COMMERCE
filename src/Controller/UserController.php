<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request ;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\UserType;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;


class UserController extends AbstractController
{
    private $ProductRepository;
    private $CategoryRepository;

    public function __construct(ProductRepository $ProductRepository,CategoryRepository $CategoryRepository){
        $this->ProductRepository=$ProductRepository;
        $this->CategoryRepository=$CategoryRepository;
    }
    
    #[Route('/user/edit/{id}', name: 'user.edit', methods:['GET','POST'])]
    public function edit(User $user,Request $request ,EntityManagerInterface $entityManager): Response
    {   
        $categories=$this->CategoryRepository->findAll();
        $products=$this->ProductRepository->findAll();
         if(!$this->getUser()){
            return $this->redirectToRoute('security.login');
         }
         if($this->getUser()!==$user){
            return $this->redirectToRoute('app_product');
         }
         $form=$this->createForm(UserType::class,$user);
         $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'The Account '.$user->getPseudo().' was edited successfully!'
             );
             return $this->redirectToRoute('home');
            }
            return $this->render('user/edit.html.twig', [
            'form'=>$form->createView(),
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
