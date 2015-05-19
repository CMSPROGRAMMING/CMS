<?php

    // model webSiteInfo

    function M_Sponsors_ShowSponsors()
    {
        $dataShowSponsors = ResultExtract('sponsors', array('id','name','description','image'), array(Condition('deleted', '=', '0')), NULL);
        return $dataShowSponsors;
    }
    
    function M_Sponsors_GetListSponsors()
    {
        $data = ResultExtract('sponsors', array('id','name'), array(Condition('deleted', '=', '0')), NULL);
        return $data;
    }
    
    function M_Sponsors_AddSponsors($data)
    {
        return DoQuery(Insert("sponsors", array('name','description','image'),
                                                 array($data["name"], $data["description"], $data["image"])));
    }
    
    function M_Sponsors_EditSponsorsLoad($id)
    {
        $dataContactInfo = ResultExtract('sponsors', array('id','name','description','image'), array('id','=',$id), NULL);
        return $dataContactInfo;
    }
    
    function M_Sponsors_UpdateSponsors($data)
    {
        return DoQuery(Update('sponsors', array('name','description','image'),
                                                 array($data["name"], $data["description"], $data["image"]),
                                                 array('id','=',$data["id"]),NULL));

    }
    
    function M_Sponsors_UpdateSponsorsNonPhoto($data)
    {
        return DoQuery(Update('sponsors', array('name','description'),
                                                 array($data["name"], $data["description"]),
                                                 array('id','=',$data["id"]),NULL));

    }
    
    function M_Sponsors_DeleteContact($data)
    {
        return DoQuery(Update('sponsors', array('deleted'), array(1), array('id','=',$data), NULL));
    }
