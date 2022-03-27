<?php

/**
 * generate_data
 *
 * @param mixed $limit
 * @param mixed $offset
 * @param mixed $get
 *
 * @return void
 * @author rutuja joshi
 */
function generate_data($limit = 5, $offset = 0, $get = array())
{
    $CI = &get_instance();
    $limitQry = '';
    if (isset($limit) && $limit != '0') {
        $limitQry = " LIMIT " . $limit . " OFFSET " . $offset;
    }

    $appendquery = '';
    if (isset($get) && is_array($get) && count($get) > 0) {

        if (isset($get['cre_min_date']) && $get['cre_min_date'] != "" && isset($get['cre_max_date']) && $get['cre_max_date'] != "") {
            $appendquery .= ' AND DATE_FORMAT(q.created_date, "%Y-%m-%d") >=  "' . date('Y-m-d', strtotime($get['cre_min_date'])) . '"  AND DATE_FORMAT(q.created_date, "%Y-%m-%d") <=  "' . date('Y-m-d', strtotime($get['cre_max_date'])) . '"';
        }
        if (isset($get['div']) && $get['div'] != '') {
            $appendquery .= " AND q.division = " . $get['div'];
        }
        if (isset($get['desi']) && $get['desi'] != '') {
            $appendquery .= " AND q.designation  IN(" . $get['desi'] . ")";
        }
        if (isset($get['title']) && $get['title'] != '') {
            $appendquery .= " AND q.title Like '%" . $get['title'] . "%'";
        }
    }
    $sql = "SELECT * FROM `jobs` q where status = 1 " . $appendquery . " ORDER BY `id` DESC " . $limitQry;

    $query_exec = $CI->db->query($sql);
    $data['list'] = $query_exec->result_array();

    $cquery = "SELECT COUNT(id) as total FROM `jobs` q where status = 1 " . $appendquery;
    $cquery_exec = $CI->db->query($cquery);

    $data['total'] = $cquery_exec->row_array();

    return $data;
}
/**
 * clean
 *
 * @param  mixed $string
 *
 * @return void
 */
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^0-9\-]/', '', $string); // Removes special chars.
}
/**
 * insert_jobs
 *
 * @param  mixed $data
 *
 * @return void
 */
function insert_jobs($data = array())
{
    $CI = &get_instance();
    $jobs_data = array(
        'created_by' =>  $data['created_by'],
        'created_date' => isset($data['created_date']) ? $data['created_date'] : date('Y-m-d H:i:s'),
        'title' => $data['jobs']['title'],
        'division' => $data['jobs']['industry'],
        'designation' => $data['jobs']['designation'],
        'min_experience' => $data['jobs']['min_experience'],
        'max_experience' => $data['jobs']['max_experience'],
        'requirements' => $data['jobs']['requirements'],
        'location' => $data['jobs']['locations'],
        'salary' => clean($data['jobs']['salary']),
        'currency_id' => $data['jobs']['currency'],
        'nationality' => $data['jobs']['nationality'],
        'description' => $data['jobs']['description'],
        'certification' => $data['jobs']['certification'],
        'employer_name' => $data['jobs']['employer_name']
    );

    $jobs_id = $CI->gm->insert('jobs', $jobs_data);

    /**
     * Create sef and
     *  update jobs by adding sef
     */
    $SEF = generate_seo_link($data['jobs']['title'] . " " . $jobs_id, $replace = '-', $remove_words = true, $words_array = array());
    $jobs_data = array(
        'sef' => $SEF,
    );
    $CI->gm->update('jobs', $jobs_data, '', array('id' => $jobs_id));
    return $jobs_id;
}
function update_job($data)
{
    $CI = &get_instance();
    $jobs_id = $data['jobid'];
    $jobs_data = array(
        'modified_by' => $data['modified_by'],
        'modified_date' => date('Y-m-d H:i:s'),
        'title' => $data['jobs']['title'],
        'division' => $data['jobs']['industry'],
        'designation' => $data['jobs']['designation'],
        'min_experience' => $data['jobs']['min_experience'],
        'max_experience' => $data['jobs']['max_experience'],
        'requirements' => $data['jobs']['requirements'],
        'location' => $data['jobs']['locations'],
        'salary' => clean($data['jobs']['salary']),
        'currency_id' => $data['jobs']['currency'],
        'nationality' => $data['jobs']['nationality'],
        'description' => $data['jobs']['description'],
        'certification' => $data['jobs']['certification'],
        'employer_name' => $data['jobs']['employer_name']


    );
    $CI->gm->update('jobs', $jobs_data, '', array('id' => $jobs_id));
    return $jobs_id;
}
function apply_job($data)
{
    $CI = &get_instance();
    $job_apply = array(
        'candidate_id' => $data['session']['candidate_id'],
        'job_id' => $data['post']['jobid'],
        'created_date' => date('Y-m-d H:i:s'),
        'created_by' => $data['session']['id'],
    );
    $id = $CI->gm->insert('candidate_job', $job_apply);
    /**
     * 
     * If candidate apply for job and job inserted Successfully then send mail to admin
     * 
     */
    if (is_numeric($id)  && $id != '') {
        $candidateId = $data['session']['candidate_id'];
        $data['candidate'] = $CI->gm->get_selected_record('candidate', '*', $where = array('id' => $candidateId), array());
        $data['job'] = $CI->gm->get_selected_record('jobs', '*', $where = array('id' => $data['post']['jobid']), array());
        $contact_admin = $CI->load->view('candidate_job_apply_mail', $data, TRUE);
        $CI->load->helper('email');
        send_email(CONTACT_ADMIN_MAIL, 'Candidate Applied for Job', $contact_admin, NOREPLY_EMAIL, $reply_email = CONTACT_ADMIN_MAIL, $cc_email = '', $attachment = array(), $entity_data = array());
        return TRUE;
    } else { 
        return FALSE;
    }
}
