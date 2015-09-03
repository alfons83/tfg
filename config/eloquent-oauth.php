<?php

return [
	'table' => 'oauth_identities',
	'providers' => [
		'facebook' => [
			'client_id' => '1490381477941558',
			'client_secret' => 'd33c4c309c3a3bf49cb06ec9241e26d7',
			'redirect_uri' => 'http://laravel.app/facebook/login',
			'scope' => [],
		],
		'google' => [
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => 'https://example.com/your/google/redirect',
			'scope' => [],
		],
		'github' => [
			'client_id' => '7e10b142aaa92ba870c2',
			'client_secret' => 'bd77529dd088010371da3dbe52ea803268e73db9',
			'redirect_uri' => 'http://laravel.app/github/login',
			'scope' => [],
		],
		'linkedin' => [
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => 'https://example.com/your/linkedin/redirect',
			'scope' => [],
		],
		'instagram' => [
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => 'https://example.com/your/instagram/redirect',
			'scope' => [],
		],
		'soundcloud' => [
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
			'scope' => [],
		],
	],
];
