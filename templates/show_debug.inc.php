<?php
/* vim:set tabstop=8 softtabstop=8 shiftwidth=8 noexpandtab: */
/**
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright 2001 - 2013 Ampache.org
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */
?>
<?php show_box_top(T_('Debug Tools'), 'box box_debug_tools'); ?>
<div id="information_actions">
<ul>
<li>
	<a href="<?php echo Config::get('web_path'); ?>/admin/system.php?action=generate_config"><?php echo get_user_icon('cog', T_('Generate Configuration')); ?></a>
	<?php echo T_('Generate Configuration'); ?>
</li>
<li>
	<a href="<?php echo Config::get('web_path'); ?>/admin/system.php?action=reset_db_charset"><?php echo get_user_icon('server_lightning', T_('Set Database Charset')); ?></a>
	<?php echo T_('Set Database Charset'); ?>
</li>
</ul>
</div>
<?php show_box_bottom(); ?>
<?php show_box_top(T_('PHP Settings'), 'box box_php_settings'); ?>
<table class="tabledata" cellpadding="0" cellspacing="0">
<colgroup>
	<col id="col_php_setting">
	<col id="col_php_value">
</colgroup>
<tr class="th-top">
	<th class="cel_php_setting"><?php echo T_('Setting'); ?></th>
	<th class="cel_php_value"><?php echo T_('Value'); ?></th>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Memory Limit'); ?></td>
	<td><?php echo ini_get('memory_limit'); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Maximum Execution Time'); ?></td>
	<td><?php echo ini_get('max_execution_time'); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Override Execution Time'); ?></td>
	<td><?php set_time_limit(0); echo ini_get('max_execution_time') ? T_('Failed') : T_('Succeeded'); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Safe Mode'); ?></td>
	<td><?php echo print_bool(ini_get('safe_mode')); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td>Open Basedir</td>
	<td><?php echo ini_get('open_basedir'); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Zlib Support'); ?></td>
	<td><?php echo print_bool(function_exists('gzcompress')); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('GD Support'); ?></td>
	<td><?php echo print_bool(function_exists('ImageCreateFromString')); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Iconv Support'); ?></td>
	<td><?php echo print_bool(function_exists('iconv')); ?></td>
</tr>
<tr class="<?php echo UI::flip_class(); ?>">
	<td><?php echo T_('Gettext Support'); ?></td>
	<td><?php echo print_bool(function_exists('bindtextdomain')); ?></td>
</tr>
</table>
<?php show_box_bottom(); ?>

<?php show_box_top(T_('Current Configuration'), 'box box_current_configuration'); ?>
<table class="tabledata" cellpadding="0" cellspacing="0">
<colgroup>
   <col id="col_configuration">
   <col id="col_value">
</colgroup>
<tr class="th-top">
	<th class="cel_configuration"><?php echo T_('Preference'); ?></th>
	<th class="cel_value"><?php echo T_('Value'); ?></th>
</tr>
<?php foreach ($configuration as $key=>$value) {
	if ($key == 'database_password' || $key == 'mysql_password') { $value = '*********'; }
	if (is_array($value)) {
		$string = '';
		foreach ($value as $setting) {
			$string .= $setting . '<br />';
		}
		$value = $string;
	}
	if (Preference::is_boolean($key)) {
		$value = print_bool($value);
	}
?>
<tr class="<?php echo UI::flip_class(); ?>">
	<td valign="top"><strong><?php echo $key; ?></strong></td>
	<td><?php echo $value; ?></td>
</tr>
<?php } ?>
</table>
<?php show_box_bottom(); ?>
