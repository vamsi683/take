<?php defined('BASEPATH') || exit('No direct script access allowed');


class Trip extends Front_Controller
{
    /** @var array Site's settings to be passed to the view. */
    private $siteSettings;

    /**
     * Setup the required libraries etc.
     *
     * @retun void
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('trip/trip_model');
        $this->load->library('users/auth');

        $this->lang->load('trip');
        $this->siteSettings = $this->settings_lib->find_all();
    }


}
