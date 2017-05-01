<?php

/**
 * Created by Naja.
 * User: NEs
 * Date: 4/28/2017 AD
 * Time: 5:37 PM
 */
class message_object{

    /**
     * @param $msg_text
     * msg_text type String : Message text Max: 2000 characters
     * and You can include emoticons in your message text.
     * link https://devdocs.line.me/files/emoticon.pdf
     *
     * @return array
     */
    function text($msg_text){
        return array(
            "type" => "text",
            "text" => $msg_text
        );
    }

    /**
     * @param $unicode
     * unicode converted to character codes
     * use emoticons
     *
     * @return string
     */
    function unichr($unicode) {
        return iconv('UCS-4LE', 'UTF-8', pack('V', $unicode));
    }

    /**
     * @param $originalContentUrl
     * @param $previewImageUrl
     * $originalContentUrl type String :
     *                      Image URL (Max: 1000 characters)
                            HTTPS
                            JPEG
                            Max: 1024 x 1024
                            Max: 1 MB
     *
     * $previewImageUrl type String :
     *                      Preview image URL (Max: 1000 characters)
                            HTTPS
                            JPEG
                            Max: 240 x 240
                            Max: 1 MB
     *
     * @return array
    **/
    function image($originalContentUrl,$previewImageUrl){
        return array(
            "type" => "image",
            "originalContentUrl" => $originalContentUrl,
            "previewImageUrl" => $previewImageUrl
        );
    }

    function video($originalContentUrl,$previewImageUrl){
        return array(
            "type" => "video",
            "originalContentUrl" => $originalContentUrl,
            "previewImageUrl" => $previewImageUrl
        );
    }

    function audio($originalContentUrl,$duration){
        return array(
            "type" => "audio",
            "originalContentUrl" => $originalContentUrl,
            "duration" => $duration
        );
    }

    function location($originalContentUrl,$address,$latitude,$longitude){
        return array(
            "type" => "location",
            "title" => $originalContentUrl,
            "address" => $address,
            "latitude" => $latitude,
            "longitude" => $longitude
        );
    }

    function sticker($packageId,$stickerId){
        return array(
            "type" => "sticker",
            "packageId" => $packageId,
            "stickerId" => $stickerId
        );
    }

    /**
     * @param $url
     * @param $altText
     * @param $baseW
     * @param $baseH
     * @param $action
     *
     * $url is baseUrl as  https://domain.com/bot/images/
     * Below are the image resolutions required by client devices.
     * Width: 240px, 300px, 460px, 700px, 1040px
     * file image name 240,300,460,700,1040 (no extension)
     * https://github.com/line/line-bot-sdk-go/issues/34
     *
     *
     *The image used for the imagemap must meet the following specifications:
        Image format: JPEG or PNG
        File size: Up to 1 MB
     *
     * @return array
     */

     function image_map($url,$altText,$baseW,$baseH,$action){
        return array(
            "type" => "imagemap",
            "baseUrl" => $url,
            "altText" => $altText,
            "baseSize" => array(
                "height" => $baseH,
                "width" => $baseW
            ),
            "actions" => $action
        );
    }

    function action_url($linkUri,$area){
        return array(
            "type" => "uri",
            "linkUri" => $linkUri,
            "area" => $area
        );
    }

    function action_message($text,$area_object){
        return array(
            "type" => "message",
            "text" => $text,
            "area" => $area_object
        );
    }

    function area_object($x,$y,$width,$height){
        return array(
            "x" => $x,
            "y" => $y,
            "width" => $width,
            "height" => $height,
        );
    }

}