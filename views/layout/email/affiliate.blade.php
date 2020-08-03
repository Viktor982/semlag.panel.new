<html>
<head></head>
<style type="text/css">
    .button {
        display: block;
        color: #fff;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 14px;
        text-align: center;
        text-decoration: none;
        border-style: solid;
        border-width: 1px;
        border-color: rgb(146, 237, 62);
        border-radius: 5px;
        background-color: rgb(9, 49, 0);
        width: 240px;
        height: 50px;
        line-height: 50px;
    }
</style>
<body bgcolor="#161616" background="bg.png">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><img src="https://nptunnel.com/static/emails/new-affiliate-system/header.jpg" width="600" height="90" alt="" style="display:block"></td>
    </tr>
    <tr style="background:url(https://nptunnel.com/static/emails/new-affiliate-system/bg1.jpg); background-repeat:no-repeat; background-color:#0c0c0c">
        <td height="240" align="center" valign="middle">
            <table width="580" height="253" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td height="3" colspan="2" style="text-align:center; font-weight:normal; font-family:Helvetica,Arial,sans-serif; font-size:15px; color:#92ed3e; padding:15px">{{ $translate['title'] }}</td>
                </tr>
                <tr>
                    <td height="1" colspan="2" bgcolor="#444444"></td>
                </tr>
                <tr>
                    <td width="128" height="205"><img src="https://nptunnel.com/static/emails/new-affiliate-system/img-personagem.png" width="128" height="174" alt=""></td>
                    <td width="449" style="text-align:inherit; font-weight:normal; font-family:Helvetica,Arial,sans-serif; font-size:14px; color:#747474; padding:15px"><p><b>{{ $message }}</b></p>
                        <div style="text-align:center; font-weight:normal; font-family:Helvetica,Arial,sans-serif; font-size:12px; color:#747474; padding:15px">
                            <p align="center"><a class="button" href="{{ $translate['url'] }}" style="display: block;color: #fff;font-family: Helvetica, Arial, sans-serif;font-weight: 700;font-size: 14px;text-align: center;text-decoration: none;border-style: solid;border-width: 1px;border-color: rgb(146, 237, 62);border-radius: 5px;background-color: rgb(9, 49, 0);width: 240px;height: 50px;line-height: 50px;">{{ $translate['button'] }}</a></p>
                        </div></td>
                </tr>
                </tbody>
            </table>
            <br></td></tr>
    <tr>
        <td><img src="https://nptunnel.com/static/emails/new-affiliate-system/footer.jpg" width="600" height="150" alt=""></td>
    </tr>
    <tr>
        <td style="text-align:center; font-weight:normal; font-family:Helvetica,Arial,sans-serif; font-size:12px; color:#747474; padding:15px">{{ $translate['footer_message'] }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>