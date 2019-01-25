<?php

namespace FactionsPro\tasks;

use pocketmine\scheduler\Task;

class FactionWarTask extends Task {
	
	public $plugin;
	public $requester;
	
	public function __construct(FactionMain $plugin, $requester) {
        $this->plugin = $plugin;
		$this->requester = $requester;
    }
	
	public function onRun(int $currentTick): void {
		unset($this->plugin->wars[$this->requester]);
		$this->plugin->getScheduler()->cancelTask($this->getTaskId());
	}
	
}