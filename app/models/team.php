<?php

    // model webSiteInfo

    function M_Team_ShowTeam()
    {
        $dataShowTeam = ResultExtract('team', array('id','name','description','image'), array(Condition('deleted', '=', '0')), NULL);
        return $dataShowTeam;
    }
    
    function M_Team_GetListTeam()
    {
        $data = ResultExtract('team', array('id','name'), array(Condition('deleted', '=', '0')), NULL);
        return $data;
    }
    
    function M_Team_AddTeam($data)
    {
        return DoQuery(Insert("team", array('name','description','image'),
                                                 array($data["name"], $data["description"], $data["image"])));
    }
    
    function M_Team_EditTeamLoad($id)
    {
        $dataContactInfo = ResultExtract('team', array('id','name','description','image'), array('id','=',$id), NULL);
        return $dataContactInfo;
    }
    
    function M_Team_UpdateTeam($data)
    {
        return DoQuery(Update('team', array('name','description','image'),
                                                 array($data["name"], $data["description"], $data["image"]),
                                                 array('id','=',$data["id"]),NULL));

    }
    
    function M_Team_UpdateTeamNonPhoto($data)
    {
        return DoQuery(Update('team', array('name','description'),
                                                 array($data["name"], $data["description"]),
                                                 array('id','=',$data["id"]),NULL));

    }
    
    function M_Team_DeleteContact($data)
    {
        return DoQuery(Update('team', array('deleted'), array(1), array('id','=',$data), NULL));
    }
