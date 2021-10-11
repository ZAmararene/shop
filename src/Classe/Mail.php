<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = '432ec640edd2b3590d97670decdafd5d';
    private $api_key_secret = '1ba3104984dd137baf3561ac46225d37';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret, true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "zina.amararene@gmail.com",
                        'Name' => "La Boutique Française"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 3243304,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    "Variables" => [
                        "content" => $content
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
