<?php
session_start();
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;

class OnboardingConversation extends Conversation
{

    protected $kind;

    public function askKind()
    {
        $this->ask('찾으려는 품종이 뭔가요?', function($answer) {
            $kind = $answer->getText();
            $this->say('감사합니다. '.$kind.'이군요!');
            $_SESSION["kind"]=$kind;
            $this->askPlace();
        });
    }
    
    public function askPlace()
    {
    	$this->ask('어디서 잃어버리셨나요?', function($answer) {
    		$happenPlace = $answer->getText();
    		$this->say('감사합니다. '.$happenPlace.'이군요!');
            $_SESSION["place"]=$happenPlace;
    		$this->askAge();
    	});
    }
    public function askAge()
    {
    	$this->ask('유기견의 나이는 몇 년생 인가요?', function($answer) {
    		$age = $answer->getText();
    		$this->say('감사합니다. '.$age.'년생 이군요!');
            $_SESSION["age"]=$age;
    		$this->askColor();
    	});
    }
    
    public function askColor()
    {
    	$this->ask('색깔은 무슨색 인가요?', function($answer) {
    		$colorCd = $answer->getText();
    		$this->say('감사합니다. '.$colorCd.'색이군요!');
            $_SESSION["color"]=$colorCd;
    		$this->askGender();
    	});
    }
    
     public function askGender()
    {
       $this->ask('암컷인가요, 수컷인가요?', function($answer) {
          $sex = $answer->getText();
          $this->say('감사합니다. '.$sex.'이군요!');
          $_SESSION["sex"]=$sex;
          $this->say('<a href="https://localhost/Dog/views/animalChatbot.php">당신이 찾는 강아지가 맞나요?</a>');
       });
    }

        
   
   
    
    
    public function run()
    {
        $this->askKind();
    }
}
