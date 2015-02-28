<?php

namespace TwilioSmsBundle\Twilio;

require("Services/Twilio.php");

class Twilio {
    private $AccountSid = "YOUR_ACCOUNT_SID";
    private $AuthToken = "YOUR_AUTH_TOKEN";

    /**
     * Send an SMS using the Twilio service
     *
     * @param array $people An array of $number => $name pairs
     * @param string $message The message to send to the receivers
     *
     * @return bool
     */
    public function sendSMS($people, $message) {
        $client = new \Services_Twilio($this->AccountSid, $this->AuthToken);
        
        foreach ($people as $number => $name) {
            $sms = $client->account->messages->sendMessage("+12052089189", $number, $message);
        }
        
        return true;
    }
}