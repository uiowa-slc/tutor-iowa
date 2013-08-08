<?php
/**
 * Defines the HomePage page type
 */
 
class HomePage extends Page {
   static $db = array(
   'FrontPageBlurb' => 'Text'
   
   );

 

   static $has_one = array(

      	"MainImage" => "Image"


   );

   static $defaults = array ('ProvideComments' => '1'
   );  

          
    public function getCMSFields() {
    
    	$fields = parent::getCMSFields();
    	
    	$config = GridFieldConfig_RelationEditor::create();
		$config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
			'EmailAddress'=>'EmailAddress'
		)); 
		$NewsletterPerson = new GridField(
			'NewsletterPersons',
			'NewsletterPerson',
			NewsletterPerson::get(), 
			$config
		);
		
    	/*$fields->addFieldToTab("Root.EmailSignups", 
    		 new DataObjectManager(
			$this,
			'NewsletterPersons',
			'NewsletterPerson',
			array('EmailAddress'=>'EmailAddress'),
			'getCMSFields_forPopup'
		));*/
		
		$fields->addFieldToTab("Root.EmailSignups", $NewsletterPerson); 
		$fields->addFieldToTab("Root.Main", new TextField("FrontPageBlurb", "Front Page Blurb"));
		$fields->addFieldToTab("Root.Main", new UploadField("MainImage", "Main Image"));

    
    	return $fields;

    }
}
 
class HomePage_Controller extends Page_Controller {
     function LatestNews($num=5) {
	     //$news = DataObject::get_one("ArticleHolder");
	     $news = ArticleHolder::get()->first(); 
	     //return ($news) ? DataObject::get("ArticlePage", "ParentID = $news->ID", "Date DESC", "", $num) : false;
	     return ($news) ? ArticlePage::get()->filter(array('ParentID' => '$news->ID'))->sort('Date DESC') : false; 
	  }
	  
	  public function NewsletterSignedUp(){
	  
	  	 $signedUp = $this->request->getVar('signup');
	  	// print_r($this->request);
	  	 
	  	// print_r(Director::urlParams());
	  	 if(intval($signedUp) == 1){
		  	 
		  	 return true;
		  	 
	  	 }else {
		  	 return false;
		  	 
	  	 }
	  
	  
	  }
	  
	 
	 public function rss() {
		 $rss = new RSSFeed($this->Children(), $this->Link(), "Tutor news");
		 $rss->outputToBrowser();
     }
     
     public function init() {
	     RSSFeed::linkToFeed($this->Link() . "rss");    
	     parent::init();
	 }
	 
	 
}
