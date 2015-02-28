<?php

namespace TwilioSmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TwilioSmsBundle\Twilio\Twilio;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TwilioSmsBundle:Default:index.html.twig');
    }
    
    public function sendSMSAction(Request $request)
    {
        $people = array($request->get("telephone") => $request->get("fullname"));
        $message = $request->get("message");
        
        $twilio = new Twilio(); // Create an instance of the custom Twilio class
        $twilio->sendSMS($people, $message); // Send SMS. It will always send once you have PHP-Curl enabled
        
        $request->getSession()->getFlashBag()->set("message", "Your SMS has been sent. Smile for the camera.");
        return $this->redirect($this->generateUrl("twilio_sms_homepage"));
    }
}
