<div style="background:#fff;border:1px solid #ccc;border-radius:5px;padding:20px">
    <table style="width:100%;border-collapse:collapse">
        <tbody>
            <tr>
                <td style="font:14px/1.4285714 Arial,sans-serif;padding:0">
                    <p>Hej <?php echo $POST['name']; ?></p>

                    <p style="margin-bottom:0;margin-top:0">
                        Du er blevet oprettet i NoDep.
                    </p>
                    <p style="margin-bottom:0">
                        Klik på linket herunder for at bekræfte oprettelsen:
                    </p>
                </td>
            </tr>
            <tr>
                <td style="font:14px/1.4285714 Arial,sans-serif;padding:15px 0 0">
                    <table style="width:auto;border-collapse:collapse">
                        <tbody>
                            <tr>
                                <td style="font:14px/1.4285714 Arial,sans-serif;padding:0">
                                    <div>
                                        <table style="width:auto;border-collapse:collapse; border:1px solid #486582;border-radius:3px;background:#3068a2">
                                            <tbody>
                                                <tr>
                                                    <td style="font:14px/1.4285714 Arial,sans-serif;padding:4px 10px">

                                                        <a target="_blank"
                                                           style="color:white;text-decoration:none;font-weight:bold"
                                                           href="<?php echo $ROOT.'/user/confirm/'.$token.'/'.base64_encode($POST['email']).'/'.base64_encode($POST['password']); ?>">Bekræft</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font:14px/1.4285714 Arial,sans-serif;padding:0">
                    <br>Brugernavn og adgangskode er sendt til dig i e-Boks. 
                    <br>
                    <br>Du vil ikke være i stand til at logge ind, før du har bekræftet oprettelsen. 
                </td>
            </tr>
            <tr>
                <td style="font:14px/1.4285714 Arial,sans-serif;padding:0">
                    <p>Efter du har bekræftet, skal du for fremtiden anvende følgende link til at logge på programmet: <?php echo $ROOT; ?> 
                        <br><br>Med venlig hilsen,
                        <br>NoDep</p></td>
            </tr>
        </tbody>
    </table>
</div>
