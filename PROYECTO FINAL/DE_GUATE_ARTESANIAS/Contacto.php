<?php
include './Header.php';

function Contacto() {
    ?>

    <!-- content-section-starts -->
    <div class="contact-down">
        <div class="container">
            <div class="contact-right">
                <div class="col-md-6 contact-left">
                    <h5>CONTACTO</h5>
                    <p><?php echo $GLOBALS['Empresa']->strDescripcion; ?></p>
                    <address>
                        <strong><?php echo $GLOBALS['Empresa']->strDireccion; ?></strong><br>
                        Telefono: +502 <?php echo $GLOBALS['Empresa']->intTelefono; ?><br>
                        E-mail: <a href="mailto:<?php echo $GLOBALS['Empresa']->strCorreo; ?>"><?php echo $GLOBALS['Empresa']->strCorreo; ?><script cf-hash="f9e31" type="text/javascript">
                            /* <![CDATA[ */!function () {
                                try {
                                    var t = "currentScript"in document ? document.currentScript : function () {
                                        for (var t = document.getElementsByTagName("script"), e = t.length; e--; )
                                            if (t[e].getAttribute("cf-hash"))
                                                return t[e]
                                    }();
                                    if (t && t.previousSibling) {
                                        var e, r, n, i, c = t.previousSibling, a = c.getAttribute("data-cfemail");
                                        if (a) {
                                            for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2)
                                                i = parseInt(a.substr(n, 2), 16) ^ r, e += String.fromCharCode(i);
                                            e = document.createTextNode(e), c.parentNode.replaceChild(e, c)
                                        }
                                    }
                                } catch (u) {
                                }
                            }();/* ]]> */</script></a><br>
                    </address>
                </div>
                <div class="col-md-6 contact-info">
                    <form action="./INCLUDES/EnviarCorreo.php" method="POST">
                        <input type="text" name="Nombre" value="Nombre" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'NOMBRE';
                                    }">
                        <input type="text" name="Telefono" value="Telefono" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'TELEFONO';
                                    }">
                        <input type="text" name="Correo" value="Correo" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'CORREO';
                                    }">
                        <input type="text" name="Asunto" value="Asunto" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'ASUNTO';
                                    }">
                        <textarea cols="70" rows="5" name="Mensaje" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'MENSAJE';
                                    }" >MENSAJE </textarea>
                        <div class="clearfix"> </div>
                        <input type="hidden" name="Para" value="<?php echo $GLOBALS['Empresa']->strCorreo ?>">
                        <input type="submit"value="Enviar" />
                        <div class="clearfix"> </div>
                    </form>					
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>		


    <?php
}

head();
Contacto();
footer();
?>
