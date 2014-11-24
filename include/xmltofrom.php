<?php
/**
 * Created by PhpStorm.
 * User: liguo
 * Date: 14-11-24
 * Time: 下午4:25
 */

class XmlToFrom {
    private $xml_path;
    private $action_form;

    function __construct($xml_path, $action_form) {
        $this->xml_path = $xml_path;
        $this->action_form = $action_form;
    }

    function toFrom() {
        $form_str = <<<EOT
            <form action="$this->action_form" method="post">
EOT;
        $xml = simplexml_load_file($this->xml_path);

        foreach($xml->children() as $child) {
            $form_str .= "<tr><td></td><td></td></tr>";
            $child_name = $child->getname();
            echo $child_name;
            echo '<br/>';

            if($child_name != 'NotSelectivity') {
                foreach($child->attributes() as $a => $b) {
                    echo $a,'="',$b,'"<br>';
                }
            }else {
                //var_dump($child->children());
                foreach($child->children() as $notSel) {
                    $notSel_name = $notSel->getname();
                    echo $notSel_name;
                    echo '<br/>';

                    foreach($notSel->attributes() as $a => $b) {
                        echo $a,'="',$b,'"<br>';
                    }
                }
            }
            echo '<br/>';
        }
        $form_str .= <<<EOT
            </form>
EOT;
    }
}