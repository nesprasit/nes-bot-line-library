<?php
/**
 * Created by Naja.
 * User: NEs
 * Date: 4/28/2017 AD
 * Time: 12:15 PM
 */

class command {
    private $base_url = "https://api.line.me/v2/bot/";

    /**
     * @param $token
     * @param $body
     * Respond to events from users, groups, and rooms.
     *
     * Webhooks are used to notify you when an event occurs. For events that you can respond to,
     * a replyToken is issued for replying to messages.
     *
     * Because the replyToken becomes invalid after a certain period of time,
     * responses should be sent as soon as a message is received. Reply tokens can only be used once.
     *
     * Body : [{
     *          replyToken: String
     *          messages: Array Object (object or template)
     *        }]
     *
     **/
     function reply_messaging($token,$body){
         /* POST REPLY */
         $url_reply = $this->base_url."message/reply";

         $header = array(
             "Content-Type: application/json",
             "Authorization: Bearer ".$token
         );

         echo $this->post($url_reply,$header,$body). "\r\n";
    }

    /**
     * @param $token
     * @param $body
     *
     * Send messages to a user, group, or room at any time.
     * INFO : Use of the Push Message API is limited to certain plans.
     * Body : [{
     *          to: String
     *          messages: Array Object (object or template)
     *        }]
     **/
    function push_messaging($token,$body){
        /* POST PUSH */
        $url_push = $this->base_url."message/push";

        $header = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token
        );

        echo $this->post($url_push,$header,$body). "\r\n";
    }

    /**
     * @param $token
     * @param $body
     *
     * Send messages to multiple users at any time.
     * INFO : Only available for plans which support push messages. Messages cannot be sent to groups or rooms.
     * Body : [{
     *          to: Array
     *          messages: Array Object (object or template)
     *        }]
     **/
    function multicast_messaging($token,$body){
        /* POST MULTICAST */
        $url_multicast = $this->base_url."message/multicast";

        $header = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token
        );

        echo $this->post($url_multicast,$header,$body). "\r\n";
    }

    /**
     * @param $url
     * @param $header
     * @param $body
     *
     * @return mixed
     */
    private function post($url,$header,$body){

//        echo $body;

        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$body);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}