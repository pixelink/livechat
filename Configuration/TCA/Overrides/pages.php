<?php

defined('TYPO3_MODE') or die();

$tca = [
    'columns' => [
        'exclude_livechat_from_page' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:livechatinc/Resources/Private/Language/locallang_db.xlf:livechatinc.tca.pages.exclude_livechat_from_page',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['LLL:EXT:livechatinc/Resources/Private/Language/locallang_db.xlf:livechatinc.tca.pages.exclude_livechat_from_page.label', 1],
                ],
            ],
        ],


    ]
];


// Add new fields to pages:
/*\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tca);*/
\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['pages'], $tca);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages', // Table name
    '--palette--;LLL:EXT:livechatinc/Resources/Private/Language/locallang_db.xlf:livechatinc.tca.pages.exclude_livechat_from_page;tx_livechatinc', // Field list to add
    '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
    'after:php_tree_stop' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages']['palettes']['tx_livechatinc'] = array(
    'showitem' => 'exclude_livechat_from_page'
);

/*\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'miscellaneous',
    'exclude_livechat_from_page'
);
*/
