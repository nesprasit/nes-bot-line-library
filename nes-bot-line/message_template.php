<?php

/**
 * Created by Naja.
 * User: NEs
 * Date: 4/28/2017 AD
 * Time: 6:06 PM
 */
class message_template{

    function template($altText,$template_object){
        return array(
            "type" => "template",
            "altText" => $altText,
            "template" => $template_object,
        );
    }

    function buttons_object($thumImageUrl,$title,$text,$actions){
        return array(
            "type" => "buttons",
            "thumbnailImageUrl" => $thumImageUrl,
            "title" => $title,
            "text" => $text,
            "actions" => $actions,
        );
    }

    function confirm_object($text,$actions){
        return array(
            "type" => "confirm",
            "text" => $text,
            "actions" => $actions,
        );
    }

    function carousel_object($columns_object){
        return array(
            "type" => "carousel",
            "columns" => $columns_object,
        );
    }

    function columns_object($thumImageUrl,$title,$text,$actions){
        return array(
            "thumbnailImageUrl" => $thumImageUrl,
            "title" => $title,
            "text" => $text,
            "actions" => $actions,
        );
    }

    function action_postback($label,$data,$text){
        return array(
            "type" => "postback",
            "label" => $label,
            "data" => $data,
            "text" => $text,
        );
    }

    function action_message($label,$text){
        return array(
            "type" => "message",
            "label" => $label,
            "text" => $text,
        );
    }

    function action_url($label,$uri){
        return array(
            "type" => "uri",
            "label" => $label,
            "uri" => $uri,
        );
    }
}