<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataaccess {

    private static $initialized = false;

    public static function intialize(){

        if (self::$initialized) {
            return;
        }
        self::$initialized = true;
    }

    // public static function coursInsert($libelle) {
    //     $CI =& get_instance();
    //     $sql = 'call coursInsert(?)';
    //     $CI->db->query($sql,$libelle);
    // }

    public static function pdgDelete($libelle) {
        $CI = & get_instance();
        $CI->db->where('libelle', $libelle);
        $CI->db->delete('stockerPageDeGarde');
    }

    // public static function codeBapsInsert($codeBaps, $libelleCours) {
    //     $CI =& get_instance();
    //     $sql1 = 'call getIdCoursByLib(?, @output)';
    //     $CI->db->query($sql1, $libelleCours);
    //     //recupere output de la procedure
    //     $query = $CI->db->query(('select @output as output'));
    //     $result = $query->result_array();
    //     $idCours = $result[0]['output'];
    //     $sql2 = 'call codeBapsInsert(?, ?)';
    //     $CI->db->query($sql2,array($codeBaps, $idCours));
    // }

    public static function formInsert($libelleCours, $libCodeBaps, $libCodeRayhane) {
        $CI =& get_instance();
        $sql = 'call formInsertCode(?, ?, ?)';
        $param = array($libelleCours, $libCodeBaps, $libCodeRayhane);
        $CI->db->query($sql, $param);
    }

    public static function formInsertFiles($libelleCoursSource, $emplacementCoursSource, $libelleSlide, $emplacementSlide, $libelleSupportCoursGen, $emplacementSupportCoursGen, $libCodeBaps, $libCodeRayhane) {
        $CI =& get_instance();
        $sql = 'call formInsertFiles(?, ?, ?, ?, ?, ?, ?, ?)';
        $param = array($libelleCoursSource, $emplacementCoursSource, $libelleSlide, $emplacementSlide, $libelleSupportCoursGen, $emplacementSupportCoursGen, $libCodeBaps, $libCodeRayhane);
        $CI->db->query($sql, $param);
    }

    public static function InsertPdgInDb($emplacement, $libelle) {
        $CI = & get_instance();
        $sql = 'call insertPdg(?, ?)';
        $param = array($libelle, $emplacement);
        $CI->db->query($sql, $param);
    }

    public static function getAllPdgInDb() {
        $CI =& get_instance();
        $CI->db->select('libelle');
        $CI->db->from('stockerPageDeGarde');
        $result =$CI->db->get()->result_array();
        //on recupere les elements de la requete dans un tableau sans les clés array['libellePdg']
        $tableauPdg = array();
        foreach($result as $libellePdg => $value) {
            foreach($value as $key){
                $tableauPdg[] = $key;
            }
        }
        return $tableauPdg;
    }


    public static function GetPageDeGarde($libellePdg){
        $CI = & get_instance();
        $CI->db->select('emplacement');
        $CI->db->from('stockerPageDeGarde');
        $CI->db->where('libelle', $libellePdg);
        $result = $CI->db->get()->result_array();
        foreach($result as $libellePdg =>$value) {
            foreach($value as $key) {
                $emplacement = $key;
            }
        }
        return $emplacement;
    }

    // public static function InsertJpg($data){
    //     $CI = & get_instance();
    //     $CI->db->insert('slideJpg', $data);

    //     $insert_id = $CI->db->insert_id();
    //     return $insert_id;
    // }

    // public static function InsertJpgToSlide($data) {
    //     $CI = & get_instance();
    //     $CI->db->insert('lierSlideToJpg', $data);
    // }

    // public static function getIdByFileNameZip($fileName){
    //     $CI = & get_instance();
    //     $CI->db->select('id');
    //     $CI->db->from('slide');
    //     $CI->db->where('libelleZip', $fileName);

    //     $result = $CI->db->get()->row()->id;

    //     $id = $result;
    //     return $id;
    // }

    public static function getFolderNameForZipFiles($codeBaps){
        $CI = &get_instance();
        $CI->db->select('libelleZip');
        $CI->db->from('slide');
        $CI->db->where('codeBaps', $codeBaps);

        $result = $CI->db->get()->row()->libelleZip;

        return $result;
    }



    



    
}