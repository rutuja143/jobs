<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function active($uri, $level = 1, $class_suffix = 'active')
{
    $ci = &get_instance();

    if ($ci->uri->segment($level) == $uri) {
        return $class_suffix;
    } else
        return;
}


function get_states($countryid = 101)
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `states` WHERE country_id = ' . $countryid;
    $company_name = $ci->db->query($query);
    $states = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $states[$value['id']] = ucwords($value['name']);
        }
    }
    return $states;
}

function get_cities($stateid = 1)
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `cities` WHERE state_id = ' . $stateid;
    $exec = $ci->db->query($query);
    $data = $exec->result_array();
    $cities = array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $cities[$value['id']] = ucwords($value['name']);
        }
    }
    return $cities;
}

function get_designation($divisionids = array())
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `designation`';
    if (isset($divisionids) && count($divisionids) > 0) {
        $divisionid = implode(',', $divisionids);
        $query .= ' WHERE division_id IN (' . $divisionid . ')';
    }
    $company_name = $ci->db->query($query);
    $designation = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $designation[$value['id']] = ucwords($value['name']);
        }
    }
    return $designation;
}
function get_launguage()
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `languages` ';
    $company_name = $ci->db->query($query);
    $languages = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $languages[$value['id']] = ucwords($value['name']);
        }
    }
    return $languages;
}

function get_course()
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `course` ';
    $company_name = $ci->db->query($query);
    $languages = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $languages[$value['id']] = ucwords($value['name']);
        }
    }
    return $languages;
}

function get_Industry()
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `industry` ';
    $company_name = $ci->db->query($query);
    $industry = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $industry[$value['id']] = ucwords($value['name']);
        }
    }
    return $industry;
}
function get_division($limit = 0, $status = array(1))
{
    $ci = &get_instance();
    $append_query = '';
    if (count($status) > 0) {
        $append_query = ' where status IN (' . implode(" ", $status) . ')';
    }
    $query = 'SELECT id,name FROM `division` ' . $append_query;
    if ($limit != 0) {
        $query .= ' limit ' . $limit;
    }
    $query .= ' order by name asc';
    $company_name = $ci->db->query($query);
    $division = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $division[$value['id']] = ucwords($value['name']);
        }
    }

    return $division;
}
function get_currency()
{
    $ci = &get_instance();
    $query = 'SELECT id,name,code,symbol FROM `currency` ';
    $company_name = $ci->db->query($query);
    $division = array();
    $data = $company_name->result_array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $division[$value['id']] = $value;
        }
    }
    return $division;
}
/**
 * get_candidateappliedjobids
 *
 * @param  mixed $candidate_id
 *
 * @return void
 */
function get_candidateappliedjobids($candidate_id)
{
    if ($candidate_id != '') {
        $ci = &get_instance();
        $query = 'SELECT job_id,id FROM `candidate_job` Where candidate_id = ' . $candidate_id;
        $company_name = $ci->db->query($query);
        $division = array();
        $data = $company_name->result_array();
        if (isset($data) && is_array($data) && count($data)) {
            foreach ($data as $key => $value) {
                $division[$value['id']] = $value['job_id'];
            }
            return $division;
        } else {
            return array();
        }
    } else {
        return array();
    }
}

function get_countries()
{
    $ci = &get_instance();
    $query = 'SELECT id,name FROM `countries` ';
    $exec = $ci->db->query($query);
    $data = $exec->result_array();
    $countries = array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $countries[$value['id']] = ucwords($value['name']);
        }
    }

    return $countries;
}
function get_phonecode()
{
    $ci = &get_instance();
    $query = 'SELECT id,c_ph_code FROM `countries` ';
    $exec = $ci->db->query($query);
    $data = $exec->result_array();
    $countries = array();
    if (isset($data) && is_array($data) && count($data)) {
        foreach ($data as $key => $value) {
            $countries[$value['id']] = $value['c_ph_code'];
        }
    }

    return $countries;
}


function get_category()
{
    $ci = &get_instance();
    $catq = "select * from category";
    $catq_exec = $ci->db->query($catq);
    $cat = $catq_exec->result_array();
    foreach ($cat as $key => $value) {
        $category[$value['id']] = lcfirst($value['name']);
    }
    return $category;
}

function get_author()
{
    $ci = &get_instance();
    $authq = "select * from employee";
    $authq_exec = $ci->db->query($authq);
    $auth = $authq_exec->result_array();

    foreach ($auth as $key => $value) {
        $author[$value['id']] = ucwords($value['name']);
    }

    return $author;
}

function get_employer_packages()
{
    $ci = &get_instance();
    $authq = "select * from employer_packages";
    return $ci->db->query($authq)->result_array();
}

function get_employer_info($employerid)
{
    $ci = &get_instance();
    $authq = "select * from user where id =" . $employerid;
    return $ci->db->query($authq)->row_array();
}

if (!function_exists('get_all_years')) {

    function get_all_years()
    {
        $ci = &get_instance();
        $result = array();
        $start_year = $ci->config->item('year_start');
        $end_year = date('Y');
        for ($year = $start_year; $year <= $end_year; $year++) {
            $result[] = array(
                'id' => $year,
                'name' => $year,
            );
        }

        return $result;
    }
}

