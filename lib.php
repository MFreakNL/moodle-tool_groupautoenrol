<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 *
 * @package    tool_groupautoenrol
 * @copyright  2016 Pascal
 * @author     Pascal M - https://github.com/pascal-my
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

/**
 * @param $navigation
 * @param $course
 * @param $context
 *
 * @throws coding_exception
 * @throws moodle_exception
 */
function tool_groupautoenrol_extend_navigation_course($navigation, $course, $context) {

    if (!($context instanceof context_course || $context instanceof context_module) && empty($context->instanceid)) {
        return;
    }

    if (!has_capability("moodle/course:managegroups", $context)) {
        return;
    }

    // Add link to manage automatic group enrolment.
    $url = new moodle_url(
        '/admin/tool/groupautoenrol/manage_auto_group_enrol.php',
        ['id' => $context->instanceid]
    );

    $usermenu = $navigation->get('users');
    $usermenu->add(get_string('menu_auto_groups', 'tool_groupautoenrol'), $url);
}
