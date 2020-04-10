<?php
/*	Project:	EQdkp-Plus
 *	Package:	Guildbanker Plugin
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('EQDKP_INC')){
	header('HTTP/1.0 404 Not Found');exit;
}

include_once(registry::get_const('root_path').'maintenance/includes/sql_update_task.class.php');

if (!class_exists('update_guildbank_234')){
	class update_guildbank_234 extends sql_update_task{

		public $author		= 'GodMod';
		public $version		= '2.3.4';    // new version
		public $name		= 'Guild Bank 2.3.4 Update';
		public $type		= 'plugin_update';
		public $plugin_path	= 'guildbank'; // important!

		/**
		* Constructor
		*/
		public function __construct(){
			parent::__construct();

			// init language
			$this->langs = array(
				'english' => array(
					'update_guildbank_234' => 'Guild Banker 2.3.4 Update Package',
					// SQL
					1 => 'Change the column format',
					2 => 'Change the column format',
					3 => 'Change the column format',
					4 => 'Change the column format',
					5 => 'Add a column',
				),
				'german' => array(
					'update_guildbank_234' => 'Guild Banker 2.3.4 Update Paket',
					// SQL
						1 => 'Ändere das Spaltenformat',
						2 => 'Ändere das Spaltenformat',
						3 => 'Ändere das Spaltenformat',
						4 => 'Ändere das Spaltenformat',
						5 => 'Füge eine Spalte hinzu',
				),
			);

			// init SQL querys
			$this->sqls = array(
				1 => "ALTER TABLE `__guildbank_transactions` CHANGE COLUMN `ta_dkp` `ta_dkp` FLOAT(10,2) NULL DEFAULT '0';",
				2 => "ALTER TABLE `__guildbank_auction_bids` CHANGE COLUMN `bid_bidvalue` `bid_bidvalue` FLOAT(10,2) NULL DEFAULT NULL;",
				3 => "ALTER TABLE `__guildbank_auctions` CHANGE COLUMN `auction_bidsteps` `auction_bidsteps` FLOAT(10,2) NULL DEFAULT NULL;",
				4 => "ALTER TABLE `__guildbank_auctions` CHANGE COLUMN `auction_startvalue` `auction_startvalue` FLOAT(10,2) NULL DEFAULT NULL;",
				5 => "ALTER TABLE `__guildbank_items` ADD COLUMN `item_multidkppool` INT(11) UNSIGNED NULL DEFAULT NULL;",
			);
		}

	}
}
