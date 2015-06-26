<?php
class TutorPageExtension extends DataExtension {
	
	public function onAfterUnpublish(){
          	
	    // print "<script>alert('THIS IS GETTING CALLED');</script>";
	    

	     $subject = "Your Tutor Iowa page has been disabled";
		 $body = "You can request your details be edited <a href='" . Director::absoluteBaseURL() . "edit-profile-page'>here</a/> "; 
		         	 
		 $email = new Email(); 
		 $email->setTo($this->owner->Bio); 
	     $email->setFrom("tutoriowa@uiowa.edu"); 
	     $email->setSubject($subject); 
		 $email->setBody($body);
		 $email->send(); 
		 
		
		 
		 //$test = DataObject::get("Member", "Surname='Clashman'");
		 //$test->Surname = "alacabash";
		 //$test->write();
		 
		 
		 
	}
	
	function onBeforeUnpublish(){
		$this->changeParentUnpublish();
	}
	
	public function changeParentUnpublish(){
    

		 $tutorParent = TutorHolder::get()->filter(array('Title' => 'Inactive Tutors'))->first();

		 $this->owner->setParent($tutorParent); 
		 $this->owner->write();
		 
		 
	}

}