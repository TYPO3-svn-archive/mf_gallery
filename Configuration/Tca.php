<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_mfgallery_domain_model_gallery'] = array(
	'ctrl' => $TCA['tx_mfgallery_domain_model_gallery']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'src,title,width,description'
	),
	'types' => array(
		'1' => array('showitem' => 'src,title,width,description')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_mfgallery_domain_model_gallery',
				'foreign_table_where' => 'AND tx_mfgallery_domain_model_gallery.uid=###REC_FIELD_l18n_parent### AND tx_mfgallery_domain_model_gallery.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'src' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:mf_gallery/Resources/Private/Language/locallang_db.xml:tx_mfgallery_domain_model_gallery.src',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:mf_gallery/Resources/Private/Language/locallang_db.xml:tx_mfgallery_domain_model_gallery.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'width' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:mf_gallery/Resources/Private/Language/locallang_db.xml:tx_mfgallery_domain_model_gallery.width',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:mf_gallery/Resources/Private/Language/locallang_db.xml:tx_mfgallery_domain_model_gallery.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'trim'
			)
		),
	),
);

?>