<?php

namespace Pages\Pages;

use \REDCap as REDCap;

class Pages extends \ExternalModules\AbstractExternalModule {
    public function loadPage() {
        /* Make path */
        $path = array($this->getSystemSetting('path'));

        $pid = $this->getProjectId();
        if (!is_null($pid)) {
            array_push($path, "pid" . $pid);
        }

        $page = $_GET["load"];
        if (is_null($page) || $page == "") {
            echo "Page not found";
            return;
        }
        if (strpos($page, "./") !== false) {
            echo "Page name cannot be outside path";
            return;
        }
        array_push($path, $page . ".php");

        $path = join(DIRECTORY_SEPARATOR, $path);

        /* Set some variables */
        $module = $this;
        $record_id = $_GET["id"];

        /* Require page */
        require($path);
    }

    public function getData($records, $fields, $args = array()) {
        $simplify = $args["simplify"];

        $params = array(
            return_format => "json",
            records => $records,
            fields => $fields,
            exportAsLabels => TRUE
        );
        $json = REDCap::getData($params);
        $data = json_decode($json);

        if ($simplify) {
            $data = $data[0];
        }

        return $data;
    }
}
