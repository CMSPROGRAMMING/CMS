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
            require_once CONTROLLERS_DIR . 'webSiteInfo.php';   
            
            $basicInfo["BasicInfo"] = $dataBasicInfo;
            $basicInfo["ContactInfo"] = $dataContactInfo;

            return $basicInfo;           
        }
        
        
        function LoadHeaderFooter($lang)
        {
            CreateMenu($lang);
            CreateSlider();
            CreateFacebook();
        }
        
        function LoadContent()
        {
            
        }
        
        function Render()
        {
            $lang = GetLanguage();
            LoadHeaderFooter($lang);
            
            $basicInfo = CreateBasicInfo();
            

           
            /*echo "<br />Nazwa: " . $basicInfo["BasicInfo"][0]["name"];
            echo "<br />Ulica: " . $basicInfo["BasicInfo"][0]["street"];
            echo "<br />Miast: " . $basicInfo["BasicInfo"][0]["post"] . "," . $basicInfo["BasicInfo"][0]["city"];
            
            echo "<br />Nazwa: " . $basicInfo["ContactInfo"][0]["name"];
            echo "<br />Telefon: " . $basicInfo["ContactInfo"][0]["phone"];
            echo "<br />E-mail: " . $basicInfo["ContactInfo"][0]["mail"];
            
            echo "<br />Nazwa: " . $basicInfo["ContactInfo"][1]["name"];
            echo "<br />Telefon: " . $basicInfo["ContactInfo"][1]["phone"];
            echo "<br />E-mail: " . $basicInfo["ContactInfo"][1]["mail"];*/            

             
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
       // CreateMenu(GetLanguage());
        Render();