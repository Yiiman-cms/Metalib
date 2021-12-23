<?php
/**
	 * Site: http://yiiman.ir
	 * AuthorName: gholamreza beheshtian
	 * AuthorNumber:09353466620
	 * AuthorCompany: YiiMan
	 *
	 *
	 */

	$dir = basename( __DIR__ );
	
	
	$conf =
		[
			'name'      => $dir ,
			'namespace' => 'YiiMan\YiiLibMeta\module' ,
			'address'   => '' ,
	];
	
	
	
	if (!defined( 'MTHJK_'.$dir)){
		define( 'MTHJK_'.$dir , '1');
	}
	return $conf;
