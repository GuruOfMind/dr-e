<?php
return [
	'resources' => [
		'categories' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				'quizzes'
			],
			'allowedFilters' => [],
			'validationRules' => [
				'create' => [
					'data.attributes.name' => 'required|string',
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
				]
			],
			'relationships' => []
		],
		'examiners' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [],
			'allowedFilters' => [],
			'validationRules' => [
				'create' => [
					'data.attributes.name' => 'required|string',
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
				]
			],
			'relationships' => []
		],
		'quizzes' => [
			'allowedSorts' => [
				'name',
				'year',
				'examiner_id',
				'category_id',
			],
			'allowedIncludes' => [
				'category',
				'examiner'
			],
			'allowedFilters' => [
				'examiner_id',
				'category_id',
			],
			'validationRules' => [
				'create' => [
					'data.attributes.name' => 'required|string',
					'data.attributes.year' => 'required|string',
					'data.attributes.semester' => 'required|string'
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
					'data.attributes.year' => 'sometimes|required|string',
					'data.attributes.semester' => 'sometimes|required|string'
				]
			],
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
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [],
			'allowedFilters' => [],
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quiz',
				]
			]
		],
		'answers' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				'questions'
			],
			'allowedFilters' => [],
			'relationships' => [
				[
					'type' => 'questions',
					'method' => 'question',
				]
			]
		],
	],
];
