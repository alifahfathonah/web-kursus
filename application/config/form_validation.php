<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Form Validation
| -------------------------------------------------------------------------
*/
$config = array(
    'form_pendaftaran' => array(
        array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|max_length[100]|alpha_numeric_spaces',
            array('alpha_numeric_spaces'=>'Only alphabets please!')
        ),
        array(
            'field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'
        ),
        array(
            'field' => 'no_telepon',
            'label' => 'No Telepon',
            'rules' => 'require|max_length[13]|umeric'
        ),
        array(
            'field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'
        ),
        array(
            'field' => 'max_text_field',
            'label' => 'Text Field Three',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_emails|max_length[50]'
        ),
        array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|max_length[20]|alpha_numeric'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ),
    ),
    
);
