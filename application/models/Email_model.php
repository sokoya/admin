<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {

    // Curl function to send
    function send_now($post){
        $url = 'https://api.elasticemail.com/v2/email/send';
        try{

            $post['from'] = (!isset($post['from'])) ? lang('notify_email') : $post['from'] ;
            $post['fromName'] = 'Onitshamarket';
            $post['apikey'] = ELASTIC_EMAIL_API;
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));
            $result = curl_exec($ch);
            curl_close ($ch);
            return $result;
        }catch(Exception $ex){
            $this->session->set_flashdata('error_msg',$ex->getMessage());
            return false;
        }
    }

    function reset_password( $data ){
        $post = array(
            'subject' => 'Reset Password Confirmation',
            'to' => $data['email'],
            'template' => 'UserPasswordReset',
            'merge_recipent' => $data['recipent'],
            'merge_reset_link' => $data['reset_link'],
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Welcome user for new account creates
    function welcome_user( $data ){
        $post = array(
            'subject' => 'Welcome to ' . lang('app_name'),
            'to' => $data['email'],
            'template' => 'WelcomeNewUser',
            'merge_recipent' => $data['recipent'],
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Order completed
    function payment_made_to_seller( $data ){
        $post = array(
            'subject' => 'Payment Made To Your Account',
            'to' => $data['email'],
            'template' => 'SellerPaymentCompleted',
            'merge_recipent' => $data['recipent'],
            'merge_amount' => $data['amount'],
            'merge_bank_details' => $data['bank_detail'],
            'merge_payment_id' => $data['payment_id'],
            'merge_timestamp' => get_now(),
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Send mail to buyer when order is marked as shipped
    function shipped_order( $order_code ){
        $query = "SELECT b.first_name, b.last_name, b.phone, b.address, o.billing_address_id, b.sid,b.aid, u.email, s.name state_name, a.name area_name FROM orders o 
        LEFT JOIN billing_address b ON(b.id = o.billing_address_id) 
        LEFT JOIN users u ON (o.buyer_id = u.id) 
        LEFT JOIN states s ON (s.id = b.sid)
        LEFT JOIN area a ON (a.id = b.aid)
        WHERE order_code = {$order_code} GROUP BY order_code LIMIT 1";
        $result = $this->db->query( $query )->row();
        $post = array(
            'subject' => 'Your Onitshamarket Order ' . $order_code . ' - item(s) have been shipped.',
            'to' => $result->email,
            'template' => 'OrderShippedBuyer',
            'merge_recipent' => $result->first_name . ' ' . $result->last_name,
            'merge_order_code' => $order_code,
            'merge_address' => $result->address . ' ' . $result->area_name. ', ' . $result->state_name,
            'merge_phone' => $result->phone,
            'merge_order_status_link' => "https://www.onitshamarket.com/account/orderstatus/" . $order_code,
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    /*
        NOT IN USE NOW
        Send mail to buyer on returned order
    */
    function returned_order( $result ){
        $post = array(
            'subject' => 'Your Onitshamarket Order item has been confirmed.',
            'to' => $result['email'],
            'template' => 'OrderReturnedBuyer',
            'merge_recipent' => $result['first_name'],
            'merge_order_status_link' => "https://www.onitshamarket.com/account/orderstatus/" . $result['order_code'],
            'isTransactional' => false
        );
        return $this->send_now($post);
    }


}