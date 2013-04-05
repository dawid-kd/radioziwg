<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 *
 * @property ArticleCat $ArticleCat
 * @property ArticleTag $ArticleTag
 * @property City $City
 * @property Company $Company
 * @property CompanyProduct $CompanyProduct
 * @property Like $Like
 * @property GroupCat $GroupCat
 * @property PoliticianGroup $PoliticianGroup
 * @property Tag $Tag
 * @property Vote $Vote
 */
class Ajax extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCitiesOptions()
    {
        $this->load->model('City');

        $args = array(
            'region' => $this->input->post('region'),
        );
        $cities = $this->City->getSelectOptions($args);

        echo $cities;
    }

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */