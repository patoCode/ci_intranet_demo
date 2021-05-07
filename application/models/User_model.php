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
            $this->db->from('user u');
            $this->db->join('people', 'people.id_people = u.id_user', 'left');
            $this->db->join('site', 'site.id_site = u.id_site', 'left');
            $this->db->join('company', 'company.id_company = site.id_company', 'left');

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
            $this->db->where('u.status = ', 'activo');
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
        $this->db->select('r.name, r.description, a.name as actionName, a.description as actionDes, a.uri as actionUri, a.icon');
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