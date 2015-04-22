<?php

    // model webSiteInfo

    function GetBasicInfo()
    {
        $dataBasicInfo = ResultExtract('website_info', array('name','street','post','city','facebook'), NULL, NULL);
        return $dataBasicInfo;
    }
    
    function GetContactInfo()
    {
        $dataContactInfo = ResultExtract('website_contact', array('name','mail','phone'), NULL, NULL);
        return $dataContactInfo;
    }