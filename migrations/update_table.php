<?php
/**
*
* @package phpBB Extension - Note
* @copyright (c) 2016 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\note\migrations;

class update_table extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'install_bbcode_for_note'))),
		);
	}

	public function install_bbcode_for_note()
	{
		$bbcode_data = array(
			'bagdge=' => array(
				'bbcode_helpline'		=> '[note]Colour Note or Tip Your text[/note]',
				'bbcode_match'			=> '[note={INTTEXT1}]{INTTEXT2}: {TEXT}[/note]',
				'bbcode_tpl'			=> '<div class="note-box {INTTEXT1}"><strong>{INTTEXT2}:</strong> {TEXT}</div>',
			),
		);

		global $db, $request, $user;
		$acp_manager = new \dmzx\note\includes\acp_manager($db, $request, $user, $this->phpbb_root_path, $this->php_ext);
		$acp_manager->install_bbcodes($bbcode_data);
	}
}
