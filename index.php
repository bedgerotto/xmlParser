<?php
    $file = "user.xml";
    $xml = simplexml_load_file($file);
    if (!empty($_POST)) {
        $xml->id = $_POST['id'];
        $xml->firstName = $_POST['firstName'];
        $xml->lastName = $_POST['lastName'];
        $xml->email = $_POST['email'];
        $xml->password = $_POST['password'];
        $xml->asXML($file);
    }
    $xmlToJson =  json_encode($xml);
?>
<html>
    <body>
        <h1>Form JSON to XML</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="id" id="id">
            <input type="text" name="firstName" id="firstName">
            <input type="text" name="lastName" id="lastName">
            <input type="text" name="email" id="email">
            <input type="password" name="password" id="password">
            <input type="submit" value="Salvar">
        </form>
        <label for="xml">XML</label>
        <textarea name="" id="xml" cols="150" rows="10"><?php echo $xml->asXML() ?></textarea>
        <br/><br/><br/>
        <label for="json">JSON</label>
        <textarea name="" id="json" cols="150" rows="10"><?php echo $xmlToJson ?></textarea>
    </body>
</html>
<script>
    var xmlToJson = JSON.parse('<?php echo $xmlToJson ?>');
    document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('id').value = xmlToJson.id;
    document.getElementById('firstName').value = xmlToJson.firstName;
    document.getElementById('lastName').value = xmlToJson.lastName;
    document.getElementById('email').value = xmlToJson.email;
    document.getElementById('password').value = xmlToJson.password;
    });
</script>
