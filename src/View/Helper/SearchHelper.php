<?php
/**
 * CakeManager (http://cakemanager.org)
 * Copyright (c) http://cakemanager.org
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) http://cakemanager.org
 * @link          http://cakemanager.org CakeManager Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Utils\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Search helper
 */
class SearchHelper extends Helper
{
    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Html', 'Form'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * filterForm
     *
     * Generates a form for the SearchComponent.
     *
     * ### Example:
     *
     * `$this->Search->filterForm($searchFilters);`
     *
     * Use the variable `$searchFilters` to add the generated filtes to the form.
     *
     * @param array $filters Filters.
     * @param array $options Options.
     * @return string
     */
    public function filterForm($filters = [], $options = [])
    {
        $html = '';

        // create
        $html .= $this->Form->create(null, $options + ['type' => 'GET']);

		$html .= "<tr>";
        foreach ($filters as $field) {
            // if field is select-box because of the options-key
            if ($field['options']) {
                $field['attributes']['options'] = $field['options'];
            }

			$html .= "<td>";
            $html .= $this->Form->input($field['column'], $field['attributes']);
			$html .= "</td>";
            #$html .= ' ';
        }

        // end
		$html .= "<td>";
        $html .= $this->Form->submit("/img/001_38.png", ['width'=>'24']);
		$html .= "</td>";

		$html .= "</tr>";
        $html .= $this->Form->end();


        return $html;
    }
}
