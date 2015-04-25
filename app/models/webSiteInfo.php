<?php

    // model webSiteInfo

    function M_GetBasicInfo()
    {
        $dataBasicInfo = ResultExtract('website_info', array('name','street','post','city','facebook'), NULL, NULL);
        return $dataBasicInfo;
    }
    
    function M_GetContactInfo()
    {
        $dataContactInfo = ResultExtract('website_contact', array('name','mail','phone'), NULL, NULL);
        return $dataContactInfo;
    }
    
    function M_UpdateBasicInfo($data)
    {        
        return DoQuery(Update('website_info', array('name','street','post','city','facebook'), 
                                              array($data["name"],$data["street"],$data["post"],$data["city"],$data["facebook"]),
                                              array('id','=','1'),
                                              NULL));
    }
    
    function M_AddContact($data)
    {
        return DoQuery(Insert("website_contact", array('name','mail','phone'),
                                                 array($data["name"], $data["mail"], $data["phone"])));
    }
    
    function M_EditContactLoad($id)
    {
        $dataContactInfo = ResultExtract('website_contact', array('name','mail','phone'), array('id','=',$id), NULL);
        return $dataContactInfo;
    }
    
    function M_DeleteContact()
    {
        
    }
    