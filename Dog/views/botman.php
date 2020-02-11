<?php

require_once '../vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

require_once './OnboardingConversation.php';

$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));

// $botman->hears('안녕하세요', function($bot) {
    
//     $bot->startConversation(new OnboardingConversation);
    
// });
	$botman->hears('안녕', function($bot) {
	
		$bot->startConversation(new OnboardingConversation);
	
	});
		
$botman->listen();


