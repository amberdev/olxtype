<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

/**
 * Auth
 * @author    Dipanshu Gupta
 * date 	  2017-01-24
 */

class Usersapi extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function login_check($data)
	{
		if(!empty($data))
		{
			$this->db->where('fb_id',$data['fb_id']);
			$q=$this->db->get('tbl_users');
			if($q->num_rows()==0)
			{
				$token=sha1($data['email'].$data['fb_id']);
				$data['token']=$token;
				$this->db->insert('tbl_users',$data);
				$return_array['toekn']=$token;
				$return_array['user_id']=$this->db->insert_id();
				return $return_array;
			}
			else
			{
				$data['modified_on']=@date('Y-m-d h:i:s');
				$token=sha1($data['email'].$data['fb_id']);
				$data['token']=$token;
				$this->db->where('fb_id',$data['fb_id']);
				$this->db->update('tbl_users',$data);

				$return_array['toekn']=$token;
				$this->db->where('fb_id',$data['fb_id']);
				$q=$this->db->get('tbl_users');
				$user_data=$q->result_array();
				$return_array['user_id']=$user_data[0]['id'];
				return $return_array;
			}
		}
	}

	function checkAuth($token)
	{
		if($token!='')
		{
			$this->db->where('token',$token);
			$q=$this->db->get('tbl_users');
			if($q->num_rows()>0)
			{
				return true;
			}
		}
	}

	function user_exists($mobile)
	{
		$this->db->where('mobile',$mobile);
		$q=$this->db->get('tbl_user');
		if($q->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}

	function insert_user($data)
	{
		$this->db->insert('tbl_user',$data);
	}

	function verifyOtp($otp,$mobile)
	{
		$this->db->where('otp',$otp);
		$this->db->where('mobile',$mobile);
		$q=$this->db->get('tbl_user');
		if($q->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function login($mobile,$pwd)
	{
		$this->db->where('mobile',$mobile);
		$this->db->where('password',$pwd);
		$q=$this->db->get('tbl_user');
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
	}

	function add_product($data)
	{
		$this->db->insert('tbl_products',$data);
		return $this->db->insert_id();
	}

	function all_products()
	{

		$q=$this->db->query('select distinct(p.id), (select count(b.product_id) from tbl_bid b  where b.product_id=p.id group by b.product_id)as total_bids,p.* from tbl_products p inner join tbl_bid b where p.status="t"');
 
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
	}

	function post_bid($data)
	{
		$this->db->insert('tbl_bid',$data);
		return $this->db->insert_id();
	}

	function bid_details($product_id)
	{
		$q=$this->db->query("select  min(b.bid_amount)as min_amount, max(b.bid_amount)as max_amount from tbl_bid b where product_id='".$product_id."'");
		 
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}

	}

	function remaing($product_id)
	{
		$q=$this->db->query("select closed_bid,current_price from tbl_products where id='".$product_id."'");
		 
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}

	}

}