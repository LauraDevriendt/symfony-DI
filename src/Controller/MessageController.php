<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Master;
use App\Entity\SpaceToDash;
use App\Form\MessageFormType;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Monolog\Handler\StreamHandler;




class MessageController extends AbstractController
{
    /**
     * @Route("/", name="message")
     */
    public function index(Request $request)
    {
        if($request->request->get('message_form') !==null){
            $formInput=$request->request->get('message_form');
            $message=$formInput['userinput'];
            $log=new Logger('message');
            $log->pushHandler(new StreamHandler('logs/info.log', Logger::INFO));
            if($formInput['transform']){
                $master=new Master($message, new Capitalize(),$log );
            }else{
                $master=new Master($message, new SpaceToDash(),$log );
            }

            $transformedMessage=$master->getUserinput();
        }else{
            $transformedMessage="";
        }

        $form=$this->createForm(MessageFormType::class);
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
            'form'=> $form->createView(),
            'message'=>$transformedMessage,
        ]);
    }
}
