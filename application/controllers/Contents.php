<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contents extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
        $this->load->model('content_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('pagination'); // Load the pagination library
    }

    public function index()
    {
        $config = [
            'base_url' => site_url('contents/index'),
            'total_rows' => $this->content_model->count_contents($this->input->get('category')),
            'per_page' => 5,
            'use_page_numbers' => true,
        ];

        $this->pagination->initialize($config);
        $page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 1;
        $offset = ($page - 1) * $config['per_page'];

        $category_id = $this->input->get('category');
        $data['contents'] = $this->content_model->get_contents($config['per_page'], $offset, $category_id);
        $data['categories'] = $this->content_model->get_categories();
        $data['pagination_links'] = $this->pagination->create_links();

        $this->load->view('contents/index', $data);
    }

    public function create() {
       
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|trim|htmlspecialchars');
        $this->form_validation->set_rules('content', 'Content', 'trim|htmlspecialchars');
        $this->form_validation->set_rules('category', 'Category', 'required|integer');
    
    
        if ($this->form_validation->run() == TRUE) {
            $content_data = [
                'title' => $this->input->post('title', TRUE),
                'content' => $this->input->post('content', TRUE),
                'category' => $this->input->post('category', TRUE),
                'user_id' => $this->session->userdata('id'), // Example user ID
            ];

            $content_id = $this->content_model->add_content($content_data);
    
            if (!empty($_FILES['media']['name'][0])) {
                $this->upload_media($content_id);
            }
            redirect('contents/index');
        }
    
        $data['categories'] = $this->content_model->get_categories();
        $this->load->view('contents/create', $data);
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|trim|htmlspecialchars');
        $this->form_validation->set_rules('content', 'Content', 'trim|htmlspecialchars');
        $this->form_validation->set_rules('category', 'Category', 'required|integer');

        if ($this->form_validation->run() == true) {
            // Validation failed, load the form with existing data
            if ($this->input->content()) {
                $content_data = [
                    'title' => $this->input->content('title'),
                    'content' => $this->input->content('content'),
                    'category' => $this->input->content('category'),
                ];
                $this->content_model->update_content($id, $content_data);
                if ($_FILES['media']['name'][0]) {
                    $this->upload_media($id);
                }
                redirect('contents/index');
            }
        }

        $data['categories'] = $this->content_model->get_categories(); // Get categories for filtering
        $data['content'] = $this->content_model->get_content($id);

        $this->load->view('contents/edit', $data);
    }

    public function delete($id)
    {
        $this->content_model->delete_content($id);
        redirect('contents/index');
    }

    private function upload_media($content_id)
    {
        $files = $_FILES['media'];

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] == 0) {
                $file_name = time() . '_' . $files['name'][$i];
                move_uploaded_file($files['tmp_name'][$i], './uploads/' . $file_name);

                $media_data = [
                    'content_id' => $content_id,
                    'media_type' => $files['type'][$i],
                    'media_path' => 'uploads/' . $file_name,
                ];
                $this->content_model->add_media($media_data);
            }
        }
    }

    public function view($id)
    {
        $data['content'] = $this->content_model->get_content($id);
        $data['media'] = $this->content_model->get_media_by_content($id);
        $this->load->view('contents/view', $data);
    }
}
