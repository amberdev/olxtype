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


    public function user_register_get()
    {
        $postData='{"name":"dipanshu","password":"pwd","mobile":"9560020152"}';
        // $postData = file_get_contents("php://input");
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


    public function verify_otp_get()
    {
        $postData='{"otp":"735","mobile":"9560020152"}';
        // $postData = file_get_contents("php://input");
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

    public function login_get()
    {
        $postData='{"mobile":"9560020152","password":"pwd"}';
        // $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 

        if($postArray['mobile']!='' && $postArray['password']!='')
        {
            if($this->usersapi->login($postArray['mobile'],$postArray['password']))
            {
                $response['response']['status']='Ok';
                $response['response']['message']='User logged in successfully';
            }
            else
            {
                $response['response']['status']='Ok';
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

    public function add_product_get()
    {
        $postData='{"product_type":"property","packege_type":"abc","packege_weight":"abc","quantity":"1","degree_or_quality":"qty","source":"src","location":"india"}';
        // $postData = file_get_contents("php://input");
        $postArray=json_decode($postData,true); 
        
        if($postArray['product_type']!='')
        {
            
            $data=array('product_type'=>$postArray['product_type'],'packege_type'=>$postArray['packege_type'],'packege_weight'=>$postArray['packege_weight'],'quantity'=>$postArray['quantity'],'degree_or_quality'=>$postArray['degree_or_quality'],'source'=>$postArray['source'],'location'=>$postArray['location'],'added_on'=>date('Y-m-d h:i:s'),'status'=>'f');
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

    public function upload_images_post()
    {
        //$_POST['product_id']=2;
        
        //$_FILES['file']['name']="nameNEw";
        
        //$postData = file_get_contents("php://input");
        //$postData='{"multupleImage":{"rest_id":"","user_id"=>"2","image_name"=>"asdfasd"}}';
        //$postArray=json_decode($postData,true);  
        if($_POST['product_id']=='')
        {
            $errorArray = array("status"=>"False","error"=>"Invalid Parameter Request");
            header('Content-type:application/json');
            $error = json_encode($errorArray);
            echo $error;
            exit();
        }
        else
        {
            
            if($_FILES['file']['name']=='')
            {
                $errorArray = array("status"=>"False","error"=>"Invalid Parameter Request");
                header('Content-type:application/json');
                $error = json_encode($errorArray);
                echo $error;
                exit();
            }
            else
            {
                $this->load->helper('url');
                $target_path = "/var/www/html/olxtype/public/";
                $user_file = time() . basename($_FILES['file']['name']);
                $target_path = $target_path .  $user_file;

                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
                {
                    $data=array('product_id'=>$_POST['product_id'],'image'=>$user_file);
                    // $data['name']=$user_file;
                    
                    $insertedId=$this->db->insert("tbl_image", $data); 
                    $ReturnData['response']['status']="ok";
                    $ReturnData['response']['message']="Image uploaded";
                    // $ReturnData['restImg']=$this->apimodel->getRestImg($_POST['rest_id']);  
                        
                         
                    $return = json_encode($ReturnData);
                    echo $return;
                    exit();
                 
                } 
                else
                {
                    $ReturnData['response']['status']="error";
                    $ReturnData['response']['message']="Image not uploaded, Try again";
                    // $ReturnData['restImg']=$this->apimodel->getRestImg($_POST['rest_id']);  
                        
                         
                    $return = json_encode($ReturnData);
                    echo $return;
                    exit();   
                }
            }
        }
    }


    function all_products_get()
    {
        if(!empty($this->usersapi->all_products()))
        {
            $response['response']['status']='Ok';
            $response['response']['data']=$this->usersapi->all_products();
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
