<?php
return [
	'resources' => [
		'categories' => [],
		'examiners' => [],
		'quizzes' => [
			'relationships' => [
				[
					'type' => 'categories',
					'method' => 'category',
				],
				[
					'type' => 'examiners',
					'method' => 'examiner',
				]
			]
		],
		'questions' => [
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quiz',
				]
			]
		],
		'answers' => [
			'relationships' => [
				[
					'type' => 'questions',
					'method' => 'question',
				]
			]
		],
	]
];
