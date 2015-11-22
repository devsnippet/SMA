<textarea rows="10" cols="50">
    <?php
		echo q::z()->arrayToSimpleXml(q::apiRoute()->get('')) -> asXML();
    ?>
</textarea>