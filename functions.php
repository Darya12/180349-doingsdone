<?php
function includeTemplate ($template_path, $template_data) {
    $content = "";
    if (file_exists ($template_path)) {
        ob_start();
        extract($template_data);
        require_once $template_path;
        $content = ob_get_clean();
    }
    return $content;
};

function numOfTasks ($tasksList, $nameOfProjects) {
    if ($nameOfProjects == 'Все') {
        return count ($tasksList);
    };

    $num = 0;
    foreach ($tasksList as $value) {
        if ($value['category'] == $nameOfProjects) {
            $num++;
        }
    };
    return $num;
}
?>
