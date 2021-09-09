<?php
class User_model extends CI_Model
{
    public function checkLogin($user, $pass)
    {
        $this->db->from('user');
        $this->db->where('username = ', $user);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() >= 1)
        {
            $login = $query->row();
            $this->db->select('CONCAT(p.name," ",p.pat_surename," ", mat_surename) as fullname, u.id_user as id_user, p.name as peopleName, p.pat_surename as apPat, p.mat_surename as apMat, p.birthday as cumpleanio, p.ci as ci, p.phone as phone, p.mobile as mobile, p.personal_email, u.username as user, COALESCE(u.photo,"user_default.png") as photo, u.email,u.location, u.ip_phone, u.work_position, u.manager, u.ldap, u.notifications_active, s.name as site, s.slogan, s.code, s.main_logo,s.short_key, c.name as company, c.initials, c.description, c.company_logo, c.code as company_code, c.short_key as skCompany');
            $this->db->from('user u');
            $this->db->join('people p', 'p.id_people = u.id_user', 'left');
            $this->db->join('site s', 's.id_site = u.id_site', 'left');
            $this->db->join('company c', 'c.id_company = s.id_company', 'left');
            $this->db->where('password ', $pass);

            // if( strtolower($login->ldap) == "activo" )
            // {
            //     $conex = ldap_connect(SERVER_LDAP,PORT_SERVER_LDAP) or die ("No ha sido posible conectarse al servidor");
            //     ldap_set_option($conex, LDAP_OPT_PROTOCOL_VERSION, 3);
            //     ldap_set_option($conex, LDAP_OPT_REFERRALS, 0);
            //     $SW_LDAP = FALSE;
            //     if ($conex)
            //     {
            //         ini_set('display_errors',0);
            //         $userldap = $user.COMPANY_DOMAIN;
            //         $passldap = $this->input->post('password');
            //         $ldapconn = ldap_bind($conex,$userldap,$passldap);
            //         if(!$ldapconn)
            //             return false;
            //     }
            // }
            // else
            // {
            //     $this->db->where('password ', $pass);
            // }

            $this->db->where('username = ', $user);
            $this->db->where('u.status = ', STATUS_ACTIVE);
            $this->db->where('u.is_delete', CURRENT_STATUS);
            $this->db->where('p.is_delete', CURRENT_STATUS);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    public function getRols($userId)
    {
        $this->db->from('user_rol');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        if($query->num_rows() >= 1){
            return $query->result();
        }
        return null;
    }
    public function getActions($userId)
    {
        /*
        SELECT *
        FROM user_rol ur
        JOIN rol r on r.id_rol = ur.id_rol
        JOIN rol_action ra on ra.id_rol = r.id_rol
        JOIN action a on a.id_action = ra.id_action
        WHERE ur.id_user = 1
        */
        $this->db->select('r.name, r.description, a.name as actionName, a.description as actionDes, a.uri as actionUri, a.icon, a.id_action');
        $this->db->from('user_rol ur');
        $this->db->join('rol r', 'r.id_rol = ur.id_rol', 'left');
        $this->db->join('rol_action ra', 'ra.id_rol = r.id_rol', 'left');
        $this->db->join('action a', 'a.id_action = ra.id_action', 'left');
        $this->db->where('ur.id_user', $userId);
        // Active conditions
        $this->db->where('r.status', STATUS_ACTIVE);
        $this->db->where('r.is_delete', CURRENT_STATUS);
        $this->db->where('a.status', STATUS_ACTIVE);
        $this->db->where('a.is_delete', CURRENT_STATUS);
        $this->db->group_by('a.id_action');
        $query = $this->db->get();
        if($query->num_rows() >= 1){
            return $query->result();
        }
        return null;
    }
    public function rolsVisibility($userId)
    {
        /*
        SELECT r.visibility
        FROM user_rol ur
        JOIN rol r on r.id_rol = ur.id_rol
        WHERE ur.id_user = 1
        */
       $this->db->select('r.visibility');
        $this->db->from('user_rol ur');
        $this->db->join('rol r', 'r.id_rol = ur.id_rol', 'left');
        $this->db->where('ur.id_user', $userId);
        $this->db->where('r.status', STATUS_ACTIVE);
        $query = $this->db->get();

        if($query->num_rows() >= 1){
            return $query->result();
        }
        return null;
    }
}