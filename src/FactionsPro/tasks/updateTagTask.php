<?php

namespace FactionsPro\tasks;
use FactionsPro\FactionMain;
use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\Player;

class updateTagTask extends Task{
	
	public $plugin;
	
	public function __construct(FactionMain $plugin){
		$this->plugin = $plugin;
	}
	public function onRun(int $currentTick){
		foreach(Server::getInstance()->getOnlinePlayers() as $player){
			if($player instanceof Player){
			$player->setNameTagVisible();
			$f = $this->plugin->getPlayerFaction($player->getName());
				$name = $player->getName();
			$player->setScoreTag(str_replace(["{player}", "{faction}"], [$player->getName(), $f], $this->plugin->prefs->get("faction-tag")));
			}
		}
	}
}
