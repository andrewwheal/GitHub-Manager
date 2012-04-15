<?php

return array(

	'nav' => array(
		'driver' => 'config',
		'instances' => array(
			'default' => array(
				'Home' => '/',
				'Repos' => '/repos',
				'Issues' => array(
					'All' => '/issues',
					'Mine' => array(
						'Submitted by me' => '/issues/submitted',
						'Assigned to me' => '/issues/assigned',
					),
				),
			),
		),
	),

);
