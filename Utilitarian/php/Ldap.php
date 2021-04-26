<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ldap {

    public function ldap_consult($nick, $pass) {

        $ldap_server = "192.168.1.21";
        $servidor_dominio = "minjusticia-ddhh.int";
        $ldap_dn = "dc=minjusticia-ddhh,dc=int";
        $filter = '(&(objectClass=user)(sAMAccountName=' . $nick . '))';
        $attr = array('memberOf', 'displayName', 'sAMAccountName', 'description');
        $conectado_LDAP = @ldap_connect($ldap_server);
        ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);
        if (ldap_errno($conectado_LDAP)) {
            echo 'Error #' . ldap_errno($conectado_LDAP) . ': ' . ldap_err2str(ldap_errno($conectado_LDAP));
        }
        //test user and password on Server LDAP";
        $autenticado_LDAP = @ldap_bind($conectado_LDAP, $nick . "@" . $servidor_dominio, $pass)or exit('El Usuario no está creado en el dominio AD ..!');
        $result = @ldap_search($conectado_LDAP, $ldap_dn, $filter, $attr);
        $entries = @ldap_get_entries($conectado_LDAP, $result);
        //var_dump($result);
        //var_dump($entries);

        if ($autenticado_LDAP) {
            for ($i = 0; $i < $entries["count"]; $i++) {
                $dn = $entries[$i]["dn"];
                $get_explode = explode(',', $dn);
                $cn = $get_explode[0];
                $usr_name_complete = str_replace('CN=', ' ', $cn);
            }


            return array('autentication' => TRUE, 'name_complete' => $usr_name_complete);
        } else {
            return array('autentication' => FALSE);
        }
        ldap_unbind($conectado_LDAP);
    }

}
