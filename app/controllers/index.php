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
	
        function CreateMenu($lang)
        {

            $menuList = ResultExtract('module', array('name','path'),array(Condition('active', '=', '1'),  Condition('language', '=', $lang)), array('AND'));
            
            echo $menuList[0]['name'];           
        }
        
        function CreateSlider()
        {
            
        }
        
        function CreateFacebook()
        {
            
        }
        
        function CreateBasicInfo()
        {
            $dataBasicInfo = ResultExtract('website_info', array('name','street','code','city','facebook'), NULL, NULL);
            $dataContactInfo = ResultExtract('website_contact', array('name','mail','phone'), NULL, NULL);
            
        }
        
        
        function LoadHeaderFooter($lang)
        {
            CreateMenu($lang);
            CreateSlider();
            CreateFacebook();
            CreateBasicInfo();
        }
        
        function LoadContent()
        {
            
        }
        
        function Render()
        {
            $lang = GetLanguage();
            LoadHeaderFooter($lang);
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