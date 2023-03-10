<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HOLASHIP CONTRACT</title>
    <meta name="author" content="MTC User" />
    <style>
        body {
            font-family: DejaVu Sans !important;
        }

        body {
            margin-top: 3cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        @page {
            margin: 0cm 0cm;
        }
    </style>
</head>
<?php
$representative = ($dataAccount->contractType == 1)  ? $dataAccount->representativePerson : $dataAccount->representative;
$words = explode(" ", $representative);
$acronym = "";

foreach ($words as $w) {
    $acronym .= $w[0];
}

$companyName = ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company;
$position = ($dataAccount->contractType == 2)  ? $dataAccount->businessPosition : $dataAccount->personPosition;
$address = ($dataAccount->contractType == 2)  ? $dataAccount->addressByBR : $dataAccount->addressByID;
$dob = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personDob;
$cid = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personId;
$cidDate = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdDate;
$cidPlace = ($dataAccount->contractType == 2)  ? '' : $dataAccount->personIdAddress;
$phone = ($dataAccount->contractType == 2)  ? $dataAccount->bsPhone : $dataUser->phoneOTP;
$tax = ($dataAccount->contractType == 2)  ? $dataAccount->bsTax : '';
?>

<?php
$ImageLogo = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAI0AAAAtCAYAAACTQuhLAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAApeSURBVHgB7VxddtvGFb4DUCTVk9TkqeXUx24NrcD0CkytwPLpS6xYMbUCMU+u2gdRD62TvlhagajIlvPSY3kFZldgZQVC2rhu5fSQeopEkTP97gCgSAoAAUokIxvfOSSBATB3yPlw5/6Bgi4xDp/PLCsSFRKUE0JV5dHJWn6pYVOCkSJFlxT17atFJcS6EFSVbfk9GcayyExZODRHCUaKS0saMsQ83htXHhws8W792VUShvGUhgATUJjGMpHKKUVb+S/eVylBIAy6rBAih/dG136DhsDhi2urIMxrJozTjdisP58pUYJAXF7SXACYMNAsFbzWcgvv5/gF8tSw5D2iBIH4aEnTTZj8FweV0yPDaayPCZfXppFyD8bvvfpmzsJeA8vKPXzaUS4NIozbPo/XEiUIxERJgwnPweN5SUoU4DbbSqmNyEboSatKmTQ8pvS+16SI7g+6jO2VEMK47YkhHAZBE8Thi5lNJcU8JnsDI7EwmEeqLefyiz/VovZR3/7NPDROjponu4jRDFxaGjszr/nTsV+8cQQtVQl+cWjsXFP1nc/Knf3n1+r1nZl1GiEg86VHHAYTRo/j+bUKJYiEydo0ihqGKW/xpmubAIZNI4Rqt7eEab5k8uh9x4ZJNEwMTNR7UkquYXkq850v0uk3WKIaCJTs0giRX/zfLmynJTcuYyEN8VVCmHgQTxZ/LJ1pVcpeefa72qCL/7bwY6FtUqG//dg82a1UZyO5rmyYgrl3paBDEuZ6/sF/7CjXPXn4ryIIZvW3r2zfrNIlQ08wMaJtFtofItxkGrn8wsFIbsCUILF5plWIKt5rgy5uG2pekLHa3/5JM8M2Q6Qv7noqVYoNUcLY/YJwVbpk4Ci0t5359TR+u+FJ4xn1vI0leC+3cHCHLhgfdUT4Q4SSVO7aLUCLFeiCkZDmQ4PoC3Aa5oVHuBPSfGBQwrjP+TNs2trIj2gjxsHlTSMk8IVLkpHWFE2cNE8+37e87ZXvZm0aAyrz+7lMlnQpxPERNSq7sxeuwj9kTIQ07C4LYa4KUgWkEHJe+9eLb6FeaU8oVVMnJxsXTSI/udkptH/5dg9hhg1215+U3llCytf912JMG4+3b0aKVutAZSpldRparb1h3ei4fXE+D+cX3HNtr/y1px+fPrTBzCGMttTtYamcsZJGx3UMsSkEx3YUJxjPQCg+JgpiKl3+5st3lcffXl+jc4I1y/SnmU1InPeT68rcBHmWJbWXTCWs/j6kUrkwGTxZRja9rL0XQb3nmmnOedXgCiOQ+H6PIkDXPwtRwmYhVl8gjFNUhm9qpPm3q+j2TLrCuT29+atpi9163zGbjpkLd52C6q7HZgiDAI+kKd44hIkGRIwrmMg3ldJ+js6BzCfp1w5hwsHkMaV4STHBdzGy7W90fKSfMKe9Q8uJNxxHCevr6KiV5wg51z8TBf1W0foKHTOXuKbT+2FjVgqxsEx6v1+Or6bBElGAKq/QAEDV3yVffdGLJ5+/s0CAKg0BnshsO821v0PVuICsCHbJ6LEKRRbFBH5YvrMtd9dWUiJrL2pQTzlOVyDXxT+6HgNPEibsH0HqXxj0FBNQdAdTU1K90qWs0HTCMPB7U4f8uq+dzw7zC/+NleQ9Opb3oY2cemrk/5RQW1iWak4BGsZsmgja0l3vO7EcEIeuPDjQWt+XNFpdCyPCDz2YMLq/qbM2Qh9sDDLXbd/0ofTXh/989adnv48VFnfJWqHzyQ6FLs3oJsxx846PzbELm2Ed2mGZd4QpmEQ13w4dwtiqLZd8iLVef/FbSyjZISnss1Voumocmwn22SoXxeA7b1GzWfYdryOHiaVJ2k32kS9Pbm7L8juGCd04Mpv5P27fmH28fSMvVZuLqGy/cw2RWqaYEKlWOehYv2zsz1HEyr/egZmdmwtL4KvAyWueVLpGFnpDItYSWFPELjUfZw3hNuUokylRHDjL0S5yU6Wg8bIcpCC8mI9zmUP20ds0yA/dCzhURVK03J3YZE2iTGNO+OatVPEvMKQpBhRpdX62HYTpl80JWpZNsYmjbG8L474ddBZPDheYua/ACkN+jmtQQE4Th7CkdC5SRYoJEO+raOeZXWaBKP789+u3xkAaKvq1K7Pp6xWtVK/bmNQtv2PIrhYpjuwgozvVWg+SLaTaoDhAVrpLYvHwu5mnp7VBvWDt4b2CupOKXlE0dDwnmBO3KQaiENODc96ptmF7aKSkYa8nwFawV6rBMRh4Dr5uqRTKoojgeIt/56oWJltOmbHsJq1BFHVuAK4PYo+Di7y45CGIQIFQp5orFM2TSK67H2IQUwPf73tv2xDqdlCc5pU6aZZpEFKpshBGoK2RoSwIIykuoGka8MzOtEPWFfoFgou4QBAbhi6v+ZbbPI/9ecRHdIkC7u5dedTcGvSseTabqlMUZLMNTmkPhajEPEUPQYNIU48SjYVbHmqxH9NRI0tpiguQIyBuIA/pnICNFeolyWY7Z5rx6+29uiDtTfW5rEABd2sBGohd14rnul4eCKt7b7TLEwxNf6OWrLCAHSbW14A1lLApItg+Ceg8VLZhRg8++oHLSdkrgecxq5S6g5gNG5y2d9yNrQzW4qOEMIpxTjcMdcvblpJ+GLkhjPS879o73c74RjM5toKPkt+xlhpcTdgHm86Mh3JBsjndAMIOHWXtB4f58w9/WtcEcsij4cZWzhXlPg8EyXtxzledYKO+eG/03pOUvkYXXEbOLfVMkE4oBgcC7T/v3Ixl/AV5YZ5sJklHNsjK6QaieBHh+rOrZX78xXkFV8kxeejUNshRWv8tyoQgirqOOALc+mXL3bW57njkCcufp06q0+30qp8XxdHabxbflrU2Ys8oJISPiY5vB6RSVYTHfTUHy85+mq58vfjvmiNbWjQEukP7SAGwoT60VzNOII2wCW03F2aY65yaONW8/Dcs/DlyTcN2jVTBwSyHTAhOhRAGS8buME8ZaLsGgbzws8JlDwICdZ3+2d0OslfcpJ+nieyo2e4RwcaLk6yvg/5WhbPs+rGiLi2DlIOOb42lNIKjrVh61uAVxbYXwO69o9Tx0A/kH6ValYxM33XKHyLBphhLFAfq6jszW96TEbBXnsLFXhaG2pVtcWiY6grIVFRd8mEgT9R7QjR4CXmlTWLiCLGJ8fK8cB0TkpfwLhUVVW/mW6cuvJTD2EojQJwKlhiefDvqNRzuP04156I+Q+UHfa1h3OfirkHnMkGVKWMTNL/wvtQd4CN+CI+DfIJW+ZM8DcMZZf1w3mT/YCCbFvucWNUJSwcWXvNu/c58b6kEMu1MmK4I8lgLy3mJ4fwOkwd3m+8ksovOZOEEYn9+aGi5WKZWvr1xJ0iuK3ONCQrla9MQ4AAfftxZyNjQYXcvoeh87jGplGHciVvGMCqw1uDQgDNmTZ49PVZnvDa0TpXzZPxHCf0ph/hRrAsEx0syrdTpstFq2eOoE+6ROyaZk0Z951q1U7mXMa3pP7z7gYbEREmTYHy4SNIkzz0liI2ENAliIyFNgthISJMgNhLSJIiN/wPb3BUklU69KQAAAABJRU5ErkJggg==';
$pathSign = './public/images/pgdsign.png';
$typeSign = pathinfo($pathSign, PATHINFO_EXTENSION);
$dataSign = file_get_contents($pathSign);
$pgdsign = 'data:image/' . $typeSign . ';base64,' . base64_encode($dataSign);

$imediaLogoPath = './public/images/imediaLogo.png';
$typeLogo = pathinfo($imediaLogoPath, PATHINFO_EXTENSION);
$dataLogo = file_get_contents($imediaLogoPath);
$imediaLogo = 'data:image/' . $typeLogo . ';base64,' . base64_encode($dataLogo);
?>

<body>

    <header>
        <div>
            <img style="position: fixed; text-align: left; display: inline-block;margin-top:0.5cm; margin-left:2cm" src="<?php echo $imediaLogo; ?>" width="10%" />
            <p style="text-align: center; color: #aaa8a8; text-align: center;border-bottom: 1px solid #aaa8a8;margin: 0 auto;margin-bottom: 10px;width: 55%; padding-bottom:10px;">
                <strong style="font-size:13px;">C&Ocirc;NG TY C??? PH???N C&Ocirc;NG NGH??? V&Agrave; D???CH V??? IMEDIA</strong>
                <br />
                <span style="font-size:10px;">
                    ?????a ch???: T???ng 18, T&ograve;a nh&agrave; Peakview Tower, S??? 36 Ho&agrave;ng C???u, Ph?????ng &Ocirc; Ch???
                    D???a,&nbsp;<br />Qu???n ?????ng ??a, Th&agrave;nh ph??? H&agrave; N???i&nbsp;<br />??i???n tho???i: +84 02462958884
            </p>
            </span>
        </div>
    </header>
    <main>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:18px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>H???P ?????NG H???P T&Aacute;C D???CH V??? V???N
                    CHUY???N </span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>S???: <?= date("dm"); ?>/<?= date('Y') ?>/H??HT/FINTECH/IMEDIA
                        &ndash;</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]</em></strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em></strong>
        </p>
        <ul style="list-style-type: undefined;margin-left:0cmundefined;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>C??n c??? B??? lu???t D&acirc;n s??? 2015 v&agrave; c&aacute;c v??n
                        b???n h?????ng d???n thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>C??n c??? Lu???t Th????ng m???i 2005 v&agrave; c&aacute;c v??n b???n
                        h?????ng d???n thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>C??n c??? Lu???t Vi???n th&ocirc;ng 2009 v&agrave; c&aacute;c
                        v??n b???n h?????ng d???n thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>C??n c??? kh??? n??ng, nhu c???u h???p t&aacute;c v&agrave;
                        ph&aacute;t tri???n d???ch v??? thanh to&aacute;n c???a hai B&ecirc;n.</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&ocirc;m nay, ng&agrave;y <?= date('d') ?> th??ng <?= date('m') ?> n??m <?= date('Y') ?>, t???i H&agrave; N???i, ch&uacute;ng t&ocirc;i g???m:</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-85.85pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;B&ecirc;n A</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>: <strong>C&Ocirc;NG TY C??? PH???N C&Ocirc;NG NGH???
                    V&Agrave; D???CH V??? IMEDIA</strong> </span>
        </p>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>?????i di???n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: B&agrave; <strong>NGUY???N THU TH&Ugrave;Y</strong>&nbsp; &nbsp; &nbsp; &nbsp;Ch???c v???: <strong>Ph&oacute;
                    Gi&aacute;m ?????c</strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo Gi???y ???y Quy???n s???: 05-2020/UQ-IMD, ng&agrave;y 01
                th&aacute;ng 03 n??m 2020 c???a Gi&aacute;m ?????c.</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>?????a ch???&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;: T???ng 18, T&ograve;a nh&agrave; Peakview, S??? 36 Ho&agrave;ng C???u, P &Ocirc; Ch??? D???a, Q ?????ng ??a,
                H&agrave; N???i</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>??i???n tho???i&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;:
                0246.295.8884&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;Fax:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>T&agrave;i kho???n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: 0541 000 305 199&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&acirc;n
                H&agrave;ng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: VietcomBank &ndash; Ch????ng D????ng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>M&atilde; s??? DN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: 0105837941</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Sau ??&acirc;y g???i t???t l&agrave; B&ecirc;n A ho???c
                <strong>IMD</strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>B&ecirc;n B</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>: <strong>[<?= $acronym; ?>] &ndash; [<?= $companyName; ?>]</strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>?????i di???n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ??ng/B??&nbsp;<?= ($representative) ? '<strong>' . $representative . ' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.............'; ?>
                Ch???c v???: <?= ($position) ? '<strong>' . $position . ' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>?????a ch???&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($address) ? $address : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?>
            </span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y/th&aacute;ng/n??m sinh:
                <?= ($dob) ? $dob : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>CMT/CCCD s???&nbsp; &nbsp;:
                <?= ($cid) ? $cid : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?>
                - C???p
                ng??y: <?= ($cidDate) ? $cidDate : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&ndash;' ?>
                CA: <?= ($cidPlace) ? $cidPlace : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...' ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>??i???n tho???i&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($phone) ? $phone : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>M&atilde; s??? thu???&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($tax) ? $tax : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>T&agrave;i kho???n Ng&acirc;n h&agrave;ng s???:
                <?= ($listBanks->bankAccount) ? $listBanks->bankAccount : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>M??? t???i ng&acirc;n h&agrave;ng:
                <?= ($listBanks->bankShortName) ? $listBanks->bankShortName : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?> Chi
                nh&aacute;nh:
                &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-9.35pt;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;Sau ??&acirc;y g???i t???t l&agrave;
                B&ecirc;n B ho???c <strong>KH</strong></span>
        </p>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Sau khi th???a thu???n, hai B&ecirc;n c&ugrave;ng nhau
                th???ng nh???t k&yacute; k???t H???p ?????ng h???p t&aacute;c d???ch v??? v???n chuy???n v???i nh???ng ??i???u kho???n v&agrave; ??i???u ki???n nh??
                sau:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <h2 style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:17px;font-family:"Cambria",serif;color:#365F91;font-weight:normal;'>
            <strong><u><span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>??I???U 1:
                        C&Aacute;C ?????NH NGH??A:</span></u></strong>
        </h2>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Tr??? khi ng??? c???nh c???a H???p ?????ng n&agrave;y quy ?????nh
                kh&aacute;c, c&aacute;c t??? v&agrave; thu???t ng??? sau ??&acirc;y t???i H???p ?????ng n&agrave;y s??? c&oacute; ngh??a nh??
                sau:</span>
        </p>
        <ul class="" style="list-style-type:none">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1&nbsp;</strong> &ldquo;<strong>H???p ?????ng</strong>&rdquo; c&oacute;
                    ngh??a l&agrave; H???p ?????ng h???p t&aacute;c D???ch v??? v???n chuy???n n&agrave;y, c&aacute;c Ph??? l???c ??&iacute;nh
                    k&egrave;m H???p ?????ng c&ugrave;ng v???i t???t c??? c&aacute;c t&agrave;i li???u li&ecirc;n quan v&agrave; ??i
                    k&egrave;m kh&aacute;c, c&oacute; th??? ???????c s???a ?????i t???i t???ng th???i ??i???m v&agrave; ???????c c&aacute;c b&ecirc;n
                    k&yacute; k???t b???ng v??n b???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2&nbsp;</strong> &ldquo;<strong>B&ecirc;n</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; IMD ho???c KH v&agrave; nh???ng ng?????i k??? th???a v&agrave;/ho???c nh???ng ng?????i ???????c chuy???n
                    nh?????ng h???p ph&aacute;p c???a h??? v&agrave; &ldquo;<strong>C&aacute;c B&ecirc;n</strong>&rdquo; c&oacute; ngh??a
                    l&agrave; m???i v&agrave; t???t c??? c&aacute;c B&ecirc;n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3&nbsp;</strong> &ldquo;<strong>D???ch v???</strong>&rdquo; c&oacute;
                    ngh??a l&agrave; d???ch v??? li&ecirc;n quan vi???c giao nh???n B??u g???i, bao g???m: ch???p nh???n, v???n chuy???n v&agrave;
                    ph&aacute;t B??u g???i b???ng c&aacute;c ph????ng th???c t??? ?????a ??i???m c???a KH ?????n ?????a ??i???m c???a ng?????i nh???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4&nbsp;</strong> &ldquo;<strong>Ng?????i g???i</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; t??? ch???c, c&aacute; nh&acirc;n c&oacute; ????? xu???t g???i B??u g???i v&agrave; ???????c
                    ch&iacute;nh KH ch??? ?????nh.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5&nbsp;</strong> &ldquo;<strong>Ng?????i nh???n</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; t??? ch???c, c&aacute; nh&acirc;n c&oacute; t&ecirc;n t???i ph???n ghi th&ocirc;ng tin v???
                    ng?????i nh???n tr&ecirc;n B??u g???i/Phi???u g???i/????n h&agrave;ng ho???c c&aacute; nh&acirc;n ???????c Ng?????i nh???n ???y quy???n
                    nh???n B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.6&nbsp;</strong> &ldquo;<strong>B??u&nbsp;</strong>g???i&rdquo;
                    c&oacute; ngh??a l&agrave; th??, g&oacute;i, ki???n h&agrave;ng h&oacute;a ???????c ch???p nh???n, v???n chuy???n</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.7&nbsp;</strong> &ldquo;C?????c<strong>&nbsp;ph&iacute; D???ch
                        v???</strong>&rdquo; c&oacute; ngh??a l&agrave; chi ph&iacute; d???ch v??? ???????c t&iacute;nh tr&ecirc;n t???ng ????n
                    h&agrave;ng m&agrave; IMD ??&atilde; th???c hi???n cung c???p D???ch v??? cho KH d???a tr&ecirc;n B???ng C?????c ph&iacute;
                    D???ch v??? c???a IMD cung c???p.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.8&nbsp;</strong> &ldquo;Ph???m<strong>&nbsp;vi Cung ???ng D???ch
                        v???</strong>&rdquo; c&oacute; ngh??a l&agrave; khu v???c m&agrave; IMD th???c hi???n ch???p nh???n, v???n chuy???n
                    v&agrave; ph&aacute;t B??u g???i t??? n??i KH ch??? ?????nh ?????n ?????a ch??? Ng?????i nh???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.9&nbsp;</strong> &ldquo;<strong>Phi???u g???i</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; m???u phi???u c&oacute; th??? hi???n Logo c???a IMD, m&atilde; s??? B??u g???i, lo???i B??u g???i,
                    th???i gian g???i, th???i gian nh???n B??u g???i, th&ocirc;ng tin v??? t&ecirc;n, ?????a ch???, ??i???n tho???i c???a Ng?????i g???i,
                    Ng?????i nh???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.10&nbsp;</strong> &ldquo;<strong>H??? th???ng</strong>&rdquo; c&oacute;
                    ngh??a l&agrave; ph???n m???m ho???c website m&agrave; IMD c???p cho KH v??? vi???c qu???n l&yacute; ????n h&agrave;ng
                    v&agrave; quy tr&igrave;nh giao h&agrave;ng c???a IMD nh?? t???o ????n h&agrave;ng, theo d&otilde;i ti???n
                    tr&igrave;nh th???c hi???n D???ch v???, ?????i so&aacute;t s??? li???u, th&ocirc;ng tin B??u g???i v&agrave; c&aacute;c
                    c&ocirc;ng n??? t???n ?????ng...</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.11&nbsp;</strong> &ldquo;<strong>????n h&agrave;ng</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; ????n y&ecirc;u c???u th???c hi???n D???ch v??? ???????c KH thi???t l???p qua H??? th???ng ho???c ???????c vi???t
                    tay d?????i d???ng Phi???u g???i c&oacute; ?????y ????? th&ocirc;ng tin v??? B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.12&nbsp;</strong> &ldquo;<strong>Th&ocirc;ng tin Ng?????i
                        nh???n</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin li&ecirc;n quan ?????n t&ecirc;n, ??i???n tho???i, ?????a
                    ch??? Ng?????i nh???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.13&nbsp;</strong> &ldquo;<strong>Th???i gian To&agrave;n
                        tr&igrave;nh</strong>&rdquo; c???a B??u g???i l&agrave; kho???ng th???i gian ???????c t&iacute;nh t??? khi B??u g???i ???????c
                    ch???p nh???n (IMD ?????n nh???n B??u g???i) cho ?????n khi B??u g???i ???????c ph&aacute;t cho Ng?????i nh???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.14&nbsp;</strong> &nbsp;&ldquo;<strong>Ph??? ph&iacute; Gia
                        t??ng</strong>&rdquo; l&agrave; ph&iacute; c&aacute;c d???ch v??? m&agrave; IMD th???c hi???n th&ecirc;m theo
                    y&ecirc;u c???u c???a KH (n???u c&oacute;).</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.15&nbsp;</strong> &ldquo;<strong>COD</strong>&rdquo; l&agrave; vi???c
                    IMD th???c hi???n cung ???ng D???ch v??? v&agrave; thay KH thu ti???n t??? Ng?????i nh???n theo ???y quy???n c???a KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.16&nbsp;</strong> &ldquo;<strong>?????i so&aacute;t D???ch
                        v???</strong>&rdquo; c&oacute; ngh??a l&agrave; vi???c C&aacute;c B&ecirc;n th???c hi???n vi???c ?????i chi???u
                    c&aacute;c ????n h&agrave;ng IMD ??&atilde; th???c hi???n th&agrave;nh c&ocirc;ng ho???c kh&ocirc;ng th&agrave;nh
                    c&ocirc;ng, chi ph&iacute; th???c hi???n D???ch v??? (bao g???m d???ch v??? giao nh???n B??u g???i v&agrave; c&aacute;c Ph???
                    ph&iacute; Gia t??ng (n???u c&oacute;)).&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.17&nbsp;</strong> &ldquo;<strong>Th&ocirc;ng tin B???o
                        m???t</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin li&ecirc;n quan ?????n vi???c th???c hi???n H???p ?????ng
                    n&agrave;y, ngo???i tr??? c&aacute;c th&ocirc;ng tin v??? t&ecirc;n, ?????a ch???, c&aacute;c ho???t ?????ng kinh doanh ???????c
                    ph&eacute;p c???a m???i B&ecirc;n v&agrave; c&aacute;c n???i dung kh&aacute;c ??&atilde; ???????c c&ocirc;ng b???
                    tr&ecirc;n c&aacute;c trang website ch&iacute;nh th???c ho???c c&oacute; th??? ???????c c&ocirc;ng ch&uacute;ng ti???p
                    c???n v&igrave; b???t k??? l&yacute; do n&agrave;o ngo???i tr??? vi???c vi ph???m H???p ?????ng n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.18&nbsp;</strong> &nbsp;&ldquo;<strong>S??? ki???n B???t kh???
                        kh&aacute;ng</strong>&rdquo; l&agrave; b???t k??? s??? c???n tr???, ch???m tr??? ho???c ng???ng ho???t ?????ng n&agrave;o x???y
                    ra do b&atilde;i c&ocirc;ng, <strong>??&oacute;ng</strong> c???a, tranh ch???p lao ?????ng, thi&ecirc;n tai, chi???n
                    tranh, b???o ?????ng trong d&acirc;n ch&uacute;ng, h???a ho???n hay c&aacute;c s??? c???/tai h???a kh&aacute;c; nh???ng thay
                    ?????i trong ch&iacute;nh s&aacute;ch c???a Ch&iacute;nh ph??? m&agrave; v?????t qu&aacute; kh??? n??ng ki???m so&aacute;t
                    h???p l&yacute; c???a m???t B&ecirc;n khi???n cho B&ecirc;n ??&oacute; kh&ocirc;ng th??? th???c hi???n c&aacute;c ngh??a v???
                    ???????c quy ?????nh t???i H???p ?????ng n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.19&nbsp;</strong> &ldquo;<strong>C?? quan c&oacute; th???m
                        quy???n</strong>&rdquo; c&oacute; ngh??a l&agrave; m???t ho???c/v&agrave; c&aacute;c c?? quan tr???c thu???c h???
                    th???ng Nh&agrave; n?????c Vi???t Nam, b???t k??? b???, s???, ban, ng&agrave;nh ho???c c?? quan c&oacute; th???m quy???n
                    n&agrave;o tr???c ti???p ho???c gi&aacute;n ti???p thu???c quy???n qu???n l&yacute; c???a Nh&agrave; n?????c Vi???t Nam.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.20&nbsp;</strong> &ldquo;<strong>Lu???t B??u
                        ch&iacute;nh</strong>&rdquo; c&oacute; ngh??a l&agrave; l&agrave; Lu???t B??u ch&iacute;nh do Qu???c h???i ban
                    h&agrave;nh ??ang ???????c &aacute;p d???ng t???i th???i ??i???m hi???n t???i v&agrave; t???t c??? c&aacute;c v??n b???n quy ph???m
                    ph&aacute;p lu???t, ngh??? ?????nh, quy???t ?????nh, th&ocirc;ng t??, c&ocirc;ng v??n, quy ch???, ch??? th???, l???nh, hi???p ?????nh,
                    quy ?????nh ho???c th&ocirc;ng b&aacute;o n&agrave;o (nh?? ???????c s???a ?????i t???i t???ng th???i ??i???m) ho???c b???t k??? di???n gi???i
                    c&oacute; li&ecirc;n quan ??i???u ch???nh c&aacute;c quy ?????nh c???a Lu???t B??u ch&iacute;nh..</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.21&nbsp;</strong> &ldquo;<strong>Lu???t Vi???t Nam</strong>&rdquo;
                    c&oacute; ngh??a l&agrave; b???t k??? v??n b???n quy ph???m ph&aacute;p lu???t, ph&aacute;p l???nh, ngh??? ?????nh, quy???t ?????nh,
                    th&ocirc;ng t??, c&ocirc;ng v??n, quy ch???, ?????o lu???t, ch??? th???, l???nh, hi???p ?????nh, quy ?????nh ho???c th&ocirc;ng
                    b&aacute;o n&agrave;o (nh?? ???????c s???a ?????i t???i t???ng th???i ??i???m) ho???c b???t k??? di???n gi???i n&agrave;o ?????i v???i
                    c&aacute;c v??n b???n ??&oacute; do b???t k??? C?? quan Nh&agrave; n?????c n&agrave;o c&ocirc;ng b???, ban h&agrave;nh
                    ho???c th&ocirc;ng qua.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.22&nbsp;</strong> &ldquo;<strong>Vi???t Nam</strong>&rdquo;
                    l&agrave; n?????c C???ng h&ograve;a X&atilde; h???i Ch??? ngh??a Vi???t Nam.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 2. N???I DUNG D???CH
                        V???</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong>2.1&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Di??ch vu?? giao nh&acirc;??n B??u
                        g???i:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Theo tho??a thu&acirc;??n, KH
                    ??&ocirc;??ng y?? chi?? ??i??nh IMD va?? IMD ??&ocirc;??ng y?? cung ????ng Di??ch vu?? <strong>chuy???n</strong> ph&aacute;t
                    B??u g???i li&ecirc;n quan ?????n vi???c giao nh&acirc;??n B??u g????i g???m: ch???p nh???n, v???n chuy???n v&agrave; ph&aacute;t
                    B??u g???i b???ng c&aacute;c ph????ng th???c t??? ?????a ??i???m c???a KH ?????n ?????a ??i???m c???a Ng?????i nh???n trong Pha??m vi Cung ????ng
                    Di??ch vu?? hi&ecirc;??n ha??nh cu??a IMD.&nbsp;</span></li>
            <li><strong>2.2&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Pha??m vi Cung ????ng Di??ch
                        vu??:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>IMD th???c hi???n vi???c cung ???ng
                    D???ch v??? cho KH trong Ph???m vi Cung ???ng D???ch v??? ????????c quy ?????nh b???i t???ng nh&agrave; v???n chuy???n.</span></li>
            <li><strong>2.3&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>??i&ecirc;??u chi??nh Pha??m vi Cung ????ng Di??ch
                        vu??:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Trong tr?????ng h???p c&oacute;
                    s??? ??i???u ch???nh v??? Ph???m vi Cung ???ng D???ch v???, IMD co?? tra??ch nhi&ecirc;??m th&ocirc;ng ba??o b????ng v??n ba??n cho
                    KH bi???t &iacute;t nh???t 15 (m?????i l??m) nga??y tr?????c ng&agrave;y thay ?????i. Sau th????i ??i&ecirc;??m n&agrave;y,
                    Ca??c b&ecirc;n se?? ti&ecirc;??p tu??c th????c hi&ecirc;??n H????p ??&ocirc;??ng na??y theo Pha??m vi Cung ????ng Di??ch
                    vu?? m????i.</span></li>
            <li><strong>2.4&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Di??ch vu?? Gia t??ng:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong tr?????ng h???p KH c&oacute; y&ecirc;u
                    c???u,<strong>&nbsp;</strong>IMD s??? cung ????ng th&ecirc;m m???t s??? Di??ch vu?? Gia t??ng theo Phu?? lu??c 02 ??i??nh
                    ke??m H????p ??&ocirc;??ng na??y.</span></li>
            <li><strong>2.5&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Ti&ecirc;??n tri??nh va?? th????i gian giao
                        nh&acirc;??n:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Ca??c b&ecirc;n
                    tho??a thu&acirc;??n ti???n tr&igrave;nh theo th????c t&ecirc;?? t????ng v&agrave;o t???ng th????i ??i&ecirc;??m v&agrave;
                    t???ng giai ??oa??n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 3. C?????C PH&Iacute; D???CH
                        V???&nbsp;</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong>3.1&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>C?????c ph&iacute; D???ch v???:</span></strong><span style='font-family:"DejaVu Sans",serif;culor:black;'>&nbsp;???????c th????c hi&ecirc;??n theo Ba??ng C?????c
                    ph&iacute; D???ch v??? hi&ecirc;??n ha??nh cu??a IMD, ???????c th??? hi???n ta??i Ph??? l???c
                    02<strong>&nbsp;</strong>??&iacute;nh k&egrave;m H???p ?????ng. C?????c ph&iacute; D???ch v??? n&agrave;y c&oacute; th???
                    thay ?????i t&ugrave;y thu???c v&agrave;o t???ng th???i ??i???m kh&aacute;c nhau.</span></li>
            <li><strong>3.2&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>??i&ecirc;??u chi??nh C??????c ph&iacute; D???ch
                        v???:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Trong tr?????ng h???p c&oacute;
                    s??? ??i???u ch???nh v??? C?????c ph&iacute; D???ch v???, IMD ph???i th&ocirc;ng b&aacute;o b???ng v??n b???n cho KH i??t
                    nh&acirc;??t 03 (ba) nga??y tr?????c nga??y ??i&ecirc;??u chi??nh.<strong>&nbsp;</strong>Sau th????i ??i&ecirc;??m
                    ??i&ecirc;??u chi??nh, Ca??c B&ecirc;n se?? ti&ecirc;??p tu??c th????c hi&ecirc;??n H????p ??&ocirc;??ng na??y theo Ba??ng
                    C??????c ph&iacute; D???ch v??? m????i do IMD th&ocirc;ng b&aacute;o.</span></li>
            <li><strong>3.3&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>??&ocirc;??i t??????ng chi??u C??????c ph&iacute; D???ch
                        v???:</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;KH la?? ??&ocirc;??i t??????ng
                    chi??u C??????c ph&iacute; D???ch v???. Tr??????ng h????p KH chi?? ??i??nh ??&ocirc;??i t??????ng chi??u C??????c ph&iacute; D???ch v???
                    la?? Ng??????i nh&acirc;??n thi?? IMD m????c ??i??nh ????????c thu C??????c ph&iacute; D???ch v??? c???a KH n&ecirc;??u Ng??????i
                    nh&acirc;??n t???? ch&ocirc;??i thanh toa??n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'><span style="text-decoration:none;">&nbsp;</span></span></u></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 4: QUY ??I??NH THANH
                        TO&Aacute;N</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>4.1&nbsp;Thanh to&aacute;n COD</span></strong><span style='font-family:"DejaVu Sans",serif;culor:black;'>: ?????i v???i D???ch v??? giao h&agrave;ng thu h??? ti???n,
                        IMD cho ph&eacute;p kh&aacute;ch h&agrave;ng ch??? ?????ng l???a ch???n v&agrave; thay ?????i linh ho???t m???t trong
                        c&aacute;c h&igrave;nh th???c ?????i so&aacute;t nh?? sau:</span>
                </li>
            </ul>
        </div>
        <ul style="list-style-type: none;margin-left:1cm;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? ?????i so&aacute;t<em>:</em> KH t??? ??i???n s??? ti???n
                    c???n r&uacute;t v??? t&agrave;i kho???n ng&acirc;n h&agrave;ng v&agrave;o b???t k??? kho???ng th???i gian n&agrave;o
                    trong ng&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????i so&aacute;t ?????nh k??? t??? ?????ng v&agrave;o th??? 2,
                    th??? 4, th??? 6 h&agrave;ng tu???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????i so&aacute;t ?????nh k??? t??? ?????ng v&agrave;o th??? 2
                    v&agrave; th??? 5 h&agrave;ng tu???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????i so&aacute;t ?????nh k??? v&agrave;o th??? 4
                    h&agrave;ng tu???n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng th???c t&iacute;nh:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>S??? ti???n th???c nh???n = S??? ti???n IMD thu h??? - T???ng
                    C?????c ph&iacute; D???ch v???</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>4.2&nbsp;Quy tr??nh, Th????i ha??n ??&ocirc;??i soa??t, Th???i h???n
                            thanh to&aacute;n v&agrave; chi???t kh???u C?????c ph&iacute; D???ch v???</span></strong>
                </li>
            </ul>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Trong 05 (n??m) ng&agrave;y l&agrave;m vi???c ?????u
                ti&ecirc;n c???a th&aacute;ng N+1, IMD s??? th???c hi???n ?????i so&aacute;t C?????c ph&iacute; D???ch v??? v&agrave; chi???t kh???u
                (<strong>n???u</strong> c&oacute;) trong th&aacute;ng N v&agrave; g???i cho KH th&ocirc;ng qua mail ho???c h&igrave;nh
                th???c kh&aacute;c do hai B&ecirc;n ??&atilde; th???ng nh???t. Trong v&ograve;ng 02 (hai) ng&agrave;y l&agrave;m vi???c
                ti???p theo k??? t??? ng&agrave;y nh???n ???????c ?????i so&aacute;t, KH c&oacute; tr&aacute;ch nhi???m ph???n h???i qua mail cho
                IMD. Sau khi nh???n ???????c ph???n h???i ho???c h???t th???i h???n m&agrave; KH kh&ocirc;ng ph???n h???i, IMD ch???t v&agrave; xu???t
                h&oacute;a ????n v&agrave;o ng&agrave;y 08 (t&aacute;m) th&aacute;ng N+1. Gi&aacute; tr??? tr&ecirc;n h&oacute;a ????n
                s??? l&agrave; C?????c ph&iacute; D???ch v??? trong th&aacute;ng sau khi tr??? chi???t kh???u (n???u c&oacute;).</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.35pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph????ng th????c thanh
                    toa??n:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD s??? th???c
                hi???n:</span>
        </p>
        <ul class="" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>C???ng ph???n ti???n chi???t kh???u cho B&ecirc;n B ???????c
                    h?????ng v&agrave;o t&agrave;i kho???n c???a B&ecirc;n B tr&ecirc;n h??? th???ng HolaShip do IMD x&acirc;y d???ng
                    v&agrave; qu???n l&yacute;;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>ho???c Chuy???n kho???n v&agrave;o t&agrave;i kho???n
                    ng&acirc;n h&agrave;ng c???a B&ecirc;n B.</span>
                <ul class="" style="list-style-type: none;">
                </ul>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.35pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>4.3&nbsp;X???? ly?? ca??c v&acirc;??n ??&ecirc;?? pha??t
                    sinh:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Vi&ecirc;??c
                ??&ocirc;??i soa??t, thanh toa??n cu??a ky?? tr??????c li&ecirc;??n k&ecirc;?? ????????c C&aacute;c B&ecirc;n cam
                k&ecirc;??t hoa??n tha??nh trong ky?? pha??t sinh. Tr??????ng h????p KH kh&ocirc;ng ?????ng &yacute; v???i s??? li???u
                ?????i so&aacute;t t??? IMD th&igrave; ph???i g???i ph???n h???i cho <strong>IMD</strong> k&egrave;m theo c??n c???
                x&aacute;c ??&aacute;ng ????? C&aacute;c B&ecirc;n c&ugrave;ng xem x&eacute;t. N???u trong th???i h???n 05
                (n??m) ng&agrave;y m&agrave; C&aacute;c B&ecirc;n kh&ocirc;ng th&ecirc;?? hoa??n tha??nh vi???c ?????i
                so&aacute;t D???ch v??? &nbsp;thi?? t???m th???i &aacute;p d???ng s??? li???u trong ?????i so&aacute;t do IMD
                ??&atilde; g???i ????? l&agrave;m c??n c??? thanh to&aacute;n v&agrave; C&aacute;c B&ecirc;n s??? th???ng nh???t
                b???ng v??n b???n v??? c&aacute;ch th???c gi???i quy???t ?????i v???i s??? ch&ecirc;nh l???ch.</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 5. GIAO NH&Acirc;??N B??U
                        G????I</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.1&nbsp;Th&ocirc;ng tin B??u g????i:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>bao g???m c&aacute;c th&ocirc;ng
                    tin<strong>&nbsp;</strong>v&ecirc;?? s&ocirc;?? l??????ng, kh&ocirc;??i l??????ng, k&iacute;ch th?????c ba (03) chi???u
                    (d&agrave;i - r???ng - cao) c???a B??u g???i, th&ocirc;ng tin Ng??????i g????i, Ng??????i nh&acirc;??n va?? th&ocirc;ng tin
                    kha??c ????????c th&ecirc;?? hi&ecirc;??n tr&ecirc;n Phi&ecirc;??u g????i ho???c ????n <strong>h&agrave;ng</strong>
                    ??&atilde; ???????c KH thi???t l???p tr&ecirc;n H??? th???ng ??&atilde; ???????c k???t n???i gi???a C&aacute;c B&ecirc;n. KH ph???i
                    ??i???n v&agrave; cung c???p ?????y ????? th&ocirc;ng tin tr&ecirc;n Phi&ecirc;??u g????i/????n h&agrave;ng tr??????c khi
                    chuy???n cho IMD. IMD c&oacute; quy???n t??? ch???i nh???n ?????i v???i nh???ng B??u g???i kh&ocirc;ng ?????y ????? th&ocirc;ng tin v???
                    Ng?????i nh???n, Ng?????i g???i, ho???c c&aacute;c th&ocirc;ng tin li&ecirc;n quan ?????n B??u g???i (n???u c&oacute;).
                    T&ugrave;y thu???c v&agrave;o t???ng nh&agrave; v???n chuy???n h???p t&aacute;c c&ugrave;ng v???i IMD, y&ecirc;u c???u cho
                    m???i B??u g???i c&oacute; th??? s??? kh&aacute;c nhau (IMD s??? th&ocirc;ng b&aacute;o tr?????c v???i KH).</span></li>
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.2&nbsp;Ch&acirc;??p nh&acirc;??n B??u
                        g????i:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>IMD
                    chi??<strong>&nbsp;</strong>ch???p nh???n B??u g???i khi c&oacute; ????? c&aacute;c ??i???u ki???n sau ??&acirc;y:</span>
            </li>
        </ul>
        <ul class="" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- V&acirc;??t ch????a trong B??u g????i kh&ocirc;ng
                    thu&ocirc;??c danh mu??c ha??ng c&acirc;??m, h???n ch??? kinh doanh ho???c kinh doanh c&oacute; ??i???u ki???n theo quy
                    ?????nh ph&aacute;p lu???t. Tuy nhi&ecirc;n, ngay c??? khi IMD ??&atilde; ch???p nh???n B??u g???i, tr&aacute;ch nhi???m
                    ch???ng minh B??u g???i l&agrave; h???p ph&aacute;p (n???u c&oacute;) v???n s??? thu???c v??? KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&oacute; ?????y ????? th&ocirc;ng tin li&ecirc;n
                    quan ?????n Ng?????i g???i, Ng?????i nh???n tr&ecirc;n B??u g???i, tr??? tr?????ng h???p ??????c bi&ecirc;??t c&oacute; th???a thu???n
                    kh&aacute;c;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- ??&atilde; ????????c KH ch&acirc;??p
                    nh&acirc;??n</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;thanh toa??n C??????c phi?? Di??ch
                    vu??</span>

            </li>
        </ul>
        <ul class="" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.3&nbsp;Giao B??u g????i ??&ecirc;??n Ng??????i
                        nh&acirc;??n:</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;Nh&acirc;n
                    vi&ecirc;n c???a IMD ho???c nh&acirc;n vi&ecirc;n c???a nh&agrave; v???n chuy???n ???????c IMD ch??? ?????nh
                    (&ldquo;Nh&acirc;n vi&ecirc;n giao nh???n h&agrave;ng&rdquo; co?? tra??ch nhi&ecirc;??m h?????ng d???n Ng?????i
                    nh???n ki???m tra t&igrave;nh tr???ng b&ecirc;n ngo&agrave;i c???a B??u g???i v&agrave; gi&aacute;m s&aacute;t
                    ?????n khi Ng?????i nh???n ??&ocirc;??ng y?? ky?? nh&acirc;??n B??u g????i (n???u c&oacute;). Tr??????ng h????p Ng??????i
                    nh&acirc;??n la?? doanh nghi&ecirc;??p, c?? quan, t&ocirc;?? ch????c thi?? t&ugrave;y quy ?????nh c???a
                    nh&agrave; v???n chuy???n, Nh&acirc;n vi&ecirc;n giao nh???n h&agrave;ng c&oacute; th??? chi?? th????c
                    hi&ecirc;??n g????i ??&ecirc;??n b&ocirc;?? ph&acirc;??n v??n th??, ha??nh chi??nh, th??????ng tr????c, ba??o
                    v&ecirc;?? ho????c ng??????i ????????c u??y quy&ecirc;??n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 6. QUY???N V&Agrave; NGH??A V??? CU??A
                        IMD</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>6.1&nbsp;Quy&ecirc;??n&nbsp;</span></strong>
                </li>
            </ul>
        </div>
        <ol start="1" style="list-style-type: lower-alpha;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>???????c quy???n ch??? ?????ng trong vi???c h???p t&aacute;c,
                    ch??? ?????nh nh&agrave; v???n chuy???n kh&aacute;c th???c hi???n to&agrave;n b??? ho???c m???t ph???n D???ch v??? cho KH. Trong
                    tr?????ng h???p n&agrave;y, KH ?????ng &yacute; tu&acirc;n th??? c&aacute;c quy ?????nh ri&ecirc;ng c???a nh&agrave; v???n
                    chuy???n ???????c IMD ch??? ?????nh (n???u c&oacute;) bao g???m nh??ng kh&ocirc;ng gi???i h???n b???i: C?????c ph&iacute; D???ch v???;
                    quy c&aacute;ch ??&oacute;ng g&oacute;i B??u g???i, ph&iacute; khai gi&aacute;&hellip;mi???n l&agrave; c&aacute;c
                    quy ?????nh n&agrave;y ???????c ghi r&otilde; trong H???p ?????ng ho???c Ph??? l???c H???p ?????ng ho???c c&oacute; s??? th???a thu???n
                    kh&aacute;c gi???a C&aacute;c B&ecirc;n. Ngo&agrave;i c&aacute;c n???i dung ??&oacute;, c&aacute;c quy???n
                    v&agrave; ngh??a v??? ??&atilde; th???a thu???n gi???a IMD v&agrave; KH c&oacute; hi???u l???c nh?? ch&iacute;nh IMD th???c
                    hi???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Y&ecirc;u c???u KH cho ki???m tra B??u g????i trong m???i
                    tr?????ng h???p, bao g???m nh??ng kh&ocirc;ng gi???i h???n vi???c c&oacute; d&acirc;??u hi&ecirc;??u cho th&acirc;??y B??u
                    g????i kh&ocirc;ng ??u??ng, ??u?? ti&ecirc;u chu&acirc;??n, nghi ng???? ha??ng c&acirc;??m, ha??ng gi???, h&agrave;ng
                    kh&ocirc;ng h???p ph&aacute;p ho????c theo y&ecirc;u c&acirc;??u cu??a C?? quan qua??n ly?? thi?? tr??????ng, c?? quan
                    nha?? n??????c co?? th&acirc;??m quy&ecirc;??n. Tuy nhi&ecirc;n, C&aacute;c B&ecirc;n th???ng nh???t r???ng ??&acirc;y
                    kh&ocirc;ng ph???i l&agrave; ngh??a v??? c???a IMD v&agrave; trong m???i tr?????ng h???p KH ph???i c&oacute; tr&aacute;ch
                    nhi???m tu&acirc;n th??? ?????y ????? c&aacute;c quy ?????nh c???a ph&aacute;p lu???t v??? &nbsp;B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>??i??nh chi?? ngay l&acirc;??p t????c vi???c nh&acirc;??n,
                    v&acirc;??n chuy&ecirc;??n, pha??t B??u g????i va?? th&ocirc;ng ba??o cho C?? quan co?? th&acirc;??m quy&ecirc;??n trong
                    tr??????ng h????p pha??t hi&ecirc;??n B??u g????i ch??a ???????c ph&eacute;p l??u th&ocirc;ng tr&ecirc;n th??? tr?????ng Vi???t
                    Nam, B??u g???i vi pha??m quy ??i??nh v??? h&agrave;ng c???m, h&agrave;ng h???n ch??? v???n chuy???n/kinh doanh ho???c
                    h&agrave;ng kinh doanh c&oacute; ??i???u ki???n nh??ng kh&ocirc;ng cung c???p ???????c gi???y ph&eacute;p v&agrave;/ho???c
                    c&aacute;c ??i???u ki???n h???p ph&aacute;p.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ch???m d???t H???p ?????ng ngay l???p t???c ho???c t????
                    ch&ocirc;??i cung ????ng Di??ch vu?? trong tr??????ng h????p: (i) KH vi pha??m pha??p lu&acirc;??t B??u chi??nh; (ii) B??u
                    g???i thu???c danh m???c h&agrave;ng h&oacute;a b??? c???m, h???n ch??? kinh doanh ho???c kh&ocirc;ng thu???c ph???m vi v???n
                    chuy???n theo ch&iacute;nh s&aacute;ch c???a IMD ???????c th??? hi???n t???i website:&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:black;text-decoration:none;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;'>&nbsp; (iii) ?????a ch??? giao/nh???n B??u g???i n???m ngo&agrave;i Ph???m vi
                    Cung ???ng D???ch v???; (iv) th&ocirc;ng tin B??u g???i v&agrave;/ho???c Th&ocirc;ng tin Ng?????i nh???n/Ng?????i g???i
                    kh&ocirc;ng r&otilde; r&agrave;ng; (v) qu&aacute; th???i h???n thanh to&aacute;n C?????c ph&iacute; D???ch v??? c???a ?????t
                    thanh to&aacute;n tr?????c ??&oacute; cho IMD; (vi) B??u g???i kh&ocirc;ng ???????c ??&oacute;ng g&oacute;i c???n th???n,
                    ??&uacute;ng quy c&aacute;ch, t&iacute;nh ch???t c???a n???i dung c???a B??u g???i; (vii) x???y ra tr?????ng h???p Ng?????i nh???n
                    khi???u n???i v??? ch???t l?????ng B??u g???i ho???c B??u g???i c&oacute; d???u hi???u l???a ?????o.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>S???? du??ng th&ocirc;ng tin giao di??ch gi????a IMD
                    va?? KH nh????m qua??ng ba?? cho th????ng hi&ecirc;??u, uy ti??n cu??a IMD, tr???? tr??????ng h????p KH t???? ch&ocirc;??i b????ng
                    v??n ba??n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong tr?????ng h???p KH vi ph???m th???i gian thanh
                    to&aacute;n, IMD c&oacute; quy???n (i) c???m gi??? v&agrave; ?????nh ??o???t m???t l?????ng B??u g???i nh???t ?????nh v&agrave;
                    c&aacute;c ch???ng t??? li&ecirc;n quan ?????n B??u g???i; v&agrave;/ho???c (ii) c???n tr??? tr???c ti???p v&agrave;o Ti???n thu
                    h??? m&agrave; IMD ??&atilde; h??? tr??? th???c hi???n. Tr?????ng h???p B??u g???i ho???c Ti???n thu h??? kh&ocirc;ng ????? ????? c???n tr???
                    C?????c ph&iacute; D???ch v??? th&igrave; KH ph???i thanh to&aacute;n th&ecirc;m C?????c ph&iacute; D???ch v??? c&ograve;n
                    thi???u trong v&ograve;ng 03 (ba) ng&agrave;y t??? ng&agrave;y IMD th&ocirc;ng b&aacute;o.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>????????c KH b&ocirc;??i th??????ng/b???i
                    ho&agrave;n??&acirc;??y ??u?? trong tr??????ng h????p c&oacute; thi&ecirc;??t ha??i xa??y ra do KH vi pha??m H????p
                    ??&ocirc;??ng, vi pha??m pha??p lu&acirc;??t v&ecirc;?? B??u chi??nh, vi ph???m ph&aacute;p lu???t kh&aacute;c.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD s??? ???????c mi???n tr??? tr&aacute;ch nhi???m b???i
                    th?????ng trong tr?????ng h???p B??u g???i b??? th???t tho&aacute;t b???i Ng?????i nh???n m&agrave; KH ho???c Ng?????i g???i ??&atilde;
                    ch??? ?????nh, bao g???m nh??ng kh&ocirc;ng gi???i h???n vi???c B??u g???i b??? c?????p, gi???t, ??&aacute;nh tr&aacute;o, l???a
                    ?????o&hellip;. ????? x&aacute;c ?????nh s??? vi???c n&agrave;y do Ng?????i nh???n th???c hi???n, IMD s??? h??? tr??? ti???n h&agrave;nh
                    tr&igrave;nh b&aacute;o c?? quan c&oacute; th???m quy???n ????? gi???i quy???t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Nghi??a vu??</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Th????c hi&ecirc;??n nghi&ecirc;m tu??c cam
                    k&ecirc;??t v&ecirc;?? th????i ha??n, quy tri??nh, Th????i gian Toa??n tri??nh cung ????ng Di??ch vu?? nh?? ??&atilde; th???a
                    thu???n.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung c???p ??u??ng, ?????y ????? th&ocirc;ng tin v??? D???ch v???
                    cung ????ng, C??????c phi?? Di??ch vu?? ??a?? cung ????ng cho KH va?? tr&aacute;ch nhi???m b???i th?????ng thi???t h???i, c&aacute;c
                    th&ocirc;ng tin li&ecirc;n quan kh&aacute;c (n???u c&oacute;).&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>H?????ng d???n KH s??? d???ng v&agrave; th???c hi???n
                    ??&uacute;ng c&aacute;c quy ?????nh, quy tr&igrave;nh cung ????ng D???ch v???.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????m b???o ch???t l?????ng D???ch v??? theo ??&uacute;ng
                    ti&ecirc;u chu???n ??&atilde; c&ocirc;ng b&ocirc;?? v&agrave; tho??? thu???n gi???a C&aacute;c B&ecirc;n. C&ocirc;ng
                    b??? r&otilde;, ki??p th????i v????i ??a??i di&ecirc;??n KH c&aacute;c ph????ng &aacute;n, bi???n ph&aacute;p x??? l&yacute;
                    trong tr?????ng h???p hoa??n tha??nh cung ????ng Di??ch vu?? kh&ocirc;ng ??u??ng nh?? cam k&ecirc;??t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>B???i th?????ng thi???t h???i cho KH (n???u c&oacute;) trong
                    tr?????ng h???p c&oacute; vi ph???m &nbsp; &nbsp;theo cam k???t quy ?????nh t???i H???p ?????ng, c&aacute;c Ph??? l???c k&egrave;m
                    theo H???p ?????ng n&agrave;y v&agrave; theo quy ?????nh c???a ph&aacute;p lu???t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????m b???o an to&agrave;n, ch&iacute;nh x&aacute;c
                    v&agrave; b&iacute; m???t th&ocirc;ng tin c???a KH theo qui ?????nh c???a ph&aacute;p lu???t, gi??? b&iacute; m???t
                    th&ocirc;ng tin ri&ecirc;ng v??? Ng?????i nh&acirc;??n, Ng??????i g???i, tr??? tr?????ng h???p c&aacute;c th&ocirc;ng tin
                    n&agrave;y xu???t ph&aacute;t t??? b&ecirc;n th??? ba ho???c ???????c c&ocirc;ng b??? r???ng r&atilde;i tr&ecirc;n website
                    c???a KH ho???c b???t k??? trang web/h&igrave;nh th???c c&ocirc;ng khai n&agrave;o kh&aacute;c.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????m b???o an to&agrave;n cho B??u g???i, kh&ocirc;ng
                    b&oacute;c m???, tr&aacute;o ?????i n???i dung th&ocirc;ng tin h&agrave;ng h&oacute;a v&agrave; ch???ng t???
                    ??&iacute;nh k&egrave;m tr??? tr?????ng h???p ph&aacute;p lu???t c&oacute; quy ?????nh, IMD c???n ki???m tra ho???c C&aacute;c
                    b&ecirc;n c&oacute; th???a thu???n kh&aacute;c.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Hoa??n tra?? B??u g????i cho KH khi KH y&ecirc;u
                    c&acirc;??u, Ng?????i nh???n t??? ch???i nh???n B??u g???i ho????c kh&ocirc;ng giao ???????c cho Ng?????i nh???n m????c du?? ??a?? a??p
                    du??ng mo??i ph????ng th????c li&ecirc;n la??c co?? th&ecirc;??. Trong tr?????ng h???p n&agrave;y, KH v???n ph???i thanh
                    to&aacute;n C?????c ph&iacute; D???ch v??? cho c&aacute;c ????n h&agrave;ng b??? tr??? v??? n&agrave;y v&agrave; C?????c
                    ph&iacute; Tr??? h&agrave;ng theo quy ?????nh t???i Ph??? l???c 2 ??&iacute;nh k&egrave;m H???p ?????ng n&agrave;y.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ti???p nh???n, gia??i quy&ecirc;??t ho????c h&ocirc;??
                    tr???? gia??i quy&ecirc;??t mo??i khi???u n???i c???a KH li&ecirc;n quan ?????n vi???c cung c???p D???ch v??? c???a IMD bao g???m
                    nh??ng kh&ocirc;ng gi???i h???n ch&acirc;??t l??????ng Di??ch vu??, khi???u n???i v??? ????n h&agrave;ng&hellip;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Thu h??? ti???n B??u g???i cho KH v&agrave; ho&agrave;n
                    tr??? Ti???n thu h??? theo ??&uacute;ng quy tr&igrave;nh th???a thu???n gi???a C&aacute;c b&ecirc;n (n???u
                    c&oacute;).</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p></p>
        <p></p>
        <p></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 7. QUY???N V&Agrave; NGH??A V???
                        KH&Aacute;CH H&Agrave;NG</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>7.1&nbsp;Quy???n</span></strong>
                </li>
            </ul>
        </div>
        <ol class="decimal_type" start="1" style="list-style-type: lower-alpha;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>????????c <strong>IMD</strong> cung c???p ?????y ?????
                    th&ocirc;ng tin li&ecirc;n quan ?????n toa??n b&ocirc;?? quy tri??nh cung ????ng Di??ch vu??.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>????????c IMD ?????m b???o b&iacute; m???t th&ocirc;ng tin,
                    an to&agrave;n ?????i v???i B??u g????i trong toa??n qu&aacute; tr&igrave;nh giao h&agrave;ng theo quy ?????nh c???a
                    ph&aacute;p lu???t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>????????c IMD gi???i quy???t khi???u n???i, ????????c gia??i
                    quy&ecirc;??t tho??a ??a??ng v??? D???ch v??? cung ????ng ??&atilde; s??? d???ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>????????c IMD b???i th?????ng thi???t h???i tu??y theo th????c
                    t&ecirc;?? t????ng tr??????ng h????p.</span>
                <ol class="decimal_type" style="list-style-type: undefined;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'>Nghi??a vu??</span></strong></li>
                </ol>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>B&ocirc;?? tri??, s????p x&ecirc;??p nh&acirc;n
                    vi&ecirc;n th????c hi&ecirc;??n vi&ecirc;??c ??&ocirc;??i soa??t C??????c phi?? D???ch v??? ??a??m ba??o ??u??ng th????i
                    ha??n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy&ecirc;??t ??&ocirc;??i kh&ocirc;ng g????i B??u g???i
                    ch??a ???????c l??u th&ocirc;ng tr&ecirc;n th??? tr?????ng, h&agrave;ng c???m, h&agrave;ng h???n ch??? v???n chuy???n/kinh doanh
                    ho???c h&agrave;ng kinh doanh c&oacute; ??i???u ki???n nh??ng kh&ocirc;ng cung c???p ???????c gi???y ph&eacute;p
                    ho???c/v&agrave; kh&ocirc;ng ??&aacute;p ???ng ??i???u ki???n kh&aacute;c theo quy ?????nh c???a ph&aacute;p
                    lu???t.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph???i h???p v???i IMD th???c hi???n vi???c ki???m tra n???i dung
                    c???a B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ch???u tr&aacute;ch nhi???m tr?????c IMD v&agrave;
                    tr??????c ph&aacute;p lu???t v??? n&ocirc;??i dung B??u g???i, h&oacute;a ????n, ch????ng t???? ngu&ocirc;??n g&ocirc;??c
                    xu&acirc;??t x???? cu??a B??u g????i v&agrave; ch???ng t??? ??&iacute;nh k&egrave;m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ch???u tr&aacute;ch nhi???m l&agrave;m vi???c, gi???i
                    quy???t v???i C?? quan c&oacute; th???m quy???n khi B??u g???i b??? t???m gi??? ho???c t???ch thu.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung c???p ?????y ????? h&oacute;a ????n, ch???ng t??? c???a B??u
                    g???i cho IMD khi g???i B??u g???i.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD s??? ???????c mi???n tr??? tr&aacute;ch nhi???m b???i
                    th?????ng trong tr?????ng h???p B??u g???i b??? t???m gi??? ho???c t???ch thu b???i c?? quan c&oacute; th???m quy???n do B??u g???i
                    kh&ocirc;ng c&oacute; h&oacute;a ????n, ch???ng t??? h???p ph&aacute;p ??&iacute;nh k&egrave;m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Thanh to&aacute;n ?????y ?????, ??u??ng ha??n C?????c
                    ph&iacute; D???ch v???, la??i tra?? ch&acirc;??m (n&ecirc;??u co??) theo quy ?????nh t???i ??i???u 4 H???p ?????ng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>??&oacute;ng g&oacute;i B??u g????i theo ??&uacute;ng
                    quy c&aacute;ch, k&iacute;ch th?????c v&agrave; t&iacute;nh ch???t c???a t???ng m???t h&agrave;ng, ?????c bi???t ?????i v???i B??u
                    g???i l&agrave; c&aacute;c m???t h&agrave;ng d??? v???, d??? h?? h???ng&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung c&acirc;??p ??&acirc;??y ??u?? ch??? d???n li&ecirc;n
                    quan ?????n B??u g???i; th&ocirc;ng tin li&ecirc;n quan ?????n Ng?????i g???i, Ng?????i nh???n tr&ecirc;n B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>B???i th?????ng thi???t h???i th???c t??? cho IMD v&agrave;
                    b&ecirc;n th???? ba c&oacute; li&ecirc;n quan khi thi???t h???i x???y ra co?? ngu&ocirc;??n g&ocirc;??c t???? KH/Ng?????i
                    g???i theo quy ?????nh c???a ph&aacute;p lu???t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ch???u tr&aacute;ch nhi???m v??? m???i th&ocirc;ng tin
                    li&ecirc;n quan ?????n Ng?????i nh???n m&agrave; KH giao cho IMD. Tr?????ng h???p x???y ra sai s&oacute;t v??? th&ocirc;ng
                    tin Ng?????i nh???n ho???c B??u g???i kh&ocirc;ng ??&uacute;ng y&ecirc;u c???u c???a Ng?????i nh???n th&igrave; KH c&oacute;
                    tr&aacute;ch nhi???m t??? gi???i quy???t v???i Ng?????i nh???n, ?????ng th???i KH v???n ph???i thanh to&aacute;n C?????c ph&iacute;
                    D???ch v??? ?????i v???i ????n h&agrave;ng tr&ecirc;n d???a tr&ecirc;n l??? tr&igrave;nh ??&atilde; th???c hi???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>B???ng chi ph&iacute; c???a m&igrave;nh, ch???u
                    tr&aacute;ch nhi???m gi???i quy???t c&aacute;c v???n ????? li&ecirc;n quan ?????n (i) tranh ch???p v??? quy???n s??? h???u B??u g???i,
                    ngu???n g???c B??u g???i v???i b&ecirc;n th??? ba b???t k???; ho???c (ii) khi???u n???i c???a Ng?????i nh???n v??? vi???c h&agrave;ng
                    h&oacute;a b??? l???i, h?? h???ng ho???c kh&ocirc;ng ??&uacute;ng y&ecirc;u c???u.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p ng???ng s??? d???ng D???ch v??? c???a IMD, KH ph???i
                    th&ocirc;ngb&aacute;o b???ng v??n b???n tr?????c 15 (m?????i l??m) ng&agrave;y ????? IDM th???c hi???n ?????i so&aacute;t
                    v&agrave; thanh to&aacute;n ??&uacute;ng h???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng ???????c chuy???n nh?????ng ho???c chuy???n giao
                    H???p ?????ng ho???c b???t k??? quy???n v&agrave; ngh??a v??? c???a m&igrave;nh theo H???p ?????ng n&agrave;y cho b&ecirc;n th??? ba
                    m&agrave; kh&ocirc;ng ???????c s??? ?????ng &yacute; b???ng v??n b???n c???a IMD.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 8. CH???M D???T H???P
                        ?????NG</span></u></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>H????p ??&ocirc;??ng na??y ????????c ch&acirc;??m d????t trong
                ca??c tr??????ng h????p sau ??&acirc;y:</span>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.1&nbsp;</strong> H????p ??&ocirc;??ng h&ecirc;??t ha??n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.2&nbsp;</strong> H???p ?????ng c&oacute; th??? ch???m d???t tr?????c th???i h???n
                    theo tho??? thu???n c???a C&aacute;c B&ecirc;n tham gia H???p ?????ng v&agrave; ?????m b???o c&aacute;c nguy&ecirc;n
                    t???c:&nbsp;</span></li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&aacute;c B&ecirc;n ph???i c&oacute; th&ocirc;ng
                    b???o, tho??? thu???n v???i nhau tr?????c t???i thi???u 10 (m?????i) ng&agrave;y.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&aacute;c B&ecirc;n</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;th???c hi???n ho&agrave;n th&agrave;nh thanh
                    to&aacute;n c&aacute;c kho???n C?????c ph&iacute; D???ch v???, chi ph&iacute; ph&aacute;t sinh tr?????c khi ch???m d???t H???p
                    ?????ng.</span>
            </li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.3&nbsp;</strong>C&aacute;c B&ecirc;n vi ph???m b???t k??? ??i???u
                    kho???n n&agrave;o c???a H???p ?????ng m&agrave; kh&ocirc;ng th??? tho??? thu???n th???ng nh???t ???????c. Trong tr?????ng h???p
                    n&agrave;y, B&ecirc;n b??? vi ph???m c&oacute; quy???n ????n ph????ng ch???m d???t H???p ?????ng n???u sau th???i h???n 15
                    (m?????i l??m) ng&agrave;y m&agrave; B&ecirc;n vi ph???m kh&ocirc;ng th??? kh???c ph&uacute;c ???????c h&agrave;nh
                    vi vi ph???m. ?????ng th???i B&ecirc;n vi ph???m ph???i b???i th?????ng to&agrave;n b??? thi???t h???i x???y ra cho
                    B&ecirc;n b??? vi ph???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ri&ecirc;ng tr?????ng h???p KH vi ph???m ph&aacute;p lu???t v???
                    vi???c g???i h&agrave;ng c???m th&igrave; IMD ???????c quy???n ch???m d???t H???p ?????ng ngay l???p t???c m&agrave; kh&ocirc;ng c???n ph???i
                    th???c hi???n sau th???i gian y&ecirc;u c???u KH kh???c ph???c vi ph???m.</span></li>
        </ul>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.4&nbsp;</strong>Ca??c tr??????ng h???p kha??c theo quy
                        ?????nh</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;c???a Lu???t Vi???t
                        Nam.&nbsp;</span>
                </li>
            </ul>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 9. B???O M???T TH&Ocirc;NG
                        TIN</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.1&nbsp;</strong> M???i B&ecirc;n ph???i ti???n h&agrave;nh c&aacute;c
                    bi???n ph&aacute;p v&agrave; h&agrave;nh ?????ng c???n thi???t nh???m b???o m???t Th&ocirc;ng tin B???o m???t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>C&aacute;c B&ecirc;n trong H???p ?????ng n&agrave;y
                    v&agrave; nh&acirc;n vi&ecirc;n c???a m&igrave;nh kh&ocirc;ng ???????c quy???n s??? d???ng, c&ocirc;ng b??? Th&ocirc;ng
                    tin B???o m???t cho b???t k??? m???c ??&iacute;ch n&agrave;o kh&aacute;c ngo???i tr??? ????? th???c hi???n H???p ?????ng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.2&nbsp;</strong> M???i B&ecirc;n b???o ?????m r???ng b???t k??? b&ecirc;n th???
                    ba n&agrave;o nh???n ???????c Th&ocirc;ng tin B???o m???t s??? kh&ocirc;ng ???????c ph&eacute;p ti???t l??? Th&ocirc;ng tin B???o
                    m???t cho b???t k??? ng?????i n&agrave;o v&agrave; ch??? ???????c ph&eacute;p x??? l&yacute; Th&ocirc;ng tin B???o m???t theo quy
                    ?????nh v&agrave; nh???m m???c ??&iacute;ch th???c hi???n H???p ?????ng n&agrave;y, tr??? khi vi???c ti???t l??? th&ocirc;ng tin ???????c
                    th???c hi???n theo y&ecirc;u c???u c???a ph&aacute;p lu???t ho???c C?? quan c&oacute; th???m quy???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.3&nbsp;</strong> Trong tr?????ng h???p B&ecirc;n n&agrave;o ???????c
                    y&ecirc;u c???u ti???t l??? Th&ocirc;ng tin B???o m???t cho c&aacute;c C?? quan c&oacute; th???m quy???n theo quy ?????nh c???a
                    ph&aacute;p lu???t, B&ecirc;n ???????c y&ecirc;u c???u ph???i g???i v??n b???n th&ocirc;ng b&aacute;o tr?????c cho B&ecirc;n
                    c&ograve;n l???i v??? y&ecirc;u c???u ??&oacute;, tr??? khi ???????c y&ecirc;u c???u kh&aacute;c c???a C?? quan c&oacute; th???m
                    quy???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.4&nbsp;</strong> Vi???c h???t h???n ho???c ch???m d???t H???p ?????ng n&agrave;y s???
                    kh&ocirc;ng ch???m d???t ngh??a v??? b???o m???t Th&ocirc;ng tin B???o m???t c???a C&aacute;c B&ecirc;n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 10. GI???I QUY???T TRANH
                        CH???P</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>10.1&nbsp;</strong>M???i tranh ch???p, tranh c&atilde;i hay nh???ng b???t
                    ?????ng gi???a C&aacute;c B&ecirc;n, ph&aacute;t sinh t??? v&agrave;/ho???c li&ecirc;n quan ?????n H???p ?????ng n&agrave;y,
                    hay t??? vi???c vi ph???m H???p ?????ng, s??? ???????c gi???i quy???t tr?????c h???t th&ocirc;ng qua th????ng l??????ng tr&ecirc;n tinh
                    th&acirc;??n thi???n ch&iacute; <strong>gi???a</strong> C&aacute;c B&ecirc;n. N???u tranh ch???p kh&ocirc;ng th??? gi???i
                    quy???t ???????c b???ng th????ng l?????ng, thi???n ch&iacute; th&igrave; s??? ???????c gi???i quy???t b???i T&ograve;a &aacute;n
                    c&oacute; th???m quy???n.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>10.2&nbsp;</strong>B&ecirc;n thua ki???n ph???i ch???u to&agrave;n b???
                    c&aacute;c chi ph&iacute; c&oacute; li&ecirc;n quan bao g???m nh??ng kh&ocirc;ng gi???i h???n &aacute;n ph&iacute;,
                    l??? ph&iacute; gi&aacute;m ?????nh, chi ph&iacute; lu???t s??&hellip;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 11. B???T KH???
                        KH&Aacute;NG</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>11.1&nbsp;</strong>B&ecirc;n b??? ???nh h?????ng b???i S??? ki???n B???t kh???
                    kh&aacute;ng ph???i, ngay khi bi???t ???????c, th&ocirc;ng b&aacute;o to&agrave;n b??? s??? vi???c b???ng v??n b???n cho
                    B&ecirc;n kia v&agrave; ph???i c??? g???ng h???t s???c v&agrave; &aacute;p d???ng c&aacute;c bi???n ph&aacute;p kh???c ph???c
                    thi???t h???i, m???t m&aacute;t do S??? ki???n B???t kh??? kh&aacute;ng g&acirc;y ra. B&ecirc;n kia s??? h??? tr??? v&agrave;
                    h???p t&aacute;c v???i B&ecirc;n b??? ???nh h?????ng.&nbsp;</span></li>
        </ul>
        <ul>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>11.2&nbsp;</strong>Trong tr?????ng h???p S??? ki???n B???t kh??? kh&aacute;ng x???y
                    ra trong m???t kho???ng th???i gian li&ecirc;n t???c qu&aacute; s&aacute;u m????i (60) ng&agrave;y, B&ecirc;n b??? ???nh
                    h?????ng c&oacute; quy???n ch???m d???t H???p ?????ng ngay sau khi g???i v??n b???n th&ocirc;ng b&aacute;o cho B&ecirc;n kia.
                    Trong tr?????ng h???p n&agrave;y, kh&ocirc;ng B&ecirc;n n&agrave;o ph???i ch???u b???t k??? tr&aacute;ch nhi???m b???i th?????ng
                    hay ph???t vi ph???m n&agrave;o ?????i v???i B&ecirc;n kia.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 12. CH???NG H???I
                        L???</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>12.1&nbsp;</strong>KH cam k???t r???ng KH c??ng nh?? nh&acirc;n
                    vi&ecirc;n, Ng?????i g???i c???a m&igrave;nh kh&ocirc;ng t???ng qu&agrave; cho IMD c??ng nh?? nh&acirc;n vi&ecirc;n
                    IMD, ?????ng th???i kh&ocirc;ng ???????c y&ecirc;u c???u nh&acirc;n vi&ecirc;n IMD t???ng qu&agrave;. Qu&agrave; trong
                    ??i???u kho???n n&agrave;y ???????c hi???u l&agrave; c&aacute;c m&oacute;n qu&agrave; bi???u bao g???m nh??ng kh&ocirc;ng
                    gi???i h???n c&aacute;c m&oacute;n qu&agrave; c&oacute; gi&aacute; tr??? ho???c kh&ocirc;ng c&oacute; gi&aacute;
                    tr???, ti???n, l???i h???a ho???c b???t k??? kho???n hoa h???ng n&agrave;o.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>12.2&nbsp;</strong>Tr?????ng h???p KH vi ph???m, IMD c&oacute; quy???n ch???m
                    d???t H???p ?????ng n&agrave;y, ?????ng th???i KH ph???i ch???u ph???t 8% C?????c ph&iacute; D???ch v??? c???a th&aacute;ng vi
                    ph???m.&nbsp;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>??I&Ecirc;??U 13. CAM K&Ecirc;??T CHUNG GI????A
                        CA??C B&Ecirc;N&nbsp;</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.1&nbsp;</strong>Ca??c B&ecirc;n cam k&ecirc;??t tuy&ecirc;??t
                    ??&ocirc;??i kh&ocirc;ng vi pha??m quy ?????nh ph&aacute;p lu???t v&agrave; c&aacute;c ??i???u kho???n t???i H???p ?????ng
                    n&agrave;y.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.3&nbsp;</strong>Ca??c B&ecirc;n th????c hi&ecirc;??n nghi&ecirc;m
                    tu??c, ??&acirc;??y ??u?? mo??i ??i&ecirc;??u khoa??n ghi trong H????p ??&ocirc;??ng na??y.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.3&nbsp;</strong>M???i s???a ?????i, b??? sung c???a H???p ?????ng n&agrave;y ph???i
                    ???????c ?????ng &yacute; b???ng v??n b???n c???a C&aacute;c B&ecirc;n.H???p ?????ng v&agrave; c&aacute;c ph??? l???c c???a H???p ?????ng
                    (n???u c&oacute;) c&ugrave;ng v???i t???t c??? c&aacute;c t&agrave;i li???u li&ecirc;n quan v&agrave; ??i k&egrave;m
                    kh&aacute;c s??? thi???t l???p n&ecirc;n to&agrave;n b??? H???p ?????ng c&oacute; gi&aacute; tr??? r&agrave;ng bu???c gi???a
                    C&aacute;c B&ecirc;n v&agrave; s??? thay th???, h???y b??? to&agrave;n b??? c&aacute;c th????ng l?????ng, t&agrave;i li???u,
                    kh???ng ?????nh, cam k???t v&agrave; th???a thu???n tr?????c khi l???p H???p ?????ng.&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong tr?????ng h???p c&oacute; b???t k??? m&acirc;u thu???n
                    n&agrave;o gi???a H???p ?????ng v&agrave; c&aacute;c ph??? l???c c???a H???p ?????ng th&igrave; c&aacute;c ??i???u kho???n c???a H???p ?????ng
                    s??? ???????c ??u ti&ecirc;n &aacute;p d???ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.4&nbsp;</strong>M???i B&ecirc;n t??? ch???u c&aacute;c kho???n chi
                    ph&iacute; v&agrave; ph&iacute; t???n c???a B&ecirc;n m&igrave;nh trong vi???c th????ng l?????ng, d??? th???o, ph&ecirc;
                    chu???n v&agrave; k&yacute; k???t H???p ?????ng v&agrave; c&aacute;c ph??? l???c c???a H???p ?????ng (n???u c&oacute;) v&agrave;
                    c&aacute;c t&agrave;i li???u c&oacute; li&ecirc;n quan n&ecirc;u trong H???p ?????ng v&agrave; c&aacute;c ph??? l???c
                    c???a H???p ?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.5&nbsp;</strong>H???p ?????ng kh&ocirc;ng thi???t l???p quan h??? gi???a
                    C&aacute;c B&ecirc;n nh?? &nbsp;l&agrave; ?????i l&yacute; hay ?????i di???n c???a b&ecirc;n kia, nh???m t???o ra s??? tin
                    t?????ng hay m???i quan h??? ?????i t&aacute;c th????ng m???i. Kh&ocirc;ng B&ecirc;n n&agrave;o c&oacute; quy???n ???????c
                    h&agrave;nh ?????ng hay g&aacute;nh tr&aacute;ch nhi???m tr&ecirc;n danh ngh??a c???a B&ecirc;n kia trong H???p ?????ng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.6&nbsp;</strong>T???t c??? th&ocirc;ng b&aacute;o v&agrave; ph????ng
                    ti???n li&ecirc;n l???c ???????c quy ?????nh ho???c y&ecirc;u c???u theo H???p ?????ng n&agrave;y ph???i ???????c l???p th&agrave;nh v??n
                    <strong>b???n</strong> v&agrave; s??? ???????c (i) g???i th?? ri&ecirc;ng, (ii) g???i th?? b???ng c&aacute;ch x&aacute;c
                    nh???n ho???c g???i b???o ?????m k&egrave;m theo gi???y b&aacute;o ??&atilde; g???i th?? theo y&ecirc;u c???u, ho???c g???i th??
                    b???ng ???????ng h&agrave;ng kh&ocirc;ng, (iii) g???i qua th?? ??i???n t??? e-mail, ho???c (iv) g???i fax ?????n C&aacute;c
                    B&ecirc;n t????ng ???ng. IMD c&oacute; th??? d???a v&agrave;o th&ocirc;ng b&aacute;o c???a ng?????i ???????c ???y quy???n b???i KH,
                    ?????ng th???i s??? kh&ocirc;ng ch???u tr&aacute;ch nhi???m t&igrave;m hi???u, ??i???u tra v??? th???m quy???n c???a ng?????i
                    ??&oacute;. Trong m???i tr?????ng h???p vi???c H???p ?????ng ???????c k&yacute; b???i ng?????i ?????i di???n c&oacute; th???m quy???n
                    v&agrave; ??&oacute;ng d???u gi???a C&aacute;c b&ecirc;n ?????u c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; th???c
                    hi???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.7&nbsp;</strong>H???p ?????ng s??? t??? ?????ng thanh l&yacute; trong tr?????ng
                    h???p ???????c ch???m d???t theo m???t trong c&aacute;c quy ?????nh t???i ??i???u 8 v&agrave; m???i B&ecirc;n ??&atilde; th???c hi???n
                    ?????y ????? c&aacute;c ngh??a v??? theo H???p ?????ng</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.8&nbsp;</strong>H???p ?????ng n&agrave;y c&oacute; hi???u l???c 01 (m???t)
                    n??m k??? t??? ng&agrave;y k&yacute;. H???p ?????ng n&agrave;y s??? t??? ?????ng gia h???n v&agrave; m???i l???n gia h???n s???
                    l&agrave; 01 (m???t) n??m n???u 30 (ba m????i) ng&agrave;y tr?????c khi h???t h???n H???p ?????ng, m???i B&ecirc;n kh&ocirc;ng
                    th&ocirc;ng b&aacute;o cho ph&iacute;a B&ecirc;n kia v??? &yacute; ?????nh ch???m d???t H???p ?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.9&nbsp;</strong>H???p ?????ng ???????c l???p th&agrave;nh 02 b???n b???ng Ti???ng
                    Vi???t, c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; nh?? nhau, m???i B&ecirc;n gi??? 01 b???n ????? th???c hi???n.</span>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ?????C</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    B</span></strong>
                                </p>
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                                </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:300px" alt="">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH??? L???C 01</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>TH???I H???N, TH???I HI???U V&Agrave; QUY
                    TR&Igrave;NH GI???I QUY???T KHI???U N???I</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(??&iacute;nh k&egrave;m H???p ?????ng H???p t&aacute;c
                    D???ch v??? v???n chuy???n <strong>s??? <?= date("dm"); ?> /<?= date("Y"); ?>/H??HT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>gi???a c&ocirc;ng ty C&ocirc;ng ty C??? ph???n C&ocirc;ng ngh??? v&agrave; D???ch v???
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau ??&acirc;y g???i l&agrave; &ldquo;<strong>H???p
                        ?????ng</strong>&rdquo;)</em></span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'><br>&nbsp;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>??I???U 1: QUY ?????NH CHUNG V??? B???I TH?????NG</span></strong>
            </p>
        </div>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1&nbsp;</strong>S??? ti???n b???i th?????ng t???i ??a s??? kh&ocirc;ng v?????t
                    qu&aacute; gi&aacute; tr??? khai gi&aacute; t???i ??a c???a Nh&agrave; v???n chuy???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2&nbsp;</strong>Tr?????ng h???p ????n h&agrave;ng x???y ra l???i do
                    ph&iacute;a KH (Ng?????i g???i) ho???c do ?????c t&iacute;nh t??? nhi&ecirc;n c???a ????n h&agrave;ng h&oacute;a, IMD s???
                    kh&ocirc;ng ch???u m???i tr&aacute;ch nhi???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3&nbsp;</strong>T???t c??? c&aacute;c tr?????ng h???p ????n h&agrave;ng b???
                    C?? quan nh&agrave; n?????c c&oacute; th???m quy???n thu gi???, ho???c ti&ecirc;u h???y do kh&aacute;ch h&agrave;ng vi
                    ph???m quy ?????nh c???a ph&aacute;p lu???t IMD t??? ch???i h??? tr??? v&agrave; kh&ocirc;ng ch???u m???i tr&aacute;ch
                    nhi???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4&nbsp;</strong>IMD t??? ch???i ti???p nh???n v&agrave; x??? l&yacute;
                    khi???u n???i ph&aacute;t sinh trong tr?????ng h???p Ng?????i g???i kh&ocirc;ng th???c hi???n ?????y ????? c&aacute;c quy ?????nh v???
                    g???i h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5&nbsp;</strong>?????i v???i ????n h&agrave;ng c&oacute; s??? d???ng khai
                    gi&aacute; h&agrave;ng h&oacute;a: c???n ?????m b???o th???c hi???n c&aacute;c quy ?????nh sau ??&acirc;y:</span></li>
        </ol>
        <ul style="list-style-type: disc;margin-left:17px;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;Khai b&aacute;o gi&aacute; tr??? h&agrave;ng
                    h&oacute;a kh&ocirc;ng v?????t qu&aacute; gi&aacute; tr??? khai gi&aacute; t???i ??a c???a nh&agrave; v???n
                    chuy???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;?????i v???i ????n h&agrave;ng c&oacute; s??? d???ng
                    khai gi&aacute;, kh&aacute;ch h&agrave;ng ph???i th???c hi???n ?????ng ki???m v???i nh&acirc;n vi&ecirc;n t???i l???y
                    h&agrave;ng ho???c nh&acirc;n vi&ecirc;n b??u c???c.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;IMD s??? c&oacute; quy???n y&ecirc;u c???u
                    kh&aacute;ch h&agrave;ng cung c???p h&oacute;a ????n, ch???ng t??? h???p l??? c???a ????n h&agrave;ng ????? xem x&eacute;t vi???c
                    khai gi&aacute; h&agrave;ng h&oacute;a</span><span style='font-family:"DejaVu Sans",serif;color:black;'>.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;:&nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a ????n, ch???ng t??? h???p l??? ???????c hi???u
                    l&agrave; bao g???m nh??ng kh&ocirc;ng gi???i h???n t???i c&aacute;c tr?????ng h???p sau:</span></em>
        </p>
        <ul style="list-style-type: disc;margin-left:21.5px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a ????n gi&aacute; tr??? gia t??ng, n???u ng?????i
                        b&aacute;n l&agrave; doanh nghi???p k&ecirc; khai thu??? gi&aacute; tr??? gia t??ng theo ph????ng ph&aacute;p
                        kh???u tr???</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a ????n b&aacute;n h&agrave;ng, n???u ng?????i
                        b&aacute;n l&agrave; doanh nghi???p k&ecirc; khai thu??? gi&aacute; tr??? gia t??ng theo ph????ng ph&aacute;p
                        tr???c ti???p ho???c H??? kinh doanh.</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H??? s?? k&ecirc; khai h???i quan, n???u h&agrave;ng h&oacute;a
                        ???????c nh???p kh???u v&agrave;o Vi???t Nam</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span></em>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 2: KHAI GI&Aacute; H&Agrave;NG
                        H&Oacute;A</span></strong>
            </p>
        </div>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.1&nbsp;</strong>Ph&iacute; khai&nbsp;gi&aacute; h&agrave;ng
                    h&oacute;a l&agrave; s??? ti???n KH s??? d???ng cho c&aacute;c r???i ro t??? b&ecirc;n ngo&agrave;i g&acirc;y m???t
                    m&aacute;t, t???n th???t v???t ch???t ?????i v???i h&agrave;ng h&oacute;a ???????c khai gi&aacute;, x???y ra trong qu&aacute;
                    tr&igrave;nh v???n chuy???n ho???c l??u kho t???m th???i trong qu&aacute; tr&igrave;nh v???n chuy???n.&nbsp;</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.2&nbsp;</strong>S??? ti???n khai gi&aacute; cho m???i ????n
                    h&agrave;ng ???????c quy ?????nh theo t???ng Nh&agrave; v???n chuy???n:</span></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- HolaShip (t??n m???t ???ng d???ng thu???c IMD v?? l?? kh??i ni???m ?????i di???n cho IMD trong H???p ?????ng):</span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span></li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>D?????i 3.000.000 VND mi???n ph&iacute;&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>T??? 3.000.001 &ndash; 10.000.000 VND t&iacute;nh
                            ph&iacute; 1 % gi&aacute; tr??? h&agrave;ng h&oacute;a&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; tr??? khai gi&aacute; t???i ??a 10.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- GHN Express</span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span></li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Mi???n ph&iacute; khai gi&aacute; v???i h&agrave;ng
                            h&oacute;a c&oacute; gi&aacute; tr??? ?????n 3.000.000 VND</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>H&agrave;ng h&oacute;a c&oacute; gi&aacute; tr??? t???
                            tr&ecirc;n 3.000.000 VND ?????n 10.000.000 VND: 0,5 % * gi&aacute; tr??? h&agrave;ng
                            h&oacute;a&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; tr??? khai gi&aacute; t???i ??a 10.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- J&amp;T:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></em>
            </li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Mi???n ph&iacute; khai gi&aacute; v???i h&agrave;ng
                            h&oacute;a c&oacute; gi&aacute; tr??? ?????n 1.000.000 VND</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>H&agrave;ng h&oacute;a c&oacute; gi&aacute; tr??? t???
                            tr&ecirc;n 1.000.000 VND: 1,1% * gi&aacute; tr??? h&agrave;ng h&oacute;a</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; tr??? khai gi&aacute; t???i ??a 30.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;background:white;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 3: CH&Iacute;NH S&Aacute;CH B???I
                        TH?????NG</span></strong>
            </p>
        </div>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1&nbsp;</strong>&nbsp;?????i v???i nh&agrave; v???n chuy???n
                            HolaShip</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip c&oacute; tr&aacute;ch nhi???m b???i th?????ng
                thi???t h???i x???y ra trong qu&aacute; tr&igrave;nh cung ???ng D???ch v??? chuy???n ph&aacute;t d???n ?????n l???i m???t m&aacute;t
                ho???c h?? h???ng m???t ph???n ho???c h?? h???ng to&agrave;n ph???n ?????i v???i h&agrave;ng h&oacute;a.&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Vi???c b???i th?????ng thi???t h???i li&ecirc;n quan ?????n th???c
                tr???ng B??u g???i ???????c th???c hi???n nh?? sau:&nbsp;</span>
        </p>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1&nbsp;</strong>B??u g???i l&agrave; v???t ph???m,
                            h&agrave;ng h&oacute;a ho???c gi???y t??? c&oacute; gi&aacute; tr???</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;(bao g???m c&aacute;c &nbsp;lo???i gi???y t??? sau:
                    Phi???u qu&agrave; t???ng, phi???u gi???m gi&aacute;, phi???u h???c, phi???u mua h&agrave;ng ho???c gi???y t??? c&oacute;
                    gi&aacute; tr??? t????ng ??????ng v???i phi???u mua h&agrave;ng): B???i th?????ng theo thi???t h???i th???c t???, c??n c??? v&agrave;o:
                    (i) Gi&aacute; tr??? thu h???; ho???c (ii) C?? s??? x&aacute;c minh gi&aacute; tr??? B??u g???i (???????c hi???u l&agrave; tr???
                    gi&aacute; B??u g???i ghi tr&ecirc;n h&oacute;a ????n c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute;, ghi
                    r&otilde; n???i dung h&agrave;ng h&oacute;a tr&ecirc;n h&oacute;a ????n; ho???c Gi&aacute; tr??? th???p nh???t c???a B??u
                    g???i tham kh???o th??? tr?????ng c???a 03 (ba) website b&aacute;n h&agrave;ng t???i Vi???t Nam). HolaShip s??? th???c hi???n
                    vi???c b???i th?????ng nh?? sau:&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p B??u g???i b??? m???t:
                    &nbsp;</span>
            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: undefined;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1.1&nbsp;</strong>Tr?????ng h???p B??u g???i b??? m???t:
                        &nbsp;</span></em></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p c&oacute;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;thu h??? th&igrave; b???i th?????ng 100 % gi&aacute;
                    tr??? thu h???.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p kh&ocirc;ng</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;c&oacute; thu h??? ho???c thu h??? th???p h??n
                    gi&aacute; tr??? th???c, gi&aacute; tr??? d?????i 1.000.000 VND th&igrave; ?????n b&ugrave; 100 % theo C?? s??? x&aacute;c
                    minh gi&aacute; tr??? B??u g???i (nh??ng t???i ??a kh&ocirc;ng qu&aacute; 1.000.000 VND (m???t tri???u ?????ng)).</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong tr?????ng h???p kh&ocirc;ng thu h??? ho???c thu h???
                    th???p h??n gi&aacute; tr??? th???c, gi&aacute; tr??? tr&ecirc;n 1.000.000 VND, c&oacute; khai gi&aacute;, c&oacute;
                    h&oacute;a ????n VAT: ?????n 100 % theo gi&aacute; tr??? tr&ecirc;n h&oacute;a ????n VAT.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong tr?????ng h???p kh&ocirc;ng thu h??? ho???c thu h???
                    th???p h??n gi&aacute; tr??? th???c, gi&aacute; tr??? tr&ecirc;n 1.000.000 VND, kh&ocirc;ng khai
                    gi&aacute;:</span><span style="color:black;">&nbsp;b???i th?????ng b???ng 04 (b???n) l???n c?????c ho???c gi&aacute; tr???
                    linh ho???t</span><span style='font-family:"DejaVu Sans",serif;'>.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p kh&ocirc;ng c&oacute; thu h??? v&agrave;
                    kh&ocirc;ng c&oacute; C?? s??? x&aacute;c minh gi&aacute; tr??? b??u g???i th&igrave; b???i th?????ng 04 (b???n) l???n c?????c
                    ph&iacute; c???a D???ch v??? ??&atilde; s??? d???ng. &nbsp;</span>
                <ol class="decimal_type" style="list-style-type: undefined;">

                </ol>
            </li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1.2&nbsp;</strong>Tr?????ng h???p B??u g???i b??? h?? h???ng:
                        &nbsp;</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p d???ng theo ch&iacute;nh s&aacute;ch b???i
                th?????ng m???t h&agrave;ng, tuy nhi&ecirc;n gi&aacute; tr??? b???i th?????ng ph??? thu???c v&agrave;o m???c ????? h?? h???ng c???a B??u
                g???i, c??? th??? nh?? sau:&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:57.6pt;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute;
                        tr???&nbsp;</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>b???i
                th?????ng<strong><em>&nbsp;= M???c&nbsp;</em></strong>b???i th?????ng <strong><em>theo ch&iacute;nh s&aacute;ch m???t
                        h&agrave;ng&nbsp;</em></strong>x<strong><em>&nbsp;m???c&nbsp;</em></strong>b???i th?????ng <strong><em>theo
                        b???ng b&ecirc;n d?????i</em></strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:22.5pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>B???ng gi&aacute;
                    tr???&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>b???i th?????ng
                <strong>?????i v???i h&agrave;ng h&oacute;a h?? h???ng:<em>&nbsp;</em></strong></span>
        </p>
        <table style="width: 4.7e+2pt;margin-left:15.6pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;background:#C6D9F1;padding:2.55pt 5.15pt 0cm 5.35pt;height:2.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr???ng
                                    th&aacute;i</span></strong>
                        </p>
                    </td>
                    <td style="width: 73.65pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;background: rgb(198, 217, 241);padding: 2.55pt 5.15pt 0cm 5.35pt;height: 2.25pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ?????n
                                    b&ugrave;</span></strong>
                        </p>
                    </td>
                    <td style="width:199.25pt;border:solid black 1.0pt;border-left:  none;background:#C6D9F1;padding:2.55pt 5.15pt 0cm 5.35pt;height:2.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? ?????n
                                    b&ugrave;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t ph??? ki???n, s???n ph???m c&ograve;n
                                nguy&ecirc;n&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>20 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???c b???i th?????ng theo ch&iacute;nh
                                s&aacute;ch m???t h&agrave;ng x 20 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???, h??
                                h???i t??? 1 % ?????n 30 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>30 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???c b???i th?????ng theo ch&iacute;nh
                                s&aacute;ch m???t h&agrave;ng x 30 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???, h??
                                h???i t??? 31 % ?????n 50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???c b???i th?????ng theo ch&iacute;nh
                                s&aacute;ch m???t h&agrave;ng x 50 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???, h??
                                h???i v?????t qu&aacute; 50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>100 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???c b???i th?????ng theo ch&iacute;nh
                                s&aacute;ch m???t h&agrave;ng x 100 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute; ?????i v???i ch&iacute;nh s&aacute;ch b???i
                th?????ng ????n h&agrave;ng b??? h?? h???ng:&nbsp;</span>
        </p>
        <ul style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip b???i th?????ng ????n h&agrave;ng h?? h???ng khi
                    nguy&ecirc;n nh&acirc;n g&acirc;y thi???t h???i ?????n t??? HolaShip</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ????? h?? h???ng c???a h&agrave;ng h&oacute;a
                    v&agrave; gi&aacute; tr??? B??u g???i tham kh???o th??? tr?????ng c???a 03 (ba) website b&aacute;n h&agrave;ng t???i Vi???t
                    Nam s??? do HolaShip x&aacute;c minh v&agrave; th&ocirc;ng b&aacute;o cho KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p h&agrave;ng h&oacute;a b??? b???, v??? 1 s???n
                    ph???m trong b??? s???n ph???m ??i li???n th&igrave; m???c b???i th?????ng ???????c:&nbsp;</span></li>
        </ul>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>+ X&aacute;c ?????nh theo s???n ph???m, t&iacute;nh chung
                    c??? b??? n???u HolaShip gi??? h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>+ X&aacute;c ?????nh theo s???n ph???m, t&iacute;nh b???i
                    th?????ng ri&ecirc;ng s???n ph???m n???u KH gi??? h&agrave;ng.&nbsp;</span></li>
        </ul>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p h&agrave;ng h&oacute;a b??? b???, v??? 01
                    s???n ph???m trong c&ugrave;ng 01 ????n h&agrave;ng nh??ng kh&ocirc;ng ??i li???n theo b??? th&igrave; m???c b???i th?????ng
                    ???????c x&aacute;c ?????nh theo s???n ph???m, t&iacute;nh b???i th?????ng ri&ecirc;ng, kh&ocirc;ng b???i th?????ng c??? ????n
                    h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tr?????ng h???p HolaShip ph&aacute;t hi???n B??u g???i b???
                    h?? h???ng sau khi nh???n, th&igrave; HolaShip s??? b???i th?????ng t????ng ???ng v???i m???c ????? h?? h???ng theo B???ng gi&aacute;
                    tr??? b???i th?????ng h&agrave;ng h&oacute;a h?? h???ng nh?? tr&ecirc;n.</span>
            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.2&nbsp;</strong>L??u &yacute; chung v???
                            ch&iacute;nh s&aacute;ch b???i th?????ng</span></em></strong></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;s??? ch??? b???i th?????ng tr???c ti???p cho KH/Ng?????i g???i,
                tr?????ng h???p KH/Ng?????i g???i c&oacute; email ch??? ?????nh vi???c b???i th?????ng th???c hi???n cho Ng?????i nh???n th&igrave; HolaShip s???
                b???i th?????ng cho Ng?????i nh???n theo email c???a Kh&aacute;ch h&agrave;ng/Ng?????i g???i. &nbsp;</span>
        </p>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? b???i th?????ng trong c&aacute;c tr?????ng
                    h???p tr&ecirc;n ??&atilde; bao g???m ho&agrave;n tr??? l???i C?????c ph&iacute; D???ch v??? m&agrave; KH ??&atilde; thanh
                    to&aacute;n. Trong tr?????ng h???p ph&iacute; v???n chuy???n ch??a ???????c KH thanh to&aacute;n, ph???n b???i th?????ng s???
                    kh&ocirc;ng bao g???m C?????c ph&iacute; D???ch v??? c???a HolaShip</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>?????i v???i B??u g???i l&agrave; c&aacute;c Gi???y t???
                    c&oacute; gi&aacute; tr??? th&igrave; th???i gian s??? d???ng Gi???y t??? c&oacute; gi&aacute; tr??? k??? t??? khi HolaShip
                    nh???n h&agrave;ng ph???i c&ograve;n th???i h???n s??? d???ng t???i thi???u l&agrave; 03 (ba) th&aacute;ng. Tr?????ng h???p B??u
                    g???i kh&ocirc;ng ?????t ??i???u ki???n n&agrave;y th&igrave; HolaShip ???????c mi???n tr&aacute;ch nhi???m b???i
                    th?????ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong m???i tr?????ng h???p kh&ocirc;ng x&aacute;c ?????nh
                    ???????c gi&aacute; tr??? B??u g???i (Kh&ocirc;ng c&oacute; C?? s??? x&aacute;c minh gi&aacute; tr??? B??u g???i v&agrave;
                    kh&ocirc;ng y&ecirc;u c???u thu h???): B???i th?????ng b???n (04) l???n c?????c ph&iacute; d???ch v???/????n
                    h&agrave;ng.&nbsp;</span>

            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.2&nbsp;</strong>?????i v???i nh&agrave; v???n chuy???n GHN
                        Express</span></strong>

            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.2.1</strong>&nbsp;????n h&agrave;ng
                            b??? m???t, th???t l???c&nbsp;</span></em></strong>

            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'>3.2.1.1&nbsp;&Aacute;p d???ng cho
                        ????n h&agrave;ng c&oacute; tr???ng l?????ng d?????i 10 kg</span></em></li>
        </ol>
        <table style="width: 4.8e+2pt;margin-left:.9pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td colspan="2" rowspan="2" style="width:10pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>STT</span></strong>
                        </p>
                    </td>
                    <td colspan="2" style="width:99.0pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&igrave;nh
                                    tr???ng</span></strong>
                        </p>
                    </td>
                    <td colspan="3" style="width:270.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? h&agrave;ng
                                    h&oacute;a</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:30.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khai
                                    gi&aacute;</span></strong>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a ????n
                                    VAT</span></strong>
                        </p>
                    </td>
                    <td style="width:90pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'><strong>D?????i 1 tri???u VND</strong></span>
                        </p>
                    </td>
                    <td style="width:90pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 1 tri???u VND ?????n d?????i 3
                                    tri???u VND</span></strong>
                        </p>
                    </td>
                    <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 3 tri???u VND tr???
                                    l&ecirc;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 10pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1</span>
                        </p>
                    </td>
                    <td style="width: 30pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width: 54pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- B???i th?????ng 100 % gi&aacute; tr??? ????n h&agrave;ng
                                &nbsp;</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- T???i ??a kh&ocirc;ng qu&aacute; 1.000.000 (M???t
                                tri???u ?????ng)</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- B???i th?????ng 100 % gi&aacute; tr??? ????n h&agrave;ng
                                &nbsp;</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- T???i ??a kh&ocirc;ng qu&aacute; 3.000.000 (Ba
                                tri???u ?????ng)</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp; B???i th?????ng 100 % gi&aacute; tr???
                                        ????n h&agrave;ng&nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; T???i ??a kh&ocirc;ng
                                        qu&aacute; 5.000.000 (N??m tri???u ?????ng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 30pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>2</span>
                        </p>
                    </td>
                    <td style="width: 30pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width: 54pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 75 % gi&aacute; tr??? ????n
                                        h&agrave;ng &nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute;
                                        1.000.000 (M???t tri???u ?????ng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 75 % gi&aacute; tr??? ????n
                                        h&agrave;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute;
                                        3.000.000 (Ba tri???u ?????ng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>-&nbsp;&nbsp; B???n (04) l???n C?????c
                                ph&iacute; D???ch v???</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 30pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>3</span>
                        </p>
                    </td>
                    <td style="width: 30pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width: 54pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 100 % gi&aacute; tr??? ????n
                                        h&agrave;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute;
                                        1.000.000 (M???t tri???u ?????ng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???n (04) l???n C?????c ph&iacute; D???ch
                                        v???</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???n (04) l???n C?????c ph&iacute; D???ch
                                        v???</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 30pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>4</span>
                        </p>
                    </td>
                    <td style="width: 30pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width: 54pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 75 % gi&aacute; tr??? ????n
                                        h&agrave;ng &nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute;
                                        1.000.000 (M???t tri???u ?????ng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???n (04) l???n C?????c ph&iacute; D???ch
                                        v???</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???n (04) l???n C?????c ph&iacute; D???ch
                                        v???</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                    <td style="border:none;"><br></td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>3.2.2&nbsp;</strong>Tr?????ng
                                h???p</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;????n h&agrave;ng b??? h?? h???ng
                                (&aacute;p d???ng cho t???t c??? ????n h&agrave;ng v???i t???t c??? tr???ng l?????ng kh&aacute;c
                                nhau)</span></em></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? b???i th?????ng s??? ph??? thu???c v&agrave;o m???c
                ????? h?? h???ng c???a B??u g???i, c??? th??? ???????c x&aacute;c ?????nh nh?? sau:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? b???i th?????ng h?? h???ng = M???c
                        b???i th?????ng (theo b???ng m???t h&agrave;ng) x T??? l??? b???i th?????ng</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>(xem b???ng t??? l??? b???i th?????ng ph&iacute;a
                        d?????i)</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.2.2.1&nbsp;</strong>B???ng t??? l??? b???i th?????ng h?? h???ng</span></em>
                </li>
            </ol>
        </div>
        <table style="width: 4.5e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td rowspan="2" style="width:256.25pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lo???i h?? h???ng</span></strong>
                        </p>
                    </td>
                    <td style="width:198.0pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? l??? b???i
                                    th?????ng</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>????n h&agrave;ng c&oacute;
                                    tr???ng l?????ng d?????i 10 kg</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>R&aacute;ch, ?????t v??? th&ugrave;ng
                                h&agrave;ng</span>
                        </p>
                    </td>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:24.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v??? g&oacute;i b???c, r&aacute;ch tem
                                (?????i v???i h&agrave;ng ??i???n t??? v&agrave; h&agrave;ng h&oacute;a c&ograve;n nguy&ecirc;n
                                v???n)</span>
                        </p>
                    </td>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>10 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t, thi???u ph??? ki???n, h&agrave;ng
                                h&oacute;a ????n l??? (kh&ocirc;ng ???nh h?????ng ?????n s???n ph???m)</span>
                        </p>
                    </td>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:15.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>10 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:50.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v??? h?? h???i kh&ocirc;ng ???nh h?????ng
                                t???i c&ocirc;ng n??ng</span>
                        </p>
                    </td>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:50.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>30 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v???, h?? h???i ???nh h?????ng t???i
                                c&ocirc;ng n??ng</span>
                        </p>
                    </td>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>100 %</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.3&nbsp;</strong>?????i v???i nh&agrave; v???n chuy???n J&amp;T</span></strong>
            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.1&nbsp;</strong>Tr?????ng h???p B??u g???i b??? m???t,
                            tr&aacute;o ?????i to&agrave;n ph???n</span></em></strong></li>
        </ol>
        <table style="width: 4.7e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td rowspan="2" style="width:35.75pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>STT</span></strong>
                        </p>
                    </td>
                    <td colspan="2" style="width:112.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&igrave;nh
                                    tr???ng</span></strong>
                        </p>
                    </td>
                    <td colspan="2" style="width:319.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; tr??? h&agrave;ng
                                    h&oacute;a</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:58.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khai
                                    gi&aacute;</span></strong>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a
                                    ????n</span></strong>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&le; 3 tri???u
                                    ?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 3 tri???u tr???
                                    l&ecirc;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:35.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>1</span>
                        </p>
                    </td>
                    <td style="width:58.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 100 % gi&aacute; tr??? ????n
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>T???i ??a kh&ocirc;ng qu&aacute; 3.000.000 (Ba tri???u
                                ?????ng)</span>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 100 % gi&aacute; tr??? ????n
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute; 30.000.000 (Ba
                                m????i tri???u ?????ng)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:35.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>2</span>
                        </p>
                    </td>
                    <td style="width:58.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>C&oacute;</span>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;B???i th?????ng 100 % gi&aacute; tr??? ????n
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;T???i ??a kh&ocirc;ng qu&aacute; 3.000.000 (Ba
                                tri???u ?????ng)</span>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>T???i ??a kh&ocirc;ng qu&aacute; 3.000.000 (Ba tri???u
                                ?????ng)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:35.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>3</span>
                        </p>
                    </td>
                    <td style="width:58.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>C&oacute;</span>
                        </p>
                    </td>
                    <td colspan="2" rowspan="2" style="width:319.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; tr??? b???i th?????ng &nbsp; &nbsp; t???i ??a 04
                                (b???n) l???n c?????c</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:35.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>4</span>
                        </p>
                    </td>
                    <td style="width:58.5pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                    <td style="width:54.0pt;border-top:none;border-left:none;border-bottom:  solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Kh&ocirc;ng</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.2&nbsp;</strong>Tr?????ng h???p B??u g???i b??? h??
                                h???ng</span></em></strong>
                </li>
            </ol>
        </div>
        <ul style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p d???ng theo ch&iacute;nh s&aacute;ch b???i
                    th?????ng m???t h&agrave;ng (tr?????ng h???p c&oacute; khai gi&aacute;), tuy nhi&ecirc;n gi&aacute; tr??? b???i th?????ng ph???
                    thu???c v&agrave;o m???c ????? h?? h???ng c???a B??u g???i <em>(% h?? h???ng</em> <em>s??? ???????c th???a thu???n d???a v&agrave;o
                        th&ocirc;ng tin tr&ecirc;n Bi&ecirc;n b???n ?????ng ki???m, h&igrave;nh ???nh ?????ng ki???m gi???a J&amp;T v&agrave;
                        Ng?????i g???i)</em></span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p d???ng theo ch&iacute;nh s&aacute;ch b???i
                    th?????ng m???t h&agrave;ng (tr?????ng h???p kh&ocirc;ng khai gi&aacute;), tuy nhi&ecirc;n gi&aacute; tr??? b???i th?????ng
                    ph??? thu???c v&agrave;o m???c ????? h?? h???ng c???a ????n h&agrave;ng ????? &aacute;p d???ng ch&iacute;nh s&aacute;ch b???i
                    th?????ng. <em>(Xem b???ng t??? l??? b???i th?????ng ph&iacute;a d?????i)</em></span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.2.1&nbsp;</strong>B???ng t??? l??? b???i th?????ng h?? h???ng</span></em>
                </li>
            </ol>
        </div>
        <table style="width: 4.6e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lo???i h?? h???ng</span></strong>
                        </p>
                    </td>
                    <td style="width:121.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? l??? b???i
                                    th?????ng</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>R&aacute;ch, ?????t v??? th&ugrave;ng
                                h&agrave;ng</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>5 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:24.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v??? g&oacute;i b???c, r&aacute;ch tem
                                (?????i v???i h&agrave;ng ??i???n t??? v&agrave; h&agrave;ng h&oacute;a c&ograve;n nguy&ecirc;n
                                v???n)</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>10 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t, thi???u ph??? ki???n, h&agrave;ng
                                h&oacute;a ????n l??? (kh&ocirc;ng ???nh h?????ng ?????n s???n ph???m)</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:15.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>20 %</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:50.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v??? h?? h???i kh&ocirc;ng ???nh h?????ng
                                t???i c&ocirc;ng n??ng</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:50.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50 % (?????i v???i h?? h???ng t??? 31 % - 50
                                %)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>B??? v???, h?? h???i ???nh h?????ng t???i
                                c&ocirc;ng n??ng</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>100 %</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 4: TH???I H???N V&Agrave; TH???I GIAN X???
                        L&Yacute; KHI???U N???I</span></strong>
            </p>
        </div>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'><strong>4.1&nbsp;</strong>Th???i h???n khi???u
                                n???i</span></em></strong>
                </li>
            </ol>
        </div>
        <ul class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'>- Hai (02)&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>th&aacute;ng</span><span style='font-family:"DejaVu Sans",serif;'>, k??? t??? ng&agrave;y k???t th&uacute;c Th???i gian to&agrave;n
                    tr&igrave;nh c???a B??u g???i ?????i v???i khi???u n???i v??? vi???c m???t B??u g???i.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'>- M???t (01) th&aacute;ng, k??? t??? ng&agrave;y B??u
                    g???i ???????c ph&aacute;t cho Ng?????i nh???n ?????i v???i khi???u n???i v??? vi???c B??u g???i b??? suy suy???n, h?? h???ng, v??? gi&aacute;
                    c?????c, chuy???n ph&aacute;t B??u g???i ch???m so v???i Th???i gian to&agrave;n tr&igrave;nh ??&atilde; c&ocirc;ng b???
                    v&agrave; c&aacute;c n???i dung kh&aacute;c c&oacute; li&ecirc;n quan tr???c ti???p ?????n B??u g???i.</span>

            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'><strong>4.2&nbsp;</strong>Th???i gian x???
                            l&yacute; khi???u n???i</span></em></strong></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- ????n h&agrave;ng sau khi ???????c IMD nh???n th&ocirc;ng
                    tin s??? ???????c ki???m tra v&agrave; chuy???n sang Nh&agrave; v???n chuy???n trong v&ograve;ng 30 ph&uacute;t.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Th???i gian k???t th&uacute;c, ??&oacute;ng khi???u n???i
                    s??? kh&ocirc;ng qu&aacute; 01 (m???t) ng&agrave;y sau khi nh&agrave; v???n chuy???n tr??? k???t qu???</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- ?????i v???i c&aacute;c ????n h&agrave;ng m???t, h?? h???ng
                    h&agrave;ng, ti???n b???i th?????ng s??? ???????c chuy???n kh&ocirc;ng ch???m h??n m?????i (10) ng&agrave;y l&agrave;m vi???c tr???
                    khi b??? khi ch???i b???i th?????ng.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 5: HI???U L???C</span></strong>
            </p>
        </div>
        <ul style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y c&oacute; hi???u l???c k??? t???
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; ph???n kh&ocirc;ng th??? t&aacute;ch r???i c???a H???p
                    ?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y ???????c l???p th&agrave;nh hai (02)
                    b???n c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; nh?? nhau, m???i b&ecirc;n gi??? m???t (01) b???n.</span></li>
        </ul>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ?????C</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    B</span></strong>
                                </p>
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                                </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:300px" alt="">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH??? L???C 02</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>B???NG C?????C PH&Iacute; D???CH V??? V&Agrave; PH???
                    PH&Iacute; GIA T??NG</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(??&iacute;nh k&egrave;m H???p ?????ng H???p t&aacute;c
                    D???ch v??? v???n chuy???n <strong>s??? <?= date("dm"); ?> /<?= date("Y"); ?>/H??HT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>gi???a c&ocirc;ng ty C&ocirc;ng ty C??? ph???n C&ocirc;ng ngh??? v&agrave; D???ch v???
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau ??&acirc;y g???i l&agrave; &ldquo;<strong>H???p
                        ?????ng</strong>&rdquo;)</em></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 1. GI&Aacute; C?????C V???N
                        CHUY???N</span></strong>
            </p>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>B???ng C?????c ph&iacute; D???ch v??? v&agrave; ph??? ph&iacute;
                gia t??ng n&agrave;y c&oacute; hi???u l???c trong v&ograve;ng 01 (m???t)n??m, n???u c&oacute; thay ?????i IMD s??? b&aacute;o
                tr?????c cho kh&aacute;ch h&agrave;ng 03 (ba) ng&agrave;y b???ng email ho???c v??n b???n ho???c th&ocirc;ng b&aacute;o
                tr&ecirc;n website&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:black;text-decoration:none;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;&nbsp;</span>
        </p>
        <ol style="list-style-type: upper-roman;margin-left:1cmundefined;">
            <li><strong><u><span style='font-family:"DejaVu Sans",serif;'>NH&Agrave; V???N CHUY???N HOLASHIP</span></u></strong>
                <ol style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1.</strong>B???ng gi&aacute; (&aacute;p d???ng n???i
                                th&agrave;nh, ngo???i th&agrave;nh H&agrave; N???i v&agrave; H??? Ch&iacute; Minh)</span></strong>
                    </li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width:418.25pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width: 117pt;border: 1pt solid windowtext;background: rgb(198, 217, 241);padding: 0cm;height: 15.55pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T???nh</span></strong>
                            </p>
                        </td>
                        <td style="width:94.25pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>C&acirc;n
                                        n???ng</span></strong>
                            </p>
                        </td>
                        <td style="width:90.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>N???i
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                        <td style="width:117.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 0cm 0cm 0cm;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ngo???i
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width:117.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 0cm 0cm 0cm;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave; N???i</span>
                            </p>
                        </td>
                        <td style="width:94.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>0 kg &ndash; 5 kg</span>
                            </p>
                        </td>
                        <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>15.000</span>
                            </p>
                        </td>
                        <td style="width:117.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>15.000</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:94.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>+ 1 kg</span>
                            </p>
                        </td>
                        <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>3.000</span>
                            </p>
                        </td>
                        <td style="width:117.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>3.000</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width:117.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 0cm 0cm 0cm;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H??? Ch&iacute; Minh</span>
                            </p>
                        </td>
                        <td style="width:94.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>0 kg &ndash; 5 kg</span>
                            </p>
                        </td>
                        <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>15.000</span>
                            </p>
                        </td>
                        <td style="width:117.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>16.500</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:94.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>+ 1 kg</span>
                            </p>
                        </td>
                        <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>3.000</span>
                            </p>
                        </td>
                        <td style="width:117.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>3.000</span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;margin-left:1cmundefined;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>- Quy</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;?????nh n???i th&agrave;nh v&agrave; ngo???i
                            th&agrave;nh t???i H&agrave; N???i v&agrave; H??? Ch&iacute; Minh:</span></strong>
                </li>
            </ul>
        </div>
        <table style="width:418.5pt;margin-left:26.75pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:99.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Khu
                                v???c</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>N???i
                                th&agrave;nh</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ngo???i
                                th&agrave;nh</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 42.25pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>H&agrave; N???i</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:42.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>Q. Ba ??&igrave;nh, Q. T&acirc;y H???, Q. C???u
                                Gi???y, Q. Thanh Xu&acirc;n, Q. Ho&agrave;n Ki???m, Q. ?????ng ??a, Q. Hai B&agrave; Tr??ng</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:42.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Q. Ho&agrave;ng Mai, Q. B???c T??? Li&ecirc;m, Q. Nam
                                T??? Li&ecirc;m, Q. Long Bi&ecirc;n, Q. H&agrave; ??&ocirc;ng &nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>H??? Ch&iacute; Minh</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>Q.1, Q.3, Q.4, Q.5, Q.6, Q.7, Q.8, Q.10, Q.11,
                                Q. G&ograve; V???p, Q. T&acirc;n B&igrave;nh, Q. T&acirc;n Ph&uacute;, Q. B&igrave;nh Th???nh, Q.
                                Ph&uacute; Nhu???n</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Q.2, Q.9, Q.12, Q.Th??? ?????c, Q.B&igrave;nh
                                T&acirc;n</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>D???ch</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;v??? gia t??ng</span></strong>
                </li>
            </ol>
        </div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.2e+2pt;border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width:108.0pt;border:solid black 1.0pt;border-right:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n d???ch
                                        v???</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c c?????c</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu h???</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Mi???n ph&iacute;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>M???c thu h??? t???i ??a
                                            l&agrave; 10.000.000 VN??</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; khai
                                        gi&aacute;</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>D?????i 3.000.000 VN?? mi???n
                                            ph&iacute;&nbsp;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 3.000.001 &ndash;
                                            10.000.000 VN?? t&iacute;nh ph&iacute; 1 % gi&aacute; tr??? h&agrave;ng
                                            h&oacute;a</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; giao tr??? 1
                                        ph???n</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>50% c?????c ph&iacute; chi???u
                                            ??i&nbsp;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuy???n
                                        ho&agrave;n</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Mi???n</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;ph&iacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; h&agrave;ng c???ng
                                        k???nh</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i chi???u kh&ocirc;ng
                                            qu&aacute; 30 cm</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>V???i h&agrave;ng
                                            h&oacute;a c&oacute; k&iacute;ch th?????c l???n h??n 30 cm th&igrave; c???n c&oacute; s???
                                            kh???o s&aacute;t v&agrave; ??&aacute;nh gi&aacute; th???c t??? t??? b??? ph???n v???n
                                            h&agrave;nh</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng th???c quy ?????i
                                            s??? ???????c t&iacute;nh khi m???t chi???u l???n h??n 30 cm:</span>
                                    </li>
                                    <li>
                                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                            <ol style="margin-bottom:0cm;list-style-type: circle;">
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng
                                                        quy ?????i = [Chi???u d&agrave;i (cm) x Chi???u r???ng (cm) x Chi???u cao (cm)] /
                                                        5.000</span>
                                                </li>
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng
                                                        n&agrave;o l???n h??n th&igrave; t&iacute;nh theo kh???i l?????ng
                                                        ??&oacute;&nbsp;</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;'><span style="text-decoration: none;">&nbsp;</span></span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.</strong>Chi???t kh???u theo l?????ng ????n</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>?????i v???i khu v???c H&agrave; N???i:</span></em>
        </p>
        <table style="width: 4.1e+2pt;border: none;margin-left:22.25pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>L?????ng ????n giao, tr???
                                    th&agrave;nh c&ocirc;ng/ng&agrave;y</span></strong>
                        </p>
                    </td>
                    <td style="width:144.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Chi???t kh???u</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>K??? thanh
                                    to&aacute;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 100 ????n ?????n 300 ????n</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1.000 VN??/????n</span>
                        </p>
                    </td>
                    <td rowspan="2" style="width:162.0pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo ng&agrave;y</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Th??? 2 h&agrave;ng tu???n</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 15 h&agrave;ng
                                        th&aacute;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 5 th&aacute;ng
                                        ti???p theo</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 300 ????n tr??? l&ecirc;n</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>2.000 VN??/????n</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>?????i v???i kh&aacute;ch h&agrave;ng ??? H??? Ch&iacute;
                    Minh:</span></em>
        </p>
        <table style="width: 4.1e+2pt;border: none;margin-left:22.25pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>L?????ng ????n giao, tr???
                                    th&agrave;nh c&ocirc;ng/ng&agrave;y</span></strong>
                        </p>
                    </td>
                    <td style="width:144.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Chi???t kh???u</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>K??? thanh
                                    to&aacute;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>T??? 100 ????n tr??? l&ecirc;n</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1.000 VN??/????n</span>
                        </p>
                    </td>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo ng&agrave;y</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Th??? 2 h&agrave;ng tu???n</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 15 h&agrave;ng
                                        th&aacute;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 5 th&aacute;ng
                                        ti???p theo</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'><br>&nbsp;L??u &yacute;:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>L?????ng</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;????n ???????c t&iacute;nh chi???t kh???u
                = T???ng s??? ????n giao,</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>tr??? th&agrave;nh c&ocirc;ng / S???
                ng&agrave;y l&ecirc;n ????n</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;</span>
        </p>
        <ol style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><u><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'><strong>II.</strong>NH&Agrave; V???N CHUY???N GHN EXPRESS</span></u></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1.</strong>B???ng gi&aacute; d???ch
                                v???&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>(??&atilde; bao g???m
                            VAT)</span></li>
                    <li><em><span style="color:black;"><strong>1.1 </strong>B???ng</span></em><em><span style="">&nbsp;gi&aacute; &aacute;p d???ng t??? 0
                                &ndash; 5 kg</span></em></li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-indent:18.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <table style="width: 4.1e+2pt;margin-left:22.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:49.5pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy???n</span></strong>
                        </p>
                    </td>
                    <td style="width:67.5pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:63.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>N???i
                                    th&agrave;nh</span></strong>
                        </p>
                    </td>
                    <td style="width:72.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Huy???n/x&atilde;</span></strong>
                        </p>
                    </td>
                    <td style="width:81.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Th&ecirc;m 0,5 kg
                                    (h&agrave;ng d?????i 4 kg)</span></strong>
                        </p>
                    </td>
                    <td style="width:81.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Th&ecirc;m 0,5 kg
                                    (h&agrave;ng tr&ecirc;n 4 kg)</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" style="width:49.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>To&agrave;n qu???c</span></strong>
                        </p>
                    </td>
                    <td style="width:67.5pt;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 kg &ndash; 0,5 kg</span>
                        </p>
                    </td>
                    <td colspan="2" style="width:135.0pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>24.000</span>
                        </p>
                    </td>
                    <td rowspan="3" style="width:81.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>4.000</span>
                        </p>
                    </td>
                    <td rowspan="3" style="width:81.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>7.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:67.5pt;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0,5 kg &ndash; 1 kg&nbsp;</span>
                        </p>
                    </td>
                    <td colspan="2" style="width:135.0pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>26.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:67.5pt;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1 kg &ndash; 2 kg</span>
                        </p>
                    </td>
                    <td colspan="2" style="width:135.0pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>29.000</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <em><span style='font-family:"DejaVu Sans",serif;'><strong>1.2 </strong>B???ng gi&aacute; &aacute;p d???ng t??? 5 kg tr???
                            l&ecirc;n</span></em>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.1e+2pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width:90.25pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy???n</span></strong>
                            </p>
                        </td>
                        <td style="width:73.55pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i
                                        l?????ng</span></strong>
                            </p>
                        </td>
                        <td style="width:79.45pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>N???i
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                        <td style="width:81.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Huy???n/x&atilde;</span></strong>
                            </p>
                        </td>
                        <td style="width:89.75pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Th&ecirc;m
                                        1</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>kg</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:90.25pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>To&agrave;n qu???c</span></strong>
                            </p>
                        </td>
                        <td style="width:73.55pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>5 kg</span>
                            </p>
                        </td>
                        <td colspan="2" style="width:160.45pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;'>3</span><span style='font-family:"DejaVu Sans",serif;'>9.</span><span style='font-family:"DejaVu Sans",serif;'>000</span>
                            </p>
                        </td>
                        <td style="width:89.75pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;'>7</span><span style='font-family:"DejaVu Sans",serif;'>.</span><span style='font-family:"DejaVu Sans",serif;'>000</span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>D???ch v??? gia t??ng</span></strong>
                </li>
            </ol>
        </div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.1e+2pt;border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width:89.1pt;border:solid black 1.0pt;border-right:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.5pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n d???ch
                                        v???</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.5pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c c?????c</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu h???</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.9pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>Mi???n ph&iacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuy???n
                                        ho&agrave;n</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>Mi???n ph&iacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:40.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;&nbsp;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>khai
                                        gi&aacute;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:40.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>D?????i</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;3</span><span style='font-family:"DejaVu Sans",serif;'>.</span><span style='font-family:"DejaVu Sans",serif;'>000</span><span style='font-family:"DejaVu Sans",serif;'>.</span><span style='font-family:"DejaVu Sans",serif;'>000 VN??&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>m</span><span style='font-family:"DejaVu Sans",serif;'>i???n&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>p</span><span style='font-family:"DejaVu Sans",serif;'>h&iacute;&nbsp;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>T</span><span style='font-family:"DejaVu Sans",serif;'>???</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>3.000.001 &ndash;
                                            10.000.000</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;VN??&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>t&iacute;nh ph&iacute;</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;0,5</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>% gi&aacute; tr??? h&agrave;ng
                                            h&oacute;a</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:40.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; h&agrave;ng
                                        c???ng k???nh</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:40.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i chi???u kh&ocirc;ng
                                            qu&aacute; 50 cm</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng th???c quy ?????i
                                            s??? ???????c t&iacute;nh khi m???t chi???u l???n h??n 30 cm:</span>
                                    </li>
                                    <li>
                                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                            <ol style="margin-bottom:0cm;list-style-type: circle;">
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng
                                                        quy ?????i = [Chi???u d&agrave;i (cm) x Chi???u r???ng (cm) x Chi???u cao (cm)] /
                                                        5.000</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng n&agrave;o l???n
                                            h??n th&igrave; t&iacute;nh theo kh???i l?????ng ??&oacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></strong>
        </p>
        <ol style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><u><span style='font-family:"DejaVu Sans",serif;'><strong>III.</strong>NH&Agrave;
                            V???N&nbsp;</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'>CHUY???N</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'>&nbsp;J&amp;T EXPRESS</span></u></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1. </strong>B???ng</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;gi&aacute; d???ch v???&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>(??&atilde; bao g???m VAT)</span></li>
                    <li><strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>1.1 </strong>??i t???
                                    H&agrave;</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;N???i</span></em></strong></li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;text-indent:18.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <table style="width:426.35pt;margin-left:14.4pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:106.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy???n</span></strong>
                        </p>
                    </td>
                    <td style="width:149.35pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:171.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c C?????c</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" style="width:106.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>N???i t???nh&nbsp;<br>&nbsp;(H&agrave; N???i ??i
                                    H&agrave; N???i)</span></strong>
                        </p>
                    </td>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 &ndash; 1 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:7.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>18.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1 &ndash; 2 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>21.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:2.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i 0,5 kg ti???p theo</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:2.9pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>2.500</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="5" style="width:106.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Li&ecirc;n t???nh</span></strong>
                        </p>
                    </td>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 &ndash; 0,05 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>22.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0,05 &ndash; 0,5 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>26.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0,5 &ndash; 1 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>29.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1 &ndash; 2 kg</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>37.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i 0,5 kg ti???p theo</span>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>4.000</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <em><u><span style='font-family:"DejaVu Sans",serif;'>L??u &yacute;</span></u></em><em><span style='font-family:"DejaVu Sans",serif;'>: C?????c ph&iacute; chuy???n ho&agrave;n cho kh&aacute;ch
                    h&agrave;ng g???i h&agrave;ng t??? H&agrave; N???i</span></em>
        </p>
        <table style="border: none;width:323.05pt;margin-left:68.2pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? l??? ho&agrave;n trong
                                    th&aacute;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:169.05pt;border:solid windowtext 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; chuy???n
                                    ho&agrave;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 - 10%</span>
                        </p>
                    </td>
                    <td style="width:169.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mi???n ho&agrave;n</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>&ge; 10%</span>
                        </p>
                    </td>
                    <td style="width:169.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% c?????c ph&iacute; v???n chuy???n chi???u
                                ??i&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-27.0pt;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng th???c t&iacute;nh t??? l??? ho&agrave;n trong
                    th&aacute;ng nh?? sau</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; T??? l???
                    &nbsp;ho&agrave;n <span style="color:black;">= T???ng ????n ho&agrave;n / (T???ng ????n g???i - ????n
                        h???y)</span></span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>1.2 </strong>??i&nbsp;</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>t???</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;TP H??? Ch&iacute; Minh</span></em></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <table style="width:394.45pt;margin-left:14.4pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:99.9pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy???n</span></strong>
                        </p>
                    </td>
                    <td style="width:161.9pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:132.65pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c c?????c</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width:99.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:26.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>N???i t???nh&nbsp;<br>&nbsp;(HCM ??i
                                    HCM)</span></strong>
                        </p>
                    </td>
                    <td style="width:161.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 kg &ndash; 2 kg</span>
                        </p>
                    </td>
                    <td style="width:132.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>21.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:161.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i 0,5 kg ti???p theo</span>
                        </p>
                    </td>
                    <td style="width:132.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>2.500</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <table style="width:397.6pt;margin-left:13.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy???n</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh???i l?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:127.6pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c c?????c</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="5" style="width:108.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Li&ecirc;n t???nh</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 kg &ndash; 0,2 kg</span>
                        </p>
                    </td>
                    <td style="width:127.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>23.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0,2 kg &ndash; 0,5 kg</span>
                        </p>
                    </td>
                    <td style="width:127.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>25.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0,5 kg &ndash; 1 kg</span>
                        </p>
                    </td>
                    <td style="width:127.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>27.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1 kg &ndash; 2 kg</span>
                        </p>
                    </td>
                    <td style="width:127.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>35.000</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???i 0,5 kg ti???p theo</span>
                        </p>
                    </td>
                    <td style="width:127.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>5.000</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <em><u><span style='font-family:"DejaVu Sans",serif;'>L??u &yacute;</span></u></em><em><span style='font-family:"DejaVu Sans",serif;'>: C?????c ph&iacute; chuy???n ho&agrave;n cho kh&aacute;ch
                    h&agrave;ng g???i h&agrave;ng t??? H??? Ch&iacute; Minh</span></em>
        </p>
        <table style="border: none;width:323.05pt;margin-left:68.2pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T??? l??? ho&agrave;n trong
                                    th&aacute;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:169.05pt;border:solid windowtext 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; chuy???n
                                    ho&agrave;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>0 - 10%</span>
                        </p>
                    </td>
                    <td style="width:169.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mi???n ho&agrave;n</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;border-top:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>&ge; 10%</span>
                        </p>
                    </td>
                    <td style="width:169.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% c?????c ph&iacute; v???n chuy???n chi???u
                                ??i&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng th???c t&iacute;nh t??? l??? ho&agrave;n trong
                    th&aacute;ng nh?? sau</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; T??? l???
                    &nbsp;ho&agrave;n <span style="color:black;">= T???ng ????n ho&agrave;n / (T???ng ????n g???i - ????n
                        h???y)</span></span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>D???ch</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;v??? gia t??ng</span></strong>
                </li>
            </ol>
        </div>
        <table style="float: left;width: 4.2e+2pt;border: none;border-collapse:collapse;margin-left:6.75pt;margin-right: 6.75pt;">
            <tbody>
                <tr>
                    <td style="width:98.75pt;border:solid black 1.0pt;border-right:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n d???ch
                                    v???</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c
                                    ph&iacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu h???</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Mi???n ph&iacute;</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuy???n
                                    ho&agrave;n</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.45pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>D???a theo t??? l??? ho&agrave;n th???c t???</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;&nbsp;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>khai
                                    gi&aacute;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>1,1 % gi&aacute; tr??? h&agrave;ng
                                        h&oacute;a</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; h&agrave;ng c???ng
                                    k???nh</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>M???i chi???u kh&ocirc;ng qu&aacute; 50
                                        cm</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng th???c quy ?????i s??? ???????c
                                        t&iacute;nh khi m???t chi???u l???n h??n 30 cm:</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Kh???i l?????ng quy ?????i = [Chi???u d&agrave;i
                                        (cm) x Chi???u r???ng (cm) x Chi???u cao (cm)] / 6.000</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Kh???i l?????ng n&agrave;o l???n h??n th&igrave;
                                        t&iacute;nh theo kh???i l?????ng ??&oacute;</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 2. HI???U L???C</span></strong>
        </p>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y c&oacute; hi???u l???c k??? t???
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; ph???n kh&ocirc;ng th??? t&aacute;ch r???i c???a H???p
                    ?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y ???????c l???p th&agrave;nh hai (02)
                    b???n c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; nh?? nhau, m???i b&ecirc;n gi??? m???t (01) b???n.&nbsp;</span>
            </li>
        </ul>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ?????C</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    B</span></strong>
                                </p>
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                                </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:300px" alt="">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH??? L???C 03</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>B???NG C?????C PH&Iacute; V&Agrave; CH&Iacute;NH
                    S&Aacute;CH B???I TH?????NG G&Oacute;I C?????C SI&Ecirc;U T???C</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(??&iacute;nh k&egrave;m H???p ?????ng H???p t&aacute;c
                    D???ch v??? v???n chuy???n <strong>s??? <?= date("dm"); ?> /<?= date("Y"); ?>/H??HT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>gi???a c&ocirc;ng ty C&ocirc;ng ty C??? ph???n C&ocirc;ng ngh??? v&agrave; D???ch v???
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau ??&acirc;y g???i l&agrave; &ldquo;<strong>H???p
                        ?????ng</strong>&rdquo;)</em></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 1. B???NG GI&Aacute; V&Agrave; D???CH V??? GIA
                    T??NG&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>B???ng</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;C?????c ph&iacute; D???ch v??? v&agrave; ph??? ph&iacute;
                gia t??ng n&agrave;y c&oacute; hi???u l???c trong v&ograve;ng 01 (m???t) n??m, n???u c&oacute; thay ?????i IMD s??? b&aacute;o
                tr?????c cho kh&aacute;ch h&agrave;ng 03 (ba) ng&agrave;y b???ng email ho???c v??n b???n ho???c th&ocirc;ng b&aacute;o
                tr&ecirc;n website&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:#0563C1;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:324.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;'>????n v???: VN??</span></em>
        </p>
        <table style="width:360.0pt;margin-left:58.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td colspan="2" style="width:360.0pt;border:solid windowtext 1.0pt;background:#F8CBAD;padding:0cm 5.4pt 0cm 5.4pt;height:20.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-size:16px;line-height:  130%;font-family:"DejaVu Sans",serif;color:black;'>B???ng
                                    gi&aacute; HOLASHIP</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n
                                    d???ch v???</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>SI&Ecirc;U
                                    T???C</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Th???i
                                    gian giao h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>T???i
                                ??a 1 gi??? (v???i ????n h&agrave;ng ?????u ti&ecirc;n)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>S???
                                    ??i???m d???ng m???c ?????nh</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>1
                                ??i???m d???ng/ ????n h&agrave;ng</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    ??i???m d???ng v?????t qu&aacute; s??? ??i???m d???ng m???c ?????nh</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>5 000
                                VN??/ ??i???m</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>S???
                                    ????n h&agrave;ng m???c ?????nh/ ??i???m d???ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>1 ????n
                                h&agrave;ng/ ??i???m</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    ????n h&agrave;ng v?????t qu&aacute; tr&ecirc;n ??i???m d???ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>5 000
                                VN??/ ????n</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    qu&atilde;ng ???????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>3km
                                ?????u: 21 000 VN??<br>&nbsp;Tr&ecirc;n 3km: 5 000 VN??/ km</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:24.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph???
                                    ph&iacute; d???ch v??? giao h&agrave;ng t???m ???ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>COD
                                &lt; 2 000 000 VN??: Mi???n ph&iacute;<br>&nbsp;COD &ge; 2 000 000 VN??: 0,5% gi&aacute; tr???
                                COD</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    quay ?????u</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>70%
                                c?????c qu&atilde;ng ???????ng t??? ??i???m xa nh???t ?????n ??i???m g???i</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    ho&agrave;n</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>50%
                                c?????c qu&atilde;ng ???????ng t??? ??i???m xa nh???t ?????n ??i???m g???i</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;:</span>
        </p>
        <ul style="list-style-type: none;margin-left:2.0500000000000007px;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- B???ng gi&aacute; ??&atilde; bao g???m VAT.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- &Aacute;p d???ng t???i n???i th&agrave;nh H&agrave; N???i.</span>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 2. CH&Iacute;NH S&Aacute;CH B???I
                    TH?????NG</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>I. QUY ?????NH CHUNG V??? B???I TH?????NG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1 </strong>S??? ti???n b???i th?????ng t???i ??a s??? kh&ocirc;ng v?????t
                    qu&aacute; gi&aacute; tr??? h&agrave;ng h&oacute;a.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2 </strong>Tr?????ng h???p ????n h&agrave;ng x???y ra l???i do
                    ph&iacute;a kh&aacute;ch h&agrave;ng (Ng?????i g???i) ho???c do ?????c t&iacute;nh t??? nhi&ecirc;n c???a ????n h&agrave;ng
                    h&oacute;a, IMD s??? kh&ocirc;ng ch???u m???i tr&aacute;ch nhi???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3 </strong>T???t c??? c&aacute;c tr?????ng h???p ????n h&agrave;ng b???
                    C?? quan nh&agrave; n?????c c&oacute; th???m quy???n thu gi???, ho???c ti&ecirc;u h???y do kh&aacute;ch h&agrave;ng vi
                    ph???m quy ?????nh c???a ph&aacute;p lu???t IMD t??? ch???i h??? tr??? v&agrave; kh&ocirc;ng ch???u m???i tr&aacute;ch
                    nhi???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4 </strong>IMD t??? ch???i ti???p nh???n v&agrave; x??? l&yacute;
                    khi???u n???i ph&aacute;t sinh trong tr?????ng h???p kh&aacute;ch h&agrave;ng kh&ocirc;ng th???c hi???n ?????y ????? c&aacute;c
                    quy ?????nh v??? g???i h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5 </strong>?????i v???i ????n h&agrave;ng ???????c b???i th?????ng d???a
                    tr&ecirc;n gi&aacute; tr??? h&agrave;ng h&oacute;a, c???n ?????m b???o th???c hi???n c&aacute;c quy ?????nh sau
                    ??&acirc;y:</span></li>
        </ol>
        <ul style="list-style-type: none;margin-left:26px;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Kh&aacute;ch h&agrave;ng ph???i th???c hi???n ?????ng ki???m
                    v???i t&agrave;i x??? nh???n/giao h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- IMD s??? c&oacute; quy???n y&ecirc;u c???u kh&aacute;ch
                    h&agrave;ng cung c???p h&oacute;a ????n, ch???ng t??? h???p l??? c???a ????n h&agrave;ng ????? xem x&eacute;t vi???c x&aacute;c
                    minh ?????n b&ugrave;.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;:&nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a ????n, ch???ng t??? h???p l??? ???????c hi???u
                    l&agrave; bao g???m nh??ng kh&ocirc;ng gi???i h???n t???i c&aacute;c tr?????ng h???p sau:</span></em>
        </p>
        <ul style="list-style-type: disc;margin-left:26px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a ????n gi&aacute; tr??? gia t??ng, n???u ng?????i
                        b&aacute;n l&agrave; doanh nghi???p k&ecirc; khai thu??? gi&aacute; tr??? gia t??ng theo ph????ng ph&aacute;p
                        kh???u tr???</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a ????n b&aacute;n h&agrave;ng, n???u ng?????i
                        b&aacute;n l&agrave; doanh nghi???p k&ecirc; khai thu??? gi&aacute; tr??? gia t??ng theo ph????ng ph&aacute;p
                        tr???c ti???p ho???c H??? kinh doanh.</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H??? s?? k&ecirc; khai h???i quan, n???u h&agrave;ng h&oacute;a
                        ???????c nh???p kh???u v&agrave;o Vi???t Nam</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>II. CH&Iacute;NH S&Aacute;CH B???I
                    TH?????NG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.1 </strong>Tr?????ng h???p h&agrave;ng h&oacute;a b??? m???t,
                        th???t l???c, h?? h???ng l&agrave; ???n ph???m, gi???y t???, h&oacute;a ????n, h???p ?????ng v&agrave; c&aacute;c t&agrave;i
                        li???u d?????i d???ng v??n b???n kh&aacute;c: &nbsp;</span></strong></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip c&oacute; tr&aacute;ch nhi???m b???i th?????ng
                    t???i ??a 04 (b??ap c&oacute; tr&aacute;ch nhi???m b???i th?????ng ?????ng v</span></li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>2.2 </strong>Tr?????ng h???p H&agrave;ng h&oacute;a b??? m???t, th???t l???c,
                        h?? h???ng l&agrave; v???t ph???m, h&agrave;ng h&oacute;a:</span></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><span style='font-family:"DejaVu Sans",serif;'><strong>2.2.1 </strong>Tr?????ng h???p kh&aacute;ch h&agrave;ng c&oacute; s??? d???ng
                            d???ch v??? thu h??? COD:</span></li>
                </ol>
            </li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Tr?????ng h???p m???t, th???t l???c h&agrave;ng h&oacute;a
                    ho???c h&agrave;ng h&oacute;a h?? h???ng d???n ?????n kh&aacute;ch h&agrave;ng t??? ch???i nh???n h&agrave;ng th&igrave;
                    kho???n ti???n b???i th?????ng ch&iacute;nh l&agrave; S??? ti???n t&agrave;i x??? ??&atilde; ???ng COD tr&ecirc;n ????n
                    h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Tr?????ng h?? h???ng h&agrave;ng h&oacute;a.
                    Kh&aacute;ch h&agrave;ng ??&atilde; thanh to&aacute;n COD cho t&agrave;i x??? v&agrave; ph&aacute;t sinh l???i do
                    HolaShip, kho???n ti???n b???i th?????ng ???????c t&iacute;nh theo:</span></li>
        </ul>
        <table style="margin-left:18.0pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>N???i dung b???i
                                    th?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:5.0cm;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ?????n b&ugrave; cho
                                    kh&aacute;ch h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:92.15pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ?????n b&ugrave; t???i ??a
                                    (VN??)</span></strong>
                        </p>
                    </td>
                    <td style="width:136.85pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t h&agrave;ng h&oacute;a c&oacute;
                                h&oacute;a ????n h&oacute;a ????n GTGT</span>
                        </p>
                    </td>
                    <td style="width:5.0cm;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>70% gi&aacute; tr??? h&oacute;a ????n
                                b&aacute;n ra ho???c 100% gi&aacute; tr??? h&oacute;a ????n mua v&agrave;o.</span>
                        </p>
                    </td>
                    <td style="width:92.15pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>5 000 000</span>
                        </p>
                    </td>
                    <td style="width:136.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a ????n ???????c n&ecirc;u t???i m???c
                                n&agrave;y l&agrave; h&oacute;a ????n GTGT ho???c h&oacute;a ????n b&aacute;n h&agrave;ng do c?? quan
                                qu???n l&yacute; thu??? th&ocirc;ng qua</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t h&agrave;ng h&oacute;a
                                kh&ocirc;ng c&oacute; h&oacute;a ????n</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:370.75pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>T???i ??a 04 (b???n) l???n c?????c ph&iacute;
                                ??&atilde; s??? d???ng</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:18.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-family:"DejaVu Sans",serif;'><strong>2.2.2 </strong>Tr?????ng h???p Kh&aacute;ch h&agrave;ng kh&ocirc;ng s??? d???ng
                        d???ch v??? thu h??? COD:</span>
                </li>
            </ol>
        </div>
        <table style="margin-left:18.0pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>N???i dung b???i
                                    th?????ng</span></strong>
                        </p>
                    </td>
                    <td style="width:5.0cm;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ?????n b&ugrave; cho
                                    kh&aacute;ch h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:92.15pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c ?????n b&ugrave; t???i ??a
                                    (VN??)</span></strong>
                        </p>
                    </td>
                    <td style="width:136.85pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t h&agrave;ng h&oacute;a c&oacute;
                                h&oacute;a ????n h&oacute;a ????n GTGT</span>
                        </p>
                    </td>
                    <td style="width:5.0cm;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% gi&aacute; tr??? h&agrave;ng
                                h&oacute;a theo h&oacute;a ????n b&aacute;n ra</span>
                        </p>
                    </td>
                    <td style="width:92.15pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>5 000 000</span>
                        </p>
                    </td>
                    <td style="width:136.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a ????n ???????c n&ecirc;u t???i m???c
                                n&agrave;y l&agrave; h&oacute;a ????n GTGT ho???c h&oacute;a ????n b&aacute;n h&agrave;ng do c?? quan
                                qu???n l&yacute; thu??? th&ocirc;ng qua</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>M???t h&agrave;ng h&oacute;a
                                kh&ocirc;ng c&oacute; h&oacute;a ????n</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:370.75pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>T???i ??a 04 (b???n) l???n c?????c ph&iacute;
                                ??&atilde; s??? d???ng</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;margin-left:1cmundefined;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><strong><span style='font-family:"DejaVu Sans",serif;'><strong>2.3 </strong>Tr?????ng h???p H&agrave;ng h&oacute;a b??? h?? h???ng 01 (m???t)
                            ph???n:</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Kho???n ti???n b???i th?????ng s??? ph??? thu???c v&agrave;o m???c ?????
                h?? h???ng c???a ki???n h&agrave;ng, c??? th??? ???????c x&aacute;c ?????nh nh?? sau:</span>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width: 198.2pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lo???i h??
                                        h???ng</span></strong>
                            </p>
                        </td>
                        <td style="width: 106.35pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>M???c b???i
                                        th?????ng</span></strong>
                            </p>
                        </td>
                        <td style="width: 193.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kho???n ti???n b???i
                                        th?????ng</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b&ecirc;n
                                    ngo&agrave;i con nguy&ecirc;n, tuy nhi&ecirc;n bao b&igrave; b&ecirc;n ngo&agrave;i c???a ki???n
                                    h&agrave;ng b???:<br>&nbsp;- R&aacute;ch, v???, ?????t th&ugrave;ng h&agrave;ng, h???p ?????ng
                                    h&agrave;ng.<br>&nbsp;- R&aacute;ch tem ni&ecirc;m phong c???a nh&agrave; s???n xu???t, s???n ph???m
                                    c&ograve;n nguy&ecirc;n</span>
                            </p>
                        </td>
                        <td style="width:106.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>5%</span>
                            </p>
                        </td>
                        <td rowspan="5" style="width:193.55pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>Kho???n ti???n b???i th?????ng m???t
                                    h&agrave;ng (c??n ch??? ???????c x&aacute;c ?????nh theo m???c 2.1, 2.2) * M???c b???i th?????ng t????ng
                                    ???ng.</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???,
                                    h?? h???i ?????n 30%</span>
                            </p>
                        </td>
                        <td style="width:106.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>30%</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???,
                                    h?? h???i t??? 30% ?????n 50%</span>
                            </p>
                        </td>
                        <td style="width:106.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>50%</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???,
                                    h?? h???i t??? 50% ?????n 70%</span>
                            </p>
                        </td>
                        <td style="width:106.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>70%</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b??? b??? v???,
                                    h?? h???i ?????n tr&ecirc;n 70%</span>
                            </p>
                        </td>
                        <td style="width:106.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>100%</span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <u><span style='font-family:"DejaVu Sans",serif;color:black;'>L??u &yacute;</span></u><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span>
        </p>
        <ul style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trong tr?????ng h???p Kh&aacute;ch h&agrave;ng
                    kh&ocirc;ng cung c???p ???????c H&oacute;a ????n h???p ph&aacute;p c???a H&agrave;ng h&oacute;a th&igrave; b???i th?????ng
                    t???i ??a 04 (b???n) l???n C?????c ph&iacute; D???ch v???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Tr?????ng h???p H&agrave;ng h&oacute;a b??? th???t
                    tho&aacute;t ho???c h?? h???ng m???t ph???n v&agrave; Kh&aacute;ch h&agrave;ng cung c???p ???????c ch???ng t??? H&oacute;a ????n
                    th??? hi???n gi&aacute; tr??? H&agrave;ng h&oacute;a th&igrave; HolaShip c&oacute; tr&aacute;ch nhi???m b???i th?????ng
                    ph???n gi&aacute; tr??? H&agrave;ng h&oacute;a b??? th???t tho&aacute;t ho???c h?? h???ng ??&oacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Tr?????ng h???p H&agrave;ng h&oacute;a h?? h???i, b??? v???
                    t??? 50% tr??? l&ecirc;n th&igrave; HolaShip s??? ???????c quy???n s??? h???u h&agrave;ng h&oacute;a trong ????n h&agrave;ng
                    ??&oacute;. Kh&aacute;ch h&agrave;ng cam k???t s??? k&yacute; k???t c&aacute;c t&agrave;i li???u c???n thi???t cho m???c
                    ??&iacute;ch chuy???n quy???n s??? h???u ?????i v???i h&agrave;ng h&oacute;a ??&oacute;.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>III. QUY TR&Igrave;NH ?????N
                    B&Ugrave;</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.1 </strong>Kh&aacute;ch h&agrave;ng ph???n h???i th&ocirc;ng khi???u n???i t???i
                    HolaShip th&ocirc;ng qua t???ng ??&agrave;i, fanpage &ldquo;HolaShip &ndash; Lu&ocirc;n ??&uacute;ng h???n&rdquo;
                    ho???c qua email: cj@imediatech.com.vn. C&aacute;c ????n h&agrave;ng khi???u n???i h???p l??? l&agrave; ????n h&agrave;ng
                    ??&atilde; k???t th&uacute;c h&agrave;nh tr&igrave;nh trong v&ograve;ng t???i ??a 24h k??? t??? khi li&ecirc;n
                    h???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.2 </strong>Trong v&ograve;ng hai (02) ng&agrave;y l&agrave;m vi???c, k??? t???
                    ng&agrave;y nh???n ???????c khi???u n???i, HolaShip s??? ki???m tra v&agrave; x&aacute;c minh th&ocirc;ng tin khi???u n???i t???
                    kh&aacute;ch h&agrave;ng, ng?????i nh???n h&agrave;ng v&agrave; Shiper ?????i t&aacute;c. Trong v&ograve;ng 30 (ba
                    m????i) ng&agrave;y l&agrave;m vi???c sau khi nh???n ???????c khi???u n???i, B??? ph???n ch??m s&oacute;c kh&aacute;ch
                    h&agrave;ng c???a HolaShip s??? ch??? ?????ng li&ecirc;n h??? v???i kh&aacute;ch h&agrave;ng ????? cung c???p gi???i ph&aacute;p
                    x??? l&yacute; khi???u n???i ph&ugrave; h???p v???i cam k???t tr&aacute;ch nhi???m v&agrave; gi???i h???n tr&aacute;ch nhi???m
                    m&agrave; HolaShip ??&atilde; c&ocirc;ng b???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.3 </strong>Trong tr?????ng h???p ng?????i khi???u n???i kh&ocirc;ng ?????ng &yacute;
                    v???i c&aacute;c bi???n ph&aacute;p gi???i quy???t v&agrave; x??? l&yacute; c???a HolaShip, c&aacute;c b&ecirc;n s???
                    ??&agrave;m ph&aacute;n v&agrave; h&ograve;a gi???i ????? th???ng nh???t c&aacute;c bi???n ph&aacute;p gi???i quy???t, x???
                    l&yacute; khi???u n???i v&agrave; b???i th?????ng. Tr?????ng h???p th????ng l?????ng v&agrave; h&ograve;a gi???i kh&ocirc;ng
                    c&oacute; k???t qu???, m???i b&ecirc;n c&oacute; th??? t??? m&igrave;nh ????a tranh ch???p ra gi???i quy???t t???i T&ograve;a
                    &aacute;n c???p c&oacute; th???m quy???n.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>IV. C&Aacute;C TR?????NG H???P ???????C MI???N B???I
                    TH?????NG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>4.1 </strong>Danh m???c h&agrave;ng h&oacute;a kh&ocirc;ng ???????c b???i
                    th?????ng.</span></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng ??i???n - ??i???n t??? c??, kh&ocirc;ng x&aacute;c minh
                    ???????c gi&aacute; tr???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng h&oacute;a kh&ocirc;ng x&aacute;c ?????nh/ch???ng minh
                    ???????c gi&aacute; tr??? (bao g???m nh??ng kh&ocirc;ng gi???i h???n: gi???y t???, h???p ?????ng&hellip;.)</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- ????? u???ng c&oacute; c???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Ma t&uacute;y, ch???t k&iacute;ch th&iacute;ch tinh
                    th???n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Kim lo???i qu&yacute;. (v&agrave;ng, b???c, v.v... ??? d???ng th???i,
                    n&eacute;n, ti???n xu, v.v...)</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng nguy hi???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- S&uacute;ng, v?? kh&iacute;, ?????n d?????c, thi???t b??? k??? thu???t
                    qu&acirc;n s???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Thu???c l&aacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng d??? h???ng (c&aacute;c m???t h&agrave;ng m&agrave;
                    tr???ng th&aacute;i ho???c t&iacute;nh ch???t ban ?????u c&oacute; th??? b??? h?? h???ng khi ch???u t&aacute;c ?????ng c???a s???
                    thay ?????i qu&aacute; m???c v??? nhi???t ?????, ????? ???m ho???c th???i gian), tr??? hoa v&agrave; c&aacute;c lo???i th???c
                    ph???m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c ???n ph???m ?????i tr???y v&agrave; ph???n ?????ng, c&aacute;c
                    v???n ????? in ho???c t&agrave;i li???u ch???ng l???i an ninh c&ocirc;ng c???ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c v???t ph???m ho???c ch???t d??? ch&aacute;y n??? ho???c
                    g&acirc;y m???t v??? sinh, g&acirc;y &ocirc; nhi???m m&ocirc;i tr?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- V???t ph???m, h&agrave;ng h&oacute;a b??? c???m l??u h&agrave;nh,
                    bu&ocirc;n b&aacute;n c???a ch&iacute;nh ph???.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- ?????ng v???t s???ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- L&ocirc;ng th&uacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c m???t h&agrave;ng, ???n ph???m, h&agrave;ng h&oacute;a
                    b??? c???m nh???p kh???u v&agrave;o Vi???t Nam.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- ????? c??? (d??? v???).</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Ch???t g&acirc;y nghi???n.</span></li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>4.2 </strong>B??u Ki???n ??o??ng go??i kh&ocirc;ng ??u??ng quy ??i??nh, b??u
                    g????i b??? h?? h???i, m???t m&aacute;t do l???i c???a Ng?????i G???i ho???c do ?????c t&iacute;nh t??? nhi&ecirc;n c???a h&agrave;ng
                    h&oacute;a b&ecirc;n trong.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 3. HI???U L???C</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <ul style="list-style-type: none;margin-left:2.0500000000000007px;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- Ph??? l???c n&agrave;y c&oacute; hi???u l???c k??? t??? ng&agrave;y
                    <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; ph???n kh&ocirc;ng th??? t&aacute;ch r???i c???a H???p ?????ng.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Ph??? l???c n&agrave;y ???????c l???p th&agrave;nh hai (02) b???n
                    c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; nh?? nhau, m???i b&ecirc;n gi??? m???t (01) b???n.&nbsp;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ?????C</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    B</span></strong>
                                </p>
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?></strong>
                                </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:300px" alt="">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?></strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH??? L???C 04</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>DANH S&Aacute;CH T&Agrave;I KHO???N D???CH
                    V???</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(??&iacute;nh k&egrave;m H???p ?????ng H???p t&aacute;c
                    D???ch v??? v???n chuy???n <strong>s??? <?= date("dm"); ?> /<?= date("Y"); ?>/H??HT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>gi???a c&ocirc;ng ty C&ocirc;ng ty C??? ph???n C&ocirc;ng ngh??? v&agrave; D???ch v???
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau ??&acirc;y g???i l&agrave; &ldquo;<strong>H???p
                        ?????ng</strong>&rdquo;)</em></span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 1. DANH S&Aacute;CH T&Agrave;I
                        KHO???N</span></strong>
            </p>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Danh s&aacute;ch
                c&aacute;c ID (t&agrave;i kho???n ????ng nh???p Holaship.vn) sau ??&acirc;y ?????u thu???c kh&aacute;ch h&agrave;ng
                [t&ecirc;n KH]:</span>
        </p>
        <table style="width: 4.9e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 36.4pt;border: 1pt solid black;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;STT</span></strong>
                        </p>
                    </td>
                    <td style="width: 76.85pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>ID ????ng nh???p</span></strong>
                        </p>
                    </td>
                    <td style="width: 75.3pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>T&ecirc;n shop</span></strong>
                        </p>
                    </td>
                    <td style="width: 130.15pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>T&agrave;i kho???n ng&acirc;n h&agrave;ng
                                    th&agrave;nh to&aacute;n COD</span></strong>
                        </p>
                    </td>
                    <td style="width: 169.05pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Email</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:36.4pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:26.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>1</span>
                        </p>
                    </td>
                    <td style="width:76.85pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'><?php echo $dataUser->username; ?></span>
                        </p>
                    </td>
                    <td style="width:75.3pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'><?php echo ($dataAccount->contractType == 2)  ? $dataAccount->companyName : $dataUser->company; ?></span>
                        </p>
                    </td>
                    <td style="width: 130.15pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 26.8pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Ch??? t&agrave;i kho???n: <?php echo (!empty($listBanks)) ? $listBanks->bankAccountName : ''; ?></span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>S??? t&agrave;i kho???n: <?php echo (!empty($listBanks)) ? $listBanks->bankAccount : ''; ?></span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Ng&acirc;n h&agrave;ng: <?php echo (!empty($listBanks)) ? $listBanks->bankName : ''; ?></span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width:169.05pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:26.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>??I???U 2. HI???U L???C</span></strong>
            </p>
        </div>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y c&oacute; hi???u l???c k??? t???
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; ph???n kh&ocirc;ng th??? t&aacute;ch r???i c???a H???p
                    ?????ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Ph??? l???c n&agrave;y ???????c l???p th&agrave;nh hai (02)
                    b???n c&oacute; gi&aacute; tr??? ph&aacute;p l&yacute; nh?? nhau, m???i b&ecirc;n gi??? m???t (01) b???n.&nbsp;</span>
            </li>
        </ul>
        <span> &nbsp; </span>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ?????C</span></strong>
                        </p> -->
                        <img  src="<?php echo $pgdsign; ?>" alt="" style="height: 110px;">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:13px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>?????I DI???N B&Ecirc;N
                                    B</span></strong>
                                </p>
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><?= ($position) ? $position : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                                </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:13px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <img style="width:150px;margin-top:10px;" src="<?php echo $dataAccount->imgSignatureValue ?>" style="width:200px" alt="">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
                        </p>
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  100%;font-size:13px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><?= ($representative) ? $representative : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.' ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
       
    </main>
</body>

</html>