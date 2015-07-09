<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\Endpoint;

class LayoutController extends Controller
{

	use \App\Http\Traits\HttpResponseTrait;

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function show()
    {

        $data = [
            "endpoints" => [
                "1" => "one",
                "2" => "two",
            ]
        ];

        return '{"code":200,"status":"succcess","data":{"this":{"guid":"E04FD418-00EB-4FC3-97C7-E116DDD3C1DD","label":"Library and Learning Services"},"parents":{"guid":"0","label":"University Organisations"},"has_service_group":true,"endpoints":[{"guid":"7A684758-360B-4DA6-B4A7-7CE8083C5296","name":"About Library and Learning Services","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"blue","url":null,"always_show":"0","is_broken":null},{"guid":"F5CFDF9A-B9B6-4EBD-8876-5F2E3B79BFA1","name":"Borrowing and Renewing","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"red","url":null,"always_show":"0","is_broken":null},{"guid":"2B337A43-24B7-4893-ACEE-0CCAD8E82FA4","name":"Customer Service Excellence","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"green","url":"https:\/\/mykingston.kingston.ac.uk\/library\/aboutus\/Pages\/Customer-Service-Excellence.aspx","always_show":"0","is_broken":"0"},{"guid":"B6494B52-174A-48B5-8F3C-123AA1047267","name":"Feedback","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"purple","url":null,"always_show":"0","is_broken":null},{"guid":"BF60F15B-D7A3-41E1-9D5C-9936E99C7BA7","name":"iCat search","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"yellow","url":"http:\/\/ku-primo.hosted.exlibrisgroup.com\/primo_library\/libweb\/action\/search.do?vid=KU_VU1&reset_config=true","always_show":"0","is_broken":"0"},{"guid":"24304FD2-F995-4D1E-8FD0-3ACBE73F24AF","name":"Learning Resource Centres","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"blue","url":null,"always_show":"0","is_broken":null},{"guid":"A095D301-0B3C-4513-8D38-10B4ED164504","name":"Library Help and training","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"red","url":null,"always_show":"0","is_broken":null},{"guid":"448F0679-7B50-4687-AF4D-138C417C3115","name":"Library Membership and Services","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"green","url":"https:\/\/mykingston.kingston.ac.uk\/library\/usinglrcs\/Pages\/membership-and-services.aspx","always_show":"0","is_broken":"0"},{"guid":"A10EDD50-5327-4568-9176-91395BFEBE74","name":"My Account FAQ","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"yellow","url":"https:\/\/mykingston.kingston.ac.uk\/library\/borrowing-and-renewing\/Pages\/myaccount.aspx","always_show":"0","is_broken":"0"},{"guid":"D3462BF7-1B0F-41F2-986D-1CB39E110312","name":"My Account Sign in","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"orange","url":"http:\/\/ku-primo.hosted.exlibrisgroup.com\/primo_library\/libweb\/action\/search.do?vid=KU_VU1&reset_config=true","always_show":"0","is_broken":"0"},{"guid":"3805F36F-1F23-4886-8180-4CB663E98828","name":"Supporting Your Research","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"yellow","url":null,"always_show":"0","is_broken":null},{"guid":"904CF72D-6AA1-4F60-A5FB-30F75C50F699","name":"Supporting Your Teaching","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"service-group","icon":"fa-book","target_type":"fa-th","color":"purple","url":null,"always_show":"0","is_broken":null},{"guid":"E20A0359-4207-42CB-AC9A-B13F146B44F1","name":"Visitors to the Library","parent":null,"organisation":"Library and Learning Services","desc":null,"type":"endpoint","icon":"fa-book","target_type":"fa-link","color":"yellow","url":"http:\/\/www.kingston.ac.uk\/informationservices\/visitors\/visitors_index.html","always_show":"0","is_broken":"0"}]}}'
    }

    /**
     * Get Endpoints for the Service Group
     * @return JSON 
     */
    public function update()
    {


    	return view('layout');
    }

   
}
