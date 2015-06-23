<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;
use \App\Http\Models\Endpoint;

class EndpointController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Organisations fom LANDesk (StaffSpace view)
     * @return JSON 
     */
    public function organisationList()
    {

    	$data = Cache::remember('organisations',360, function() {
    		return [
				"this"	=> [
					"guid" => "0",
	    			"label" => "University Organisations"
				],
	  			"parents" => [
	    				"guid" => null,
	    				"label" => null
	    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => Endpoint::Organisations();
	    	];
	    });

    	return $this->respondOK($data);;
    }

    /**
     * Get Channels fom LANDesk (My Kingston/Student view)
     * @return JSON 
     */
    public function channelList()
    {
    	$data = [
			"this"	=> [
				"guid" => "1",
    			"label" => "Student Channels"
			],
    		"parents" => [
    				"guid" => null,
    				"label" => null
    			],
    		"has_service_group"	=> true,
    		"endpoints" => Endpoint::Channels();
    	];

    	return $this->respondOK($data);;
    }

    /**
     * Get Endpoints fom LANDesk
     * @return JSON 
     */
    public function endpointList($id)
    {

    	$results = [
			"1236547895135784621-11" => [
				"this"	=> [
					"guid" => "1236547895135784621-11",
    				"label" => "Library & Learning Services"
				],
    			"parents" => [
    				[
	    				"guid" => "0",
	    				"label" => "Organisationss"
	    			]
    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => [
	    			[
		    			"title"	=> "Feedback",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-comment",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Welcome Presentation",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-file-pdf-o",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "orange",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "My Library Account",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Ask a Librarian",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-1",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Library Membership & services",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-2",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "iCat Library Services",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-1",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Borrowing & Renewing",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-3",
			    		"color" => "green",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "Library Help & Training",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-4",
			    		"color" => "pink",
			    		"type"	=>	"service-group"
			    	],
			    	[
		    			"title"	=> "Disability Support",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-5",
			    		"color" => "purple",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "Learning Resource Centres",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-6",
			    		"color" => "red",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "Help on LRC Floors",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-1",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Students With Disabilities",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-2",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	]
			    ]
			],

			"1236547895135784621-11-6" => [
				"this"	=> [
					"guid" => "1236547895135784621-11-6",
    				"label" => "Learning Resource Centres"
				],
    			"parents" => [
    				[
	    				"guid" => "0",
	    				"label" => "Organisationss"
	    			],
    				[
	    				"guid" => "1236547895135784621-11",
	    				"label" => "Library & Learning Services"
    				]
    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => [
	    			[
		    			"title"	=> "Feedback",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-comment",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Learning Cafes",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "purple",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "LRC Opening Hours",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "LRC PC Resources",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-1",
			    		"color" => "yellow",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "LRC Print Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-6-1",
			    		"color" => "yellow",
			    		"type"	=>	"service-group"
			    	],
			    	[
		    			"title"	=> "Contact the LRC",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-1",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "LRC Presentation Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-3",
			    		"color" => "green",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "Zones & Study Rooms",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-11-4",
			    		"color" => "pink",
			    		"type"	=>	"service-group"
			    	]
			    ]
			],

			"1236547895135784621-11-6-1" => [
				"this"	=> [
					"guid" => "1236547895135784621-11-6-1",
    				"label" => "LRC Print Resources"
				],
    			"parents" => [
    				[
	    				"guid" => "0",
	    				"label" => "Organisationss"
	    			],    				
    				[
	    				"guid" => "1236547895135784621-11",
	    				"label" => "Library & Learning Services"
	    			],
    				[
	    				"guid" => "1236547895135784621-11-6",
	    				"label" => "Learning Resource Centres"
	    			]
    			],
	    		"has_service_group"	=> false,
	    		"endpoints" => [
	    			[
		    			"title"	=> "Feedback",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-comment",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Print, Copy & Scan in the LRC",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "purple",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Wide Format Print in the LRCs",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	]
		    	]
	    	],

			"1236547895135784621-11-3" => [
				"this"	=> [
					"guid" => "1236547895135784621-11-3",
    				"label" => "Learning Resource Centres"
				],
    			"parents" => [
    				[
	    				"guid" => "0",
	    				"label" => "Organisationss"
	    			],
    				[
	    				"guid" => "1236547895135784621-11",
	    				"label" => "Library & Learning Services"
	    			]
    			],
	    		"has_service_group"	=> false,
	    		"endpoints" => [
	    			[
		    			"title"	=> "Feedback",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-comment",
			    		"guid"	=> "1236547895135784621-11-0",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Borrrowing Library Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-3",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Renewing Library Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-4",
			    		"color" => "green",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Placing Library Hold Requests",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-5",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Library Fine Rates",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-6",
			    		"color" => "pink",
			    		"type"	=>	"endpoint"
			    	]
			    ]
			],

			"1236547895135784621-23" => [
				"this"	=> [
					"guid" => "1236547895135784621-23",
    				"label" => "My Studies"
				],
    			"parents" => [
    				[
	    				"guid" => "1",
	    				"label" => "Channels"
	    			]
    			],
	    		"has_service_group"	=> true,
	    		"endpoints" => [
		    		[
		    			"title"	=> "My IT Support",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-1",
			    		"color" => "blue",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "My Library Support",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-2",
			    		"color" => "yellow",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "My Academic Support",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-3",
			    		"color" => "green",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "My Mitigating Circumstances",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-4",
			    		"color" => "pink",
			    		"type"	=>	"service-group"
			    	],
			    	[
		    			"title"	=> "My Timetable",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-5",
			    		"color" => "purple",
			    		"type"	=>	"service-group"
			    	],
		    		[
		    			"title"	=> "My Study Support",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-th",
			    		"guid"	=> "1236547895135784621-23-6",
			    		"color" => "red",
			    		"type"	=>	"service-group"
			    	]
			    ]
			],

    		"1236547895135784621-23-1" => [
				"this"	=> [
					"guid" => "1236547895135784621-23-1",
    				"label" => "My IT Services"
				],
    			"parents" => [
    				[
	    				"guid" => "1",
	    				"label" => "Channels"
	    			],
    				[
	    				"guid" => "1236547895135784621-23",
	    				"label" => "My Studies"
	    			]
	    		],
	    		"has_service_group"	=> false,
	    		"endpoints" => [
		    		[
		    			"title"	=> "Outlook Webmail",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-1",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Email on Mobile Devices",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-2",
			    		"color" => "orange",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Email for St. Georges Students",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-3",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Getting Support",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-4",
			    		"color" => "green",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Manage My IT Password",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-5",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Using KU Wifi Networks",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-desktop",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-6",
			    		"color" => "pink",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Print, Copy & Scan in the LRC",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "purple",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Using Computers in the LRC",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-8",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	]
	    		]
	    	],

	    	"1236547895135784621-23-2" => [
				"this"	=> [
					"guid" => "1236547895135784621-23-2",
    				"label" => "My Library Support"
				],
    			"parents" => [
    				[
	    				"guid" => "1",
	    				"label" => "Channels"
	    			],
    				[
	    				"guid" => "1236547895135784621-23",
	    				"label" => "My Studies"
	    			]
	    		],
	    		"has_service_group"	=> false,
	    		"endpoints" => [
		    		[
		    			"title"	=> "iCat Library Services",
			    		"desc"	=> "lorem ipsum and other meaningless junk",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-1",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "My Library Account",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-2",
			    		"color" => "orange",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Borrrowing Library Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-3",
			    		"color" => "yellow",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Renewing Library Resources",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-4",
			    		"color" => "green",
			    		"type"	=>	"endpoint"
			    	],
			    	[
		    			"title"	=> "Placing Library Hold Requests",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-5",
			    		"color" => "blue",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Library Fine Rates",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-6",
			    		"color" => "pink",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Learning Cafes",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "purple",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Print, Copy & Scan in the LRC",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-7",
			    		"color" => "purple",
			    		"type"	=>	"endpoint"
			    	],
		    		[
		    			"title"	=> "Using Computers in the LRC",
			    		"desc"	=> "A longer description of what is on this tile contains.",
			    		"icon"	=> "fa-book",
			    		"target_type"	=> "fa-link",
			    		"guid"	=> "1236547895135784621-23-1-8",
			    		"color" => "red",
			    		"type"	=>	"endpoint"
			    	]
	    		]
	    	]
	    ];


    	$data = $results[$id];

    	return $this->respondOK($data);;
    }
}
