<?php

/* 
 * Główny index.php - kontroler
 * 
 * Header:
 * - menu
 * - slider
 * - facebook 
 * - basic info
 *  
 * 
 */
        require_once MODELS_DIR . "index.php";
	
        function CreateMenu()
        {
            $menuList = ResultExtract('modules', array('name','path'),array(Condition('active', '=', '1'),  Condition('language', '=', 'pl')), array('AND'));
            
            echo $menuList[0]['name'];
            
            
            /*		$result = mysql_query($query);
		$i = 0;
		
		while($row = mysql_fetch_array($result))
		{
			$modules[$i] = $row['modules_path'];
			$modules[$i+1] = $row['modules_name'];
			$i+=2;
		}
		
		return $modules;*/
        }
        
        function CreateSlider()
        {
            
        }
        
        function CreateFacebook()
        {
            
        }
        
        function CreateBasicInfo()
        {
            
        }
        
        
        function LoadHeaderFooter()
        {
            CreateMenu();
            CreateSlider();
            CreateFacebook();
            CreateBasicInfo();
        }
        
        function LoadContent()
        {
            
        }
        
        function Render()
        {
            LoadHeaderFooter();
            LoadContent();
        }
        

	/*function redner($query_all_models, $query_controler_name, $controler)
	{
		$controler_name = controler_name($query_controler_name, $controler);
		$modules = show_all_modules($query_all_models);
		$stopka = show_footer();
		require_once DIR_VIEWS . "index.php";	
	}*/
	
	//redner($query_all_modules,$query_name, $controler);
        CreateMenu();