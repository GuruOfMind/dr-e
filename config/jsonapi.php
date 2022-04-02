<?php
return [
	'resources' => [
		'categories' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				
			],
			'allowedFilters' => [
				
			],
			'validationRules' => [
				'create' => [
					'data.attributes.name' => 'required|string',
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
				]
			],
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quizzes',
				]
			]
		],
		'examiners' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				
			],
			'allowedFilters' => [
				
			],
			'validationRules' => [
				'create' => [
					'data.attributes.name' => 'required|string',
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
				]
			],
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quizzes',
				]
			]
		],
		'quizzes' => [
			'allowedSorts' => [
				'name',
				'year',
				'examiner_id',
				'category_id',
			],
			'allowedIncludes' => [
				'categories'
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
					'method' => 'categories',
				],
				[
					'type' => 'examiners',
					'method' => 'examiners',
				]
			]
		],
		'questions' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				
			],
			'allowedFilters' => [
				
			],
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quizzes',
				]
			]
		],
		'answers' => [
			'allowedSorts' => [
				'name',
			],
			'allowedIncludes' => [
				
			],
			'allowedFilters' => [
				
			],
			'relationships' => [
				[
					'type' => 'questions',
					'method' => 'questions',
				]
			]
		],
	],
];
