<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Http\Models\User;

class SwhController extends Controller
{

    use \App\Http\Traits\HttpResponseTrait;
    
    /**
     * Load user Details
     * @return JSON 
     */
    public function authenticate($api = true)
    {	
        
        $username = "K1068743";

        
        if (!$username) {

            \Log::error('API Error 401 - Authentication',["context"=>"No username available for LDAP lookup"]);
            return $this->respondError(401);
            exit;
        }

        /* Do we have the user within the app*/
        //$user = User::find($username);
        $user = '';

        /* if no then retrieve from LDAP and create*/
        if (!$user) {
            include base_path() . "/vendor/adldap/adldap/lib/adLDAP/adLDAP.php";

            $ldap_options = [
                "domain_controllers" => [env('LDAP_DC_1'),env('LDAP_DC_2')],
                "base_dn" => env('LDAP_BASE_DN'),
                "account_suffix" => env('LDAP_USER_SUFFIX'), 
                "admin_username" => env('LDAP_ADMIN_USER'),
                "admin_password" => env('LDAP_ADMIN_PASS'),
                "use_ssl" => true
            ];

            $ldap = new \adLDAP\adLDAP($ldap_options);

            $ldap_user = $ldap->user()->infoCollection($username, array("*"));


            if(!$ldap_user) {

                \Log::error('API Error 401 - Authentication',["context"=>"Unable to find user id: $username in LDAP lookup"]);
                return $this->respondError(401);
                exit;
            }

            $user = new User;
            $user->id = $username;
            $user->first_name = $ldap_user->givenname;
            $user->last_name = $ldap_user->sn;
            $user->email = $ldap_user->mail;
            $user->employee_type = $this->getEmployeeType($ldap_user->employeetype);
            $user->employee_status = ($user->employee_type == 0) ? 'staff' : 'student';
            $user->homedir = $ldap_user->homedirectory;
            $user->department = $ldap_user->departmentnumber;
            $user->gender = strtolower($ldap_user->extensionAttribute1);
            $user->avatar = $this->getUserImage($user->id, $user->gender);
            $user->save();
            
            $user = User::find($username);
        }
        echo 'Use default avatar' . strpos($user->avatar, 'avatar_');

        if (strpos($user->avatar, 'avatar_') !== 0 ) {
            $user->avatar = $this->getUserImage($user->id, strtolower($user->gender));
            $user->save();
        }

        \Auth::login($user);

        if ($api) {
            return $this->respondOK($user);
        } else {
            return $user;
        }
    }

    private function getEmployeeType($type) {

        $type = strtoupper($type);
        $staff_types = explode(",", strtoupper(env('STAFF_TYPES')));

        return in_array($type, $staff_types) ? 0 : 1;

    }

    private function getUserImage($id=false, $gender='')
    {

        $default = "../assets/images/avatar_{$gender}.png";

        if ($id) {

            $id = strtoupper($id);

            $type = (substr($id, 0, 2) == "KU") ? 'staff' : 'students';

            $id = str_replace(["KU","K"],["",""],$id);

            $image = "https://kusdpw.kingston.ac.uk/data/{$type}/{$id}.jpg";

            echo "<br/>Image path " . $image;

            $exists = @get_headers($image);

            echo $exists[0];

            if (strtoupper($exists[0]) == "HTTP/1.1 200 OK") {
                $hash = time();
                $local = base_path() . "/public/assets/images/user/{$hash}.jpg";

                if (copy($image, $local)) {
                    $local = str_replace(base_path() . "/public", "..", $local);
                    return $local;
                }
            }
        }

        return $default;
    }

    public function images() {

        $endpoints = [];
        for ($x=1;$x<=24;$x++) {

            $ep = new \stdClass();
            $ep->guid = $x;
            $ep->name = "Title - $x";
            $ep->color="red";
            $ep->desc = "Desc- $x";
            $ep->icon = 'fa-star';
            $ep->organisation = "Organisation $x";
            $ep->target_type="fa-th";
            $ep->type="service-group";
            $endpoints[] = $ep;
        }

        $new_ep = $this->insertImages(collect($endpoints), true, true);

        dd($new_ep);
    }

