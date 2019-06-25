<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Amar_model extends CI_Model {

    public $Id;

    public function save_data($table, $data) {
        if ($this->db->insert($table, $data)) {
            $this->Id = $this->db->insert_id();

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function view_data($table, $where, $order1, $order2) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }

    public function delete($table, $data) {
        if ($this->db->delete($table, $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update($table, $data, $where) {
        if ($where) {
            $this->db->where($where);
        }
        if ($this->db->update($table, $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    //get data with chart from database
    function get_data() {
        $this->db->select('id ,candidate_no,party_listid,votecount ');
        $this->db->from("candidate");
        // $this->db->join("party_list", "candidate.party_listid=party_list.id");
        return $this->db->get()->result();
    }

    public function view_twodata($table, $table2, $table3, $where, $order1, $order2) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("$table.*, $table2.id tid, $table2.name tname");
        $this->db->from($table);
        $this->db->join("$table2", "$table.$table3=$table2.id");
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }

    public function Voter_View($where) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("voter.* ,  candidate_area.seat_no seat_no, candidate_area.seat_name seat_name, candidate_area.candidate_area candidate_area, district.name districtname , district.code districtcode ");
        $this->db->from("voter");
        $this->db->join("candidate_area", "voter.candidate_areaid=candidate_area.id");
        $this->db->join("district", "candidate_area.districtid=district.id");
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function voter_vote() {
        $this->db->select("voter.* , candidate_area.seat_no seat_no, candidate_area.seat_name seat_name, candidate_area.candidate_area candidate_area, district.name districtname , district.code districtcode  ");
        $this->db->from("voter");
        $this->db->join("voter_verify", "voter.nid=voter_verify.nid");
        $this->db->join("candidate_area", "voter.candidate_areaid=candidate_area.id");
        $this->db->join("district", "candidate_area.districtid=district.id");
        $this->db->order_by("id", "desc");
        return $this->db->get()->result();
    }

    public function Candidate_View($where) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("candidate.* ,  candidate_area.seat_no seat_no, candidate_area.seat_name seat_name, candidate_area.candidate_area candidate_area, district.name districtname , district.code districtcode ,party_list.name party_listname , party_list.picture party_listpicture , party_list.id party_listid");
        $this->db->from("candidate");
        $this->db->join("candidate_area", "candidate.candidate_areaid=candidate_area.id");
        $this->db->join("district", "candidate_area.districtid=district.id");
        $this->db->join("party_list", "candidate.party_listid=party_list.id");
        $this->db->order_by("id", "asc");
        return $this->db->get()->result();
    }

    public function MyDashboard() {
        return $this->GetMultipleQueryResult("CALL dashboard()");
    }

    public function GetMultipleQueryResult($queryString) {
        if (empty($queryString)) {
            return false;
        }
        $index = 0;
        $ResultSet = array();
        if (mysqli_multi_query($this->db->conn_id, $queryString)) {
            do {
                if (false != $result = mysqli_store_result($this->db->conn_id)) {
                    $rowID = 0;
                    while ($row = $result->fetch_object()) {
                        $ResultSet[$index][$rowID] = $row;
                        $rowID++;
                    }
                }
                $index++;
            } while (mysqli_more_results($this->db->conn_id) && mysqli_next_result($this->db->conn_id));
        }
        return $ResultSet;
    }

    public function searchResult($scid, $cat) {
        if ($scid > 0) {
            $this->db->where("candidate_area.id", $scid);
        } else if ($cat > 0) {
            $this->db->where("district.id", $cat);
        }


        $this->db->select("candidate.* ,  candidate_area.seat_no seat_no, candidate_area.seat_name seat_name, candidate_area.candidate_area candidate_area, district.name districtname , district.code districtcode ,party_list.name party_listname , party_list.picture party_listpicture , party_list.id party_listid");
        $this->db->from("candidate");
        $this->db->join("candidate_area", "candidate.candidate_areaid=candidate_area.id");
        $this->db->join("district", "candidate_area.districtid=district.id");
        $this->db->join("party_list", "candidate.party_listid=party_list.id");
        $this->db->order_by("candidate.id", "desc");
        return $this->db->get()->result();
    }

    public function search_Vote_details($scid, $cat, $dat) {
        if ($scid > 0) {
            $this->db->where("candidate_area.id", $scid);
        } else if ($cat > 0) {
            $this->db->where("district.id", $cat);
        } else if ($dat > 0) {
            $this->db->where("divisions.id", $dat);
        }


        $this->db->select("candidate.* , candidate_area.seat_no seat_no, candidate_area.seat_name seat_name, candidate_area.candidate_area candidate_area, district.name districtname , district.code districtcode ,party_list.name party_listname , party_list.picture party_listpicture , party_list.id party_listid , divisions.name divisionsname");
        $this->db->from("candidate");
        $this->db->join("candidate_area", "candidate.candidate_areaid=candidate_area.id");
        $this->db->join("district", "candidate_area.districtid=district.id");
        $this->db->join("divisions", "district.divisionsid=divisions.id");
        $this->db->join("party_list", "candidate.party_listid=party_list.id");
        $this->db->order_by("candidate.id", "desc");
        return $this->db->get()->result();
    }

}
