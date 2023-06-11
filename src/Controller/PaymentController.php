<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Stripe\StripeClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    private $manager;

    private $gateway;
    private $urlGeneratorInterface;

    public function __construct(EntityManagerInterface $manager , UrlGeneratorInterface $urlGeneratorInterface)
    {
        $this->manager = $manager;
        $this->urlGeneratorInterface=$urlGeneratorInterface;
        $this->gateway = new StripeClient($_ENV['STRIPE_SECRETKEY']);
    }
    #[Route('/payment', name: 'app_payment')]
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }
    #[Route('/checkout', name: 'app_checkout', methods: "POST")]
    public function checkout(Request $request): Response
    {
        $amount = $request->request->get('amount');

        $quantity = $request->request->get('quantity');
        $name = $request->request->get('name');

        //créer le checkout

        $checkout = $this->gateway->checkout->sessions->create(
            [
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $name,
                            ],

                            'unit_amount' => intval($amount),

                        ],
                        'quantity' => $quantity
                    ]
                ],

                'mode' => 'payment',
                'success_url' => 'https://127.0.0.1:8000/success?id_sessions={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'https://127.0.0.1:8000/cancel?id_sessions={CHECKOUT_SESSION_ID}'
            ]
        );
        return $this->redirect($checkout->url);
    }

    #[Route('/success', name: 'app_success')]
    public function success(Request $request): Response
    {
        $id_sessions=$request->query->get('id_sessions');

        
        //Récupère le customer via l'id de la  session
        $customer=$this->gateway->checkout->sessions->retrieve(
            $id_sessions,
            []
        );

        //Récupérer les informations du customer et de la transaction

        $name=$customer["customer_details"]["name"];

        $email=$customer["customer_details"]["email"];

        $payment_status=$customer["payment_status"];

        $amount=$customer['amount_total'];

       

        //Stocker au niveau de la base de données



        //Email au customer




        //Message de succès


        return $this->render('payment/success.html.twig',[
            'name'=>$name
        ]);

    }
}