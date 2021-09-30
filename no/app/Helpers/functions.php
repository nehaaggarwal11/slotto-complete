<?php

if (!function_exists('nj_get_email_templates')) {
    /**
     * @return array
     */
    function nj_get_email_templates() {
        $data = file_get_contents(env('EMAIL_BUILDER_API_ENDPOINT').'/?action=get_templates');
        if(empty($data)){
            return [];
        }
        $data = json_decode($data);
        if(is_array($data)){
            $result = [];
            foreach ($data as $db){
                $result[] = (object)[
                    'id' => @$db->TemplateId,
                    'name' => @$db->TemplateName,
                    'content' => @$db->TemplateContent,
                ];
            }
            return $result;
        }
        return [];
    }
}

if (!function_exists('get_email_template_html_by_id')) {
    /**
     * @param $template_id
     * @return ''|null
     */
    function get_email_template_html_by_id($template_id) {
        $data = file_get_contents(env('EMAIL_BUILDER_API_ENDPOINT').'/?action=get_template_content_html&template_id='.$template_id);
        if(empty($data)){
            return null;
        }
        $data = json_decode($data);
        if(is_object($data)){
            return @$data->html;
        }
        return null;
    }
}
