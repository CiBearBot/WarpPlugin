<?php
namespace cibear\warp;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use onebone\economyapi\EconomyAPI;
use pocketmine\inventory\PlayerInventory;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\sender\sender;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerMoveEvent;
use function count;

class Warp extends PluginBase implements Listener{

    public function onEnable(){
		$this->getLogger()->info("§2https://github.com/CiBearBot/WarpPlugin");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
	public function onDisable(){
		$this->getLogger()->info("§4https://github.com/CiBearBot/WarpPlugin");
		}
		
		public function onJoin(PlayerJoinEvent $event) {
			$player = $event->getPlayer();
			$name = $player->getName();
			}
			public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
			if($command->getName() == "warp"){
            $this->FormWarp($sender);
			return true;
			}
			}
			
			public function FormWarp(Player $sender){
				$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
				$form = $api->createSimpleForm(function (Player $sender,  int $data = null)
				{
					$result = $data;
					if($result === null)
					{
						return true;
						}
						switch($result){
							case 0:
							$cmd = "mw tp spawn";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 1:
							$cmd = "mw tp hz1";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 2:
							$cmd = "mw tp hz2";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 3:
							$cmd = "mw tp hz3";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 4:
							$cmd = "mw tp pvp1";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 5:
							$cmd = "mw tp pvp2";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 6:
							$cmd = "mw tp qs";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 7:
							$cmd = "mw tp boss";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
							case 8:
							$cmd = "mw tp farm";
							$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
							break;
						}
				});
				$form->setTitle("WARP หน้าจอการวาร์ป");
				$form->addButton("Hub\nกลับสปาว", 0, "textures/blocks/end_portal");
				$form->addButton("HomeZone1\nสร้างบ้านฟาร์มของ", 0, "textures/blocks/end_portal");
				$form->addButton("HomeZone2\nสร้างบ้านพื้นที่เรียบ", 0, "textures/blocks/end_portal");
				$form->addButton("HomeZone3\nสร้างบ้านโลกมังกร", 0, "textures/blocks/end_portal");
				$form->addButton("PvP1\nต่อสู้แบบมีซากประหลักหักพัง", 0, "textures/blocks/end_portal");
				$form->addButton("PvP2\nต่อสู้กันในขอบเขตป่า", 0, "textures/blocks/end_portal");
				$form->addButton("QuestStage\nทำเควส ซื้อของ ขายของ", 0, "textures/blocks/end_portal");
				$form->addButton("Boss\nต่อสู้กับบอส", 0, "textures/blocks/end_portal");
				$form->addButton("Farm\nฟาร์มมอนเตอร์", 0, "textures/blocks/end_portal");
				$form->sendToPlayer($sender);
			}
}