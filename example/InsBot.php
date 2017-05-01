<?php
require_once 'command.php';
require_once 'message_object.php';
require_once 'message_template.php';

//include 'test_con_sql.php';
/**
 * Created by Naja.
 * User: Nes
 * Date: 4/27/2017 AD
 * Time: 5:12 PM
 */

/* Debug Error */
//ini_set('display_errors',1);
//error_reporting(E_ALL);
//
//$json = "{
//   \"events\":[
//      {
//         \"type\":\"message\",
//         \"replyToken\":\"ff0295336d2749968aed781c2b9176f7\",
//         \"source\":{
//            \"userId\":\"Uf5350fe9193f33a7489e6493cd016b69\",
//            \"type\":\"user\"
//         },
//         \"timestamp\":1493380938386,
//         \"message\":{
//            \"type\":\"sticker\",
//            \"id\":\"6005688848725\",
//            \"stickerId\":\"48133\",
//            \"packageId\":\"2000000\"
//         }
//      }
//   ]
//}";

/* Call Class command */
$bot_comm = new command();

/* Call Class message_object */
$bot_obj = new message_object();

/* Call Class message_template */
$bot_tem = new message_template();

$token = "My_Token";

/* Get POST body json events */
$json = file_get_contents('php://input');

/* Parse JSON */
$events = json_decode($json, true);

if(!is_null($events)){

//    /* add object event on db */
//    addUserID(json_encode($json));

    foreach ($events["events"] as $event){

        /* type String */
        $replyToken = $event["replyToken"];
        /* type String */
        $type = $event["type"];
        /* type Int */
        $timestamp = $event["timestamp"];
        /* type Json Array */
        $source = $event["source"];
        /* type Json Array */
        $message = $event["message"];

        /* type String */
        $sourceType = $source["type"];
        $sourceUserID = $source["userId"];

        $messageID = $message["id"];
        $messageType = $message["type"];

//        print "replyToken : ".$replyToken."\n";
//        print "type : ".$type."\n";
//        print "timestamp : ".$timestamp."\n";
//
//        print_r($source);
//        print_r($message);
//
//        print "sourceType : ".$sourceType."\n";
//        print "sourceUserID : ".$sourceUserID."\n\n\n\n";
//
//        print "messageID : ".$messageID."\n";
//        print "messageType : ".$messageType."\n";
//        print "messageText : ".$messageText."\n";

        if(!is_null($message) && $type == "message"){

            if($message["text"] == "ดูเสื้อแมว"){
                $action_url = $bot_tem->action_url(
                    "ดู เสื้อ แมว",
                    "https://s-media-cache-ak0.pinimg.com/originals/f4/ed/6b/f4ed6b5fa4edfd911575080baa43a28b.png"
                );

                $btn = $bot_tem->buttons_object(
                    "https://s-media-cache-ak0.pinimg.com/originals/f4/ed/6b/f4ed6b5fa4edfd911575080baa43a28b.png",
                    "เสื้อแมว",
                    "เสื้อแมวใส่แล้วคัน ใส่แล้วเป็นภูแพ้อย่างหนัก โปรดใส่มันไว้",
                    array($action_url)
                );

                $obj_template = $bot_tem->template(
                    "เสื้อแมว",
                    $btn
                );

                $body = array(
                    "replyToken" => $replyToken,
                    "messages" => array($obj_template)
                );

                $bot_comm->reply_messaging($token,json_encode($body));
            }else
            if($message["text"] == "ดูเสื้อแมวอีก"){

                $action_url_1 = $bot_tem->action_url(
                    "ดู เสื้อ แมว",
                    "https://s-media-cache-ak0.pinimg.com/originals/f4/ed/6b/f4ed6b5fa4edfd911575080baa43a28b.png"
                );

                $action_url_2 = $bot_tem->action_url(
                    "ดู เสื้อ แมว",
                    "https://image.spreadshirtmedia.net/image-server/v1/products/144894371/views/1,width=800,height=800,appearanceId=2,version=1476921835/cat-heartbeat-line-t-shirts-women-s-t-shirt.jpg"
                );

                $action_url_3 = $bot_tem->action_url(
                    "ดู เสื้อ แมว",
                    "https://cdn.shopify.com/s/files/1/1376/1317/products/s_2718_KaPFnPPdPdKjFTX228PDshSWPe7HRnCharcoal_1024x1024.png?v=1477155510"
                );

                $col_template_1 = $bot_tem->columns_object(
                    "https://s-media-cache-ak0.pinimg.com/originals/f4/ed/6b/f4ed6b5fa4edfd911575080baa43a28b.png",
                    "เสื้อแมว",
                    "เสื้อแมวใส่แล้วคัน ใส่แล้วเป็นภูแพ้อย่างหนัก โปรดใส่มันไว้",
                    array($action_url_1)
                );

                $col_template_2 = $bot_tem->columns_object(
                    "https://image.spreadshirtmedia.net/image-server/v1/products/144894371/views/1,width=800,height=800,appearanceId=2,version=1476921835/cat-heartbeat-line-t-shirts-women-s-t-shirt.jpg",
                    "เสื้อแมว",
                    "เสื้อแมวใส่แล้วคัน ใส่แล้วเป็นภูแพ้อย่างหนัก โปรดใส่มันไว้",
                    array($action_url_2)
                );

                $col_template_3 = $bot_tem->columns_object(
                    "https://cdn.shopify.com/s/files/1/1376/1317/products/s_2718_KaPFnPPdPdKjFTX228PDshSWPe7HRnCharcoal_1024x1024.png?v=1477155510",
                    "เสื้อแมว",
                    "เสื้อแมวใส่แล้วคัน ใส่แล้วเป็นภูแพ้อย่างหนัก โปรดใส่มันไว้",
                    array($action_url_3)
                );

                $carousel = $bot_tem->carousel_object(
                    array($col_template_1,$col_template_2,$col_template_3)
                );


                $obj_template = $bot_tem->template(
                    "เสื้อแมว",
                    $carousel
                );

                $body = array(
                    "replyToken" => $replyToken,
                    "messages" => array($obj_template)
                );

                //echo json_encode($body);

                $bot_comm->reply_messaging($token,json_encode($body));
            }else{
                $text = $bot_obj->text(
                    "ไม่รู้จักคำ : [ ".$message["text"]." ] เหมียว ๆ ".$bot_obj->unichr(0x10007C)
                );

                $text_2 = $bot_obj->text(
                    "รู้จักแต่[ ดูเสื้อแมว , ดูเสื้อแมวอีก ] เหมียว ๆ".$bot_obj->unichr(0x100095)
                );

                $body = array(
                    "to" => $sourceUserID,
                    "messages" => array($text,$text_2)
                );

//                echo json_encode($body)."\n";

                $bot_comm->push_messaging($token,json_encode($body));

            }
        }
    }
}



















