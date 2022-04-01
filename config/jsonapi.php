<?php
return [
	'resources' => [
		'categories' => [
			'allowedSorts' => [
				'name',
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
					'data.attributes.semester' => 'required|string',
					'data.attributes.examiner_id' => 'required|string',
					'data.attributes.category_id' => 'required|string',
				],
				'update' => [
					'data.attributes.name' => 'sometimes|required|string',
					'data.attributes.year' => 'sometimes|required|string',
					'data.attributes.semester' => 'sometimes|required|string',
					'data.attributes.examiner_id' => 'sometimes|required|string',
					'data.attributes.category_id' => 'sometimes|required|string',
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
			'relationships' => [
				[
					'type' => 'quizzes',
					'method' => 'quizzes',
				]
			]
		],
		'answers' => [
			'relationships' => [
				[
					'type' => 'questions',
					'method' => 'questions',
				]
			]
		],
	],
];
