<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    // Define categories
    private $categories = [
        1 => 'Blog',
        2 => 'News',
        3 => 'Tutorial',
    ];

    public function get_categories() {
        return $this->categories;
    }

    public function get_Contents($limit, $offset, $category_id = null) {
        if ($category_id) {
            $this->db->where('category', $category_id);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('content');
        return $query->result();
    }

    public function count_Contents($category_id = null) {
        if ($category_id) {
            $this->db->where('category', $category_id);
        }
        return $this->db->count_all_results('content');
    }

    public function add_Content($data) {
        $this->db->insert('content', $data);
        return $this->db->insert_id();
    }

    public function get_Content($id) {
        return $this->db->get_where('content', array('id' => $id))->row();
    }

    public function update_Content($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('content', $data);
    }

    public function delete_Content($id) {
        return $this->db->delete('content', array('id' => $id));
    }
    
    public function add_media($data) {
        return $this->db->insert('content_media', $data);
    }

    public function get_media_by_Content($Content_id) {
        return $this->db->get_where('content_media', array('content_id' => $Content_id))->result();
    }

    public function delete_media($media_id) {
        return $this->db->delete('content_media', array('id' => $media_id));
    }
}