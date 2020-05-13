<?php
//Tester si un nombre est vide
function isEmpty($nbre,$sms=null)
{
    if(empty($nbre))
    {
        if($sms==null)
        {
            $sms="Le nombre est obligatoire";
        }
        return $sms;
    }
}
function isNumeric($nbre,$sms=null)
{
    if(is_numeric($nbre))
    {
        if($sms==null)
        {
            $sms="Le nombre doit etre un Numerique";
        }
    }
}
?>