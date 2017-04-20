<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // $this->load->model('outlets');
        $this->load->model('usersapi');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }


    public function user_register_post()
    {
        // $postData='{"name":"dipanshu","password":"pwd","mobile":"9560020152"}';
        $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 
 
	if($postArray['mobile']!='' && $postArray['name']!='' && $postArray['password']!='')
        {
	
            if($this->usersapi->user_exists($postArray['mobile']))
            {
                $response['response']['status']='Error';
                $response['response']['message']='User already Exists';
            }
            else
            {
                $otp = mt_rand(1000, 9999);
                $data=array('name'=>$postArray['name'],'password'=>$postArray['password'],'mobile'=>$postArray['mobile'],'otp'=>$otp,'createdon'=>date('Y-m-d h:i:s'));
                $message='Your four digit otp is '.$otp;
                $this->usersapi->insert_user($data);
                $response['response']['status']='ok';
                $response['response']['message']='User registered, Verify with otp '.$otp;
            }
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Invalid Data';
        }

        echo json_encode($response);
    }


    public function verify_otp_post()
    {
        // $postData='{"otp":"7352","mobile":"9560020152"}';
        $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 
        if($postArray['otp']!='' && $postArray['mobile']!='')
        {
            if($this->usersapi->verifyOtp($postArray['otp'],$postArray['mobile']))
            {
                $response['response']['status']='ok';
                $response['response']['message']='User registration varified!!!';
            }
            else
            {
                $response['response']['status']='Error';
                $response['response']['message']='Invalid OTP';
            }
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Invalid Data';
        }
        echo json_encode($response);
    }

    public function login_post()
    {
        // $postData='{"mobile":"9560020152","password":"pwd"}';
        $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 

        if($postArray['mobile']!='' && $postArray['password']!='')
        {
            if($data=$this->usersapi->login($postArray['mobile'],$postArray['password']))
            {

                $response['response']['status']='Ok';
                $response['response']['user_id']=$data[0]['id'];
                $response['response']['message']='User logged in successfully';
            }
            else
            {
                $response['response']['status']='Error';
                $response['response']['message']='Invalid credentials';
            }
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Invalid Data';
        }
        echo json_encode($response);
    }

    public function add_product_post()
    {


        // $postData='{"product":{"title":"abcd","product_type":"property","packege_type":"abc","packege_weight":"abc","quantity":"1","closed_bid":"2014-04-52","current_price":"110","degree_or_quality":"qty","source":"src","product_desc":"abcdddd","location":"india"},"image":{"image1":"iVBORw0KGgoAAAANSUhEUgAAACcAAAAwCAYAAACScGMWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTA1MTQ0OEREREE2MTFFNjkyQUFDMTYxN0VBNzc5MEQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTA1MTQ0OEVEREE2MTFFNjkyQUFDMTYxN0VBNzc5MEQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBMDUxNDQ4QkREQTYxMUU2OTJBQUMxNjE3RUE3NzkwRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMDUxNDQ4Q0REQTYxMUU2OTJBQUMxNjE3RUE3NzkwRCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkUkQDQAAAGoSURBVHjaYtTSN2EgETABcTgQVwOxFhAz4lH7H4ivAXEHEC8D4n/oCq5eOI1TMwsD6cAZahExAORwbSBeDMSvgXgnqaFAKmiB0iAHskIdgAuD5OdD1TeRahEjGdH6HylUKNaDL1rJCTm6AVCaUwHiI0AsTmYIUqRH28AUm7pHQOwICjk7MhxGayAHxA6gkFsExLuA2AqIVwLxd2gRQW8AKnI4ocXUMSB+CXLcHyB+AsQvkIL+Ab1cBMsQwOiFRfkLoNiTQZ8hRh1HT8cZAnE8FnFhIM4CYhEscilAbEAPx60D4tlYxPOAeCoQZ2ORmwbVR3IhTCpQwCEuAaWlsMiB6ljF0Qwx6rhRx406btRxo44bddyo40YdN+q4UceNOm7UcaOOG+mO+8IAGbJHH9/9DqV/YNEDUv+VHj3+dCCOYsAcQgUNOYDGQ6Zj0bMBiDfRw3HLGLDPQ9wCYgcceoJH09yo47A47j2UZgdiXXo6QtvAVAdIsaG5AyVD3AHiM0AMmm+6REeHIXPPQ92BEXKgcsoLiFcgu55O4D3UXo+rF07DyksGgAADAIVoTrsd/fWSAAAAAElFTkSuQmCC","image2":"","image3":"","image4":"","image5":""}}';

        $postData = file_get_contents("php://input");

        $postArray=json_decode($postData,true); 
        
        
        
        
        if($postArray['product']['product_type']!='')
        {
            
            $data=array('title'=>$postArray['product']['title'],'weight'=>$postArray['product']['weight'],'product_type'=>$postArray['product']['product_type'],'packege_type'=>$postArray['product']['packege_type'],'packege_weight'=>$postArray['product']['packege_weight'],'quantity'=>$postArray['product']['quantity'],'current_price'=>$postArray['product']['current_price'],'degree_or_quality'=>$postArray['product']['degree_or_quality'],'source'=>$postArray['product']['source'],'location'=>$postArray['product']['location'],'added_on'=>date('Y-m-d h:i:s'),'status'=>'t','closed_bid'=>$postArray['product']['closed_bid'],'product_desc'=>$postArray['product']['product_desc']);
            
                
                $data_img=array();
                if(isset($postArray['image']['image1']) && $postArray['image']['image1']!='')
                {
                    $file_name="image_1_".$postArray['product']['title'].".png";
                    $abs_path="public/images/product_images/".$file_name;

                    file_put_contents($abs_path, base64_decode($postArray['image']['image1']));
                    $data['image1']=$file_name;
                    // $this->usersapi->save_image($file_name,$added); 
                }
                if(isset($postArray['image']['image2']) && $postArray['image']['image2']!='')
                {
                   
                    $file_name="image_2_".$postArray['product']['title'].".png";
                    $abs_path="public/images/product_images/".$file_name;

                    file_put_contents($abs_path, base64_decode($postArray['image']['image2']));
                    $data['image2']=$file_name;
                    // $this->usersapi->save_image($file_name,$added); 
                }
                if(isset($postArray['image']['image3']) && $postArray['image']['image3']!='')
                {
                    $file_name="image_3_".$postArray['product']['title'].".png";
                    $abs_path="public/images/product_images/".$file_name;

                    file_put_contents($abs_path, base64_decode($postArray['image']['image3']));
                    $data['image3']=$file_name;
                    // $this->usersapi->save_image($file_name,$added); 
                }
                if(isset($postArray['image']['image4']) && $postArray['image']['image4']!='')
                {
                    $file_name="image_4_".$postArray['product']['title'].".png";
                    $abs_path="public/images/product_images/".$file_name;
                    $data['image4']=$file_name;
                    file_put_contents($abs_path, base64_decode($postArray['image']['image4']));

                    // $this->usersapi->save_image($file_name,$added); 
                }
                if(isset($postArray['image']['image5']) && $postArray['image']['image5']!='')
                {
                    $file_name="image_5_".$postArray['product']['title'].".png";
                    $abs_path="public/images/product_images/".$file_name;

                    file_put_contents($abs_path, base64_decode($postArray['image']['image5']));
                     $data['image5']=$file_name;
                    // $this->usersapi->save_image($file_name,$added); 
                }

                 
                 
                // if(!empty($postArray['image']))
                // {
                //     foreach($postArray['image'] as $img)
                //     {   
                //         $file_name="image_".$added.".png";
                //         $abs_path="public/images/product_images/".$file_name;
                        
                //         // file_put_contents($abs_path, base64_decode($img));
                        
                //         $this->usersapi->save_image($file_name,$added); 
                       
                //     }
                // }
                $added=$this->usersapi->add_product($data);
            if($added)
            {
                

                $response['response']['status']='Ok';
                $response['response']['product_id']=$added;
                $response['response']['message']='Product Added successfully';
                
            }
            else
            {
                $response['response']['status']='Error';
                $response['response']['message']='Somthing went wrong! Please try again.';
            }
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='invalid data';
        }
        echo json_encode($response);
    }

    


    function all_products_get()
    {
        if(!empty($this->usersapi->all_products()))
        {  

            
            $count=0;
            foreach($this->usersapi->all_products() as $rm)
            {
                if($rm['remaing_time']!='no')
                {
                    if($rm['total_bids']=="")
                    {
                        $rm['total_bids']='';   
                    }

                    if($rm['current_bid_price']=="")
                    {
                        $rm['current_bid_price']='';   
                    }

                    if($rm['min_bid']=="")
                    {
                        $rm['min_bid']='';   
                    }

                    $new_program[]=$rm;
                }
                else
                {
                    $count+=1;
                }
            } 
            
            if(count($this->usersapi->all_products())==$count)
            {
               $response['response']['message']='No active products available!';
            }
            else
            {
                $response['response']['data']=$new_program;
            }
             

            $response['response']['status']='Ok';
            
            echo json_encode($response);
            exit();    
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Somthing went wrong, Try again';
            echo json_encode($response);
            exit();   
        } 
    }


    public function fix_product_bid_post()
    {
        // $postData='{"bid_amount":"200","product_id":"42","user_id":"5"}';
        $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 
        if($postArray['product_id']!='' && $postArray['bid_amount']!='' && $postArray['user_id'])
        {

            if($postArray['bid_amount']>=5)
            {
                $data=array('product_id'=>$postArray['product_id'],'bid_amount'=>$postArray['bid_amount'],'user_id'=>$postArray['user_id'],'created_on'=>date('Y-m-d h:i:s'));

                if($this->usersapi->post_bid($data))
                {
                    $response['response']['status']='ok';
                    $response['response']['message']='Your bid has been submitted';
                }
                else
                {
                    $response['response']['status']='Error';
                    $response['response']['message']='Somthing Went Wrong';
                }
            }
            else
            {
                $response['response']['status']='Error';
                $response['response']['message']='Bid cost shoud be equal or more then 5';
            }
            
        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Invalid Data';
        }
        echo json_encode($response);
    }

    public function product_bid_details_post()
    {
        //$postData='{"product_id":"36"}';
         $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 
        if($postArray['product_id']!='')
        {
            $data=$this->usersapi->bid_details($postArray['product_id']);
            
            $remaing=$this->usersapi->remaing($postArray['product_id']);
            
            if($data[0]['max_amount']=='')
            {
                $data[0]['max_amount']='';
            }

            if($data[0]['min_amount']=='')
            {
                $data[0]['min_amount']='';
            }
            
            $response['response']['status']='Ok';
            $response['response']['message']='Success';
            $response['data']['max_bid']=$data[0]['max_amount'];
            $response['data']['min_bid']=$data[0]['min_amount'];
            $response['data']['remaing_time']=$remaing[0]['closed_bid'];
            $response['data']['current_price']=$remaing[0]['current_price'];

        }
        else
        {
            $response['response']['status']='Error';
            $response['response']['message']='Invalid Data';
        }
        echo json_encode($response);
    }




    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $user = NULL;

            if (!empty($users))
            {
                foreach ($users as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $user = $value;
                    }
                }
            }

            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function users_post()
    {
        // $this->some_model->update_user( ... );
        $message = [
            'id' => 100, // Automatically generated by the model
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}
