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
                <strong style="font-size:13px;">C&Ocirc;NG TY CỔ PHẦN C&Ocirc;NG NGHỆ V&Agrave; DỊCH VỤ IMEDIA</strong>
                <br />
                <span style="font-size:10px;">
                    Địa chỉ: Tầng 18, T&ograve;a nh&agrave; Peakview Tower, Số 36 Ho&agrave;ng Cầu, Phường &Ocirc; Chợ
                    Dừa,&nbsp;<br />Quận Đống Đa, Th&agrave;nh phố H&agrave; Nội&nbsp;<br />Điện thoại: +84 02462958884
            </p>
            </span>
        </div>
    </header>
    <main>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:18px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>HỢP ĐỒNG HỢP T&Aacute;C DỊCH VỤ VẬN
                    CHUYỂN </span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Số: <?= date("dm"); ?>/<?= date('Y') ?>/HĐHT/FINTECH/IMEDIA
                        &ndash;</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]</em></strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em></strong>
        </p>
        <ul style="list-style-type: undefined;margin-left:0cmundefined;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Căn cứ Bộ luật D&acirc;n sự 2015 v&agrave; c&aacute;c văn
                        bản hướng dẫn thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Căn cứ Luật Thương mại 2005 v&agrave; c&aacute;c văn bản
                        hướng dẫn thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Căn cứ Luật Viễn th&ocirc;ng 2009 v&agrave; c&aacute;c
                        văn bản hướng dẫn thi h&agrave;nh;</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Căn cứ khả năng, nhu cầu hợp t&aacute;c v&agrave;
                        ph&aacute;t triển dịch vụ thanh to&aacute;n của hai B&ecirc;n.</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&ocirc;m nay, ng&agrave;y <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?>, tại H&agrave; Nội, ch&uacute;ng t&ocirc;i gồm:</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-85.85pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;B&ecirc;n A</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>: <strong>C&Ocirc;NG TY CỔ PHẦN C&Ocirc;NG NGHỆ
                    V&Agrave; DỊCH VỤ IMEDIA</strong> </span>
        </p>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Đại diện&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: B&agrave; <strong>NGUYỄN THU TH&Ugrave;Y</strong>&nbsp; &nbsp; &nbsp; &nbsp;Chức vụ: <strong>Ph&oacute;
                    Gi&aacute;m Đốc</strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo Giấy Ủy Quyền số: 05-2020/UQ-IMD, ng&agrave;y 01
                th&aacute;ng 03 năm 2020 của Gi&aacute;m Đốc.</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Địa chỉ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;: Tầng 18, T&ograve;a nh&agrave; Peakview, Số 36 Ho&agrave;ng Cầu, P &Ocirc; Chợ Dừa, Q Đống Đa,
                H&agrave; Nội</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Điện thoại&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;:
                0246.295.8884&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;Fax:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>T&agrave;i khoản&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: 0541 000 305 199&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&acirc;n
                H&agrave;ng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: VietcomBank &ndash; Chương Dương&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>M&atilde; số DN&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;: 0105837941</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Sau đ&acirc;y gọi tắt l&agrave; B&ecirc;n A hoặc
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
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Đại diện&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Ông/Bà&nbsp;<?= ($representative) ? '<strong>' . $representative . ' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.............'; ?>
                Chức vụ: <?= ($position) ? '<strong>' . $position . ' </strong>' : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Địa chỉ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($address) ? $address : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?>
            </span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y/th&aacute;ng/năm sinh:
                <?= ($dob) ? $dob : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>CMT/CCCD số&nbsp; &nbsp;:
                <?= ($cid) ? $cid : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;' ?>
                - Cấp
                ngày: <?= ($cidDate) ? $cidDate : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&ndash;' ?>
                CA: <?= ($cidPlace) ? $cidPlace : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...' ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Điện thoại&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($phone) ? $phone : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>M&atilde; số thuế&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                <?= ($tax) ? $tax : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>T&agrave;i khoản Ng&acirc;n h&agrave;ng số:
                <?= ($listBanks->bankAccount) ? $listBanks->bankAccount : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mở tại ng&acirc;n h&agrave;ng:
                <?= ($listBanks->bankShortName) ? $listBanks->bankShortName : '&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..'; ?> Chi
                nh&aacute;nh:
                &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-9.35pt;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;Sau đ&acirc;y gọi tắt l&agrave;
                B&ecirc;n B hoặc <strong>KH</strong></span>
        </p>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Sau khi thỏa thuận, hai B&ecirc;n c&ugrave;ng nhau
                thống nhất k&yacute; kết Hợp đồng hợp t&aacute;c dịch vụ vận chuyển với những điều khoản v&agrave; điều kiện như
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
            <strong><u><span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 1:
                        C&Aacute;C ĐỊNH NGHĨA:</span></u></strong>
        </h2>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Trừ khi ngữ cảnh của Hợp đồng n&agrave;y quy định
                kh&aacute;c, c&aacute;c từ v&agrave; thuật ngữ sau đ&acirc;y tại Hợp đồng n&agrave;y sẽ c&oacute; nghĩa như
                sau:</span>
        </p>
        <ul class="" style="list-style-type:none">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1&nbsp;</strong> &ldquo;<strong>Hợp đồng</strong>&rdquo; c&oacute;
                    nghĩa l&agrave; Hợp đồng hợp t&aacute;c Dịch vụ vận chuyển n&agrave;y, c&aacute;c Phụ lục đ&iacute;nh
                    k&egrave;m Hợp đồng c&ugrave;ng với tất cả c&aacute;c t&agrave;i liệu li&ecirc;n quan v&agrave; đi
                    k&egrave;m kh&aacute;c, c&oacute; thể được sửa đổi tại từng thời điểm v&agrave; được c&aacute;c b&ecirc;n
                    k&yacute; kết bằng văn bản.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2&nbsp;</strong> &ldquo;<strong>B&ecirc;n</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; IMD hoặc KH v&agrave; những người kế thừa v&agrave;/hoặc những người được chuyển
                    nhượng hợp ph&aacute;p của họ v&agrave; &ldquo;<strong>C&aacute;c B&ecirc;n</strong>&rdquo; c&oacute; nghĩa
                    l&agrave; mỗi v&agrave; tất cả c&aacute;c B&ecirc;n.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3&nbsp;</strong> &ldquo;<strong>Dịch vụ</strong>&rdquo; c&oacute;
                    nghĩa l&agrave; dịch vụ li&ecirc;n quan việc giao nhận Bưu gửi, bao gồm: chấp nhận, vận chuyển v&agrave;
                    ph&aacute;t Bưu gửi bằng c&aacute;c phương thức từ địa điểm của KH đến địa điểm của người nhận.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4&nbsp;</strong> &ldquo;<strong>Người gửi</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; tổ chức, c&aacute; nh&acirc;n c&oacute; đề xuất gửi Bưu gửi v&agrave; được
                    ch&iacute;nh KH chỉ định.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5&nbsp;</strong> &ldquo;<strong>Người nhận</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; tổ chức, c&aacute; nh&acirc;n c&oacute; t&ecirc;n tại phần ghi th&ocirc;ng tin về
                    người nhận tr&ecirc;n Bưu gửi/Phiếu gửi/Đơn h&agrave;ng hoặc c&aacute; nh&acirc;n được Người nhận ủy quyền
                    nhận Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.6&nbsp;</strong> &ldquo;<strong>Bưu&nbsp;</strong>gửi&rdquo;
                    c&oacute; nghĩa l&agrave; thư, g&oacute;i, kiện h&agrave;ng h&oacute;a được chấp nhận, vận chuyển</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.7&nbsp;</strong> &ldquo;Cước<strong>&nbsp;ph&iacute; Dịch
                        vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; chi ph&iacute; dịch vụ được t&iacute;nh tr&ecirc;n từng Đơn
                    h&agrave;ng m&agrave; IMD đ&atilde; thực hiện cung cấp Dịch vụ cho KH dựa tr&ecirc;n Bảng Cước ph&iacute;
                    Dịch vụ của IMD cung cấp.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.8&nbsp;</strong> &ldquo;Phạm<strong>&nbsp;vi Cung ứng Dịch
                        vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; khu vực m&agrave; IMD thực hiện chấp nhận, vận chuyển
                    v&agrave; ph&aacute;t Bưu gửi từ nơi KH chỉ định đến địa chỉ Người nhận.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.9&nbsp;</strong> &ldquo;<strong>Phiếu gửi</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; mẫu phiếu c&oacute; thể hiện Logo của IMD, m&atilde; số Bưu gửi, loại Bưu gửi,
                    thời gian gửi, thời gian nhận Bưu gửi, th&ocirc;ng tin về t&ecirc;n, địa chỉ, điện thoại của Người gửi,
                    Người nhận.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.10&nbsp;</strong> &ldquo;<strong>Hệ thống</strong>&rdquo; c&oacute;
                    nghĩa l&agrave; phần mềm hoặc website m&agrave; IMD cấp cho KH về việc quản l&yacute; Đơn h&agrave;ng
                    v&agrave; quy tr&igrave;nh giao h&agrave;ng của IMD như tạo Đơn h&agrave;ng, theo d&otilde;i tiến
                    tr&igrave;nh thực hiện Dịch vụ, đối so&aacute;t số liệu, th&ocirc;ng tin Bưu gửi v&agrave; c&aacute;c
                    c&ocirc;ng nợ tồn đọng...</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.11&nbsp;</strong> &ldquo;<strong>Đơn h&agrave;ng</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; đơn y&ecirc;u cầu thực hiện Dịch vụ được KH thiết lập qua Hệ thống hoặc được viết
                    tay dưới dạng Phiếu gửi c&oacute; đầy đủ th&ocirc;ng tin về Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.12&nbsp;</strong> &ldquo;<strong>Th&ocirc;ng tin Người
                        nhận</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin li&ecirc;n quan đến t&ecirc;n, điện thoại, địa
                    chỉ Người nhận.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.13&nbsp;</strong> &ldquo;<strong>Thời gian To&agrave;n
                        tr&igrave;nh</strong>&rdquo; của Bưu gửi l&agrave; khoảng thời gian được t&iacute;nh từ khi Bưu gửi được
                    chấp nhận (IMD đến nhận Bưu gửi) cho đến khi Bưu gửi được ph&aacute;t cho Người nhận.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.14&nbsp;</strong> &nbsp;&ldquo;<strong>Phụ ph&iacute; Gia
                        tăng</strong>&rdquo; l&agrave; ph&iacute; c&aacute;c dịch vụ m&agrave; IMD thực hiện th&ecirc;m theo
                    y&ecirc;u cầu của KH (nếu c&oacute;).</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.15&nbsp;</strong> &ldquo;<strong>COD</strong>&rdquo; l&agrave; việc
                    IMD thực hiện cung ứng Dịch vụ v&agrave; thay KH thu tiền từ Người nhận theo ủy quyền của KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.16&nbsp;</strong> &ldquo;<strong>Đối so&aacute;t Dịch
                        vụ</strong>&rdquo; c&oacute; nghĩa l&agrave; việc C&aacute;c B&ecirc;n thực hiện việc đối chiếu
                    c&aacute;c Đơn h&agrave;ng IMD đ&atilde; thực hiện th&agrave;nh c&ocirc;ng hoặc kh&ocirc;ng th&agrave;nh
                    c&ocirc;ng, chi ph&iacute; thực hiện Dịch vụ (bao gồm dịch vụ giao nhận Bưu gửi v&agrave; c&aacute;c Phụ
                    ph&iacute; Gia tăng (nếu c&oacute;)).&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.17&nbsp;</strong> &ldquo;<strong>Th&ocirc;ng tin Bảo
                        mật</strong>&rdquo; l&agrave; c&aacute;c th&ocirc;ng tin li&ecirc;n quan đến việc thực hiện Hợp Đồng
                    n&agrave;y, ngoại trừ c&aacute;c th&ocirc;ng tin về t&ecirc;n, địa chỉ, c&aacute;c hoạt động kinh doanh được
                    ph&eacute;p của mỗi B&ecirc;n v&agrave; c&aacute;c nội dung kh&aacute;c đ&atilde; được c&ocirc;ng bố
                    tr&ecirc;n c&aacute;c trang website ch&iacute;nh thức hoặc c&oacute; thể được c&ocirc;ng ch&uacute;ng tiếp
                    cận v&igrave; bất kỳ l&yacute; do n&agrave;o ngoại trừ việc vi phạm Hợp đồng n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.18&nbsp;</strong> &nbsp;&ldquo;<strong>Sự kiện Bất khả
                        kh&aacute;ng</strong>&rdquo; l&agrave; bất kỳ sự cản trở, chậm trễ hoặc ngừng hoạt động n&agrave;o xảy
                    ra do b&atilde;i c&ocirc;ng, <strong>đ&oacute;ng</strong> cửa, tranh chấp lao động, thi&ecirc;n tai, chiến
                    tranh, bạo động trong d&acirc;n ch&uacute;ng, hỏa hoạn hay c&aacute;c sự cố/tai họa kh&aacute;c; những thay
                    đổi trong ch&iacute;nh s&aacute;ch của Ch&iacute;nh phủ m&agrave; vượt qu&aacute; khả năng kiểm so&aacute;t
                    hợp l&yacute; của một B&ecirc;n khiến cho B&ecirc;n đ&oacute; kh&ocirc;ng thể thực hiện c&aacute;c nghĩa vụ
                    được quy định tại Hợp đồng n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.19&nbsp;</strong> &ldquo;<strong>Cơ quan c&oacute; thẩm
                        quyền</strong>&rdquo; c&oacute; nghĩa l&agrave; một hoặc/v&agrave; c&aacute;c cơ quan trực thuộc hệ
                    thống Nh&agrave; nước Việt Nam, bất kỳ bộ, sở, ban, ng&agrave;nh hoặc cơ quan c&oacute; thẩm quyền
                    n&agrave;o trực tiếp hoặc gi&aacute;n tiếp thuộc quyền quản l&yacute; của Nh&agrave; nước Việt Nam.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.20&nbsp;</strong> &ldquo;<strong>Luật Bưu
                        ch&iacute;nh</strong>&rdquo; c&oacute; nghĩa l&agrave; l&agrave; Luật Bưu ch&iacute;nh do Quốc hội ban
                    h&agrave;nh đang được &aacute;p dụng tại thời điệm hiện tại v&agrave; tất cả c&aacute;c văn bản quy phạm
                    ph&aacute;p luật, nghị định, quyết định, th&ocirc;ng tư, c&ocirc;ng văn, quy chế, chỉ thị, lệnh, hiệp định,
                    quy định hoặc th&ocirc;ng b&aacute;o n&agrave;o (như được sửa đổi tại từng thời điểm) hoặc bất kỳ diễn giải
                    c&oacute; li&ecirc;n quan điều chỉnh c&aacute;c quy định của Luật Bưu ch&iacute;nh..</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.21&nbsp;</strong> &ldquo;<strong>Luật Việt Nam</strong>&rdquo;
                    c&oacute; nghĩa l&agrave; bất kỳ văn bản quy phạm ph&aacute;p luật, ph&aacute;p lệnh, nghị định, quyết định,
                    th&ocirc;ng tư, c&ocirc;ng văn, quy chế, đạo luật, chỉ thị, lệnh, hiệp định, quy định hoặc th&ocirc;ng
                    b&aacute;o n&agrave;o (như được sửa đổi tại từng thời điểm) hoặc bất kỳ diễn giải n&agrave;o đối với
                    c&aacute;c văn bản đ&oacute; do bất kỳ Cơ quan Nh&agrave; nước n&agrave;o c&ocirc;ng bố, ban h&agrave;nh
                    hoặc th&ocirc;ng qua.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.22&nbsp;</strong> &ldquo;<strong>Việt Nam</strong>&rdquo;
                    l&agrave; nước Cộng h&ograve;a X&atilde; hội Chủ nghĩa Việt Nam.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 2. NỘI DUNG DỊCH
                        VỤ</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong>2.1&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Dịch vụ giao nh&acirc;̣n Bưu
                        gửi:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Theo thỏa thu&acirc;̣n, KH
                    đ&ocirc;̀ng ý chỉ định IMD và IMD đ&ocirc;̀ng ý cung ứng Dịch vụ <strong>chuyển</strong> ph&aacute;t
                    Bưu gửi li&ecirc;n quan đến việc giao nh&acirc;̣n Bưu gửi gồm: chấp nhận, vận chuyển v&agrave; ph&aacute;t
                    Bưu gửi bằng c&aacute;c phương thức từ địa điểm của KH đến địa điểm của Người nhận trong Phạm vi Cung ứng
                    Dịch vụ hi&ecirc;̣n hành của IMD.&nbsp;</span></li>
            <li><strong>2.2&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Phạm vi Cung ứng Dịch
                        vụ:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>IMD thực hiện việc cung ứng
                    Dịch vụ cho KH trong Phạm vi Cung ứng Dịch vụ được quy định bởi từng nh&agrave; vận chuyển.</span></li>
            <li><strong>2.3&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Đi&ecirc;̀u chỉnh Phạm vi Cung ứng Dịch
                        vụ:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Trong trường hợp c&oacute;
                    sự điều chỉnh về Phạm vi Cung ứng Dịch vụ, IMD có trách nhi&ecirc;̣m th&ocirc;ng báo bằng văn bản cho
                    KH biết &iacute;t nhất 15 (mười lăm) ngày trước ng&agrave;y thay đổi. Sau thời đi&ecirc;̉m n&agrave;y,
                    Các b&ecirc;n sẽ ti&ecirc;́p tục thực hi&ecirc;̣n Hợp đ&ocirc;̀ng này theo Phạm vi Cung ứng Dịch
                    vụ mới.</span></li>
            <li><strong>2.4&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Dịch vụ Gia tăng:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong trường hợp KH c&oacute; y&ecirc;u
                    cầu,<strong>&nbsp;</strong>IMD sẽ cung ứng th&ecirc;m một số Dịch vụ Gia tăng theo Phụ lục 02 đính
                    kèm Hợp đ&ocirc;̀ng này.</span></li>
            <li><strong>2.5&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Ti&ecirc;́n trình và thời gian giao
                        nh&acirc;̣n:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Các b&ecirc;n
                    thỏa thu&acirc;̣n tiến tr&igrave;nh theo thực t&ecirc;́ từng v&agrave;o từng thời đi&ecirc;̉m v&agrave;
                    từng giai đoạn.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 3. CƯỚC PH&Iacute; DỊCH
                        VỤ&nbsp;</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong>3.1&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Cước ph&iacute; Dịch vụ:</span></strong><span style='font-family:"DejaVu Sans",serif;culor:black;'>&nbsp;được thực hi&ecirc;̣n theo Bảng Cước
                    ph&iacute; Dịch vụ hi&ecirc;̣n hành của IMD, được thể hiện tại Phụ lục
                    02<strong>&nbsp;</strong>đ&iacute;nh k&egrave;m Hợp đồng. Cước ph&iacute; Dịch vụ n&agrave;y c&oacute; thể
                    thay đổi t&ugrave;y thuộc v&agrave;o từng thời điểm kh&aacute;c nhau.</span></li>
            <li><strong>3.2&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Đi&ecirc;̀u chỉnh Cước ph&iacute; Dịch
                        vụ:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Trong trường hợp c&oacute;
                    sự điều chỉnh về Cước ph&iacute; Dịch vụ, IMD phải th&ocirc;ng b&aacute;o bằng văn bản cho KH ít
                    nh&acirc;́t 03 (ba) ngày trước ngày đi&ecirc;̀u chỉnh.<strong>&nbsp;</strong>Sau thời đi&ecirc;̉m
                    đi&ecirc;̀u chỉnh, Các B&ecirc;n sẽ ti&ecirc;́p tục thực hi&ecirc;̣n Hợp đ&ocirc;̀ng này theo Bảng
                    Cước ph&iacute; Dịch vụ mới do IMD th&ocirc;ng b&aacute;o.</span></li>
            <li><strong>3.3&nbsp;</strong><strong><span style='font-family:"DejaVu Sans",serif;'>Đ&ocirc;́i tượng chịu Cước ph&iacute; Dịch
                        vụ:</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;KH là đ&ocirc;́i tượng
                    chịu Cước ph&iacute; Dịch vụ. Trường hợp KH chỉ định đ&ocirc;́i tượng chịu Cước ph&iacute; Dịch vụ
                    là Người nh&acirc;̣n thì IMD mặc định được thu Cước ph&iacute; Dịch vụ của KH n&ecirc;́u Người
                    nh&acirc;̣n từ ch&ocirc;́i thanh toán.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'><span style="text-decoration:none;">&nbsp;</span></span></u></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 4: QUY ĐỊNH THANH
                        TO&Aacute;N</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>4.1&nbsp;Thanh to&aacute;n COD</span></strong><span style='font-family:"DejaVu Sans",serif;culor:black;'>: Đối với Dịch vụ giao h&agrave;ng thu hộ tiền,
                        IMD cho ph&eacute;p kh&aacute;ch h&agrave;ng chủ động lựa chọn v&agrave; thay đổi linh hoạt một trong
                        c&aacute;c h&igrave;nh thức đối so&aacute;t như sau:</span>
                </li>
            </ul>
        </div>
        <ul style="list-style-type: none;margin-left:1cm;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tự đối so&aacute;t<em>:</em> KH tự điền số tiền
                    cần r&uacute;t về t&agrave;i khoản ng&acirc;n h&agrave;ng v&agrave;o bất kỳ khoảng thời gian n&agrave;o
                    trong ng&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đối so&aacute;t định kỳ tự động v&agrave;o thứ 2,
                    thứ 4, thứ 6 h&agrave;ng tuần.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đối so&aacute;t định kỳ tự động v&agrave;o thứ 2
                    v&agrave; thứ 5 h&agrave;ng tuần.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đối so&aacute;t định kỳ v&agrave;o thứ 4
                    h&agrave;ng tuần.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng thức t&iacute;nh:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>Số tiền thực nhận = Số tiền IMD thu hộ - Tổng
                    Cước ph&iacute; Dịch vụ</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>4.2&nbsp;Quy trình, Thời hạn Đ&ocirc;́i soát, Thời hạn
                            thanh to&aacute;n v&agrave; chiết khấu Cước ph&iacute; Dịch vụ</span></strong>
                </li>
            </ul>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Trong 05 (năm) ng&agrave;y l&agrave;m việc đầu
                ti&ecirc;n của th&aacute;ng N+1, IMD sẽ thực hiện đối so&aacute;t Cước ph&iacute; Dịch vụ v&agrave; chiết khấu
                (<strong>nếu</strong> c&oacute;) trong th&aacute;ng N v&agrave; gửi cho KH th&ocirc;ng qua mail hoặc h&igrave;nh
                thức kh&aacute;c do hai B&ecirc;n đ&atilde; thống nhất. Trong v&ograve;ng 02 (hai) ng&agrave;y l&agrave;m việc
                tiếp theo kể từ ng&agrave;y nhận được đối so&aacute;t, KH c&oacute; tr&aacute;ch nhiệm phản hồi qua mail cho
                IMD. Sau khi nhận được phản hồi hoặc hết thời hạn m&agrave; KH kh&ocirc;ng phản hồi, IMD chốt v&agrave; xuất
                h&oacute;a đơn v&agrave;o ng&agrave;y 08 (t&aacute;m) th&aacute;ng N+1. Gi&aacute; trị tr&ecirc;n h&oacute;a đơn
                sẽ l&agrave; Cước ph&iacute; Dịch vụ trong th&aacute;ng sau khi trừ chiết khấu (nếu c&oacute;).</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.35pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Phương thức thanh
                    toán:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD sẽ thực
                hiện:</span>
        </p>
        <ul class="" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cộng phần tiền chiết khấu cho B&ecirc;n B được
                    hưởng v&agrave;o t&agrave;i khoản của B&ecirc;n B tr&ecirc;n hệ thống HolaShip do IMD x&acirc;y dựng
                    v&agrave; quản l&yacute;;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>hoặc Chuyển khoản v&agrave;o t&agrave;i khoản
                    ng&acirc;n h&agrave;ng của B&ecirc;n B.</span>
                <ul class="" style="list-style-type: none;">
                </ul>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.35pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>4.3&nbsp;Xử lý các v&acirc;́n đ&ecirc;̀ phát
                    sinh:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Vi&ecirc;̣c
                đ&ocirc;́i soát, thanh toán của kỳ trước li&ecirc;̀n k&ecirc;̀ được C&aacute;c B&ecirc;n cam
                k&ecirc;́t hoàn thành trong kỳ phát sinh. Trường hợp KH kh&ocirc;ng đồng &yacute; với số liệu
                đối so&aacute;t từ IMD th&igrave; phải gửi phản hồi cho <strong>IMD</strong> k&egrave;m theo căn cứ
                x&aacute;c đ&aacute;ng để C&aacute;c B&ecirc;n c&ugrave;ng xem x&eacute;t. Nếu trong thời hạn 05
                (năm) ng&agrave;y m&agrave; C&aacute;c B&ecirc;n kh&ocirc;ng th&ecirc;̉ hoàn thành việc đối
                so&aacute;t Dịch vụ &nbsp;thì tạm thời &aacute;p dụng số liệu trong đối so&aacute;t do IMD
                đ&atilde; gửi để l&agrave;m căn cứ thanh to&aacute;n v&agrave; C&aacute;c B&ecirc;n sẽ thống nhất
                bằng văn bản về c&aacute;ch thức giải quyết đối với số ch&ecirc;nh lệch.</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 5. GIAO NH&Acirc;̣N BƯU
                        GỬI</span></u></strong>
        </p>
        <ul class="" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.1&nbsp;Th&ocirc;ng tin Bưu gửi:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>bao gồm c&aacute;c th&ocirc;ng
                    tin<strong>&nbsp;</strong>v&ecirc;̀ s&ocirc;́ lượng, kh&ocirc;́i lượng, k&iacute;ch thước ba (03) chiều
                    (d&agrave;i - rộng - cao) của Bưu gửi, th&ocirc;ng tin Người gửi, Người nh&acirc;̣n và th&ocirc;ng tin
                    khác được th&ecirc;̉ hi&ecirc;̣n tr&ecirc;n Phi&ecirc;́u gửi hoặc Đơn <strong>h&agrave;ng</strong>
                    đ&atilde; được KH thiết lập tr&ecirc;n Hệ thống đ&atilde; được kết nối giữa C&aacute;c B&ecirc;n. KH phải
                    điền v&agrave; cung cấp đầy đủ th&ocirc;ng tin tr&ecirc;n Phi&ecirc;́u gửi/Đơn h&agrave;ng trước khi
                    chuyển cho IMD. IMD c&oacute; quyền từ chối nhận đối với những Bưu gửi kh&ocirc;ng đầy đủ th&ocirc;ng tin về
                    Người nhận, Người gửi, hoặc c&aacute;c th&ocirc;ng tin li&ecirc;n quan đến Bưu gửi (nếu c&oacute;).
                    T&ugrave;y thuộc v&agrave;o từng nh&agrave; vận chuyển hợp t&aacute;c c&ugrave;ng với IMD, y&ecirc;u cầu cho
                    mỗi Bưu gửi c&oacute; thể sẽ kh&aacute;c nhau (IMD sẽ th&ocirc;ng b&aacute;o trước với KH).</span></li>
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.2&nbsp;Ch&acirc;́p nh&acirc;̣n Bưu
                        gửi:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>IMD
                    chỉ<strong>&nbsp;</strong>chấp nhận Bưu gửi khi c&oacute; đủ c&aacute;c điều kiện sau đ&acirc;y:</span>
            </li>
        </ul>
        <ul class="" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- V&acirc;̣t chứa trong Bưu gửi kh&ocirc;ng
                    thu&ocirc;̣c danh mục hàng c&acirc;́m, hạn chế kinh doanh hoặc kinh doanh c&oacute; điều kiện theo quy
                    định ph&aacute;p luật. Tuy nhi&ecirc;n, ngay cả khi IMD đ&atilde; chấp nhận Bưu gửi, tr&aacute;ch nhiệm
                    chứng minh Bưu gửi l&agrave; hợp ph&aacute;p (nếu c&oacute;) vẫn sẽ thuộc về KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&oacute; đầy đủ th&ocirc;ng tin li&ecirc;n
                    quan đến Người gửi, Người nhận tr&ecirc;n Bưu gửi, trừ trường hợp đặc bi&ecirc;̣t c&oacute; thỏa thuận
                    kh&aacute;c;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Đ&atilde; được KH ch&acirc;́p
                    nh&acirc;̣n</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;thanh toán Cước phí Dịch
                    vụ</span>

            </li>
        </ul>
        <ul class="" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'>5.3&nbsp;Giao Bưu gửi đ&ecirc;́n Người
                        nh&acirc;̣n:</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;Nh&acirc;n
                    vi&ecirc;n của IMD hoặc nh&acirc;n vi&ecirc;n của nh&agrave; vận chuyển được IMD chỉ định
                    (&ldquo;Nh&acirc;n vi&ecirc;n giao nhận h&agrave;ng&rdquo; có trách nhi&ecirc;̣m hướng dẫn Người
                    nhận kiểm tra t&igrave;nh trạng b&ecirc;n ngo&agrave;i của Bưu gửi v&agrave; gi&aacute;m s&aacute;t
                    đến khi Người nhận đ&ocirc;̀ng ý ký nh&acirc;̣n Bưu gửi (nếu c&oacute;). Trường hợp Người
                    nh&acirc;̣n là doanh nghi&ecirc;̣p, cơ quan, t&ocirc;̉ chức thì t&ugrave;y quy định của
                    nh&agrave; vận chuyển, Nh&acirc;n vi&ecirc;n giao nhận h&agrave;ng c&oacute; thể chỉ thực
                    hi&ecirc;̣n gửi đ&ecirc;́n b&ocirc;̣ ph&acirc;̣n văn thư, hành chính, thường trực, bảo
                    v&ecirc;̣ hoặc người được ủy quy&ecirc;̀n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 6. QUYỀN V&Agrave; NGHĨA VỤ CỦA
                        IMD</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>6.1&nbsp;Quy&ecirc;̀n&nbsp;</span></strong>
                </li>
            </ul>
        </div>
        <ol start="1" style="list-style-type: lower-alpha;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được quyền chủ động trong việc hợp t&aacute;c,
                    chỉ định nh&agrave; vận chuyển kh&aacute;c thực hiện to&agrave;n bộ hoặc một phần Dịch vụ cho KH. Trong
                    trường hợp n&agrave;y, KH đồng &yacute; tu&acirc;n thủ c&aacute;c quy định ri&ecirc;ng của nh&agrave; vận
                    chuyển được IMD chỉ định (nếu c&oacute;) bao gồm nhưng kh&ocirc;ng giới hạn bởi: Cước ph&iacute; Dịch vụ;
                    quy c&aacute;ch đ&oacute;ng g&oacute;i Bưu gửi, ph&iacute; khai gi&aacute;&hellip;miễn l&agrave; c&aacute;c
                    quy định n&agrave;y được ghi r&otilde; trong Hợp đồng hoặc Phụ lục Hợp đồng hoặc c&oacute; sự thỏa thuận
                    kh&aacute;c giữa C&aacute;c B&ecirc;n. Ngo&agrave;i c&aacute;c nội dung đ&oacute;, c&aacute;c quyền
                    v&agrave; nghĩa vụ đ&atilde; thỏa thuận giữa IMD v&agrave; KH c&oacute; hiệu lực như ch&iacute;nh IMD thực
                    hiện.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Y&ecirc;u cầu KH cho kiểm tra Bưu gửi trong mọi
                    trường hợp, bao gồm nhưng kh&ocirc;ng giới hạn việc c&oacute; d&acirc;́u hi&ecirc;̣u cho th&acirc;́y Bưu
                    gửi kh&ocirc;ng đúng, đủ ti&ecirc;u chu&acirc;̉n, nghi ngờ hàng c&acirc;́m, hàng giả, h&agrave;ng
                    kh&ocirc;ng hợp ph&aacute;p hoặc theo y&ecirc;u c&acirc;̀u của Cơ quan quản lý thị trường, cơ quan
                    nhà nước có th&acirc;̉m quy&ecirc;̀n. Tuy nhi&ecirc;n, C&aacute;c B&ecirc;n thống nhất rằng đ&acirc;y
                    kh&ocirc;ng phải l&agrave; nghĩa vụ của IMD v&agrave; trong mọi trường hợp KH phải c&oacute; tr&aacute;ch
                    nhiệm tu&acirc;n thủ đầy đủ c&aacute;c quy định của ph&aacute;p luật về &nbsp;Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đình chỉ ngay l&acirc;̣p tức việc nh&acirc;̣n,
                    v&acirc;̣n chuy&ecirc;̉n, phát Bưu gửi và th&ocirc;ng báo cho Cơ quan có th&acirc;̉m quy&ecirc;̀n trong
                    trường hợp phát hi&ecirc;̣n Bưu gửi chưa được ph&eacute;p lưu th&ocirc;ng tr&ecirc;n thị trường Việt
                    Nam, Bưu gửi vi phạm quy định về h&agrave;ng cấm, h&agrave;ng hạn chế vận chuyển/kinh doanh hoặc
                    h&agrave;ng kinh doanh c&oacute; điều kiện nhưng kh&ocirc;ng cung cấp được giấy ph&eacute;p v&agrave;/hoặc
                    c&aacute;c điều kiện hợp ph&aacute;p.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Chấm dứt Hợp đồng ngay lập tức hoặc từ
                    ch&ocirc;́i cung ứng Dịch vụ trong trường hợp: (i) KH vi phạm pháp lu&acirc;̣t Bưu chính; (ii) Bưu
                    gửi thuộc danh mục h&agrave;ng h&oacute;a bị cấm, hạn chế kinh doanh hoặc kh&ocirc;ng thuộc phạm vi vận
                    chuyển theo ch&iacute;nh s&aacute;ch của IMD được thể hiện tại website:&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:black;text-decoration:none;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;'>&nbsp; (iii) địa chỉ giao/nhận Bưu gửi nằm ngo&agrave;i Phạm vi
                    Cung ứng Dịch vụ; (iv) th&ocirc;ng tin Bưu gửi v&agrave;/hoặc Th&ocirc;ng tin Người nhận/Người gửi
                    kh&ocirc;ng r&otilde; r&agrave;ng; (v) qu&aacute; thời hạn thanh to&aacute;n Cước ph&iacute; Dịch vụ của đợt
                    thanh to&aacute;n trước đ&oacute; cho IMD; (vi) Bưu gửi kh&ocirc;ng được đ&oacute;ng g&oacute;i cẩn thận,
                    đ&uacute;ng quy c&aacute;ch, t&iacute;nh chất của nội dung của Bưu gửi; (vii) xảy ra trường hợp Người nhận
                    khiếu nại về chất lượng Bưu gửi hoặc Bưu gửi c&oacute; dấu hiệu lừa đảo.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Sử dụng th&ocirc;ng tin giao dịch giữa IMD
                    và KH nhằm quảng bá cho thương hi&ecirc;̣u, uy tín của IMD, trừ trường hợp KH từ ch&ocirc;́i bằng
                    văn bản.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong trường hợp KH vi phạm thời gian thanh
                    to&aacute;n, IMD c&oacute; quyền (i) cầm giữ v&agrave; định đoạt một lượng Bưu gửi nhất định v&agrave;
                    c&aacute;c chứng từ li&ecirc;n quan đến Bưu gửi; v&agrave;/hoặc (ii) cấn trừ trực tiếp v&agrave;o Tiền thu
                    hộ m&agrave; IMD đ&atilde; hỗ trợ thực hiện. Trường hợp Bưu gửi hoặc Tiền thu hộ kh&ocirc;ng đủ để cấn trừ
                    Cước ph&iacute; Dịch vụ th&igrave; KH phải thanh to&aacute;n th&ecirc;m Cước ph&iacute; Dịch vụ c&ograve;n
                    thiếu trong v&ograve;ng 03 (ba) ng&agrave;y từ ng&agrave;y IMD th&ocirc;ng b&aacute;o.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được KH b&ocirc;̀i thường/bồi
                    ho&agrave;nđ&acirc;̀y đủ trong trường hợp c&oacute; thi&ecirc;̣t hại xảy ra do KH vi phạm Hợp
                    đ&ocirc;̀ng, vi phạm pháp lu&acirc;̣t v&ecirc;̀ Bưu chính, vi phạm ph&aacute;p luật kh&aacute;c.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD sẽ được miễn trừ tr&aacute;ch nhiệm bồi
                    thường trong trường hợp Bưu gửi bị thất tho&aacute;t bởi Người nhận m&agrave; KH hoặc Người gửi đ&atilde;
                    chỉ định, bao gồm nhưng kh&ocirc;ng giới hạn việc Bưu gửi bị cướp, giật, đ&aacute;nh tr&aacute;o, lừa
                    đảo&hellip;. Để x&aacute;c định sự việc n&agrave;y do Người nhận thực hiện, IMD sẽ hỗ trợ tiến h&agrave;nh
                    tr&igrave;nh b&aacute;o cơ quan c&oacute; thẩm quyền để giải quyết.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Nghĩa vụ</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Thực hi&ecirc;̣n nghi&ecirc;m túc cam
                    k&ecirc;́t v&ecirc;̀ thời hạn, quy trình, Thời gian Toàn trình cung ứng Dịch vụ như đ&atilde; thỏa
                    thuận.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung cấp đúng, đầy đủ th&ocirc;ng tin về Dịch vụ
                    cung ứng, Cước phí Dịch vụ đã cung ứng cho KH và tr&aacute;ch nhiệm bồi thường thiệt hại, c&aacute;c
                    th&ocirc;ng tin li&ecirc;n quan kh&aacute;c (nếu c&oacute;).&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Hướng dẫn KH sử dụng v&agrave; thực hiện
                    đ&uacute;ng c&aacute;c quy định, quy tr&igrave;nh cung ứng Dịch vụ.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đảm bảo chất lượng Dịch vụ theo đ&uacute;ng
                    ti&ecirc;u chuẩn đ&atilde; c&ocirc;ng b&ocirc;́ v&agrave; thoả thuận giữa C&aacute;c B&ecirc;n. C&ocirc;ng
                    bố r&otilde;, kịp thời với đại di&ecirc;̣n KH c&aacute;c phương &aacute;n, biện ph&aacute;p xử l&yacute;
                    trong trường hợp hoàn thành cung ứng Dịch vụ kh&ocirc;ng đúng như cam k&ecirc;́t.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Bồi thường thiệt hại cho KH (nếu c&oacute;) trong
                    trường hợp c&oacute; vi phạm &nbsp; &nbsp;theo cam kết quy định tại Hợp đồng, c&aacute;c Phụ lục k&egrave;m
                    theo Hợp đồng n&agrave;y v&agrave; theo quy định của ph&aacute;p luật.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đảm bảo an to&agrave;n, ch&iacute;nh x&aacute;c
                    v&agrave; b&iacute; mật th&ocirc;ng tin của KH theo qui định của ph&aacute;p luật, giữ b&iacute; mật
                    th&ocirc;ng tin ri&ecirc;ng về Người nh&acirc;̣n, Người gửi, trừ trường hợp c&aacute;c th&ocirc;ng tin
                    n&agrave;y xuất ph&aacute;t từ b&ecirc;n thứ ba hoặc được c&ocirc;ng bố rộng r&atilde;i tr&ecirc;n website
                    của KH hoặc bất kỳ trang web/h&igrave;nh thức c&ocirc;ng khai n&agrave;o kh&aacute;c.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đảm bảo an to&agrave;n cho Bưu gửi, kh&ocirc;ng
                    b&oacute;c mở, tr&aacute;o đổi nội dung th&ocirc;ng tin h&agrave;ng h&oacute;a v&agrave; chứng từ
                    đ&iacute;nh k&egrave;m trừ trường hợp ph&aacute;p luật c&oacute; quy định, IMD cần kiểm tra hoặc C&aacute;c
                    b&ecirc;n c&oacute; thỏa thuận kh&aacute;c.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Hoàn trả Bưu gửi cho KH khi KH y&ecirc;u
                    c&acirc;̀u, Người nhận từ chối nhận Bưu gửi hoặc kh&ocirc;ng giao được cho Người nhận mặc dù đã áp
                    dụng mọi phương thức li&ecirc;n lạc có th&ecirc;̉. Trong trường hợp n&agrave;y, KH vẫn phải thanh
                    to&aacute;n Cước ph&iacute; Dịch vụ cho c&aacute;c Đơn h&agrave;ng bị trả về n&agrave;y v&agrave; Cước
                    ph&iacute; Trả h&agrave;ng theo quy định tại Phụ lục 2 đ&iacute;nh k&egrave;m Hợp đồng n&agrave;y.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tiếp nhận, giải quy&ecirc;́t hoặc h&ocirc;̃
                    trợ giải quy&ecirc;́t mọi khiếu nại của KH li&ecirc;n quan đến việc cung cấp Dịch vụ của IMD bao gồm
                    nhưng kh&ocirc;ng giới hạn ch&acirc;́t lượng Dịch vụ, khiếu nại về Đơn h&agrave;ng&hellip;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Thu hộ tiền Bưu gửi cho KH v&agrave; ho&agrave;n
                    trả Tiền thu hộ theo đ&uacute;ng quy tr&igrave;nh thỏa thuận giữa C&aacute;c b&ecirc;n (nếu
                    c&oacute;).</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p></p>
        <p></p>
        <p></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 7. QUYỀN V&Agrave; NGHĨA VỤ
                        KH&Aacute;CH H&Agrave;NG</span></u></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'>7.1&nbsp;Quyền</span></strong>
                </li>
            </ul>
        </div>
        <ol class="decimal_type" start="1" style="list-style-type: lower-alpha;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được <strong>IMD</strong> cung cấp đầy đủ
                    th&ocirc;ng tin li&ecirc;n quan đến toàn b&ocirc;̣ quy trình cung ứng Dịch vụ.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được IMD đảm bảo b&iacute; mật th&ocirc;ng tin,
                    an to&agrave;n đối với Bưu gửi trong toàn qu&aacute; tr&igrave;nh giao h&agrave;ng theo quy định của
                    ph&aacute;p luật.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được IMD giải quyết khiếu nại, được giải
                    quy&ecirc;́t thỏa đáng về Dịch vụ cung ứng đ&atilde; sử dụng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Được IMD bồi thường thiệt hại tùy theo thực
                    t&ecirc;́ từng trường hợp.</span>
                <ol class="decimal_type" style="list-style-type: undefined;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'>Nghĩa vụ</span></strong></li>
                </ol>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>B&ocirc;́ trí, sắp x&ecirc;́p nh&acirc;n
                    vi&ecirc;n thực hi&ecirc;̣n vi&ecirc;̣c đ&ocirc;́i soát Cước phí Dịch vụ đảm bảo đúng thời
                    hạn.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuy&ecirc;̣t đ&ocirc;́i kh&ocirc;ng gửi Bưu gửi
                    chưa được lưu th&ocirc;ng tr&ecirc;n thị trường, h&agrave;ng cấm, h&agrave;ng hạn chế vận chuyển/kinh doanh
                    hoặc h&agrave;ng kinh doanh c&oacute; điều kiện nhưng kh&ocirc;ng cung cấp được giấy ph&eacute;p
                    hoặc/v&agrave; kh&ocirc;ng đ&aacute;p ứng điều kiện kh&aacute;c theo quy định của ph&aacute;p
                    luật.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Phối hợp với IMD thực hiện việc kiểm tra nội dung
                    của Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Chịu tr&aacute;ch nhiệm trước IMD v&agrave;
                    trước ph&aacute;p luật về n&ocirc;̣i dung Bưu gửi, h&oacute;a đơn, chứng từ ngu&ocirc;̀n g&ocirc;́c
                    xu&acirc;́t xứ của Bưu gửi v&agrave; chứng từ đ&iacute;nh k&egrave;m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Chịu tr&aacute;ch nhiệm l&agrave;m việc, giải
                    quyết với Cơ quan c&oacute; thẩm quyền khi Bưu gửi bị tạm giữ hoặc tịch thu.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung cấp đầy đủ h&oacute;a đơn, chứng từ của Bưu
                    gửi cho IMD khi gửi Bưu gửi.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>IMD sẽ được miễn trừ tr&aacute;ch nhiệm bồi
                    thường trong trường hợp Bưu gửi bị tạm giữ hoặc tịch thu bởi cơ quan c&oacute; thẩm quyền do Bưu gửi
                    kh&ocirc;ng c&oacute; h&oacute;a đơn, chứng từ hợp ph&aacute;p đ&iacute;nh k&egrave;m.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Thanh to&aacute;n đầy đủ, đúng hạn Cước
                    ph&iacute; Dịch vụ, lãi trả ch&acirc;̣m (n&ecirc;́u có) theo quy định tại Điều 4 Hợp đồng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đ&oacute;ng g&oacute;i Bưu gửi theo đ&uacute;ng
                    quy c&aacute;ch, k&iacute;ch thước v&agrave; t&iacute;nh chất của từng mặt h&agrave;ng, đặc biệt đối với Bưu
                    gửi l&agrave; c&aacute;c mặt h&agrave;ng dễ vỡ, dễ hư hỏng&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Cung c&acirc;́p đ&acirc;̀y đủ chỉ dẫn li&ecirc;n
                    quan đến Bưu gửi; th&ocirc;ng tin li&ecirc;n quan đến Người gửi, Người nhận tr&ecirc;n Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Bồi thường thiệt hại thực tế cho IMD v&agrave;
                    b&ecirc;n thứ ba c&oacute; li&ecirc;n quan khi thiệt hại xảy ra có ngu&ocirc;̀n g&ocirc;́c từ KH/Người
                    gửi theo quy định của ph&aacute;p luật.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Chịu tr&aacute;ch nhiệm về mọi th&ocirc;ng tin
                    li&ecirc;n quan đến Người nhận m&agrave; KH giao cho IMD. Trường hợp xảy ra sai s&oacute;t về th&ocirc;ng
                    tin Người nhận hoặc Bưu gửi kh&ocirc;ng đ&uacute;ng y&ecirc;u cầu của Người nhận th&igrave; KH c&oacute;
                    tr&aacute;ch nhiệm tự giải quyết với Người nhận, đồng thời KH vẫn phải thanh to&aacute;n Cước ph&iacute;
                    Dịch vụ đối với Đơn h&agrave;ng tr&ecirc;n dựa tr&ecirc;n lộ tr&igrave;nh đ&atilde; thực hiện.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Bằng chi ph&iacute; của m&igrave;nh, chịu
                    tr&aacute;ch nhiệm giải quyết c&aacute;c vấn đề li&ecirc;n quan đến (i) tranh chấp về quyền sở hữu Bưu gửi,
                    nguồn gốc Bưu gửi với b&ecirc;n thứ ba bất kỳ; hoặc (ii) khiếu nại của Người nhận về việc h&agrave;ng
                    h&oacute;a bị lỗi, hư hỏng hoặc kh&ocirc;ng đ&uacute;ng y&ecirc;u cầu.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp ngừng sử dụng Dịch vụ của IMD, KH phải
                    th&ocirc;ngb&aacute;o bằng văn bản trước 15 (mười lăm) ng&agrave;y để IDM thực hiện đối so&aacute;t
                    v&agrave; thanh to&aacute;n đ&uacute;ng hạn.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Kh&ocirc;ng được chuyển nhượng hoặc chuyển giao
                    Hợp đồng hoặc bất kỳ quyền v&agrave; nghĩa vụ của m&igrave;nh theo Hợp đồng n&agrave;y cho b&ecirc;n thứ ba
                    m&agrave; kh&ocirc;ng được sự đồng &yacute; bằng văn bản của IMD.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 8. CHẤM DỨT HỢP
                        ĐỒNG</span></u></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Hợp đ&ocirc;̀ng này được ch&acirc;́m dứt trong
                các trường hợp sau đ&acirc;y:</span>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.1&nbsp;</strong> Hợp đ&ocirc;̀ng h&ecirc;́t hạn.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.2&nbsp;</strong> Hợp đồng c&oacute; thể chấm dứt trước thời hạn
                    theo thoả thuận của C&aacute;c B&ecirc;n tham gia Hợp đồng v&agrave; đảm bảo c&aacute;c nguy&ecirc;n
                    tắc:&nbsp;</span></li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&aacute;c B&ecirc;n phải c&oacute; th&ocirc;ng
                    bảo, thoả thuận với nhau trước tối thiểu 10 (mười) ng&agrave;y.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- C&aacute;c B&ecirc;n</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;thực hiện ho&agrave;n th&agrave;nh thanh
                    to&aacute;n c&aacute;c khoản Cước ph&iacute; Dịch vụ, chi ph&iacute; ph&aacute;t sinh trước khi chấm dứt Hợp
                    đồng.</span>
            </li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.3&nbsp;</strong>C&aacute;c B&ecirc;n vi phạm bất kỳ điều
                    khoản n&agrave;o của Hợp đồng m&agrave; kh&ocirc;ng thể thoả thuận thống nhất được. Trong trường hợp
                    n&agrave;y, B&ecirc;n bị vi phạm c&oacute; quyền đơn phương chấm dứt Hợp đồng nếu sau thời hạn 15
                    (mười lăm) ng&agrave;y m&agrave; B&ecirc;n vi phạm kh&ocirc;ng thể khắc ph&uacute;c được h&agrave;nh
                    vi vi phạm. Đồng thời B&ecirc;n vi phạm phải bồi thường to&agrave;n bộ thiệt hại xảy ra cho
                    B&ecirc;n bị vi phạm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Ri&ecirc;ng trường hợp KH vi phạm ph&aacute;p luật về
                    việc gửi h&agrave;ng cấm th&igrave; IMD được quyền chấm dứt Hợp đồng ngay lập tức m&agrave; kh&ocirc;ng cần phải
                    thực hiện sau thời gian y&ecirc;u cầu KH khắc phục vi phạm.</span></li>
        </ul>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <span style='font-family:"DejaVu Sans",serif;color:black;'><strong>8.4&nbsp;</strong>Các trường hợp khác theo quy
                        định</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;của Luật Việt
                        Nam.&nbsp;</span>
                </li>
            </ul>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 9. BẢO MẬT TH&Ocirc;NG
                        TIN</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.1&nbsp;</strong> Mỗi B&ecirc;n phải tiến h&agrave;nh c&aacute;c
                    biện ph&aacute;p v&agrave; h&agrave;nh động cần thiết nhằm bảo mật Th&ocirc;ng tin Bảo mật.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>C&aacute;c B&ecirc;n trong Hợp đồng n&agrave;y
                    v&agrave; nh&acirc;n vi&ecirc;n của m&igrave;nh kh&ocirc;ng được quyền sử dụng, c&ocirc;ng bố Th&ocirc;ng
                    tin Bảo mật cho bất kỳ mục đ&iacute;ch n&agrave;o kh&aacute;c ngoại trừ để thực hiện Hợp đồng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.2&nbsp;</strong> Mỗi B&ecirc;n bảo đảm rằng bất kỳ b&ecirc;n thứ
                    ba n&agrave;o nhận được Th&ocirc;ng tin Bảo mật sẽ kh&ocirc;ng được ph&eacute;p tiết lộ Th&ocirc;ng tin Bảo
                    mật cho bất kỳ người n&agrave;o v&agrave; chỉ được ph&eacute;p xử l&yacute; Th&ocirc;ng tin Bảo mật theo quy
                    định v&agrave; nhằm mục đ&iacute;ch thực hiện Hợp đồng n&agrave;y, trừ khi việc tiết lộ th&ocirc;ng tin được
                    thực hiện theo y&ecirc;u cầu của ph&aacute;p luật hoặc Cơ quan c&oacute; thẩm quyền.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.3&nbsp;</strong> Trong trường hợp B&ecirc;n n&agrave;o được
                    y&ecirc;u cầu tiết lộ Th&ocirc;ng tin Bảo mật cho c&aacute;c Cơ quan c&oacute; thẩm quyền theo quy định của
                    ph&aacute;p luật, B&ecirc;n được y&ecirc;u cầu phải gửi văn bản th&ocirc;ng b&aacute;o trước cho B&ecirc;n
                    c&ograve;n lại về y&ecirc;u cầu đ&oacute;, trừ khi được y&ecirc;u cầu kh&aacute;c của Cơ quan c&oacute; thẩm
                    quyền.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>9.4&nbsp;</strong> Việc hết hạn hoặc chấm dứt Hợp đồng n&agrave;y sẽ
                    kh&ocirc;ng chấm dứt nghĩa vụ bảo mật Th&ocirc;ng tin Bảo mật của C&aacute;c B&ecirc;n.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 10. GIẢI QUYẾT TRANH
                        CHẤP</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>10.1&nbsp;</strong>Mọi tranh chấp, tranh c&atilde;i hay những bất
                    đồng giữa C&aacute;c B&ecirc;n, ph&aacute;t sinh từ v&agrave;/hoặc li&ecirc;n quan đến Hợp đồng n&agrave;y,
                    hay từ việc vi phạm Hợp đồng, sẽ được giải quyết trước hết th&ocirc;ng qua thương lượng tr&ecirc;n tinh
                    th&acirc;̀n thiện ch&iacute; <strong>giữa</strong> C&aacute;c B&ecirc;n. Nếu tranh chấp kh&ocirc;ng thể giải
                    quyết được bằng thương lượng, thiện ch&iacute; th&igrave; sẽ được giải quyết bởi T&ograve;a &aacute;n
                    c&oacute; thẩm quyền.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>10.2&nbsp;</strong>B&ecirc;n thua kiện phải chịu to&agrave;n bộ
                    c&aacute;c chi ph&iacute; c&oacute; li&ecirc;n quan bao gồm nhưng kh&ocirc;ng giới hạn &aacute;n ph&iacute;,
                    lệ ph&iacute; gi&aacute;m định, chi ph&iacute; luật sư&hellip;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 11. BẤT KHẢ
                        KH&Aacute;NG</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>11.1&nbsp;</strong>B&ecirc;n bị ảnh hưởng bởi Sự kiện Bất khả
                    kh&aacute;ng phải, ngay khi biết được, th&ocirc;ng b&aacute;o to&agrave;n bộ sự việc bằng văn bản cho
                    B&ecirc;n kia v&agrave; phải cố gắng hết sức v&agrave; &aacute;p dụng c&aacute;c biện ph&aacute;p khắc phục
                    thiệt hại, mất m&aacute;t do Sự kiện Bất khả kh&aacute;ng g&acirc;y ra. B&ecirc;n kia sẽ hỗ trợ v&agrave;
                    hợp t&aacute;c với B&ecirc;n bị ảnh hưởng.&nbsp;</span></li>
        </ul>
        <ul>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>11.2&nbsp;</strong>Trong trường hợp Sự kiện Bất khả kh&aacute;ng xảy
                    ra trong một khoảng thời gian li&ecirc;n tục qu&aacute; s&aacute;u mươi (60) ng&agrave;y, B&ecirc;n bị ảnh
                    hưởng c&oacute; quyền chấm dứt Hợp đồng ngay sau khi gửi văn bản th&ocirc;ng b&aacute;o cho B&ecirc;n kia.
                    Trong trường hợp n&agrave;y, kh&ocirc;ng B&ecirc;n n&agrave;o phải chịu bất kỳ tr&aacute;ch nhiệm bồi thường
                    hay phạt vi phạm n&agrave;o đối với B&ecirc;n kia.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 12. CHỐNG HỐI
                        LỘ</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>12.1&nbsp;</strong>KH cam kết rằng KH cũng như nh&acirc;n
                    vi&ecirc;n, Người gửi của m&igrave;nh kh&ocirc;ng tặng qu&agrave; cho IMD cũng như nh&acirc;n vi&ecirc;n
                    IMD, đồng thời kh&ocirc;ng được y&ecirc;u cầu nh&acirc;n vi&ecirc;n IMD tặng qu&agrave;. Qu&agrave; trong
                    điều khoản n&agrave;y được hiểu l&agrave; c&aacute;c m&oacute;n qu&agrave; biếu bao gồm nhưng kh&ocirc;ng
                    giới hạn c&aacute;c m&oacute;n qu&agrave; c&oacute; gi&aacute; trị hoặc kh&ocirc;ng c&oacute; gi&aacute;
                    trị, tiền, lời hứa hoặc bất kỳ khoản hoa hồng n&agrave;o.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>12.2&nbsp;</strong>Trường hợp KH vi phạm, IMD c&oacute; quyền chấm
                    dứt Hợp đồng n&agrave;y, đồng thời KH phải chịu phạt 8% Cước ph&iacute; Dịch vụ của th&aacute;ng vi
                    phạm.&nbsp;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><u><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐI&Ecirc;̀U 13. CAM K&Ecirc;́T CHUNG GIỮA
                        CÁC B&Ecirc;N&nbsp;</span></u></strong>
        </p>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.1&nbsp;</strong>Các B&ecirc;n cam k&ecirc;́t tuy&ecirc;̣t
                    đ&ocirc;́i kh&ocirc;ng vi phạm quy định ph&aacute;p luật v&agrave; c&aacute;c điều khoản tại Hợp đồng
                    n&agrave;y.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.3&nbsp;</strong>Các B&ecirc;n thực hi&ecirc;̣n nghi&ecirc;m
                    túc, đ&acirc;̀y đủ mọi đi&ecirc;̀u khoản ghi trong Hợp đ&ocirc;̀ng này.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.3&nbsp;</strong>Mọi sửa đổi, bổ sung của Hợp đồng n&agrave;y phải
                    được đồng &yacute; bằng văn bản của C&aacute;c B&ecirc;n.Hợp đồng v&agrave; c&aacute;c phụ lục của Hợp đồng
                    (nếu c&oacute;) c&ugrave;ng với tất cả c&aacute;c t&agrave;i liệu li&ecirc;n quan v&agrave; đi k&egrave;m
                    kh&aacute;c sẽ thiết lập n&ecirc;n to&agrave;n bộ Hợp đồng c&oacute; gi&aacute; trị r&agrave;ng buộc giữa
                    C&aacute;c B&ecirc;n v&agrave; sẽ thay thế, hủy bỏ to&agrave;n bộ c&aacute;c thương lượng, t&agrave;i liệu,
                    khẳng định, cam kết v&agrave; thỏa thuận trước khi lập Hợp đồng.&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong trường hợp c&oacute; bất kỳ m&acirc;u thuẫn
                    n&agrave;o giữa Hợp đồng v&agrave; c&aacute;c phụ lục của Hợp đồng th&igrave; c&aacute;c điều khoản của Hợp đồng
                    sẽ được ưu ti&ecirc;n &aacute;p dụng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.4&nbsp;</strong>Mỗi B&ecirc;n tự chịu c&aacute;c khoản chi
                    ph&iacute; v&agrave; ph&iacute; tổn của B&ecirc;n m&igrave;nh trong việc thương lượng, dự thảo, ph&ecirc;
                    chuẩn v&agrave; k&yacute; kết Hợp đồng v&agrave; c&aacute;c phụ lục của Hợp đồng (nếu c&oacute;) v&agrave;
                    c&aacute;c t&agrave;i liệu c&oacute; li&ecirc;n quan n&ecirc;u trong Hợp đồng v&agrave; c&aacute;c phụ lục
                    của Hợp đồng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.5&nbsp;</strong>Hợp đồng kh&ocirc;ng thiết lập quan hệ giữa
                    C&aacute;c B&ecirc;n như &nbsp;l&agrave; đại l&yacute; hay đại diện của b&ecirc;n kia, nhằm tạo ra sự tin
                    tưởng hay mối quan hệ đối t&aacute;c thương mại. Kh&ocirc;ng B&ecirc;n n&agrave;o c&oacute; quyền được
                    h&agrave;nh động hay g&aacute;nh tr&aacute;ch nhiệm tr&ecirc;n danh nghĩa của B&ecirc;n kia trong Hợp đồng
                    n&agrave;y.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.6&nbsp;</strong>Tất cả th&ocirc;ng b&aacute;o v&agrave; phương
                    tiện li&ecirc;n lạc được quy định hoặc y&ecirc;u cầu theo Hợp đồng n&agrave;y phải được lập th&agrave;nh văn
                    <strong>bản</strong> v&agrave; sẽ được (i) gửi thư ri&ecirc;ng, (ii) gửi thư bằng c&aacute;ch x&aacute;c
                    nhận hoặc gửi bảo đảm k&egrave;m theo giấy b&aacute;o đ&atilde; gửi thư theo y&ecirc;u cầu, hoặc gửi thư
                    bằng đường h&agrave;ng kh&ocirc;ng, (iii) gửi qua thư điện tử e-mail, hoặc (iv) gửi fax đến C&aacute;c
                    B&ecirc;n tương ứng. IMD c&oacute; thể dựa v&agrave;o th&ocirc;ng b&aacute;o của người được ủy quyền bởi KH,
                    đồng thời sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm t&igrave;m hiểu, điều tra về thẩm quyền của người
                    đ&oacute;. Trong mọi trường hợp việc Hợp đồng được k&yacute; bởi người đại diện c&oacute; thẩm quyền
                    v&agrave; đ&oacute;ng dấu giữa C&aacute;c b&ecirc;n đều c&oacute; gi&aacute; trị ph&aacute;p l&yacute; thực
                    hiện.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.7&nbsp;</strong>Hợp đồng sẽ tự động thanh l&yacute; trong trường
                    hợp được chấm dứt theo một trong c&aacute;c quy định tại Điều 8 v&agrave; mỗi B&ecirc;n đ&atilde; thực hiện
                    đầy đủ c&aacute;c nghĩa vụ theo Hợp đồng</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.8&nbsp;</strong>Hợp Đồng n&agrave;y c&oacute; hiệu lực 01 (một)
                    năm kể từ ng&agrave;y k&yacute;. Hợp đồng n&agrave;y sẽ tự động gia hạn v&agrave; mỗi lần gia hạn sẽ
                    l&agrave; 01 (một) năm nếu 30 (ba mươi) ng&agrave;y trước khi hết hạn Hợp đồng, mỗi B&ecirc;n kh&ocirc;ng
                    th&ocirc;ng b&aacute;o cho ph&iacute;a B&ecirc;n kia về &yacute; định chấm dứt Hợp Đồng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>13.9&nbsp;</strong>Hợp đồng được lập th&agrave;nh 02 bản bằng Tiếng
                    Việt, c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi B&ecirc;n giữ 01 bản để thực hiện.</span>
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
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ĐỐC</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
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
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PHỤ LỤC 01</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>THỜI HẠN, THỜI HIỆU V&Agrave; QUY
                    TR&Igrave;NH GIẢI QUYẾT KHIẾU NẠI</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c
                    Dịch vụ vận chuyển <strong>số <?= date("dm"); ?> /<?= date("Y"); ?>/HĐHT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>giữa c&ocirc;ng ty C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ v&agrave; Dịch vụ
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave; &ldquo;<strong>Hợp
                        đồng</strong>&rdquo;)</em></span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'><br>&nbsp;</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>ĐIỀU 1: QUY ĐỊNH CHUNG VỀ BỒI THƯỜNG</span></strong>
            </p>
        </div>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1&nbsp;</strong>Số tiền bồi thường tối đa sẽ kh&ocirc;ng vượt
                    qu&aacute; gi&aacute; trị khai gi&aacute; tối đa của Nh&agrave; vận chuyển.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2&nbsp;</strong>Trường hợp đơn h&agrave;ng xảy ra lỗi do
                    ph&iacute;a KH (Người gửi) hoặc do đặc t&iacute;nh tự nhi&ecirc;n của đơn h&agrave;ng h&oacute;a, IMD sẽ
                    kh&ocirc;ng chịu mọi tr&aacute;ch nhiệm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3&nbsp;</strong>Tất cả c&aacute;c trường hợp đơn h&agrave;ng bị
                    Cơ quan nh&agrave; nước c&oacute; thẩm quyền thu giữ, hoặc ti&ecirc;u hủy do kh&aacute;ch h&agrave;ng vi
                    phạm quy định của ph&aacute;p luật IMD từ chối hỗ trợ v&agrave; kh&ocirc;ng chịu mọi tr&aacute;ch
                    nhiệm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4&nbsp;</strong>IMD từ chối tiếp nhận v&agrave; xử l&yacute;
                    khiếu nại ph&aacute;t sinh trong trường hợp Người gửi kh&ocirc;ng thực hiện đầy đủ c&aacute;c quy định về
                    gửi h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5&nbsp;</strong>Đối với đơn h&agrave;ng c&oacute; sử dụng khai
                    gi&aacute; h&agrave;ng h&oacute;a: cần đảm bảo thực hiện c&aacute;c quy định sau đ&acirc;y:</span></li>
        </ol>
        <ul style="list-style-type: disc;margin-left:17px;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;Khai b&aacute;o gi&aacute; trị h&agrave;ng
                    h&oacute;a kh&ocirc;ng vượt qu&aacute; gi&aacute; trị khai gi&aacute; tối đa của nh&agrave; vận
                    chuyển.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;Đối với đơn h&agrave;ng c&oacute; sử dụng
                    khai gi&aacute;, kh&aacute;ch h&agrave;ng phải thực hiện đồng kiểm với nh&acirc;n vi&ecirc;n tới lấy
                    h&agrave;ng hoặc nh&acirc;n vi&ecirc;n bưu cục.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;IMD sẽ c&oacute; quyền y&ecirc;u cầu
                    kh&aacute;ch h&agrave;ng cung cấp h&oacute;a đơn, chứng từ hợp lệ của đơn h&agrave;ng để xem x&eacute;t việc
                    khai gi&aacute; h&agrave;ng h&oacute;a</span><span style='font-family:"DejaVu Sans",serif;color:black;'>.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;:&nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a đơn, chứng từ hợp lệ được hiểu
                    l&agrave; bao gồm nhưng kh&ocirc;ng giới hạn tại c&aacute;c trường hợp sau:</span></em>
        </p>
        <ul style="list-style-type: disc;margin-left:21.5px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a đơn gi&aacute; trị gia tăng, nếu người
                        b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai thuế gi&aacute; trị gia tăng theo phương ph&aacute;p
                        khấu trừ</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a đơn b&aacute;n h&agrave;ng, nếu người
                        b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai thuế gi&aacute; trị gia tăng theo phương ph&aacute;p
                        trực tiếp hoặc Hộ kinh doanh.</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Hồ sơ k&ecirc; khai hải quan, nếu h&agrave;ng h&oacute;a
                        được nhập khẩu v&agrave;o Việt Nam</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span></em>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 2: KHAI GI&Aacute; H&Agrave;NG
                        H&Oacute;A</span></strong>
            </p>
        </div>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.1&nbsp;</strong>Ph&iacute; khai&nbsp;gi&aacute; h&agrave;ng
                    h&oacute;a l&agrave; số tiền KH sử dụng cho c&aacute;c rủi ro từ b&ecirc;n ngo&agrave;i g&acirc;y mất
                    m&aacute;t, tổn thất vật chất đối với h&agrave;ng h&oacute;a được khai gi&aacute;, xảy ra trong qu&aacute;
                    tr&igrave;nh vận chuyển hoặc lưu kho tạm thời trong qu&aacute; tr&igrave;nh vận chuyển.&nbsp;</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.2&nbsp;</strong>Số tiền khai gi&aacute; cho mỗi đơn
                    h&agrave;ng được quy định theo từng Nh&agrave; vận chuyển:</span></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- HolaShip (tên một ứng dụng thuộc IMD và là khái niệm đại diện cho IMD trong Hợp đồng):</span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span></li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Dưới 3.000.000 VND miễn ph&iacute;&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Từ 3.000.001 &ndash; 10.000.000 VND t&iacute;nh
                            ph&iacute; 1 % gi&aacute; trị h&agrave;ng h&oacute;a&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; trị khai gi&aacute; tối đa 10.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- GHN Express</span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span></li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Miễn ph&iacute; khai gi&aacute; với h&agrave;ng
                            h&oacute;a c&oacute; gi&aacute; trị đến 3.000.000 VND</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>H&agrave;ng h&oacute;a c&oacute; gi&aacute; trị từ
                            tr&ecirc;n 3.000.000 VND đến 10.000.000 VND: 0,5 % * gi&aacute; trị h&agrave;ng
                            h&oacute;a&nbsp;</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; trị khai gi&aacute; tối đa 10.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <ul class="decimal_type" style="list-style-type: none;margin-left:17px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>- J&amp;T:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></em>
            </li>
            <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Miễn ph&iacute; khai gi&aacute; với h&agrave;ng
                            h&oacute;a c&oacute; gi&aacute; trị đến 1.000.000 VND</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>H&agrave;ng h&oacute;a c&oacute; gi&aacute; trị từ
                            tr&ecirc;n 1.000.000 VND: 1,1% * gi&aacute; trị h&agrave;ng h&oacute;a</span></em></li>
                <li><em><span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; trị khai gi&aacute; tối đa 30.000.000
                            VND</span></em></li>
            </ul>
        </ul>

        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;background:white;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 3: CH&Iacute;NH S&Aacute;CH BỒI
                        THƯỜNG</span></strong>
            </p>
        </div>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1&nbsp;</strong>&nbsp;Đối với nh&agrave; vận chuyển
                            HolaShip</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip c&oacute; tr&aacute;ch nhiệm bồi thường
                thiệt hại xảy ra trong qu&aacute; tr&igrave;nh cung ứng Dịch vụ chuyển ph&aacute;t dẫn đến lỗi mất m&aacute;t
                hoặc hư hỏng một phần hoặc hư hỏng to&agrave;n phần đối với h&agrave;ng h&oacute;a.&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Việc bồi thường thiệt hại li&ecirc;n quan đến thực
                trạng Bưu gửi được thực hiện như sau:&nbsp;</span>
        </p>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1&nbsp;</strong>Bưu gửi l&agrave; vật phẩm,
                            h&agrave;ng h&oacute;a hoặc giấy tờ c&oacute; gi&aacute; trị</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;(bao gồm c&aacute;c &nbsp;loại giấy tờ sau:
                    Phiếu qu&agrave; tặng, phiếu giảm gi&aacute;, phiếu học, phiếu mua h&agrave;ng hoặc giấy tờ c&oacute;
                    gi&aacute; trị tương đương với phiếu mua h&agrave;ng): Bồi thường theo thiệt hại thực tế, căn cứ v&agrave;o:
                    (i) Gi&aacute; trị thu hộ; hoặc (ii) Cơ sở x&aacute;c minh gi&aacute; trị Bưu gửi (được hiểu l&agrave; trị
                    gi&aacute; Bưu gửi ghi tr&ecirc;n h&oacute;a đơn c&oacute; gi&aacute; trị ph&aacute;p l&yacute;, ghi
                    r&otilde; nội dung h&agrave;ng h&oacute;a tr&ecirc;n h&oacute;a đơn; hoặc Gi&aacute; trị thấp nhất của Bưu
                    gửi tham khảo thị trường của 03 (ba) website b&aacute;n h&agrave;ng tại Việt Nam). HolaShip sẽ thực hiện
                    việc bồi thường như sau:&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp Bưu gửi bị mất:
                    &nbsp;</span>
            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: undefined;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1.1&nbsp;</strong>Trường hợp Bưu gửi bị mất:
                        &nbsp;</span></em></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp c&oacute;</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;thu hộ th&igrave; bồi thường 100 % gi&aacute;
                    trị thu hộ.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp kh&ocirc;ng</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;c&oacute; thu hộ hoặc thu hộ thấp hơn
                    gi&aacute; trị thực, gi&aacute; trị dưới 1.000.000 VND th&igrave; đền b&ugrave; 100 % theo Cơ sở x&aacute;c
                    minh gi&aacute; trị Bưu gửi (nhưng tối đa kh&ocirc;ng qu&aacute; 1.000.000 VND (một triệu đồng)).</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong trường hợp kh&ocirc;ng thu hộ hoặc thu hộ
                    thấp hơn gi&aacute; trị thực, gi&aacute; trị tr&ecirc;n 1.000.000 VND, c&oacute; khai gi&aacute;, c&oacute;
                    h&oacute;a đơn VAT: đền 100 % theo gi&aacute; trị tr&ecirc;n h&oacute;a đơn VAT.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong trường hợp kh&ocirc;ng thu hộ hoặc thu hộ
                    thấp hơn gi&aacute; trị thực, gi&aacute; trị tr&ecirc;n 1.000.000 VND, kh&ocirc;ng khai
                    gi&aacute;:</span><span style="color:black;">&nbsp;bồi thường bằng 04 (bốn) lần cước hoặc gi&aacute; trị
                    linh hoạt</span><span style='font-family:"DejaVu Sans",serif;'>.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp kh&ocirc;ng c&oacute; thu hộ v&agrave;
                    kh&ocirc;ng c&oacute; Cơ sở x&aacute;c minh gi&aacute; trị bưu gửi th&igrave; bồi thường 04 (bốn) lần cước
                    ph&iacute; của Dịch vụ đ&atilde; sử dụng. &nbsp;</span>
                <ol class="decimal_type" style="list-style-type: undefined;">

                </ol>
            </li>
        </ul>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.1.2&nbsp;</strong>Trường hợp Bưu gửi bị hư hỏng:
                        &nbsp;</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi
                thường mất h&agrave;ng, tuy nhi&ecirc;n gi&aacute; trị bồi thường phụ thuộc v&agrave;o mức độ hư hỏng của Bưu
                gửi, cụ thể như sau:&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:57.6pt;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute;
                        trị&nbsp;</span></em></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>bồi
                thường<strong><em>&nbsp;= Mức&nbsp;</em></strong>bồi thường <strong><em>theo ch&iacute;nh s&aacute;ch mất
                        h&agrave;ng&nbsp;</em></strong>x<strong><em>&nbsp;mức&nbsp;</em></strong>bồi thường <strong><em>theo
                        bảng b&ecirc;n dưới</em></strong></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:22.5pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Bảng gi&aacute;
                    trị&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>bồi thường
                <strong>đối với h&agrave;ng h&oacute;a hư hỏng:<em>&nbsp;</em></strong></span>
        </p>
        <table style="width: 4.7e+2pt;margin-left:15.6pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;background:#C6D9F1;padding:2.55pt 5.15pt 0cm 5.35pt;height:2.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Trạng
                                    th&aacute;i</span></strong>
                        </p>
                    </td>
                    <td style="width: 73.65pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;background: rgb(198, 217, 241);padding: 2.55pt 5.15pt 0cm 5.35pt;height: 2.25pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức đền
                                    b&ugrave;</span></strong>
                        </p>
                    </td>
                    <td style="width:199.25pt;border:solid black 1.0pt;border-left:  none;background:#C6D9F1;padding:2.55pt 5.15pt 0cm 5.35pt;height:2.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị đền
                                    b&ugrave;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất phụ kiện, sản phẩm c&ograve;n
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mức bồi thường theo ch&iacute;nh
                                s&aacute;ch mất h&agrave;ng x 20 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ, hư
                                hại từ 1 % đến 30 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>30 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mức bồi thường theo ch&iacute;nh
                                s&aacute;ch mất h&agrave;ng x 30 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ, hư
                                hại từ 31 % đến 50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mức bồi thường theo ch&iacute;nh
                                s&aacute;ch mất h&agrave;ng x 50 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:194.0pt;border:solid black 1.0pt;border-top:none;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ, hư
                                hại vượt qu&aacute; 50 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:73.65pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>100 %&nbsp;</span>
                        </p>
                    </td>
                    <td style="width:199.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:2.55pt 5.15pt 0cm 5.35pt;height:17.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mức bồi thường theo ch&iacute;nh
                                s&aacute;ch mất h&agrave;ng x 100 %&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute; đối với ch&iacute;nh s&aacute;ch bồi
                thường đơn h&agrave;ng bị hư hỏng:&nbsp;</span>
        </p>
        <ul style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip bồi thường đơn h&agrave;ng hư hỏng khi
                    nguy&ecirc;n nh&acirc;n g&acirc;y thiệt hại đến từ HolaShip</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức độ hư hỏng của h&agrave;ng h&oacute;a
                    v&agrave; gi&aacute; trị Bưu gửi tham khảo thị trường của 03 (ba) website b&aacute;n h&agrave;ng tại Việt
                    Nam sẽ do HolaShip x&aacute;c minh v&agrave; th&ocirc;ng b&aacute;o cho KH.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp h&agrave;ng h&oacute;a bị bể, vỡ 1 sản
                    phẩm trong bộ sản phẩm đi liền th&igrave; mức bồi thường được:&nbsp;</span></li>
        </ul>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>+ X&aacute;c định theo sản phẩm, t&iacute;nh chung
                    cả bộ nếu HolaShip giữ h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>+ X&aacute;c định theo sản phẩm, t&iacute;nh bồi
                    thường ri&ecirc;ng sản phẩm nếu KH giữ h&agrave;ng.&nbsp;</span></li>
        </ul>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp h&agrave;ng h&oacute;a bị bể, vỡ 01
                    sản phẩm trong c&ugrave;ng 01 đơn h&agrave;ng nhưng kh&ocirc;ng đi liền theo bộ th&igrave; mức bồi thường
                    được x&aacute;c định theo sản phẩm, t&iacute;nh bồi thường ri&ecirc;ng, kh&ocirc;ng bồi thường cả đơn
                    h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trường hợp HolaShip ph&aacute;t hiện Bưu gửi bị
                    hư hỏng sau khi nhận, th&igrave; HolaShip sẽ bồi thường tương ứng với mức độ hư hỏng theo Bảng gi&aacute;
                    trị bồi thường h&agrave;ng h&oacute;a hư hỏng như tr&ecirc;n.</span>
            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.1.2&nbsp;</strong>Lưu &yacute; chung về
                            ch&iacute;nh s&aacute;ch bồi thường</span></em></strong></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;sẽ chỉ bồi thường trực tiếp cho KH/Ngưởi gửi,
                trường hợp KH/Ngưởi gửi c&oacute; email chỉ định việc bồi thường thực hiện cho Người nhận th&igrave; HolaShip sẽ
                bồi thường cho Người nhận theo email của Kh&aacute;ch h&agrave;ng/Ngưởi gửi. &nbsp;</span>
        </p>
        <ul class="decimal_type" style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị bồi thường trong c&aacute;c trường
                    hợp tr&ecirc;n đ&atilde; bao gồm ho&agrave;n trả lại Cước ph&iacute; Dịch vụ m&agrave; KH đ&atilde; thanh
                    to&aacute;n. Trong trường hợp ph&iacute; vận chuyển chưa được KH thanh to&aacute;n, phần bồi thường sẽ
                    kh&ocirc;ng bao gồm Cước ph&iacute; Dịch vụ của HolaShip</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Đối với Bưu gửi l&agrave; c&aacute;c Giấy tờ
                    c&oacute; gi&aacute; trị th&igrave; thời gian sử dụng Giấy tờ c&oacute; gi&aacute; trị kể từ khi HolaShip
                    nhận h&agrave;ng phải c&ograve;n thời hạn sử dụng tối thiểu l&agrave; 03 (ba) th&aacute;ng. Trường hợp Bưu
                    gửi kh&ocirc;ng đạt điều kiện n&agrave;y th&igrave; HolaShip được miễn tr&aacute;ch nhiệm bồi
                    thường.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>Trong mọi trường hợp kh&ocirc;ng x&aacute;c định
                    được gi&aacute; trị Bưu gửi (Kh&ocirc;ng c&oacute; Cơ sở x&aacute;c minh gi&aacute; trị Bưu gửi v&agrave;
                    kh&ocirc;ng y&ecirc;u cầu thu hộ): Bồi thường bốn (04) lần cước ph&iacute; dịch vụ/đơn
                    h&agrave;ng.&nbsp;</span>

            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.2&nbsp;</strong>Đối với nh&agrave; vận chuyển GHN
                        Express</span></strong>

            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.2.1</strong>&nbsp;Đơn h&agrave;ng
                            bị mất, thất lạc&nbsp;</span></em></strong>

            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><em><span style='font-family:"DejaVu Sans",serif;color:black;'>3.2.1.1&nbsp;&Aacute;p dụng cho
                        đơn h&agrave;ng c&oacute; trọng lượng dưới 10 kg</span></em></li>
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
                                    trạng</span></strong>
                        </p>
                    </td>
                    <td colspan="3" style="width:270.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị h&agrave;ng
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
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a đơn
                                    VAT</span></strong>
                        </p>
                    </td>
                    <td style="width:90pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'><strong>Dưới 1 triệu VND</strong></span>
                        </p>
                    </td>
                    <td style="width:90pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 1 triệu VND đến dưới 3
                                    triệu VND</span></strong>
                        </p>
                    </td>
                    <td style="width:90.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 3 triệu VND trở
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
                            <span style='font-family:"DejaVu Sans",serif;'>- Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng
                                &nbsp;</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- Tối đa kh&ocirc;ng qu&aacute; 1.000.000 (Một
                                triệu đồng)</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- Bồi thường 100 % gi&aacute; trị đơn h&agrave;ng
                                &nbsp;</span>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>- Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba
                                triệu đồng)</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 51.5pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp; Bồi thường 100 % gi&aacute; trị
                                        đơn h&agrave;ng&nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; Tối đa kh&ocirc;ng
                                        qu&aacute; 5.000.000 (Năm triệu đồng)</span>
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
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 75 % gi&aacute; trị đơn
                                        h&agrave;ng &nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute;
                                        1.000.000 (Một triệu đồng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 75 % gi&aacute; trị đơn
                                        h&agrave;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute;
                                        3.000.000 (Ba triệu đồng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 83.65pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>-&nbsp;&nbsp; Bốn (04) lần Cước
                                ph&iacute; Dịch vụ</span>
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
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 100 % gi&aacute; trị đơn
                                        h&agrave;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute;
                                        1.000.000 (Một triệu đồng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bốn (04) lần Cước ph&iacute; Dịch
                                        vụ</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 11.9pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bốn (04) lần Cước ph&iacute; Dịch
                                        vụ</span>
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
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 75 % gi&aacute; trị đơn
                                        h&agrave;ng &nbsp;</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute;
                                        1.000.000 (Một triệu đồng)</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bốn (04) lần Cước ph&iacute; Dịch
                                        vụ</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 21.1pt;vertical-align: top;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bốn (04) lần Cước ph&iacute; Dịch
                                        vụ</span>
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
                    <strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>3.2.2&nbsp;</strong>Trường
                                hợp</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;đơn h&agrave;ng bị hư hỏng
                                (&aacute;p dụng cho tất cả đơn h&agrave;ng với tất cả trọng lượng kh&aacute;c
                                nhau)</span></em></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị bồi thường sẽ phụ thuộc v&agrave;o mức
                độ hư hỏng của Bưu gửi, cụ thể được x&aacute;c định như sau:</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị bồi thường hư hỏng = Mức
                        bồi thường (theo bảng mất h&agrave;ng) x Tỷ lệ bồi thường</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>(xem bảng tỷ lệ bồi thường ph&iacute;a
                        dưới)</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.2.2.1&nbsp;</strong>Bảng tỷ lệ bồi thường hư hỏng</span></em>
                </li>
            </ol>
        </div>
        <table style="width: 4.5e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td rowspan="2" style="width:256.25pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Loại hư hỏng</span></strong>
                        </p>
                    </td>
                    <td style="width:198.0pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tỷ lệ bồi
                                    thường</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:198.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:16.85pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Đơn h&agrave;ng c&oacute;
                                    trọng lượng dưới 10 kg</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:256.25pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>R&aacute;ch, ướt vỏ th&ugrave;ng
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ g&oacute;i bọc, r&aacute;ch tem
                                (đối với h&agrave;ng điện tử v&agrave; h&agrave;ng h&oacute;a c&ograve;n nguy&ecirc;n
                                vẹn)</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất, thiếu phụ kiện, h&agrave;ng
                                h&oacute;a đơn lẻ (kh&ocirc;ng ảnh hưởng đến sản phẩm)</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ hư hại kh&ocirc;ng ảnh hưởng
                                tới c&ocirc;ng năng</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ, hư hại ảnh hưởng tới
                                c&ocirc;ng năng</span>
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
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.3&nbsp;</strong>Đối với nh&agrave; vận chuyển J&amp;T</span></strong>
            </li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.1&nbsp;</strong>Trường hợp Bưu gửi bị mất,
                            tr&aacute;o đổi to&agrave;n phần</span></em></strong></li>
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
                                    trạng</span></strong>
                        </p>
                    </td>
                    <td colspan="2" style="width:319.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Gi&aacute; trị h&agrave;ng
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
                                    đơn</span></strong>
                        </p>
                    </td>
                    <td style="width:171.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&le; 3 triệu
                                    đồng</span></strong>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 3 triệu trở
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
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 100 % gi&aacute; trị đơn
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu
                                đồng)</span>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: undefined;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 100 % gi&aacute; trị đơn
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute; 30.000.000 (Ba
                                mươi triệu đồng)</span>
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
                                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;Bồi thường 100 % gi&aacute; trị đơn
                                        h&agrave;ng</span>
                                </li>
                            </ul>
                        </div>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-</span></strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba
                                triệu đồng)</span>
                        </p>
                    </td>
                    <td style="width:148.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>-&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>Tối đa kh&ocirc;ng qu&aacute; 3.000.000 (Ba triệu
                                đồng)</span>
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
                            <span style='font-family:"DejaVu Sans",serif;'>Gi&aacute; trị bồi thường &nbsp; &nbsp; tối đa 04
                                (bốn) lần cước</span>
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
                    <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.2&nbsp;</strong>Trường hợp Bưu gửi bị hư
                                hỏng</span></em></strong>
                </li>
            </ol>
        </div>
        <ul style="list-style-type: disc;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi
                    thường mất h&agrave;ng (trường hợp c&oacute; khai gi&aacute;), tuy nhi&ecirc;n gi&aacute; trị bồi thường phụ
                    thuộc v&agrave;o mức độ hư hỏng của Bưu gửi <em>(% hư hỏng</em> <em>sẽ được thỏa thuận dựa v&agrave;o
                        th&ocirc;ng tin tr&ecirc;n Bi&ecirc;n bản đồng kiểm, h&igrave;nh ảnh đồng kiểm giữa J&amp;T v&agrave;
                        Người gửi)</em></span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>&Aacute;p dụng theo ch&iacute;nh s&aacute;ch bồi
                    thường mất h&agrave;ng (trường hợp kh&ocirc;ng khai gi&aacute;), tuy nhi&ecirc;n gi&aacute; trị bồi thường
                    phụ thuộc v&agrave;o mức độ hư hỏng của đơn h&agrave;ng để &aacute;p dụng ch&iacute;nh s&aacute;ch bồi
                    thường. <em>(Xem bảng tỷ lệ bồi thường ph&iacute;a dưới)</em></span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <em><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>3.3.2.1&nbsp;</strong>Bảng tỷ lệ bồi thường hư hỏng</span></em>
                </li>
            </ol>
        </div>
        <table style="width: 4.6e+2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Loại hư hỏng</span></strong>
                        </p>
                    </td>
                    <td style="width:121.5pt;border:solid black 1.0pt;border-left:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tỷ lệ bồi
                                    thường</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:33.7pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>R&aacute;ch, ướt vỏ th&ugrave;ng
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ g&oacute;i bọc, r&aacute;ch tem
                                (đối với h&agrave;ng điện tử v&agrave; h&agrave;ng h&oacute;a c&ograve;n nguy&ecirc;n
                                vẹn)</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất, thiếu phụ kiện, h&agrave;ng
                                h&oacute;a đơn lẻ (kh&ocirc;ng ảnh hưởng đến sản phẩm)</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ hư hại kh&ocirc;ng ảnh hưởng
                                tới c&ocirc;ng năng</span>
                        </p>
                    </td>
                    <td style="width:121.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:50.05pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50 % (đối với hư hỏng từ 31 % - 50
                                %)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:341.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;border:none;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bể vỡ, hư hại ảnh hưởng tới
                                c&ocirc;ng năng</span>
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
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 4: THỜI HẠN V&Agrave; THỜI GIAN XỬ
                        L&Yacute; KHIẾU NẠI</span></strong>
            </p>
        </div>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'><strong>4.1&nbsp;</strong>Thời hạn khiếu
                                nại</span></em></strong>
                </li>
            </ol>
        </div>
        <ul class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'>- Hai (02)&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>th&aacute;ng</span><span style='font-family:"DejaVu Sans",serif;'>, kể từ ng&agrave;y kết th&uacute;c Thời gian to&agrave;n
                    tr&igrave;nh của Bưu gửi đối với khiếu nại về việc mất Bưu gửi.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'>- Một (01) th&aacute;ng, kể từ ng&agrave;y Bưu
                    gửi được ph&aacute;t cho Người nhận đối với khiếu nại về việc Bưu gửi bị suy suyển, hư hỏng, về gi&aacute;
                    cước, chuyển ph&aacute;t Bưu gửi chậm so với Thời gian to&agrave;n tr&igrave;nh đ&atilde; c&ocirc;ng bố
                    v&agrave; c&aacute;c nội dung kh&aacute;c c&oacute; li&ecirc;n quan trực tiếp đến Bưu gửi.</span>

            </li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><strong><em><span style='font-family:"DejaVu Sans",serif;color:#0C1325;'><strong>4.2&nbsp;</strong>Thời gian xử
                            l&yacute; khiếu nại</span></em></strong></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Đơn h&agrave;ng sau khi được IMD nhận th&ocirc;ng
                    tin sẽ được kiểm tra v&agrave; chuyển sang Nh&agrave; vận chuyển trong v&ograve;ng 30 ph&uacute;t.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Thời gian kết th&uacute;c, đ&oacute;ng khiếu nại
                    sẽ kh&ocirc;ng qu&aacute; 01 (một) ng&agrave;y sau khi nh&agrave; vận chuyển trả kết quả</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Đối với c&aacute;c đơn h&agrave;ng mất, hư hỏng
                    h&agrave;ng, tiền bồi thường sẽ được chuyển kh&ocirc;ng chậm hơn mười (10) ng&agrave;y l&agrave;m việc trừ
                    khi bị khi chối bồi thường.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 5: HIỆU LỰC</span></strong>
            </p>
        </div>
        <ul style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y c&oacute; hiệu lực kể từ
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; phần kh&ocirc;ng thể t&aacute;ch rời của Hợp
                    đồng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y được lập th&agrave;nh hai (02)
                    bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi b&ecirc;n giữ một (01) bản.</span></li>
        </ul>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ĐỐC</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
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
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PHỤ LỤC 02</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>BẢNG CƯỚC PH&Iacute; DỊCH VỤ V&Agrave; PHỤ
                    PH&Iacute; GIA TĂNG</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c
                    Dịch vụ vận chuyển <strong>số <?= date("dm"); ?> /<?= date("Y"); ?>/HĐHT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>giữa c&ocirc;ng ty C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ v&agrave; Dịch vụ
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave; &ldquo;<strong>Hợp
                        đồng</strong>&rdquo;)</em></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 1. GI&Aacute; CƯỚC VẬN
                        CHUYỂN</span></strong>
            </p>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bảng Cước ph&iacute; Dịch vụ v&agrave; phụ ph&iacute;
                gia tăng n&agrave;y c&oacute; hiệu lực trong v&ograve;ng 01 (một)năm, nếu c&oacute; thay đổi IMD sẽ b&aacute;o
                trước cho kh&aacute;ch h&agrave;ng 03 (ba) ng&agrave;y bằng email hoặc văn bản hoặc th&ocirc;ng b&aacute;o
                tr&ecirc;n website&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:black;text-decoration:none;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;&nbsp;</span>
        </p>
        <ol style="list-style-type: upper-roman;margin-left:1cmundefined;">
            <li><strong><u><span style='font-family:"DejaVu Sans",serif;'>NH&Agrave; VẬN CHUYỂN HOLASHIP</span></u></strong>
                <ol style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1.</strong>Bảng gi&aacute; (&aacute;p dụng nội
                                th&agrave;nh, ngoại th&agrave;nh H&agrave; Nội v&agrave; Hồ Ch&iacute; Minh)</span></strong>
                    </li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width:418.25pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width: 117pt;border: 1pt solid windowtext;background: rgb(198, 217, 241);padding: 0cm;height: 15.55pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tỉnh</span></strong>
                            </p>
                        </td>
                        <td style="width:94.25pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>C&acirc;n
                                        nặng</span></strong>
                            </p>
                        </td>
                        <td style="width:90.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:1.5pt 2.25pt 1.5pt 2.25pt;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Nội
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                        <td style="width:117.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 0cm 0cm 0cm;height:15.55pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ngoại
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width:117.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 0cm 0cm 0cm;height:16.05pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave; Nội</span>
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
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>Hồ Ch&iacute; Minh</span>
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
                    <strong><span style='font-family:"DejaVu Sans",serif;'>- Quy</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;định nội th&agrave;nh v&agrave; ngoại
                            th&agrave;nh tại H&agrave; Nội v&agrave; Hồ Ch&iacute; Minh:</span></strong>
                </li>
            </ul>
        </div>
        <table style="width:418.5pt;margin-left:26.75pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:99.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Khu
                                vực</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Nội
                                th&agrave;nh</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt;">
                        <p style='margin-top:24.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:0cm;line-height:130%;font-size:48px;font-family:"Calibri",sans-serif;font-weight:bold;margin:0cm;text-align:center;'>
                            <span style='font-size:15px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ngoại
                                th&agrave;nh</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 42.25pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>H&agrave; Nội</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:42.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>Q. Ba Đ&igrave;nh, Q. T&acirc;y Hồ, Q. Cầu
                                Giấy, Q. Thanh Xu&acirc;n, Q. Ho&agrave;n Kiếm, Q. Đống Đa, Q. Hai B&agrave; Trưng</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:42.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Q. Ho&agrave;ng Mai, Q. Bắc Từ Li&ecirc;m, Q. Nam
                                Từ Li&ecirc;m, Q. Long Bi&ecirc;n, Q. H&agrave; Đ&ocirc;ng &nbsp;</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 99pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>Hồ Ch&iacute; Minh</span>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;'>
                            <span style='font-family:  "DejaVu Sans",serif;'>Q.1, Q.3, Q.4, Q.5, Q.6, Q.7, Q.8, Q.10, Q.11,
                                Q. G&ograve; Vấp, Q. T&acirc;n B&igrave;nh, Q. T&acirc;n Ph&uacute;, Q. B&igrave;nh Thạnh, Q.
                                Ph&uacute; Nhuận</span>
                        </p>
                    </td>
                    <td style="width:135.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;'>Q.2, Q.9, Q.12, Q.Thủ Đức, Q.B&igrave;nh
                                T&acirc;n</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>Dịch</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;vụ gia tăng</span></strong>
                </li>
            </ol>
        </div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.2e+2pt;border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width:108.0pt;border:solid black 1.0pt;border-right:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n dịch
                                        vụ</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức cước</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu hộ</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Miễn ph&iacute;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Mức thu hộ tối đa
                                            l&agrave; 10.000.000 VNĐ</span>
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
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Dưới 3.000.000 VNĐ miễn
                                            ph&iacute;&nbsp;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 3.000.001 &ndash;
                                            10.000.000 VNĐ t&iacute;nh ph&iacute; 1 % gi&aacute; trị h&agrave;ng
                                            h&oacute;a</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; giao trả 1
                                        phần</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>50% cước ph&iacute; chiều
                                            đi&nbsp;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuyển
                                        ho&agrave;n</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Miễn</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;ph&iacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:108.0pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; h&agrave;ng cồng
                                        kềnh</span></strong>
                            </p>
                        </td>
                        <td style="width:310.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.6pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi chiều kh&ocirc;ng
                                            qu&aacute; 30 cm</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Với h&agrave;ng
                                            h&oacute;a c&oacute; k&iacute;ch thước lớn hơn 30 cm th&igrave; cần c&oacute; sự
                                            khảo s&aacute;t v&agrave; đ&aacute;nh gi&aacute; thực tế từ bộ phận vận
                                            h&agrave;nh</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng thức quy đổi
                                            sẽ được t&iacute;nh khi một chiều lớn hơn 30 cm:</span>
                                    </li>
                                    <li>
                                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                            <ol style="margin-bottom:0cm;list-style-type: circle;">
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng
                                                        quy đổi = [Chiều d&agrave;i (cm) x Chiều rộng (cm) x Chiều cao (cm)] /
                                                        5.000</span>
                                                </li>
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng
                                                        n&agrave;o lớn hơn th&igrave; t&iacute;nh theo khối lượng
                                                        đ&oacute;&nbsp;</span>
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
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>3.</strong>Chiết khấu theo lượng đơn</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đối với khu vực H&agrave; Nội:</span></em>
        </p>
        <table style="width: 4.1e+2pt;border: none;margin-left:22.25pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lượng đơn giao, trả
                                    th&agrave;nh c&ocirc;ng/ng&agrave;y</span></strong>
                        </p>
                    </td>
                    <td style="width:144.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Chiết khấu</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kỳ thanh
                                    to&aacute;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 100 đơn đến 300 đơn</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1.000 VNĐ/đơn</span>
                        </p>
                    </td>
                    <td rowspan="2" style="width:162.0pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo ng&agrave;y</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Thứ 2 h&agrave;ng tuần</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 15 h&agrave;ng
                                        th&aacute;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 5 th&aacute;ng
                                        tiếp theo</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 300 đơn trở l&ecirc;n</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.95pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>2.000 VNĐ/đơn</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đối với kh&aacute;ch h&agrave;ng ở Hồ Ch&iacute;
                    Minh:</span></em>
        </p>
        <table style="width: 4.1e+2pt;border: none;margin-left:22.25pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lượng đơn giao, trả
                                    th&agrave;nh c&ocirc;ng/ng&agrave;y</span></strong>
                        </p>
                    </td>
                    <td style="width:144.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Chiết khấu</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:22.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Kỳ thanh
                                    to&aacute;n</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Từ 100 đơn trở l&ecirc;n</span>
                        </p>
                    </td>
                    <td style="width:144.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>1.000 VNĐ/đơn</span>
                        </p>
                    </td>
                    <td style="width:162.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:32.8pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Theo ng&agrave;y</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Thứ 2 h&agrave;ng tuần</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 15 h&agrave;ng
                                        th&aacute;ng</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Ng&agrave;y 5 th&aacute;ng
                                        tiếp theo</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'><br>&nbsp;Lưu &yacute;:&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lượng</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;đơn được t&iacute;nh chiết khấu
                = Tổng số đơn giao,</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>trả th&agrave;nh c&ocirc;ng / Số
                ng&agrave;y l&ecirc;n đơn</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;background:white;'>&nbsp;</span>
        </p>
        <ol style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><u><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'><strong>II.</strong>NH&Agrave; VẬN CHUYỂN GHN EXPRESS</span></u></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1.</strong>Bảng gi&aacute; dịch
                                vụ&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>(đ&atilde; bao gồm
                            VAT)</span></li>
                    <li><em><span style="color:black;"><strong>1.1 </strong>Bảng</span></em><em><span style="">&nbsp;gi&aacute; &aacute;p dụng từ 0
                                &ndash; 5 kg</span></em></li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-indent:18.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <table style="width: 4.1e+2pt;margin-left:22.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:49.5pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuyến</span></strong>
                        </p>
                    </td>
                    <td style="width:67.5pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng</span></strong>
                        </p>
                    </td>
                    <td style="width:63.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Nội
                                    th&agrave;nh</span></strong>
                        </p>
                    </td>
                    <td style="width:72.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Huyện/x&atilde;</span></strong>
                        </p>
                    </td>
                    <td style="width:81.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:44.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Th&ecirc;m 0,5 kg
                                    (h&agrave;ng dưới 4 kg)</span></strong>
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
                            <strong><span style='font-family:"DejaVu Sans",serif;'>To&agrave;n quốc</span></strong>
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
                    <em><span style='font-family:"DejaVu Sans",serif;'><strong>1.2 </strong>Bảng gi&aacute; &aacute;p dụng từ 5 kg trở
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
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.1e+2pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width:90.25pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuyến</span></strong>
                            </p>
                        </td>
                        <td style="width:73.55pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khối
                                        lượng</span></strong>
                            </p>
                        </td>
                        <td style="width:79.45pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Nội
                                        th&agrave;nh</span></strong>
                            </p>
                        </td>
                        <td style="width:81.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.95pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Huyện/x&atilde;</span></strong>
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
                                <strong><span style='font-family:"DejaVu Sans",serif;'>To&agrave;n quốc</span></strong>
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
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>Dịch vụ gia tăng</span></strong>
                </li>
            </ol>
        </div>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="width: 4.1e+2pt;border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width:89.1pt;border:solid black 1.0pt;border-right:none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.5pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n dịch
                                        vụ</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:26.5pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức cước</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.9pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu hộ</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.9pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>Miễn ph&iacute;</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:89.1pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuyển
                                        ho&agrave;n</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>Miễn ph&iacute;</span>
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
                                        <span style='font-family:"DejaVu Sans",serif;'>Dưới</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;3</span><span style='font-family:"DejaVu Sans",serif;'>.</span><span style='font-family:"DejaVu Sans",serif;'>000</span><span style='font-family:"DejaVu Sans",serif;'>.</span><span style='font-family:"DejaVu Sans",serif;'>000 VNĐ&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>m</span><span style='font-family:"DejaVu Sans",serif;'>iễn&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>p</span><span style='font-family:"DejaVu Sans",serif;'>h&iacute;&nbsp;</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;'>T</span><span style='font-family:"DejaVu Sans",serif;'>ừ</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>3.000.001 &ndash;
                                            10.000.000</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;VNĐ&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>t&iacute;nh ph&iacute;</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;0,5</span><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><span style='font-family:"DejaVu Sans",serif;'>% gi&aacute; trị h&agrave;ng
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
                                        cồng kềnh</span></strong>
                            </p>
                        </td>
                        <td style="width:324.65pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:40.0pt;">
                            <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi chiều kh&ocirc;ng
                                            qu&aacute; 50 cm</span>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>C&ocirc;ng thức quy đổi
                                            sẽ được t&iacute;nh khi một chiều lớn hơn 30 cm:</span>
                                    </li>
                                    <li>
                                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                            <ol style="margin-bottom:0cm;list-style-type: circle;">
                                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                                    <span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng
                                                        quy đổi = [Chiều d&agrave;i (cm) x Chiều rộng (cm) x Chiều cao (cm)] /
                                                        5.000</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </li>
                                    <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng n&agrave;o lớn
                                            hơn th&igrave; t&iacute;nh theo khối lượng đ&oacute;</span>
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
                            VẬN&nbsp;</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'>CHUYỂN</span></u></strong><strong><u><span style='font-family:"DejaVu Sans",serif;'>&nbsp;J&amp;T EXPRESS</span></u></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>1. </strong>Bảng</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;gi&aacute; dịch vụ&nbsp;</span></strong><span style='font-family:"DejaVu Sans",serif;'>(đ&atilde; bao gồm VAT)</span></li>
                    <li><strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>1.1 </strong>Đi từ
                                    H&agrave;</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;Nội</span></em></strong></li>
                </ol>
            </li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:center;text-indent:18.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <table style="width:426.35pt;margin-left:14.4pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:106.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em></strong><strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuyến</span></strong>
                        </p>
                    </td>
                    <td style="width:149.35pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng</span></strong>
                        </p>
                    </td>
                    <td style="width:171.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức Cước</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" style="width:106.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:7.0pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Nội tỉnh&nbsp;<br>&nbsp;(H&agrave; Nội đi
                                    H&agrave; Nội)</span></strong>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi 0,5 kg tiếp theo</span>
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
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Li&ecirc;n tỉnh</span></strong>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi 0,5 kg tiếp theo</span>
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
            <em><u><span style='font-family:"DejaVu Sans",serif;'>Lưu &yacute;</span></u></em><em><span style='font-family:"DejaVu Sans",serif;'>: Cước ph&iacute; chuyển ho&agrave;n cho kh&aacute;ch
                    h&agrave;ng gửi h&agrave;ng từ H&agrave; Nội</span></em>
        </p>
        <table style="border: none;width:323.05pt;margin-left:68.2pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tỷ lệ ho&agrave;n trong
                                    th&aacute;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:169.05pt;border:solid windowtext 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; chuyển
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Miễn ho&agrave;n</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% cước ph&iacute; vận chuyển chiều
                                đi&nbsp;</span>
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
            <em><span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng thức t&iacute;nh tỷ lệ ho&agrave;n trong
                    th&aacute;ng như sau</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tỷ lệ
                    &nbsp;ho&agrave;n <span style="color:black;">= Tổng đơn ho&agrave;n / (Tổng đơn gửi - Đơn
                        hủy)</span></span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><em><span style='font-family:"DejaVu Sans",serif;'><strong>1.2 </strong>Đi&nbsp;</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>từ</span></em></strong><strong><em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;TP Hồ Ch&iacute; Minh</span></em></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;text-align:justify;text-indent:36.0pt;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <table style="width:394.45pt;margin-left:14.4pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:99.9pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuyến</span></strong>
                        </p>
                    </td>
                    <td style="width:161.9pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng</span></strong>
                        </p>
                    </td>
                    <td style="width:132.65pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:2.5pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức cước</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width:99.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:26.35pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Nội tỉnh&nbsp;<br>&nbsp;(HCM đi
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi 0,5 kg tiếp theo</span>
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
            <em><span style='font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <table style="width:397.6pt;margin-left:13.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:108.0pt;border:solid windowtext 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tuyến</span></strong>
                        </p>
                    </td>
                    <td style="width:162.0pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khối lượng</span></strong>
                        </p>
                    </td>
                    <td style="width:127.6pt;border:solid windowtext 1.0pt;border-left:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức cước</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="5" style="width:108.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:23.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Li&ecirc;n tỉnh</span></strong>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mỗi 0,5 kg tiếp theo</span>
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
            <em><u><span style='font-family:"DejaVu Sans",serif;'>Lưu &yacute;</span></u></em><em><span style='font-family:"DejaVu Sans",serif;'>: Cước ph&iacute; chuyển ho&agrave;n cho kh&aacute;ch
                    h&agrave;ng gửi h&agrave;ng từ Hồ Ch&iacute; Minh</span></em>
        </p>
        <table style="border: none;width:323.05pt;margin-left:68.2pt;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="width:154.0pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Tỷ lệ ho&agrave;n trong
                                    th&aacute;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:169.05pt;border:solid windowtext 1.0pt;border-left:none;padding:  0cm 5.4pt 0cm 5.4pt;height:21.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; chuyển
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Miễn ho&agrave;n</span>
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
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% cước ph&iacute; vận chuyển chiều
                                đi&nbsp;</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng thức t&iacute;nh tỷ lệ ho&agrave;n trong
                    th&aacute;ng như sau</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tỷ lệ
                    &nbsp;ho&agrave;n <span style="color:black;">= Tổng đơn ho&agrave;n / (Tổng đơn gửi - Đơn
                        hủy)</span></span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:27.0pt;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0cm;list-style-type: none;">
                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                    <strong><span style='font-family:"DejaVu Sans",serif;'><strong>2. </strong>Dịch</span></strong><strong><span style='font-family:"DejaVu Sans",serif;'>&nbsp;vụ gia tăng</span></strong>
                </li>
            </ol>
        </div>
        <table style="float: left;width: 4.2e+2pt;border: none;border-collapse:collapse;margin-left:6.75pt;margin-right: 6.75pt;">
            <tbody>
                <tr>
                    <td style="width:98.75pt;border:solid black 1.0pt;border-right:  none;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n dịch
                                    vụ</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;background:#C6D9F1;padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức
                                    ph&iacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; thu hộ</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Miễn ph&iacute;</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.45pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>Ph&iacute; chuyển
                                    ho&agrave;n</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.45pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Dựa theo tỷ lệ ho&agrave;n thực tế</span>
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
                                    <span style='font-family:"DejaVu Sans",serif;'>1,1 % gi&aacute; trị h&agrave;ng
                                        h&oacute;a</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:98.75pt;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute; h&agrave;ng cồng
                                    kềnh</span></strong>
                        </p>
                    </td>
                    <td style="width:324.75pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:9.65pt;">
                        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <ul style="margin-bottom:0cm;list-style-type: disc;margin-left:0cmundefined;">
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Mỗi chiều kh&ocirc;ng qu&aacute; 50
                                        cm</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>C&ocirc;ng thức quy đổi sẽ được
                                        t&iacute;nh khi một chiều lớn hơn 30 cm:</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Khối lượng quy đổi = [Chiều d&agrave;i
                                        (cm) x Chiều rộng (cm) x Chiều cao (cm)] / 6.000</span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Khối lượng n&agrave;o lớn hơn th&igrave;
                                        t&iacute;nh theo khối lượng đ&oacute;</span>
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
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 2. HIỆU LỰC</span></strong>
        </p>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y c&oacute; hiệu lực kể từ
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; phần kh&ocirc;ng thể t&aacute;ch rời của Hợp
                    đồng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y được lập th&agrave;nh hai (02)
                    bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi b&ecirc;n giữ một (01) bản.&nbsp;</span>
            </li>
        </ul>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ĐỐC</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
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
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PHỤ LỤC 03</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>BẢNG CƯỚC PH&Iacute; V&Agrave; CH&Iacute;NH
                    S&Aacute;CH BỒI THƯỜNG G&Oacute;I CƯỚC SI&Ecirc;U TỐC</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c
                    Dịch vụ vận chuyển <strong>số <?= date("dm"); ?> /<?= date("Y"); ?>/HĐHT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>giữa c&ocirc;ng ty C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ v&agrave; Dịch vụ
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave; &ldquo;<strong>Hợp
                        đồng</strong>&rdquo;)</em></span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 1. BẢNG GI&Aacute; V&Agrave; DỊCH VỤ GIA
                    TĂNG&nbsp;</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Bảng</span><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;Cước ph&iacute; Dịch vụ v&agrave; phụ ph&iacute;
                gia tăng n&agrave;y c&oacute; hiệu lực trong v&ograve;ng 01 (một) năm, nếu c&oacute; thay đổi IMD sẽ b&aacute;o
                trước cho kh&aacute;ch h&agrave;ng 03 (ba) ng&agrave;y bằng email hoặc văn bản hoặc th&ocirc;ng b&aacute;o
                tr&ecirc;n website&nbsp;</span><a href="https://holaship.vn/"><span style='font-family:"DejaVu Sans",serif;color:#0563C1;'>https://HolaShip.vn</span></a><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:324.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:36.0pt;'>
            <em><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;'>Đơn vị: VNĐ</span></em>
        </p>
        <table style="width:360.0pt;margin-left:58.25pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td colspan="2" style="width:360.0pt;border:solid windowtext 1.0pt;background:#F8CBAD;padding:0cm 5.4pt 0cm 5.4pt;height:20.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-size:16px;line-height:  130%;font-family:"DejaVu Sans",serif;color:black;'>Bảng
                                    gi&aacute; HOLASHIP</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>T&ecirc;n
                                    dịch vụ</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>SI&Ecirc;U
                                    TỐC</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Thời
                                    gian giao h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Tối
                                đa 1 giờ (với đơn h&agrave;ng đầu ti&ecirc;n)</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Số
                                    điểm dừng mặc định</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>1
                                điểm dừng/ đơn h&agrave;ng</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    điểm dừng vượt qu&aacute; số điểm dừng mặc định</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>5 000
                                VNĐ/ điểm</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Số
                                    đơn h&agrave;ng mặc định/ điểm dừng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>1 đơn
                                h&agrave;ng/ điểm</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    đơn h&agrave;ng vượt qu&aacute; tr&ecirc;n điểm dừng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>5 000
                                VNĐ/ đơn</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    qu&atilde;ng đường</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.6pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>3km
                                đầu: 21 000 VNĐ<br>&nbsp;Tr&ecirc;n 3km: 5 000 VNĐ/ km</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:24.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Phụ
                                    ph&iacute; dịch vụ giao h&agrave;ng tạm ứng</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.25pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>COD
                                &lt; 2 000 000 VNĐ: Miễn ph&iacute;<br>&nbsp;COD &ge; 2 000 000 VNĐ: 0,5% gi&aacute; trị
                                COD</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:175.5pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong><span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>Ph&iacute;
                                    quay đầu</span></strong>
                        </p>
                    </td>
                    <td style="width:184.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:13.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;color:black;'>70%
                                cước qu&atilde;ng đường từ điểm xa nhất đến điểm gửi</span>
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
                                cước qu&atilde;ng đường từ điểm xa nhất đến điểm gửi</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-size:16px;line-height:130%;font-family:"DejaVu Sans",serif;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;:</span>
        </p>
        <ul style="list-style-type: none;margin-left:2.0500000000000007px;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- Bảng gi&aacute; đ&atilde; bao gồm VAT.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- &Aacute;p dụng tại nội th&agrave;nh H&agrave; Nội.</span>
            </li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 2. CH&Iacute;NH S&Aacute;CH BỒI
                    THƯỜNG</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;'>I. QUY ĐỊNH CHUNG VỀ BỒI THƯỜNG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.1 </strong>Số tiền bồi thường tối đa sẽ kh&ocirc;ng vượt
                    qu&aacute; gi&aacute; trị h&agrave;ng h&oacute;a.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.2 </strong>Trường hợp đơn h&agrave;ng xảy ra lỗi do
                    ph&iacute;a kh&aacute;ch h&agrave;ng (Người gửi) hoặc do đặc t&iacute;nh tự nhi&ecirc;n của đơn h&agrave;ng
                    h&oacute;a, IMD sẽ kh&ocirc;ng chịu mọi tr&aacute;ch nhiệm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.3 </strong>Tất cả c&aacute;c trường hợp đơn h&agrave;ng bị
                    Cơ quan nh&agrave; nước c&oacute; thẩm quyền thu giữ, hoặc ti&ecirc;u hủy do kh&aacute;ch h&agrave;ng vi
                    phạm quy định của ph&aacute;p luật IMD từ chối hỗ trợ v&agrave; kh&ocirc;ng chịu mọi tr&aacute;ch
                    nhiệm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.4 </strong>IMD từ chối tiếp nhận v&agrave; xử l&yacute;
                    khiếu nại ph&aacute;t sinh trong trường hợp kh&aacute;ch h&agrave;ng kh&ocirc;ng thực hiện đầy đủ c&aacute;c
                    quy định về gửi h&agrave;ng.&nbsp;</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>1.5 </strong>Đối với đơn h&agrave;ng được bồi thường dựa
                    tr&ecirc;n gi&aacute; trị h&agrave;ng h&oacute;a, cần đảm bảo thực hiện c&aacute;c quy định sau
                    đ&acirc;y:</span></li>
        </ol>
        <ul style="list-style-type: none;margin-left:26px;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Kh&aacute;ch h&agrave;ng phải thực hiện đồng kiểm
                    với t&agrave;i xế nhận/giao h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- IMD sẽ c&oacute; quyền y&ecirc;u cầu kh&aacute;ch
                    h&agrave;ng cung cấp h&oacute;a đơn, chứng từ hợp lệ của đơn h&agrave;ng để xem x&eacute;t việc x&aacute;c
                    minh đền b&ugrave;.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><em><span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;:&nbsp;</span></em></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a đơn, chứng từ hợp lệ được hiểu
                    l&agrave; bao gồm nhưng kh&ocirc;ng giới hạn tại c&aacute;c trường hợp sau:</span></em>
        </p>
        <ul style="list-style-type: disc;margin-left:26px;">
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a đơn gi&aacute; trị gia tăng, nếu người
                        b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai thuế gi&aacute; trị gia tăng theo phương ph&aacute;p
                        khấu trừ</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>H&oacute;a đơn b&aacute;n h&agrave;ng, nếu người
                        b&aacute;n l&agrave; doanh nghiệp k&ecirc; khai thuế gi&aacute; trị gia tăng theo phương ph&aacute;p
                        trực tiếp hoặc Hộ kinh doanh.</span></em></li>
            <li><em><span style='font-family:"DejaVu Sans",serif;'>Hồ sơ k&ecirc; khai hải quan, nếu h&agrave;ng h&oacute;a
                        được nhập khẩu v&agrave;o Việt Nam</span></em></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></em>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>II. CH&Iacute;NH S&Aacute;CH BỒI
                    THƯỜNG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;color:black;'><strong>2.1 </strong>Trường hợp h&agrave;ng h&oacute;a bị mất,
                        thất lạc, hư hỏng l&agrave; ấn phẩm, giấy tờ, h&oacute;a đơn, hợp đồng v&agrave; c&aacute;c t&agrave;i
                        liệu dưới dạng văn bản kh&aacute;c: &nbsp;</span></strong></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>HolaShip c&oacute; tr&aacute;ch nhiệm bồi thường
                    tối đa 04 (bđap c&oacute; tr&aacute;ch nhiệm bồi thường đồng v</span></li>
        </ol>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><strong><span style='font-family:"DejaVu Sans",serif;'><strong>2.2 </strong>Trường hợp H&agrave;ng h&oacute;a bị mất, thất lạc,
                        hư hỏng l&agrave; vật phẩm, h&agrave;ng h&oacute;a:</span></strong>
                <ol class="decimal_type" style="list-style-type: none;">
                    <li><span style='font-family:"DejaVu Sans",serif;'><strong>2.2.1 </strong>Trường hợp kh&aacute;ch h&agrave;ng c&oacute; sử dụng
                            dịch vụ thu hộ COD:</span></li>
                </ol>
            </li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trường hợp mất, thất lạc h&agrave;ng h&oacute;a
                    hoặc h&agrave;ng h&oacute;a hư hỏng dẫn đến kh&aacute;ch h&agrave;ng từ chối nhận h&agrave;ng th&igrave;
                    khoản tiền bồi thường ch&iacute;nh l&agrave; Số tiền t&agrave;i xế đ&atilde; ứng COD tr&ecirc;n đơn
                    h&agrave;ng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trường hư hỏng h&agrave;ng h&oacute;a.
                    Kh&aacute;ch h&agrave;ng đ&atilde; thanh to&aacute;n COD cho t&agrave;i xế v&agrave; ph&aacute;t sinh lỗi do
                    HolaShip, khoản tiền bồi thường được t&iacute;nh theo:</span></li>
        </ul>
        <table style="margin-left:18.0pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Nội dung bồi
                                    thường</span></strong>
                        </p>
                    </td>
                    <td style="width:5.0cm;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức đền b&ugrave; cho
                                    kh&aacute;ch h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:92.15pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức đền b&ugrave; tối đa
                                    (VNĐ)</span></strong>
                        </p>
                    </td>
                    <td style="width:136.85pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất h&agrave;ng h&oacute;a c&oacute;
                                h&oacute;a đơn h&oacute;a đơn GTGT</span>
                        </p>
                    </td>
                    <td style="width:5.0cm;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>70% gi&aacute; trị h&oacute;a đơn
                                b&aacute;n ra hoặc 100% gi&aacute; trị h&oacute;a đơn mua v&agrave;o.</span>
                        </p>
                    </td>
                    <td style="width:92.15pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>5 000 000</span>
                        </p>
                    </td>
                    <td style="width:136.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a đơn được n&ecirc;u tại mục
                                n&agrave;y l&agrave; h&oacute;a đơn GTGT hoặc h&oacute;a đơn b&aacute;n h&agrave;ng do cơ quan
                                quản l&yacute; thuế th&ocirc;ng qua</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất h&agrave;ng h&oacute;a
                                kh&ocirc;ng c&oacute; h&oacute;a đơn</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:370.75pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Tối đa 04 (bốn) lần cước ph&iacute;
                                đ&atilde; sử dụng</span>
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
                    <span style='font-family:"DejaVu Sans",serif;'><strong>2.2.2 </strong>Trường hợp Kh&aacute;ch h&agrave;ng kh&ocirc;ng sử dụng
                        dịch vụ thu hộ COD:</span>
                </li>
            </ol>
        </div>
        <table style="margin-left:18.0pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Nội dung bồi
                                    thường</span></strong>
                        </p>
                    </td>
                    <td style="width:5.0cm;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức đền b&ugrave; cho
                                    kh&aacute;ch h&agrave;ng</span></strong>
                        </p>
                    </td>
                    <td style="width:92.15pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức đền b&ugrave; tối đa
                                    (VNĐ)</span></strong>
                        </p>
                    </td>
                    <td style="width:136.85pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;</span></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất h&agrave;ng h&oacute;a c&oacute;
                                h&oacute;a đơn h&oacute;a đơn GTGT</span>
                        </p>
                    </td>
                    <td style="width:5.0cm;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>50% gi&aacute; trị h&agrave;ng
                                h&oacute;a theo h&oacute;a đơn b&aacute;n ra</span>
                        </p>
                    </td>
                    <td style="width:92.15pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>5 000 000</span>
                        </p>
                    </td>
                    <td style="width:136.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>H&oacute;a đơn được n&ecirc;u tại mục
                                n&agrave;y l&agrave; h&oacute;a đơn GTGT hoặc h&oacute;a đơn b&aacute;n h&agrave;ng do cơ quan
                                quản l&yacute; thuế th&ocirc;ng qua</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:109.35pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Mất h&agrave;ng h&oacute;a
                                kh&ocirc;ng c&oacute; h&oacute;a đơn</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:370.75pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                            <span style='font-family:"DejaVu Sans",serif;color:black;'>Tối đa 04 (bốn) lần cước ph&iacute;
                                đ&atilde; sử dụng</span>
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
                    <span style='font-family:"DejaVu Sans",serif;'>&nbsp;</span><strong><span style='font-family:"DejaVu Sans",serif;'><strong>2.3 </strong>Trường hợp H&agrave;ng h&oacute;a bị hư hỏng 01 (một)
                            phần:</span></strong>
                </li>
            </ol>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>Khoản tiền bồi thường sẽ phụ thuộc v&agrave;o mức độ
                hư hỏng của kiện h&agrave;ng, cụ thể được x&aacute;c định như sau:</span>
        </p>
        <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <table style="border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width: 198.2pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Loại hư
                                        hỏng</span></strong>
                            </p>
                        </td>
                        <td style="width: 106.35pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Mức bồi
                                        thường</span></strong>
                            </p>
                        </td>
                        <td style="width: 193.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>Khoản tiền bồi
                                        thường</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a b&ecirc;n
                                    ngo&agrave;i con nguy&ecirc;n, tuy nhi&ecirc;n bao b&igrave; b&ecirc;n ngo&agrave;i của kiện
                                    h&agrave;ng bị:<br>&nbsp;- R&aacute;ch, vỡ, ướt th&ugrave;ng h&agrave;ng, hộp đựng
                                    h&agrave;ng.<br>&nbsp;- R&aacute;ch tem ni&ecirc;m phong của nh&agrave; sản xuất, sản phẩm
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
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>Khoản tiền bồi thường mất
                                    h&agrave;ng (căn chứ được x&aacute;c định theo mục 2.1, 2.2) * Mức bồi thường tương
                                    ứng.</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 198.2pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:  130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ,
                                    hư hại đến 30%</span>
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
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ,
                                    hư hại từ 30% đến 50%</span>
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
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ,
                                    hư hại từ 50% đến 70%</span>
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
                                <span style='font-family:"DejaVu Sans",serif;color:black;'>H&agrave;ng h&oacute;a bị bể vỡ,
                                    hư hại đến tr&ecirc;n 70%</span>
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
            <u><span style='font-family:"DejaVu Sans",serif;color:black;'>Lưu &yacute;</span></u><span style='font-family:"DejaVu Sans",serif;color:black;'>:</span>
        </p>
        <ul style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trong trường hợp Kh&aacute;ch h&agrave;ng
                    kh&ocirc;ng cung cấp được H&oacute;a đơn hợp ph&aacute;p của H&agrave;ng h&oacute;a th&igrave; bồi thường
                    tối đa 04 (bốn) lần Cước ph&iacute; Dịch vụ.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trường hợp H&agrave;ng h&oacute;a bị thất
                    tho&aacute;t hoặc hư hỏng một phần v&agrave; Kh&aacute;ch h&agrave;ng cung cấp được chứng từ H&oacute;a đơn
                    thể hiện gi&aacute; trị H&agrave;ng h&oacute;a th&igrave; HolaShip c&oacute; tr&aacute;ch nhiệm bồi thường
                    phần gi&aacute; trị H&agrave;ng h&oacute;a bị thất tho&aacute;t hoặc hư hỏng đ&oacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Trường hợp H&agrave;ng h&oacute;a hư hại, bể vỡ
                    từ 50% trở l&ecirc;n th&igrave; HolaShip sẽ được quyền sở hữu h&agrave;ng h&oacute;a trong Đơn h&agrave;ng
                    đ&oacute;. Kh&aacute;ch h&agrave;ng cam kết sẽ k&yacute; kết c&aacute;c t&agrave;i liệu cần thiết cho mục
                    đ&iacute;ch chuyển quyền sở hữu đối với h&agrave;ng h&oacute;a đ&oacute;.</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>III. QUY TR&Igrave;NH ĐỀN
                    B&Ugrave;</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.1 </strong>Kh&aacute;ch h&agrave;ng phản hồi th&ocirc;ng khiếu nại tới
                    HolaShip th&ocirc;ng qua tổng đ&agrave;i, fanpage &ldquo;HolaShip &ndash; Lu&ocirc;n đ&uacute;ng hẹn&rdquo;
                    hoặc qua email: cj@imediatech.com.vn. C&aacute;c đơn h&agrave;ng khiếu nại hợp lệ l&agrave; đơn h&agrave;ng
                    đ&atilde; kết th&uacute;c h&agrave;nh tr&igrave;nh trong v&ograve;ng tối đa 24h kể từ khi li&ecirc;n
                    hệ.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.2 </strong>Trong v&ograve;ng hai (02) ng&agrave;y l&agrave;m việc, kể từ
                    ng&agrave;y nhận được khiếu nại, HolaShip sẽ kiểm tra v&agrave; x&aacute;c minh th&ocirc;ng tin khiếu nại từ
                    kh&aacute;ch h&agrave;ng, người nhận h&agrave;ng v&agrave; Shiper đối t&aacute;c. Trong v&ograve;ng 30 (ba
                    mươi) ng&agrave;y l&agrave;m việc sau khi nhận được khiếu nại, Bộ phận chăm s&oacute;c kh&aacute;ch
                    h&agrave;ng của HolaShip sẽ chủ động li&ecirc;n hệ với kh&aacute;ch h&agrave;ng để cung cấp giải ph&aacute;p
                    xử l&yacute; khiếu nại ph&ugrave; hợp với cam kết tr&aacute;ch nhiệm v&agrave; giới hạn tr&aacute;ch nhiệm
                    m&agrave; HolaShip đ&atilde; c&ocirc;ng bố.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>3.3 </strong>Trong trường hợp người khiếu nại kh&ocirc;ng đồng &yacute;
                    với c&aacute;c biện ph&aacute;p giải quyết v&agrave; xử l&yacute; của HolaShip, c&aacute;c b&ecirc;n sẽ
                    đ&agrave;m ph&aacute;n v&agrave; h&ograve;a giải để thống nhất c&aacute;c biện ph&aacute;p giải quyết, xử
                    l&yacute; khiếu nại v&agrave; bồi thường. Trường hợp thương lượng v&agrave; h&ograve;a giải kh&ocirc;ng
                    c&oacute; kết quả, mỗi b&ecirc;n c&oacute; thể tự m&igrave;nh đưa tranh chấp ra giải quyết tại T&ograve;a
                    &aacute;n cấp c&oacute; thẩm quyền.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>IV. C&Aacute;C TRƯỜNG HỢP ĐƯỢC MIỄN BỒI
                    THƯỜNG</span></strong>
        </p>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>4.1 </strong>Danh mục h&agrave;ng h&oacute;a kh&ocirc;ng được bồi
                    thường.</span></li>
        </ol>
        <ul class="decimal_type" style="list-style-type: none;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng điện - điện tử cũ, kh&ocirc;ng x&aacute;c minh
                    được gi&aacute; trị.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng h&oacute;a kh&ocirc;ng x&aacute;c định/chứng minh
                    được gi&aacute; trị (bao gồm nhưng kh&ocirc;ng giới hạn: giấy tờ, hợp đồng&hellip;.)</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Đồ uống c&oacute; cồn.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Ma t&uacute;y, chất k&iacute;ch th&iacute;ch tinh
                    thần.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Kim loại qu&yacute;. (v&agrave;ng, bạc, v.v... ở dạng thỏi,
                    n&eacute;n, tiền xu, v.v...)</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng nguy hiểm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- S&uacute;ng, vũ kh&iacute;, đạn dược, thiết bị kỹ thuật
                    qu&acirc;n sự.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Thuốc l&aacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- H&agrave;ng dễ hỏng (c&aacute;c mặt h&agrave;ng m&agrave;
                    trạng th&aacute;i hoặc t&iacute;nh chất ban đầu c&oacute; thể bị hư hỏng khi chịu t&aacute;c động của sự
                    thay đổi qu&aacute; mức về nhiệt độ, độ ẩm hoặc thời gian), trừ hoa v&agrave; c&aacute;c loại thực
                    phẩm.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c ấn phẩm đồi trụy v&agrave; phản động, c&aacute;c
                    vấn đề in hoặc t&agrave;i liệu chống lại an ninh c&ocirc;ng cộng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c vật phẩm hoặc chất dễ ch&aacute;y nổ hoặc
                    g&acirc;y mất vệ sinh, g&acirc;y &ocirc; nhiễm m&ocirc;i trường.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Vật phẩm, h&agrave;ng h&oacute;a bị cấm lưu h&agrave;nh,
                    bu&ocirc;n b&aacute;n của ch&iacute;nh phủ.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Động vật sống.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- L&ocirc;ng th&uacute;.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- C&aacute;c mặt h&agrave;ng, ấn phẩm, h&agrave;ng h&oacute;a
                    bị cấm nhập khẩu v&agrave;o Việt Nam.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Đồ cổ (dễ vỡ).</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Chất g&acirc;y nghiện.</span></li>
        </ul>
        <ol class="decimal_type" style="list-style-type: none;margin-left:1cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;'><strong>4.2 </strong>Bưu Kiện đóng gói kh&ocirc;ng đúng quy định, bưu
                    gửi bị hư hại, mất m&aacute;t do lỗi của Người Gửi hoặc do đặc t&iacute;nh tự nhi&ecirc;n của h&agrave;ng
                    h&oacute;a b&ecirc;n trong.</span></li>
        </ol>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:1.0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:-1.0cm;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 3. HIỆU LỰC</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
        </p>
        <ul style="list-style-type: none;margin-left:2.0500000000000007px;">
            <li><span style='font-family:"DejaVu Sans",serif;'>- Phụ lục n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y
                    <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; phần kh&ocirc;ng thể t&aacute;ch rời của Hợp đồng.</span>
            </li>
            <li><span style='font-family:"DejaVu Sans",serif;'>- Phụ lục n&agrave;y được lập th&agrave;nh hai (02) bản
                    c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi b&ecirc;n giữ một (01) bản.&nbsp;</span></li>
        </ul>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span>
        </p>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ĐỐC</span></strong>
                        </p> -->
                        <img src="<?php echo $pgdsign; ?>" alt="">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
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
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PHỤ LỤC 04</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>DANH S&Aacute;CH T&Agrave;I KHOẢN DỊCH
                    VỤ</span></strong>
        </p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
            <em><span style='font-family:"DejaVu Sans",serif;color:black;'>(Đ&iacute;nh k&egrave;m Hợp đồng Hợp t&aacute;c
                    Dịch vụ vận chuyển <strong>số <?= date("dm"); ?> /<?= date("Y"); ?>/HĐHT/FINTECH/IMEDIA &ndash;</strong></span></em><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;<strong><em>[<?= $acronym; ?>/<?= $companyName; ?>]&nbsp;</em></strong><em>giữa c&ocirc;ng ty C&ocirc;ng ty Cổ phần C&ocirc;ng nghệ v&agrave; Dịch vụ
                    IMEDIA (&ldquo;<strong>IMD</strong>&rdquo;) &nbsp;v&agrave; &nbsp;<strong>[<?= $acronym; ?>/<?= $companyName; ?>]</strong>
                    (&ldquo;<strong>KH</strong>&rdquo;) &ndash; sau đ&acirc;y gọi l&agrave; &ldquo;<strong>Hợp
                        đồng</strong>&rdquo;)</em></span>
        </p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-bottom:solid black 1.0pt;padding:0cm 0cm 1.0pt 0cm;'>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'>
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 1. DANH S&Aacute;CH T&Agrave;I
                        KHOẢN</span></strong>
            </p>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
            <span style='font-family:"DejaVu Sans",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Danh s&aacute;ch
                c&aacute;c ID (t&agrave;i khoản đăng nhập Holaship.vn) sau đ&acirc;y đều thuộc kh&aacute;ch h&agrave;ng
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
                            <strong><span style='font-family:"DejaVu Sans",serif;'>ID đăng nhập</span></strong>
                        </p>
                    </td>
                    <td style="width: 75.3pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>T&ecirc;n shop</span></strong>
                        </p>
                    </td>
                    <td style="width: 130.15pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 38.7pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;'>T&agrave;i khoản ng&acirc;n h&agrave;ng
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
                                    <span style='font-family:"DejaVu Sans",serif;'>Chủ t&agrave;i khoản: <?php echo (!empty($listBanks)) ? $listBanks->bankAccountName : ''; ?></span>
                                </li>
                                <li style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:100%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                    <span style='font-family:"DejaVu Sans",serif;'>Số t&agrave;i khoản: <?php echo (!empty($listBanks)) ? $listBanks->bankAccount : ''; ?></span>
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
                <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐIỀU 2. HIỆU LỰC</span></strong>
            </p>
        </div>
        <ul style="list-style-type: none;margin-left:0cmundefined;">
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y c&oacute; hiệu lực kể từ
                    ng&agrave;y <?= date('d') ?>/<?= date('m') ?>/<?= date('Y') ?> v&agrave; l&agrave; phần kh&ocirc;ng thể t&aacute;ch rời của Hợp
                    đồng.</span></li>
            <li><span style='font-family:"DejaVu Sans",serif;color:black;'>- Phụ lục n&agrave;y được lập th&agrave;nh hai (02)
                    bản c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi b&ecirc;n giữ một (01) bản.&nbsp;</span>
            </li>
        </ul>
        <span> &nbsp; </span>
        <table style="width: 4.6e+2pt;margin-left:1.0cm;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 227.45pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <!-- <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
                                    A</span></strong>
                        </p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>PH&Oacute; GI&Aacute;M
                                    ĐỐC</span></strong>
                        </p> -->
                        <img  src="<?php echo $pgdsign; ?>" alt="" style="height: 110px;">
                    </td>
                    <td style="width: 231.95pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:100%;font-size:13px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong><span style='font-family:"DejaVu Sans",serif;color:black;'>ĐẠI DIỆN B&Ecirc;N
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