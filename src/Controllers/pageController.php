<?php

namespace Loppure\Controllers;

use \StdClass;
use \WP_User_Query;

class pageController extends Controller
{
    public function __construct()
    {
        $template_name = $this->getTemplateSlug();
        if ($template_name == '') {
            parent::__construct('Page:index');
            $this->data['content'] = get_the_content();
            $this->data['title']   = get_the_title();
        } else {
          parent::__construct('Page:'. $template_name);
        }

        $this->data['template_name'] = $template_name;

        if ($template_name == 'team') {
            $this->data['authors'] = $this->getAuthorsInfo();
        }

        $this->render();
    }

    private function getTemplateSlug() {
        $template_name = get_page_template_slug();
        if ($template_name == '') {
            return '';
        }

        preg_match('/.*\/(.*)\.php/', $template_name, $template_name);
        return $template_name[1];
    }

    /**
     * @todo: move this function elsewhere
     * @return: a list of StdClass containing author info
     */
    private function getAuthorsInfo() {
        // WP_User_Query arguments
        $args = array(
            'order'          => 'ASC',
            'orderby'        => 'display_name',
        );

        // The User Query
        $user_query = new WP_User_Query($args);

        $users = [];

        if (!empty($user_query->results)) {
            foreach ($user_query->results as $user) {
                if (in_array('administrator', $user->roles)) {
                    continue;
                }

                $a = new StdClass();
                $a->name  = $user->data->display_name;
                $a->bio   = get_the_author_meta('description', $user->ID);
                $a->url   = get_author_posts_url($user->ID);
                $a->thumb = get_wp_user_avatar($user->ID, 96);
                $users[] = $a;
            }
        }

        return $users;
    }
}