    private function insertImages($endpoints, $is_index, $has_service_group)
    {

        $return_endpoints = collect([]);

        // Create arrays to ho,d the max number of images at each size
        $square = collect(range(1,18));
        $tall   = collect(range(1,15));
        $wide   = collect(range(1,38));

        var_dump($square);

        // Shuffle them up
         echo "Square count:" . $square->count() . "<br>";
        $square = $square->shuffle();
        var_dump($square);
         echo "Square count:" . $square->count() . "<br>";
        $tall   = $tall->shuffle();
        $wide   = $wide->shuffle();

        // Reverse our endpoints - we will then use pop() instead of shift() as this is more efficient
        $endpoints = $endpoints->reverse();
        $endpoint_count = $endpoints->count();
        $image_count = 0;

        // Determine the max no images to display per page
        // Assign the first image for home pages
        if ($is_index) {
            $denominator = 3;
            $return_endpoints->push($this->makeImageEndpoint('tall',$tall->pop()));
        } elseif ($has_service_group) {
            $denominator = 4;
        } else {
            $denominator = 5;
        }

        $max_images = floor($endpoint_count/$denominator) + (9 - $denominator);
        echo "Max Image: $max_images<br>";
        // Assign images
        for ($i=0; $i<$endpoint_count; $i++) {

            echo "i=$i<br>";
            echo "Square count:" . $square->count() . "<br>";
            echo "Wide count:" .  $wide->count() . "<br>";
            echo "Tall count:" .  $tall->count() . "<br>";
            echo "Image count: $image_count<br>";
            $return_endpoints->push($endpoints->pop());

            if ($is_index) {
                $mods = [3.5, 5, 6, 9];
            } elseif ($has_service_group) {
                $mods = [3.5, 3.5, 6, 9];                
            } else {
                $mods = [3.5, 3.5, 6, 9];
            }

            var_dump($mods);

            $a = $i%$mods[0];
            $b = $i%$mods[1];
            $c = $i%$mods[2];
            $d = $i%$mods[3];

            echo "'$i%$mods[0]' = $a<br>";
            echo "'$i%$mods[1]' = $b<br>";
            echo "'$i%$mods[2]' = $c<br>";
            echo "'$i%$mods[3]' = $d<br>";

            $e = ($i%$mods[0] == 0 || $i%$mods[1]==0) ? 1 : 0;
            $f = ($max_images >= $image_count) ? 1 : 0;
            $g = ($square->count() > 0) ? 1 : 0;
            $h = ($e && $f && $g) ? 'Do it' : 'oh no"';

            echo "Test 1 = $e<br>";
            echo "Test 2 = $f<br>";
            echo "Test 3 = $g<br>";
            echo "Test 4 = $h<br>";

                
            if (($i%$mods[0] == 0 || $i%$mods[1]==0) && $image_count <= $max_images && $square->count() > 0) {
                "Trying to make - square <br>";
                $return_endpoints->push($this->makeImageEndpoint('square',$square->pop()));
                $image_count++;
            }

            if ($i%$mods[2] == 0 && $image_count <= $max_images && $wide->count() > 0) {
                "Trying to make - wide <br>";
                $return_endpoints->push($this->makeImageEndpoint('wide',$wide->pop()));
                $image_count++;
            }

            if ($i%$mods[3] == 0 && $image_count <= $max_images && $tall->count() > 0) {
                "Trying to make - tall <br>";
                $return_endpoints->push($this->makeImageEndpoint('tall',$tall->pop()));
                $image_count++;
            }

        }

        if ($square->count() > 0) {
            $return_endpoints->push($this->makeImageEndpoint('square',$square->pop()));
        } elseif ($wide->count() > 0) {
            $return_endpoints->push($this->makeImageEndpoint('wide',$wide->pop()));
        }
        
        return $return_endpoints;

    }

    private function makeImageEndpoint($size, $id) {

        echo "Making image==> $size -- $id <br> ";

        $image = new \stdClass;
        $image->type = "image";
        $image->size = $size;
        $image->id = $id;

        return $image;

    }

}
