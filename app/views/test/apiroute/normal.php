<textarea rows="10" cols="50">
    <?php
        $data = array(
            'links' => array(
                array(
                    'link' => array(
                        'href' => 'localhost:8888/api/users',
                        'rel' => 'user'
                    )
                ),
                array(
                    'link' => array(
                        'href' => 'localhost:8888/api/users',
                        'rel' => 'user'
                    )
                )
            )
        );
        $xml = q::z()->arrayToSimpleXml($data);
        echo $xml->asXML();
    ?>
</textarea>
